<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Ecommerce Admin Panel</title>

    <!-- vendor css -->
    <link href="{{ asset('public/backend/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/lib/rickshaw/rickshaw.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/lib/select2/css/select2.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('public/backend/css/starlight.css') }}">
    <link href="{{ asset('public/backend/lib/summernote/summernote-bs4.css') }}" rel="stylesheet">
    
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d8afe38de3.js" crossorigin="anonymous"></script>
    
    <!-- Icon -->
    <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>

  </head>

  <body>

    @guest
    
    @else
        <!-- ########## START: LEFT PANEL ########## -->
        <div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i>Dapple Park</a></div>
        <div class="sl-sideleft">
            
            {{-- <div class="input-group input-group-search">
                <input type="search" name="search" class="form-control" placeholder="Search">
                <span class="input-group-btn">
            <button class="btn"><i class="fa fa-search"></i></button>
            </span>
                <!-- input-group-btn -->
            </div>
            <!-- input-group --> --}}

            {{-- <label class="sidebar-label">Navigation</label> --}}

            <div class="sl-sideleft-menu">
                <a href="{{ route('admin.home') }}" class="sl-menu-link active">
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                        <span class="menu-item-label">Dashboard</span>
                    </div>
                    <!-- menu-item -->
                </a>
                <!-- sl-menu-link -->

                <!-- Category -->
                @if (Auth::user()->category == 1)
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="iconify tx-22" data-icon="carbon:category-new-each" data-inline="false"></i>
                        <span class="menu-item-label">Category</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div>
                    <!-- menu-item -->
                </a>
                <!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="{{ route('categories') }}" class="nav-link">Category</a></li>
                    <li class="nav-item"><a href="{{ route('sub_categories') }}" class="nav-link">Sub-Category</a></li>
                    <li class="nav-item"><a href="{{ route('brands') }}" class="nav-link">Brand</a></li>
                </ul>
                @else
                @endif

                <!-- Coupon -->
                @if (Auth::user()->coupon == 1)
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="iconify tx-22" data-icon="ri:coupon-2-line" data-inline="false"></i>
                        <span class="menu-item-label">Coupon</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div>
                    <!-- menu-item -->
                </a>
                <!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="{{ route('admin.coupon') }}" class="nav-link">Coupon</a></li>
                </ul>
                @else
                @endif

                <!-- Blogs -->
                @if (Auth::user()->blog == 1)
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="iconify tx-22" data-icon="carbon:blog" data-inline="false"></i>
                        <span class="menu-item-label">Blogs</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div>
                    <!-- menu-item -->
                </a>
                <!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="#" class="nav-link">Category</a></li>
                    <li class="nav-item"><a href="{{ route('add.blog_post') }}" class="nav-link">Add Post</a></li>
                    <li class="nav-item"><a href="{{ route('all.blog_post') }}" class="nav-link">All Post</a></li>
                </ul>
                @else
                @endif

                <!-- Products -->
                @if (Auth::user()->product == 1)
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="iconify tx-22" data-icon="gridicons:product" data-inline="false"></i>
                        <span class="menu-item-label">Products</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div>
                    <!-- menu-item -->
                </a>
                <!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="{{ route('add.product') }}" class="nav-link">Add Product</a></li>
                    <li class="nav-item"><a href="{{ route('all.product') }}" class="nav-link">All Product</a></li>
                </ul>
                @else
                @endif

                <!-- Order -->
                @if (Auth::user()->order == 1)
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="iconify tx-22" data-icon="mdi:order-bool-descending-variant" data-inline="false"></i>
                        <span class="menu-item-label">Orders</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div>
                    <!-- menu-item -->
                </a>
                <!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="{{ route('new.order') }}" class="nav-link">Pending Order</a></li>
                    <li class="nav-item"><a href="{{ route('payed.order') }}" class="nav-link">Payed Order</a></li>
                    <li class="nav-item"><a href="{{ route('shipped.order') }}" class="nav-link">Shipped Order</a></li>
                    <li class="nav-item"><a href="{{ route('delivered.order') }}" class="nav-link">Delivered Order</a></li>
                    <li class="nav-item"><a href="{{ route('canceled.order') }}" class="nav-link">Canceled Order</a></li>
                </ul>
                @else
                @endif

                <!-- Return Order -->
                @if (Auth::user()->return == 1)
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="iconify tx-22" data-icon="ic:outline-assignment-return" data-inline="false"></i>
                        <span class="menu-item-label">Return Orders</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div>
                    <!-- menu-item -->
                </a>
                <!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="{{ route('return.request') }}" class="nav-link">Return Request</a></li>
                    <li class="nav-item"><a href="{{ route('all.return') }}" class="nav-link">All Return</a></li>
                </ul>
                @else
                @endif

                <!-- Reports -->
                @if (Auth::user()->report == 1)
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="iconify tx-22" data-icon="carbon:report" data-inline="false"></i>
                        <span class="menu-item-label">Reports</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div>
                    <!-- menu-item -->
                </a>
                <!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="{{ route('todays.order') }}" class="nav-link">Today's Order</a></li>
                    <li class="nav-item"><a href="{{ route('todays.delivery') }}" class="nav-link">Today's Delivery</a></li>
                    <li class="nav-item"><a href="{{ route('months.order') }}" class="nav-link">This Month's Order</a></li>
                    <li class="nav-item"><a href="{{ route('search.report') }}" class="nav-link">Search Report</a></li>
                </ul>
                @else
                @endif


                <!-- Stock -->
                @if (Auth::user()->stock == 1)
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="iconify tx-22" data-icon="vaadin:stock" data-inline="false"></i>
                        <span class="menu-item-label">Stock</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div>
                    <!-- menu-item -->
                </a>
                <!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="{{ route('product.list') }}" class="nav-link">Product List</a></li>
                </ul>
                @else
                @endif

                <!-- User Role -->
                @if (Auth::user()->role == 1)
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="iconify tx-22" data-icon="carbon:user-role" data-inline="false"></i>
                        <span class="menu-item-label">User Role</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div>
                    <!-- menu-item -->
                </a>
                <!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="{{ route('creat.user') }}" class="nav-link">Create User</a></li>
                    <li class="nav-item"><a href="{{ route('all.user') }}" class="nav-link">All User</a></li>
                </ul>
                @else
                @endif

                <!-- Contact -->
                @if (Auth::user()->contact == 1)
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="iconify tx-22" data-icon="ic:outline-contact-mail" data-inline="false"></i>
                        <span class="menu-item-label">Contact</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div>
                    <!-- menu-item -->
                </a>
                <!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="#" class="nav-link">New Message</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">All Message</a></li>
                </ul>
                @else
                @endif

                <!-- Comment -->
                @if (Auth::user()->comment == 1)
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="iconify tx-22" data-icon="fa-regular:comment-dots" data-inline="false"></i>
                        <span class="menu-item-label">Comment</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div>
                    <!-- menu-item -->
                </a>
                <!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="#" class="nav-link">New Comment</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">All Comment</a></li>
                </ul>
                @else
                @endif

                <!-- Setting -->
                @if (Auth::user()->setting == 1)
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="iconify tx-22" data-icon="ic:baseline-settings" data-inline="false"></i>
                        <span class="menu-item-label">Site Setting</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div>
                    <!-- menu-item -->
                </a>
                <!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="{{ route('site.setting') }}" class="nav-link">Site Setting</a></li>
                    <li class="nav-item"><a href="{{ route('database.backup') }}" class="nav-link">Database Backup</a></li>
                </ul>
                @else
                @endif

                <!-- Others -->
                @if (Auth::user()->other == 1)
                <a href="#" class="sl-menu-link">
                    <div class="sl-menu-item">
                        <i class="iconify tx-22" data-icon="whh:restore" data-inline="false"></i>
                        <span class="menu-item-label">Others</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div>
                    <!-- menu-item -->
                </a>
                <!-- sl-menu-link -->
                <ul class="sl-menu-sub nav flex-column">
                    <li class="nav-item"><a href="{{ route('admin.newsletter') }}" class="nav-link">Newsletter</a></li>
                    <li class="nav-item"><a href="{{ route('admin.seo') }}" class="nav-link">SEO Settings</a></li>
                </ul>
                @else
                @endif
            </div>
            <!-- sl-sideleft-menu -->

            <br>
        </div>
        <!-- sl-sideleft -->
        <!-- ########## END: LEFT PANEL ########## -->

        <!-- ########## START: HEAD PANEL ########## -->
        <div class="sl-header">
            <div class="sl-header-left">
                <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
                <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
            </div>
            <!-- sl-header-left -->
            <div class="sl-header-right">
                <nav class="nav">
                    <div class="dropdown">
                        <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                            <span class="logged-name">Jane<span class="hidden-md-down"> Doe</span></span>
                            <img src="{{ asset('public/backend/img/img3.jpg') }}" class="wd-32 rounded-circle" alt="">
                        </a>
                        <div class="dropdown-menu dropdown-menu-header wd-200">
                            <ul class="list-unstyled user-profile-nav">
                                <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                                <li><a href="{{ route('admin.password.change')}}"><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
                                <li><a href="{{ route('admin.logout') }}"><i class="icon ion-power"></i> Sign Out</a></li>
                            </ul>
                        </div>
                        <!-- dropdown-menu -->
                    </div>
                    <!-- dropdown -->
                </nav>
                <div class="navicon-right">
                    <a id="btnRightMenu" href="" class="pos-relative">
                        <i class="icon ion-ios-bell-outline"></i>
                        <!-- start: if statement -->
                        <span class="square-8 bg-danger"></span>
                        <!-- end: if statement -->
                    </a>
                </div>
                <!-- navicon-right -->
            </div>
            <!-- sl-header-right -->
        </div>
        <!-- sl-header -->
        <!-- ########## END: HEAD PANEL ########## -->

        <!-- ########## START: RIGHT PANEL ########## -->
        <div class="sl-sideright">
            <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">Messages (2)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">Notifications (8)</a>
                </li>
            </ul>
            <!-- sidebar-tabs -->

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
                    <div class="media-list">
                        <!-- loop starts here -->
                        <a href="" class="media-list-link">
                            <div class="media">
                                <img src="{{ asset('public/backend/img/img3.jpg') }}" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                                    <span class="d-block tx-11 tx-gray-500">2 minutes ago</span>
                                    <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                                </div>
                            </div>
                            <!-- media -->
                        </a>
                        <!-- loop ends here -->
                        <a href="" class="media-list-link">
                            <div class="media">
                                <img src="{{ asset('public/backend/img/img4.jpg') }}" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Samantha Francis</p>
                                    <span class="d-block tx-11 tx-gray-500">3 hours ago</span>
                                    <p class="tx-13 mg-t-10 mg-b-0">My entire soul, like these sweet mornings of spring.</p>
                                </div>
                            </div>
                            <!-- media -->
                        </a>
                        <a href="" class="media-list-link">
                            <div class="media">
                                <img src="{{ asset('public/backend/img/img7.jpg') }}') }}" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Robert Walker</p>
                                    <span class="d-block tx-11 tx-gray-500">5 hours ago</span>
                                    <p class="tx-13 mg-t-10 mg-b-0">I should be incapable of drawing a single stroke at the present moment...</p>
                                </div>
                            </div>
                            <!-- media -->
                        </a>
                        <a href="" class="media-list-link">
                            <div class="media">
                                <img src="{{ asset('public/backend/img/img5.jpg') }}" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Larry Smith</p>
                                    <span class="d-block tx-11 tx-gray-500">Yesterday, 8:34pm</span>

                                    <p class="tx-13 mg-t-10 mg-b-0">When, while the lovely valley teems with vapour around me, and the meridian sun strikes...</p>
                                </div>
                            </div>
                            <!-- media -->
                        </a>
                        <a href="" class="media-list-link">
                            <div class="media">
                                <img src="{{ asset('public/backend/img/img3.jpg') }}" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                                    <span class="d-block tx-11 tx-gray-500">Jan 23, 2:32am</span>
                                    <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                                </div>
                            </div>
                            <!-- media -->
                        </a>
                    </div>
                    <!-- media-list -->
                    <div class="pd-15">
                        <a href="" class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View More Messages</a>
                    </div>
                </div>
                <!-- #messages -->

                <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
                    <div class="media-list">
                        <!-- loop starts here -->
                        <a href="" class="media-list-link read">
                            <div class="media pd-x-20 pd-y-15">
                                <img src="{{ asset('public/backend/img/img8.jpg') }}" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                                    <span class="tx-12">October 03, 2017 8:45am</span>
                                </div>
                            </div>
                            <!-- media -->
                        </a>
                        <!-- loop ends here -->
                        <a href="" class="media-list-link read">
                            <div class="media pd-x-20 pd-y-15">
                                <img src="{{ asset('public/backend/img/img9.jpg') }}" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Social Network</strong></p>
                                    <span class="tx-12">October 02, 2017 12:44am</span>
                                </div>
                            </div>
                            <!-- media -->
                        </a>
                        <a href="" class="media-list-link read">
                            <div class="media pd-x-20 pd-y-15">
                                <img src="{{ asset('public/backend/img/img10.jpg') }}" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="tx-13 mg-b-0 tx-gray-700">20+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                                    <span class="tx-12">October 01, 2017 10:20pm</span>
                                </div>
                            </div>
                            <!-- media -->
                        </a>
                        <a href="" class="media-list-link read">
                            <div class="media pd-x-20 pd-y-15">
                                <img src="{{ asset('public/backend/img/img5.jpg') }}" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                                    <span class="tx-12">October 01, 2017 6:08pm</span>
                                </div>
                            </div>
                            <!-- media -->
                        </a>
                        <a href="" class="media-list-link read">
                            <div class="media pd-x-20 pd-y-15">
                                <img src="{{ asset('public/backend/img/img8.jpg') }}" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 12 others in a post.</p>
                                    <span class="tx-12">September 27, 2017 6:45am</span>
                                </div>
                            </div>
                            <!-- media -->
                        </a>
                        <a href="" class="media-list-link read">
                            <div class="media pd-x-20 pd-y-15">
                                <img src="{{ asset('public/backend/img/img10.jpg') }}" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="tx-13 mg-b-0 tx-gray-700">10+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                                    <span class="tx-12">September 28, 2017 11:30pm</span>
                                </div>
                            </div>
                            <!-- media -->
                        </a>
                        <a href="" class="media-list-link read">
                            <div class="media pd-x-20 pd-y-15">
                                <img src="{{ asset('public/backend/img/img9.jpg') }}" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Great Pyramid</strong></p>
                                    <span class="tx-12">September 26, 2017 11:01am</span>
                                </div>
                            </div>
                            <!-- media -->
                        </a>
                        <a href="" class="media-list-link read">
                            <div class="media pd-x-20 pd-y-15">
                                <img src="{{ asset('public/backend/img/img5.jpg') }}" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                                    <span class="tx-12">September 23, 2017 9:19pm</span>
                                </div>
                            </div>
                            <!-- media -->
                        </a>
                    </div>
                    <!-- media-list -->
                </div>
                <!-- #notifications -->

            </div>
            <!-- tab-content -->
        </div>
        <!-- sl-sideright -->
        <!-- ########## END: RIGHT PANEL ########## --->
        
        

    @endguest
    
    @yield('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    {{-- <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Starlight</a>
            <span class="breadcrumb-item active">Dashboard</span>
        </nav>
    </div> --}}

    
    @guest
    
    @else
    <!-- ########## START: FOOTER PANEL ########## --->
    @yield('admin_footer')
        <div class="sl-mainpanel mt-0">
            <footer class="sl-footer"  style="margin-top: -5px;"><!-- Footer Starts -->
                <div class="footer-left">
                    <div class="mg-b-2">Copyright &copy; 2020. Dapple-Park. All Rights Reserved.</div>
                    <div>Made by AnimBhuiya.</div>
                </div>
                <div class="footer-right d-flex align-items-center">
                    <span class="tx-uppercase mg-r-10">Share:</span>
                    <a target="_blank" class="pd-x-5"
                        href="https://www.facebook.com/anim.bhuiya"><i
                            class="fa fa-facebook tx-20"></i></a>
                    <a target="_blank" class="pd-x-5"
                        href="https://github.com/bhuiyaanim"><i
                            class="fa fa-github tx-24"></i></a>
                </div>
            </footer>
        </div>
    <!-- ########## END: FOOTER PANEL ########## --->
    @endguest
    
    
    <script src="{{ asset('public/backend/lib/jquery/jquery.js') }}"></script>
    <script src="{{ asset('public/backend/lib/popper.js/popper.js') }}"></script>
    <script src="{{ asset('public/backend/lib/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('public/backend/lib/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('public/backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
    

    {{-- Data Table Start--}}
    <script src="{{ asset('public/backend/lib/highlightjs/highlight.pack.js') }}"></script>
    <script src="{{ asset('public/backend/lib/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('public/backend/lib/datatables-responsive/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('public/backend/lib/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('public/backend/lib/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/starlight.js') }}"></script>

    <script>
        $(function(){
            'use strict';

            // Inline editor
            var editor = new MediumEditor('.editable');

            // Summernote editor
            $('#summernote1').summernote({
            height: 250,
            tooltip: false
            })

            $('#summernote2').summernote({
            height: 150,
            tooltip: false
            })
        });
    </script>

    <script>
        $(function(){
            'use strict';
  
            $('#datatable1').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });
  
            $('#datatable2').DataTable({
                bLengthChange: false,
                searching: false,
                responsive: true
            });
  
            // Select2
            $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });
  
        });
    </script>
    {{-- Data Table Ends --}}


    <script src="{{ asset('public/backend/lib/d3/d3.js') }}"></script>
    <script src="{{ asset('public/backend/lib/rickshaw/rickshaw.min.js') }}"></script>
    <script src="{{ asset('public/backend/lib/chart.js/Chart.js') }}"></script>
    <script src="{{ asset('public/backend/lib/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('public/backend/lib/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('public/backend/lib/Flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('public/backend/lib/flot-spline/jquery.flot.spline.js') }}"></script>

    {{-- <script src="{{ asset('public/backend/js/starlight.js') }}"></script> --}}
    <script src="{{ asset('public/backend/js/ResizeSensor.js') }}"></script>
    <script src="{{ asset('public/backend/js/dashboard.js') }}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
    <script src="{{ asset('public/backend/lib/medium-editor/medium-editor.js') }}"></script>

    <script>
        @if(Session::has('messege'))
            var type="{{Session::get('alert-type','info')}}"
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('messege') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('messege') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('messege') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('messege') }}");
                    break;
            }
        @endif
    </script>  

    <script>  
        $(document).on("click", "#delete", function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                title: "Are you sure, you want to delete?",
                text: "Once Delete, This will be Permanently Removed!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;
                } else {
                    swal("Safe Data!");
                }
            });
        });
    </script>

    {{-- <script>  
        $(document).on("click", "#update", function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                title: "Are you sure, you want to update?",
                text: "Once Update, This will be Permanently Modified!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;
                } else {
                    swal("Safe Data!");
                }
            });
        });
    </script> --}}

  </body>
</html>
