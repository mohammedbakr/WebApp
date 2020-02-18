<?php

namespace App\Shop\Companies\Transformations;

use App\Shop\Companies\Company;

trait CompanyTransformable
{
    protected function transformCompany(Company $company)
    {
        $prop = new Company;
        $prop->id = (int) $company->id;
        $prop->name = $company->name;
        $prop->email = $company->email;
        $prop->status = (int) $company->status;

        return $prop;
    }
}
