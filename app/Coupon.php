<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
   public $timestamps = false;
	protected $fillable = [
          'coupon_name',  'coupon_code',  'coupon_time', 'coupon_number', 'coupon_condition','coupon_date_end','coupon_date_star','coupon_status'
    ];  
 	protected $primaryKey = 'coupon_id';
 	protected $table = 'tbl_coupon';
}
