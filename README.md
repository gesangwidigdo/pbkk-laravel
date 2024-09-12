<div align=center>

|    NRP     |      Name                     |
| :--------: | :---------------------------: |
| 5025221216 | Muhammad Gesang Ridho Widigdo |

</div>

## Tugas 1

### 1. Halaman Awal dan Membuat Halaman

Dalam laravel, saat kita membuat project baru kemudian menjalankannya di browser, maka akan muncul tampilan awal dari laravel seperti berikut.

![img](./readme-asset/tugas-1/tampilan-awal.png)

Dapat dilihat dari address bar tersebut, nama project yang dibuat adalah pbkk-laravel dan dengan mengakses url (/), maka halaman awal dari project tersebut akan ditampilkan, yang mana merupakan tampilan bawaan dari laravel. Hal ini dapat dilihat di direktori ```routes/web.php```. File ini berfungsi untuk melakukan routing terhadap tampilan atau data mana yang akan ditampilkan saat user melakukan request.

```php
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
```

Dari gambar di atas, diketahui jika saat root url diakses, atau dalam kasus ini kita mengakses ```/```, maka program akan menampilkan halaman welcome. Halaman tersebut tersimpan di direktori```./resources/views/```. Halaman tersebut dibuat menggunakan blade, template engine bawaan Laravel.

![Welcome Page Location](./readme-asset/tugas-1/welcome-page-location.png)

Untuk membuat halaman baru pada Laravel, dapat dilakukan dengan menuliskan kode berikut ke dalam ```routes/web.php``` dan menentukan URL dan halaman mana yang akan ditampilkan dengan fungsi ```view()```. Misal kita akan membuat halaman about, maka tulis kode program seperti di bawah.

```php
Route::get('/about', function () {
    return view('about');
});
```

Setelah itu, buat view baru di ```resources/views/```. Karena kode di atas me-return ```view('about')```, maka file harus dinamai ```about.blade.php```.

![View Halaman About](./readme-asset/tugas-1/view-halaman-about.png)

Untuk mengetahui apakah view berhasil dibuat, akses ```pbkk-laravel.test/about``` untuk melihat halaman /about.

![Halaman About](./readme-asset/tugas-1/halaman-about.png)

Hal yang sama dapat dilakukan saat kita ingin mengubah tampilan awal, atau saat root url diakses. Kita tinggal mengubah view yang akan direturn saat root url diakses, dan membuat file blade baru.

```php
Route::get('/', function () {
    return view('home');
});
```

![Blade Home](./readme-asset/tugas-1/home-blade.png)

![Web Home](./readme-asset/tugas-1/home-web.png)

Dapat dilihat saat kita mengakses root url, yang mana sebelumnya akan menampilkan tampilan bawaan laravel, sekarang hanya akan menampilkan halaman yang baru kita buat.

**Menambahkan Style**

Untuk menambahkan asset pada blade, dapat dengan menyimpan file ```.css``` pada direktori ```public/```.

![CSS JS Location](./readme-asset/tugas-1/cssjssloc.png)

### 2. Mengirim Data ke View

Kita juga dapat mengirimkan data yang berada di web.php ke halaman view.

web.php

```php
Route::get('/about', function () {
    return view('about',[
        'title' => 'About',
        'nama' => 'Gesang'
    ]);
});

Route::get('/blog', function () {
    return view('blog',[
        'title' => 'Blog',
    ]);
});

Route::get('/contact', function () {
    return view('contact',[
        'title' => 'Contact',
    ]);
});
```

Kemudian menampilkan datanya dengan cara berikut

  ```php
  <h2>Nama: {{ $nama }}</h2>
  ```

![Hasil Menampilkan Data](./readme-asset/tugas-1/mengirim-data.png)

### 3. Menggunakan Template dari Tailwind

Untuk menggunakan tailwind pada laravel, kita perlu menginstallnya terlebih dahulu. Untuk dokumentasi instalasinya dapat dilihat di halaman [dokumentasi tailwind](https://tailwindui.com/documentation) atau di [intalasi tailwind di laravel](https://tailwindcss.com/docs/guides/laravel). Untuk template yang akan digunakan adalah template **Stacked Layout** berikut.

![Stacked Layout Template](./readme-asset/tugas-1/tailwind-template.png)

Copy template tersebut ke file blade, dan lakukan konfigurasi berdasarkan dokumentasi [ini](https://tailwindui.com/documentation#using-html-and-your-own-js) dan *comment* yang ada di dalam template. Setelah melakukan konfigurasi, tampilan website akan menjadi seperti di bawah.

![Tailwind Home](./readme-asset/tugas-1/home-tailwind.png)

class="h-full"