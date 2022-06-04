<a class="{{$css}}" id="addToCart{{$p->id}}" ><i class="fas fa-shopping-cart {{$icontext}} mr-1" >
    </i>Add To Cart</a>
<script>
    $("#addToCart{{$p->id}}").click(function (){
        $.ajax({
            url:"{{route('add2Cart')}}",
            type:"POST",
            data:{
                _token:"{{csrf_token()}}",
                product_id:"{{$p->id}}",
                user_id:"{{auth()->user()->id}}"
            },
            success:function (response){
                if(response) {
                    $("#cartCount").html(response);
                    Swal.fire({
                        title: "Success",
                        text: "{{$p->name}} added to your cart successfully",
                        icon: "success",
                        confirmButtonText: 'Ok'
                    })
                }
            },
            error:function (){
                Swal.fire({
                    title: "WARNING!",
                    text: "{{$p->name}} added to your cart Before",
                    icon: "warning",
                    confirmButtonText: 'Ok'
                })
            }
        })
    });
</script>

