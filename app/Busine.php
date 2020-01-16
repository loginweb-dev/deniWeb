<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Laravelista\Comments\Commentable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Busine extends Model
{
    use SoftDeletes;
    use Sluggable,Commentable;
    
    protected $fillable = ['name', 'image', 'phone', 'addres', 'latitude', 'longitude', 'description', 'site', 'categoria_id', 'description_long', 'description_app', 'user_id', 'images', 'range_id', 'views', 'state'];
    protected $dates = ['deleted_at'];
    
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    
}
