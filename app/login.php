<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
	public $timestamps = false;
	protected $fillable = [
		'admin_email', 'admin_passwork', 'admin_name', 'admin_phone'
	];
	protected $primarykey = 'admin_id';
	protected $table = 'tbl_admin';
}