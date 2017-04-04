<?php

use Illuminate\Database\Seeder;

class AddressTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect(static::types())->each(function ($item) {
            Myrtle\Core\Addresses\Models\AddressType::updateOrCreate(['name' => $item]);
        });
    }

    /**
     * List of predefined address types
     *
     * @return array
     */
    public static function types()
    {
        return ['Mailing', 'Billing'];
    }
}
