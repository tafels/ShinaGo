<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{

    /**
     * @return string
     */
    protected $table = 'tbl_brand_models';

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }
}
