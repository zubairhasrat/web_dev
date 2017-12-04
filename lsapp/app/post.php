<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //table name
    protected $table='posts';
    //primary key
    public $primarykey='id';
    //timestamp
    public $timestamp=true;

    public function user(){
        return $this->belongsTo('App\User');
    }
    public $fillable = ['title','body','cover_image','user_id'];
}
