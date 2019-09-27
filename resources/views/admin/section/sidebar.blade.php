<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{route('homepage')}}" class="site_title"><i class="fa fa-dove"></i> <span>Admin CMS!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ asset('images/users/'.request()->user()->image)}}" alt="No image found" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->name }}</h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
               
                <ul class="nav side-menu">
               
                  <li><a href="{{ route('donor.index')}}"><i class="fas fa-hand-holding-usd"></i>  Donor  <i class="fas fa-angle-right"></i></a></li>
                  <li><a href="{{route('blood_request.index')}}"><i class="fas fa-fill-drip"></i> Request  <i class="fas fa-angle-right"></i></a></li>
                  <li><a href="{{route('image.index')}}"><i class="far fa-images"></i> Image  <i class="fas fa-angle-right"></i></a></li>
                  
                  <li><a href="{{route('camp.index')}}"><i class="fas fa-campground"></i> Camps  <i class="fas fa-angle-right"></i></a></li>
                  <li><a href="{{route('news.index')}}"><i class="fas fa-newspaper"></i> News  <i class="fas fa-angle-right"></i></a></li>
                  <li><a href="{{route('blood.index')}}"><i class="fas fa-tint"></i> Blood   <i class="fas fa-angle-right"></i></a></li>
                  <li><a href="{{ route('contact.index')}}"><i class="fas fa-id-card"></i> Contact  <i class="fas fa-angle-right"></i></a></li>
                   
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
