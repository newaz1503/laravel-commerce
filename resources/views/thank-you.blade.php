@extends("layouts.frontend.master")

@section("title", "Thank You")

@section("css")

@endsection

@section("content")
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success text-center">
                    <h5>Thank you for purchasing the product</h5>
                    <p>Your order was completed successfully.</p>
                    <a href="{{route('front.home')}}" class="btn btn-info">Go to home</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("js")

@endsection