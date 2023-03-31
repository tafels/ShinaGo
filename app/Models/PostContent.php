<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostContent extends Model
{
    use HasFactory;

    /**
     * @return string
     */
    protected $table = 'tbl_post_contents';

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }
}
