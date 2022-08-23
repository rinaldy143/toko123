<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\kategori;
use App\Models\User;
use App\Models\Post;
use App\Models\country;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('country')->insert([
            'nama' => 'Nanggore Aceh'
        ]);
        DB::table('country')->insert([
            'nama' => 'Sumatera Utara'
        ]);
        DB::table('country')->insert([
            'nama' => 'Sumatera Barat'
        ]);
        DB::table('country')->insert([
            'nama' => 'Riau'
        ]);
        DB::table('country')->insert([
            'nama' => 'Jambi'
        ]);
        DB::table('country')->insert([
            'nama' => 'Bangka Belitung'
        ]);
        DB::table('country')->insert([
            'nama' => 'Sumatera Selatan'
        ]);
        DB::table('country')->insert([
            'nama' => 'Bengkulu'
        ]);
        DB::table('country')->insert([
            'nama' => 'Kep. Riau'
        ]);
        DB::table('country')->insert([
            'nama' => 'Lampung'
        ]);
        DB::table('country')->insert([

            'nama' => 'Banten'
        ]);
        DB::table('country')->insert([

            'nama' => 'DKI Jakarta'
        ]);
        User::create([
            'name' => 'Rinaldi Oktarinanda',
            'username' => 'rinaldy143',
            'email' => 'rinaldy143@gmail.com',
            'password' => bcrypt('123')
        ]);

        // User::create([
        //     'name' => 'Fubuki',
        //     'email' => 'hololive@gmail.com',
        //     'password' => bcrypt('123')
        // ]);
        User::factory(5)->create();

        kategori::create([
            'nama' => 'makanan',
            'slug' => 'makanan'
        ]);

        kategori::create([
            'nama' => 'buku',
            'slug' => 'buku'
        ]);

        kategori::create([
            'nama' => 'teknologi',
            'slug' => 'teknologi'
        ]);

        Post::factory(10)->create();

        // Post::create([
        //     'namaBarang' => 'lemper',
        //     'slug' => 'lemper',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, veniam repellat, odio eum magni quo quidem perspiciatis quibusdam cupiditate numquam ipsam itaque inventore ab consequuntur neque pariatur voluptate temporibus quasi.',
        //     'gambarBarang' => 'omori.jpg',
        //     'penjual' => 'Rinladi',
        //     'descBarang' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, veniam repellat, odio eum magni quo quidem perspiciatis quibusdam cupiditate numquam ipsam itaque inventore ab consequuntur neque pariatur voluptate temporibus quasi.</p><p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quaerat, numquam atque. In sit libero, ducimus deleniti nemo, praesentium similique eveniet quo maiores dolore suscipit accusamus corrupti consectetur. Provident dolorum voluptas obcaecati enim aliquid magnam aperiam quo, temporibus dolorem ea! Minus dolorum porro quisquam nisi, voluptatibus itaque facere neque aut aspernatur in possimus. Doloremque velit provident neque ut? Aliquid aliquam quisquam enim sequi quos. Eligendi, corrupti. Saepe atque ex sit reprehenderit numquam dolorem aspernatur dolor tenetur quasi, assumenda quibusdam error dolores nostrum praesentium quaerat odit illo consectetur a ducimus? Consectetur assumenda quis repudiandae corporis, optio fuga culpa aliquam velit veniam illo! </p>',
        //     'kategori_id' => '1',
        //     'user_id' => '1'
        // ]);

        // Post::create([
        //     'namaBarang' => 'bika-ambon',
        //     'slug' => 'bika-ambon',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, veniam repellat, odio eum magni quo quidem perspiciatis quibusdam cupiditate numquam ipsam itaque inventore ab consequuntur neque pariatur voluptate temporibus quasi.',
        //     'gambarBarang' => 'omori.jpg',
        //     'penjual' => 'Rinladi',
        //     'descBarang' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, veniam repellat, odio eum magni quo quidem perspiciatis quibusdam cupiditate numquam ipsam itaque inventore ab consequuntur neque pariatur voluptate temporibus quasi.</p><p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quaerat, numquam atque. In sit libero, ducimus deleniti nemo, praesentium similique eveniet quo maiores dolore suscipit accusamus corrupti consectetur. Provident dolorum voluptas obcaecati enim aliquid magnam aperiam quo, temporibus dolorem ea! Minus dolorum porro quisquam nisi, voluptatibus itaque facere neque aut aspernatur in possimus. Doloremque velit provident neque ut? Aliquid aliquam quisquam enim sequi quos. Eligendi, corrupti. Saepe atque ex sit reprehenderit numquam dolorem aspernatur dolor tenetur quasi, assumenda quibusdam error dolores nostrum praesentium quaerat odit illo consectetur a ducimus? Consectetur assumenda quis repudiandae corporis, optio fuga culpa aliquam velit veniam illo! </p>',
        //     'kategori_id' => '1',
        //     'user_id' => '1'
        // ]);

        // Post::create([
        //     'namaBarang' => 'ayunda risu',
        //     'slug' => 'ayunda-risu',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, veniam repellat, odio eum magni quo quidem perspiciatis quibusdam cupiditate numquam ipsam itaque inventore ab consequuntur neque pariatur voluptate temporibus quasi.',
        //     'gambarBarang' => 'Risu.png',
        //     'penjual' => 'Rinladi',
        //     'descBarang' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, veniam repellat, odio eum magni quo quidem perspiciatis quibusdam cupiditate numquam ipsam itaque inventore ab consequuntur neque pariatur voluptate temporibus quasi.</p><p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quaerat, numquam atque. In sit libero, ducimus deleniti nemo, praesentium similique eveniet quo maiores dolore suscipit accusamus corrupti consectetur. Provident dolorum voluptas obcaecati enim aliquid magnam aperiam quo, temporibus dolorem ea! Minus dolorum porro quisquam nisi, voluptatibus itaque facere neque aut aspernatur in possimus. Doloremque velit provident neque ut? Aliquid aliquam quisquam enim sequi quos. Eligendi, corrupti. Saepe atque ex sit reprehenderit numquam dolorem aspernatur dolor tenetur quasi, assumenda quibusdam error dolores nostrum praesentium quaerat odit illo consectetur a ducimus? Consectetur assumenda quis repudiandae corporis, optio fuga culpa aliquam velit veniam illo! </p>',
        //     'kategori_id' => '3',
        //     'user_id' => '2'
        // ]);


    }
}
