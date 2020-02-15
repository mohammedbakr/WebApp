<?php

namespace App\Http\Controllers\Front;

use App\Shop\Couriers\Repositories\Interfaces\CourierRepositoryInterface;
use App\Shop\Companies\Repositories\CompanyRepository;
use App\Shop\Companies\Repositories\Interfaces\CompanyRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Shop\Orders\Order;
use App\Shop\Orders\Transformers\OrderTransformable;

class CompaniesController extends Controller
{
    use OrderTransformable;

    /**
     * @var CompanyRepositoryInterface
     */
    private $companyRepo;

    /**
     * @var CourierRepositoryInterface
     */
    private $courierRepo;

    /**
     * CompaniesController constructor.
     *
     * @param CourierRepositoryInterface $courierRepository
     * @param CompanyRepositoryInterface $companyRepository
     */
    public function __construct(
        CourierRepositoryInterface $courierRepository,
        CompanyRepositoryInterface $companyRepository
    ) {
        $this->companyRepo = $companyRepository;
        $this->courierRepo = $courierRepository;
    }

    public function index()
    {
        $company = $this->companyRepo->findCompanyById(auth()->user()->id);

        $companyRepo = new CompanyRepository($company);
        $orders = $companyRepo->findOrders(['*'], 'created_at');

        $orders->transform(function (Order $order) {
            return $this->transformOrder($order);
        });

        $orders->load('products');

        $addresses = $companyRepo->findAddresses();

        return view('front.companies', [
            'company' => $company,
            'orders' => $this->companyRepo->paginateArrayResults($orders->toArray(), 15),
            'addresses' => $addresses
        ]);
    }

    public function show($id)
    {
        $company = $this->companyRepo->findCompanyById($id);

        $companyRepo = new CompanyRepository($company);
        $orders = $companyRepo->findOrders(['*'], 'created_at');

        $orders->transform(function (Order $order) {
            return $this->transformOrder($order);
        });

        $orders->load('products');

        $addresses = $companyRepo->findAddresses();

        return view('front.companies', [
            'company' => $company,
            'orders' => $this->companyRepo->paginateArrayResults($orders->toArray(), 15),
            'addresses' => $addresses
        ]);
    }
}
