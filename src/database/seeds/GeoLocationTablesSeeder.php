<?php

use Illuminate\Database\Seeder;

class GeoLocationTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $api = file_get_contents('https://restcountries.eu/rest/v1/all');
		$countries = collect(json_decode($api, true))->sortBy('name');

		$countries->each(function($item, $key) {

			$country = Myrtle\Core\Addresses\Models\Country::create([
				'name' => $item['name'],
				'alpha_2_code' => $item['alpha2Code'],
				'alpha_3_code' => $item['alpha3Code'],
				'capital' => $item['capital'],
				'region' => $item['region'],
				'subregion' => $item['subregion'],
				'languages' => $item['languages'],
				'translations' => $item['translations'],
				'latlng' => $item['latlng'],
				'demonym' => $item['demonym'],
				'timezones' => $item['timezones'],
				'borders' => $item['borders'],
			]);

			collect($item['callingCodes'])->each(function($code, $key) use ($country) {
				if(! empty($code))
				{
					$country->callingCodes()->create(['number' => $code]);
				}
			});

			if($country->callingCodes->isEmpty())
			{
				$country->callingCodes()->create([]);
			}
		});
    }
}
