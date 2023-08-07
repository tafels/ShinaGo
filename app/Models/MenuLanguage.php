<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuLanguage extends Model
{
    use HasFactory;

    /**
     * @return string
     */
    protected $table = 'tbl_menu_languages';

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }
}
