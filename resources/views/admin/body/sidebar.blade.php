<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="{{ url('admin/home') }}">
            <img src="{{ asset('public/backend/images/icon/logo-spectrum179.png') }}" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="has-sub">
                    <a class="js-arrow" href="{{ url('admin/home') }}">
                        <i class="fas fa-tachometer-alt" ></i>Dashboard</a>
                </li>

                @if(Auth::user()->category == 1)
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-th-list"></i>Category
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ route ('categories') }}">
                                <i class=""></i>Category</a>
                        </li>
                        <li>
                            <a href="{{ route ('sub.categories') }}">
                                <i class=""></i>Sub Category</a>
                        </li>
                        <li>
                            <a href="{{ route ('brands') }}">
                                <i class=""></i>Brand</a>
                        </li>
                    </ul>
                </li>
                @else
                @endif

                @if(Auth::user()->coupon == 1)
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-ticket-alt"></i>Coupon
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ route ('admin.coupon') }}">Coupon</a>
                        </li>
                    </ul>
                </li>
                @else
                @endif

                @if(Auth::user()->product == 1)
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-shopping-bag"></i>Products
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ route ('add.product') }}">Add Products</a>
                        </li>
                        <li>
                            <a href="{{ route ('all.product') }}">All Products</a>
                        </li>
                    </ul>
                </li>
                @else
                @endif

                @if(Auth::user()->order == 1)
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-barcode"></i>Orders
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ route ('admin.neworder') }}">New Order</a>
                        </li>
                        <li>
                            <a href="{{ route ('admin.accept.payment') }}">Accept Payment</a>
                        </li>
                        <li>
                            <a href="{{ route ('admin.cancel.order') }}">Cancel Order</a>
                        </li>
                        <li>
                            <a href="{{ route ('admin.process.payment') }}">Process Delivery</a>
                        </li>
                        <li>
                            <a href="{{ route ('admin.success.payment') }}">Delivery Succes</a>
                        </li>
                    </ul>
                </li>
                @else
                @endif

                @if(Auth::user()->blog == 1)
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-space-shuttle"></i>Blog
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ route ('add.blog.categorylist') }}">Blog Category</a>
                        </li>
                        <li>
                            <a href="{{ route ('add.blogpost') }}">Add Post</a>
                        </li>
                        <li>
                            <a href="{{ route ('all.blogpost') }}">Post List</a>
                        </li>
                    </ul>
                </li>
                @else
                @endif

                @if(Auth::user()->other == 1)
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-code"></i>Others
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ route ('admin.newslater') }}">Newslaters</a>
                        </li>
                        <li>
                            <a href="{{ route ('admin.seo') }}">SEO Setting</a>
                        </li>
                    </ul>
                </li>
                @else
                @endif

                @if(Auth::user()->report == 1)
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-bullhorn"></i>Reports
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ route ('today.order') }}">Today Order</a>
                        </li>
                        <li>
                            <a href="{{ route ('today.delivery') }}">Today Delivery</a>
                        </li>
                        <li>
                            <a href="{{ route ('this.month') }}">This Month</a>
                        </li>
                        <li>
                            <a href="{{ route ('search.report') }}">Search Report</a>
                        </li>
                    </ul>
                </li>
                @else
                @endif

                @if(Auth::user()->role == 1)
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-users"></i>User Role
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ route('create.admin') }}">Create User</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.all.user') }}">All User</a>
                        </li>
                    </ul>
                </li>
                @else
                @endif

                @if(Auth::user()->return == 1)
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-undo-alt"></i>Return Order
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ route('admin.return.request') }}">Return Request</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.all.return') }}">All Request</a>
                        </li>
                    </ul>
                </li>
                @else
                @endif

                @if(Auth::user()->contact == 1)
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-envelope-square"></i>Contact Message
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ route ('all.message') }}">All Message</a>
                        </li>
                    </ul>
                </li>
                @else
                @endif

                @if(Auth::user()->stock == 1)
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-box"></i>Product Stock
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ route ('admin.product.stock') }}">Stock</a>
                        </li>
                    </ul>
                </li>
                @else
                @endif

                @if(Auth::user()->comment == 1)
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-comments"></i>Product Comments
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ route ('today.order') }}">New Comments</a>
                        </li>
                        <li>
                            <a href="{{ route ('today.delivery') }}">All Comments</a>
                        </li>
                    </ul>
                </li>
                @else
                @endif

                @if(Auth::user()->setting == 1)
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-cogs"></i>Site Setting
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ route('admin.site.setting') }}">Site Setting</a>
                        </li>
                    </ul>
                </li>
                @else
                @endif
            </ul>
            </li>
            </ul>
        </nav>
    </div>
</aside>
