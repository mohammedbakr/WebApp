<?php

namespace App\Http\Controllers\Front;

use App\Shop\Couriers\Repositories\Interfaces\CourierRepositoryInterface;
use App\Shop\Customers\Repositories\CustomerRepository;
use App\Shop\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Shop\Orders\Order;
use App\Shop\Orders\Transformers\OrderTransformable;
use App\Shop\Customers\Requests\UpdateCustomerRequest;

class AccountsController extends Controller
{
    use OrderTransformable;

    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepo;

    /**
     * @var CourierRepositoryInterface
     */
    private $courierRepo;

    /**
     * AccountsController constructor.
     *
     * @param CourierRepositoryInterface $courierRepository
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(
        CourierRepositoryInterface $courierRepository,
        CustomerRepositoryInterface $customerRepository
    ) {
        $this->customerRepo = $customerRepository;
        $this->courierRepo = $courierRepository;
    }

    public function index()
    {
        $list = $this->customerRepo->listCustomers('created_at', 'desc');

        $customer = $this->customerRepo->findCustomerById(auth()->user()->id);

        $customerRepo = new CustomerRepository($customer);
        $orders = $customerRepo->findOrders(['*'], 'created_at');

        $orders->transform(function (Order $order) {
            return $this->transformOrder($order);
        });

        $orders->load('products');

        $addresses = $customerRepo->findAddresses();

        if($customer->company == 1){
            return view('front.company', [
                'customers' => $this->customerRepo->paginateArrayResults($list->all()),
                'customer' => $customer,
                'orders' => $this->customerRepo->paginateArrayResults($orders->toArray(), 15),
                'addresses' => $addresses
            ]);
        }elseif($customer->company == 2){
            return view('front.engineer', [
                'customer' => $customer,
                'orders' => $this->customerRepo->paginateArrayResults($orders->toArray(), 15),
                'addresses' => $addresses
            ]);
        }elseif($customer->company == 3){
            return view('front.accountant', [
                'customer' => $customer,
                'orders' => $this->customerRepo->paginateArrayResults($orders->toArray(), 15),
                'addresses' => $addresses
            ]);
        }elseif($customer->company == 4){
            return view('front.purchasingManager', [
                'customer' => $customer,
                'orders' => $this->customerRepo->paginateArrayResults($orders->toArray(), 15),
                'addresses' => $addresses
            ]);
        }else {
            return view('front.accounts', [
                'customer' => $customer,
                'orders' => $this->customerRepo->paginateArrayResults($orders->toArray(), 15),
                'addresses' => $addresses
            ]);
        }
    }


    public function edit($id)
    {
    return view('front.companies.edit', ['customer' => $this->customerRepo->findCustomerById($id)]);
    }


    public function update(UpdateCustomerRequest $request, $id)
    {
        $customer = $this->customerRepo->findCustomerById($id);

        if($customer->company == 1){
            if(!$customer->identity_card){
                $request->validate([
                    'identity_card' => 'required|file',
                    'commerical_register' => 'required|file',
                    'undertaking' => 'required|file'
                ]);
            }
        }
        
        if($request->hasFile('identity_card')){
            $file = $request->file('identity_card');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/identity_cards/'), $filename);
            $customer->identity_card = $filename;
 
        }

        if($request->hasFile('commerical_register')){
            $file = $request->file('commerical_register');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/commerical_registers/'), $filename);
            $customer->commerical_register = $filename;
 
        }

        if($request->hasFile('undertaking')){
            $file = $request->file('undertaking');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/undertakings/'), $filename);
            $customer->undertaking = $filename;
 
        }

        $update = new CustomerRepository($customer);
        $data = $request->except('_method', '_token', 'password', 'identity_card', 'commerical_register', 'undertaking');

        if ($request->has('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }

        $update->updateCustomer($data);

        if($customer->company == 0 && $customer->company == 2 && $customer->company == 3 && $customer->company == 4){
            $request->session()->flash('message', 'Update successful');
            return redirect()->route('accounts');
        }else{
            $request->session()->flash('message', 'Update successful');
            return redirect()->route('comprojects.create');
        }
    }
}
