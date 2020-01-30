<?php

use Illuminate\Database\Seeder;
use App\Shop\Types\Type;


class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            "type" => "Manager"

        ]);

        Type::create([
            "type" => "Engineer"

        ]);

        Type::create([
            "type" => "Accountant"

        ]);

        Type::create([
            "type" => "Purchasing Manager"

        ]);
    }
}
