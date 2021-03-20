@extends('front.master')
@section('title')
সর্বশেষ
@endsection

@section('body')

<section class="single">
    <div class="container">
        <div class="row">
            <div class="col-md-4 sidebar" id="sidebar">
                <aside>
                    <div class="aside-body">
                        <figure class="ads">
                            <img src="{{ asset('/') }}front/images/ad.png">
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
                                        <img src="{{ asset('/') }}admin/news-image/{{ $item->news_image }}">
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
                    <h1 class="aside-title">Featured Post</h1>
                    <div class="aside-body">
                      @foreach($featured as $item)
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
                    </div>
                </aside>
            </div>
            <div class="col-md-8">
                <ol class="breadcrumb">
                  <li><a href="{{ route('/') }}">Home</a></li>
                  <li class="active">{{ $news->category_name_bn }}</li>
                </ol>
                <article class="article main-article">
                    <header>
                        <h3>{{ $news->news_title }}</h3>
                        <ul class="details">
                            
                            <li>{{ date('F-d-Y', strtotime($item->created_at)) }} </li>
                            <li><a href="{{ route('category-news',['name'=>$news->category_name_en]) }}">{{ $news->category_name_bn }}</a></li>
                            <li>By <a href="#">John Doe</a></li>
                        </ul>
                    </header>
                    <div class="main">
                        <p>{{ $news->news_short_description }}</p>
                        <div class="featured">
                            <figure>
                                <img src="{{ asset('/') }}admin/news-image/{{ $news->news_image }}">
                            </figure>
                        </div>
                        <p>{!! $news->news_long_description !!}</p>
                    </div>
                    <footer>
                        <div class="col"></div>
                            <div class="col">
                                <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>1220</div></a>
                            </div>
                    </footer>
                </article>
                <div class="sharing">
                <div class="title"><i class="ion-android-share-alt"></i> Sharing is caring</div>
                    <ul class="social">
                        <li>
                            <a href="#" class="facebook">
                                <i class="ion-social-facebook"></i> Facebook
                            </a>
                        </li>
                        <li>
                            <a href="#" class="twitter">
                                <i class="ion-social-twitter"></i> Twitter
                            </a>
                        </li>
                        <li>
                            <a href="#" class="googleplus">
                                <i class="ion-social-googleplus"></i> Google+
                            </a>
                        </li>
                        <li>
                            <a href="#" class="linkedin">
                                <i class="ion-social-linkedin"></i> Linkedin
                            </a>
                        </li>
                        <li>
                            <a href="#" class="skype">
                                <i class="ion-ios-email-outline"></i> Email
                            </a>
                        </li>
                    </ul>
                </div>
                {{-- <div class="line">
                    <div>Author</div>
                </div>
                <div class="author">
                    <figure>
                        <img src="{{ asset('/') }}front/images/img01.jpg">
                    </figure>
                    <div class="details">
                        <div class="job">Web Developer</div>
                        <h3 class="name">John Doe</h3>
                        <p>Nulla sagittis rhoncus nisi, vel gravida ante. Nunc lobortis condimentum elit, quis porta ipsum rhoncus vitae. Curabitur magna leo, porta vel fringilla gravida, consectetur in libero. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                        <ul class="social trp sm">
                            <li>
                                <a href="#" class="facebook">
                                    <svg><rect/></svg>
                                    <i class="ion-social-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="twitter">
                                    <svg><rect/></svg>
                                    <i class="ion-social-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="youtube">
                                    <svg><rect/></svg>
                                    <i class="ion-social-youtube"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="googleplus">
                                    <svg><rect/></svg>
                                    <i class="ion-social-googleplus"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
                <div class="line"><div><a href="{{ route('category-news',['name'=>$item->category_name_en]) }}">{{ $category_name->category_name_bn }}</a>&nbsp; থেকে আরো পড়ুন</div></div>
                <div class="row">
                @foreach($related as $item)
                    <article class="article related col-md-4 col-sm-6 col-xs-12">
                        <div class="inner">
                                <a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">
                                    <img height="150px" class="border rounded-sm" src="{{ asset('/') }}admin/news-image/{{ $item->news_image }}">
                                </a>
                                <br><br>
                            <div class="padding">
                                <h2><a href="{{ route('news-details',['name'=>$item->news_title,'id'=>$item->id]) }}">{{ $item->news_title }}</a></h2>
                                <div class="detail">
                                    <div class="category"><a href="{{ route('category-news',['name'=>$item->category_name_en]) }}">{{ $item->category_name_bn }}</a></div>
                                    <div class="time">{{ date('F-d-Y', strtotime($item->created_at)) }}</div>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
                </div>
                <div class="line thin"></div>
                <div class="comments">
                    <h5 class="title">Comments <a href="#">Write a comment</a></h5>
                    <div class="comment-list">
                    @forelse($comments as $item)
                        <div class="item">
                            <div class="user">                                
                                {{-- <figure>
                                    <img src="{{ asset('/') }}front/images/img01.jpg">
                                </figure> --}}
                                <div class="details">
                                    <h6 class="name">{{ $item->visitor_name }}</h6>
                                    <div class="time">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</div>
                                    <div class="description">
                                        <p>{{ $item->comment }}</p>
                                    </div>
                                    <footer>
                                        <a href="#">Reply</a>
                                    </footer>
                                </div>
                            </div>
                        </div>
                    @empty 
                        <p>কোন কমেন্ট পাওয়া যায়নি।</p>
                    @endforelse
                    </div>

                    <div class="col-md-12">
                        <h4 class="title">Leave Your Comment</h4>
                    </div>
                    @if(Session::get('visitor_id'))
                    <form class="row" action="{{ route('news-comment') }}" method="POST">
                        @csrf 
                            <input type="hidden" name="news_id" value="{{ $news->id }}">
                            <input type="hidden" name="visitor_id" value="{{ Session::get('visitor_id') }}">
                            <div class="form-group col-md-12">
                            
                            @if(Session::get('message'))
                            <div class="alert alert-success alert-dismissible show" role="alert">
                                {{ Session::get('message')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                            @endif

                                <label for="message">Comment</label>
                                <textarea class="form-control" name="comment" placeholder="Write your response ..."></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary">Comment</button>
                            </div>
                        </form>
                    @else 
                        <div class="border" style="padding:10px">
                            <p>You cannot comment without login.If have an account <a href="{{ route('visitor-login') }}"> Login here </a> or <a href="{{ route('visitor-register') }}"> Register here </a> .</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>


@endsection