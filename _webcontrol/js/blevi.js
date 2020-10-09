$(document).ready(function(){

     $(document).on("click", "#application", function(){
        var orderId = $(this).attr("orderId");
        var referral = $("#referral"+orderId).val();
        // alert(referral);
        Swal.fire({
            position: 'center',
            type: 'warning',
            title: 'Mark as Approve?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
            
          }).then((result) => {
            if (result.value){
                $.ajax({
                    url: 'ajax-process.php',
                    type: 'POST',
                    data: {application:1,id:orderId, uid:referral}
                })
                .done(function(response){
                    Swal.fire({type: 'success', title:'Approved!'});
                    setInterval(function(){
                        window.location.assign("sub-inactive");
                    },2000)
                })
                .fail(function(){
                    Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                });
            }
    
        });


    })

    
    $(document).on("click", "#declinez", function(){
        var orderId = $(this).attr("orderId");
        var referral = $("#referral"+orderId).val();
        // alert(referral);
        Swal.fire({
            position: 'center',
            type: 'warning',
            title: 'Mark as Decline?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
            
          }).then((result) => {
            if (result.value){
                $.ajax({
                    url: 'ajax-process.php',
                    type: 'POST',
                    data: {declinez:1,id:orderId, uid:referral}
                })
                .done(function(response){
                    Swal.fire({type: 'success', title:'declined!'});
                    setInterval(function(){
                        window.location.assign("sub-inactive");
                    },2000)
                })
                .fail(function(){
                    Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                });
            }
    
        });


    })


    $(document).on("click", "#markProcess", function(){
        var orderId = $(this).attr("orderId");
        var referral = $("#referral"+orderId).val();
        // alert(referral);
        Swal.fire({
            position: 'center',
            type: 'warning',
            title: 'Mark as Processed?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Proceed!'
            
          }).then((result) => {
            if (result.value){
                $.ajax({
                    url: 'ajax-process.php',
                    type: 'POST',
                    data: {markProcess:1,id:orderId, uid:referral}
                })
                .done(function(response){
                    Swal.fire({type: 'success', title:'Processed!'});
                    setInterval(function(){
                        window.location.assign("orders");
                    },2000)
                })
                .fail(function(){
                    Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                });
            }
    
        });


    })


    $(document).on("click", "#markPaid", function(){
        var orderId = $(this).attr("orderId");
        var referral = $("#referral"+orderId).val();
        var total = $("#total"+orderId).val();
        // alert(referral);
        Swal.fire({
            position: 'center',
            type: 'warning',
            title: 'Mark as paid?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Proceed!'
            
          }).then((result) => {
            if (result.value){
                $.ajax({
                    url: 'ajax-process.php',
                    type: 'POST',
                    data: {markPaid:1,id:orderId, uid:referral,total:total}
                })
                .done(function(response){
                    Swal.fire({type: 'success', title:'Paid!'});
                    setInterval(function(){
                        window.location.assign("orders");
                    },2000)
                })
                .fail(function(){
                    Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                });
            }
    
        });


    })


    $(document).on("click", "#markPaidp", function(){
        var orderId = $(this).attr("orderId");
        var referral = $("#referral"+orderId).val();
        var total = $("#total"+orderId).val();
        // alert(referral);
        Swal.fire({
            position: 'center',
            type: 'warning',
            title: 'Mark as paid?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Proceed!'
            
          }).then((result) => {
            if (result.value){
                $.ajax({
                    url: 'ajax-process.php',
                    type: 'POST',
                    data: {markPaid:1,id:orderId, uid:referral,total:total}
                })
                .done(function(response){
                    Swal.fire({type: 'success', title:'Paid!'});
                    setInterval(function(){
                        window.location.assign("pay-on-delivery");
                    },2000)
                })
                .fail(function(){
                    Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                });
            }
    
        });


    })



    $(document).on("click", "#corders", function(){
        var orderId = $(this).attr("orderId");
        var referral = $("#referral"+orderId).val();
        // alert(referral);
        Swal.fire({
            position: 'center',
            type: 'warning',
            title: 'You want to cancelled?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Proceed!'
            
          }).then((result) => {
            if (result.value){
                $.ajax({
                    url: 'ajax-process.php',
                    type: 'POST',
                    data: {cancel:1,id:orderId, uid:referral}
                })
                .done(function(response){
                    Swal.fire({type: 'success', title:'Cancelled!'});
                    
                    setInterval(function(){
                        window.location.assign("orders");
                    },2000)
                })
                .fail(function(){
                    Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                });
            }
    
        });


    })

    
    //Deliver process
    $(document).on("click", "#markDelivered", function(){
        var orderId = $(this).attr("orderId");
        var referral = $("#referral"+orderId).val();
        // alert(referral);
        Swal.fire({
            position: 'center',
            type: 'warning',
            title: 'Are you sure?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
            
          }).then((result) => {
            if (result.value){
                $.ajax({
                    url: 'ajax-process.php',
                    type: 'POST',
                    data: {markDelivered:1,id:orderId, uid:referral}
                })
                .done(function(response){
                    Swal.fire({type: 'success', title:'Delivered!'});
                    setInterval(function(){
                        window.location.assign("shipped");
                    },2000)
                    
                })
                .fail(function(){
                    Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                });
            }
    
        });


    })

    $(document).on("click", "#markDeliveredp", function(){
        var orderId = $(this).attr("orderId");
        var referral = $("#referral"+orderId).val();
        // alert(referral);
        Swal.fire({
            position: 'center',
            type: 'warning',
            title: 'Are you sure?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
            
          }).then((result) => {
            if (result.value){
                $.ajax({
                    url: 'ajax-process.php',
                    type: 'POST',
                    data: {markDelivered:1,id:orderId, uid:referral}
                })
                .done(function(response){
                    Swal.fire({type: 'success', title:'Delivered!'});
                    setInterval(function(){
                        window.location.assign("pay-on-delivery");
                    },2000)
                    
                })
                .fail(function(){
                    Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                });
            }
    
        });


    })


    $(document).on("click", "#markShip", function(){
        // alert("yes");
        var orderId = $(this).attr("orderId");
        var referral = $("#referral"+orderId).val();
        // alert(referral);
        Swal.fire({
            position: 'center',
            type: 'warning',
            title: 'Are you sure?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
            
          }).then((result) => {
            if (result.value){
                $.ajax({
                    url: 'ajax-process.php',
                    type: 'POST',
                    data: {markShip:1,id:orderId, uid:referral}
                })
                .done(function(response){
                    Swal.fire({type: 'success', title:'Shipped!'});
                    setInterval(function(){
                        window.location.assign("processed");
                    },2000)
                    
                })
                .fail(function(){
                    Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                });
            }
    
        });


    })


    $(document).on("click", "#porders", function(){
        var orderId = $(this).attr("orderId");
        var referral = $("#referral"+orderId).val();
        // alert(referral);
        Swal.fire({
            position: 'center',
            type: 'warning',
            title: 'Are you sure?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Proceed!'
            
          }).then((result) => {
            if (result.value){
                $.ajax({
                    url: 'ajax-process.php',
                    type: 'POST',
                    data: {cancel:1,id:orderId, uid:referral}
                })
                .done(function(response){
                    Swal.fire({type: 'success', title:'Cancelled!'});
                    setInterval(function(){
                        window.location.assign("processed");
                    },2000);
                })
                .fail(function(){
                    Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                });
            }
    
        });


    })


    $(document).on("click", "#pordersp", function(){
        var orderId = $(this).attr("orderId");
        var referral = $("#referral"+orderId).val();
        // alert(referral);
        Swal.fire({
            position: 'center',
            type: 'warning',
            title: 'Are you sure?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Proceed!'
            
          }).then((result) => {
            if (result.value){
                $.ajax({
                    url: 'ajax-process.php',
                    type: 'POST',
                    data: {cancel:1,id:orderId, uid:referral}
                })
                .done(function(response){
                    Swal.fire({type: 'success', title:'Cancelled!'});
                    setInterval(function(){
                        window.location.assign("pay-on-delivery");
                    },2000);
                })
                .fail(function(){
                    Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                });
            }
    
        });


    })

//Returned
$(document).on("click", "#markReturned", function(){
    var orderId = $(this).attr("orderId");
    var referral = $("#referral"+orderId).val();
    // alert(referral);
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'Are you sure?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
        
      }).then((result) => {
        if (result.value){
            $.ajax({
                url: 'ajax-process.php',
                type: 'POST',
                data: {markReturned:1,id:orderId, uid:referral}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Returned!'});
                setInterval(function(){
                    window.location.assign("delivered");
                },2000);
                
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });


})


//Returned
$(document).on("click", "#markReturnedp", function(){
    var orderId = $(this).attr("orderId");
    var referral = $("#referral"+orderId).val();
    // alert(referral);
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'Are you sure?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
        
      }).then((result) => {
        if (result.value){
            $.ajax({
                url: 'ajax-process.php',
                type: 'POST',
                data: {markReturned:1,id:orderId, uid:referral}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Returned!'});
                setInterval(function(){
                    window.location.assign("pay-on-delivery");
                },2000);
                
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });


})


$(document).on("click", "#dorders", function(){
    var orderId = $(this).attr("orderId");
    var referral = $("#referral"+orderId).val();
    // alert(referral);
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'Are you sure?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Proceed!'
        
      }).then((result) => {
        if (result.value){
            $.ajax({
                url: 'ajax-process.php',
                type: 'POST',
                data: {cancel:1,id:orderId, uid:referral}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Cancelled!'});
                
                setInterval(function(){
                    window.location.assign("delivered");
                },2000)
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });


})


//return page
$(document).on("click", "#rorders", function(){
    var orderId = $(this).attr("orderId");
    var referral = $("#referral"+orderId).val();
    // alert(referral);
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
                url: 'ajax-process.php',
                type: 'POST',
                data: {cancel:1,id:orderId, uid:referral}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Cancelled!'});
                setInterval(function(){
                    window.location.assign("returned");
                },2000);
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });


})




$(document).on("click", "#deleter", function(){
    var orderId = $(this).attr("orderId");
    var referral = $("#referral"+orderId).val();
    // alert(referral);
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'Delete this?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
        
      }).then((result) => {
        if (result.value){
            $.ajax({
                url: 'ajax-process.php',
                type: 'POST',
                data: {delete:1,id:orderId, uid:referral}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Deleted!'});
                setInterval(function(){
                    window.location.assign("returned");
                },2000);
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });


})



//cancelled page
$(document).on("click", "#markPro", function(){
    var orderId = $(this).attr("orderId");
    var referral = $("#referral"+orderId).val();
    // alert(referral);
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'Mark as process?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
        
      }).then((result) => {
        if (result.value){
            $.ajax({
                url: 'ajax-process.php',
                type: 'POST',
                data: {markProcess:1,id:orderId, uid:referral}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Processed!'});
                setInterval(function(){
                    window.location.assign("cancelled");
                },2000)
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });


})


$(document).on("click", "#markDel", function(){
    var orderId = $(this).attr("orderId");
    var referral = $("#referral"+orderId).val();
    // alert(referral);
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'Make as deliver?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
        
      }).then((result) => {
        if (result.value){
            $.ajax({
                url: 'ajax-process.php',
                type: 'POST',
                data: {markDelivered:1,id:orderId, uid:referral}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Delivered!'});
                setInterval(function(){
                    window.location.assign("cancelled");
                },2000)
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });


})



$(document).on("click", "#pendingSub", function(){
    var orderId = $(this).attr("orderId");
    var referral = $("#referral"+orderId).val();
    // alert(referral);
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'Are you sure?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Proceed!'
        
      }).then((result) => {
        if (result.value){
            $.ajax({
                url: 'ajax-process.php',
                type: 'POST',
                data: {pendingSub:1,id:orderId, uid:referral}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Fulfilled!'});
                setInterval(function(){
                    window.location.assign("sub-pending");
                },2000)
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });


})




$(document).on("click", "#allocateSub", function(){
    var orderId = $(this).attr("orderId");
    var referral = $("#referral"+orderId).val();
    // alert(referral);
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'Mark as process?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
        
      }).then((result) => {
        if (result.value){
            $.ajax({
                url: 'ajax-process.php',
                type: 'POST',
                data: {allocateSub:1,id:orderId, uid:referral}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Processed!'});
                setInterval(function(){
                    window.location.assign("sub-pending-a");
                },2000)
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });


})

$(document).on("click", "#allocateSubs", function(){
    var orderId = $(this).attr("orderId");
    var referral = $("#referral"+orderId).val();
    // alert(referral);
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'Mark as shipped?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
        
      }).then((result) => {
        if (result.value){
            $.ajax({
                url: 'ajax-process.php',
                type: 'POST',
                data: {allocateSubs:1,id:orderId, uid:referral}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Shipped!'});
                setInterval(function(){
                    window.location.assign("sub-fulfilled");
                },2000)
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });


})




$(document).on("click", "#subcan", function(){
    var orderId = $(this).attr("orderId");
    var referral = $(this).attr("user");
    // alert(referral);
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'You want to cancel?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
        
      }).then((result) => {
        if (result.value){
            $.ajax({
                url: 'ajax-process.php',
                type: 'POST',
                data: {subcan:1,id:orderId, uid:referral}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Cancelled!'});
                setInterval(function(){
                    window.location.assign("sub-pending");
                },2000)
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });


})

//Fulfilled page


$(document).on("click", "#subcanFill", function(){
    var orderId = $(this).attr("orderId");
    var referral = $("#referral"+orderId).val();
    // alert(referral);
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'You want to cancel?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
        
      }).then((result) => {
        if (result.value){
            $.ajax({
                url: 'ajax-process.php',
                type: 'POST',
                data: {subcan:1,id:orderId, uid:referral}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Cancelled!'});
                setInterval(function(){
                    window.location.assign("sub-pending-a");
                },2000)
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });


})



$(document).on("click", "#subcanFills", function(){
    var orderId = $(this).attr("orderId");
    var referral = $("#referral"+orderId).val();
    // alert(referral);
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'You want to cancel?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
        
      }).then((result) => {
        if (result.value){
            $.ajax({
                url: 'ajax-process.php',
                type: 'POST',
                data: {subcan:1,id:orderId, uid:referral}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Cancelled!'});
                setInterval(function(){
                    window.location.assign("sub-shipped");
                },2000)
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });


})


$(document).on("click", "#deliverSub", function(){
    var orderId = $(this).attr("orderId");
    var referral = $("#referral"+orderId).val();
    
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'Mark as deliver?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
        
      }).then((result) => {
        if (result.value){
            $.ajax({
                url: 'ajax-process.php',
                type: 'POST',
                data: {deliverSub:1,id:orderId, uid:referral}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Delivered!'});
                setInterval(function(){
                    window.location.assign("sub-shipped");
                },2000)
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });


})



$(document).on("click", "#allcanFill", function(){
    var orderId = $(this).attr("orderId");
    var referral = $("#referral"+orderId).val();
    // alert(referral);
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'Are you sure?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Proceed!'
        
      }).then((result) => {
        if (result.value){
            $.ajax({
                url: 'ajax-process.php',
                type: 'POST',
                data: {subcan:1,id:orderId, uid:referral}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Cancelled!'});
                setInterval(function(){
                    window.location.assign("sub-allocated");
                },2000)
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });


})




$(document).on("click", "#deleAllocation", function(){
    var orderId = $(this).attr("orderId");
    var referral = $("#referral"+orderId).val();
    // alert(referral);
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'Are you sure?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Proceed!'
        
      }).then((result) => {
        if (result.value){
            $.ajax({
                url: 'ajax-process.php',
                type: 'POST',
                data: {subdelete:1,id:orderId, uid:referral}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Deleted!'});
                setInterval(function(){
                    window.location.assign("sub-allocated");
                },2000)
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });


})





$(document).on("click", "#subCancelled", function(){
    var orderId = $(this).attr("orderId");
    var referral = $("#referral"+orderId).val();
    // alert(referral);
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'Are you sure?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Proceed!'
        
      }).then((result) => {
        if (result.value){
            $.ajax({
                url: 'ajax-process.php',
                type: 'POST',
                data: {delete:1,id:orderId, uid:referral}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Deleted!'});
                setInterval(function(){
                    window.location.assign("sub-cancel");
                },2000)
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });


})





$(document).on("click", "#canAllocation", function(){
    var orderId = $(this).attr("orderId");
    var referral = $("#referral"+orderId).val();
    // alert(referral);
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'Are you sure?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Proceed!'
        
      }).then((result) => {
        if (result.value){
            $.ajax({
                url: 'ajax-process.php',
                type: 'POST',
                data: {subdelete:1,id:orderId, uid:referral}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Deleted!'});
                setInterval(function(){
                    window.location.assign("sub-cancel");
                },2000)
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });


});





$(document).on("click", "#paid", function(){
    var orderId = $(this).attr("orderId");
    var referral = $("#id"+orderId).val();
    // alert(orderId);
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'Make as Paid?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
        
      }).then((result) => {
        if (result.value){
            $.ajax({
                url: 'ajax-process.php',
                type: 'POST',
                data: {pending:1,id:orderId, uid:referral}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Paid!'});
                setInterval(function(){
                    window.location.assign("pending-payment");
                },2000)
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });


});




$(document).on("click", "#cancelx", function(){
    var orderId = $(this).attr("orderId");
    var referral = $("#id"+orderId).val();
    var amount = $("#amount"+orderId).val();
    // alert(amount);
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
                url: 'ajax-process.php',
                type: 'POST',
                data: {pendingdelete:1,id:orderId, uid:referral,amount:amount}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Cancelled!'});
                setInterval(function(){
                    window.location.assign("pending-payment");
                },2000)
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });


});




$(document).on("click", "#doMe", function(){
    // var doMe = $();
    var fee = $("#fee");
    fee.toggle();

});

$(document).on("click", "#soMe", function(){
    // var doMe = $();
    var fee = $("#ree");
    fee.toggle();

});


$(document).on("click", "#depositora", function(){
    var orderId = $(this).attr("orderId");
    var referral = $("#referral").val();
    // alert(referral);
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'Approve this depositor?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
        
      }).then((result) => {
        if (result.value){
            $.ajax({
                url: 'ajax-process.php',
                type: 'POST',
                data: {depositora:1,id:orderId}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Approved!'});
                setInterval(function(){
                    window.location.assign(referral);
                },2000)
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });


})





$(document).on("click", "#depositorc", function(){
    var orderId = $(this).attr("orderId");
    var referral = $("#referral").val();
    // alert(referral);
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'Cancel this depositor?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
        
      }).then((result) => {
        if (result.value){
            $.ajax({
                url: 'ajax-process.php',
                type: 'POST',
                data: {depositorc:1,id:orderId}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Cancelled!'});
                setInterval(function(){
                    window.location.assign(referral);
                },2000)
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });


})





$(document).on("click", "#depositorcd", function(){
    var orderId = $(this).attr("orderId");
    var img = $(this).attr("img");
    var referral = $("#referral").val();
    // alert(img);
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'Delete this depositor?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
        
      }).then((result) => {
        if (result.value){
            $.ajax({
                url: 'ajax-process.php',
                type: 'POST',
                data: {depositorcd:1,id:orderId}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Deleted!'});
                setInterval(function(){
                    window.location.assign(referral);
                },2000)
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });


})




$(document).on("click", "#coup", function(){
    var orderId = $(this).attr("coup");
    var text = $(this).attr("text");
    // alert(img);
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: 'Trun this '+text+'?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
        
      }).then((result) => {
        if (result.value){
            $.ajax({
                url: 'ajax-process.php',
                type: 'POST',
                data: {coup:1,id:orderId,text:text}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Confirmed!'});
                setInterval(function(){
                    window.location.assign('coupon');
                },2000)
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });


})





})