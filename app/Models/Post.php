<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];
    
     // Penggunaan Eager Loading
    protected $with = ['category' , 'author'];

    public function scopeFilter($query, array $filters)
    {
        // Kondisi Search atau pencarian search diambil dari name form input
        // Untuk orWhere pencarian yang didalam body atau isi
        $query->when( $filters['search'] ?? false, function($query, $search) {
            return $query->where('title', 'like', '%' .$search. '%')
                            ->orWhere('body', 'like', '%' .$search. '%');
        });

        // query pencarian dengan kategori
        $query->when( $filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) {
                        $query->where('slug', $category);
            });
        });

        // Arrow Function
        $query->when( $filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn($query) =>
                $query->where('username', $author)
            )
        );
    }

    public function category()
    {
        // Hubungan satu ke satu
        return $this->belongsTo(Category::class);
    }

    // hubungan user menggantinya dengan nama author
    public function author(){

        return $this->belongsTo(User::class, 'user_id');

    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Penggunaan Slug otomatis
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
