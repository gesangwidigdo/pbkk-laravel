<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'title' => 'Home'
    ]);
});

Route::get('/about', function () {
    return view('about',[
        'title' => 'About',
        'nama' => 'Gesang'
    ]);
});

Route::get('/posts', function () {
    return view('posts',[
        'title' => 'Blog',
        'posts' => [
            [
                'id' => 1,
                'slug' => 'judul-artikel-1',
                'title' => 'Judul Artikel 1',
                'author' => 'Gesang Widigdo',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo sapiente exercitationem enim facilis delectus inventore amet neque eaque, nostrum, sunt quod! Est laboriosam consequatur tenetur fuga fugit magnam maxime neque voluptatum eum cum aliquid, quia, id molestiae saepe aspernatur ullam eius, quos odio exercitationem nulla harum. Voluptates sequi exercitationem fugiat voluptatum aspernatur iusto facere aperiam dolor, suscipit assumenda, reprehenderit, repellendus modi quis asperiores. Ipsam officiis, quidem quae sint, libero adipisci cum laborum voluptate quos, quis consectetur eligendi ullam enim ex ipsa similique nemo ut vel at esse eum veritatis provident. Corporis consequuntur deserunt voluptatum delectus veniam dolore possimus aliquid voluptas.',
            ],
            [
                'id' => 2,
                'slug' => 'judul-artikel-2',
                'title' => 'Judul Artikel 2',
                'author' => 'Gesang Widigdo',
                'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem deserunt nobis nulla deleniti voluptatum. Expedita magni a, ipsum fuga sequi eaque maiores vitae libero. Dicta sapiente ullam nisi quasi labore tempora voluptas quo quibusdam earum porro? Ex velit doloremque qui incidunt deleniti ullam obcaecati neque dolorem repellendus fugiat voluptates in illo odit suscipit vitae minima aperiam, officia magni, accusantium dolor! A molestiae ex deleniti. Beatae nisi quia, asperiores nesciunt temporibus recusandae. Odit aliquam, sequi cupiditate temporibus ea earum tempore ullam illo aut laudantium repudiandae fuga quia architecto, nobis odio iusto numquam accusantium id accusamus voluptatum quisquam! Ipsam, saepe omnis.',
            ],
        ]
    ]);
});

Route::get('/posts/{slug}', function($slug) {
    $posts = [
        [
            'id' => 1,
            'slug' => 'judul-artikel-1',
            'title' => 'Judul Artikel 1',
            'author' => 'Gesang Widigdo',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo sapiente exercitationem enim facilis delectus inventore amet neque eaque, nostrum, sunt quod! Est laboriosam consequatur tenetur fuga fugit magnam maxime neque voluptatum eum cum aliquid, quia, id molestiae saepe aspernatur ullam eius, quos odio exercitationem nulla harum. Voluptates sequi exercitationem fugiat voluptatum aspernatur iusto facere aperiam dolor, suscipit assumenda, reprehenderit, repellendus modi quis asperiores. Ipsam officiis, quidem quae sint, libero adipisci cum laborum voluptate quos, quis consectetur eligendi ullam enim ex ipsa similique nemo ut vel at esse eum veritatis provident. Corporis consequuntur deserunt voluptatum delectus veniam dolore possimus aliquid voluptas.',
        ],
        [
            'id' => 2,
            'slug' => 'judul-artikel-2',
            'title' => 'Judul Artikel 2',
            'author' => 'Gesang Widigdo',
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem deserunt nobis nulla deleniti voluptatum. Expedita magni a, ipsum fuga sequi eaque maiores vitae libero. Dicta sapiente ullam nisi quasi labore tempora voluptas quo quibusdam earum porro? Ex velit doloremque qui incidunt deleniti ullam obcaecati neque dolorem repellendus fugiat voluptates in illo odit suscipit vitae minima aperiam, officia magni, accusantium dolor! A molestiae ex deleniti. Beatae nisi quia, asperiores nesciunt temporibus recusandae. Odit aliquam, sequi cupiditate temporibus ea earum tempore ullam illo aut laudantium repudiandae fuga quia architecto, nobis odio iusto numquam accusantium id accusamus voluptatum quisquam! Ipsam, saepe omnis.',
        ],
    ];

    $post = Arr::first($posts, function($post) use ($slug) {
        return $post['slug'] == $slug;
    });

    return view('post', [
        'title' => 'Single Post',
        'post' => $post,
    ]);
});

Route::get('/contact', function () {
    return view('contact',[
        'title' => 'Contact',
    ]);
});
