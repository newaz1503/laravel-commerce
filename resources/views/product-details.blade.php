@extends("layouts.frontend.master")

@section("title")
    {{$product->name}}
@endsection

@section("css")

@endsection

@section("content")
    <div class="container py-5">
        <div class="product_data">
            <div class="">
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
                        @php $ratingnum = number_format($rating_value) @endphp
                        <div class="rating">
                             @for($i=1; $i <= $ratingnum; $i++)
                                <i class="fas fa-star checked"></i>
                             @endfor
                             @for($j=$ratingnum+1; $j <= 5; $j++)
                                 <i class="fas fa-star"></i>
                             @endfor
                            <span class="text-muted">{{$ratingnum}} Ratings</span>
                        </div>
                        <p class="mt-3">
                            {!! $product->short_description !!}
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
                                <button type="button" class="btn btn-success float-start me-2 addToWishlistBtn">Add to Wishlist <i class="fas fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <hr>
                    <h4>Description</h4>
                    <p class="text-muted mb-4">{!! $product->description !!}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Rate this Product
                    </button>
                    <a href="{{route('review', $product->slug, 'userreview')}}" class="btn btn-outline-secondary">
                        Write a Review
                    </a>
                </div>
                <div class="col-md-8">
                    @foreach($reviews as $review)
                        <div class="user-review">
                            <label>{{$review->user->name . ' ' . $review->user->last_name}}</label>
                             @if($review->id == Auth::id())
                                <a href="{{route('edit.review', $product->slug)}}" class="btn btn-link ms-3 btn-sm p-0">Edit</a>
                             @endif
                            <br>
                            @php $rating = App\Models\Rating::where('product_id', $product->id)->where('user_id', $review->user->id)->first();   @endphp
                            @if($rating)
                                @php $user_ratings = $rating->star_rating @endphp
                                @for($i=1; $i <= $user_ratings; $i++)
                                    <i class="fas fa-star checked"></i>
                                @endfor
                                @for($j=$user_ratings+1; $j <= 5; $j++)
                                    <i class="fas fa-star"></i>
                                @endfor
                             @endif
                            <small>Reviewed on {{$review->created_at->format('d M, yy')}}</small>
                            <p class="text-muted pt-2">{{$review->review}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{route('add.rating')}}" method="post">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Rating {{$product->name}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <div class="modal-body">
                            <div class="rating-css">
                                <h6 class="text-left"></h6>
                                <div class="star-icon text-left">
                                    @if($user_rating)
                                        @for($i=1; $i <= $user_rating->star_rating; $i++)
                                            <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                                            <label for="rating{{$i}}" class="fa fa-star"></label>
                                        @endfor
                                        @for($j=$user_rating->star_rating+1; $j <= 5; $j++)
                                            <input type="radio" value="{{$j}}" name="product_rating" id="rating{{$j}}">
                                            <label for="rating{{$j}}" class="fa fa-star"></label>
                                        @endfor
                                    @else
                                        <input type="radio" value="1" name="product_rating" checked id="rating1">
                                        <label for="rating1" class="fa fa-star"></label>
                                        <input type="radio" value="2" name="product_rating" id="rating2">
                                        <label for="rating2" class="fa fa-star"></label>
                                        <input type="radio" value="3" name="product_rating" id="rating3">
                                        <label for="rating3" class="fa fa-star"></label>
                                        <input type="radio" value="4" name="product_rating" id="rating4">
                                        <label for="rating4" class="fa fa-star"></label>
                                        <input type="radio" value="5" name="product_rating" id="rating5">
                                        <label for="rating5" class="fa fa-star"></label>

                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("js")

@endsection