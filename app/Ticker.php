<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticker extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','esin','google_symbol','url'];


    public function  getColumns()
    {
        return $this->fillable;
    }
}
