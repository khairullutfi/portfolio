<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name' , 'users_id', 'category_projects_id', 'title', 'description', 'fitur', 'slug'
    ];

    protected $hidden = [

    ];

    public function galleries(){
        return $this->hasMany(ProjectGallery::class, 'projects_id' ,'id');
    }

     public function user(){
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function category_project(){
        return $this->belongsTo(CategoryProject::class, 'category_projects_id','id');
    }
}
