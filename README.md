# Riset Laravel
Ini adalah gabungan dari riset laravel yang sebelumnya dilakukan dengan riset MeMFIS, Semangat

## Tahapan membuat project
1. Membuat project dengan cara `composer create-project --prefer-dist laravel/laravel nama_project`
2. Membuat dan menginstall `laravel/ui` untuk konfigurasi authetifikasi dengan cara `composer require laravel/ui`


## List Riset
- [Riset Laravel](/riset-laravel.md)
- [Riset MeMFIS](/riset-memfis.md)


## Database/Tabel yang digunakan
  ### Riset MeMFIS
  
  - Polimorphisme
    - `videos`
    - `posts`
    - `tags`
    - `taggables`

  - Form Request + fungsi
    - `mahasiswa`
    - `mata_kuliah`
    - `mahasiswa_mata_kuliah`

  - ScopeOf()... (builder)
    - `mahasiswa`

  - owen-it/laravel-auditing
    - `audits`

  - yajra/laravel-datatable
    - `mahasiswa`

  - nwidart/laravel-modules
    - `items`
    - `categories`
    - `categoriables`