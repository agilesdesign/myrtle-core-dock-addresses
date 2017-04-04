<?php

namespace Myrtle\Core\Addresses\Models;

use Repertoire\Models\Traits\CreatedBy;
use Repertoire\Models\Traits\DeletedBy;
use Repertoire\Models\Traits\UpdatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Repertoire\Models\Constants\EloquentDates;

class Address extends Model
{
    use CreatedBy, UpdatedBy, DeletedBy, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [EloquentDates::ARCHIVED_AT, Model::CREATED_AT, EloquentDates::DELETED_AT, Model::UPDATED_AT];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [EloquentDates::ARCHIVED_AT, 'formatted', 'type_id'];

    /**
     * The relationships that should be touched on save.
     *
     * @var array
     */
    protected $touches = ['addressable'];

    /**
     * Get all of the owning addressable models.
     */
    public function addressable()
    {
        return $this->morphTo();
    }

    /**
     * Get the author that wrote the book.
     */
    public function type()
    {
        return $this->belongsTo(AddressType::class);
    }

    /**
     * Scope a query to by address types
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $id
     * @return Builder
     */
    public function scopeByType(Builder $query, $id)
    {
        return $query->whereIn('type_id', collect($id)->toArray());
    }
}
