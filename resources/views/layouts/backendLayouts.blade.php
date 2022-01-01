<!doctype html>
<html lang="en" class="fixed left-sidebar-top">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Helsinki</title>
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('backend') }}/favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('backend') }}/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('backend') }}/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend') }}/favicon/favicon-16x16.png">
    <!--load progress bar-->

    <script src="{{ asset('backend') }}/vendor/pace/pace.min.js"></script>
    <link href="vendor/pace/pace-theme-minimal.css" rel="{{ asset('backend') }}/stylesheet" />

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->

    <!--Magnific popup-->
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/magnific-popup/magnific-popup.css">
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <!--dataTable-->
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/bootstrap_date-picker/css/bootstrap-datepicker3.min.css">
    <!--Time picker-->
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/data-table/media/css/dataTables.bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/jquery/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/jquery/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/jquery/daterangepicker.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/stylesheets/css/style.css">



    <script src="{{ asset('backend') }}/vendor/jquery/jquery-1.12.3.min.js"></script>
    <script src="{{ asset('backend') }}/vendor/jquery/toastr.min.js"></script>
    <script src="{{ asset('backend') }}/vendor/jquery/daterangepicker.js"></script>
    <script src="{{ asset('backend') }}/vendor/jquery/jquery.printPage.js"></script>
    <script src="{{ asset('backend') }}/vendor/bootstrap_date-picker/js/bootstrap-datepicker.min.js"></script>

    <script src="{{ asset('backend') }}/vendor/jquery/sweetalert2.js"></script>
    <script src="{{ asset('backend') }}/vendor/jquery/handlebars.min.js"></script>
     <!--pNotify-->
 <script src="{{ asset('backend') }}/vendor/pnotify/pnotify.custom.js"></script>
 <!--Examples-->
 <script src="{{ asset('backend') }}/javascripts/examples/ui-elements/notifications-pnotify.js"></script>
<!--Examples-->


    <script >

        $(function(){
            $(document).on("click","#delete",function(e){
           e.preventDefault();
           var link = $(this).attr("href");
           Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
      window.location.href= link;
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
});


        });


        });


    </script>









    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
    <style>
        .notifyjs-corder{
            z-index: 10000 !important;
        }
    </style> --}}


</head>

