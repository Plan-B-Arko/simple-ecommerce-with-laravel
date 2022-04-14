<?php
use App\Http\Controllers\CartController;
$total = CartController::totalCartItem();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <title>Royal Food - {{ $title }}</title>
    <link rel="icon" type="image/png" href="https://img.icons8.com/bubbles/50/000000/hamburger.png">
    <!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-4.2.1/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendor/owl-carousel-2.3.4/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <!-- font - fontawesome -->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-5.6.1/css/all.min.css')}}">
    <!-- font - stroyka -->
    <link rel="stylesheet" href="{{ asset('fonts/stroyka/stroyka.css')}}">
    @yield('header_script')
</head>

<body>
<!-- quickview-modal -->
<div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content"></div>
    </div>
</div>
<!-- quickview-modal / end -->
<!-- mobilemenu -->
<div class="mobilemenu">
    <div class="mobilemenu__backdrop"></div>
    <div class="mobilemenu__body">
        <div class="mobilemenu__header">
            <div class="mobilemenu__title">Menu</div>
            <button type="button" class="mobilemenu__close">
                <svg width="20px" height="20px">
                    <use xlink:href="images/sprite.svg#cross-20"></use>
                </svg>
            </button>
        </div>
        <div class="mobilemenu__content">
            <ul class="mobile-links mobile-links--level--0" data-collapse data-collapse-opened-class="mobile-links__item--open">
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title"><a href="{{ route('home') }}" class="mobile-links__item-link">Home</a>
                    </div>
                </li>
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title"><a href="blog-classic.html" class="mobile-links__item-link">Baby Food</a>
                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                            <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="mobile-links__item-sub-links" data-collapse-content>
                        @foreach($submenus as $submenu)
                            <ul class="mobile-links mobile-links--level--1">
                                @if($submenu->maincategory == 'Baby')
                                    <li class="mobile-links__item" data-collapse-item>
                                        <div class="mobile-links__item-title"><a href="blog-classic.html" class="mobile-links__item-link">{{ $submenu->name }}</a></div>
                                    </li>
                                @endif
                            </ul>
                        @endforeach
                    </div>
                </li>
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title"><a data-collapse-trigger class="mobile-links__item-link">My account</a>
                    </div>
                </li>
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title"><a data-collapse-trigger class="mobile-links__item-link">{{ route('account') }}</a>
                    </div>
                </li>
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title"><a data-collapse-trigger class="mobile-links__item-link">{{ route('account') }}</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- mobilemenu / end -->
<!-- site -->
<div class="site">
    <!-- mobile site__header -->
    <header class="site__header d-lg-none">
        <div class="mobile-header mobile-header--sticky mobile-header--stuck">
            <div class="mobile-header__panel">
                <div class="container">
                    <div class="mobile-header__body">
                        <button class="mobile-header__menu-button">
                            <svg width="18px" height="14px">
                                <use xlink:href="images/sprite.svg#menu-18x14"></use>
                            </svg>
                        </button>

                        <div class="mobile-header__search">
                            <form class="mobile-header__search-form" action="#">
                                <input class="mobile-header__search-input" name="search" placeholder="Search over 10,000 products" aria-label="Site search" type="text" autocomplete="off">
                                <button class="mobile-header__search-button mobile-header__search-button--submit" type="submit">
                                    <svg width="20px" height="20px">
                                        <use xlink:href="images/sprite.svg#search-20"></use>
                                    </svg>
                                </button>
                                <button class="mobile-header__search-button mobile-header__search-button--close" type="button">
                                    <svg width="20px" height="20px">
                                        <use xlink:href="images/sprite.svg#cross-20"></use>
                                    </svg>
                                </button>
                                <div class="mobile-header__search-body"></div>
                            </form>
                        </div>
                        <div class="mobile-header__indicators">
                            <div class="indicator indicator--mobile-search indicator--mobile d-sm-none">
                                <button class="indicator__button"><span class="indicator__area"><svg width="20px" height="20px"><use xlink:href="images/sprite.svg#search-20"></use></svg></span></button>
                            </div>
                            <div class="indicator indicator--mobile"><a href="cart.html" class="indicator__button"><span class="indicator__area"><svg width="20px" height="20px"><use xlink:href="images/sprite.svg#cart-20"></use></svg> <span class="indicator__value">{{ $total }}</span></span></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- mobile site__header / end -->
    <!-- desktop site__header -->
    <header class="site__header d-lg-block d-none">
        <div class="site-header">
            <!-- .topbar -->
            <div class="site-header__topbar topbar">
                <div class="topbar__container container">
                    <div class="topbar__row">
                        <div class="topbar__item topbar__item--link"><a class="topbar-link" href="{{ route('aboutus') }}">About Us</a></div>
                        <div class="topbar__item topbar__item--link"><a class="topbar-link" href="{{ route('contactus') }}">Contacts</a></div>
                        <div class="topbar__spring"></div>
                        <div class="topbar__item">
                            <div class="topbar__item topbar__item--link"><a class="topbar-link" href="{{ route('logout') }}">Log out</a></div>
                            <div class="topbar__item topbar__item--link"><a class="topbar-link" href="">{{ Auth::user()->name }}</a></div>
                            <div class="topbar__item topbar__item--link"><a class="topbar-link" href="{{ route('food_review') }}">Food Review</a></div>
                            <div class="topbar__item topbar__item--link"><a class="topbar-link" href="{{ route('order_list') }}">Orders</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .topbar / end -->
            <div class="site-header__nav-panel">
                <div class="nav-panel">
                    <div class="nav-panel__container container">
                        <div class="nav-panel__row">
                            <div class="nav-panel__logo">
                                <a href="{{ route('home') }}">
                                    <h3><img src="https://img.icons8.com/bubbles/80/000000/hamburger.png"/>Royal Food</h3>
                                </a>
                            </div>
                            <!-- .nav-links -->
                            <div class="nav-panel__nav-links nav-links">
                                <ul class="nav-links__list">
                                    <li class="nav-links__item nav-links__item--with-submenu"><a href="{{ route('home') }}"><span>Home </span></a>
                                    </li>
                                    <li class="nav-links__item nav-links__item--with-submenu"><a href=""><span>Baby Food <i class="fa fa-angle-down p-1" aria-hidden="true"></i></span></a>
                                        <div class="nav-links__menu">
                                            <ul class="mobile-links mobile-links--level--1">
                                                @foreach($submenus as $submenu)
                                                    @if($submenu->maincategory == 'Baby')
                                                        <li class="mobile-links__item" data-collapse-item>
                                                            <div class="mobile-links__item-title"><a href="{{ url('/dashboard/product/category/'.$submenu->id) }}" class="mobile-links__item-link">{{ $submenu->name }}</a></div>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-links__item nav-links__item--with-submenu"><a href=""><span>Adult Food <i class="fa fa-angle-down p-1" aria-hidden="true"></i></span></a>
                                        <div class="nav-links__menu">
                                            <ul class="mobile-links mobile-links--level--1">
                                                @foreach($submenus as $submenu)
                                                    @if($submenu->maincategory == 'Adult')
                                                        <li class="mobile-links__item" data-collapse-item>
                                                            <div class="mobile-links__item-title"><a href="{{ url('/dashboard/product/category/'.$submenu->id) }}" class="mobile-links__item-link">{{ $submenu->name }}</a></div>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-links__item nav-links__item--with-submenu"><a href=""><span>Aged Food <i class="fa fa-angle-down p-1" aria-hidden="true"></i></span></a>
                                        <div class="nav-links__menu">
                                            <ul class="mobile-links mobile-links--level--1">
                                                @foreach($submenus as $submenu)
                                                    @if($submenu->maincategory == 'Aged')
                                                        <li class="mobile-links__item" data-collapse-item>
                                                            <div class="mobile-links__item-title"><a href="{{ url('/dashboard/product/category/'.$submenu->id) }}" class="mobile-links__item-link">{{ $submenu->name }}</a></div>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-links__item"><a href="{{ route('top_restaurant') }}"><span>Top Restaurant</span></a></li>
                                    <li class="nav-links__item nav-links__item--with-submenu"><a href="{{ route('contactus') }}"><span>Contact Us </span></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- .nav-links / end -->
                            <div class="nav-panel__indicators">
                                <a href="{{ route('dashboard_cart') }}" class="indicator__button">
                                    <i class="fa fa-shopping-cart" ></i><span class="indicator__value">{{ $total }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- desktop site__header / end -->
    <!-- site__body -->
    <div class="site__body">
        <!-- .block-slideshow -->
        <div class="block-slideshow block-slideshow--layout--full block">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @yield('slider')
                    </div>
                </div>
            </div>
        </div>
        <!-- .block-slideshow / end -->
        <!-- .block-features -->
        <div class="block block-features block-features--layout--boxed">
            @yield('block_feature')
        </div>
        @yield('content')
    </div>
    <!-- site__body / end -->
    <!-- site__footer -->
    <footer class="site__footer">
        <div class="site-footer">
            <div class="container">
                <div class="site-footer__widgets">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="site-footer__widget footer-contacts">
                                <h5 class="footer-contacts__title">Contact Us</h5>
                                <div class="footer-contacts__text">
                                    <p><strong>Opening Hours</strong>
                                        <br>Monday to Friday: 8am-8pm
                                        <br>Saturday: 8am-6pm
                                        <br>Sunday: 10am-4pm</p>
                                </div>
                                <ul class="footer-contacts__contacts">
                                    <li><i class="footer-contacts__icon fas fa-globe-americas"></i> Sirajgong</li>
                                    <li><i class="footer-contacts__icon far fa-envelope"></i> admin@example.com</li>
                                    <li><i class="footer-contacts__icon fas fa-mobile-alt"></i> 017XX XXX XXX</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 col-lg-2">
                            <div class="site-footer__widget footer-links">
                                <h5 class="footer-links__title">Information</h5>
                                <ul class="footer-links__list">
                                    <li class="footer-links__item"><a href="{{ route('aboutus') }}" class="footer-links__link">About Us</a></li>
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">Privacy Policy</a></li>
                                    <li class="footer-links__item"><a href="{{ route('contactus') }}" class="footer-links__link">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 col-lg-2">
                            <div class="site-footer__widget footer-links">
                                <h5 class="footer-links__title">My Account</h5>
                                <ul class="footer-links__list">
                                    <li class="footer-links__item"><a href="#" class="footer-links__link">Order History</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="site-footer__widget footer-newsletter">
                                <h5 class="footer-newsletter__title">Subscribe</h5>
                                <div class="footer-newsletter__text"></div>
                                <form action="#" class="footer-newsletter__form">
                                    <label class="sr-only" for="footer-newsletter-address">Email Address</label>
                                    <input type="text" class="footer-newsletter__form-input form-control" id="footer-newsletter-address" placeholder="Email Address...">
                                    <button class="footer-newsletter__form-button btn btn-primary">Subscribe</button>
                                </form>
                                <div class="footer-newsletter__text footer-newsletter__text--social">Follow us on social networks</div>
                                <ul class="footer-newsletter__social-links">
                                    <li class="footer-newsletter__social-link footer-newsletter__social-link--facebook"><a href="" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="footer-newsletter__social-link footer-newsletter__social-link--twitter"><a href="" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li class="footer-newsletter__social-link footer-newsletter__social-link--youtube"><a href="" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                    <li class="footer-newsletter__social-link footer-newsletter__social-link--instagram"><a href="" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    <li class="footer-newsletter__social-link footer-newsletter__social-link--rss"><a href="" target="_blank"><i class="fas fa-rss"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- site__footer / end -->
</div>
<!-- site / end -->

<!-- js -->

<script src="{{ asset('vendor/jquery-3.3.1/jquery.min.js')}}"></script>
<script src="{{ asset('vendor/bootstrap-4.2.1/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('vendor/owl-carousel-2.3.4/owl.carousel.min.js')}}"></script>
<script src="{{ asset('vendor/nouislider-12.1.0/nouislider.min.js')}}"></script>
<script src="{{ asset('js/number.js')}}"></script>
<script src="{{ asset('js/main.js')}}"></script>
<script src="{{ asset('vendor/svg4everybody-2.1.9/svg4everybody.min.js')}}"></script>
<script>
    svg4everybody();
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-97489509-6"></script>
<script src="{{ asset('/js/jquery.validate.js') }}"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-97489509-6');
</script>
@yield('footer_script')
</body>

</html>
