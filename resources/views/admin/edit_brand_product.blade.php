@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật thương hiệu
                        </header> 
                     
                        <div class="panel-body">
                          @foreach($edit_brand_product as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-brand-product/'.$edit_value->brand_id)}}" method="post">
                                  {{ csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" value="{{ $edit_value->brand_name }}" name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="brand_product_desc" id="exampleInputPassword1" >{{ $edit_value->brand_desc }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">từ khóa danh mục</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="category_product_keywords" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                </div>
                               
                               
                                <button type="submit" name="update_brand_product" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>
                            @endforeach

                            {{-- <div class="position-center">
                                <form role="form" action="{{URL::to('/update-brand-product/'.$edit_brand_product->brand_id)}}" method="post">
                                  {{ csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" value="{{ $edit_brand_product->brand_name }}" name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="brand_product_desc" id="exampleInputPassword1" >{{ $edit_brand_product->brand_desc }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">từ khóa danh mục</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="category_product_keywords" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                </div>
                               
                               
                                <button type="submit" name="update_brand_product" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div> --}}
                            
                        </div>
                    </section>

            </div>
@endsection