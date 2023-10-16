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

    /**
     * @return HasOne
     */
    public function getMenuLanguage(): HasOne
    {
        return $this->hasOne(MenuLanguage::class);
    }

    public function getParent()
    {
        return $this->hasOne(Menu::class, 'id', 'parent_id')->get();
    }

    public function getChild()
    {
        return $this->hasMany(Menu::class, 'parent_id', 'id')->get();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return integer
     */
    public function getParentId()
    {
        return $this->parent_id;
    }

    /**
     * @param integer $parent_id
     */
    public function setParentId($parent_id): void
    {
        $this->attributes['parent_id'] = $parent_id;
    }

    /**
     * @return integer
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param integer $category_id
     */
    public function setCategoryId($category_id): void
    {
        $this->attributes['category_id'] = $category_id;
    }

    /**
     * @return string
     */
    public function getMenuType(): string
    {
        return $this->menu_type;
    }

    /**
     * @param $menu_type
     */
    public function setMenuType($menu_type)
    {
        $this->attributes['menu_type'] = $menu_type;
    }

    /**
     * @return string
     */
    public function getParams(): string
    {
        return $this->params;
    }

    /**
     * @param string $params
     */
    public function setParams(string $params): void
    {
        $this->attributes['params'] = $params;
    }

    /**
     * @return string
     */
    public function getOrdering(): string
    {
        return $this->ordering;
    }

    /**
     * @param $ordering
     */
    public function setOrdering($ordering)
    {
        $this->attributes['ordering'] = $ordering;
    }

    /**
     * @return boolean
     */
    public function getPublished(): bool
    {
        return $this->published;
    }

    /**
     * @param $published
     */
    public function setPublished($published)
    {
        $this->attributes['published'] = $published;
    }


}
