$(document).ready(function(){

    //
    $(document).on("change", "#category", function(){
        var option = $(this).find('option:selected');
        // var selected =$(this).attr("select")
        var value= option.val();
        // var text = option.text();
        // alert(value);

        if(value !="" && value !="Tyres"){
            $.ajax({
                url:"category-search",
                method:"POST",
                data:{searchSub:1,id:value},
                success:function(data){
                   $("#sub").html(data);
                }
    
            });

            $.ajax({
                url:"category-search",
                method:"POST",
                data:{searchBrand:1,id:value},
                success:function(data){
                    $("#brand").html(data);
                   
                }
    
            });

            $.ajax({
                success:function(){
                   $("#groups").html('');
                }
    
            });


        }else if(value =="Tyres"){

            $.ajax({
                url:"category-search",
                method:"POST",
                data:{searchSub:1,id:value},
                success:function(data){
                   $("#sub").html(data);
                }
    
            });

            $.ajax({
                url:"category-search",
                method:"POST",
                data:{searchBrand:1,id:value},
                success:function(data){
                    $("#brand").html(data);
                   
                }
    
            });

            $.ajax({
                url:"category-search",
                method:"POST",
                data:{searchTyre:1,id:value},
                success:function(data){
                   $("#groups").html(data);
                }
    
            });
        }
        
    });


    $(document).on("click","#inlineFormCheck",function(){        
        if($(this).is(":checked")){
        $.ajax({
            url:"category-search",
            method:"POST",
            data:{searchFirst:1},
            success:function(data){
               $("#first").html(data);
            }

        });
    }else{
        $.ajax({
            success:function(){
               $("#first").html('');
            }

        });
    }
    })


    //update product
    $(document).on("change", "#categoryup", function(){
        var option = $(this).find('option:selected');
        // var selected =$(this).attr("select")
        var value= option.val();
        // var text = option.text();
        // alert(value);

        if(value !="" && value !="Tyres"){
            $.ajax({
                url:"category-search",
                method:"POST",
                data:{searchSub:1,id:value},
                success:function(data){
                   $("#subs").html(data);
                }
    
            });

            $.ajax({
                url:"category-search",
                method:"POST",
                data:{searchBrand:1,id:value},
                success:function(data){
                    $("#brands").html(data);
                   
                }
    
            });

           


        }
        
    });


// var text =$("#categoryup").find('option:selected');
// var valuex =text.val();
// if(valuex !=''){
//     $.ajax({
//         url:"category-search",
//         method:"POST",
//         data:{searchSub:1,id:valuex},
//         success:function(data){
//            $("#subs").html(data);
//         }

//     });

//     $.ajax({
//         url:"category-search",
//         method:"POST",
//         data:{searchBrand:1,id:valuex},
//         success:function(data){
//             $("#brands").html(data);
           
//         }

//     });
// }












})


//up