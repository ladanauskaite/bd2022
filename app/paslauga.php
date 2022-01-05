<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paslauga extends Model
{
    protected $fillable = [
        'paslaugospavadinimas', 'paslaugosnuotrauka', 'paslaugostekstas',
    ];
    
    public function admin()
        {
            return $this->belongsTo(Admin::class);
        }
}
