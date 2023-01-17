<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking App</title>

    <link rel="shortcut icon" href="{{ asset('Client/favicon.svg') }}" type="image/svg+xml">

    <!--
    - custom css link
  -->
    <link rel="stylesheet" href="{{ asset('Client/assets/css/style.css') }}">

    <!--
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
</head>

<body id="top">
    <header class="header" data-header>
        <div class="overlay" data-overlay></div>
        <div class="header-top">
            <div class="container">

                <a href="tel:+01123456790" class="helpline-box">

                    <div class="icon-box">
                        <ion-icon name="call-outline"></ion-icon>
                    </div>

                    <div class="wrapper">
                        <p class="helpline-title">For Further Inquires :</p>

                        <p class="helpline-number">+62 000 000 0000</p>
                    </div>

                </a>

                <a href="#" class="logo">
                    <img src="{{ asset('Client/assets/images/logo.svg') }}" alt="Tourly logo">
                </a>

                <div class="header-btn-group">

                    @guest
                        <a style="color: var(--white);" href="{{ route('login') }}">
                            Login
                        </a>
                    @endguest

                    @auth
                        <a href="#" style="color: var(--white);" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endauth

                    <button class="nav-open-btn" aria-label="Open Menu" data-nav-open-btn>
                        <ion-icon name="menu-outline"></ion-icon>
                    </button>

                </div>
            </div>
        </div>

        <div class="header-bottom">
            <div class="container">
                <ul class="social-list">
                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-facebook"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-twitter"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-youtube"></ion-icon>
                        </a>
                    </li>
                </ul>

                <nav class="navbar" data-navbar>
                    <div class="navbar-top">
                        <a href="#" class="logo">
                            <img src="{{ asset('Client/assets/images/logo-blue.svg') }}" alt="Tourly logo">
                        </a>

                        <button class="nav-close-btn" aria-label="Close Menu" data-nav-close-btn>
                            <ion-icon name="close-outline"></ion-icon>
                        </button>

                    </div>

                    <ul class="navbar-list">

                        <li>
                            <a href="{{ route('home') }}" class="navbar-link" data-nav-link>home</a>
                        </li>

                        <li>
                            <a href="{{ route('hotel') }}" class="navbar-link" data-nav-link>Hotel</a>
                        </li>

                        @if (Auth::check())
                            <li>
                                <a href="{{ route('order', Auth::user()->id) }}" class="navbar-link" data-nav-link>My Order</a>
                            </li>
                        @endif

                        @if (Auth::check() && Auth::user()->role == 'Admin')
                            <li>
                                <a href="/admin" class="navbar-link" data-nav-link>Admin Page</a>
                            </li>
                        @endif

                    </ul>

                </nav>

                <button class="btn btn-primary">Book Now</button>

            </div>
        </div>
    </header>

    @yield('content')

    <footer class="footer">

        <div class="footer-top">
            <div class="container">

                <div class="footer-brand">

                    <a href="#" class="logo">
                        <img src="{{ asset('Client/assets/images/logo.svg') }}" alt="Tourly logo">
                    </a>

                    <p class="footer-text">
                        Urna ratione ante harum provident, eleifend, vulputate molestiae proin fringilla, praesentium
                        magna conubia
                        at
                        perferendis, pretium, aenean aut ultrices.
                    </p>

                </div>

                <div class="footer-contact">

                    <h4 class="contact-title">Contact Us</h4>

                    <p class="contact-text">
                        Feel free to contact and reach us !!
                    </p>

                    <ul>

                        <li class="contact-item">
                            <ion-icon name="call-outline"></ion-icon>

                            <a href="tel:+01123456790" class="contact-link">+01 (123) 4567 90</a>
                        </li>

                        <li class="contact-item">
                            <ion-icon name="mail-outline"></ion-icon>

                            <a href="mailto:info.tourly.com" class="contact-link">info.tourly.com</a>
                        </li>

                        <li class="contact-item">
                            <ion-icon name="location-outline"></ion-icon>

                            <address>3146 Koontz, California</address>
                        </li>

                    </ul>

                </div>

                <div class="footer-form">

                    <p class="form-text">
                        Subscribe our newsletter for more update & news !!
                    </p>

                    <form action="" class="form-wrapper">
                        <input type="email" name="email" class="input-field" placeholder="Enter Your Email"
                            required>

                        <button type="submit" class="btn btn-secondary">Subscribe</button>
                    </form>

                </div>

            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">

                <p class="copyright">
                    &copy; 2022 <a href="">Booking App</a>. All rights reserved
                </p>

                <ul class="footer-bottom-list">

                    <li>
                        <a href="#" class="footer-bottom-link">Privacy Policy</a>
                    </li>

                    <li>
                        <a href="#" class="footer-bottom-link">Term & Condition</a>
                    </li>

                    <li>
                        <a href="#" class="footer-bottom-link">FAQ</a>
                    </li>

                </ul>

            </div>
        </div>

    </footer>

    <a href="#top" class="go-top" data-go-top>
        <ion-icon name="chevron-up-outline"></ion-icon>
    </a>

    <script src="{{ asset('Client/assets/js/script.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
