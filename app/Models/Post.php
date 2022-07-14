<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{

    use Sluggable;
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['kategori', 'user'];



    public function scopeFilter($query, array $filters)
    {
        // if(isset($filters['cari']) ? $filters['cari'] : false) {
        //     return  $query->where('namaBarang', 'like', '%' . $filters['cari'] . '%')
        //             ->orWhere('descBarang', 'like', '%' . $filters['cari'] . '%');
        // }

        $query->when($filters['cari'] ??  false, function($query, $cari){               // sama aja ama ln16
            return  $query->where('namaBarang', 'like', '%' . $cari . '%')
                            ->orWhere('descBarang', 'like', '%' .$cari . '%');
        });

        $query->when($filters['kategori'] ?? false, function($query, $kategori) {
            return $query->whereHas('kategori', function($query) use ($kategori) {
                $query->where('slug', $kategori);
            });
        });

        $query->when($filters['user'] ?? false, function($query, $user) {
            return $query->whereHas('user', function($query) use ($user) {
                $query->where('username', $user);
            });
        });
    }

    public function kategori() {
        return $this->belongsTo(kategori::class);
    }


    public function user() {
        return $this->belongsTo(User::class);
    }
    public function getRouteKeyName()
{
    return 'slug';
}
public function sluggable(): array
{
    return [
        'slug' => [
            'source' => 'namaBarang'
        ]
    ];
}
}
