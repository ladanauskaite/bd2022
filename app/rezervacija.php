<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rezervacija extends Model
{
    protected $fillable = [
        'treniruotes_data', 'laikas_nuo', 'laikas_iki',
    ];
    
    public function sportoklubas()
    {
        return $this->belongsTo(sportoklubas::class);
    }
    
    public function sale()
        {
            return $this->belongsTo(sale::class);
        }
        
        public function treniruote()
        {
            return $this->belongsTo(treniruote::class);
        }
        
        public function admin()
        {
            return $this->belongsTo(Admin::class);
        }
        public function atsauktas()
        {
            return $this->hasMany(paslauga::class);
        }
    public function users()
    {
    	return $this->hasMany('App\User','user_rezervacija');
    }
}
