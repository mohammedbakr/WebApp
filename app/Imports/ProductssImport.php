<?php

namespace App\Imports;

use App\Shop\Products\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductssImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
        
                'sku'     => $row[0],
                'name'    => $row[1], 
                'name_ar'    => $row[2], 
                'description' =>  $row[3], 
                'description_ar' =>  $row[4], 
                'color' =>  $row[5], 
                'size' =>  $row[6], 
                'factory' =>  $row[7], 
                'type' =>  $row[8],                
                'quantity' =>  $row[9], 
                'price' =>  $row[10],

        ]);
    }
}
