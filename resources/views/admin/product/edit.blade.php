@extends('admin.master')
@section('controller','Product')
@section('action','Edit')
@section('content')
<!-- /.col-lg-12 -->
<form action="" name="frmEditProduct" method="POST" enctype="multipart/form-data">
<div class="col-lg-7" style="padding-bottom:120px">
    <!-- Thông báo lỗi -->
    @include('admin.blocks.error')
    <input type="hidden" name="_token" id="input_token" class="form-control" value="{!! csrf_token() !!}">
        <div class="form-group">
            <label>Category Parent</label>
            <select class="form-control" name="slt_parent">
                <option value="0">Please Choose Category</option>
                 <?php recursiveCategory($category_product,$parent = 0,$str='',$select=0) ?>
            </select>
        </div>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{!! old('txtCateName',isset($product) ? $product['name'] : null) !!}"/>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input class="form-control" name="txtPrice" placeholder="Please Enter Password" value="{!! old('txtPrice',isset($product) ? $product['price'] : null) !!}"/>
        </div>
        <div class="form-group">
            <label>Intro</label>
            <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro',isset($product) ? $product['intro'] : null) !!}</textarea>
            <script type="text/javascript">ckeditor("txtIntro")</script>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent',isset($product) ? $product['content'] : null) !!}</textarea>
            <script type="text/javascript">ckeditor("txtContent")</script>
        </div>
          <div class="form-group">
            <label>Image Current</label>
             <img src="{!! asset('resources/upload/'.$product['image']) !!}" alt="" width="150px" height="150px" >
             <input type="hidden" name="img_current" value="{!! $product['image'] !!}">
        </div>
        <div class="form-group">
            <label>Images</label>
            <input type="file" name="fImages" >
        </div>
        <div class="form-group">
            <label>Product Keywords</label>
            <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{!! old('txtPrice',isset($product) ? $product['keywords'] : null) !!}"/>
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription',isset($product) ? $product['description'] : null) !!}</textarea>
            <script type="text/javascript">ckeditor("txtDescription")</script>
        </div>
        <div class="form-group">
            @if(isset($product) && $product['status']==1)
             <label class="radio-inline">
                <input name="rdoStatus" value="0"  type="radio">Invisible
            </label>
            <label class="radio-inline">
                <input name="rdoStatus" value="1" checked="checked" type="radio">Visible
            </label>
        @elseif($product['status']==0)
            <label class="radio-inline">
            <input name="rdoStatus" value="0" checked="checked" type="radio">Invisible
            </label>
            <label class="radio-inline">
                <input name="rdoStatus" value="1"  type="radio"> Visible
            </label>
        @else
            <label class="radio-inline">
            <input name="rdoStatus" value="0"  type="radio">Invisible
            </label>
            <label class="radio-inline">
                <input name="rdoStatus" value="1" type="radio"> Visible
            </label>
        @endif
        </div>
        <button type="submit" class="btn btn-default">Product Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
</div>
<style type="text/css" media="screen">
    .img_detail
    {
        border: 1px solid #ccc;
        box-shadow: 5px 5px 5px #888888;
    }
    .icon_del
    {
        position: relative;
        top: -58px;
        left: -28px;
        width: 20px;
        height: 20px;
        padding: 2.5px 0;
        font-size: 10px;
    }
    #insert
    {
        margin-top: 15px;
    }
</style>
<div class="col-md-1">
</div>
<div class="col-md-4">
    @foreach($product_image as $key => $item)
        <div class="form-group" id="{!! $key !!}">
           <img src="{!! asset('resources/upload/detail/'.$item['image']) !!}" alt="" width="200px" height="150px" idHinh="{!! $item['id'] !!}" id="{!! $key !!}" class="img_detail">
           <a href="javascript:void(0)" type="button" title="" id="del_img_demo" class="btn btn-danger btn-circle icon_del"><i class="fa fa-times"></i></a>
        </div>
    @endforeach
    <!-- <input type="file" name="fEditDetail[]" /> -->
    <button type="button" class="btn btn-primary" id="addImages">Add Images</button>
    <div id="insert"></div>
</div>
</form>
@stop
