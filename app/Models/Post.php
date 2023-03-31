<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;

    /**
     * @return string
     */
    protected $table = 'tbl_posts';

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
    public function getParentPost()
    {
        return $this->hasOne(Post::class, 'id','parent_id');
    }

    /**
     * @return HasOne
     */
    public function getTemplate()
    {
        return $this->hasOne(Template::class, 'id', 'template_id');
    }

    /**
     * @return HasMany
     */
    public function getChildPost()
    {
        return $this->hasMany(Post::class, 'parent_id')->with('getChildPost');
    }

    /**
     * @return HasMany
     */
    public function getContent()
    {
        return $this->hasMany(PostContent::class);
    }

}
