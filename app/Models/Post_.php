<?php

namespace App\Models;
;

class Post {
    private static $toko_post = [[
        "namaBarang" => "Nama Barang",
        "slug" => "nama-barang",
        "penjual" => "penjual",
        "gambarBarang" => "george.png",
        "descBarang" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum optio, qui ullam nam assumenda accusamus, quibusdam illo fugit totam minima adipisci quaerat suscipit quia. Sed consequatur quae numquam aspernatur asperiores?"
    ],
    [
        "namaBarang" => "Merchendise Omori ori",
        "slug" => "merchendise-omori",
        "penjual" => "Rinaldi Oktarinanda",
        "gambarBarang" => "omori.jpg",
        "descBarang" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum optio, qui ullam nam assumenda accusamus, quibusdam illo fugit totam minima adipisci quaerat suscipit quia. Sed consequatur quae numquam aspernatur asperiores?"
    ]];
    public static function all(){
        return collect(self::$toko_post);
    }
    public static function find($slug) {
        $post = static::all();
    //     $posts = [];
    //     foreach($post as $p) {
    //     if($p["slug"] ===  $slug) {
    //         $posts = $p;
    //     }
    // }
    return $post->firstWhere('slug', $slug);
    }
}
