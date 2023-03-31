<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacteristicValue extends Model
{
    use HasFactory;

    /**
     * @return string
     */
    protected $table = 'tbl_characteristic_values';

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }
}
