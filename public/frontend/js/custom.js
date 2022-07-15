$(document).ready(function () {
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
            }
        });
    });


    $('.increment_btn').click(function (e) {
        e.preventDefault();
        let increment_value = $(this).closest('.product_data').find('.quantity_input').val();
        let parsedValue = parseInt(increment_value, 10);
        parsedValue = isNaN(parsedValue) ? 0 : parsedValue;
        if (parsedValue < 10){
            parsedValue++;
            $(this).closest('.product_data').find('.quantity_input').val(parsedValue);
        }
    });

    $('.decrement_btn').click(function (e) {
        e.preventDefault();
        let decrement_value = $(this).closest('.product_data').find('.quantity_input').val();
        let parsedValue = parseInt(decrement_value, 10);
        parsedValue = isNaN(parsedValue) ? 0 : parsedValue;
        if (parsedValue > 1){
            parsedValue--;
            $(this).closest('.product_data').find('.quantity_input').val(parsedValue);
        }
    });

    $('.delete_cart').click(function (e) {
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
                window.location.reload();
                swal({
                    text: "Success",
                    title: res.status,
                    icon: "success",
                });
            }
        });
    });

    $('.quantity_change').click(function (e) {
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
                window.location.reload();
                swal({
                    text: "Success",
                    title: res.status,
                    icon: "success",
                });
            }
        });

    });


});