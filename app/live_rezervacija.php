<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class live_rezervacija extends Model
{
    protected $fillable = [
        'treniruotes_data', 'laikas_nuo', 'laikas_iki', 'nuoroda', 'statusas',
    ];
    
    public function treniruote()
        {
            return $this->belongsTo(treniruote::class);
        }
        
        public function admin()
        {
            return $this->belongsTo(Admin::class);
        }
        
        public function getRouteKeyName()
    {
    	return 'id';
    }
}
