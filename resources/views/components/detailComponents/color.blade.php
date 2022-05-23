@props(['color'])
<div class="d-flex mb-4">
    <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
    <form>
        @foreach($color as $c)
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="{{$c->name}}" name="color">
                <label class="custom-control-label" for="{{$c->name}}">{{$c->name}}</label>
            </div>
        @endforeach
    </form>
</div>
