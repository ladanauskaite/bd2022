<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class naujiena extends Model
{
    protected $fillable = [
        'naujienospavadinimas', 'naujienosnuotrauka', 'naujienostekstas',
    ];
    
     public function admin()
        {
            return $this->belongsTo(Admin::class);
        }
}
