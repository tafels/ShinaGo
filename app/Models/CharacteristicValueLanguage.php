<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CharacteristicValueLanguage extends Model
{
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

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function getCharacteristicValue(): HasOne
    {
        return $this->hasOne(CharacteristicValue::class, 'id','characteristic_value_id');
    }
}
