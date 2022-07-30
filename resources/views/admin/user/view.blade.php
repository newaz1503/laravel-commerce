@extends("layouts.backend.master")

@section("title", 'Product')

@section("css")
    <!-- Bootstrap Select Css -->
    <link href="{{asset('backend/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endsection

@section("content")
    <div class="container-fluid">
        <div class="block-header">

        </div>

        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 style="font-size: 27px; font-weight: 500">
                            User Details
                            <a href="{{route('admin.users')}}" class="btn btn-danger btn-sm m-t-15" style="float: right">
                                BACK
                            </a>
                        </h2>

                    </div>
                    <div class="body">
                        <label for="email_address" style="margin-top: 20px">User Role</label>
                        <div class="form-group">
                            <div class="form-line form-control">
                                {{$user->role_as == 0 ? 'User' : 'Admin'}}
                            </div>
                        </div>
                        <label for="email_address" style="margin-top: 20px">First Name</label>
                        <div class="form-group">
                            <div class="form-line form-control">
                                {{$user->name}}
                            </div>
                        </div>
                        <label for="email_address" style="margin-top: 20px">Last Name</label>
                        <div class="form-group">
                            <div class="form-line form-control">
                                {{$user->last_name}}
                            </div>
                        </div>
                        <label for="email_address" style="margin-top: 20px">Email</label>
                        <div class="form-group">
                            <div class="form-line form-control">
                                {{$user->email}}
                            </div>
                        </div>
                        <label for="email_address" style="margin-top: 20px">Phone</label>
                        <div class="form-group">
                            <div class="form-line form-control">
                                {{$user->phone}}
                            </div>
                        </div>
                        <label for="email_address" style="margin-top: 20px">Address 1</label>
                        <div class="form-group">
                            <div class="form-line form-control">
                                {{$user->address1}}
                            </div>
                        </div>
                        <label for="email_address" style="margin-top: 20px">Address 1</label>
                        <div class="form-group">
                            <div class="form-line form-control">
                                {{$user->address2}}
                            </div>
                        </div>
                        <label for="email_address" style="margin-top: 20px">City</label>
                        <div class="form-group">
                            <div class="form-line form-control">
                                {{$user->city}}
                            </div>
                        </div>
                        <label for="email_address" style="margin-top: 20px">State</label>
                        <div class="form-group">
                            <div class="form-line form-control">
                                {{$user->state}}
                            </div>
                        </div>
                        <label for="email_address" style="margin-top: 20px">Country</label>
                        <div class="form-group">
                            <div class="form-line form-control">
                                {{$user->country}}
                            </div>
                        </div>
                        <label for="email_address" style="margin-top: 20px">Pincode</label>
                        <div class="form-group">
                            <div class="form-line form-control">
                                {{$user->pincode}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Vertical Layout -->
    </div>
@endsection

@section("js")

@endsection