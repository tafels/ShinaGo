<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Catalog extends Model
{
    use HasFactory;

    /**
     * @return string
     */
    protected $table = 'tbl_catalogs';

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
    public function getParentCatalog()
    {
        return $this->hasOne(Catalog::class, 'id','parent_id');
    }

    /**
     * @return HasMany
     */
    public function getChildCatalog()
    {
        return $this->hasMany(Catalog::class, 'parent_id')->with('getChildCatalog');
    }

    /**
     * @return HasMany
     */
    public function getContent()
    {
        return $this->hasMany(CatalogContent::class);
    }



}
