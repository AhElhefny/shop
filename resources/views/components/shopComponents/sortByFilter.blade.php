<div class="col-12 pb-1">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <form action="" method="get">
            <div class="input-group">
                <input type="text" name="search" class="form-control" id="searchInput" placeholder="Search by name, season, color, size">
                <div class="input-group-append">
                    <span class="input-group-text bg-transparent text-primary">
                        <i class="fa fa-search"></i>
                    </span>
                </div>
            </div>
        </form>
        <div class="dropdown ml-4">
            <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                Sort by
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                <a class="dropdown-item" href="?Latest=filter&{{http_build_query(request()->except(['Latest','page','Popularity','BestRating']))}}">Latest</a>
                <a class="dropdown-item" href="?Popularity=filter&{{http_build_query(request()->except(['Latest','page','Popularity','BestRating']))}}">Popularity</a>
                <a class="dropdown-item" href="?BestRating=filter&{{http_build_query(request()->except(['Latest','page','Popularity','BestRating']))}}">Best Rating</a>
            </div>
        </div>
    </div>
</div>

