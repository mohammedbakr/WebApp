<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Shop\Products\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;



class ProductExportController implements FromView
{
    public function view(): View
    {
        return view('ExportProducts', [
            'products' => Product::all()
        ]);
    }
}