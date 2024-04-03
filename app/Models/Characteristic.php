<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Characteristic extends Model
{
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

    public function getId()
    {
        return $this->getId();
    }

    public function getShortName()
    {
        return $this->short_name;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getIsMain()
    {
        return $this->is_main;
    }

    public function getGroupId()
    {
        return $this->group_id;
    }

    public function getMultiple()
    {
        return $this->multiple;
    }

    public function getParams()
    {
        return json_decode($this->params);
    }

    public function getOrderingMain()
    {
        return $this->ordering_main;
    }

    public function getOrderingSlug()
    {
        return $this->ordering_slug;
    }

    public function getOrdering()
    {
        return $this->ordering;
    }

    public function getPublished()
    {
        return $this->published;
    }


    public function getCharacteristicValues()
    {
        return $this->hasMany(CharacteristicValue::class, 'characteristic_id','id');
    }

    public function getCharacteristicValue()
    {
        return $this->hasMany(CharacteristicValue::class, 'characteristic_id','id')->get();
    }

    public function getCharacteristicLanguages()
    {
        return $this->hasManyThrough(
            CharacteristicValueLanguage::class,
            CharacteristicValue::class,
            'characteristic_id',
            'characteristic_value_id',
            'id',
            'id'
        )->get();
    }

    public function getCharacteristicByLocal()
    {
        return $this->hasManyThrough(
            CharacteristicValueLanguage::class,
            CharacteristicValue::class,
            'characteristic_id',
            'characteristic_value_id',
            'id',
            'id'
        )->get();
    }

    /**
     * @return HasMany
     */
    public function getBrands(): HasMany
    {
        return $this->hasMany(Brand::class);
    }
















}
