<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignGallery extends Model
{
      protected $fillable = [
        'photos' , 'designs_id', 
    ];

    protected $hidden = [

    ];

    public function design(){
        return $this->belongsTo(Design::class, 'designs_id', 'id');
    }
}