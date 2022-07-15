@extends("layouts.frontend.master")

@section("title")
    {{$category->name}}
@endsection

@section("css")

@endsection

@section("content")
    <div class="container py-5">
        {{--Featured section--}}
        <h4 class="mb-4 pt-3">{{$category->name}}</h4>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-3 mt-2">
                    <a href="{{route('product.details',$product->slug)}}">
                        <div class="card">
                            <img src="{{asset('uploads/images/product/'.$product->image)}}" class="card-img-top" alt="{{$product->name}}" style="height: 220px; object-fit:cover ">
                            <div class="card-body">
                                <h6 class="card-title my-3 text-dark  ">{{$product->name}}</h6>
                                <span class="card-text float-start text-muted">${{$product->original_price}}</span>
                                <small class="card-text float-end text-muted"> <s>${{$product->selling_price}}</s>  </small>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section("js")

@endsection