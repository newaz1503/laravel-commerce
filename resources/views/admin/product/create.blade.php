@extends("layouts.backend.master")

@section("title", 'Product')

@section("css")

@endsection

@section("content")
    <div class="container-fluid">
        <div class="block-header">

        </div>

        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 style="font-size: 27px; font-weight: 500">
                            Create New Product
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for="email_address" >Category Name</label>
                            <select class="form-control show-tick" name="category_id">
                                <option value="" selected disabled="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <label for="email_address" style="margin-top: 20px">Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="name" id="email_address" class="form-control" placeholder="Product Name">
                                </div>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <label for="email_address">Short Description</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea name="short_description" rows="5" class="form-control" placeholder="product Short Description"></textarea>
                                </div>
                            </div>
                            <label for="email_address">Long Description</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea name="long_description" rows="5" class="form-control" placeholder="product Long Description"></textarea>
                                </div>
                            </div>
                            <label for="email_address" style="margin-top: 20px">Original Price</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" name="original_price" id="email_address" class="form-control" placeholder="Original Price">
                                </div>
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <label for="email_address" style="margin-top: 20px">Selling Price</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" name="selling_price" id="email_address" class="form-control" placeholder="Selling Price">
                                </div>
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <label for="email_address">Quantity</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" name="quantity" id="email_address" class="form-control" placeholder="Product Quantity">
                                </div>
                            </div>
                            <label for="email_address">Tax</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" name="tax" id="email_address" class="form-control" placeholder="Tax">
                                </div>
                            </div>
                            <label for="email_address">Meta Title</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="meta_title" id="email_address" class="form-control" placeholder="Meta title">
                                </div>
                            </div>

                            <label for="email_address">Meta Description</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea name="meta_description" rows="5" class="form-control" placeholder="Meta Description"></textarea>
                                </div>
                            </div>
                            <label for="email_address">Meta Keywords</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea name="meta_keywords" rows="5" class="form-control" placeholder="Meta Keywords"></textarea>
                                </div>
                            </div>
                            <label for="email_address">Upload Image</label>
                            <div class="form-group">
                                <input type="file" class="form-control" name="image">
                            </div>
                            <input type="checkbox" id="status" name="status" class="filled-in">
                            <label for="status">Status</label>
                            <br>
                            <input type="checkbox" id="popular" name="trending" class="filled-in">
                            <label for="popular">Popular</label>
                            <br>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                            <a href="{{route('admin.product')}}" class="btn btn-danger btn-sm m-t-15">
                               BACK
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Vertical Layout -->
    </div>
@endsection

@section("js")

@endsection