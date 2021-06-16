<?php

namespace App\Http\Requests;

use App\Mahasiswa;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class MahasiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nama.max' => 'Maksimal 50 bro untuk jumlah namanya',
            'kelas.max'=> 'Maksimal 8 bro untuk jumlah kelasnya'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama' => 'required|max:50',
            'kelas' => 'required|max:8',
            'jk' => 'required',
            'alamat' => 'required|max:150',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        
        $validator->after(function ($validator) {
            // yang jadi masalah penumpukan adalah origin_mahasiswa yang menumpuk
            $mahasiswa = Mahasiswa::where('uuid', $this->mahasiswa_uuid)->get(['id', 'uuid', 'nama', 'kelas', 'jk', 'alamat', 'created_at', 'updated_at'])->first();
            $origin = $mahasiswa->toJson();

                $this->merge([
                    "origin_mahasiswa" => $origin, //$this->mahasiswa_uuid adalah mengambil inputan yang diambil dari form
                //     'input2' => "Saya input dua",
                //     'input3' => "Saya input tiga",
                //     'input4' => "Saya input empat",
                ]);
            // digabung
        });
    }
    

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()]));
    }
}
