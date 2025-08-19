<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a href="/" class="logo logo-light">
                    <span class="logo-sm">
                        {{-- Use the dynamic favicon, or a default if not set --}}
                        <img src="{{ asset($setting->favicon ?? 'backend/assets/images/logo-sm-dark.png') }}"
                            alt="logo" height="30">
                    </span>
                    <span class="logo-lg">
                        {{-- Use the dynamic logo, or a default if not set --}}
                        <img src="{{ asset($setting->logo ?? 'backend/assets/images/logo-dark-mode.png') }}"
                            alt="logo" height="50">
                    </span>
                </a>
                <a href="/" class="logo logo-dark">
                    <span class="logo-sm">
                        {{-- Use the dynamic favicon, or a default if not set --}}
                        <img src="{{ asset($setting->favicon ?? 'backend/assets/images/logo-sm-light-mode.png') }}"
                            alt="logo" height="30">
                    </span>
                    <span class="logo-lg">
                        {{-- Use the dynamic logo, or a default if not set --}}
                        <img src="{{ asset($setting->logo ?? 'backend/assets/images/logo-light-mode.png') }}"
                            alt="logo" height="50">
                    </span>
                </a>
            </div>

            <ul id="side-menu">

                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="tp-link">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>



                <!-- <li>
                                <a href="landing.html" target="_blank">
                                    <i data-feather="globe"></i>
                                    <span> Landing </span>
                                </a>
                            </li> -->

                <li class="menu-title">Pages</li>

                {{-- Top Navbar Management --}}
                <li>
                    <a href="#topNavbar" data-bs-toggle="collapse">
                        <i data-feather="link"></i>
                        <span> Manage Top Navbar </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="topNavbar">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('edit.topnav') }}" class="tp-link">Top Navbar</a>
                            </li>


                        </ul>
                    </div>
                </li>

                {{-- Menu Management --}}
                <li>
                    <a href="#menu" data-bs-toggle="collapse">
                        <i data-feather="menu"></i>
                        <span> Manage Menu </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="menu">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('edit.menu.settings') }}" class="tp-link">Menu Settings</a>
                            </li>
                        </ul>
                    </div>
                </li>



                {{-- Slider Management --}}
                <li>
                    <a href="#sliders" data-bs-toggle="collapse">
                        <i data-feather="sliders"></i>
                        <span> Manage Sliders </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sliders">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.slider') }}" class="tp-link">All Sliders</a>
                            </li>
                            <li>
                                <a href="{{ route('add.slider') }}" class="tp-link">Add Slider</a>
                            </li>

                        </ul>
                    </div>
                </li>


                {{-- Services Management --}}
                <li>
                    <a href="#services" data-bs-toggle="collapse">
                        <i data-feather="layers"></i>
                        <span> Manage Services </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="services">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.service') }}" class="tp-link">All Services</a>
                            </li>
                            <li>
                                <a href="{{ route('add.service') }}" class="tp-link">Add Service</a>
                            </li>

                        </ul>
                    </div>
                </li>


                {{-- Case Studies Management --}}
                <li>
                    <a href="#caseStudy" data-bs-toggle="collapse">
                        <i data-feather="award"></i>
                        <span> Manage Case Study </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="caseStudy">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.casestudy') }}" class="tp-link">All Case Studies</a>
                            </li>
                            <li>
                                <a href="{{ route('add.casestudy') }}" class="tp-link">Add Case Study</a>
                            </li>

                        </ul>
                    </div>
                </li>

                {{-- Testimonial Management --}}
                <li>
                    <a href="#Testimonial" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span> Manage Testimonial </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="Testimonial">
                        <ul class="nav-second-level">
                            <li>
                                {{-- Use the conventional 'index' route name --}}
                                <a href="{{ route('testimonial.index') }}" class="tp-link">All Testimonials</a>
                            </li>
                            <li>
                                {{-- Use the conventional 'create' route name --}}
                                <a href="{{ route('testimonial.create') }}" class="tp-link">Add Testimonial</a>
                            </li>
                        </ul>
                    </div>
                </li>


                {{-- Our Client management --}}
                <li>
                    <a href="#OurClient" data-bs-toggle="collapse">
                        <i data-feather="user-plus"></i>
                        <span> Manage Our's Client </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="OurClient">
                        <ul class="nav-second-level">
                            <li>
                                {{-- Use the conventional 'index' route name --}}
                                <a href="{{ route('client.index') }}" class="tp-link">All Our's Client</a>
                            </li>
                            <li>
                                {{-- Use the conventional 'create' route name --}}
                                <a href="{{ route('client.create') }}" class="tp-link">Add Our's Client</a>
                            </li>
                        </ul>
                    </div>
                </li>



                {{-- Blog post management --}}
                <li>
                    <a href="#Blog" data-bs-toggle="collapse">
                        <i data-feather="book"></i>
                        <span> Manage Blog </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="Blog">
                        <ul class="nav-second-level">
                            <li>
                                {{-- Use the correct 'blog.index' route --}}
                                <a href="{{ route('blog.index') }}" class="tp-link">All Blog Posts</a>
                            </li>
                            <li>
                                {{-- Use the correct 'blog.create' route --}}
                                <a href="{{ route('blog.create') }}" class="tp-link">Add Blog Post</a>
                            </li>
                        </ul>
                    </div>
                </li>


                {{-- Footer Management --}}
                <li>
                    <a href="{{ route('footer.edit') }}" class="tp-link">
                        <i data-feather="trending-down"></i>
                        <span> Manage Footer </span>
                    </a>
                </li>

                {{-- Manage About Us Menu --}}
                <li>
                    <a href="{{ route('about-us.edit') }}" class="tp-link">
                        <i data-feather="target"></i>
                        <span> Manage About Us </span>
                    </a>
                </li>

                {{-- Contact Us Management --}}
                <li>
                    <a href="{{ route('contact-us.edit') }}" class="tp-link">
                        <i data-feather="phone-incoming"></i>
                        <span> Manage Contact Us </span>
                    </a>
                </li>



                <li class="menu-title mt-2">General</li>

                {{-- Settings Management --}}
                <li>
                    {{-- This is a direct link to the edit page --}}
                    <a href="{{ route('setting.edit') }}" class="tp-link">
                        <i data-feather="settings"></i>
                        <span> Settings </span>
                    </a>
                </li>







                <li>
                    <a href="#sidebarMaps" data-bs-toggle="collapse">
                        <i data-feather="map"></i>
                        <span> Maps </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarMaps">
                        <ul class="nav-second-level">
                            <li>
                                <a href="maps-google.html" class="tp-link">Google Maps</a>
                            </li>
                            <li>
                                <a href="maps-vector.html" class="tp-link">Vector Maps</a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>
