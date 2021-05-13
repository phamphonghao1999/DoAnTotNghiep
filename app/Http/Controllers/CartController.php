<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use Cart;
use Carbon\Carbon;
use App\Coupon;
use App\Slider;
class CartController extends Controller
{
    public function check_coupon(Request $request){
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y/m/d');
        $data = $request->all();
        $coupon = Coupon::where('coupon_code',$data['coupon'])->where('coupon_status',1)->where('coupon_date_end','>=',$today)->first();
        if($coupon){
            $count_coupon = $coupon->count();
            if($count_coupon>0){
                $coupon_session = Session::get('coupon');
                if($coupon_session==true){
                    $is_avaiable = 0;
                    if($is_avaiable==0){
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,

                        );
                        Session::put('coupon',$cou);
                    }
                }else{
                    $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,

                        );
                    Session::put('coupon',$cou);
                }
                Session::save();
                return redirect()->back()->with('message','Thêm mã giảm giá thành công');
            }

        }else{
            return redirect()->back()->with('error','Mã giảm giá không đúng - hoặc đã hết hạn');
        }
}
    public function gio_hang(Request $request){
        $meta_desc = 'Giỏ hàng của bạn';
        $meta_keywords  = 'Giỏ hang ajax';
        $meta_title   = 'Giỏ hàng ajax';
        $url_canonical = $request->url();
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();




        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        // dd($cate_product);
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(4)->get();

        return view('pages.cart.cart_ajax')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('url_canonical',$url_canonical)->with('meta_title',$meta_title)->with('slider',$slider)->with('all_product',$all_product);


    }


      public function add_cart_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id']==$data['cart_product_id']){
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
               
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
                );
                Session::put('cart',$cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
              
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],

            );
            Session::put('cart',$cart);
        }
       
        Session::save();

    }
    public function delete_product($session_id){
        $cart = Session::get('cart');
        if ($cart==true) {
            foreach ($cart as $key => $val) {
                if ($val['session_id']==$session_id) {
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('message','Xóa Sản Phẩm Thành Công');
        }else{
            return redirect()->back()->with('message','Xóa Sản Phẩm Thất Bại');
            }
       }

       public function update_cart(Request $request){
            $data = $request->all();
            $cart = Session::get('cart');
            if($cart==true){
                foreach ($data['cart_qty'] as $key => $qty) {
                   foreach ($cart as $session => $val) {
                        if ($val['session_id']==$key) {
                            $cart[$session]['product_qty'] = $qty;
                        }
                    } 
                }
                Session::put('cart',$cart);
                return redirect()->back()->with('message','Cập nhật Thành Công');
            }else{
                return redirect()->back()->with('message','Cập nhật Thất Bại');
            }
       }

       public function delete_all_product(){
        $cart = Session::get('cart');
        if ($cart==true) {
            Session::forget('cart');
            Session::forget('coupon');
            return redirect()->back()->with('message','Xóa Thành Công');
        }
       }

  
    public function save_cart(Request $request, $id){	
    	$productId = $request->productid_hidden;
    	$quantity = $request->qty;
    	$product_info = DB::table('tbl_product')->where('product_id',$productId)->first();
	// Cart::add('293ad', 'Product 1', 1, 9.99, 550);
    	// Cart::destroy();
    	$data['id']= $product_info->product_id;
    	$data['qty']= $quantity;
    	$data['name']= $product_info->product_name;
    	$data['price']= $product_info->product_price;
    	$data['weight']= $product_info->product_price;
    	$data['options']['image']= $product_info->product_image;

		// dd($data);
    	Cart::add($data);

		// return Redirect()->route('show-cart');
    	return Redirect::to('/show-cart');
    	
    }
    public function show_cart(Request $request){

        $meta_desc = '';
        $meta_keywords  = '';
        $meta_title   = '';
        $url_canonical = $request->url();
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();




    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
    	// dd($cate_product);
    	$brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

    	return view('pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('url_canonical',$url_canonical)->with('meta_title',$meta_title)->with('$slider',$slider);


    }
    public function delete_to_cart($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/show-cart');
    }
    public function update_cart_quantity(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');

    }
}
