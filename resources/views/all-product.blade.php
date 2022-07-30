@extends("layouts.frontend.master")

@section("title", "All Product")

@section("css")

@endsection

@section("content")
    <div class="container py-5">
        {{--product section--}}
        <h4 class="feature__title pt-2">All Product</h4>
        <div class="row my-4">
            @foreach($products as $product)
                {{--first product--}}
                <div class="col-md-4 product_card">
                    <div class="card mb-3 p-1">
                        <a href="{{route('product.details',$product->slug)}}">
                            <img src="{{asset('uploads/images/product/'.$product->image)}}" class="card-img-top" alt="{{$product->name}}" style="height: 220px; object-fit:cover ">

                            <div class="card-body">
                                <h5 class="card-title pb-2">{{$product->name}}</h5>
                                <p class="card-text text-muted">{{Str::limit($product->short_description, 100)}}</p>
                            </div>
                        </a>
                        <div class="card-body">
                            <span class="card-text float-start text-muted">${{$product->original_price}}</span>
                            <small class="card-text float-end text-muted"> <s>${{$product->selling_price}}</s>  </small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section("js")

@endsection