<div class="tab-pane fade" id="tab-pane-3">
    <div class="row">
        <x-detailComponents.reviewPanel.reviewCard />
        @auth
            <x-detailComponents.reviewPanel.reviewForm />
        @endauth
    </div>
</div>
