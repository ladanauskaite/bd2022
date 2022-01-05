<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class skelbimas extends Model
{
    protected $fillable = [
        'skelbimopavadinimas', 'skelbimonuotrauka', 'skelbimotekstas',
    ];
    
     public function admin()
        {
            return $this->belongsTo(Admin::class);
        }
}
