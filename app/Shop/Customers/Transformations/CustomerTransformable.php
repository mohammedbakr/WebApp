<?php

namespace App\Shop\Customers\Transformations;

use App\Shop\Customers\Customer;

trait CustomerTransformable
{
    protected function transformCustomer(Customer $customer)
    {
        $prop = new Customer;
        $prop->id = (int) $customer->id;
        $prop->name = $customer->name;
        $prop->email = $customer->email;
        $prop->company = $customer->company;
        $prop->identity_card = $customer->identity_card;
        $prop->commerical_register = $customer->commerical_register;
        $prop->undertaking = $customer->undertaking;
        $prop->status = (int) $customer->status;

        return $prop;
    }
}
