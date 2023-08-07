<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    /**
     * @return HasMany
     */
    public function getCharacteristicGroup(): HasMany
    {
        return $this->hasMany(CharacteristicValueGroup::class);
    }

    public function getCharacteristicLanguages()
    {
        return $this->hasManyThrough(
            CharacteristicValueLanguage::class,
            CharacteristicValueGroup::class,
            'characteristic_id',
            'parent_id',
            'id',
            'id'
        );
    }


//Characteristic
//  id - integer
//
//CharacteristicValueGroup
//  id - integer
//  characteristic_id - integer
//
//CharacteristicValueLanguage
//  id - integer
//  parent_id - integer

//return $this->hasManyThrough(
//  CharacteristicValueLanguage::class,
//  CharacteristicValueGroup::class,
//  'characteristic_id', // Внешний ключ в таблице `CharacteristicValueGroup` ...
//  'parent_id', // Внешний ключ в таблице `CharacteristicValueLanguage` ...
//  'id', // Локальный ключ в таблице `Characteristic` ...
//  'id' // Локальный ключ в таблице `CharacteristicValueGroup` ...
//);

    /**
     * @return HasMany
     */
    public function getBrands(): HasMany
    {
        return $this->hasMany(Brand::class);
    }
















}
