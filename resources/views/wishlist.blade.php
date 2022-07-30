@extends("layouts.frontend.master")

@section("title")
    My Wishlist
@endsection

@section("css")

@endsection

@section("content")
    <div class="container my-4">
        <div class="card shadow p-3 wishlistItems">
        @if($wishlists->count() > 0)
            <div class="card-body py-1">
                @foreach($wishlists as $item)
                     <div class="row border p-1 align-items-center product_data">
                    <div class="col-md-2">
                        <img src="{{asset('uploads/images/product/'.$item->products->image)}}" alt="Product img" width="70" height="70">
                    </div>
                    <div class="col-md-2">
                        <h5><strong>{{$item->products->name}}</strong></h5>
                    </div>
                    <div class="col-md-2">
                        <h5>${{$item->products->selling_price}}</h5>
                    </div>
                    <div class="col-md-2">
                        <input type="hidden" value="{{$item->product_id}}" class="product_id" name="product_id">
                        @if($item->products->quantity >= $item->quantity)
                            <label for="">Quantity</label>
                            <div class="input-group text-center mb-3 d-flex align-items-center">
                                <button class="input-group-text px-2 decrement_btn">-</button>
                                <input type="text" class="form-control text-center input_field quantity_input" name="quantity" value="1" />
                                <button class="input-group-text px-2 increment_btn">+</button>
                            </div>
                        @else
                            <span class="btn- btn-danger p-1" style="font-size: 14px">Out Of Stock</span>
                        @endif
                    </div>
                    <div class="col-md-4 text-center">
                        <button type="button" class="btn btn-primary btn-sm float-start me-2 addToCartBtn">Add to Cart <i class="fas fa-shopping-cart"></i></button>
                        <button class="btn btn-danger btn-sm delete_wishlist"><i class="fas fa-trash" style="cursor: pointer"></i> Remove</button>
                    </div>
                </div>
                @endforeach
           </div>

        @else
            <div class="p-2">
                <h5 class="d-block bg-warning text-center text-white py-2"><i class="fas fa-heart"></i> Wishlist is Empty</h5>
                <a href="{{route('front.categories')}}" class="btn btn-primary float-end mt-5">Continue Shopping</a>
            </div>
        @endif
        </div>
    </div>
@endsection

@section("js")

@endsection