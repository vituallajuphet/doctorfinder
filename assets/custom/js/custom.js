

function login(url, formData, handleData){   
    $.post( url, formData, function(data, status){
        // alert(data);
        handleData(data);
    } );
}

$(document).ready( function(){

    var home_url = "/APPS/updatestracker/";

    //ADMIN LOGIN 
    // $("#adminLoginForm").submit( function(e){
    //     var formData = $(this).serialize();
    //     var url = home_url+"admin/process-login";
    //     login(url, formData, function( data ){
    //         var resultData = JSON.parse(data);
    //         if(resultData.code == "400"){
    //             window.location = home_url+"admin";
    //         } else {
    //             $(".notif").html('<div class="callout callout-danger"><p>Invalid username and password!</p></div>');
    //         }
    //     });
    //     e.preventDefault();
    // } );
    // $("#btn_mod1").click(function(){
    //     $("#modal_create_email").modal('toggle')    
    // })


    $("#LoginForm").submit( function(e){
        var formData = $(this).serialize();
        var url = home_url+"process-login";
        login(url, formData, function( data ){
            var resultData = JSON.parse(data);
            if(resultData.code == "200"){
                if( resultData.user_data[0]["user_type"] == "admin" ){
                    window.location = home_url+"admin";
                } else {
                    window.location = home_url;
                }
            }else {
                $(".notif").html('<div class="callout callout-danger"><p>Invalid username and password!</p></div>');
            }
        });
        e.preventDefault();
    } );
    $("#btn_mod1").click(function(){
        $("#modal_create_email").modal('toggle')    
    })
} );





