@extends('layout')
@section('content')
<div class="slider-with-banner">
                <div class="container">
                    <div class="row">
                        <!-- Begin Category Menu Area -->
                        <div class="col-lg-3">
                            <!--Category Menu Start-->
                            <div class="category-menu">
                                <div class="category-heading">
                                    <h2 class="categories-toggle"><span>DANH MỤC SẢN PHẨM</span></h2>

                                </div>
                                <div class="category-menu-list">
                                    <ul>
                                         @foreach($category as $key => $cate) 
                                        <li><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                                        @endforeach

                                    </ul>
                                </div>
                             


                            </div>

                                
                            <!--Category Menu End-->

                        </div>


                        <!-- Category Menu Area End Here -->
                                                <!-- Begin Slider Area -->
                        <div class="col-lg-9">
                            <div class="slider-area pt-sm-30 pt-xs-30">
                                <div class="slider-active owl-carousel">
                                    <!-- Begin Single Slide Area -->
                                                            @php 
                            $i = 0;
                        @endphp
                        @foreach($slider as $key => $slide)
                            @php 
                                $i++;
                            @endphp
                                    <div class="single-slide align-center-left animation-style-02">
                                        <img alt="{{$slide->slider_desc}}" src="{{asset('public/uploads/slider/'.$slide->slider_image)}}">
                                        <div class="slider-progress"></div>
                                        <div class="slider-content">
                                            <h5 style="color: white;">Mã Giảm Giá <span>-10% tất cả mặt hàng</span> </h5>
                                            <h2 style="color: white;">SONY SMART TIVI </h2>
                                            <h3 style="color: white;">Chỉ từ <span>10.000.000</span></h3>
                                           
                                        </div>
                                    </div>
                                     @endforeach  
                                    <!-- Single Slide Area End Here -->
                                </div>
                            </div>
                        </div>
                        <!-- Slider Area End Here -->
                    </div>
                </div>
            </div>
            <!-- Slider With Category Menu Area End Here -->
            <!-- Begin Li's Static Banner Area -->
            <div class="li-static-banner pt-20 pt-sm-30 pt-xs-30">
                <div class="container">
                    <div class="row">
                        <!-- Begin Single Banner Area -->
                        <div class="col-lg-4 col-md-4">
                            <div class="single-banner pb-xs-30">
                                <a href="#">
                                    <img src="{{asset('public/frontend/home/images/banner/5.jpg')}}" alt="Li's Static Banner">
                                </a>
                            </div>
                        </div>
                        <!-- Single Banner Area End Here -->
                        <!-- Begin Single Banner Area -->
                        <div class="col-lg-4 col-md-4">
                            <div class="single-banner pb-xs-30">
                                <a href="#">
                                    <img src="{{asset('public/frontend/home/images/banner/6.jpg')}}" alt="Li's Static Banner">
                                </a>
                            </div>
                        </div>
                        <!-- Single Banner Area End Here -->
                        <!-- Begin Single Banner Area -->
                        <div class="col-lg-4 col-md-4">
                            <div class="single-banner">
                                <a href="#">
                                    <img src="{{asset('public/frontend/home/images/banner/7.jpg')}}" alt="Li's Static Banner">
                                </a>
                            </div>
                        </div>
                        <!-- Single Banner Area End Here -->
                    </div>
                </div>
            </div>
<div class="content-wraper pt-60 pb-60">
    <div class="container">
        <div class="li-section-title">
             <h2>
                  <span>{{ __('SẢN PHẨM MỚI NHẤT') }}</span>
            </h2>
                               
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Begin Li's Banner Area -->
                
                <!-- Li's Banner Area End Here -->
                <!-- shop-top-bar start -->
               
                </div>
                <!-- shop-top-bar end -->
                <!-- shop-products-wrapper start -->
                <div class="shop-products-wrapper">
                    <div class="tab-content">
                        <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                            <div class="product-area shop-product-area">
                                <div class="row">
                                    @foreach($all_product as $key => $product)
                                    <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
                                        <form>
                                                @csrf
                                            <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                            
                                            <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                            <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">

                                   <!--          <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
                                                <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" />
                                                <h2>{{number_format($product->product_price).' '.'VNĐ'}}</h2>
                                                <p>{{$product->product_name}}</p>
 -->
                                             
                                             </a>
                                            <!-- <button type="button" class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">Thêm giỏ hàng</button> -->
                                            </form>
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
                                                    <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="shop-left-sidebar.html">Graphic Corner</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="single-product.html">{{$product->$multisp}}</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">{{number_format($product->product_price).' '.'VNĐ'}}</span>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                       <li class="add-cart active"><button type="button" class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">Thêm giỏ hàng</button></li>
                                                       
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                     @endforeach
                                </div>
                            </div>
                        </div>
                       
                        
                        
                    </div>
                </div>
                <!-- shop-products-wrapper end -->
            </div>
        </div>
    </div>
</div>
    
@endsection