<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{

    protected $table = 'widgets';

    protected $guarded = ['id'];

    public function __toString()
    {
        return (string) $this->name;
    }

}