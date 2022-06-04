<div class="col-lg-4">
    <div class="card border-secondary mb-5">
        <div class="card-header bg-secondary border-0">
            <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
        </div>
        @php
            $sum=array_sum(auth()->user()->carts->map(fn($p)=>$p->product->price)->toArray());
        @endphp
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3 pt-1">
                <h6 class="font-weight-medium">Subtotal</h6>
                <h6 class="font-weight-medium" id="subTotal">${{$sum}}</h6>
            </div>
            <div class="d-flex justify-content-between">
                <h6 class="font-weight-medium">Shipping</h6>
                <h6 class="font-weight-medium" id="ship">${{$sum*0.02}}</h6>
            </div>
        </div>
        <div class="card-footer border-secondary bg-transparent">
            <div class="d-flex justify-content-between mt-2">
                <h5 class="font-weight-bold">Total</h5>
                <h5 class="font-weight-bold" id="total">${{$sum+($sum*0.02)}}</h5>
            </div>
            <a href="/checkout" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
        </div>
    </div>
</div>
