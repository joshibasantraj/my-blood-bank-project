@include('admin.section.header')

<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        
      @include('admin.section.sidebar')
        <!-- top navigation -->
        @include('admin.section.topnav')
      
        <!-- /top navigation -->

       @yield('content')

        <!-- footer content -->
        @include('admin.section.copy')
    
        <!-- /footer content -->
      </div>
    </div>

    
@include('admin.section.scripts')
   
  </body>


@include('admin.section.footer')