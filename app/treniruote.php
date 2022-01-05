<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class treniruote extends Model
{
        protected $fillable = [
            'treniruotespavadinimas', 'treniruotestekstas',
        ];

        public function rezervacijas()
        {
            return $this->hasMany(rezervacija::class);
        }
        
        public function live_rezervacijas()
        {
            return $this->hasMany(live_rezervacija::class);
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
