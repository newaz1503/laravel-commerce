@extends("layouts.frontend.master")

@section("title")
    {{$product->name}}
@endsection

@section("css")

@endsection

@section("content")
    <div class="container py-3">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{asset('uploads/images/product/'.$product->image)}}" alt="{{$product->name}}" class="w-100">
                    </div>
                    <div class="col-md-8">
                        <input type="hidden" value="{{$product->id}}" class="product_id" name="product_id">
                        <h2>
                            {{$product->name}}
                            @if($product->trending == '1')
                                <label class="bg-danger text-white p-1 float-end" style="font-size: 1rem">Trending</label>
                            @endif
                        </h2>
                        <label class="me-3">Original Price:  $<s>{{$product->original_price}}</s> </label>
                        <label class="fw-bold">Selling Price: ${{$product->selling_price}}</label>
                        <p class="mt-3">
                            {!! $product->description !!}
                        </p>
                        @if($product->quantity > 0)
                            <label class="badge bg-success text-white" style="font-size: 15px">In Stock</label>
                            @else
                            <label class="badge bg-danger text-white" style="font-size: 15px">Out of Stock</label>
                        @endif

                         <div class="row mt-3 ">
                            <div class="col-md-3">
                                <label for="">Quantity</label>
                                <div class="input-group text-center mb-3 d-flex align-items-center">
                                    <button class="input-group-text px-3 decrement_btn">-</button>
                                    <input type="text" class="form-control text-center input_field quantity_input" name="quantity" value="1" />
                                    <button class="input-group-text px-3 increment_btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-9 align-self-center">
                                 @if($product->quantity > 0)
                                    <button type="button" class="btn btn-primary float-start me-2 addToCartBtn">Add to Cart <i class="fas fa-shopping-cart"></i></button>
                                 @endif
                                <button type="button" class="btn btn-success float-start me-2">Add to Wishlist <i class="fas fa-heart"></i></button>
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