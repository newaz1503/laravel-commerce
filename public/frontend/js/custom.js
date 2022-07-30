$(document).ready(function () {

    cartCount();
    wishlistCount();

    //add cart
    $('.addToCartBtn').click(function (e) {
        e.preventDefault();
        let product_id = $(this).closest('.product_data').find('.product_id').val();
        let quantity = $(this).closest('.product_data').find('.quantity_input').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: 'POST',
            url: '/add-to-cart',
            data: {
                'product_id' : product_id,
                'quantity' : quantity,
            },
            success: function (res) {
                swal({
                    text: "Success",
                    title: res.status,
                    icon: "success",
                });
                cartCount();
            }
        });
    });

    //cart item count
    function cartCount(){
        $.ajax({
            method: 'GET',
            url: '/cart-count',
            success: function (res) {
                $('.cart-count').html('');
                $('.cart-count').html(res.count);
            }
        })
    }

    //add wishlist
    $('.addToWishlistBtn').click(function (e) {
        e.preventDefault();
        let product_id = $(this).closest('.product_data').find('.product_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: 'POST',
            url: '/add-to-wishlist',
            data: {
                'product_id' : product_id,
            },
            success: function (res) {
                swal({
                    text: "Success",
                    title: res.status,
                    icon: "success",
                });
                wishlistCount();
            }
        });
    });
    //wishlist item count
    function wishlistCount(){
        $.ajax({
            method: 'GET',
            url: '/wishlist-count',
            success: function (res) {
                $('.wishlist-count').html('');
                $('.wishlist-count').html(res.count);
            }
        })
    }

    //Increment quantity
    $(document).on('click', '.increment_btn', function (e) {
        e.preventDefault();
        let increment_value = $(this).closest('.product_data').find('.quantity_input').val();
        let parsedValue = parseInt(increment_value, 10);
        parsedValue = isNaN(parsedValue) ? 0 : parsedValue;
        if (parsedValue < 10){
            parsedValue++;
            $(this).closest('.product_data').find('.quantity_input').val(parsedValue);
        }
    });

    //Decrement quantity
    $(document).on('click', '.decrement_btn', function (e) {
        e.preventDefault();
        let decrement_value = $(this).closest('.product_data').find('.quantity_input').val();
        let parsedValue = parseInt(decrement_value, 10);
        parsedValue = isNaN(parsedValue) ? 0 : parsedValue;
        if (parsedValue > 1){
            parsedValue--;
            $(this).closest('.product_data').find('.quantity_input').val(parsedValue);
        }
    });

    //delete cart
        $(document).on('click', '.delete_cart', function (e) {
            e.preventDefault();
        let product_id = $(this).closest('.product_data').find('.product_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: 'POST',
            url: '/delete-cart-item',
            data: {
                'product_id' : product_id,
            },
            success: function (res) {
                $(".cartItems").load(location.href + " .cartItems");
                cartCount();
                // window.location.reload();
                swal({
                    text: "Success",
                    title: res.status,
                    icon: "success",
                });
            }
        });
    });
    //delete wishlist
    $(document).on('click', '.delete_wishlist', function (e) {
        e.preventDefault();
        let product_id = $(this).closest('.product_data').find('.product_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: 'POST',
            url: '/delete-wishlist-item',
            data: {
                'product_id' : product_id,
            },
            success: function (res) {
                $(".wishlistItems").load(location.href + " .wishlistItems");
                wishlistCount();
                // window.location.reload();
                swal({
                    text: "Success",
                    title: res.status,
                    icon: "success",
                });
            }
        });
    });

    //Change cart quantity
    $(document).on('click', '.quantity_change', function (e) {
        e.preventDefault();
        let product_id = $(this).closest('.product_data').find('.product_id').val();
        let quantity = $(this).closest('.product_data').find('.quantity_input').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: 'POST',
            url: '/update-cart',
            data: {
                'product_id' : product_id,
                'quantity' : quantity,
            },
            success: function (res) {
                $(".cartItems").load(location.href + " .cartItems");
            }
        });

    });


});