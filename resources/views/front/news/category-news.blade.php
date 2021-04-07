@extends('front.master')
@section('title')
নিউজ
@endsection

@section('body')

  <section class="category">
    <div class="container">
      <div class="row">
        <div class="col-md-8 text-left">
          <div class="row">
            <div class="col-md-12">        
               
                <h4 class="page-title">{{ $category_name }}</h4>
                @if (isset($subcategory_name))
                    <h6>- {{ $subcategory_name }}</h6>
                @endif
              </div>
              <div>
                <nav class="menu" style="border:none;">
                  <div class="container">
                    <div id="menu-list">
                      <ul class="nav-list">
                        @foreach($subCategory as $item)
                        <li><a style="font-size:16px" href="{{ route('subcategory-news',['category'=>$item->category_name_en,'subcategory'=>$item->subcategory_name] )}}">{{ $item->subcategory_name }}</a></li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </nav>
              </div>
          </div>
          <div class="line"></div>
          <div class="row">
            @forelse($news as $item)
            <article class="col-md-12 article-list">
              <div class="inner">
                <figure class="border rounded">
                    <a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">
                      <img src="{{ asset('/') }}admin/news-image/{{ $item->news_image }}">
                  </a>
                </figure>
                <div class="details">
                  <div class="detail">
                    <div class="category">
                      <a href="{{ route('category-news',['name'=>$category_name]) }}" style="font-size:12px;">{{ $category_name }}</a>
                     </div>
                    <div class="time">{{ $item->created_at }}</div>
                  </div>
                  <h1><a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">{{ $item->news_title }}</a></h1>
                  <p> {{ Str::limit($item->news_short_description, 150, '...') }} </p>
                  <footer>
                    <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>198</div></a>
                    <a class="btn btn-primary more" href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">
                      <div>More</div>
                      <div><i class="ion-ios-arrow-thin-right"></i></div>
                    </a>
                  </footer>
                </div>
              </div>
            </article>
            @empty 
              <h6 class="text-center text-muted">কোন সংবাদ পাওয়া যায়নি।</h6>
            @endforelse
            <div class="col-md-12 text-center">
                {{ $news->links() }}
            </div>
          </div>

          <div class="banner">
            <a href="#">
                <img width="100%" height="100px" src="{{ asset('/') }}front/images/1692472613916412ads-2.png" alt="Sample Article">
            </a>
          </div>
          
        </div>
        <div class="col-md-4 sidebar">
          <aside>
            <div class="aside-body">
              <figure class="ads">
                  <a href="#">
                    <img src="{{ asset('/') }}front/images/ad.png">
                  </a>
                <figcaption>Advertisement</figcaption>
              </figure>
            </div>
          </aside>
          <aside>
            <h1 class="aside-title">Recent Post</h1>
            <div class="aside-body">
            @foreach($recent as $item)
              <article class="article-mini">
                <div class="inner">
                <figure>
                    <a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">
                      <img class="border rounded-sm" src="{{ asset('/') }}admin/news-image/{{ $item->news_image }}">
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
            </aside>
            <aside>
              <div class="aside-body">
                <form class="newsletter">
                  <div class="icon">
                    <i class="ion-ios-email-outline"></i>
                    <h1>Newsletter</h1>
                  </div>
                  <div class="input-group">
                    <input type="email" class="form-control email" placeholder="Your mail">
                    <div class="input-group-btn">
                      <button class="btn btn-primary"><i class="ion-paper-airplane"></i></button>
                    </div>
                  </div>
                  <p>By subscribing you will receive new articles in your email.</p>
                </form>
              </div>
            </aside>
            <aside>
              <img class="border" src="{{ asset('/') }}front/images/1692472765884143side-long-1.png" alt="">
          </aside>
            <aside>
              <h1 class="aside-title">Trending Post</h1>
              <div class="aside-body">
              @foreach($trending as $item)
                <article class="article-mini">
                  <div class="inner">
                  <figure>
                      <a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">
                        <img class="border rounded-sm" src="{{ asset('/') }}admin/news-image/{{ $item->news_image }}">
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
              </aside>
        </div>
      </div>
    </div>
  </section>


  <section class="best-of-the-week">
    <div class="container">
        <h1><div class="text">আরও সংবাদ</div>
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
          @foreach($more as $item)
          <article class="article">
              <div class="inner">
                  <figure>
                      <a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">
                          <img class="border rounded" src="{{ asset('/') }}admin/news-image/{{ $item->news_image }}" alt="Sample Article">
                      </a>
                  </figure>
                  <div class="padding">
                      <div class="detail">
                              <div class="time">{{ date('F-d-Y', strtotime($item->created_at)) }}</div>
                              <div class="category"><a href="{{ route('category-news',['name'=>$item->category_name_en]) }}">{{ $item->category_name_bn }}</a></div>
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