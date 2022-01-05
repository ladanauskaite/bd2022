<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class atsaukta extends Model
{
    protected $fillable = [
        'treniruotes_data', 'laikas_nuo', 'laikas_iki',
    ];
    
    public function sportoklubas()
    {
        return $this->belongsTo(sportoklubas::class);
    }
    
    public function rezervacija()
        {
            return $this->belongsTo(rezervacija::class);
        }
        
        public function sale()
        {
            return $this->belongsTo(sale::class);
        }
        
        public function treniruote()
        {
            return $this->belongsTo(treniruote::class);
        }
        
}
