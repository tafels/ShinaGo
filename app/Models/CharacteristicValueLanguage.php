<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CharacteristicValueLanguage extends Model
{
    use HasFactory;

    /**
     * @return string
     */
    protected $table = 'tbl_characteristic_value_languages';

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    public function getCharacteristicGroup(): HasOne
    {
        return $this->hasOne(CharacteristicValueGroup::class, 'id','parent_id');
    }
}
