<div class="tab-pane fade" id="tab-pane-3">
    <div class="row">
        <x-detailComponents.reviewPanel.reviewCard :product="$product"/>
        @auth
            <x-detailComponents.reviewPanel.reviewForm :product="$product"/>
        @endauth
    </div>
</div>
