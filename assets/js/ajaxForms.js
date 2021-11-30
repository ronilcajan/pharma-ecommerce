$("#create_user_form").validate({
    rules: {
        confirmpassword: {
            equalTo: "#password"
        }
    },
    highlight: function(element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function(element) {
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
    },
    submitHandler: function() {
        var formdata = new FormData(document.getElementById("create_user_form"));
        $.ajax({
            type: "POST",
            url: SITE_URL+"auth/createUser",
            dataType: "json",
            data: formdata,
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                if (response.success == true) {
                    $("#create_user_form")[0].reset();
					$('#addUser').modal('hide');
                    alertNotif(response.msg,'success');
                    setTimeout(function() {
                        window.location.reload(1);
                    }, 3000);
                } else {
                    $('.msg').html('<div class="alert alert-danger" role="alert">'+response.msg+'</div>');
                }
            }
        });
    }
});
function editProduct(that){
    var id = $(that).attr('data-id');

    $.ajax({
        type: "POST",
        url: SITE_URL+"products/getProducts",
        dataType: "json",
        data: {id:id},
        success: function(response) {
            console.log(response.data);
            if(response.data.image === null){
                $('#product_img').attr('src', '../assets/img/product.png');
            }else{
                $('#product_img').attr('src', '../assets/uploads/'+response.data.image);
            }

            if(response.data.status=='New'){
                $('#product_status1').val(response.data.status);
                $('#sale_price1').val('');
                $('#sale_price1').attr('readonly',true);
            }else{
                $('#product_status1').val(response.data.status);
                $('#sale_price1').attr('readonly',false);
                $('#sale_price1').val(response.data.price_2);
            }
            $('#pro_id').val(response.data.id);
            $('#category_id').val(response.data.category_id);
            $('#pname').val(response.data.name);
            $('#punit').val(response.data.unit);
            $('#pprice').val(response.data.price);
            $('#pstocks').val(response.data.stocks);
            $('#pmin_stocks').val(response.data.min_stocks);
            $('#pdesc').text(response.data.description);

            if(response.data.prescription==1){
                $("#prescription_yes").prop("checked", true);
            }else{
                $("#prescription_no").prop("checked", true);
            }
        
        }
    });
}
function getCustomer(that){
    var id = $(that).attr('data-id');

    $.ajax({
        type: "POST",
        url: SITE_URL+"auth/getUser",
        dataType: "json",
        data: {id:id},
        success: function(response) {
            console.log(response.data);
            $('#fullname').val(response.data.first_name+' '+response.data.first_name);
            $('#company').val(response.data.company);
            $('#email').val(response.data.email);
            $('#mphone').val(response.data.phone);
            $('#address').val(response.data.purok+','+response.data.barangay+','+response.data.city+','+response.data.province);
        
        }
    });
}


function alertNotif(msg,state){
    var content = {};

    content.message = msg;
    content.title = 'Notification!';
    content.icon = 'fa fa-bell';

    $.notify(content,{
        type: state,
        placement: {
            from: 'top',
            align: 'right'
        },
        time: 1000,
        delay: 0,
    });
}