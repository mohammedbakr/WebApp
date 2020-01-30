<?php

namespace App\Shop\Types;

use Illuminate\Database\Eloquent\Model;
use App\Shop\Employees\Employees;

class Type extends Model
{
    protected $fillable = [
        'type'
    ];


    public function employees(){
        return $this->belongsToMany(Employees::class);
    }
}
