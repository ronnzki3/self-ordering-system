
$(document).ready(()=>{

//CAROUSEL START ############################
let i=0;
let images=[];
let time=5000;
images[0]='carousel/1.jpg';
images[1]='carousel/2.jpg';
images[2]='carousel/3.jpg';
images[3]='carousel/9.jpg';
images[4]='carousel/5.jpg';
images[4]='carousel/6.jpg';
images[4]='carousel/7.jpg';
images[4]='carousel/8.jpg';
// change carousel src
function changeCarousel(){
    $('.header').css("background-image", "url("+images[i]+")");
    if(i<images.length-1){
        i++;
    }else{
        i=0;
    }
    setTimeout(changeCarousel,time);
}
window.onload=changeCarousel();
//CAROUSEL END ############################

//Page Load
$('.tap-to-start').addClass('tapscreen-show');
$('.header-caption').addClass('header-caption-active');

$('.tap-to-start').on('click',(e)=>{
    $(e.currentTarget).removeClass('tapscreen-show');
    $('.header-caption').removeClass('header-caption-active');
});

$('.menu').on('click',(e)=>{
    e.preventDefault();   
    let a = e.target.id;
    let id=a.substring(4);
    location.href='admin.php?q='+id;
});


$('.menu_index').on('click',(e)=>{
    e.preventDefault();          
    let a = e.target.id;
    let id=a.substring(4);
    $('.menulist-wrapper').removeClass('active_category');
    $('#catid-'+id).toggleClass('active_category');
    $('.menu-selected').text($(e.currentTarget).text());
    $('.menu_index').removeClass('active_menu_');
    $(e.currentTarget).addClass('active_menu_');
});


$('.catpage').on('click',()=>{  
    location.href='admin.php?q=c';
});


$('.catEdit').on('click',(e)=>{
    e.preventDefault();
    let a = e.target.id;
    let id=a.substring(8);
    let page='parts_admin/category_edit.php?q='+id;
    $('#content').empty();
    $('#content').load(page);
});


$('.catDelete').on('click',(e)=>{
    e.preventDefault();
    let a = e.target.id;
    let id=a.substring(10);
});


$('.homepage').on('click',(e)=>{  
    e.preventDefault();
    location.href='admin.php?q=h';
});


$('.settingspage').on('click',()=>{  
    location.href='admin.php?q=s';
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


$('.btnAddnew').on('click',(e)=>{
    e.preventDefault();
    let page='parts_admin/category_new.php';
    $('#content').empty();
    $('#content').load(page);
});

$('#btnaddNewProduct').on('click',(e)=>{
    e.preventDefault();
    let page='parts_admin/products_new.php?id='+e.target.className;
    $('#content').empty();
    $('#content').load(page);
});

$('.prod_edit').on('click',(e)=>{
    e.preventDefault();
    let a = e.target.id;
    let id=a.substring(10);
    let categoryId=$('.category_id').val();
    let page='parts_admin/products_edit.php?p='+id+'&c='+categoryId;
    $('#content').empty();
    $('#content').load(page);
});


$('.showallcategory').on('click',(e)=>{
    e.preventDefault();
    location.href='admin.php?q=c';
});


$('.showallproducts').on('click',(e)=>{
    e.preventDefault();
    let id=$('.category_id').val();
    location.href='admin.php?q='+id;
});


$('.getproduct').on('click',(e)=>{
    e.preventDefault();
    let getID=e.target.id;
    // if(localStorage.getItem('prd-'+getID)==null){
    //     localStorage.setItem('prd-'+getID,1);
    // }else{
    //     let attempts = (parseInt(localStorage.getItem('prd-'+getID))+1);
    //     localStorage.setItem('prd-'+getID,attempts.toString());
    // }
    if(localStorage.getItem(getID)==null){
        localStorage.setItem(getID,1);
    }else{
        let attempts = (parseInt(localStorage.getItem(getID))+1);
        localStorage.setItem(getID,attempts.toString());
    }
    $('.prd_count-'+getID).html(localStorage.getItem(getID));
    
    let b=0;
    for (let [key, value] of Object.entries(localStorage)) {           
        const prd_hasItem=value;
        if(prd_hasItem>0){ //only has number to be displayed
            // console.log(`${key}: ${value}`);
            b++;
        }
    }
    if(b>0){
        $('.itemcount').addClass('bgblackkk');
    }
    $('.itemcount').html(b.toString());

    //display total order amount
    getTotalOrderAmount();
});

function getTotalOrderAmount(){
    let getTotalOrder=0;
    var productLists=new Array();
    for (let [key, value] of Object.entries(localStorage)) {           
        const prd_hasItem=value;
        if(prd_hasItem>0){ //only has number to be displayed
            // console.log(`${key}: ${value}`);
            let product_id=`${key}`;
            let prdqty=`${value}`;
            productLists[product_id]=prdqty;           
        }
    }               
    var productLists_ = JSON.stringify(productLists);
    //get total order amount    
    $.ajax({
        url:'pages/ordersum.php',
        type:'post',
        data:{'productLists':productLists_},
        cache: false,
        success:function(data){
            getTotalOrder =parseInt(getTotalOrder) + parseInt(data);
            $('.span-total-amount').html('&#8369;'+getTotalOrder.toLocaleString()); 
        }
    });
}

$('.span-cart').on('click',(e)=>{
    e.preventDefault();
    $('.cart_items').html('');
    let getTotalOrder=0;
    var productLists=new Array();
    for (let [key, value] of Object.entries(localStorage)) {           
        const prd_hasItem=value;
        if(prd_hasItem>0){ //only has number to be displayed
            // console.log(`${key}: ${value}`);
            let product_id=`${key}`;
            let prdqty=`${value}`;
            productLists[product_id]=prdqty;           
        }
    }          
    // for (var i in productLists) {
    //     alert('key is: ' + i + ', value is: ' + productLists[i]);
    // }
    var productLists_ = JSON.stringify(productLists);
    $.ajax({
        type:'post',
        url:'pages/orderlist.php',
        data:{'productLists':productLists_},
        cache: false,
        success:function(data){
            $('.cart_items').append(data);
            $('#modalform').modal();
        }
    });         

    //get total order amount    
    $.ajax({
        url:'pages/ordersum.php',
        type:'post',
        data:{'productLists':productLists_},
        cache: false,
        success:function(data){
            getTotalOrder =parseInt(getTotalOrder) + parseInt(data);                      
            $('.display_order_total').html('&#8369;'+getTotalOrder.toLocaleString());  
        }
    });
    $('.header-caption').addClass('header-caption-active');
});


$('.btn_add_category').on('click',(e)=>{
    e.preventDefault();
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


$('.btn_update_category').on('click',(e)=>{
    e.preventDefault();
    let category=$('.category').val().trim();
    let cateId=$('.category_id').val().trim();

    if(category.length==0){
        $('.err_category').html('Invalid empty field.');
    }else{
        $.ajax({
            url:'parts_admin/category_update.php',
            type:'post',
            data:{
                'category':category,
                'id':cateId,
            },
            success:function(data){
                    $('.update-confirm').html(data);
                    $('.category_cancel').html('Show all');
                    $('.category_cancel').addClass('showall_display');
            }
        });
    }
    
});


$('.btn_add_products').on('click',(e)=>{
    e.preventDefault();
     let products=$('.product').val().trim();
     let price=$('.price').val().trim();
     let props=$('.uploaded_file').prop('files'),file=props[0];
    // let category_id=$('.category_id').val().trim();

    if(products.length==0 || price.length==0 || $('.uploaded_file').get(0).files.length === 0){
        $('.err_products').html('Invalid empty field.');
    }else{
        var formData = new FormData($('#productform')[0]);
	    $.ajax({
		url: 'parts_admin/products_insert.php',
		data: formData,
		async: false,
		contentType: false,
		processData: false,
		cache: false,
		type: 'POST',
		success: function(data)
			{
				$('.nodata_added').hide();
				// $('.myimg').empty();
				$('.display_added_products').append(data);
			},
		});    
		return false;    
    }
    
});

$('.btnChangePic').on('click',(e)=>{
    e.preventDefault();
    $('.oldpic').hide();
    $('.newpic').removeClass('newpic-hide');
    $('.newpic').show();
});

$('.btn_update_products').on('click',(e)=>{
    e.preventDefault();
     let products=$('.product').val().trim();
     let price=$('.price').val().trim();
     let props=$('.uploaded_file').prop('files'),file=props[0];
    if(products.length==0 || price.length==0 || $('.uploaded_file').get(0).files.length === 0){
        $('.err_products').html('Invalid empty field.');
    }else{
        var formData = new FormData($('#productform2')[0]);
	    $.ajax({
		url: 'parts_admin/products_update.php',
		data: formData,
		async: false,
		contentType: false,
		processData: false,
		cache: false,
		type: 'POST',
		success: function(data)
        {
            $('.display_added_products').append(data);
            $('.showallproducts').html('Show all');
            $('.showallproducts').addClass('showall_display');
        },
		});    
		return false;    
    }
    
});




$('.span-cancel').on('click',(e)=>{
    e.preventDefault();
    $('.prd_count').empty();
    $('.span-total-amount').html('&#8369;0');
    $('.itemcount').empty();
    $('.itemcount').removeClass('bgblackkk');
    localStorage.clear();
    $('.header-caption').removeClass('header-caption-active');
});

$('.add-more-menu, .closemodal').on('click',(e)=>{
    e.preventDefault();
    $.modal.close();
    $('.header-caption').removeClass('header-caption-active');
});

$('.closemodal_final, .edit-more-menu').on('click',(e)=>{
    e.preventDefault();
    $.modal.close();
    $('#modalform').modal();
});

$('.order-proceed').on('click',(e)=>{
    e.preventDefault();
    $('.cart_items_final').html('');
    let getTotalOrder=0;
    var productLists=new Array();
    for (let [key, value] of Object.entries(localStorage)) {           
        const prd_hasItem=value;
        if(prd_hasItem>0){ //only has number to be displayed
            // console.log(`${key}: ${value}`);
            let product_id=`${key}`;
            let prdqty=`${value}`;
            productLists[product_id]=prdqty;           
        }
    }          
    var productLists_ = JSON.stringify(productLists);
    $.ajax({
        type:'post',
        url:'pages/orderfinal.php',
        data:{'productLists':productLists_},
        cache: false,
        success:function(data){
            $('.cart_items_final').append(data);
            $.modal.close(); //close the 1st form
            $('#modalform_order').modal();
        }
    });         

    //get total order amount    
    $.ajax({
        url:'pages/ordersum.php',
        type:'post',
        data:{'productLists':productLists_},
        cache: false,
        success:function(data){
            getTotalOrder =parseInt(getTotalOrder) + parseInt(data);                      
            $('.display_order_total').html('&#8369;'+getTotalOrder.toLocaleString());  
        }
    });
    $('.header-caption').addClass('header-caption-active');
});


$('.order-proceed-final').on('click',(e)=>{
    e.preventDefault();
    $.modal.close();
    $('#modalform_dinein_out').modal();
});



function ProcessingOrders(orderMode){
    //SAVE ORDERS
    var productLists=new Array();
    for (let [key, value] of Object.entries(localStorage)) {           
        const prd_hasItem=value;
        if(prd_hasItem>0){ //only has number to be displayed
            // console.log(`${key}: ${value}`);
            let product_id=`${key}`;
            let prdqty=`${value}`;
            productLists[product_id]=prdqty;           
        }
    }   
    var productLists_ = JSON.stringify(productLists);
    let _orderTotal=$('.span-total-amount').text().substring(1);

    $.ajax({
        type:'post',
        url:'pages/saveorder.php',
        data:{
            'productLists':productLists_,
            'order_mode': orderMode,
            'order_total': parseFloat(_orderTotal),
        },
        cache: false,
        success:function(data){
            $('.order_number_').html(data);
            $('.prd_count').empty();
            $('.span-total-amount').html('&#8369;0');
            $('.itemcount').empty();
            $('.itemcount').removeClass('bgblackkk');
            localStorage.clear();
            $.modal.close();
            $('#modalform_processed').modal();
        }
    });     
   
}
function ProcessingDisplayIn(){
    ProcessingOrders('Dine in');    
}

function ProcessingDisplayOut(){
    ProcessingOrders('Takeout');    
}

function DisplayTapScreen(){
    $.modal.close();
    $('.tap-to-start').addClass('tapscreen-show');
    $('.header-caption').addClass('header-caption-active');
    
}

$('.dinein').on('click',(e)=>{
    e.preventDefault();
    //load ProcessingDisplay() function, then after 5seconds ProcessingOrders() function to be called
    setTimeout(ProcessingDisplayIn,3000);   
    setTimeout(DisplayTapScreen,60000); //hold for 60seconds
    $.modal.close();    
    $('#modalform_process').modal();  
});


$('.takeout').on('click',(e)=>{
    e.preventDefault();
     //load ProcessingDisplay() function, then after 5seconds ProcessingOrders() function to be called
     setTimeout(ProcessingDisplayOut,3000);   
     setTimeout(DisplayTapScreen,60000); //hold for 60seconds
     $.modal.close();    
     $('#modalform_process').modal();  
});



$('.start-new-order').on('click',(e)=>{
    e.preventDefault();
    $('.header-caption').removeClass('header-caption-active');
    $.modal.close();
});

$('.prod_del').on('click',(e)=>{
    e.preventDefault();
    let a=e.target.id;
    let id=a.substring(9);
    $.ajax({
        url:'parts_admin/deleteProductInfo.php',
        type:'POST',
        cache:false,
        data:{
            'id':id,
        },
        success:function(data){
            $('.deleteProduct-wrapper').empty();
            $('.deleteProduct-wrapper').html(data);
            $('#modalform_deleteProduct').modal();
        }
    });

});

$('.catDelete').on('click',(e)=>{
    e.preventDefault();
    let a=e.target.id;
    let id=a.substring(10);
    $.ajax({
        url:'parts_admin/deleteCategoryInfo.php',
        type:'POST',
        cache:false,
        data:{
            'id':id,
        },
        success:function(data){
            $('.deleteCat-wrapper').empty();
            $('.deleteCat-wrapper').html(data);
            $('#modalform_deleteCat').modal();
        }
    });

});


$('.modalBtnCancel').on('click',()=>{
    $.modal.close();
});
$('.modalBtnDelete').on('click',(e)=>{
    e.preventDefault();
    let id=$('.productIdd').val();
    $.ajax({
        url:'parts_admin/deletedProduct.php',
        type:'post',
        data:{
            'id':id,
        },
        success:function(data){
            $.modal.close();
            location.reload();
        }
    });
   
});



$('.modalBtnCancelC').on('click',()=>{
    $.modal.close();
});
$('.modalBtnDeleteC').on('click',(e)=>{
    e.preventDefault();
    let id=$('.categoryIdd').val();
    $.ajax({
        url:'parts_admin/deletedCategory.php',
        type:'post',
        data:{
            'id':id,
        },
        success:function(data){
            $.modal.close();
            location.reload();
        }
    });
   
});


});





