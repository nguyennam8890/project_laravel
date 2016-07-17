
@extends('admin.master')
@section('controller','Product')
@section('action','Add')
@section('content')

<form action="{!! url('/admin/product/add') !!}" method="POST" enctype="multipart/form-data">
<div class="col-lg-7" style="padding-bottom:120px">
    <!-- Thông báo lỗi -->
    @include('admin.blocks.error')
    <input type="hidden" name="_token" id="input_token" class="form-control" value="{!! csrf_token() !!}">
    <div class="form-group">
            <label>Category</label><select class="form-control" name="slt_parent">
                <option value="">Please Choose Category</option>
                <?php cate_parent($cate,0,"---|",old('slt_parent')); ?>
            </select>
        </div>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{!! old('txtName') !!}"/>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input class="form-control" name="txtPrice" placeholder="Please Enter Password" value="{!! old('txtPrice') !!}"/>
        </div>
        <div class="form-group">
            <label>Intro</label>
            <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro') !!}</textarea>
            <script type="text/javascript">ckeditor("txtIntro")</script>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent') !!}</textarea>
            <script type="text/javascript">ckeditor("txtContent")</script>
        </div>
        <div class="form-group">
            <label>Images</label>
            <input type="file" name="fImages">
        </div>
        <div class="form-group">
            <label>Product Keywords</label>
            <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{!! old('txtKeywords') !!}"/>
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea class="form-control" rows="3" name="txtDescription" >{!! old('txtDescription') !!}</textarea>
            <script type="text/javascript">ckeditor("txtDescription")</script>
        </div>
        <div class="form-group">
            <label>Product Status</label>
            <label class="radio-inline">
                <input name="rdoStatus" value="1" checked="" type="radio">Visible
            </label>
            <label class="radio-inline">
                <input name="rdoStatus" value="0" type="radio">Invisible
            </label>
        </div>
        <button type="submit" class="btn btn-default">Product Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
</div>
<div class="col-md-1">
</div>
<div class="col-md-4">
    @for($i = 1; $i <= 10 ; $i++)
        <div class="form-group">
           <lable>Image Product Detail {!! $i !!}</lable>
           <input type="file" name="fProductDetail[]">
        </div>
    @endfor
</div>
</form>
@endsection               
