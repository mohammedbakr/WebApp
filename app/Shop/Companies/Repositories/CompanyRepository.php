<?php

namespace App\Shop\Companies\Repositories;

use App\Shop\Addresses\Address;
use Jsdecena\Baserepo\BaseRepository;
use App\Shop\Companies\Company;
use App\Shop\Companies\Exceptions\CreateCompanyInvalidArgumentException;
use App\Shop\Companies\Exceptions\CompanyNotFoundException;
use App\Shop\Companies\Exceptions\CompanyPaymentChargingErrorException;
use App\Shop\Companies\Exceptions\UpdateCompanyInvalidArgumentException;
use App\Shop\Companies\Repositories\Interfaces\CompanyRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection as Support;

class CompanyRepository extends BaseRepository implements CompanyRepositoryInterface
{
    /**
     * CompanyRepository constructor.
     * @param Company $company
     */
    public function __construct(Company $company)
    {
        parent::__construct($company);
        $this->model = $company;
    }

    /**
     * List all the employees
     *
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return \Illuminate\Support\Collection
     */
    public function listCompanies(string $order = 'id', string $sort = 'desc', array $columns = ['*']) : Support
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * Create the company
     *
     * @param array $params
     * @return Company
     * @throws CreateCompanyInvalidArgumentException
     */
    public function createCompany(array $params) : Company
    {
        try {
            $data = collect($params)->except('password')->all();

            $company = new Company($data);
            if (isset($params['password'])) {
                $company->password = bcrypt($params['password']);
            }

            $company->save();

            return $company;
        } catch (QueryException $e) {
            throw new CreateCompanyInvalidArgumentException($e->getMessage(), 500, $e);
        }
    }

    /**
     * Update the company
     *
     * @param array $params
     *
     * @return bool
     * @throws UpdateCompanyInvalidArgumentException
     */
    public function updateCompany(array $params) : bool
    {
        try {
            return $this->model->update($params);
        } catch (QueryException $e) {
            throw new UpdateCompanyInvalidArgumentException($e);
        }
    }

    /**
     * Find the company or fail
     *
     * @param int $id
     *
     * @return Company
     * @throws CompanyNotFoundException
     */
    public function findCompanyById(int $id) : Company
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new CompanyNotFoundException($e);
        }
    }

    /**
     * Delete a company
     *
     * @return bool
     * @throws \Exception
     */
    public function deleteCompany() : bool
    {
        return $this->delete();
    }

    /**
     * @param Address $address
     * @return Address
     */
    public function attachAddress(Address $address) : Address
    {
        $this->model->addresses()->save($address);
        return $address;
    }

    /**
     * Find the address attached to the company
     *
     * @return mixed
     */
    public function findAddresses() : Support
    {
        return $this->model->addresses;
    }

    /**
     * @param array $columns
     * @param string $orderBy
     *
     * @return Collection
     */
    public function findOrders($columns = ['*'], string $orderBy = 'id') : Collection
    {
        return $this->model->orders()->get($columns)->sortByDesc($orderBy);
    }

    /**
     * @param string $text
     * @return mixed
     */
    public function searchCompany(string $text = null) : Collection
    {
        if (is_null($text)) {
            return $this->all();
        }
        return $this->model->searchCompany($text)->get();
    }

    /**
     * @param int $amount
     * @param array $options
     * @return \Stripe\Charge
     * @throws CompanyPaymentChargingErrorException
     */
    public function charge(float $amount, array $options)
    {
        try {
            return $this->model->charge($amount * 100, $options);
        } catch (\Exception $e) {
            throw new CompanyPaymentChargingErrorException($e);
        }
    }
}