<body>



    <div class="wrap">
        <!-- page HEADER -->
        <!-- ========================================================= -->
        <div class="page-header">

            <!-- LEFTSIDE header -->
            <div class="leftside-header">
                <div class="logo">
                    <a href="index.html" class="on-click">
                        <img alt="logo" src="{{ asset('backend') }}/images/header-logo.png" />
                    </a>
                </div>
                <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
            <!-- RIGHTSIDE header -->
            <div class="rightside-header">
                <div class="header-middle"></div>
                <!--SEARCH HEADERBOX-->
                <div class="header-section" id="search-headerbox">
                    <input type="text" name="search" id="search" placeholder="Search...">
                    <i class="fa fa-search search" id="search-icon" aria-hidden="true"></i>
                    <div class="header-separator"></div>
                </div>
                <!--NOCITE HEADERBOX-->
                <div class="header-section hidden-xs" id="notice-headerbox">
                    <!--check list-->
                    <div class="notice" id="checklist-notice">
                        <i class="fa fa-check-square-o" aria-hidden="true"></i>
                        <div class="dropdown-box basic">
                            <div class="drop-header">
                                <h3><i class="fa fa-check-square-o" aria-hidden="true"></i> To-Do List</h3>
                            </div>
                            <div class="drop-content">
                                <div class="widget-list list-to-do">
                                    <ul>
                                        <li>
                                            <div class="checkbox-custom checkbox-primary">
                                                <input type="checkbox" id="check-s1" value="option1">
                                                <label class="check" for="check-s1">Accusantium eveniet ipsam neque</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox-custom checkbox-primary">
                                                <input type="checkbox" id="check-s2" value="option1" checked>
                                                <label class="check" for="check-s2">Lorem ipsum dolor sit</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox-custom checkbox-primary">
                                                <input type="checkbox" id="check-s3" value="option1">
                                                <label class="check" for="check-s3">Dolor eligendi in ipsum sapiente</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox-custom checkbox-primary">
                                                <input type="checkbox" id="check-s4" value="option1">
                                                <label class="check" for="check-s4">Natus recusandae vel</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox-custom checkbox-primary">
                                                <input type="checkbox" id="check-s5" value="option1">
                                                <label class="check" for="check-s5">Adipisci amet officia tempore ut</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="drop-footer">
                                <a>See all Items</a>
                            </div>
                        </div>
                    </div>
                    <!--messages-->
                    <div class="notice" id="messages-notice">
                        <i class="fa fa-comments-o" aria-hidden="true"><span class="badge badge-xs badge-top-right x-danger"><i class="fa fa-exclamation"></i></span>
                        </i>
                        <div class="dropdown-box basic">
                            <div class="drop-header ">
                                <h3><i class="fa fa-comments" aria-hidden="true"></i> Messages</h3>
                                <span class="badge x-danger b-rounded">120</span>
                            </div>
                            <div class="drop-content">
                                <div class="widget-list list-left-element">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <div class="left-element"><img alt="profile photo" src="{{ asset('backend') }}/images/avatar/avatar_1.jpg" /></div>
                                                <div class="text">
                                                    <span class="title">John Doe</span>
                                                    <span class="subtitle">hello world</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="left-element"><img alt="profile photo" src="{{ asset('backend') }}/images/avatar/avatar_2.jpg" /></div>
                                                <div class="text">
                                                    <span class="title">Alice Smith</span>
                                                    <span class="subtitle">hello world</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="left-element"><img alt="profile photo" src="{{ asset('backend') }}/images/avatar/avatar_3.jpg" /></div>
                                                <div class="text">
                                                    <span class="title">Klaus Wolf</span>
                                                    <span class="subtitle">hello world</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="left-element"><img alt="profile photo" src="{{ asset('backend') }}/images/avatar/avatar_4.jpg" /></div>
                                                <div class="text">
                                                    <span class="title">Sun Li</span>
                                                    <span class="subtitle">hello world</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="left-element"><img alt="profile photo" src="{{ asset('backend') }}/images/avatar/avatar_5.jpg" /></div>
                                                <div class="text">
                                                    <span class="title">Sonia Valera</span>
                                                    <span class="subtitle">hello world</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="drop-footer">
                                <a>See all messages</a>
                            </div>
                        </div>
                    </div>

                    <!--alerts notices-->
                    <div class="notice" id="alerts-notice">
                        <i class="fa fa-bell-o" aria-hidden="true"><span class="badge badge-xs badge-top-right x-danger">7</span></i>

                        <div class="dropdown-box basic">
                            <div class="drop-header">
                                <h3><i class="fa fa-bell-o" aria-hidden="true"></i> Notifications</h3>
                                <span class="badge x-danger b-rounded">7</span>

                            </div>
                            <div class="drop-content">
                                <div class="widget-list list-left-element list-sm">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <div class="left-element"><i class="fa fa-warning color-warning"></i></div>
                                                <div class="text">
                                                    <span class="title">8 Bugs</span>
                                                    <span class="subtitle">reported today</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="left-element"><i class="fa fa-flag color-danger"></i></div>
                                                <div class="text">
                                                    <span class="title">Error</span>
                                                    <span class="subtitle">sevidor C down</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="left-element"><i class="fa fa-cog color-dark"></i></div>
                                                <div class="text">
                                                    <span class="title">New Configuration</span>
                                                    <span class="subtitle"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="left-element"><i class="fa fa-tasks color-success"></i></div>
                                                <div class="text">
                                                    <span class="title">14 Task</span>
                                                    <span class="subtitle">completed</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="left-element"><i class="fa fa-envelope color-primary"></i></div>
                                                <div class="text">
                                                    <span class="title">21 Menssage</span>
                                                    <span class="subtitle"> (see more)</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="drop-footer">
                                <a>See all notifications</a>
                            </div>
                        </div>
                    </div>
                    <div class="header-separator"></div>
                </div>
                <!--USER HEADERBOX -->
                <div class="header-section" id="user-headerbox">
                    <div class="user-header-wrap">
                        <div class="user-photo">
                            <img alt="profile photo" src="{{ asset('backend') }}/images/avatar/avatar_user.jpg" />
                        </div>
                        <div class="user-info">
                            <span class="user-name">Jane Doe</span>
                            <span class="user-profile">Admin</span>
                        </div>
                        <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                        <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                    </div>
                    <div class="user-options dropdown-box">
                        <div class="drop-content basic">
                            <ul>
                                <li> <a href="pages_user-profile.html"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                                <li> <a href="pages_lock-screen.html"><i class="fa fa-lock" aria-hidden="true"></i> Lock Screen</a></li>
                                <li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Configurations</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header-separator"></div>
                <!--Log out -->
                <div class="header-section">
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();"" data-toggle="tooltip" data-placement="left" title="Logout"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                </div>
            </div>
        </div>
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body">
            <!-- LEFT SIDEBAR -->
            <!-- ========================================================= -->
           @include("layouts.sideber")
            <!-- CONTENT -->
            <!-- ========================================================= -->
            <div class="content">
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                @if (session()->has("success"))

                                <script type="text/javascript">

                                    $(document).ready(function(){
                                        toastr.options = {
                                        "closeButton": true,
                                        "debug": false,
                                        "newestOnTop": true,
                                        "progressBar": true,
                                        "rtl": false,
                                        "positionClass": "toast-bottom-right",
                                        "onclick": null,
                                        "showDuration": 1000,
                                        "hideDuration": 1000,
                                        "timeOut": 5000,
                                        "extendedTimeOut": 1000,
                                        "showEasing": "swing",
                                        "hideEasing": "swing",
                                        "showMethod": "slideDown",
                                        "hideMethod": "slideUp"
                                        }
                                    Command: toastr["info"]("  <h4>{{ session()->get('success') }}</h4>");
                                    });
                            </script>



                @endif
                @if (session()->has("error"))

                                <script type="text/javascript">

                                    $(document).ready(function(){
                                        toastr.options = {
                                        "closeButton": true,
                                        "debug": false,
                                        "newestOnTop": true,
                                        "progressBar": true,
                                        "rtl": false,
                                        "positionClass": "toast-bottom-right",
                                        "onclick": null,
                                        "showDuration": 1000,
                                        "hideDuration": 1000,
                                        "timeOut": 5000,
                                        "extendedTimeOut": 1000,
                                        "showEasing": "swing",
                                        "hideEasing": "swing",
                                        "showMethod": "slideDown",
                                        "hideMethod": "slideUp"
                                        }
                                    Command: toastr["error"]("  <h4>{{ session()->get('error') }}</h4>");
                                    });
                            </script>



                @endif





               @yield("content")

               {{-- @if (session()->has("success"))
               <script >
                   $(function(){
                        $.notify("{{ session()->get('success') }}",{globalPosition:'top right',className:'success'});




                   });

               </script>



               @endif --}}
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            </div>
            <!-- RIGHT SIDEBAR -->
            <!-- ========================================================= -->

            <!--scroll to top-->
            <a href="#" class="scroll-to-top"><i class="fa fa-angle-double-up"></i></a>
        </div>
    </div>
    <!--BASIC scripts-->
    <!-- ========================================================= -->

    <script src="{{ asset('backend/vendor/data-table/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/data-table/media/js/dataTables.bootstrap.min.js') }}"></script>
    <!--Examples-->
    <script src="{{ asset('backend/javascripts/examples/tables/data-tables.js') }}"></script>

    <script src="{{ asset('backend') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('backend') }}/vendor/nano-scroller/nano-scroller.js"></script>
    <!--TEMPLATE scripts-->
    <!-- ========================================================= -->
    <script src="{{ asset('backend') }}/javascripts/template-script.min.js"></script>
    <script src="{{ asset('backend') }}/javascripts/template-init.min.js"></script>
    <!-- SECTION script and examples-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    {{-- <script src="{{ asset('backend') }}/vendor/toastr/toastr.min.js"></script> --}}
    <!--morris chart-->
    <script src="{{ asset('backend') }}/vendor/chart-js/chart.min.js"></script>
    <!--Gallery with Magnific popup-->
    <script src="{{ asset('backend') }}/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!--Examples-->
    <script src="{{ asset('backend') }}/javascripts/examples/dashboard.js"></script>
    <!--jQuery validation-->
<script src="{{ asset('backend') }}/vendor/jquery-validation/jquery.validate.min.js"></script>


    <!--dataTable-->


</body>


</html>
