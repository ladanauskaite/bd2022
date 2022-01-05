<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sportoklubas extends Model
{
    protected $fillable = [
        'sportoklubopavadinimas',
    ];
    
    public function rezervacijas()
    {
        return $this->hasMany(rezervacija::class);
    }
    
    public function atsauktas()
        {
            return $this->hasMany(atsaukta::class);
        }
        
    public function getRouteKeyName()
    {
    	return 'sportoklubopavadinimas';
    }
    
    public function admins()
    {
    	return $this->belongsToMany('App\Admin','admin_sportoklubas');
    }
}
