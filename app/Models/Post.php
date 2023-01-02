<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;


    // protected $fillable = ['tittle','slug','excerpt','body'];
    protected $guarded = ['id'];
    protected $with = ['category', 'user'];

    /* public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('tittle', 'like', '%'. $search. '%')
                        ->orWhere('body', 'like', '%'. $search. '%');
        });

        $query->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function($query) use ($category) {
                $query->where('slug', $category);
            });
        });
    } */
    
    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where(function($query) use ($search){
                $query->where('tittle', 'like' , '%' . $search . '%');
            });
        });

        $query->when($filters['category'] ?? false, function($query, $category){
            $query->whereHas('category', fn($query) =>
                $query->where('slug', $category)
            );
        });

        $query->when($filters['user'] ?? false, function($query, $user){
            $query->whereHas('user', fn($query) =>
                $query->where('username', $user)
            );
        });
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName(){
        return 'slug';
    }

    public function sluggable(): array
    {
        return[
            'slug'=>[
                'source'=>'tittle'
            ]
            ];
    }
}

// ! SEARCH NYA NGACO LAGI
// TODO FIX THAT MF!!!!!!!!!!!!