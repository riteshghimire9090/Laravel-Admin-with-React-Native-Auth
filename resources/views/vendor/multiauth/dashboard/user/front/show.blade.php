@extends('vendor.multiauth.dashboard.layouts.app')
@section("title","Front User")
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Front User</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Front User</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Front Users</h3>

                                <div class="card-tools">
                                    <form class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text"  name="search_user" value="{{$requested}}" class="form-control float-right" placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Email verified At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($frontusers as $frontuser)
                                    <tr>
                                        <td>{{$frontuser->id}}</td>
                                        <td>{{$frontuser->name}}</td>
                                        <td>{{$frontuser->email}}</td>
                                        <td>{{$frontuser->created_at}}</td>
                                        <td><span class="tag tag-warning">{{$frontuser->updated_at}}</span></td>
                                        <td><span class="tag tag-warning">
                                                @if(isset($frontuser->email_verified_at))
                                                    {{$frontuser->email_verified_at}}
                                                @else
                                                    <span class="badge badge-danger">Not yet Verified </span>
                                                @endif

                                            </span></td>
                                        <td>
                                            @if($frontuser->status)
                                                <span class="badge badge-success">Verified</span>
                                            @else
                                                <span class="badge badge-danger">Not Verified</span>
                                            @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">

                                                    <a href="{{route("front.user.edit",$frontuser->id)}}"><button type="button" class="btn btn-default">Edit</button></a>
                                                    <a href="{{route("front.user.delete",$frontuser->id)}}"><button type="button" class="btn btn-default">Delete</button></a>

                                                </div>
                                            </td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-header">


                                <div class="card-tools">
                                    {{$frontusers->links()}}
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
