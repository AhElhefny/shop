<div class="{{$class}} col-md-6 col-sm-12 pb-1">
    <div class="card product-item border-0 mb-4">
        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
            <img class="img-fluid w-100" src="img/product-{{rand(1,8)}}.jpg" alt="">
        </div>
        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
            <h6 class="text-truncate mb-3">{{$p->name}}</h6>
            <div class="d-flex justify-content-center">
                <h6>${{$p->price-(($p->offers/100)*$p->price)}}</h6><h6 class="text-muted ml-2">@if($p->offers)<del>${{$p->price}}</del>@endif</h6>
            </div>
        </div>
        <a  style="position: relative;top: -386px;left: -2px;max-width: 43px" class="btn border" id="addFav{{$p->id}}">
            <i class="fas fa-heart text-primary"></i>
        </a>
        <div class="card-footer d-flex justify-content-between bg-light border">
            <a href="/product/detail/{{$p->id}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>

            @auth
                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
            @endauth
        </div>
    </div>
</div>
<script>
    $("#addFav{{$p->id}}").click(function (e){
        console.log('ssssss{{$p->id}}')
       $.ajax({
           url:"{{route('add2Fav')}}",
           type:"GET",
           data:{
               product_id:"{{$p->id}}",
               user_id:"{{auth()->user()->id}}"
           },
           success:function (response){
               if(response){
                    console.log('success');
                    $("#favCount").html(response.favCount)
               }
           }
       });
    });
</script>
