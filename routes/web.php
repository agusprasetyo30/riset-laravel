<?php

use App\Mahasiswa;
use Illuminate\Support\Facades\Route;
use Spatie\QueryBuilder\QueryBuilder;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Halaman Awal
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Untuk halaman tombol Riset laravel
Route::get('/riset-laravel', function() {
    return view('riset-laravel');
})->name('riset-laravel');

// Untuk halaman tombol Riset Memfis
Route::get('/riset-memfis', function() {
    return view('riset-memfis');
})->name('riset-memfis');

// Include datatables route
require('datatables.php');

// Akses untuk masuk folder riset
Route::group(['namespace' => 'Riset'], function() {

    /********* Riset MeMFIS ********/
    
    Route::group(['namespace' => 'Memfis'], function() {

        Route::group(['prefix' => 'test', 'as' => 'test.'], function () {
            
            /**
             * Data route dashboard
             */
            Route::get('/', function () {
                $mahasiswa = Mahasiswa::paginate(5);

                return view('mmf.index', compact('mahasiswa'));
            })->name('index');

            /**
             * NOTE : Route untuk identifikasi data Mata Kuliah untuk kebutuhan riset
             * 
             * Data Mata Kuliah
             */
            Route::resource("mata-kuliah", "MatakuliahController", [
                "parameters" => ["matakuliah" => "mata_kuliah"],
            ])->names([
                "index"     => "matakuliah.index",
                "create"    => "matakuliah.create",
                "store"     => "matakuliah.store",
                "edit"      => "matakuliah.edit",
                "update"    => "matakuliah.update",
                "destroy"   => "matakuliah.destroy",
                "show"      => "matakuliah.show",
            ]);
            // ->except('show');

            /**
             * NOTE : Route untuk identifikasi data mahasiswa untuk kebutuhan riset
             * 
             * Data Mahasiswa
             */
            Route::resource('mahasiswa', "MahasiswaController");
            Route::group(['prefix' => 'mahasiswa', 'as' => 'mahasiswa.'], function () {
                Route::get('/{uuid}/ambil-matkul', 'MahasiswaController@ambilMataKuliah')->name('ambil-matkul');
                Route::get('/{id}/ambil-matkul/{matkul}/process', 'MahasiswaController@prosesPenambahanMatkul')->name('ambil-matkul.process');
            });

            /**
             * NOTE : Route untuk identifikasi riset datatable
             * 
             * Riset yajra/laravel-datatable
             */ 
            Route::group(['prefix' => 'laravel-datatables', 'as' => 'datatables.', 'namespace' => 'Datatables'], function() {
                Route::get('mahasiswa', 'MahasiswaController@indexDatatable')->name('mahasiswa');
            });

            /**
             * NOTE : Route untuk identifikasi riset polymorphisme
             * 
             * Riset Polymorfisme
             */
            
            Route::group(['prefix' => 'polymorphisme', 'as' => 'poly.', 'namespace' => 'Polymorphisme'], function() {
                Route::get('/', 'DashboardController@index')->name('dashboard');
                
                /*** Video ***/

                // One to Many Polymorphic
                Route::resource('video', 'VideoController')->except(['destroy']);
                Route::get('/video/{id}/delete', 'VideoController@destroy')->name('video.destroy');
                Route::post('/video/comment/{id}', 'VideoController@addCommentVideo')->name('video.comment');
                Route::get('/video/comment/{id}/delete', 'VideoController@deleteCommentVideo')->name('video.comment.delete');


                // Many to Many Polymorphic
                Route::group(['prefix' => 'many-to-many', 'as' => 'mtm.video.'], function() {
                    Route::get('/video',  'VideoController@indexManyToMany')->name('index');
                    Route::get('/video/{id}',  'VideoController@showManyToMany')->name('show');
                    Route::post('/video/tag/{id}', 'VideoController@addTagVideo')->name('add.tag'); // menambahkan tag
                    Route::get('/video/tag/{id}',  'VideoController@deleteTagVideo')->name('delete.tag'); // Menghapus tag
                });
                

                /*** Post ***/ 

                // One to Many Polymorphic
                Route::resource('post', 'PostController')->except(['destroy']);
                Route::get('/post/{id}/delete', 'PostController@destroy')->name('post.destroy');
                Route::post('/post/comment/{id}', 'PostController@addCommentPost')->name('post.comment');
                Route::get('/post/comment/{id}/delete', 'PostController@deleteCommentPost')->name('post.comment.delete');

                // Many to Many Polymorphic
                Route::group(['prefix' => 'many-to-many', 'as' => 'mtm.post.'], function() {
                    Route::get('/post',  'PostController@indexManyToMany')->name('index');
                    Route::get('/post/{id}',  'PostController@showManyToMany')->name('show');
                    Route::post('/post/tag/{id}', 'PostController@addTagPost')->name('add.tag'); // menambahkan tag
                    Route::get('/post/tag/{id}',  'PostController@deleteTagPost')->name('delete.tag'); // Menghapus tag
                });

                /*** Tag ***/
                Route::resource('tag', 'TagController');
            });

            /**  
             * NOTE : Route untuk identifikasi riset package yang terdapat di sistem MeMFIS 
             * 
             * Riset Library 
             */
            Route::group(['prefix' => 'package', 'namespace' => 'Package'], function() {

                // Laravel Auditing
                Route::group(['prefix' => 'laravel-auditing', 'as' => 'auditing.' ], function() {
                    Route::get('/', 'AuditingController@index')->name('index');
                });

                Route::group(['prefix' => 'laravel-query-builder', 'as' => 'query-builder.'], function() {
                    Route::get('/', 'QueryBuilderController@index')->name('index');
                });

                Route::group(['prefix' => 'laravel-dompdf', 'as' => 'dompdf.'], function() {
                    // Route::get('/', '')
                    Route::get('/', 'DompdfController@index')->name('index');
                    Route::get('/print-dompdf', 'DompdfController@printDompdf')->name('print');
                    Route::get('/print-dompdf/filter', 'DompdfController@dompdfFilter')->name('dompdf-filter');
                    Route::get('/print-dompdf/print', 'DompdfController@printDompdfFilter')->name('print-filter');
                    Route::get('/merge-pdf/print', 'DompdfController@mergePdfPrint')->name('merge-pdf');

                    // Route::get('/', function() {
                        // $pdf = PDF::loadView('mmf.riset.package.laravel-dompdf.index');
                        // return $pdf->stream('document.pdf');
                        // return view('mmf.riset.package.laravel-dompdf.index');

                        // $view1 = \View::make('frontend.form.dc_page1')->with([
                        //     'defectcard' => $defectcard,
                        //     'propose_corrections'=> $propose_corrections, 
                        //     'text'=> $text, 
                        //     'zones' => $zones, 
                        //     'actual_manhours' => $actual_manhours, 
                        //     'date_close' => $date_close, 
                        //     'released_by' => $released_by, 
                        //     'released_at' => $released_at,
                        //     'rii_by' => $rii_by, 
                        //     'rii_at' => $rii_at
                        //     ])->render();
                            
                        // $view2 = \View::make('frontend.form.dc_page2')->with('defectcard', $defectcard)->render();
                
                        // $pdf = App::make('dompdf.wrapper');
                        // $pdf->loadHTML($view1)->setPaper('a4', 'portrait');
                        // $m->addRaw($pdf->output());
                
                        // $pdf = App::make('dompdf.wrapper');
                        // $pdf->loadHTML($view2)->setPaper('a4', 'landscape');
                        // $m->addRaw($pdf->output());
                        // $code_reformatted = str_replace('/', '-', $defectcard->code); 
                        // $filename = $code_reformatted.'.pdf';
                        // $directory = 'storage/DefectCard/'.$code_reformatted.'.pdf';
                        // $awsS3 = Storage::disk('s3');
                
                        // $put = Storage::disk('s3')->put($directory, $m->merge());
                
                        // $client = Storage::disk('s3')->getDriver()->getAdapter()->getClient();
                        // $bucket = Config::get('filesystems.disks.s3.bucket');
                
                        // $command = $client->getCommand('GetObject', [
                        //     'Bucket' => $bucket,
                        //     'Key' => $directory
                        // ]);
                
                    // });
                });
            });

            /**
             * Menampilkan Readme
             */
            Route::get('cek', function() {
                $markdown_content = file_get_contents('../riset-memfis.md');
                echo Illuminate\Mail\Markdown::parse($markdown_content);
            });

        });
    });


    /********* Riset Laravel ********/

    Route::group(['namespace' => 'Laravel'], function() {

        // Dummy Todo
        Route::group(['prefix' => 'dummy-todo', 'as' => 'dummy.'], function () {
            Route::get('/', 'TodoController@index')->name('index');
            Route::get('/delete', 'TodoController@destroy')->name('delete');

            Route::post('/', 'TodoController@store')->name('store');
            Route::put('/{id}/update', 'TodoController@update')->name('update');
        });

        // Bulk Excel
        Route::group(['prefix' => 'bulk-excel', 'as' => 'excel.'], function () {
            Route::get('/', 'BulkExcelController@index')->name('index');
            
            // Export
            Route::get('/print_collection', 'BulkExcelController@printExcelCollection')->name('print.collection');
            Route::get('/print_query', 'BulkExcelController@printExcelQuery')->name('print.query');
            Route::get('/print_view', 'BulkExcelController@printExcelView')->name('print.view');

            // Import
            Route::get('/import', 'BulkExcelController@importPage')->name('print.import-page');
            Route::post('/import', 'BulkExcelController@importFileExcel')->name('print.import');

        });

        Route::group(['prefix' => 'data-api', 'as' => 'data-api.'], function () {
            Route::get('/', 'TodoApiController@indexPage')->name('index');
        });


        Route::group(['prefix' => 'barcode-qr', 'as' => 'barcode-qr.'], function () {
            
            Route::get('/', 'BarcodeQrController@index')->name('index');
            Route::get('/todo-barcode/{id}', 'BarcodeQrController@getTodoByID')->name('barcode-id');
        });
    });
});



Route::any('captcha-test', function() {
    if (request()->getMethod() == 'POST') {
        $rules = ['captcha' => 'required|captcha'];
        $validator = validator()->make(request()->all(), $rules);
        if ($validator->fails()) {
            echo '<p style="color: #ff0000;">Incorrect!</p>';
        } else {
            echo '<p style="color: #00ff30;">Matched :)</p>';
        }
    }

    $form = '<form method="post" action="captcha-test">';
    $form .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
    $form .= '<p>' . Captcha::img('math') . '</p>';
    $form .= '<p><input type="text" name="captcha"></p>';
    $form .= '<p><button type="submit" name="check">Check</button></p>';
    $form .= '</form>';
    return $form;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
