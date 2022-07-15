@extends("layouts.frontend.master")

@section("title")
    Checkout
@endsection

@section("css")

@endsection

@section("content")
    <div class="container my-4">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h5 class="border-bottom py-2"><strong>Basic Details</strong> </h5>
                        <div class="row checkout_form">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" placeholder="Enter First Name">
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control" placeholder="Enter Last Name">
                            </div>
                            <div class="col-md-6">
                                <label for="">Email</label>
                                <input type="email" class="form-control" placeholder="Enter Valid Email">
                            </div>
                            <div class="col-md-6">
                                <label for="">Phone Number</label>
                                <input type="tel" class="form-control" placeholder="Enter Phone Number">
                            </div>
                            <div class="col-md-6">
                                <label for="">Address 1</label>
                                <textarea rows="5" class="form-control" placeholder="Enter address 1"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="">Address 2</label>
                                <textarea rows="5" class="form-control" placeholder="Enter address 2"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="">City</label>
                                <input type="text" class="form-control" placeholder="Enter City">
                            </div>
                            <div class="col-md-6">
                                <label for="">State</label>
                                <input type="text" class="form-control" placeholder="Enter State">
                            </div>
                            <div class="col-md-6">
                                <label for="">Country</label>
                                <input type="text" class="form-control" placeholder="Enter Country name">
                            </div>
                            <div class="col-md-6">
                                <label for="">Pin Code</label>
                                <input type="text" class="form-control" placeholder="Enter Pin Code">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="py-2"><strong>Order Details</strong> </h5>
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
                    </div>
                </div>
                <a href="#" class="btn btn-primary btn-sm float-end mt-3">Place Order</a>
            </div>

        </div>
    </div>
@endsection

@section("js")

@endsection