<div class="d-flex mb-4">
    <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
    @forelse($color as $c)
            <div class=" custom-control-inline">
                <span class="btn btn-outline-info" >{{$c->color}}</span>
            </div>
    @empty
        <div class="custom-control custom-radio custom-control-inline">
            <p class="text-muted">We are sorry for that, but no colors available now</p>
        </div>
    @endforelse
</div>
