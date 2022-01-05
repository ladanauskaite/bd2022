<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
        use Notifiable;
        
        public function sportoklubas()
        {
            return $this->belongsToMany('App\sportoklubas','admin_sportoklubas')->withTimestamps();
        }
    
        public function getNameAttribute($value)
        {
            return ucfirst($value);
        }
    
        public function hasRole($role)
        {
            return $this->role == $role;
        }
        
        public function kainorastis()
        {
            return $this->hasMany(kainorastis::class);
        }
        
        public function naujienas()
        {
            return $this->hasMany(naujiena::class);
        }
        
        public function paslaugas()
        {
            return $this->hasMany(paslauga::class);
        }
        
        public function skelbimas()
        {
            return $this->hasMany(skelbimas::class);
        }
        
        public function treniruotes()
        {
            return $this->hasMany(treniruote::class);
        }
        
        public function sales()
        {
            return $this->hasMany(sale::class);
        }

        protected $fillable = [
            'name', 'email', 'password','role',
        ];


        protected $hidden = [
            'password', 'remember_token',
        ];
}
