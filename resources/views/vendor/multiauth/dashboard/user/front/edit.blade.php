@extends('vendor.multiauth.dashboard.layouts.app')
@section("title","Profile")
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{$user->name}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                            <li class="breadcrumb-item active">{{$user->name}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{$user->name}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route("front.user.update",$user->id)}}" method="post"  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input type="text" name="name" value="{{$user->name}}" class="form-control" id="name" placeholder="Full Name">

                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" disabled value="{{$user->email}}"  class="form-control" id="email" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="profile_pic">Profile Picture</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input accept="image" type="file"  name="image" class="custom-file-input" id="profile_pic">
                                                <label class="custom-file-label" for="profile_pic">Choose Your Profile Picture</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{route("front.user.verify",$user->id)}}">
                                        <button type="button" class="btn btn-primary">Verify Account</button>
                                    </a>
                                    <a href="{{route("front.user.change_status",$user->id)}}">
                                        <button type="button" class="btn btn-primary">Block/UnBlock</button>
                                    </a>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->



                    </div>
                </div>
                <!-- /.row -->


            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
