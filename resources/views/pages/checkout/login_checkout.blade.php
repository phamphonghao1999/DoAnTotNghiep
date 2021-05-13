@extends('layout')
@section('content')

	         <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Login Register</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- Begin Login Content Area -->
            <div class="page-section mb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                            <!-- Login Form s-->
                            <?php
							$message = Session::get('message');
							if($message){
								echo '<span class="text-alert">',$message, '</span>';
								Session::put('message',null);
							}

							?>
                            <form action="{{URL::to('/login-customer')}}" method="POST" >
                            	{{csrf_field()}}
                                <div class="login-form">
                                    <h4 class="login-title">Đăng nhập</h4>
                                    <div class="row">
                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Nhập Email</label>
                                            <input class="mb-0" type="email" name="email_account" placeholder="Email Address">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Password</label>
                                            <input class="mb-0" type="password" name="password_account" placeholder="Password">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                                <input type="checkbox" id="remember_me">
                                                <label for="remember_me">Nhớ mật khẩu</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                            <a href="#"> Quên mật khẩu?</a>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="register-button mt-0">Đăng nhập</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                            <form action="{{URL::to('/add-customer')}}" method="POST">
                            	{{ csrf_field() }}
                                <div class="login-form">
                                    <h4 class="login-title">Đăng ký</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Họ tên</label>
                                            <input class="mb-0" type="text" placeholder="Họ và tên">
                                        </div>
                                       <div class="col-md-6 col-12 mb-20">
                                            <label>Số điện thoại</label>
                                            <input class="mb-0" type="text" placeholder="Nhập số điện thoại">
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Email</label>
                                            <input class="mb-0" type="email" placeholder="Địa chỉ email">
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Mật khẩu</label>
                                            <input class="mb-0" type="password" placeholder="Điền mật khẩu">
                                        </div>
                                         
                                        <div class="col-12">
                                            <button class="register-button mt-0">Đăng kí</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection