<div class="{{$class}} col-md-6 col-sm-12 pb-1" id="proCard{{$p->id}}">
    @auth
    <a  style="position: relative;top: 38px;z-index: 1;" class="btn border" id="addFav{{$p->id}}">
        @forelse($p->favrates->where('user_id',auth()->user()->id) as $r)
            <i class="fas fa-heart {{($r->favorite===0 || $r->favorite===null )?'text-primary':'text-danger' }}"  id="favIcon{{$p->id}}"></i>
        @empty
            <i class="fas fa-heart text-primary"  id="favIcon{{$p->id}}"></i>
        @endforelse
    </a>
    @endauth
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
        <div class="card-footer d-flex justify-content-between bg-light border">
            <a href="/product/detail/{{$p->id}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>

            @auth
                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1">
                        <form>

                        </form>
                    </i>Add To Cart</a>
            @endauth
        </div>
    </div>
</div>
@auth
<script>
    $("#addFav{{$p->id}}").click(function (){
        let textclass=$("#favIcon{{$p->id}}").hasClass('text-primary');
        let url=jQuery.inArray('userFav',getUrlVars());
       $.ajax({
           url:"{{route('add2Fav')}}",
           type:"GET",
           data:{
               product_id:"{{$p->id}}",
               user_id:"{{auth()->user()->id}}"
           },
           success:function (response){
               if(response){
                   $("#favCount").html(response);
                   console.log(response);
                   if(response >0){
                       $("#topbarfav").removeClass('text-primary').addClass('text-danger');
                   }if(response <=0){
                       $("#topbarfav").removeClass('text-danger').addClass('text-primary');
                   }
                    if(textclass){
                        $("#favIcon{{$p->id}}").removeClass('text-primary').addClass('text-danger');
                    }if(!textclass){
                        $("#favIcon{{$p->id}}").removeClass('text-danger').addClass('text-primary');
                        {{--if(url >= 0){--}}
                        {{--    $("#proCard{{$p->id}}").hide();--}}
                        {{--}--}}
                    }
               }
           }
       });
    });
    function getUrlVars()
    {
        var vars = [], hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for(var i = 0; i < hashes.length; i++)
        {
            hash = hashes[i].split('=');
            vars.push(hash[0]);
            vars[hash[0]] = hash[1];
        }
        return vars;
    }
</script>

@endauth
