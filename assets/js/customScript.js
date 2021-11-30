var $window = $(window);
$window.on("load",function (){
    $(".preloader").fadeOut(500);
});
$(document).ready(function(){
    $('#categoryTable').DataTable();
    $('#usersTable').DataTable();
    $('#productTable').DataTable({
        "oLanguage": {
            "sLengthMenu": "_MENU_ Entries"
        },
        dom: 'Blfrtip',
        buttons: [
            { 
                "extend": 'csv', 
                "text":'CSV',
                "filename": 'products_report',
                "title":'Products Report',
                "className": 'btn btn-primary btn-sm text-light mb-2',
                "exportOptions": {
                    "columns": [0,2,3,4,5,6,7],
                   
                },
            },
            { 
                "extend": 'print', 
                "text":'PRINT',
                "filename": 'products_report',
                "title":'Products Report',
                "className": 'btn btn-primary btn-sm text-light mb-2',
                "exportOptions": {
                    "columns": [0,2,3,4,5,6,7],
                   
                },
            },
            { 
                "extend": 'pdf', 
                "text":'PDF',
                "filename": 'products_report',
                "title":'Products Report',
                "className": 'btn btn-primary btn-sm text-light mb-2',
                "exportOptions": {
                    "columns": [0,2,3,4,5,6,7],
                   
                },
            }
        ]
    });
    $('#orderTable').DataTable({
        "order": [[ 0, "desc" ],[ 5, "asc" ]],
        "oLanguage": {
            "sLengthMenu": "_MENU_ Entries"
        },
        dom: 'Blfrtip',
        buttons: [
            { 
                "extend": 'csv', 
                "text":'CSV',
                "filename": 'orders_report',
                "title":'Orders Report',
                "className": 'btn btn-primary btn-sm text-light mb-2',
                "exportOptions": {
                    "columns": [0,1,2,3,4,5,6,7],
                   
                },
            },
            { 
                "extend": 'print', 
                "text":'PRINT',
                "filename": 'orders_report',
                "title":'Orders Report',
                "className": 'btn btn-primary btn-sm text-light mb-2',
                "exportOptions": {
                    "columns": [0,1,2,3,4,5,6,7],
                   
                },
            },
            { 
                "extend": 'pdf', 
                "text":'PDF',
                "filename": 'orders_report',
                "title":'Orders Report',
                "className": 'btn btn-primary btn-sm text-light mb-2',
                "exportOptions": {
                    "columns": [0,1,2,3,4,5,6,7],
                   
                },
            }
        ]
    });

    $('#transTable').DataTable({
        "oLanguage": {
            "sLengthMenu": "_MENU_ Entries"
        },
        dom: 'Blfrtip',
        buttons: [
            { 
                "extend": 'csv', 
                "text":'CSV',
                "filename": 'transaction_report',
                "title":'Transaction Report',
                "className": 'btn btn-primary btn-sm text-light mb-2',
                "exportOptions": {
                    "columns": [0,1,2,3,4],
                   
                },
            },
            { 
                "extend": 'print', 
                "text":'PRINT',
                "filename": 'transaction_report',
                "title":'Transaction Report',
                "className": 'btn btn-primary btn-sm text-light mb-2',
                "exportOptions": {
                    "columns": [0,1,2,3,4],
                   
                },
            },
            { 
                "extend": 'pdf', 
                "text":'PDF',
                "filename": 'transaction_report',
                "title":'Transaction Report',
                "className": 'btn btn-primary btn-sm text-light mb-2',
                "exportOptions": {
                    "columns": [0,1,2,3,4],
                   
                },
            }
        ]
    });

    setTimeout(function(){ $('.alert').fadeOut('slow'); }, 3000);

    // Initialize webcam
    Webcam.set({
        height: 250,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    $('#open_cam').click(function(){
        Webcam.attach( '#my_camera' );
    });
});

$('#product_status').change(function(){
    var status = $(this).val();
    if(status=='Sale'){
        $('#sale_price').attr('readonly',false);
    }else{
        $('#sale_price').attr('readonly',true);
    }

});
$('#product_status1').change(function(){
    var status = $(this).val();
    if(status=='Sale'){
        $('#sale_price1').attr('readonly',false);
    }else{
        $('#sale_price1').attr('readonly',true);
    }

});
function save_photo() {
    // actually snap photo (from preview freeze) and display it
    Webcam.snap( function(data_uri) {
        // display results in page
        document.getElementById('my_camera').innerHTML = 
        '<img src="'+data_uri+'"/>';
        document.getElementById('profileImage').innerHTML = 
        '<input type="hidden" name="profileimg" id="profileImage" value="'+data_uri+'"/>';
    } );
}

function editCat(that){
    id = $(that).attr('data-id');
    cname = $(that).attr('data-cname');
    desc = $(that).attr('data-desc');

    $('#c_id').val(id);
    $('#cname').val(cname);
    $('#details').val(desc);
}

