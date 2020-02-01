<?php

namespace App\Shop\Companies\Repositories\Interfaces;

use App\Shop\Addresses\Address;
use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Shop\Companies\Company;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as Support;

interface CompanyRepositoryInterface extends BaseRepositoryInterface
{
    public function listCompanies(string $order = 'id', string $sort = 'desc', array $columns = ['*']) : Support;

    public function createCompany(array $params) : Company;

    public function updateCompany(array $params) : bool;

    public function findCompanyById(int $id) : Company;

    public function deleteCompany() : bool;

    public function attachAddress(Address $address) : Address;

    public function findAddresses() : Support;

    public function findOrders() : Collection;

    public function searchCompany(string $text) : Collection;

    public function charge(float $amount, array $options);
}
