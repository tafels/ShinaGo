<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Characteristic extends Model
{
    use HasFactory;

    /**
     * @return string
     */
    protected $table = 'tbl_characteristics';

    protected $brand;

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    public function getCharacteristic()
    {

    }

    public function getFilterGroup($group_id)
    {

    }

    /**
     * @return HasMany
     */
    public function getCharacteristicValue(): HasMany
    {
        return $this->hasMany(CharacteristicValue::class);
    }

    /**
     * @return HasMany
     */
    public function getBrands(): HasMany
    {
        return $this->hasMany(Brand::class);
    }
















}
