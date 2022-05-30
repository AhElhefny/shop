@php
    for($i=0 ; $i<5 ;$i++){
        if($i < (int)$avg)
            echo "<small class='fas fa-star'></small>";
        elseif($i ==(int)$avg && $avg-$i==0.5)
            echo "<small class='fas fa-star-half-alt'></small>";
        else
            echo "<small class='far fa-star'></small>";
    }
@endphp

