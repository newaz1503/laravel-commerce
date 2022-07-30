$(document).ready(function () {
   $('.bkash_payment').click(function (e) {
       e.preventDefault();

       let firstname = $('.firstname').val();
       let lastname = $('.lastname').val();
       let email = $('.email').val();
       let phone = $('.phone').val();
       let address1 = $('.address1').val();
       let address2 = $('.address2').val();
       let city = $('.city').val();
       let state = $('.state').val();
       let country = $('.country').val();
       let pincode = $('.pincode').val();

        //first name error
       if (!firstname){
           fname_error = "Field is required";
           $("#fname_error").html('');
           $("#fname_error").html(fname_error);
       }else{
           fname_error = "";
           $("#fname_error").html('');
       }
       //last name error
       if (!lastname){
           lname_error = "Field is required";
           $("#lname_error").html('');
           $("#lname_error").html(lname_error);
       }else{
           lname_error = "";
           $("#lname_error").html('');
       }
       //email error
       if (!email){
           email_error = "Field is required";
           $("#email_error").html('');
           $("#email_error").html(email_error);
       }else{
           email_error = "";
           $("#email_error").html('');
       }
       //phone error
       if (!phone){
           phone_error = "Field is required";
           $("#phone_error").html('');
           $("#phone_error").html(phone_error);
       }else{
           phone_error = "";
           $("#phone_error").html('');
       }
       //address1 error
       if (!address1){
           address1_error = "Field is required";
           $("#address1_error").html('');
           $("#address1_error").html(address1_error);
       }else{
           address1_error = "";
           $("#address1_error").html('');
       }
       //address2 error
       if (!address2){
           address2_error = "Field is required";
           $("#address2_error").html('');
           $("#address2_error").html(address2_error);
       }else{
           address2_error = "";
           $("#address2_error").html('');
       }
       //city error
       if (!city){
           city_error = "Field is required";
           $("#city_error").html('');
           $("#city_error").html(city_error);
       }else{
           city_error = "";
           $("#city_error").html('');
       }
       //state error
       if (!state){
           state_error = "Field is required";
           $("#state_error").html('');
           $("#state_error").html(state_error);
       }else{
           state_error = "";
           $("#state_error").html('');
       }
       //country error
       if (!country){
           country_error = "Field is required";
           $("#country_error").html('');
           $("#country_error").html(country_error);
       }else{
           country_error = "";
           $("#country_error").html('');
       }
       //pincode error
       if (!pincode){
           pincode_error = "Field is required";
           $("#pincode_error").html('');
           $("#pincode_error").html(pincode_error);
       }else{
           pincode_error = "";
           $("#pincode_error").html('');
       }

       if (fname_error != '' || lname_error != '' || email_error != '' || phone_error != '' || address1_error != '' || address2_error != '' || city_error != '' || state_error != '' || country_error != '' || pincode_error != ''){
            return false;
       } else{
            let data = {
                 'firstname' : firstname,
                 'lastname' : lastname,
                 'email' : email,
                  'phone' : phone,
                 'address1' : address1,
                 'address2' : address2,
                 'city' : city,
                 'state' : state,
                 'country' : country,
                 'pincode' : pincode
            };
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });


           $.ajax({
               url: "/proceed-to-pay",
               method: 'POST',
               data: data,
               success: function (response) {
                   $.ajax({
                       url: "/token",
                       type: 'POST',
                       contentType: 'application/json',
                       success: function (data) {
                           console.log('got data from token  ..');
                           console.log(JSON.stringify(data));

                           accessToken=JSON.stringify(data);
                       },
                       error: function(){
                           console.log('error');

                       }
                   });
               },
           });

       }

   })

});

