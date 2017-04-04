<?php

namespace Myrtle\Core\Addresses\Models;

use Myrtle\Phones\Models\CallingCode;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [
        'alpha_2_code',
        'alpha_3_code',
        'borders',
        'capital',
        'demonym',
        'languages',
        'latlng',
        'name',
		'region',
		'subregion',
		'translations',
		'timezones',
	];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
	protected $casts = [
        'borders' => 'array',
        'demonym' => 'array',
        'languages' => 'array',
		'latlng' => 'array',
		'timezones' => 'array',
        'translations' => 'array',
	];

    /**
     * Get all of the callings codes for the country
     */
	public function callingCodes()
	{
		return $this->hasMany(CallingCode::class);
	}
}
