<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    /**
     * @return string
     */
    protected $table = 'tbl_templates';

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

}
