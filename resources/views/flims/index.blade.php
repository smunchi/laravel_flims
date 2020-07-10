@extends('layouts.app')

@section('content')
<section class="movie-list-area section_70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="list-sidebar">
                    <!-- Single Widget Start -->
                    <div class="single-sidebar-widget">
                        <h3 class="sidebar-widget-title">by Genres:</h3>
                        <ul>
                            <li class="checkbox">
                                <input class="checkbox-spin" type="checkbox" id="Full_Time">
                                <label for="Full_Time"><span></span>Commedy</label>
                            </li>
                            <li class="checkbox">
                                <input class="checkbox-spin" type="checkbox" id="Part_Time">
                                <label for="Part_Time"><span></span>Adventure</label>
                            </li>
                            <li class="checkbox">
                                <input class="checkbox-spin" type="checkbox" id="Crime">
                                <label for="Crime"><span></span>Crime</label>
                            </li>
                            <li class="checkbox">
                                <input class="checkbox-spin" type="checkbox" id="Drama">
                                <label for="Drama"><span></span>Drama</label>
                            </li>
                        </ul>
                    </div>
                    <!-- Single Widget End -->
                </div>
            </div>
            <div class="col-lg-9">
                <div class="browse-option-box margin-top">
                    <div class="total-item-show">
                        <p>Found movies in total</p>
                    </div>
                </div>
                <div class="movie-list-box">
                @foreach ($flims as $flim)
                    <!-- Single Movie List Start -->
                    <div class="single-movie-list">
                        <div class="single-movie-list-left">
                            <a href="#">
                                <img style="width: 300px" src="{{ asset('storage/flims/'.$flim->photo) }}" alt="movie">
                            </a>
                        </div>
                        <div class="single-movie-list-right">
                            <h3><a href="#">{{ $flim->name }}</a></h3>
                            <p class="list-genre">
                                {{ implode(',', $flim->genres()->pluck('name')->toArray()) }}</p>
                            <ul>
                                <li class="rating"><i class="fa fa-star"></i>4.5</li>
                            </ul>
                            <div class="movie-details-thumbs">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fa fa-thumbs-up"></i>
                                            256</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-eye"></i>45</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="movie-list-info">
                                <p>Release: <span>{{ $flim->created_at->toDateString() }}</span></p>
                            </div>
                        </div>
                        <div class="top-action">
                            <a href="https://www.youtube.com/watch?v=L-XFI0Uepgs&t=249s" class="popup-youtube"><i class="fa fa-play"></i> Watch</a>
                        </div>
                    </div>
                    @endforeach
                    <!-- Single Movie List End -->
                </div>
                <!-- Pagination Start -->
                <div class="section_25 pull-right w-43">
                    {{ $flims->links() }}
                </div>
                <!-- Pagination End -->
            </div>
        </div>
    </div>
</section>

@endsection
