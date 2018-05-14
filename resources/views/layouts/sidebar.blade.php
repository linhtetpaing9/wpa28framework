<div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fas fa-cog"></i></i><span class="hide-menu">Dashboard<span class="label label-rouded label-primary pull-right">2</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('user.index')}}">Users</a></li>
                                <li><a href="{{route('role.index')}}">Roles</a></li>
                                {{-- <li><a href="{{route('user.role', '')}}">Users' Role</a></li> --}}
                            </ul>
                        </li>



                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>