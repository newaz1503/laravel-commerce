@extends("layouts.frontend.master")

@section("title",'Welcome to E-shop')

@section("css")
    <style>
        .cat:hover .card-title  {
            text-decoration: underline;
        }
    </style>
@endsection

@section("content")
    @include('layouts.frontend.slider')
    {{--Feature product --}}
    <div class="container py-5">
        {{--Featured section--}}
        <h4 class="mb-4 pt-3">Featured Products</h4>
        <div class="row">
            <div class="owl-carousel owl-theme featured-product">
                @foreach($products as $product)
                    <div class="item">
                        <a href="{{route('product.details',$product->slug)}}" class="text-decoration-none cat">
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
        {{--Trending section--}}
        <h4 class="mb-4 pt-3">Trending Category</h4>
        <div class="row">
            <div class="owl-carousel owl-theme featured-product">
                @foreach($categories as $category)
                    <div class="item">
                        <a href="{{route('category.post', $category->slug)}}" class="text-decoration-none cat">
                            <div class="card">
                                <img src="{{asset('uploads/images/category/'.$category->image)}}" class="card-img-top" alt="{{$category->name}}" style="height: 220px; object-fit:cover ">
                                <div class="card-body">
                                    <h6 class="card-title my-3 text-dark">{{$category->name}}</h6>
                                    <p class="card-text text-muted">${{$category->description}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

@section("js")
    <script>
        $('.featured-product').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots:false,
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        })
    </script>
@endsection