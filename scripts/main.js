
$(document).ready(()=>{

$('.menu').on('click',(e)=>{
    let a = e.target.id;
    let id=a.substring(4);
    $.ajax({
        url: 'parts_admin/products.php',
        type: 'post',
        data:{
            'id':id
        },
        success:function(data){
            $('#content').html(data);   
        }
    });
});


$('.catpage').on('click',()=>{  
    $.ajax({
        url: 'parts_admin/category.php',
        type: 'post',
        data:{
            'id':''
        },
        success:function(data){
            $('#content').html(data);   
        }
    });   
});



$('.homepage').on('click',()=>{  
   let page='parts_admin/home.php';
   $('#content').load(page); 
});


$('.settingspage').on('click',()=>{  
    let page='parts_admin/settings.php';
    $('#content').load(page); 
});




$('#login').on('click',()=>{
    let user = $('.username').val();
    let pass = $('.password').val();

    if(user.trim().length===0 || pass.trim().length===0 ){
        $('.error-notif').html("Invalid input of user name / password.");
    }else{
        $.ajax({
            url: 'parts_admin/authenticate.php',
            type: 'post',
            data:{
                'username':user,
                'password': pass
            },
            success: function(data){
                // alert(data);
                if(data==1){
                    location.href='parts_admin/authenticated.php';
                }else{
                    $('.error-notif').html("Incorrect user name / password.");
                }
            }
        });    
    }    
    
});




});