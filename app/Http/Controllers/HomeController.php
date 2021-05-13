<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Mail;
use App\Slider;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();


class HomeController extends Controller
{
    public function send_mail(){
         //send mail
                $to_name = "Anh Hào Nè";
                $to_email = "phonghao252525@gmail.com";//send to this email
        
                $data = array("name"=>"Mail từ tài khoản khách hàng","body"=>'xác nhận mail'); //body of mail.blade.php
            
                Mail::send('pages.send_mail',$data,function($message) use ($to_name,$to_email){
                    $message->to($to_email)->subject('Gửi xác nhận');//send this mail with subject
                    $message->from($to_email,$to_name);//send from this mail
                });
                return redirect('/');
        //--send mail

    }
    public function index(request $request){
        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(10)->get();

        //seo
        $meta_desc = "Bán các loại tivi khác nhau";
        $meta_keywords = "tivi soni, tivi samsung, tivi đẹp,";
        $meta_title = "THẾ GIỚI TIVI";
        $url_canonical = $request->url();
        //--seo

    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
    	$brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

    	// $all_product = DB::table('tbl_product')
    	// ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
    	// ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
    	// ->orderby('tbl_product.product_id','desc')->get();

    	$all_product = DB::table('tbl_product') ->join('tbl_language', 'tbl_product.id_language', '=' , 'tbl_language.id_language')->where('product_status','0')->orderby('product_id','desc')->get();

    	 return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider);//cach1
        // return view('pages.home')->with(compact('cate_product','brand_product','all_product'));//cach 2
    }
    public function search(Request $request){

       //seo
        $meta_desc = "Bán các loại tivi khác nhau";
        $meta_keywords = "tivi soni, tivi samsung, tivi đẹp,";
        $meta_title = "THẾ GIỚI TIVI";
        $url_canonical = $request->url();
        //--seo
        

        $keywords = $request->keywords_submit;

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        // ->orderby('tbl_product.product_id','desc')->get();

        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();

        return view('pages.sanpham.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('url_canonical',$url_canonical)->with('meta_title',$meta_title);
    }
}
