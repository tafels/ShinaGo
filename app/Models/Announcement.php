<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    /**
     * @return string
     */
    protected $table = 'tbl_announcements';

    public function getTable()
    {
        return $this->table;
    }
}
