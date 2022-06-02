<div class="d-flex mb-3">
    <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
        @forelse($size as $s)
                <div class=" custom-control-inline">
                    <label class="btn btn-outline-dark">{{$s->size}}</label>
                </div>
        @empty
            <div class="custom-control custom-radio custom-control-inline">
            <p class="text-muted">We are sorry for that, but no sizes  available now</p>
        </div>
        @endforelse
</div>
