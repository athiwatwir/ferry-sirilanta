<div class="container-fluid py-1">
    <div id="testimonialCarousel" class="carousel">

        <div class="carousel-inner">
            @foreach ($trendings as $item)
            <div class="carousel-item @if ($loop->iteration == 1)
                active
            @endif">
                <div class="card shadow-sm rounded-3 bg-cover" style="background-image: url('{{ $item['cover_img'] }}');">

                    <div class="card-body text-center py-5 mt-5">
                        <h3>{{ $item['title'] }}</h3>
                        <button class="btn btn-main">Book Now</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
