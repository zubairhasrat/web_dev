<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
     //table name
     protected $table='tasks';
     //primary key
     public $primarykey='id';
     //timestamp
     public $timestamp=true;
}
