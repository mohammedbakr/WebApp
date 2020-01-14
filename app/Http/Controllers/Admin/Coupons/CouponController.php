<?php

namespace App\Http\Controllers\Admin\Coupons;

use Illuminate\Http\Request;
use App\Shop\Coupons\Coupon;
use App\Shop\Coupons\Repositories\CouponRepository;
use App\Shop\Coupons\Repositories\Interfaces\CouponRepositoryInterface;
use App\Shop\Coupons\Requests\CreateCouponRequest;
use App\Shop\Coupons\Requests\UpdateCouponRequest;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
     /**
     * @var CouponRepositoryInterface
     */
    private $couponRepo;

    /**
     * CouponController constructor.
     * @param CouponRepositoryInterface $CouponRepository
     */
    public function __construct(CouponRepositoryInterface $couponRepository)
    {
        $this->couponRepo = $couponRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('admin.coupons.coupon');
    // }

    public function index()
    {
        $list = $this->couponRepo->listCoupons('created_at', 'desc');
        
        $coupons = $this->couponRepo->paginateArrayResults($list->all());

        return view('admin.coupons.list', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCouponRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCouponRequest $request)
    {
        $this->couponRepo->createCoupon($request->except('_token', '_method'));

        return redirect()->route('admin.coupons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $coupon = $this->couponRepo->findCouponById($id);
        
        return view('admin.coupons.show', compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.coupons.edit', ['coupon' => $this->couponRepo->findCouponById($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCouponRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCouponRequest $request, $id)
    {
        $coupon = $this->couponRepo->findCouponById($id);

        $update = new CouponRepository($coupon);
        $data = $request->except('_token', '_method');

        $update->updateCoupon($data);

        $request->session()->flash('message', 'Update successful');
        return redirect()->route('admin.coupons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = $this->couponRepo->findCouponById($id);

        $couponRepo = new CouponRepository($coupon);
        $couponRepo->deleteCoupon();

        return redirect()->route('admin.coupons.index')->with('message', 'Delete successful');
    }
}
