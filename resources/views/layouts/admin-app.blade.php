<!DOCTYPE html>
<html lang="en">
<head>
    <title>Labdhi Dham Tirth</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{asset('admin/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin/css/admin.min.css?v=1.0')}}" crossorigin="anonymous" media='all'>
    <link rel="stylesheet" href="{{asset('admin/css/admin-custom.css?v=1.0')}}" crossorigin="anonymous" media='all'>
    <link rel="stylesheet" href="{{asset('admin/css/dataTables.bootstrap4.min.css')}}">
	@yield('header')
</head>
<body id="page-top">
    <div class="loader">
        <div class="loader-inner">
            <img src="{{asset('images/loading.gif')}}" alt="" style="width: 100%;">
        </div>
    </div>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.index')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Labdhi Dham Tirth</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <li class="nav-item {{ (Route::currentRouteName() == 'admin.index') || (Route::currentRouteName() == 'admin.booking.view') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('admin.index')}}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="nav-item {{ ((Route::currentRouteName() == 'admin.news') || (Route::currentRouteName() == 'admin.news.add') || (Route::currentRouteName() == 'admin.news.edit')) ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseZero"
                    aria-expanded="true" aria-controls="collapseZero">
                    <i class="fas fa-fw fa-newspaper"></i>
                    <span>News</span>
                </a>
                <div id="collapseZero" class="collapse {{ ((Route::currentRouteName() == 'admin.news') || (Route::currentRouteName() == 'admin.news.add') || (Route::currentRouteName() == 'admin.news.edit')) ? 'show' : '' }}" aria-labelledby="headingZero" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Route::currentRouteName() == 'admin.news' ? 'active' : '' }}" href="{{route('admin.news')}}">All News</a>
                        <a class="collapse-item {{ Route::currentRouteName() == 'admin.news.add' ? 'active' : '' }}" href="{{route('admin.news.add')}}">Add New News</a>
                    </div>
                </div>
            </li>
            <li class="nav-item {{ ((Route::currentRouteName() == 'admin.donors') || (Route::currentRouteName() == 'admin.donors.add') || (Route::currentRouteName() == 'admin.donors.edit') || (Route::currentRouteName() == 'admin.donors.categories') || (Route::currentRouteName() == 'admin.donors.addcategory') || (Route::currentRouteName() == 'admin.donors.editcategory')) ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-user-friends"></i>
                    <span>Donors</span>
                </a>
                <div id="collapseOne" class="collapse {{ ((Route::currentRouteName() == 'admin.donors') || (Route::currentRouteName() == 'admin.donors.add') || (Route::currentRouteName() == 'admin.donors.edit') || (Route::currentRouteName() == 'admin.donors.categories') || (Route::currentRouteName() == 'admin.donors.addcategory') || (Route::currentRouteName() == 'admin.donors.editcategory')) ? 'show' : '' }}" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Route::currentRouteName() == 'admin.donors' ? 'active' : '' }}" href="{{route('admin.donors')}}">All Donors</a>
                        <a class="collapse-item {{ Route::currentRouteName() == 'admin.donors.add' ? 'active' : '' }}" href="{{route('admin.donors.add')}}">Add New Donor</a>
                        <a class="collapse-item {{ Route::currentRouteName() == 'admin.donors.categories' ? 'active' : '' }}" href="{{route('admin.donors.categories')}}">All Donor Categories</a>
                        <a class="collapse-item {{ Route::currentRouteName() == 'admin.donors.addcategory' ? 'active' : '' }}" href="{{route('admin.donors.addcategory')}}">Add New Category</a>
                    </div>
                </div>
            </li>
            <li class="nav-item {{ ((Route::currentRouteName() == 'admin.room.photos') || (Route::currentRouteName() == 'admin.room.photos.add') || (Route::currentRouteName() == 'admin.room.photos.edit') || (Route::currentRouteName() == 'admin.room.photos.categories') || (Route::currentRouteName() == 'admin.room.photos.addcategory') || (Route::currentRouteName() == 'admin.room.photos.editcategory')) ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
                    aria-expanded="true" aria-controls="collapseFive">
                    <i class="fas fa-fw fa-images"></i>
                    <span>Room Photos</span>
                </a>
                <div id="collapseFive" class="collapse {{ ((Route::currentRouteName() == 'admin.room.photos') || (Route::currentRouteName() == 'admin.room.photos.add') || (Route::currentRouteName() == 'admin.room.photos.edit') || (Route::currentRouteName() == 'admin.room.photos.addbulk') || (Route::currentRouteName() == 'admin.room.photos.categories') || (Route::currentRouteName() == 'admin.room.photos.addcategory') || (Route::currentRouteName() == 'admin.room.photos.editcategory')) ? 'show' : '' }}" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Route::currentRouteName() == 'admin.room.photos' ? 'active' : '' }}" href="{{route('admin.room.photos')}}">All Photos</a>
                        <a class="collapse-item {{ Route::currentRouteName() == 'admin.room.photos.add' ? 'active' : '' }}" href="{{route('admin.room.photos.add')}}">Add New Photo</a>
                        <a class="collapse-item {{ Route::currentRouteName() == 'admin.room.photos.addbulk' ? 'active' : '' }}" href="{{route('admin.room.photos.addbulk')}}">Add Bulk Photos</a>
                        <a class="collapse-item {{ Route::currentRouteName() == 'admin.room.photos.categories' ? 'active' : '' }}" href="{{route('admin.room.photos.categories')}}">Room Photos Categories</a>
                        <a class="collapse-item {{ Route::currentRouteName() == 'admin.room.photos.addcategory' ? 'active' : '' }}" href="{{route('admin.room.photos.addcategory')}}">Add New Category</a>
                    </div>
                </div>
            </li>
            <li class="nav-item {{ ((Route::currentRouteName() == 'admin.albums') || (Route::currentRouteName() == 'admin.albums.add') || (Route::currentRouteName() == 'admin.albums.edit') || (Route::currentRouteName() == 'admin.photos') || (Route::currentRouteName() == 'admin.photos.add') || (Route::currentRouteName() == 'admin.photos.edit')) ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-image"></i>
                    <span>Gallery</span>
                </a>
                <div id="collapseTwo" class="collapse {{ ((Route::currentRouteName() == 'admin.albums') || (Route::currentRouteName() == 'admin.albums.add') || (Route::currentRouteName() == 'admin.albums.edit') || (Route::currentRouteName() == 'admin.photos') || (Route::currentRouteName() == 'admin.photos.add') || (Route::currentRouteName() == 'admin.photos.edit')) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Route::currentRouteName() == 'admin.albums' ? 'active' : '' }}" href="{{route('admin.albums')}}">All Albums</a>
                        <a class="collapse-item {{ Route::currentRouteName() == 'admin.albums.add' ? 'active' : '' }}" href="{{route('admin.albums.add')}}">Add New Album</a>
                        <a class="collapse-item {{ Route::currentRouteName() == 'admin.photos' ? 'active' : '' }}" href="{{route('admin.photos')}}">All Photos</a>
                        <a class="collapse-item {{ Route::currentRouteName() == 'admin.photos.add' ? 'active' : '' }}" href="{{route('admin.photos.add')}}">Add New Photo</a>
                    </div>
                </div>
            </li>
            <li class="nav-item {{ ((Route::currentRouteName() == 'admin.packages') || (Route::currentRouteName() == 'admin.packages.add') || (Route::currentRouteName() == 'admin.packages.edit')) ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Anusthan Packeges</span>
                </a>
                <div id="collapseThree" class="collapse {{ ((Route::currentRouteName() == 'admin.packages') || (Route::currentRouteName() == 'admin.packages.add') || (Route::currentRouteName() == 'admin.packages.edit')) ? 'show' : '' }}" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Route::currentRouteName() == 'admin.packages' ? 'active' : '' }}" href="{{route('admin.packages')}}">All Packages</a>
                        <a class="collapse-item {{ Route::currentRouteName() == 'admin.packages.add' ? 'active' : '' }}" href="{{route('admin.packages.add')}}">Add New Package</a>
                    </div>
                </div>
            </li>
            <li class="nav-item {{ ((Route::currentRouteName() == 'admin.events') || (Route::currentRouteName() == 'admin.events.add') || (Route::currentRouteName() == 'admin.events.edit')) ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                    aria-expanded="true" aria-controls="collapseFour">
                    <i class="fas fa-fw fa-calendar-alt"></i>
                    <span>Events</span>
                </a>
                <div id="collapseFour" class="collapse {{ ((Route::currentRouteName() == 'admin.events') || (Route::currentRouteName() == 'admin.events.add') || (Route::currentRouteName() == 'admin.events.edit')) ? 'show' : '' }}" aria-labelledby="headingFour" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Route::currentRouteName() == 'admin.events' ? 'active' : '' }}" href="{{route('admin.events')}}">All Events</a>
                        <a class="collapse-item {{ Route::currentRouteName() == 'admin.events.add' ? 'active' : '' }}" href="{{route('admin.events.add')}}">Add New Event</a>
                    </div>
                </div>
            </li>
            <li class="nav-item {{ ((Route::currentRouteName() == 'admin.amenities') || (Route::currentRouteName() == 'admin.amenities.add') || (Route::currentRouteName() == 'admin.amenities.edit')) ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix"
                    aria-expanded="true" aria-controls="collapseSix">
                    <i class="fas fa-fw fa-bed"></i>
                    <span>Amenities</span>
                </a>
                <div id="collapseSix" class="collapse {{ ((Route::currentRouteName() == 'admin.amenities') || (Route::currentRouteName() == 'admin.amenities.add') || (Route::currentRouteName() == 'admin.amenities.edit')) ? 'show' : '' }}" aria-labelledby="headingSix" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Route::currentRouteName() == 'admin.amenities' ? 'active' : '' }}" href="{{route('admin.amenities')}}">All Amenities</a>
                        <a class="collapse-item {{ Route::currentRouteName() == 'admin.amenities.add' ? 'active' : '' }}" href="{{route('admin.amenities.add')}}">Add New Amenity</a>
                    </div>
                </div>
            </li>
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{asset('images/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{route('logout')}}">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @include('shared.alert')
                    @yield('content')
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; {{env('APP_NAME')}} {{date('Y')}}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <script> 
        const baseUrl = "{{url('/')}}";
    </script>
    <script src="{{asset('admin/js/jquery.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/additional-methods.min.js"></script>
    <script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.bootstrap4.min.js')}}"></script>
    <script type="text/javascript">
        $('.custom-file-input').on('change', function(e) {
            if(e.target.files.length == 1) {
                let fileName = $(this).val().split('\\').pop();
                $(this).siblings('.custom-file-label').addClass('selected').html(fileName);
            } else {
                $(this).siblings('.custom-file-label').addClass('selected').html(e.target.files.length+" files selected");
            }
        });
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
    @yield('footer')
</body>
</html>