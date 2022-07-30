@extends("layouts.frontend.master")

@section("title")
    Checkout
@endsection

@section("css")

@endsection

@section("content")
    <div class="container my-4" >
        <form action="{{route('place.order')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="border-bottom py-2"><strong>Basic Details</strong> </h6>
                            <div class="row checkout_form">
                                <div class="col-md-6">
                                    <label for="">First Name</label>
                                    <input type="text" name="first_name" value="{{Auth::user()->name}}" class="form-control firstname" placeholder="Enter First Name">
                                    @if($errors->has('first_name'))
                                        <div class="error" style="color: #c72f45">{{ $errors->first('first_name') }}</div>
                                    @endif
                                    <span id="fname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Last Name</label>
                                    <input type="text" name="last_name" value="{{Auth::user()->last_name}}" class="form-control lastname" placeholder="Enter Last Name">
                                    @if($errors->has('last_name'))
                                        <div class="error" style="color: #c72f45">{{ $errors->first('last_name') }}</div>
                                    @endif
                                    <span id="lname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Email</label>
                                    <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control email" placeholder="Enter Valid Email">
                                    @if($errors->has('email'))
                                        <div class="error" style="color: #c72f45">{{ $errors->first('email') }}</div>
                                    @endif
                                    <span id="email_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Phone Number</label>
                                    <input type="tel" name="phone" value="{{Auth::user()->phone}}" class="form-control phone" placeholder="Enter Phone Number">
                                    @if($errors->has('phone'))
                                        <div class="error" style="color: #c72f45">{{ $errors->first('phone') }}</div>
                                    @endif
                                    <span id="phone_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Address 1</label>
                                    <textarea rows="5" name="address1" class="form-control address1" placeholder="Enter address 1">{{Auth::user()->address1}}</textarea>
                                    @if($errors->has('address1'))
                                        <div class="error" style="color: #c72f45">{{ $errors->first('address1') }}</div>
                                    @endif
                                    <span id="address1_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Address 2</label>
                                    <textarea rows="5" name="address2" class="form-control address2" placeholder="Enter address 2">{{Auth::user()->address2}}</textarea>
                                    @if($errors->has('address2'))
                                        <div class="error" style="color: #c72f45">{{ $errors->first('address2') }}</div>
                                    @endif
                                    <span id="address2_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">City</label>
                                    <input type="text" name="city" value="{{Auth::user()->city}}" class="form-control city" placeholder="Enter City">
                                    @if($errors->has('city'))
                                        <div class="error" style="color: #c72f45">{{ $errors->first('city') }}</div>
                                    @endif
                                    <span id="city_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">State</label>
                                    <input type="text" name="state" value="{{Auth::user()->state}}" class="form-control state" placeholder="Enter State">
                                    @if($errors->has('state'))
                                        <div class="error" style="color: #c72f45">{{ $errors->first('state') }}</div>
                                    @endif
                                    <span id="state_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Country</label>
                                    <input type="text" name="country" value="{{Auth::user()->country}}" class="form-control country" placeholder="Enter Country name">
                                    @if($errors->has('country'))
                                        <div class="error" style="color: #c72f45">{{ $errors->first('country') }}</div>
                                    @endif
                                    <span id="country_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Pin Code</label>
                                    <input type="text" name="pin_code" value="{{Auth::user()->pincode}}" class="form-control pincode" placeholder="Enter Pin Code">
                                    @if($errors->has('pin_code'))
                                        <div class="error" style="color: #c72f45">{{ $errors->first('pin_code') }}</div>
                                    @endif
                                    <span id="pincode_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">

                        <div class="card-body">
                            <h6 class="py-2 border-bottom"><strong>Order Details</strong> </h6>
                            @if($cartItems->count() > 0)
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cartItems as $item)
                                        <tr>
                                            <td>{{$item->products->name}}</td>
                                            <td>{{$item->quantity}}</td>
                                            <td>{{$item->products->selling_price}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="w-100">
                                <button type="submit" class="btn btn-success btn-block btn-sm float-end mt-3 w-100">Place Order | COD</button>
{{--                                <button type="button" class="btn btn-primary btn-block btn-sm float-end mt-3 w-100 bkash_payment">Pay with Bkash</button>--}}
                            </div>
                            @else
                        </div>
                            <h5 class="text-center pb-3"><strong>No products in Cart</strong> </h5>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section("js")

@endsection