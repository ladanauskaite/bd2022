<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    protected $fillable = [
        'salespavadinimas',
    ];
    
   public function rezervacijas()
    {
        return $this->hasMany(rezervacija::class);
    }
    
    public function atsauktas()
        {
            return $this->hasMany(atsaukta::class);
        }
        
         public function admin()
        {
            return $this->belongsTo(Admin::class);
        }
}
