  <!-- ########## START: LEFT PANEL ########## -->
  <div class="sl-logo"><a href="{{ route('home') }}"><i class="icon ion-android-star-outline"></i> Newspaper</a></div>
  <div class="sl-sideleft shadow ">
    <div class="input-group input-group-search">
      <input type="search" name="search" class="form-control" placeholder="Search">
      <span class="input-group-btn">
        <button class="btn"><i class="fa fa-search"></i></button>
      </span><!-- input-group-btn -->
    </div><!-- input-group -->

    <label class="sidebar-label">Navigation</label>
    <div class="sl-sideleft-menu">
      <a href="{{ route('home') }}" class="sl-menu-link active">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
          <span class="menu-item-label">Dashboard</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      
      {{-- Category --}}
      <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon fa fa-server tx-20"></i>
          <span class="menu-item-label">Categories</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('add-category') }}" class="nav-link"><i class="icon ion-gear-a"></i> Add Category</a></li>
        <li class="nav-item"><a href="{{ route('manage-category') }}" class="nav-link"><i class="icon ion-gear-a"></i> Manage Category</a></li>
        <li class="nav-item"><a href="{{ route('trash-category') }}" class="nav-link"><i class="icon ion-trash-a"></i> Trash</a></li>
      </ul>

      {{-- Sub Category --}}
      <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
          <span class="menu-item-label">Sub Categories</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('add-subcategory') }}" class="nav-link"><i class="icon ion-gear-a"></i> Add Sub category</a></li>
        <li class="nav-item"><a href="{{ route('manage-subcategory') }}" class="nav-link"><i class="icon ion-gear-a"></i> Manage Sub category</a></li>
        <li class="nav-item"><a href="{{ route('trash-subcategory') }}" class="nav-link"><i class="icon ion-trash-a"></i> Trash</a></li>
      </ul>

       {{-- News --}}
       <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-clipboard tx-20"></i>
          <span class="menu-item-label">News</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('add-news') }}" class="nav-link"><i class="fa fa-plus"></i> Add news</a></li>
        <li class="nav-item"><a href="{{ route('manage-news') }}" class="nav-link"><i class="icon ion-gear-a"></i> Manage news</a></li>
        <li class="nav-item"><a href="{{ route('trashed-news') }}" class="nav-link"><i class="icon ion-trash-a"></i> Trashed news</a></li>
      </ul>

      {{-- Ads --}}
      <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-images tx-20"></i>
          <span class="menu-item-label">Ads</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('add-ads') }}" class="nav-link"><i class="fa fa-plus"></i> Add ads</a></li>
        <li class="nav-item"><a href="{{ route('manage-ads') }}" class="nav-link"><i class="icon ion-gear-a"></i> Manage ads</a></li>
        <li class="nav-item"><a href="{{ route('trashed-ads') }}" class="nav-link"><i class="icon ion-trash-a"></i> Trashed Ads</a></li>
      </ul>

    {{-- Newslatter/ subscriber --}}
      <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-pin tx-24"></i>
          <span class="menu-item-label">Subscriber</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="map-google.html" class="nav-link">Manage Subscriber</a></li>
      </ul>
      

    {{-- Visitors --}}
    <a href="#" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-person-stalker tx-24"></i>
        <span class="menu-item-label">Visitors</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="map-google.html" class="nav-link">Manage Subscriber</a></li>
    </ul>

    {{-- Comments --}}
    <a href="#" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-chatboxes tx-24"></i>
        <span class="menu-item-label">Comments</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="map-google.html" class="nav-link">Manage Subscriber</a></li>
    </ul>

    {{-- Message/Inbox --}}
    <a href="mailbox.html" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-chatbubble-working tx-24"></i>
        <span class="menu-item-label">Message</span>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->

      <a href="mailbox.html" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-gear-a tx-24"></i>
          <span class="menu-item-label">Setting</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
     
    </div><!-- sl-sideleft-menu -->

    <br>
  </div><!-- sl-sideleft -->
  <!-- ########## END: LEFT PANEL ########## -->

  <!-- ########## START: HEAD PANEL ########## -->
  <div class="sl-header shadow">
    <div class="sl-header-left">
      <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
      <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
    </div><!-- sl-header-left -->
    <div class="sl-header-right">
      <nav class="nav">
        <div class="dropdown">
          <a href="" class="nav-link nav-link-profile" data-toggle="dropdown"> <i class="icon ion-person">&nbsp;</i>
            <span class="logged-name">{{ Auth::user()->name }}</span>
            <img src="../img/img3.jpg" class="wd-32 rounded-circle" alt="">
          </a>
          <div class="dropdown-menu dropdown-menu-header wd-200 shadow rounded mr-1">
            <ul class="list-unstyled user-profile-nav">
              <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
              <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
              <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    <i class="icon ion-power"></i> {{ __('Logout') }}
                </a>
              </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </ul>
          </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
      </nav>
      
    </div><!-- sl-header-right -->
  </div><!-- sl-header -->
  <!-- ########## END: HEAD PANEL ########## -->

  