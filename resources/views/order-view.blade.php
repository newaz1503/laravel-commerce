@extends("layouts.frontend.master")

@section("title", "My Orders")

@section("css")
    <style>
        .card{
            padding: 30px !important;
        }
    </style>
@endsection

@section("content")
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12" >
                <div class="card">
                    <div class="card-header bg-primary">
                        <h5 class="text-white">Order View
                            <a href="{{route('user.order')}}" class="btn btn-warning btn-sm">Back</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 shipping_details">
                                <h4 class="pb-3">Shipping Details</h4>
                                <label for="">First Name</label>
                                <div class="border p-1 mb-2">{{$orders->first_name}}</div>
                                <label for="">Last Name</label>
                                <div class="border p-1 mb-2">{{$orders->last_name}}</div>
                                <label for="">Email</label>
                                <div class="border p-1 mb-2">{{$orders->email}}</div>
                                <label for="">Contact No.</label>
                                <div class="border p-1 mb-2">{{$orders->phone}}</div>
                                <label for="">Shipping Address</label>
                                <div class="border p-1 mb-2">
                                    {{$orders->address1}} ,
                                    {{$orders->address2}} ,
                                    {{$orders->city}} ,
                                    {{$orders->state}} ,
                                    {{$orders->country}}

                                </div>
                                <label for="">Zip Code</label>
                                <div class="border p-2 mb-2">{{$orders->pincode}}</div>
                            </div>
                            <div class="col-md-6 order_details">
                                <h4 class="pb-3">Order Details</h4>
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Image</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders->orderItems as $item)
                                            <tr>
                                                <td>{{$item->product->name}}</td>
                                                <td>{{$item->price}}</td>
                                                <td>{{$item->quantity}}</td>
                                                <td>
                                                    <img src="{{asset('uploads/images/product/'.$item->product->image)}}" alt="{{$item->product->name}}" width="60" height="50">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h5><strong>Grand Total: {{$orders->total_price}}</strong></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("js")

@endsection