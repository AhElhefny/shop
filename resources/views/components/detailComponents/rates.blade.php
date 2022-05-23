@props(['rate'])
<div class="d-flex mb-3">
    <div class="text-primary mr-2">
        @php
            $sum=0;
                foreach ($rate as $r){
                    $sum +=$r->amount;
                }
                $sum/=$rate->count();
        for($i=0 ; $i<$sum ;$i++){
            echo "<small class='fas fa-star'></small>";
        }
        for($j=0;$j<(int)(5-$sum);$j++){
           echo "<small class='far fa-star'></small>";
        }
        @endphp
    </div>
    <small class="pt-1">({{$rate->count()}} Reviews)</small>
</div>
{{--                        <small class="fas fa-star-half-alt"></small>--}}
