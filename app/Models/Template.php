<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    /**
     * @return string
     */
    protected $table = 'tbl_templates';

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getParams()
    {
        return json_decode($this->params);
    }

    public function getPublished()
    {
        return $this->published;
    }

}
