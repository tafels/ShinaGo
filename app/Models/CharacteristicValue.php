<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CharacteristicValue extends Model
{
    /**
     * @return string
     */
    protected $table = 'tbl_characteristic_value';

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCharacteristicId()
    {
        return $this->characteristic_id;
    }

    public function getPopular()
    {
        return $this->popular;
    }

    public function getPublished()
    {
        return $this->published;
    }

    public function getOrdering()
    {
        return $this->ordering;
    }

    public function getCharacteristic(): HasOne
    {
        return $this->hasOne(Characteristic::class, 'id','characteristic_id');
    }

    public function getCharacteristicValueByLocale()
    {
        return $this->hasOne(CharacteristicValueLanguage::class,'characteristic_value_id', 'id')
            ->whereIn('language',['*',request()->getLocale()]);
    }
    public function getCharacteristicGroupToLanguages(): HasMany
    {
        return $this->hasMany(CharacteristicValueLanguage::class,'characteristic_value_id', 'id')
            ->whereIn('language',['*',request()->getLocale()]);
    }
}
