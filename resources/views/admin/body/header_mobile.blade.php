<header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="{{ asset('public/backend/images/icon/logo.png') }}" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{ asset('public/backend/index.html') }}">Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="{{ asset('public/backend/index2.html') }}">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="{{ asset('public/backend/index3.html') }}">Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="{{ asset('public/backend/index4.html') }}">Dashboard 4</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ asset('public/backend/chart.html') }}">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="{{ asset('public/backend/table.html') }}">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="{{ asset('public/backend/form.html') }}">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="{{ asset('public/backend/calendar.html') }}">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="{{ asset('public/backend/map.html') }}">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{ asset('public/backend/login.html') }}">Login</a>
                                </li>
                                <li>
                                    <a href="{{ asset('public/backend/register.html') }}">Register</a>
                                </li>
                                <li>
                                    <a href="{{ asset('public/backend/forget-pass.html') }}">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{ asset('public/backend/button.html') }}">Button</a>
                                </li>
                                <li>
                                    <a href="{{ asset('public/backend/badge.html') }}">Badges</a>
                                </li>
                                <li>
                                    <a href="{{ asset('public/backend/tab.html') }}">Tabs</a>
                                </li>
                                <li>
                                    <a href="{{ asset('public/backend/card.html') }}">Cards</a>
                                </li>
                                <li>
                                    <a href="{{ asset('public/backend/alert.html') }}">Alerts</a>
                                </li>
                                <li>
                                    <a href="{{ asset('public/backend/progress-bar.html') }}">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="{{ asset('public/backend/modal.html') }}">Modals</a>
                                </li>
                                <li>
                                    <a href="{{ asset('public/backend/switch.html') }}">Switchs</a>
                                </li>
                                <li>
                                    <a href="{{ asset('public/backend/grid.html') }}">Grids</a>
                                </li>
                                <li>
                                    <a href="{{ asset('public/backend/fontawesome.html') }}">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="{{ asset('public/backend/typo.html') }}">Typography</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>