@extends('admin.master')
@section('controller','Category')
@section('action','List')
@section('content')

            <div class="col-xs-12">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category Parent</th>
                        <th>Status</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                   <?php 
                    $stt = 0;
                   ?>
                    @foreach ($data as $item)
                      <?php $stt++;?>
                        <tr class="odd gradeX" align="center">
                            <td>{!! $stt !!}</td>
                            <td>{{ $item["name"] }}</td>
                            <td>
                               @if ($item["parent_id"] == 0)
                                    {{   "Root" }}
                               @else
                                    <?php
                                       $parent = DB::table('cates')->where('id',$item["parent_id"])->first();
                                       echo $parent->name;
                                     ?>
                               @endif
                            </td>
                            <td>@if($item['status'] == 1){!! 'Enable' !!}@else {{ 'Disable' }} @endif </td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! URL::route('admin.cate.getDelete',$item['id']) !!}" onclick="return xacnhanxoa('Bạn có chắc là muốn xóa không')"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.cate.getEdit',$item['id']) !!}">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@stop
