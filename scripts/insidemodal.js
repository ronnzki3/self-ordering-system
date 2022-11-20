

$(document).ready(()=>{

    $('.minusqty').on('click',(e)=>{
        e.preventDefault();
        let getid_=e.target.id;
        let getid=getid_.substring(9);
        let qty=parseInt($('#qty_id_'+getid).text());
        if(qty>0){
            qty =qty - 1;
        }
        if(qty<=0){
            $('.trow_'+getid).addClass('trow-none');
        }
        //update modal qty dispaly
        $('#qty_id_'+getid).text(qty);

        //update product qty display
        $('.prd_count-'+getid).text(qty);
        
        //setting new value for localstorage
        for (let [key, value] of Object.entries(localStorage)) {           
            const prd_hasItem=value;
            if(prd_hasItem>0){
                // console.log(`${key}: ${value}`);
                let _getid=`${key}`;
                let _getqty=`${value}`;
                if(_getid===getid){
                    localStorage.setItem(_getid,qty);
                }
            }
        }

        //update total order amount
        getTotalOrderAmount();

        //display cart count
        displayCartCount();
    });
    


    $('.plusqty').on('click',(e)=>{
        e.preventDefault();
        let getid_=e.target.id;
        let getid=getid_.substring(8);
        let qty=parseInt($('#qty_id_'+getid).text());        
        qty =qty + 1;
        //update modal qty dispaly
        $('#qty_id_'+getid).text(qty);

        //update product qty display
        $('.prd_count-'+getid).text(qty);

        //setting new value for localstorage
        for (let [key, value] of Object.entries(localStorage)) {           
            const prd_hasItem=value;
            if(prd_hasItem>0){
                // console.log(`${key}: ${value}`);
                let _getid=`${key}`;
                let _getqty=`${value}`;
                if(_getid===getid){
                    localStorage.setItem(_getid,qty);
                }
            }
        }
        //update total order amount
        getTotalOrderAmount();

        //display cart count
        displayCartCount();
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
                $('.display_order_total').html('&#8369;'+getTotalOrder.toLocaleString()); 
                
            }
        });
    }

    function displayCartCount(){
        let b=0;
        for (let [key, value] of Object.entries(localStorage)) {           
            const prd_hasItem=value;
            if(prd_hasItem>0){ //only has number to be displayed
                // console.log(`${key}: ${value}`);
                b++;
            }
        }
        $('.itemcount').html(b.toString());

        if(b>0){
            $('.itemcount').addClass('bgblackkk');
        }else{
            $('.prd_count').empty();
            $('.span-total-amount').html('&#8369;0');
            $('.itemcount').empty();
            $('.itemcount').removeClass('bgblackkk');
            localStorage.clear();
            $.modal.close();
        }
        
    }


});