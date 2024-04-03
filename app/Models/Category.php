<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    protected $table = 'tbl_categories';

    public function getTable()
    {
        return $this->table;
    }

    public function getTemplateId()
    {
        return $this->template_id;
    }

    /**
     * @return HasOne
     */
    public function getTemplate(): HasOne
    {
        return $this->hasOne(Template::class, 'id', 'template_id');
    }

    public function getParentCategory()
    {
        return $this->hasOne(Category::class, 'id','parent_id')->first();
    }

    /**
     * @return HasMany
     */
    public function getChildCategory(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id')->with('getChildCategory');
    }

    public function getContentLocale($locale = null)
    {

        if(!$locale){
            $locale = request()->getLocale();
        }

        return $this->hasOne(CategoryContent::class)->where('language', $locale)->first();
    }

    /**
     * @return HasMany
     */
    public function getContent(): HasMany
    {
        return $this->hasMany(CategoryContent::class);
    }

    public function getId()
    {
        return $this->id;
    }


}
