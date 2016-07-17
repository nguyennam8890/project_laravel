@extends('admin.master')
@section('controller','User')
@section('action','List')
@section('content')
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Username</th>
                <th>Level</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php $stt=1;?>
            @foreach ($user as $item_user)
                <tr class="odd gradeX" align="center">
                    <td>{!! $stt++ !!}</td>
                    <td>{!! $item_user['username'] !!}</td>
                    <td>
                        @if ($item_user['id'] == 2)
                            SupperAdmin
                        @elseif($item_user['level'] == 1)
                            Admin
                        @else
                            Member
                        @endif
                    </td>
                    <td class="center">
                        <i class="fa fa-trash-o  fa-fw"></i>
                        <a onclick="return xacnhanxoa('Do You Want To Delete This Product')" href="{!! URL::route('admin.user.getDelete',$item_user['id']) !!}" > Delete</a>
                    </td>
                    <td class="center">
                        <i class="fa fa-pencil fa-fw"></i>
                        <a href="{!! URL::route('admin.user.getEdit',$item_user['id']) !!}">Edit</a>
                    </td>
                </tr>
            @endforeach
          

        </tbody>
    </table>
@endsection