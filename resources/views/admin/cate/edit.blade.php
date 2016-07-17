
@extends('admin.master')
@section('controller','Category')
@section('action','Edit')
@section('content')
<div class="col-lg-7" style="padding-bottom:120px">
    <!-- Thông báo lỗi -->
    @include('admin.blocks.error')
    <form action="" method="POST">
    <input type="hidden" name="_token" id="input_token" class="form-control" value="{!! csrf_token() !!}">
        <div class="form-group">
            <label>Category Parent</label>
            <select class="form-control" name="slt_parent">
                <option value="0">Please Choose Category</option>
                    <?php  recursiveCategory($parent,0,$str="---|",$data['parent_id']); ?>
            </select>
        </div>
        <div class="form-group">
            <label>Category Name</label>
            <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" value="{!! old('txtCateName',isset($data) ? $data['name'] : null) !!}"/>
        </div>
        <div class="form-group">
            <label>Category Order</label>
            <input class="form-control" name="txtOrder" placeholder="Please Enter Category Order" value="{!! old('txtOrder',isset($data) ? $data['order'] : null) !!}"/>
        </div>
        <div class="form-group">
            <label>Category Keywords</label>
            <input class="form-control" name="txtKeyword" placeholder="Please Enter Category Keywords" value="{!! old('txtKeyword',isset($data) ? $data['keyword'] : null) !!}"/>
        </div>
        <div class="form-group">
            <label>Category Description</label>
            <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription',isset($data) ? $data['description'] : null) !!}</textarea>
            <script type="text/javascript">ckeditor("txtDescription")</script>
        </div>
        <div class="form-group">
            <label>Category Status</label>
        @if(isset($data) && $data['status']==1)
             <label class="radio-inline">
                <input name="rdoStatus" value="0" checked="checked" type="radio">Visible
            </label>
            <label class="radio-inline">
                <input name="rdoStatus" value="1" type="radio">Invisible
            </label>
        @else
            <label class="radio-inline">
            <input name="rdoStatus" value="0"  type="radio">Visible
            </label>
            <label class="radio-inline">
                <input name="rdoStatus" value="1" checked="checked" type="radio">Invisible
            </label>
        @endif
        </div>
        <button type="submit" class="btn btn-default">Category Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
</div>
@stop
