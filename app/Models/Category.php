<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    use HasFactory;

    /**
     * @return string
     */
    protected $table = 'tbl_categories';

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @return HasOne
     */
    public function getTemplate()
    {
        return $this->hasOne(Template::class, 'id', 'template_id');
    }

    /**
     * @return HasOne
     */
    public function getParentCategory()
    {
        return $this->hasOne(Category::class, 'id','parent_id');
    }

    /**
     * @return HasMany
     */
    public function getChildCategory()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('getChildCategory');
    }

    /**
     * @return HasMany
     */
    public function getContent()
    {
        return $this->hasMany(CategoryContent::class);
    }



}
