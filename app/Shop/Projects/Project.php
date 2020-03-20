<?php

namespace App\Shop\Projects;

use App\Shop\Companies\Company;
use App\Shop\Employees\Employee;
use App\Shop\Customers\Customer;
use App\Shop\Provinces\Province;
use App\Shop\States\State;
use Illuminate\Database\Eloquent\Model;


class Project extends Model
{

    protected $table = 'projects';

    protected $fillable = [
        'name',
        'budget',
        'company_id',
        'status'

    ];

    protected $hidden = [];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function employees(){
        return $this->belongsToMany(Employee::class);
    }



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


    public function provinces()
    {
        return $this->hasMany(Province::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function states()
    {
        return $this->hasMany(State::class);
    }

    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }


}
