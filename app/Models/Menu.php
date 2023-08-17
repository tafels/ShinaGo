<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Menu extends Model
{
    use HasFactory;

    /**
     * @return string
     */
    protected $table = 'tbl_menu';

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    public function getMenuLanguage(): HasOne
    {
        return $this->hasOne(MenuLanguage::class);
    }

    public function getMenuTypeAttribute($value)
    {
        return ucfirst($value);
    }

    public function setMenuTypeAttribute($value)
    {
        $this->attributes['menu_type'] = strtolower($value);
    }
}
