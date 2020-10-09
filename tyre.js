$(document).ready(function(){
    // alert("yes");

    //fetch search field
    
$(document).on('click', '#brand', function(){
    $.ajax({
        method: 'POST',
        url: 'ajax-search.php',
        // dataType:'json',
        data:{brand:1},
        success: function(data){
            $("#search").html(data); 

            $(function () {
                $('.block-finder__form-control--select select').on('change', function () {
                    const item = $(this).closest('.block-finder__form-control--select');
        
                    if ($(this).val() !== 'none') {
                        item.find('~ .block-finder__form-control--select:eq(0) select').prop('disabled', false).val('none');
                        item.find('~ .block-finder__form-control--select:gt(0) select').prop('disabled', true).val('none');
                    } else {
                        item.find('~ .block-finder__form-control--select select').prop('disabled', true).val('none');
                    }
        
                    item.find('~ .block-finder__form-control--select select').trigger('change.select2');
                });
            });

            $(function () {
                $('.form-control-select2, .block-finder__form-control--select select').select2({ width: '' });
            });

        }
    })
})

    
$(document).on('click', '#size', function(){
    $.ajax({
        method: 'POST',
        url: 'ajax-search.php',
        // dataType:'json',
        data:{size:1},
        success: function(data){
            $("#search").html(data); 

            $(function () {
                $('.block-finder__form-control--select select').on('change', function () {
                    const item = $(this).closest('.block-finder__form-control--select');
        
                    if ($(this).val() !== 'none') {
                        item.find('~ .block-finder__form-control--select:eq(0) select').prop('disabled', false).val('none');
                        item.find('~ .block-finder__form-control--select:gt(0) select').prop('disabled', true).val('none');
                    } else {
                        item.find('~ .block-finder__form-control--select select').prop('disabled', true).val('none');
                    }
        
                    item.find('~ .block-finder__form-control--select select').trigger('change.select2');
                });
            });


            $(function () {
                $('.form-control-select2, .block-finder__form-control--select select').select2({ width: '' });
            });
        }
    })
})


   
$(document).on('click', '#budget', function(){
    $.ajax({
        method: 'POST',
        url: 'ajax-search.php',
        // dataType:'json',
        data:{budget:1},
        success: function(data){
            $("#search").html(data); 

            $(function () {
                $('.block-finder__form-control--select select').on('change', function () {
                    const item = $(this).closest('.block-finder__form-control--select');
        
                    if ($(this).val() !== 'none') {
                        item.find('~ .block-finder__form-control--select:eq(0) select').prop('disabled', false).val('none');
                        item.find('~ .block-finder__form-control--select:gt(0) select').prop('disabled', true).val('none');
                    } else {
                        item.find('~ .block-finder__form-control--select select').prop('disabled', true).val('none');
                    }
        
                    item.find('~ .block-finder__form-control--select select').trigger('change.select2');
                });
            });


            $(function () {
                $('.form-control-select2, .block-finder__form-control--select select').select2({ width: '' });
            });
        }
    })
})

    
$(document).on('click', '#name', function(){
    $.ajax({
        method: 'POST',
        url: 'ajax-search.php',
        // dataType:'json',
        data:{name:1},
        success: function(data){
            $("#search").html(data); 
            
            $(function () {
        $('.block-finder__form-control--select select').on('change', function () {
            const item = $(this).closest('.block-finder__form-control--select');

            if ($(this).val() !== 'none') {
                item.find('~ .block-finder__form-control--select:eq(0) select').prop('disabled', false).val('none');
                item.find('~ .block-finder__form-control--select:gt(0) select').prop('disabled', true).val('none');
            } else {
                item.find('~ .block-finder__form-control--select select').prop('disabled', true).val('none');
            }

            item.find('~ .block-finder__form-control--select select').trigger('change.select2');
        });
    });

            $(function () {
                $('.form-control-select2, .block-finder__form-control--select select').select2({ width: '' });
            });
        }
    })
})


//size

$(document).on("change", "#sizeWidth", function(){
    var option = $(this).find('option:selected');
    var selected =$(this).attr("select")
    var value= option.val();
    var text = option.text();

    // alert(value);
    if(value == ""){

        //fetch value for width
        $.ajax({
            success:function(data){
                $("#width").html(''); 
            }

        })
    }else{
        //fetch value for width
       
        $.ajax({
            url:"ajax-search.php",
            method:"POST",
            data:{sizeProfile:1,id:value},
            success:function(data){
                $("#sizeProfile").html(data); 
            }

        })

        $.ajax({
            url:"ajax-search.php",
            method:"POST",
            data:{sizeRim:1,id:value},
            success:function(data){
                $("#sizeRim").html(data); 
            }

        })
    }
    
    
})



//year

$(document).on("change", "#yearMake", function(){
    var option = $(this).find('option:selected');
    var selected =$(this).attr("select")
    var value= option.val();
    var text = option.text();

    // alert(value);
    if(value == ""){

        //fetch value for width
        $.ajax({
            success:function(data){
                $("#width").html(''); 
            }

        })
    }else{
        //fetch value for width
       
        $.ajax({
            url:"ajax-search.php",
            method:"POST",
            data:{yearMake:1,id:value},
            success:function(data){
                $("#yearModel").html(data); 
            }

        })

        $.ajax({
            url:"ajax-search.php",
            method:"POST",
            data:{yearVehicle:1,id:value},
            success:function(data){
                $("#vehicleYear").html(data); 
            }

        })
    }
    
    
})


$(document).on("click","#plan", function(){
    var btn = $(this).attr("plan");
    var balls = $("#fullPayments").val();
    var ball = $("#fullPays").val();
    // alert(ball);
    $.ajax({
        success:function(){
            $("#buttons").html("<button class='btn btn-primary btn-lg btn-block' btnNumber='"+btn+"' id='subCart'>Proceed</button>");
            $("#work").html('&#8358;'+ball);
            $("#works").html('&#8358;'+balls+'.00');
        }

    })
})


$(document).on("click","#fullPayment", function(){   
    var ball = $("#price").val(); 
    var balls = $("#fullPay").val();

    $.ajax({
        success:function(){
            $("#buttons").html("<button class='btn btn-primary btn-lg btn-block' id='addToCart'>Add to cart</button>");
            // $("#work").html('<span style="text-decoration: line-through;font-size:25px">&#8358;'+ball+'</span><br>&#8358;'+balls+'') 
            $("#work").html('&#8358;'+ball);
            $("#works").html('&#8358;'+balls+'.00');
        }

    })
})

function reload() {
    window.location.assign("cart");
}

function reloads() {
    window.location.assign("subscribe");
}

// function reloadw() {
//     window.location.assign("wishlist");
// }
//shopping cart functionality

load_cart();

    function load_cart(){
		$.ajax({
			url:"result.php",
			method:"POST",
			dataType:"json",
			success:function(data)
			{
                $('#cart_details').html(data.cart_details);
                $('#total').html(data.total);
                $('#totalx').html(data.total);
                $('#outl').html(data.outl);
                $('.ball').text(data.total_item);  
                $('#sub').html(data.sub);
                $('#itemTotal').text(data.total_item);
                $('#clearBtnc').html(data.clearBtnc);
                $('#card').html(data.card);
                $('#checkout').html(data.check);
			}
		});
    }

    

$(document).on("click", "#addToCart", function(e){
    e.preventDefault();
    var pid = $("#proid").val();
    var pname = $("#pname").val();
    var brand = $("#brand").val();
    var sku = $("#sku").val();
    var vcode = $("#vcode").val();
    var img = $("#img").val();
    var price = $("#fullPayment").val();
    var quantity = $("#quantity").val();

    var action = 'add';               
    $.ajax({
        url:"session.php",
        method:"POST",                    
        data:{
            addCart:1, 
            id:pid, 
            price:price, 
            name:pname, 
            brand:brand,
            vcode:vcode,
            sku:sku,
            img:img,
            qty:quantity, 
            action:action
        },
        
        success:function(){
            load_cart();
            reload();

            
            
        }
    });
    

})

//wishlist

$(document).on("click", "#addToCarts", function(e){
    e.preventDefault();
    var pid = $(this).attr("pid");
    var pname = $("#pname"+pid).val();
    var brand = $("#brand"+pid).val();
    var sku = $("#sku"+pid).val();
    var vcode = $("#vcode"+pid).val();
    var img = $("#img"+pid).val();
    var price = $("#fullPayment"+pid).val();
    var quantity = $("#quantity"+pid).val();

    var action = 'add';               
    $.ajax({
        url:"session.php",
        method:"POST",                    
        data:{
            addCart:1, 
            id:pid, 
            price:price, 
            name:pname, 
            brand:brand,
            vcode:vcode,
            sku:sku,
            img:img,
            qty:quantity, 
            action:action
        },
        
        success:function(){
            load_cart();
            reload();

            
            
        }
    });
    

})


//increase cart +1
$(document).on("click", "#pot", function(){
    var id= $(this).attr("pid");

    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'Remove from wishlist?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
        
        }).then((result) => {
        if (result.value){
            $.ajax({
                url:"ajax-sub.php",
                method:"POST",                    
                data:{pot:1, id:id},        
                success:function(){
                    setInterval(function(){
                        window.location.assign("wishlist");
                    },2000);             
                }
            })
            .done(function(){
                Swal.fire({
                    type:'success', 
                    title:'Item removed'
                });
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });
    
    
})




//increase cart +1
$(document).on("click", "#plus", function(){
    var id= $(this).attr("pid");
    
    $.ajax({
        url:"session.php",
        method:"POST",                    
        data:{plusbudget:1, id:id},        
        success:function(){
            load_cart();            
        }
    });
})
//decrease cart -1
$(document).on("click", "#minus", function(){
    var id= $(this).attr("pid");
    // console.log(id);
    
    $.ajax({
        url:"session.php",
        method:"POST",                    
        data:{minusbudget:1, id:id},        
        success:function(){
            load_cart();            
        }
    });
})


  //Remove cart with id
  $(document).on('click', '.delete', function(){
    // e.preventDefault();
            var id = $(this).attr("id");
            // alert(id);
            var action = 'remove';                
                $.ajax({
                    url:"session.php",
                    method:"POST",
                    data:{id:id, action:action},
                    success:function(data){
                        load_cart();
                        // $("#remove").html(data);
                        Swal.fire({
                            position: 'center',
                            type: 'success',
                            title: 'Product removed',
                            showConfirmButton: false,
                            animation: true,
                            customClass: {
                                popup: 'animated wobble'
                            },
                            timer: 2500,
                            
                          });
                    }
                })
           
    });
    
    //Remove cart with id
    $(document).on('click', '#clearBtncp', function(){
        // e.preventDefault();  
        Swal.fire({
            position: 'center',
            type: 'warning',
            title: 'Clear your cart?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
            
            }).then((result) => {
            if (result.value){
                $.ajax({
                    url:"session.php",
                    method:"POST",
                    data:{cancel:1},
                    success:function(data){
                        load_cart();
                        $("#remove").html(data);
                        
                    }
                })
                .done(function(response){
                    Swal.fire({
                        type:'success', 
                        title:'Cart cleared'
                    });
                })
                .fail(function(){
                    Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                });
            }
    
        });
                
    });

    
    $(document).on("change", "#mySelects", function(){
        var option = $(this).find('option:selected');
        var selected =$(this).attr("select")
        var value= option.val();
        var text = option.text();
    
        if (value == "") {
            value = 0;
            $.ajax({
                url:"add-cart.php",
                method:"POST",
                dataType:"json",
                data:{SumTotal:1, id:value, text:text},
                success:function(data){
                    $("#topup").html(data.topc);
                    $("#chargex").html(data.topct);
                    $("#page").html('');
                    $("#stationPick").html('');
                }
            })
        }else if(value =='Delivery Station'){
            value = 0;
            $.ajax({
                url:"select-station.php",
                method:"POST",
                data:{Station:1, },
                success:function(data){
                    $("#stationPick").html(data);
                }
            })

            $.ajax({
                url:"add-cart.php",
                method:"POST",
                dataType:"json",
                data:{SumTotal:1, id:value, text:text},
                success:function(data){
                    // $("#page").html(data.page);
                    $("#chargex").html(data.topct);
                }
            })

        }else {
            // $('#mySubmits').prop("disabled", false);
           
            $.ajax({
                url:"add-cart.php",
                method:"POST",
                dataType:"json",
                data:{SumTotal:1, id:value, text:text},
                success:function(data){
                    $("#topup").html(data.topc);
                    $("#chargex").html(data.topct);
                    $("#page").html(data.page);
                }
            })
    
            
        }
    
        })

    $(document).on("change", "#mySelectsx", function(){
        var option = $(this).find('option:selected');
        var selected =$(this).attr("select")
        var value= option.val();
        var text = option.text();
    
        if (value == "") {
            value = 0;
            $.ajax({
                url:"add-cart.php",
                method:"POST",
                dataType:"json",
                data:{SumTotal:1, id:value, text:text},
                success:function(data){
                    $("#topup").html(data.topc);
                    $("#chargex").html(data.topct);
                    $("#page").html('');
                }
            })
        }else {           
            $.ajax({
                url:"add-cart.php",
                method:"POST",
                dataType:"json",
                data:{SumTotal:1, id:value, text:text},
                success:function(data){
                    $("#topup").html(data.topc);
                    $("#chargex").html(data.topct);
                    $("#page").html(data.page);
                }
            })
    
            
        }
    
        })


// 2066493028
//subscription functionality

load_sub();

    function load_sub(){
		$.ajax({
			url:"result-sub.php",
			method:"POST",
			dataType:"json",
			success:function(data)
			{
                $('#sub_details').html(data.sub_details);
                $('#totals').html(data.totals);
                $('#outls').html(data.outls);
                $('.balls').text(data.total_items);  
                $('#subs').html(data.subs);
                $('#itemTotals').text(data.total_items);
                $('#clearBtns').html(data.clearBtns);
                $('#cards').html(data.cards);
                $('#grand').html(data.totals);
			}
		});
    }

$(document).on("click", "#subCart", function(){
    var pid = $("#proid").val();
    var pname = $("#pname").val();
    var brand = $("#brand").val();
    var sku = $("#sku").val();
    var vcode = $("#vcode").val();
    var img = $("#img").val();
    var price = $("#fullPaymentss").val();
    var quantity = $("#quantity").val();
    var plan =$("input[name='filter_vehicle']:checked").val();
    var planNum =$(this).attr("btnNumber");
    // alert(planNum);
    // console.log(pid,pname, img, price, quantity, plan, brand, sku, vcode, planNum);
    var action = 'sub';               
    $.ajax({
        url:"session-sub.php",
        method:"POST",                    
        data:{
            addSub:1, 
            id:pid, 
            price:price, 
            name:pname, 
            brand:brand,
            vcode:vcode,
            sku:sku,
            img:img,
            qty:quantity, 
            plan:plan, 
            planNum:planNum, 
            action:action
        },
        
        success:function(){
            load_sub();
            reloads();

            
            
        }
    });

})

$(document).on("click", "#switch", function(){
    
    $.ajax({       
        success:function(){
            $("#changepage").html('<a href="cart-payment" id="cartAddressBtn" class="btn btn-primary btn-xl btn-block">Complete Order</a>')
        }
    });
})

$(document).on("click", "#switchs", function(){    
    // window.location.assign("orders");
    $.ajax({       
        success:function(){
            $("#changepage").html('<a href="pay-delivery" id="cartAddressBtn" class="btn btn-primary btn-xl btn-block">Complete Order</a>')
        }
    });
})


$(document).on("click","#cartAddressBtn", function(e){
    //check if the new address is true
    
    var lope = $('#newAddress').is(':checked')
    if(lope){
        // alert("yes");
        // e.preventDefault();
        var text = $('#checkout-comment').val();
        if(text==''){
            $('#checkout-comment').prop('required',true);
            $('#checkout-comment').focus();
            e.preventDefault();
        }else{
            var address = $("#checkout-comment").val();
                // alert(address);
                $.ajax({
                    url:"address-location.php",
                    method:"POST",                    
                    data:{Address:1, message:address},        
                    success:function(){ }
                }); 

            
        }
    }else{
        // alert("no")
        // e.preventDefault();
        var defaultVal = $("#default").val();
        $.ajax({
            url:"address-default.php",
            method:"POST",                    
            data:{Address:1, message:defaultVal},        
            success:function(){ }
        }); 
    }

    // e.preventDefault();
    // var address = $("#cart-address").val();  
    // // alert(address);
    // if( typeof address !='undefined'){
    //     // alert(address);
    //     $.ajax({
    //         url:"address-location.php",
    //         method:"POST",                    
    //         data:{Address:1, message:address},        
    //         success:function(){ }
    //     }); 

    // }
    
})

//increase sub +1
$(document).on("click", "#pluss", function(){
    var id= $(this).attr("pid");
    
    $.ajax({
        url:"session-sub.php",
        method:"POST",                    
        data:{plussubscribe:1, id:id},        
        success:function(){
            load_sub();            
        }
    });
})
//decrease sub -1
$(document).on("click", "#minuss", function(){
    var id= $(this).attr("pid");
    // console.log(id);
    
    $.ajax({
        url:"session-sub.php",
        method:"POST",                    
        data:{minussubscribe:1, id:id},        
        success:function(){
            load_sub();            
        }
    });
})

 //Remove cart with id
 $(document).on('click', '.deletes', function(){
    // e.preventDefault();
    var id = $(this).attr("id");
    // alert(id);
    var action = 'remove';                
        $.ajax({
            url:"session-sub.php",
            method:"POST",
            data:{id:id, action:action},
            success:function(data){
                load_sub();
                // $("#remove").html(data);
                Swal.fire({
                    position: 'center',
                    type: 'success',
                    title: 'Product removed',
                    showConfirmButton: false,
                    animation: true,
                    customClass: {
                        popup: 'animated wobble'
                    },
                    timer: 2500,
                    
                });
            }
        })
           
    });


//Remove cart with id
$(document).on('click', '#clearBtnss', function(){
    // e.preventDefault();  
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'Clear your Plan?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
        
        }).then((result) => {
        if (result.value){
            $.ajax({
                url:"session-sub.php",
                method:"POST",
                data:{cancel:1},
                success:function(data){
                    load_sub();
                    $("#remove").html(data);
                    
                }
            })
            .done(function(response){
                Swal.fire({
                    type:'success', 
                    title:'Plan cleared'
                });
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });
            
});




    $(document).on("change", "#mySelect", function(){
    var option = $(this).find('option:selected');
    var selected =$(this).attr("select")
    var value= option.val();
    var text = option.text();

    if (value == "") {
        $('#mySubmit').prop("disabled", true);
        value = 0;
        $.ajax({   
            url:"add.php",
            method:"POST",
			dataType:"json",
            data:{SumTotal:1, id:value, text:text},     
            success:function(data){
                $("#grand").html(data.top);
                $("#charges").html("&#8358;0.00");
                $("#station").html('');
            }
        });
    }else if(value =='Delivery Station'){
        $('#mySubmit').prop("disabled", true);
        $.ajax({
            url:"select-station-sub.php",
            method:"POST",
            data:{Station:1, },
            success:function(data){
                $("#station").html(data);
            }
        });
        value = 0;
        $.ajax({   
            url:"add.php",
            method:"POST",
			dataType:"json",
            data:{SumTotal:1, id:value, text:text},     
            success:function(data){
                $("#grand").html(data.top);
                $("#charges").html("&#8358;0.00");
            }
        });
    }else {
        $('#mySubmit').prop("disabled", false);
        $.ajax({
            url:"add.php",
            method:"POST",
			dataType:"json",
            data:{SumTotal:1, id:value, text:text},
            success:function(data){
                // load_sub();
                $("#grand").html(data.top);
                $("#charges").html(data.tops);
                $("#station").html('');
            }
        })

        
    }

    })

    // $(document).on("keyup","#sub-address",function(){
    //     var text = $("#sub-address").val();
    //     if(text.length > 10){
    //         $('#mySubmit').prop("disabled", false);
    //     }else{
    //         $('#mySubmit').prop("disabled", true);
    //     }
    // })

    $(document).on("click","#mySubmit",function(e){
        // e.preventDefault();
        var lope = $('#newAddresss').is(':checked')
        if(lope){
            // alert("yes");
            // e.preventDefault();
            var text = $('#checkout-comment').val();
            if(text==''){
                $('#checkout-comment').prop('required',true);
                $('#checkout-comment').focus();
                e.preventDefault();
            }else{
                var address = $("#checkout-comment").val();
                    // alert(address);
                    $.ajax({
                        url:"address-location.php",
                        method:"POST",                    
                        data:{Address:1, message:address},        
                        success:function(){ }
                    }); 

                
            }
        }else{
            // alert("no")
            // e.preventDefault();
            var defaultVal = $("#defaults").val();
            $.ajax({
                url:"address-default.php",
                method:"POST",                    
                data:{Address:1, message:defaultVal},        
                success:function(){ }
            }); 
        }
        
    })

    
    $(document).on("change", "#mySelectsss", function(){
        var option = $(this).find('option:selected');
        var selected =$(this).attr("select")
        var value= option.val();
        var text = option.text();
    
        if (value == "") {
            $('#mySubmit').prop("disabled", true);
            value = 0;
            $.ajax({   
                url:"add.php",
                method:"POST",
                dataType:"json",
                data:{SumTotal:1, id:value, text:text},     
                success:function(data){
                    $("#grand").html(data.top);
                    $("#charges").html("&#8358;0.00");
                    $("#station").html('');
                }
            });
        }else {
            $('#mySubmit').prop("disabled", false);
            $.ajax({
                url:"add.php",
                method:"POST",
                dataType:"json",
                data:{SumTotal:1, id:value, text:text},
                success:function(data){
                    $("#grand").html(data.top);
                    $("#charges").html(data.tops);
                }
            })
    
            
        }
    
        })

    //Update sub to cancelled
$(document).on('click', '#sub-cancelled', function(){
    // e.preventDefault();  
    var subid=$(this).attr("subid");
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'Cancel this?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
        
        }).then((result) => {
        if (result.value){
            $.ajax({
                url:"ajax-sub.php",
                method:"POST",
                data:{subCancel:1, id:subid},
                success:function(){
                    setInterval(function(){
                        window.location.assign("account-subscription-plan");
                    },2000);
                }
            })
            .done(function(){
                Swal.fire({
                    type:'success', 
                    title:'Cancelled!'
                });
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });
            
});


//wishlist

$(document).on("click", "#wishlist", function(){
    var pid = $("#proid").val();
    window.location.assign("wishlist-process?pid="+pid);
              
    // $.ajax({
    //     url:".php",
    //     method:"POST",                    
    //     data:{ wishlist:1, id:pid },
    //     success:function(){
            
    //     }
    // });
    

})
function reloadcom() {
    window.location.assign("compare");
}
compare();
function compare(){
    $.ajax({
        url:"compare-result.php",
        method:"POST",
        dataType:"json",
        success:function(data)
        {
            $('#compare_details').html(data);
        }
    });
}




$(document).on("click", "#addToCompare", function(e){
    e.preventDefault();
    var pid = $("#proid").val();
    var pname = $("#pname").val();
    var brand = $("#brand").val();
    var sku = $("#sku").val();
    var avaliable = $("#avaliable").val();
    var img = $("#img").val();
    var price = $("#fullPayment").val();    
    var vcode = $("#vcode").val();

    // console.log(pid, pname, brand, sku, avaliable, img, price);
    
    var action = 'add';               
    $.ajax({
        url:"compare-session.php",
        method:"POST",                    
        data:{
            addCompare:1, 
            id:pid, 
            price:price, 
            name:pname, 
            brand:brand,
            vcode:vcode,
            avaliable:avaliable,
            sku:sku,
            img:img, 
            action:action
        },
        
        success:function(){
            compare();
            reloadcom();

            
            
        }
    });
    

})


 //Remove cart with id
 $(document).on('click', '#pots', function(){
    // e.preventDefault();
            var id = $(this).attr("pid");
            // alert(id);
            var action = 'remove';                
                $.ajax({
                    url:"compare-session.php",
                    method:"POST",
                    data:{id:id, action:action},
                    success:function(data){
                        compare();
                        // $("#remove").html(data);
                        Swal.fire({
                            position: 'center',
                            type: 'success',
                            title: 'Product removed',
                            showConfirmButton: false,
                            animation: true,
                            customClass: {
                                popup: 'animated wobble'
                            },
                            timer: 2500,
                            
                          });
                    }
                })
           
    });


    $(document).on('click', '#clearCompare', function(){
        // e.preventDefault();  
        Swal.fire({
            position: 'center',
            type: 'warning',
            title: 'Clear all?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
            
            }).then((result) => {
            if (result.value){
                $.ajax({
                    url:"compare-session.php",
                    method:"POST",
                    data:{cancel:1},
                    success:function(data){
                        compare();
                        
                    }
                })
                .done(function(response){
                    Swal.fire({
                        type:'success', 
                        title:'Compare cleared'
                    });
                })
                .fail(function(){
                    Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                });
            }
    
        });
                
    });

$(document).on("click","#filter",function(){
    var min = $(".filter-price__min-value").text();
    var max = $(".filter-price__max-value").text();
    // console.log(min, max);
    window.location.assign("shop-list?min-price="+min+"&max-price="+max);
    
})





// alert("Yes");

$(document).on("click", "#addToComparer", function(){
    // e.preventDefault();
    var pid = $(this).attr("pid");
    var pname = $("#pname"+pid).val();
    var brand = $("#brand"+pid).val();
    var sku = $("#sku"+pid).val();
    var vcode = $("#vcode"+pid).val();
    var img = $("#img"+pid).val();
    var price = $("#fullPayment"+pid).val();
    var avaliable = $("#avaliable"+pid).val();

    // alert("Yes");
    // console.log(pid, pname, brand, sku, avaliable, img, price);
    
    var action = 'add';               
    $.ajax({
        url:"compare-session.php",
        method:"POST",                    
        data:{
            addCompare:1, 
            id:pid, 
            price:price, 
            name:pname, 
            brand:brand,
            vcode:vcode,
            avaliable:avaliable,
            sku:sku,
            img:img, 
            action:action
        },
        
        success:function(){
            compare();
            reloadcom();

            
            
        }
    });
    

})





//coupon code

$(document).on("keyup", "#coupon", function(){
    // alert("yes");
    var value = $("#coupon").val();

    if (value.length >= 4) {
        $.ajax({   
            url:"coupon-process.php",
            method:"POST",
			dataType:"json",
            data:{SumTotal:1, id:value},     
            success:function(data){
                $('#btnCoupon').prop("disabled", data.result);
            }
        });
    }else{
        $('#btnCoupon').prop("disabled", true);
    }

    })

$(document).on("click", "#btnCoupon", function(){
    var value = $("#coupon").val();
    $.ajax({   
        url:"coupon-processbtn.php",
        method:"POST",
        dataType:"json",
        data:{SumTotal:1, id:value},     
        success:function(data){
            $("#coupons").html(data.cate)
        }
    });
})



//subscription coupon
$(document).on("keyup", "#coupons", function(){
    // alert("yes");
    var value = $("#coupons").val();

    if (value.length >= 4) {
        $.ajax({   
            url:"coupon-process.php",
            method:"POST",
			dataType:"json",
            data:{SumTotal:1, id:value},     
            success:function(data){
                $('#btnCoupons').prop("disabled", data.result);
            }
        });
    }else{
        $('#btnCoupon').prop("disabled", true);
    }

})


$(document).on("click", "#btnCoupons", function(){
    var value = $("#coupons").val();
    $.ajax({   
        url:"coupon-processbtns.php",
        method:"POST",
        dataType:"json",
        data:{SumTotal:1, id:value},     
        success:function(data){
            $("#grand").html(data.cate)
        }
    });
})






})