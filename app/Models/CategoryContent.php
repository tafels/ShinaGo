<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryContent extends Model
{
    protected $table = 'tbl_category_contents';

    public function getCategory()
    {
        $this->belongsTo(Category::class);
    }
    public function getCategoryId()
    {
        $this->category_id;
    }

    public function getTitle()
    {
        $this->title;
    }

    public function getDescription()
    {
        $this->description;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getLanguage()
    {
        $this->language;
    }

}
