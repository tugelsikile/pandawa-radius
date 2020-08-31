@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            Users Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Users</li>
        </ol>
    </section>


    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Users Table</h3>
                <div class="box-tools pull-right">
                    @if(session()->get('menus')->where('route','/users')->first()['C_opt']===1)
                        <button type="button" class="btn btn-box-tool" title="Tambah Pengguna">
                            <i class="fa fa-plus-circle"></i> Tambah Pengguna
                        </button>
                    @endif
                    @if(session()->get('menus')->where('route','/users')->first()['D_opt']===1)
                        <button type="button" class="btn btn-box-tool" title="Hapus Pengguna">
                            <i class="fa fa-minus-circle"></i> Hapus Pengguna
                        </button>
                    @endif
                </div>
            </div>
            <div class="box-body">
                <table id="users-table" class="table table-bordered table-hover">
                   <thead>
                   <tr>
                       <th class="text-center" data-orderable="false" width="30px"><input onclick="cbxAll(this)" type="checkbox"></th>
                       <th width="200px">Nama</th>
                       <th>Email</th>
                       <th>Cabang</th>
                       <th width="100px">Level</th>
                   </tr>
                   </thead>
                    <tbody>
                    @forelse($users as $key => $user)
                        <tr style="cursor:pointer" onclick="alert({{json_encode($user)}})">
                            <td align="center"><input type="checkbox" name="user_id[]" value="{{$user->id}}"></td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>@isset($user->cabang->cab_name){{$user->cabang->cab_name}}@endisset</td>
                            <td>{{$user->level_id->name}}</td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>
                <script>
                    var t = $('#users-table').dataTable({
                        order : [[1,'asc']]
                    });
                </script>
            </div>
        </div>

    </section>

@endsection
