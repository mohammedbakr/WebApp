<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name'

    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function employees(){
        return $this->belongsToMany(Employees::class);
    }


}
