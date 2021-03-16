@extends('front.master')
@section('title')
    Home
@endsection

@section('body')
<section class="home">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="headline">
                    <div class="nav" id="headline-nav">
                        <a class="left carousel-control" role="button" data-slide="prev">
                            <span class="ion-ios-arrow-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" role="button" data-slide="next">
                            <span class="ion-ios-arrow-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="owl-carousel owl-theme" id="headline">
                    @foreach($heading_news as $item)
                        <div class="item">
                            <a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}"><div class="badge">শিরোনামঃ</div> <strong>{{ $item->news_title }} </strong></a>
                            {{-- <a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}"><strong>{{ $item->news_title }} </strong></a> --}}
                        </div>
                    @endforeach
                    </div>
                </div>
                <div class="owl-carousel owl-theme slide" id="featured">
                @foreach($slider as $item)
                    <div class="item">
                        <article class="featured">
                            <div class="overlay"></div>
                            <figure>
                                <img src="{{ asset('/') }}admin/news-image/{{ $item->news_image }}" alt="Sample Article">
                            </figure>
                            <div class="details">
                                <div class="category"><a href="{{ route('category-news',['name'=>$item->category_name_en]) }}">{{ $item->category_name_bn }}</a></div>
                                <h1><a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">{{ $item->news_title }}</a></h1>
                                <div class="time">{{ date('F-d-Y', strtotime($item->created_at)) }} </div>
                            </div>
                        </article>
                    </div>
                @endforeach 
                </div>
                <div class="line">
                    <div>বিশেষ সংবাদ</div>
                </div>
                <div class="row">
                    @foreach($special as $item)
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <article class="article col-md-12">
                            <div class="inner">
                                {{-- <figure> --}}
                                    <a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">
                                        <img height="200px" width="100%" src="{{ asset('/') }}admin/news-image/{{ $item->news_image }}" alt="Sample Article">
                                    </a>
                                    <br> <br>
                                {{-- </figure> --}}
                                <div class="padding">
                                    <div class="detail">
                                        <div class="time">{{ date('F-d-Y', strtotime($item->created_at)) }}</div>
                                        <div class="category"><a href="{{ route('category-news',['name'=>$item->category_name_en]) }}" style="font-size:12px;">{{ $item->category_name_bn }}</a></div>
                                    </div>
                                    <h2><a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">{{ $item->news_title }}</a></h2>
                                    <p>{{ Str::limit($item->news_short_description, 150, '...') }}</p>
                                    <footer>
                                        <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>1263</div></a>
                                        <a class="btn btn-primary more" href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">
                                            <div>More</div>
                                            <div><i class="ion-ios-arrow-thin-right"></i></div>
                                        </a>
                                    </footer>
                                </div>
                            </div>
                        </article>
                    </div>
                    @endforeach
                </div>

                <div class="banner">
                    <a href="#">
                        <img src="{{ asset('/') }}front/images/ads.png" alt="Sample Article">
                    </a>
                </div>
                <div class="line transparent little"></div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 trending-tags">
                        <h1 class="title-col">ফিচার</h1>
                        <div class="body-col">
                            @foreach($featured as $item)
                            <article class="article-mini">
                                <div class="inner">
                                    <figure>
                                        <a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">
                                            <img src="{{ asset('/') }}admin/news-image/{{ $item->news_image }}" alt="Sample Article">
                                        </a>
                                    </figure>
                                    <div class="padding">
                                        <h1><a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">{{ $item->news_title }}</a></h1>
                                        <div class="detail">
                                            <div class="category"><a href="{{ route('category-news',['name'=>$item->category_name_en]) }}">{{ $item->category_name_bn }}</a></div>
                                            <div class="time">{{ date('F-d-Y', strtotime($item->created_at)) }}</div>
                                        </div> 
                                    </div>
                                </div>
                            </article>
                        @endforeach
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <h1 class="title-col">
                            হট নিউজ
                            <div class="carousel-nav" id="hot-news-nav">
                                <div class="prev">
                                    <i class="ion-ios-arrow-left"></i>
                                </div>
                                <div class="next">
                                    <i class="ion-ios-arrow-right"></i>
                                </div>
                            </div>
                        </h1>
                        <div class="body-col vertical-slider" data-max="4" data-nav="#hot-news-nav" data-item="article">
                        @foreach($trending as $item)
                            <article class="article-mini">
                                <div class="inner">
                                    <figure>
                                        <a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">
                                            <img src="{{ asset('/') }}admin/news-image/{{ $item->news_image }}" alt="Sample Article">
                                        </a>
                                    </figure>
                                    <div class="padding">
                                        <h1><a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">{{ $item->news_title }}</a></h1>
                                        <div class="detail">
                                            <div class="category"><a href="{{ route('category-news',['name'=>$item->category_name_en]) }}">{{ $item->category_name_bn }}</a></div>
                                            <div class="time">{{ date('F-d-Y', strtotime($item->created_at)) }}</div>
                                        </div> 
                                    </div>
                                </div>
                            </article>
                        @endforeach
                        </div>
                    </div>
                </div>
                <div class="line top">
                    <div>বিশ্ব</div>
                </div>
                <div class="row">
                @foreach($international as $item)
                    <article class="col-md-12 article-list">
                        <div class="inner">
                            <figure>
                                <a href="single.html">
                                    <img src="{{ asset('/') }}admin/news-image/{{ $item->news_image }}" alt="Sample Article">
                                </a>
                            </figure>
                            <div class="details">
                                <div class="detail">
                                    <div class="category">
                                        <a href="{{ route('category-news',['name'=>$item->category_name_en]) }}">{{ $item->category_name_bn }}</a>
                                    </div>
                                    <div class="time">{{ date('F-d-Y', strtotime($item->created_at)) }}</div>
                                </div>
                                <h1><a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">{{ $item->news_title }}</a></h1>
                                <p>{{ Str::limit($item->news_short_description, 100, '...') }}</p>
                                <footer>
                                    <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>273</div></a>
                                    <a class="btn btn-primary more" href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">
                                        <div>More</div>
                                        <div><i class="ion-ios-arrow-thin-right"></i></div>
                                    </a>
                                </footer>
                            </div>
                        </div>
                    </article>
                @endforeach
                </div>
                <div style="margin-top: 50px"></div>
                <div class="line">
                    <div>ধর্মীয় সংবাদ</div>
                </div>
                <div class="row">
                    @foreach($religion as $item)
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <article class="article col-md-12">
                            <div class="inner">
                                    <a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">
                                        <img height="150px" width="100%" src="{{ asset('/') }}admin/news-image/{{ $item->news_image }}" alt="Sample Article">
                                    </a>
                                    <br><br>
                                <div class="padding">
                                    <div class="detail">
                                        <div class="time">{{ date('F-d-Y', strtotime($item->created_at)) }}</div>
                                        <div class="category"><a href="{{ route('category-news',['name'=>$item->category_name_en]) }}" style="font-size:12px;">{{ $item->category_name_bn }}</a></div>
                                    </div>
                                    <p><a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">{{ $item->news_title }}</a></p>
                                
                                </div>
                            </div>
                        </article>
                    </div>
                    @endforeach
                </div>

            </div>
            <div class="col-xs-6 col-md-4 sidebar" id="sidebar">
                <div class="sidebar-title for-tablet">Sidebar</div>
                <aside>
                    <div class="aside-body">
                        <div class="featured-author">
                            <div class="featured-author-inner">
                                <div class="featured-author-cover" style="background-image: url('images/news/img15.jpg');">
                                    <div class="badges">
                                        <div class="badge-item"><i class="ion-star"></i> Featured</div>
                                    </div>
                                    <div class="featured-author-center">
                                        <figure class="featured-author-picture">
                                            <img src="{{ asset('/') }}front/images/img01.jpg" alt="Sample Article">
                                        </figure>
                                        <div class="featured-author-info">
                                            <h2 class="name">John Doe</h2>
                                            <div class="desc">@JohnDoe</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="featured-author-body">
                                    <div class="featured-author-count">
                                        <div class="item">
                                            <a href="#">
                                                <div class="name">Posts</div>
                                                <div class="value">208</div>														
                                            </a>
                                        </div>
                                        <div class="item">
                                            <a href="#">
                                                <div class="name">Stars</div>
                                                <div class="value">3,729</div>														
                                            </a>
                                        </div>
                                        <div class="item">
                                            <a href="#">
                                                <div class="icon">
                                                    <div>More</div>
                                                    <i class="ion-chevron-right"></i>
                                                </div>														
                                            </a>
                                        </div>
                                    </div>
                                    <div class="featured-author-quote">
                                        "Eur costrict mobsa undivani krusvuw blos andugus pu aklosah"
                                    </div>
                                    <div class="block">
                                        <h2 class="block-title">Photos</h2>
                                        <div class="block-body">
                                            <ul class="item-list-round" data-magnific="gallery">
                                                <li><a href="{{ asset('/') }}front/images/news/img06.jpg" style="background-image: url('images/news/img06.jpg');"></a></li>
                                                <li><a href="{{ asset('/') }}front/images/news/img07.jpg" style="background-image: url('images/news/img07.jpg');"></a></li>
                                                <li><a href="{{ asset('/') }}front/images/news/img08.jpg" style="background-image: url('images/news/img08.jpg');"></a></li>
                                                <li><a href="{{ asset('/') }}front/images/news/img09.jpg" style="background-image: url('images/news/img09.jpg');"></a></li>
                                                <li><a href="{{ asset('/') }}front/images/news/img10.jpg" style="background-image: url('images/news/img10.jpg');"></a></li>
                                                <li><a href="{{ asset('/') }}front/images/news/img11.jpg" style="background-image: url('images/news/img11.jpg');"></a></li>
                                                <li><a href="{{ asset('/') }}front/images/news/img12.jpg" style="background-image: url('images/news/img12.jpg');"><div class="more">+2</div></a></li>
                                                <li class="hidden"><a href="{{ asset('/') }}front/images/news/img13.jpg" style="background-image: url('images/news/img13.jpg');"></a></li>
                                                <li class="hidden"><a href="{{ asset('/') }}front/images/news/img14.jpg" style="background-image: url('images/news/img14.jpg');"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="featured-author-footer">
                                        <a href="#">See All Authors</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <aside>
                    <h1 class="aside-title">Recent News <a href="#" class="all">See All <i class="ion-ios-arrow-right"></i></a></h1>
                    <div class="aside-body">
                    @foreach($recent as $item)
                        <article class="article-mini">
                            <div class="inner">
                                <figure>
                                    <a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">
                                        <img src="{{ asset('/') }}admin/news-image/{{ $item->news_image }}" alt="Sample Article">
                                    </a>
                                </figure>
                                <div class="padding">
                                    <h1><a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">{{ $item->news_title }}</a></h1>
                                    <div class="time">
                                        {{ date('F-d-Y', strtotime($item->created_at)) }}
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                    </div>
                </aside>
                <aside>
                    <div class="aside-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(Session::get('message'))
                        <div class="alert alert-success alert-dismissible show" role="alert">
                            {{ Session::get('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        @endif 
                        <form class="newsletter" action="{{ route('subscribe') }}" method="POST">
                        @csrf 
                            <div class="icon">
                                <i class="ion-ios-email-outline"></i>
                                <h1>Newsletter</h1>
                            </div>
                            <div class="input-group">
                                <input type="email" name="email" class="form-control " placeholder="Your mail">
                                <div class="input-group-btn">
                                    <input type="submit" class="btn btn-primary" value="Subscribe">
                                </div>
                            </div>
                            <p>By subscribing you will receive new articles in your email.</p>
                        </form>
                    </div>
                </aside>
                <aside>
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li class="active">
                            <a href="#recomended" aria-controls="recomended" role="tab" data-toggle="tab">
                                <i class="ion-android-star-outline"></i> পঠিত
                            </a>
                        </li>
                        <li>
                            <a href="#comments" aria-controls="comments" role="tab" data-toggle="tab">
                                <i class="ion-ios-chatboxes-outline"></i> আলোচিত
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="recomended">
                        @foreach($most_view as $item)
                            <article class="article-mini">
                                <div class="inner">
                                    <figure>
                                        <a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">
                                            <img src="{{ asset('/') }}admin/news-image/{{ $item->news_image }}" alt="Sample Article">
                                        </a>
                                    </figure>
                                    <div class="padding">
                                        <h1><a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">{{ $item->news_title }}</a></h1>
                                        <div class="detail">
                                            <div class="category"> <a href="{{ route('category-news',['name'=>$item->category_name_en]) }}">{{ $item->category_name_bn }}</a></div>
                                            <div class="time">{{ date('F-d-Y', strtotime($item->created_at)) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach

                        </div>
                        <div class="tab-pane comments" id="comments">
                            <div class="comment-list sm">
                                @foreach($total_comment as $item)
                            <article class="article-mini">
                                <div class="inner">
                                    <figure>
                                        <a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">
                                            <img src="{{ asset('/') }}admin/news-image/{{ $item->news_image }}" alt="Sample Article">
                                        </a>
                                    </figure>
                                    <div class="padding">
                                        <h1><a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">{{ $item->news_title }}</a></h1>
                                        <div class="detail">
                                            <div class="category"> <a href="{{ route('category-news',['name'=>$item->category_name_en]) }}">{{ $item->category_name_bn }}</a></div>
                                            <div class="time">{{ date('F-d-Y', strtotime($item->created_at)) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                            </div>
                        </div>
                    </div>
                </aside>
                <aside>
                    <h1 class="aside-title">Videos
                        <div class="carousel-nav" id="video-list-nav">
                            <div class="prev"><i class="ion-ios-arrow-left"></i></div>
                            <div class="next"><i class="ion-ios-arrow-right"></i></div>
                        </div>
                    </h1>
                    <div class="aside-body">
                        <ul class="video-list" data-youtube='"carousel":true, "nav": "#video-list-nav"'>
                            <li><a data-youtube-id="SBjQ9tuuTJQ" data-action="magnific"></a></li>
                            <li><a data-youtube-id="9cVJr3eQfXc" data-action="magnific"></a></li>
                            <li><a data-youtube-id="DnGdoEa1tPg" data-action="magnific"></a></li>
                        </ul>
                    </div>
                </aside>
                <aside id="sponsored">
                    <h1 class="aside-title">Sponsored</h1>
                    <div class="aside-body">
                        <ul class="sponsored">
                            <li>
                                <a href="#">
                                    <img src="{{ asset('/') }}front/images/sponsored.png" alt="Sponsored">
                                </a>
                            </li> 
                            <li>
                                <a href="#">
                                    <img src="{{ asset('/') }}front/images/sponsored.png" alt="Sponsored">
                                </a>
                            </li> 
                            <li>
                                <a href="#">
                                    <img src="{{ asset('/') }}front/images/sponsored.png" alt="Sponsored">
                                </a>
                            </li> 
                            <li>
                                <a href="#">
                                    <img src="{{ asset('/') }}front/images/sponsored.png" alt="Sponsored">
                                </a>
                            </li> 
                        </ul>
                    </div>
                </aside>
                <br>
                <aside id="sponsored">
                    <h1 class="aside-title">খেলাধুলা</h1>
                    <div class="aside-body">
                        <div class="row">
                        @foreach($sports as $item)
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <article class="article col-md-12">
                                    <div class="inner">
                                            <a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">
                                                <img height="100px" width="100%" src="{{ asset('/') }}admin/news-image/{{ $item->news_image }}" alt="Sample Article">
                                            </a>
                                            <br> <br>
                                        <div class="padding">
                                            <p><a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">{{ $item->news_title }}</a></p>
                                        
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </aside>
                <br>
                <aside id="sponsored">
                    <h1 class="aside-title">বিনোদন</h1>
                    <div class="aside-body">
                        <div class="row">
                        @foreach($entertainment as $item)
                            <article class="article-mini">
                                <div class="inner">
                                    <figure>
                                        <a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">
                                            <img src="{{ asset('/') }}admin/news-image/{{ $item->news_image }}" alt="Sample Article">
                                        </a>
                                    </figure>
                                    <div class="padding">
                                        <h1><a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">{{ $item->news_title }}</a></h1>
                                        <div class="detail">
                                            <div class="category"> <a href="{{ route('category-news',['name'=>$item->category_name_en]) }}">{{ $item->category_name_bn }}</a></div>
                                            <div class="time">{{ date('F-d-Y', strtotime($item->created_at)) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                        </div>
                    </div>
                </aside>

                <br>
                <aside id="sponsored">
                    <h1 class="aside-title">বানিজ্য</h1>
                    <div class="aside-body">
                        <div class="row">
                        @foreach($business as $item)
                            <article class="article-mini">
                                <div class="inner">
                                    <figure>
                                        <a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">
                                            <img src="{{ asset('/') }}admin/news-image/{{ $item->news_image }}" alt="Sample Article">
                                        </a>
                                    </figure>
                                    <div class="padding">
                                        <h1><a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">{{ $item->news_title }}</a></h1>
                                        <div class="detail">
                                            <div class="category"> <a href="{{ route('category-news',['name'=>$item->category_name_en]) }}">{{ $item->category_name_bn }}</a></div>
                                            <div class="time">{{ date('F-d-Y', strtotime($item->created_at)) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
{{-- <li class="border">
    <a href="#">
        <img src="{{ asset('/') }}front/images/sponsored.png" alt="Sponsored">
    </a>
    <h6>Hello</h6>
</li>  --}}

<section class="best-of-the-week">
    <div class="container">
        <h1><div class="text">বাংলাদেশ</div>
            <div class="carousel-nav" id="best-of-the-week-nav">
                <div class="prev">
                    <i class="ion-ios-arrow-left"></i>
                </div>
                <div class="next">
                    <i class="ion-ios-arrow-right"></i>
                </div>
            </div>
        </h1>
        <div class="owl-carousel owl-theme carousel-1">
        @foreach($bangladesh as $item)
            <article class="article">
                <div class="inner">
                    <figure>
                        <a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">
                            <img src="{{ asset('/') }}admin/news-image/{{ $item->news_image }}" alt="Sample Article">
                        </a>
                    </figure>
                    <div class="padding">
                        <div class="detail">
                                <div class="time">{{ $item->created_at }}</div>
                                <div class="category"><a href="{{ route('category-news',['name'=>$item->category_name_en]) }}">{{ $item->category_name_en }}</a></div>
                        </div>
                        <h2><a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">{{ $item->news_title }}</a></h2>
                        <p>{{ Str::limit($item->news_short_description, 100, '...') }}</p>
                    </div>
                </div>
            </article>
        @endforeach
        </div>
    </div>
</section>
@endsection


