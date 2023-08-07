<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CharacteristicValueGroup extends Model
{
    use HasFactory;

    /**
     * @return string
     */
    protected $table = 'tbl_characteristic_value_groups';

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    public function getCharacteristic(): HasOne
    {
        return $this->hasOne(Characteristic::class, 'id','characteristic_id');
    }

    public function getCharacteristicGroupToLanguage(): HasOne
    {
        return $this->HasOne(CharacteristicValueLanguage::class,'parent_id', 'id')
            ->where('language', '*')
                ->orWhere('language', request()->getLocale());
    }
    public function getCharacteristicGroupToLanguages(): HasMany
    {
        return $this->hasMany(CharacteristicValueLanguage::class,'parent_id', 'id');
    }
}
