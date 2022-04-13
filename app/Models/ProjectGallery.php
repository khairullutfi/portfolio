<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectGallery extends Model
{
      protected $fillable = [
        'photos' , 'projects_id', 
    ];

    protected $hidden = [

    ];

    public function project(){
        return $this->belongsTo(Project::class, 'projects_id', 'id');
    }
}
