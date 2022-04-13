<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Design extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name' , 'users_id', 'categories_id', 'date', 'title', 'description', 'slug'
    ];

    protected $hidden = [

    ];

    public function galleries(){
        return $this->hasMany(DesignGallery::class, 'designs_id' ,'id');
    }

     public function user(){
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'categories_id','id');
    }
}
