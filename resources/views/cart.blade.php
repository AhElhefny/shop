<x-masterPage>
    <!-- Page Header Start -->
    <x-layout.pageHeader name="Shopping Cart" />
    <!-- Page Header End -->

    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0" id="cart_table">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Size</th>
                            <th>Color</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle" id="emptyMessage">
                    @forelse(auth()->user()->carts as $cart)
                        <tr id="DeleteRaw{{$cart->product_id}}{{auth()->user()->id}}" class="trDel">
                            <td class="align-middle"><img src="{{asset('img/product-'.rand(1,8).'.jpg')}}" alt="" style="width: 50px;"> {{$cart->product->name}}</td>
                            <td class="align-middle price" id="productPrice{{$cart->product_id}}">${{$cart->product->price}}</td>
                            <td class="align-middle">
                                <select style="width: 61px;" id="selectSize{{$cart->product_id}}" name="{{$cart->product_id}}" class="sizeSelect">
                                    <option selected disabled>Size</option>
                                    @foreach($cart->product->productattributes->unique('size') as $s)
                                    <option id="size" value="{{$s->size}}">{{$s->size}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="align-middle">
                                <select style="width: 90px;" id="colorsSelect{{$cart->product_id}}">
                                    <option selected disabled>Colors</option>
                                </select>
                            </td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto " style="width: 70px;">
                                    <input type="number" min="1" max="12"
                                           class="form-control form-control-sm bg-secondary text-center rounded border-dark inputNumber"
                                           value="1" id="quantity{{$cart->product_id}}" name=""/>
                                </div>
                            </td>
                            <td class="align-middle" id="totalPrice{{$cart->product_id}}">${{$cart->product->price}}</td>
                            <td class="align-middle"><a id="{{$cart->product_id}}" class="btn btn-sm btn-primary del"><i class="fa fa-times"></i></a></td>
                        </tr>
                    @empty
                        <tr><td colspan="7" >
                    <p>You don't have any products in your cart , <a href="/shop">GO Shop</a> to add one </p></td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <x-cartComponents.cartSummary />
        </div>
    </div>
    <!-- Cart End -->

    <script>
        // calcualte total price according to its quantity
        $(".inputNumber").on('input', function() {
            let id=this.id;
            let p_id=id.slice(8,id.length);
            let price=$("#productPrice"+p_id).text();
            let total=0;
            price=price.slice(1,price.length);
            $("#totalPrice"+p_id).html('$'+(price*$("#"+id).val()).toFixed(2));
            $("#cart_table tbody tr").each(function() {
                var value = $(this).find(" td:nth-child(6)").html();
                value=value.slice(1,value.length);
                total = total + parseInt(value) ;
            });
            $("#subTotal").html(total);
            $("#ship").html(Math.floor(total*0.02));
            $("#total").html(total+Math.floor(total*0.02));
            console.log(total);
        });
        // Delete one row from table cart
        $(".del").click(function (){
            var idd=this.id;
            let rD="#DeleteRaw"+this.id+"{{auth()->user()->id}}";
           $.ajax({
              url:"{{route('deleteCart')}}",
              type:"DELETE",
              data:{
                  _token:"{{csrf_token()}}",
                  product_id:idd,
                  user_id:"{{auth()->user()->id}}",
              },
               success:function (response){
                  if(response.count >=0){
                      $("#cartCount").html(response.count);
                      $(rD).remove();
                      $("#subTotal").html(response.subTotal);
                      $("#ship").html(response.subTotal*0.02);
                      $("#total").html(response.subTotal+(response.subTotal*0.02));
                      if(response.count ==0){
                          $("#emptyMessage").append("<tr><td colspan='7'><p>You don't have any products in your cart , <a href='/shop'>GO Shop</a> to add one </p></td></tr>");
                      }
                  }
               }
           });
        });

        // Select colors according to selected size
        $('.sizeSelect').on('change', function() {
            var selectedOption = $(this).find('option:selected');
            let product_id=this.name;
            let user_id="{{auth()->user()->id}}"
            let size=selectedOption.val();
            console.log(product_id,user_id,size);
            $.ajax({
               url:"{{route('getColors')}}",
               type:"GET",
               data:{
                   product_id:product_id,
                   user_id:user_id,
                   size:size,
               } ,
                success:function (response){
                   if(response){
                       $("#colorsSelect"+product_id).html("");
                        $.each(response, function (i) {
                            $.each(response[i],function (j) {
                                $("#colorsSelect"+product_id).append("<option value='" + response[i][j].color + "'>" + response[i][j].color + "</option>");
                            });
                        });
                   }
                }
            });
        });


    </script>
</x-masterPage>
