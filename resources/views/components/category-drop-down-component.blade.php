<div class="col-lg-3 d-none d-lg-block">
    <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
        <h6 class="m-0">Categories</h6>
        <i class="fa fa-angle-down text-dark"></i>
    </a>
    <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
        <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
            @foreach($allCategories as $c)
                @php
                    $hasChild=$c->is_parent($allCategories);
                @endphp
                @if($c->parent === 0 && $hasChild==="true")
                    <div class="nav-item dropdown">
                            <a href="{{$c->id}}" class="nav-link" data-toggle="dropdown">{{$c->name }} <i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                @for( $i = 0 ; $i < $allCategories->count() ; $i++)
                                    @if($c->id === $allCategories[$i]->parent)
                                        <a href="{{$allCategories[$i]->id}}" class="dropdown-item">{{$allCategories[$i]->name }}</a>
                                    @endif
                               @endfor
                            </div>
                    </div>
                @elseif($c->parent === 0 && $hasChild==="false")
                    <a href="{{$c->id}}" class="nav-item nav-link">{{$c->name}}</a>
                @endif
            @endforeach
        </div>
    </nav>
</div>
