<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kainorastis extends Model
{
    protected $fillable = [
        'kainospavadinimas', 'suma', 'laikotarpis', 'kainostekstas',
    ];
    
    public function admin()
        {
            return $this->belongsTo(Admin::class);
        }
}
