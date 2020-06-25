@extends('vendor.multiauth.dashboard.layouts.app')
@section("title","Profile")
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Settings</li>
                        <li class="breadcrumb-item active">General</li>
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
                            <h3 class="card-title">General</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route("setting.general.update",1)}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="site_name">Site Name</label>
                                <input type="text" name="site_name" value="{{$general->site_name}}" class="form-control @error('site_name') is-invalid @enderror" id="site_name" placeholder="Site Name">
                                @error('site_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email"   value="{{$general->email}}" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" value="{{$general->address}}" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Address">
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" value="{{$general->phone}}" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="+977980000000">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="site_logo">Site Logo</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input accept="image" type="file"  name="site_logo" class="custom-file-input" id="site_logo">
                                        <label class="custom-file-label" for="site_logo">Choose Your Site Logo</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="favicon">Favicon</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input accept="image" type="file"  name="favicon" class="custom-file-input" id="favicon">
                                        <label class="custom-file-label" for="favicon">Choose Your Favicon Logo</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="footer-logo">Footer Logo</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input accept="image" type="file"  name="footer_logo" class="custom-file-input" id="footer-logo">
                                        <label class="custom-file-label" for="footer_logo">Choose Your Footer Logo</label>
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
