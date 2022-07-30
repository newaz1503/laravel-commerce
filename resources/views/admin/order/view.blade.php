@extends("layouts.backend.master")

@section("title", "Orders View")

@section("css")

@endsection

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="padding: 20px">
                    <div class="card-header bg-primary">
                        <h5 class="text-white">Order View
                            <a href="{{route('admin.orders')}}" class="btn btn-warning btn-sm float-end" style="float: right">Back</a>
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
                                <h5 class="pb-2"><strong>Grand Total: {{$orders->total_price}}</strong></h5>
                                <hr>
                                <div class="card-footer mt-4">
                                    <h5 class="card-header">Order Status</h5>
                                    <form action="{{route('admin.order.update', $orders->id)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <select class="form-control show-tick" name="order_status">
                                            <option value="0" {{$orders->status == 0 ? 'selected' : '' }}>Pending</option>
                                            <option value="1" {{$orders->status == 1 ? 'selected' : '' }}>Completed</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary btn-sm mt-3">Update</button>
                                    </form>
                                </div>

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