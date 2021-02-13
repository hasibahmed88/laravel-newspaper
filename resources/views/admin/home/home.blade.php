@extends('admin.master')

@section('title')

@endsection

@section('body')

    <!-- ########## START: RIGHT PANEL ########## -->
    <div class="sl-sideright">
        <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">Messages (2)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">Notifications (8)</a>
          </li>
        </ul><!-- sidebar-tabs -->
  
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
            <div class="media-list">
              <!-- loop starts here -->
              <a href="" class="media-list-link">
                <div class="media">
                  <img src="../img/img3.jpg" class="wd-40 rounded-circle" alt="">
                  <div class="media-body">
                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                    <span class="d-block tx-11 tx-gray-500">2 minutes ago</span>
                    <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                  </div>
                </div><!-- media -->
              </a>
              <!-- loop ends here -->
              <a href="" class="media-list-link">
                <div class="media">
                  <img src="../img/img4.jpg" class="wd-40 rounded-circle" alt="">
                  <div class="media-body">
                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Samantha Francis</p>
                    <span class="d-block tx-11 tx-gray-500">3 hours ago</span>
                    <p class="tx-13 mg-t-10 mg-b-0">My entire soul, like these sweet mornings of spring.</p>
                  </div>
                </div><!-- media -->
              </a>
              <a href="" class="media-list-link">
                <div class="media">
                  <img src="../img/img7.jpg" class="wd-40 rounded-circle" alt="">
                  <div class="media-body">
                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Robert Walker</p>
                    <span class="d-block tx-11 tx-gray-500">5 hours ago</span>
                    <p class="tx-13 mg-t-10 mg-b-0">I should be incapable of drawing a single stroke at the present moment...</p>
                  </div>
                </div><!-- media -->
              </a>
              <a href="" class="media-list-link">
                <div class="media">
                  <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
                  <div class="media-body">
                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Larry Smith</p>
                    <span class="d-block tx-11 tx-gray-500">Yesterday, 8:34pm</span>
  
                    <p class="tx-13 mg-t-10 mg-b-0">When, while the lovely valley teems with vapour around me, and the meridian sun strikes...</p>
                  </div>
                </div><!-- media -->
              </a>
              <a href="" class="media-list-link">
                <div class="media">
                  <img src="../img/img3.jpg" class="wd-40 rounded-circle" alt="">
                  <div class="media-body">
                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                    <span class="d-block tx-11 tx-gray-500">Jan 23, 2:32am</span>
                    <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                  </div>
                </div><!-- media -->
              </a>
            </div><!-- media-list -->
            <div class="pd-15">
              <a href="" class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View More Messages</a>
            </div>
          </div><!-- #messages -->
  
          <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
            <div class="media-list">
              <!-- loop starts here -->
              <a href="" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                  <img src="../img/img8.jpg" class="wd-40 rounded-circle" alt="">
                  <div class="media-body">
                    <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                    <span class="tx-12">October 03, 2017 8:45am</span>
                  </div>
                </div><!-- media -->
              </a>
              <!-- loop ends here -->
              <a href="" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                  <img src="../img/img9.jpg" class="wd-40 rounded-circle" alt="">
                  <div class="media-body">
                    <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Social Network</strong></p>
                    <span class="tx-12">October 02, 2017 12:44am</span>
                  </div>
                </div><!-- media -->
              </a>
              <a href="" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                  <img src="../img/img10.jpg" class="wd-40 rounded-circle" alt="">
                  <div class="media-body">
                    <p class="tx-13 mg-b-0 tx-gray-700">20+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                    <span class="tx-12">October 01, 2017 10:20pm</span>
                  </div>
                </div><!-- media -->
              </a>
              <a href="" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                  <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
                  <div class="media-body">
                    <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                    <span class="tx-12">October 01, 2017 6:08pm</span>
                  </div>
                </div><!-- media -->
              </a>
              <a href="" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                  <img src="../img/img8.jpg" class="wd-40 rounded-circle" alt="">
                  <div class="media-body">
                    <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 12 others in a post.</p>
                    <span class="tx-12">September 27, 2017 6:45am</span>
                  </div>
                </div><!-- media -->
              </a>
              <a href="" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                  <img src="../img/img10.jpg" class="wd-40 rounded-circle" alt="">
                  <div class="media-body">
                    <p class="tx-13 mg-b-0 tx-gray-700">10+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                    <span class="tx-12">September 28, 2017 11:30pm</span>
                  </div>
                </div><!-- media -->
              </a>
              <a href="" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                  <img src="../img/img9.jpg" class="wd-40 rounded-circle" alt="">
                  <div class="media-body">
                    <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Great Pyramid</strong></p>
                    <span class="tx-12">September 26, 2017 11:01am</span>
                  </div>
                </div><!-- media -->
              </a>
              <a href="" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                  <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
                  <div class="media-body">
                    <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                    <span class="tx-12">September 23, 2017 9:19pm</span>
                  </div>
                </div><!-- media -->
              </a>
            </div><!-- media-list -->
          </div><!-- #notifications -->
  
        </div><!-- tab-content -->
      </div><!-- sl-sideright -->
      <!-- ########## END: RIGHT PANEL ########## --->
  
      <!-- ########## START: MAIN PANEL ########## -->
      <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
        </nav>
  
        <div class="sl-pagebody">
  
          <div class="row row-sm">
            <div class="col-sm-6 col-xl-3">
              <div class="card pd-20 bg-primary">
                <div class="d-flex justify-content-between align-items-center mg-b-10">
                  <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Today's Sales</h6>
                  <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                </div><!-- card-header -->
                <div class="d-flex align-items-center justify-content-between">
                  <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                  <h3 class="mg-b-0 tx-white tx-lato tx-bold">$850</h3>
                </div><!-- card-body -->
                <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                  <div>
                    <span class="tx-11 tx-white-6">Gross Sales</span>
                    <h6 class="tx-white mg-b-0">$2,210</h6>
                  </div>
                  <div>
                    <span class="tx-11 tx-white-6">Tax Return</span>
                    <h6 class="tx-white mg-b-0">$320</h6>
                  </div>
                </div><!-- -->
              </div><!-- card -->
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
              <div class="card pd-20 bg-info">
                <div class="d-flex justify-content-between align-items-center mg-b-10">
                  <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Week's Sales</h6>
                  <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                </div><!-- card-header -->
                <div class="d-flex align-items-center justify-content-between">
                  <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                  <h3 class="mg-b-0 tx-white tx-lato tx-bold">$4,625</h3>
                </div><!-- card-body -->
                <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                  <div>
                    <span class="tx-11 tx-white-6">Gross Sales</span>
                    <h6 class="tx-white mg-b-0">$2,210</h6>
                  </div>
                  <div>
                    <span class="tx-11 tx-white-6">Tax Return</span>
                    <h6 class="tx-white mg-b-0">$320</h6>
                  </div>
                </div><!-- -->
              </div><!-- card -->
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
              <div class="card pd-20 bg-purple">
                <div class="d-flex justify-content-between align-items-center mg-b-10">
                  <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Month's Sales</h6>
                  <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                </div><!-- card-header -->
                <div class="d-flex align-items-center justify-content-between">
                  <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                  <h3 class="mg-b-0 tx-white tx-lato tx-bold">$11,908</h3>
                </div><!-- card-body -->
                <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                  <div>
                    <span class="tx-11 tx-white-6">Gross Sales</span>
                    <h6 class="tx-white mg-b-0">$2,210</h6>
                  </div>
                  <div>
                    <span class="tx-11 tx-white-6">Tax Return</span>
                    <h6 class="tx-white mg-b-0">$320</h6>
                  </div>
                </div><!-- -->
              </div><!-- card -->
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
              <div class="card pd-20 bg-sl-primary">
                <div class="d-flex justify-content-between align-items-center mg-b-10">
                  <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Year's Sales</h6>
                  <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                </div><!-- card-header -->
                <div class="d-flex align-items-center justify-content-between">
                  <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                  <h3 class="mg-b-0 tx-white tx-lato tx-bold">$91,239</h3>
                </div><!-- card-body -->
                <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                  <div>
                    <span class="tx-11 tx-white-6">Gross Sales</span>
                    <h6 class="tx-white mg-b-0">$2,210</h6>
                  </div>
                  <div>
                    <span class="tx-11 tx-white-6">Tax Return</span>
                    <h6 class="tx-white mg-b-0">$320</h6>
                  </div>
                </div><!-- -->
              </div><!-- card -->
            </div><!-- col-3 -->
          </div><!-- row -->
  
        </div><!-- sl-pagebody -->
        <footer class="sl-footer">
          <div class="footer-left">
            <div class="mg-b-2">Copyright &copy; 2017. Starlight. All Rights Reserved.</div>
            <div>Made by ThemePixels.</div>
          </div>
          <div class="footer-right d-flex align-items-center">
            <span class="tx-uppercase mg-r-10">Share:</span>
            <a target="_blank" class="pd-x-5" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/starlight"><i class="fa fa-facebook tx-20"></i></a>
            <a target="_blank" class="pd-x-5" href="https://twitter.com/home?status=Starlight,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/starlight"><i class="fa fa-twitter tx-20"></i></a>
          </div>
        </footer>
      </div><!-- sl-mainpanel -->
      <!-- ########## END: MAIN PANEL ########## -->

@endsection