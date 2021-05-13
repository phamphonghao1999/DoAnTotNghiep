<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class language extends Model
{
   public $timestamps = false; //set time to false
    protected $fillable = [
    	'sp_vi', 'sp_en'
    ];
    protected $primaryKey = 'id_language ';
 	protected $table = 'tbl_language';
}
