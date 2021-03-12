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
                <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li class="active">{{ $category_name }}</li>
                </ol>
                <h4 class="page-title">সংবাদ: {{ $category_name }}</h4>
                <p class="page-subtitle">Showing all posts with category <i>Computer</i></p>
              </div>
          </div>
          <div class="line"></div>
          <div class="row">
            {{-- <article class="col-md-12 article-list">
              <div class="inner">
                <figure>
                    <a href="single.html">
                      <img src="{{ asset('/') }}front/images/news/img01.jpg">
                  </a>
                </figure>
                <div class="details">
                  <div class="detail">
                    <div class="category">
                     <a href="category.html">Film</a>
                    </div>
                    <div class="time">December 26, 2016</div>
                  </div>
                  <h1><a href="single.html">Lorem Ipsum Dolor Sit Consectetur Adipisicing Elit</a></h1>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitat...
                  </p>
                  <footer>
                    <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>237</div></a>
                    <a class="btn btn-primary more" href="single.html">
                      <div>More</div>
                      <div><i class="ion-ios-arrow-thin-right"></i></div>
                    </a>
                  </footer>
                </div>
              </div>
            </article>
            <article class="col-md-12 article-list">
              <div class="inner">
                <figure>
                    <a href="single.html">
                      <img src="{{ asset('/') }}front/images/news/img11.jpg">
                  </a>
                </figure>
                <div class="details">
                  <div class="detail">
                    <div class="category">
                     <a href="category.html">Film</a>
                    </div>
                    <div class="time">December 26, 2016</div>
                  </div>
                  <h1><a href="single.html">Lorem Ipsum Dolor Sit Consectetur Adipisicing Elit</a></h1>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitat...
                  </p>
                  <footer>
                    <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>78</div></a>
                    <a class="btn btn-primary more" href="single.html">
                      <div>More</div>
                      <div><i class="ion-ios-arrow-thin-right"></i></div>
                    </a>
                  </footer>
                </div>
              </div>
            </article>
            <article class="col-md-12 article-list">
              <div class="inner">
                <figure>
                    <a href="single.html">
                      <img src="{{ asset('/') }}front/images/news/img08.jpg">
                  </a>
                </figure>
                <div class="details">
                  <div class="detail">
                    <div class="category">
                     <a href="category.html">Film</a>
                    </div>
                    <div class="time">December 26, 2016</div>
                  </div>
                  <h1><a href="single.html">Lorem Ipsum Dolor Sit Consectetur Adipisicing Elit</a></h1>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitat...
                  </p>
                  <footer>
                    <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>10</div></a>
                    <a class="btn btn-primary more" href="single.html">
                      <div>More</div>
                      <div><i class="ion-ios-arrow-thin-right"></i></div>
                    </a>
                  </footer>
                </div>
              </div>
            </article>
            <article class="col-md-12 article-list">
              <div class="inner">
                <figure>
                    <a href="single.html">
                      <img src="{{ asset('/') }}front/images/news/img13.jpg">
                  </a>
                </figure>
                <div class="details">
                  <div class="detail">
                    <div class="category">
                     <a href="category.html">Film</a>
                    </div>
                    <div class="time">December 26, 2016</div>
                  </div>
                  <h1><a href="single.html">Lorem Ipsum Dolor Sit Consectetur Adipisicing Elit</a></h1>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitat...
                  </p>
                  <footer>
                    <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>1820</div></a>
                    <a class="btn btn-primary more" href="single.html">
                      <div>More</div>
                      <div><i class="ion-ios-arrow-thin-right"></i></div>
                    </a>
                  </footer>
                </div>
              </div>
            </article>
            <article class="col-md-12 article-list">
              <div class="inner">
                <figure>
                    <a href="single.html">
                      <img src="{{ asset('/') }}front/images/news/img15.jpg">
                  </a>
                </figure>
                <div class="details">
                  <div class="detail">
                    <div class="category">
                     <a href="category.html">Film</a>
                    </div>
                    <div class="time">December 26, 2016</div>
                  </div>
                  <h1><a href="single.html">Lorem Ipsum Dolor Sit Consectetur Adipisicing Elit</a></h1>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitat...
                  </p>
                  <footer>
                    <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>739</div></a>
                    <a class="btn btn-primary more" href="single.html">
                      <div>More</div>
                      <div><i class="ion-ios-arrow-thin-right"></i></div>
                    </a>
                  </footer>
                </div>
              </div>
            </article>
            <article class="col-md-12 article-list">
              <div class="inner">
                <figure>
                    <a href="single.html">
                      <img src="{{ asset('/') }}front/images/news/img03.jpg">
                  </a>
                </figure>
                <div class="details">
                  <div class="detail">
                    <div class="category">
                     <a href="category.html">Film</a>
                    </div>
                    <div class="time">December 26, 2016</div>
                  </div>
                  <h1><a href="single.html">Lorem Ipsum Dolor Sit Consectetur Adipisicing Elit</a></h1>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitat...
                  </p>
                  <footer>
                    <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>902</div></a>
                    <a class="btn btn-primary more" href="single.html">
                      <div>More</div>
                      <div><i class="ion-ios-arrow-thin-right"></i></div>
                    </a>
                  </footer>
                </div>
              </div>
            </article>
            <article class="col-md-12 article-list">
              <div class="inner">
                <figure>
                    <a href="single.html">
                      <img src="{{ asset('/') }}front/images/news/img15.jpg">
                  </a>
                </figure>
                <div class="details">
                  <div class="detail">
                    <div class="category">
                     <a href="category.html">Film</a>
                    </div>
                    <div class="time">December 26, 2016</div>
                  </div>
                  <h1><a href="single.html">Lorem Ipsum Dolor Sit Consectetur Adipisicing Elit</a></h1>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitat...
                  </p>
                  <footer>
                    <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>78</div></a>
                    <a class="btn btn-primary more" href="single.html">
                      <div>More</div>
                      <div><i class="ion-ios-arrow-thin-right"></i></div>
                    </a>
                  </footer>
                </div>
              </div>
            </article> --}}
            @foreach($news as $item)
            <article class="col-md-12 article-list">
              <div class="inner">
                <figure>
                    <a href="single.html">
                      <img src="{{ asset('/') }}admin/news-image/{{ $item->news_image }}">
                  </a>
                </figure>
                <div class="details">
                  <div class="detail">
                    <div class="category">
                     <a href="category.html">{{ $item->category_name }}</a>
                    </div>
                    <div class="time">{{ $item->created_at->diffForHumans() }}</div>
                  </div>
                  <h1><a href="single.html">{{ $item->news_title }}</a></h1>
                  <p> {{ Str::limit($item->news_short_description, 150, '...') }} </p>
                  <footer>
                    <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>198</div></a>
                    <a class="btn btn-primary more" href="single.html">
                      <div>More</div>
                      <div><i class="ion-ios-arrow-thin-right"></i></div>
                    </a>
                  </footer>
                </div>
              </div>
            </article>
            @endforeach
            <div class="col-md-12 text-center">
                {{ $news->links() }}
            </div>
          </div>
        </div>
        <div class="col-md-4 sidebar">
          <aside>
            <div class="aside-body">
              <figure class="ads">
                  <a href="single.html">
                    <img src="{{ asset('/') }}front/images/ad.png">
                  </a>
                <figcaption>Advertisement</figcaption>
              </figure>
            </div>
          </aside>
          <aside>
            <h1 class="aside-title">Recent Post</h1>
            <div class="aside-body">
              <article class="article-fw">
                <div class="inner">
                  <figure>
                      <a href="single.html">
                        <img src="{{ asset('/') }}front/images/news/img12.jpg">
                      </a>
                  </figure>
                  <div class="details">
                    <h1><a href="single.html">Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit</a></h1>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <div class="detail">
                      <div class="time">December 26, 2016</div>
                      <div class="category"><a href="category.html">Lifestyle</a></div>
                    </div>
                  </div>
                </div>
              </article>
              <div class="line"></div>
              <article class="article-mini">
                <div class="inner">
                <figure>
                    <a href="single.html">
                      <img src="{{ asset('/') }}front/images/news/img05.jpg">
                  </a>
                </figure>
                <div class="padding">
                  <h1><a href="single.html">Duis aute irure dolor in reprehenderit in voluptate velit</a></h1>
                  <div class="detail">
                    <div class="category"><a href="category.html">Lifestyle</a></div>
                    <div class="time">December 22, 2016</div>
                  </div>
                </div>
                </div>
              </article>
              <article class="article-mini">
                <div class="inner">
                  <figure>
                      <a href="single.html">
                        <img src="{{ asset('/') }}front/images/news/img02.jpg">
                    </a>
                  </figure>
                  <div class="padding">
                    <h1><a href="single.html">Fusce ullamcorper elit at felis cursus suscipit</a></h1>
                    <div class="detail">
                      <div class="category"><a href="category.html">Travel</a></div>
                      <div class="time">December 21, 2016</div>
                    </div>
                  </div>
                </div>
              </article>
              <article class="article-mini">
                <div class="inner">
                  <figure>
                      <a href="single.html">
                        <img src="{{ asset('/') }}front/images/news/img13.jpg">
                    </a>
                  </figure>
                  <div class="padding">
                    <h1><a href="single.html">Duis aute irure dolor in reprehenderit in voluptate velit</a></h1>
                    <div class="detail">
                      <div class="category"><a href="category.html">International</a></div>
                      <div class="time">December 20, 2016</div>
                    </div>
                  </div>
                </div>
              </article>
            </div>
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
            <article class="article">
                <div class="inner">
                    <figure>
                        <a href="single.html">
                            <img src="{{ asset('/') }}front/images/news/img03.jpg" alt="Sample Article">
                        </a>
                    </figure>
                    <div class="padding">
                        <div class="detail">
                                <div class="time">December 11, 2016</div>
                                <div class="category"><a href="category.html">Travel</a></div>
                        </div>
                        <h2><a href="single.html">tempor interdum Praesent tincidunt</a></h2>
                        <p>Praesent tincidunt, leo vitae congue molestie.</p>
                    </div>
                </div>
            </article>
            <article class="article">
                <div class="inner">
                    <figure>
                        <a href="single.html">
                            <img src="{{ asset('/') }}front/images/news/img16.jpg" alt="Sample Article">
                        </a>
                    </figure>
                    <div class="padding">
                        <div class="detail">
                            <div class="time">December 09, 2016</div>
                            <div class="category"><a href="category.html">Sport</a></div>
                        </div>
                        <h2><a href="single.html">Maecenas porttitor sit amet turpis a semper</a></h2>
                        <p> Proin vulputate, urna id porttitor luctus, dui augue facilisis lacus.</p>
                    </div>
                </div>
            </article>
            <article class="article">
                <div class="inner">
                    <figure>
                        <a href="single.html">
                            <img src="{{ asset('/') }}front/images/news/img15.jpg" alt="Sample Article">
                        </a>
                    </figure>
                    <div class="padding">
                        <div class="detail">
                            <div class="time">December 26, 2016</div>
                            <div class="category"><a href="category.html">Lifestyle</a></div>
                        </div>
                        <h2><a href="single.html">Fusce ac odio eu ex volutpat pellentesque</a></h2>
                        <p>Vestibulum ante ipsum primis in faucibus orci luctus</p>
                    </div>
                </div>
            </article>
            <article class="article">
                <div class="inner">
                    <figure>
                        <a href="single.html">
                            <img src="{{ asset('/') }}front/images/news/img14.jpg" alt="Sample Article">
                        </a>
                    </figure>
                    <div class="padding">
                        <div class="detail">
                            <div class="time">December 26, 2016</div>
                            <div class="category"><a href="category.html">Travel</a></div>
                        </div>
                        <h2><a href="single.html">Nulla facilisis odio quis gravida vestibulum</a></h2>
                        <p>Proin venenatis pellentesque arcu, ut mattis nulla placerat et.</p>
                    </div>
                </div>
            </article>
            <article class="article">
                <div class="inner">
                    <figure>
                        <a href="single.html">
                            <img src="{{ asset('/') }}front/images/news/img01.jpg" alt="Sample Article">
                        </a>
                    </figure>
                    <div class="padding">
                        <div class="detail">
                            <div class="time">December 26, 2016</div>
                            <div class="category"><a href="category.html">Travel</a></div>
                        </div>
                        <h2><a href="single.html">Fusce Ullamcorper Elit At Felis Cursus Suscipit</a></h2>
                        <p>Proin venenatis pellentesque arcu, ut mattis nulla placerat et.</p>
                    </div>
                </div>
            </article>
            <article class="article">
                <div class="inner">
                    <figure>
                        <a href="single.html">
                            <img src="{{ asset('/') }}front/images/news/img11.jpg" alt="Sample Article">
                        </a>
                    </figure>
                    <div class="padding">
                        <div class="detail">
                            <div class="time">December 26, 2016</div>
                            <div class="category"><a href="category.html">Travel</a></div>
                        </div>
                        <h2><a href="single.html">Donec consequat arcu at ultrices sodales</a></h2>
                        <p>Proin venenatis pellentesque arcu, ut mattis nulla placerat et.</p>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>


@endsection