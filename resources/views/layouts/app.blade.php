
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Textile Range</title>
    <!-- plugins:css -->

    <link rel="stylesheet" href="{{ asset('public/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/iconfonts/ionicons/css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/iconfonts/typicons/src/font/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/css/vendor.bundle.addons.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/shared/style.css') }}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/demo_1/style.css') }}">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="{{ asset('public/assets/images/favicon.png') }}">
    <link href="{{ asset('public/css/custom.css') }}" rel="stylesheet">
    <!-- sweet alert cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <!-- bootstrap CDN link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	  
  </head>
  <body>
    <div class="container-scroller">
      <!-- nav bar -->
      <nav class="navbar navbar-expand-lg  navbar-dark bg-primary d-flex align-items-baseline">
        <a class="navbar-brand" href="{{route('home')}}">Textile Range</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
           <li class="nav-item">
              <a  class="nav-link  {{ request()->routeIs('home') ? 'active' : '' }}" href="{{route('home')}}">Dashboard<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
              <a class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}" href="{{route('user.index')}}">User<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('customer.index') ? 'active' : '' }} " href="{{route('customer.index')}}">Customer<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
              <a class="nav-link {{ request()->routeIs('foreigner-agent.index') ? 'active' : '' }}" href="{{route('foreigner-agent.index')}}">Foreigner Agent<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('vendor.index') ? 'active' : '' }}" href="{{route('vendor.index')}}">Vendor<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('category.index') ? 'active' : '' }}" href="{{route('category.index')}}">Product Category<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('product.index') ? 'active' : '' }}" href="{{route('product.index')}}">Product<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('orders.index') ? 'active' : '' }}" href="{{route('orders.index')}}">Orders<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle pt-1" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Reports
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{route('by.product')}}">Report By Product</a>
                <a class="dropdown-item" href="{{route('by.customer')}}">Report By Customer</a>
                <a class="dropdown-item" href="{{route('by.vendor')}}">Report By Vendor</a>
              </div>
            </li>
          </ul>
            <ul class="navbar-nav ml-auto navbar-menu-wrapper d-flex align-items-center">
              <li>
                <div class="d-flex">
                    <div class="mr-1">{{Auth::user()->name}} </div>
                    <div class="">({{Auth::user()->email}})</div>
                </div> 
              </li>
            <li>
                <div>
                  <a class="dropdown-item " href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                      {{ __('Logout') }} 
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
              </li> 
            </ul>
        </div>
    </nav>
     

      <div class="container-fluid page-body-wrapper px-0">
       
       

        <!-- partial -->
        <div class="main-panel" style="width:100%;">

          <div class="content-wrapper">
          @yield('content')
          </div>

          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2020 </span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> 
              </span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->

    <script src="{{ asset('public/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('public/assets/vendors/js/vendor.bundle.addons.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>

    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('public/assets/js/shared/off-canvas.js') }}"></script>
    <script src="{{ asset('public/assets/js/shared/off-canvas.js') }}"></script>

    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
    @yield('script')
    
    @stack('scripts')
    
    <script>
            function deleteRow(obj) {
              console.log(obj);
              
                               Swal.fire({
                                         title: 'Are you sure you want to delete this   ?',
                                         text: "You won't be able to revert this!",
                                         icon: 'warning',
                                         showCancelButton: true,
                                         confirmButtonColor: '#3085d6',
                                         cancelButtonColor: '#d33',
                                         confirmButtonText: 'Yes, delete it!'
                                       }).then((result) => {
                                         if (result.value) {
                                           //
                                           console.log(
                                             $(obj).parent('form').submit()
                                           );
                                           
                                         }
                                       })
                                    }
                                                       
           </script>   
  </body>
</html>
