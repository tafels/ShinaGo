<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    /**
     * @return string
     */
    protected $table = 'tbl_countries';

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }
}
