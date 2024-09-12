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

### 4. Menggunakan Blade Component

Blade component merupakan fitur pada Laravel untuk membuat suatu component yang dapat digunakan berulang-ulang pada blade. Component ini berguna untuk mengurangi repetisi jika sebuah halaman memerlukan tampilan yang sama atau mirip dengan tampilan di halaman lainnya atau terjadi perubahan pada component tersebut. Contoh component yang dapat dibuat adalah Navbar component, karena component ini digunakan di banyak halaman seperti home, about, blog, dan contact.

Untuk membuat component, dapat dengan menggunakan perintah berikut (nama component biasanya diawali dengan huruf kapital).

```
php artisan make:component <NamaComponent>
```

Misal kita membuat component baru dengan nama Navbar. Setelah perintah tersebut dijalankan, akan muncul 2 file baru, yaitu ```navbar.blade.php``` di folder ```./resources/views/components/``` dan ```Navbar.php``` di direktori ```./app/View/Components/```. Namun yang akan paling banyak diubah adalah yang ada di dalam folder ```./resources```. Jika kita tidak ingin membuat file di dalam folder ```./app```, maka kita tinggal menambahkan flag ```--view``` di akhir.

```
php artisan make:component <NamaComponent> --view
```

Setelah component berhasil dibuat, copy semua yang ada di dalam tag ```<nav>``` ke dalam ```navbar.blade.php```.

```php
<nav class="bg-gray-800" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        ...
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
        ...
    </div>
</nav>
```

Kemudian untuk menggunakan component tersebut, dapat dipanggil dengan menggunakan tag ```<x-nama-component>```

```home.blade.php```

```php
<div class="min-h-full">
  <x-navbar></x-navbar>
  <header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $title }}</h1>
    </div>
  </header>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <!-- Your content -->
      <p>Bonjour</p>
    </div>
  </main>
</div>
```

Setelah itu, dibuat juga component untuk header. Namun karena judul di tiap halaman berbeda, misal di halaman Home, maka headernya harus menampilkan teks "Halaman Home". Untuk mengatasi permasalahan tersebut, kita dapat menambahkan ```{{ $slot }}``` di component header. Isi dari $slot ini nantinya akan mengambil apapun yang berada di antara tag ```<x-header>```.

```header.blade.php```

```php
<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $slot }}</h1>
    </div>
</header>
```

Contoh penggunaan

```php
<x-header>Halaman Home</x-header>
```

Maka hasilnya akan jadi seperti ini.

![Home with Component](./readme-asset/tugas-1/home-component.png)

### 5. Membuat Layout

Agar template Tailwind yang kita pasang sebelumnya dapat bekerja di halaman lain, kita perlu membuat layout. Ada 2 cara untuk membuatnya, yaitu dengan menggunakan Component seperti sebelumnya, atau dengan menggunakan *Template Inheritance*. Namun dalam kasus ini kita menggunakan Component.

Dimulai dengan membuat component baru dengan nama Layout, kemudian copy semua kode tempat template tailwind digunakan ke dalam component Layout. Setelah itu isi konten dari layout tersebut diisi dengan ```$slot```, karena selain header, yang membedakan antara halaman satu dengan halaman lainnya adalah isi atau konten dari halaman tersebut.

```layout.blade.php```

```php
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    ...
</head>
<body class="h-full">
    <!--
    This example requires updating your template:

    ```
    <html class="h-full bg-gray-100">
    <body class="h-full">
    ```
    -->
    <div class="min-h-full">
    <x-navbar></x-navbar>

    <x-header>Halaman Home</x-header>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Your content -->
        {{ $slot }}
        </div>
    </main>
    </div>

</body>
</html>
```

```home.blade.php```

```php
<x-layout>
  <h3 class="text-xl">Ini adalah halaman Home Page</h3>
</x-layout>
```

Tampilan pada website

![Home with Layout](./readme-asset/tugas-1/home-layout.png)

Dapat dilihat pada bagian ```<x-header>``` isinya masih dideklarasikan secara manual. Namun tidak semua halaman headernya berupa teks "Halaman Home". Maka dari itu, program perlu mengirimkan data dari routes ke layout. Caranya adalah dengan menggunakan ```<x-slot:key-data>```. Sehingga untuk mengirimkan title, akan menjadi ```<x-slot:title>```.

```web.php```

```php
Route::get('/', function () {
    return view('home', [
        'title' => 'Home'
    ]);
});
```

```home.blade.php```

```php
<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <h3 class="text-xl">Ini adalah halaman Home Page</h3>
</x-layout>
```

Sehingga tampilan dari halaman Home, About, Blog, dan Contact dapat berubah-ubah sesuai dengan data yang dikirimkan.

![Dynamic Home](./readme-asset/tugas-1/dynamic-home.png)

![Dynamic About](./readme-asset/tugas-1/dynamic-about.png)

Saat ini pada navbar hanya halaman Home saja yang memiliki status *active* saat halaman tersebut dibuka. Namun saat kita berpindah ke halaman lain seperti About, yang *active* di navbar masih tetap Home. Maka dibuat component baru untuk nav-link.

```nav-link.blade.php```

```php
<a {{ $attributes }} class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium text-white" aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
```

```navbar.blade.php```

```php
<x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
<x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
<x-nav-link href="/blog" :active="request()->is('blog')">Blog</x-nav-link>
<x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
```


Pada component di atas, {{ $attributes }} akan mengambil atribut yang ada saat komponen tersebut digunakan. Kemudian pada ```navbar.blade.php```, terdapat ```:active="request()->is('/')"``` yang akan mengecek apakah saat ini halaman yang aktif merupakan /, /about, /blog, atau /contact. Data yang dikirimkan berupa boolean dan akan dilakukan pengecekan di nav-link.

Tampilan dari perubahan di atas apat dilihat saat kita mengakses halaman lain.

![Access About](./readme-asset/tugas-1/access-about.png)

![Access Blog](./readme-asset/tugas-1/access-blog.png)