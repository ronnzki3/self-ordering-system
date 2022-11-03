
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


$('.btnAddnew').on('click',()=>{
    let page='parts_admin/category_new.php';
    $('#content').load(page);
});


$('.showallcategory').on('click',()=>{
    let page='parts_admin/category.php';
    $('#content').load(page);
});



$('.btn_add_category').on('click',()=>{
    let category=$('.category').val().trim();

    if(category.length==0){
        $('.err_category').html('Invalid empty field.');
    }else{
        $.ajax({
            url:'parts_admin/category_insert.php',
            type:'post',
            data:{
                'category':category,
            },
            success:function(data){
                if(data==1){
                    $('.newlyadded_category').html("Newly added category");
                    $('.nodata_added').hide();
                    $('.category_added').append('<div>'+category+'</div>');
                    $('.category').val('');
                }
            }
        });
    }
    
});


});


