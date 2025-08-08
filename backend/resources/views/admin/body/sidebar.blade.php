<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a href="/" class="logo logo-light ">
                    <span class="logo-sm">
                        <img src="{{ asset('backend/assets/images/logo-sm-dark.png') }}" alt="logo" height="50">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('backend/assets/images/logo-dark-mode.png') }}" alt="logo"
                            height="50">
                    </span>
                </a>
                <a href="/" class="logo logo-dark ">
                    <span
                        class="logo-sm>
                                    <img src="{{ asset('backend/assets/images/logo-sm-light-mode.png') }}"
                        alt="logo" height="50">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('backend/assets/images/logo-light-mode.png') }}" alt="logo"
                            height="50">
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
                
                {{-- <li>
                    <a href="#sidebarError" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span> Manage Testimonial </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarError">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.testimonial') }}" class="tp-link">All Testimonials</a>
                            </li>
                            <li>
                                <a href="{{ route('add.testimonial') }}" class="tp-link">Add Testimonial</a>
                            </li>

                        </ul>
                    </div>
                </li> --}}



                <li class="menu-title mt-2">General</li>

                <li>
                    <a href="#sidebarBaseui" data-bs-toggle="collapse">
                        <i data-feather="package"></i>
                        <span> Components </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarBaseui">
                        <ul class="nav-second-level">
                            <li>
                                <a href="ui-accordions.html" class="tp-link">Accordions</a>
                            </li>
                            <li>
                                <a href="ui-alerts.html" class="tp-link">Alerts</a>
                            </li>

                        </ul>
                    </div>
                </li>


                {{-- becuase I don't have the extended UI, icons, forms, tables, charts, and other sections in the provided context, I will comment them out. --}}
                {{-- <li>
                                <a href="#sidebarAdvancedUI" data-bs-toggle="collapse">
                                    <i data-feather="cpu"></i>
                                    <span> Extended UI </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarAdvancedUI">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="extended-carousel.html" class="tp-link">Carousel</a>
                                        </li>
                                        <li>
                                            <a href="extended-notifications.html" class="tp-link">Notifications</a>
                                        </li>
                                        <li>
                                            <a href="extended-offcanvas.html" class="tp-link">Offcanvas</a>
                                        </li>
                                        <li>
                                            <a href="extended-range-slider.html" class="tp-link">Range Slider</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarIcons" data-bs-toggle="collapse">
                                    <i data-feather="award"></i>
                                    <span> Icons </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarIcons">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="icons-feather.html" class="tp-link">Feather Icons</a>
                                        </li>
                                        <li>
                                            <a href="icons-mdi.html" class="tp-link">Material Design Icons</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarForms" data-bs-toggle="collapse">
                                    <i data-feather="briefcase"></i>
                                    <span> Forms </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarForms">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="forms-elements.html" class="tp-link">General Elements</a>
                                        </li>
                                        <li>
                                            <a href="forms-validation.html" class="tp-link">Validation</a>
                                        </li>
                                        <li>
                                            <a href="forms-quilljs.html" class="tp-link">Quilljs Editor</a>
                                        </li>
                                        <li>
                                            <a href="forms-pickers.html" class="tp-link">Picker</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarTables" data-bs-toggle="collapse">
                                    <i data-feather="table"></i>
                                    <span> Tables </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarTables">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="tables-basic.html" class="tp-link">Basic Tables</a>
                                        </li>
                                        <li>
                                            <a href="tables-datatables.html" class="tp-link">Data Tables</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarCharts" data-bs-toggle="collapse">
                                    <i data-feather="pie-chart"></i>
                                    <span> Apex Charts </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarCharts">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href='charts-line.html'>Line</a>
                                        </li>
                                        <li>
                                            <a href='charts-area.html'>Area</a>
                                        </li>
                                        <li>
                                            <a href='charts-column.html'>Column</a>
                                        </li>
                                        <li>
                                            <a href='charts-bar.html'>Bar</a>
                                        </li>
                                        <li>
                                            <a href='charts-mixed.html'>Mixed</a>
                                        </li>
                                        <li>
                                            <a href='charts-timeline.html'>Timeline</a>
                                        </li>
                                        <li>
                                            <a href='charts-rangearea.html'>Range Area</a>
                                        </li>
                                        <li>
                                            <a href='charts-funnel.html'>Funnel</a>
                                        </li>
                                        <li>
                                            <a href='charts-candlestick.html'>Candlestick</a>
                                        </li>
                                        <li>
                                            <a href='charts-boxplot.html'>Boxplot</a>
                                        </li>
                                        <li>
                                            <a href='charts-bubble.html'>Bubble</a>
                                        </li>
                                        <li>
                                            <a href='charts-scatter.html'>Scatter</a>
                                        </li>
                                        <li>
                                            <a href='charts-heatmap.html'>Heatmap</a>
                                        </li>
                                        <li>
                                            <a href='charts-treemap.html'>Treemap</a>
                                        </li>
                                        <li>
                                            <a href='charts-pie.html'>Pie</a>
                                        </li>
                                        <li>
                                            <a href='charts-radialbar.html'>Radialbar</a>
                                        </li>
                                        <li>
                                            <a href='charts-radar.html'>Radar</a>
                                        </li>
                                        <li>
                                            <a href='charts-polararea.html'>Polar</a>
                                        </li>
                                    </ul>
                                </div>
                            </li> --}}

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
