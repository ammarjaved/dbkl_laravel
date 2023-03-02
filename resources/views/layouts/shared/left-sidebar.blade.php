<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="h-100" data-simplebar>


        <div id="sidebar-menu">

            <ul id="side-menu">



                @if (Auth::user()->app_user_type != 'dbkl')
                    <div class="card ml-3 side-bar-card">
                        <div class="card-body  left-sidebar">
                            <li>
                                <a href="#sidebarApplication" class="text-center" data-bs-toggle="collapse">
                                    <p class="text-center"> <i data-feather="file-text" style="color:white"></i></p>
                                    <span class="text-white ml-3"> Application </span>

                                </a>
                                <div class="collapse" id="sidebarApplication">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('application.create') }}">
                                                <p class="text-center"><i class="mdi mdi-book-plus-outline"></i></p>
                                                <span class="text-white">Add Application</span>

                                            </a>
                                        </li>
                                        <li>

                                            <a href="{{ route('application.index') }}">
                                                <p class="text-center"><i class="mdi mdi-format-list-text"></i></p>
                                                <span class="text-white">Show Application</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="{{route('application-progress.index')}}" class="text-center" >
                                    <p class="text-center"> <i data-feather="file-text" style="color:white"></i></p>
                                    <span class="text-white ml-2"> Add Progress </span>

                                </a>

                            </li>
                        </div>
                    @else
                        <div class="card ml-3 side-bar-card">
                            <div class="card-body  left-sidebar">
                                <li>
                                    <a href="{{ route('application.index') }}" class="text-center mb-3">
                                        <p class="text-center"> <i data-feather="file-text" style="color:white"></i></p>
                                        <span class="text-white ml-3"> Application </span>

                                    </a>




                                </li>

                                <li>
                                    <a href="/getmap" class="text-center">
                                        <p class="text-center"> <i data-feather="map" style="color:white"></i></p>
                                        <span class="text-white px-3"> Map View</span>

                                    </a>
                                </li>
                            </div>
                @endif

        </div>




        </ul>
    </div>
    </li>
    </ul>

</div>
<!-- End Sidebar -->

<div class="clearfix"></div>

</div>
<!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->


<style>
    ul.sidebar-menu {
        margin-top: 80px;
        margin-left: 20px;
        background-color: #1a3869;
        text-align: center;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    .sidebar-menu {
        list-style: none;
    }

    ul.sidebar-menu li.logo {
        text-align: center;
        background-color: #fff;
        padding: 10px;
        height: auto;
    }

    ul li {
        list-style: none;
    }

    ul.sidebar-menu li.active,
    ul.sidebar-menu li:hover,
    ul.sidebar-menu li:focus {
        /* background: #9d1e07; */
        cursor: pointer;
    }

    ul.nav-second-level {
        padding: 0px;
    }

    li {
        border-bottom: 1px solid white;
        padding-bottom: 10px
    }

    p.text-center {
        font-size: 33px;
        padding: 0px;
        line-height: initial;
        color: white;
        margin-bottom: 0px;
    }

    span.text-white.ml-3 {
        padding: 0px 23px;
        font-size: 16px;
    }

    .card-body.left-sidebar {
        margin-top: 80px;
        margin-left: 18px;
        background-color: #1a3869;
    }

    .nav-second-level li a {
        padding: 11px 11px !important;
    }

    .left-side-menu.menuitem-active,
    .left-side-menu,
    .side-bar-card {
        background-color: #F4F5F7 !important;
        box-shadow: none;
    }

    .card.ml-3.show {
        background-color: #F3F4F6;
    }
</style>
