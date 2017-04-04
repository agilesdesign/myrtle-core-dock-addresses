<?php

namespace Myrtle\Core\Addresses\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Repertoire\Models\Traits\CanBeSearched;
use Myrtle\Permissions\Models\Traits\CanView;

class AddressType extends Model
{
    use CanView, CanBeSearched, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get all addresses for the address type
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses()
    {
        return $this->hasMany(Address::class, 'type_id');
    }
}
