<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    /**
     * @return string
     */
    protected $table = 'tbl_brands';

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }
}
