<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    /**
     * @return string
     */
    protected $table = 'tbl_medias';

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }
}
