<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap-reboot.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-grid.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/nouislider.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/plyr.css')}}">
    <link rel="stylesheet" href="{{asset('css/photos/wipe.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{asset('icon/favicon_32x32.png')}}" sizes="32x32">
    <link rel="apple-touch-icon" href="{{asset('icon/favicon_32x32.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('icon/apple_touch_icon_72x72.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('icon/apple_touch_icon_114x114.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('icon/apple_touch_icon_144x144.png')}}">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">
    <title>FlixGo – Online Movies, TV Shows & Cinema HTML Template</title>

</head>
<body class="body">
    
    <!-- header -->
    <header class="header">
        <div class="header__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="header__content">
                            <!-- header logo -->
                            <a href="{{route('homepage')}}" class="header__logo">
                                <img src="img/logo.svg" alt="">
                            </a>
                            <!-- end header logo -->

                            <!-- header nav -->
                            <ul class="header__nav">
                                <!-- dropdown -->
                                <li class="header__nav-item">
                                    <a class="header__nav-link" href="{{route('homepage')}}" role="button" id="dropdownMenuHome"aria-haspopup="true" aria-expanded="false">Home</a>
                                </li>
                                <!-- end dropdown -->

                                <!-- dropdown -->
                                <li class="header__nav-item">
                                    <a class="header__nav-link" href="{{route('danhmuc')}}" role="button" id="dropdownMenuCatalog" aria-haspopup="true" aria-expanded="false">Catalog</a>
                                </li>
                                <!-- end dropdown -->

                                <li class="header__nav-item">
                                    <a href="pricing.html" class="header__nav-link">Pricing Plan</a>
                                </li>

                                <li class="header__nav-item">
                                    <a href="faq.html" class="header__nav-link">Help</a>
                                </li>
                            </ul>
                            <!-- end header nav -->

                            <!-- header auth -->
                            <div class="header__auth">
                                <button class="header__search-btn" type="button" id="btn_search" >
                                    <i class="icon ion-ios-search"></i>
                                </button>

                                <a href="signin.html" class="header__sign-in">
                                    <i class="icon ion-ios-log-in"></i>
                                    <span>sign in</span>
                                </a>
                            </div>
                            <!-- end header auth -->

                            <!-- header menu btn -->
                            <button class="header__btn" type="button">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                            <!-- end header menu btn -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- header search -->
        <div class="header__search">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="header__search-content">
                            <form action="{{route('tim_kiem')}}" method="GET">
                            <input style="width: 300%" name="search" id="timkiem" type="text" placeholder="Search for a movie....">

                            <button type="submit">search</button>
                        </form>
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
            <ul style="justify-content: center;  list-style: auto;position: fixed; background: #212529; margin-left: 27%; width: 50%" class="list-group" id="result">
                
            </ul>
        
        <!-- end header search -->
    </header>
    <!-- end header -->

    <!-- home -->
    
            @yield('SEASON')
        
    <!-- end home -->

    <!-- content -->
   

    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <!-- footer list -->
                <div class="col-12 col-md-3">
                    <h6 class="footer__title">Download Our App</h6>
                    <ul class="footer__app">
                        <li><a href="#"><img src="img/Download_on_the_App_Store_Badge.svg" alt=""></a></li>
                        <li><a href="#"><img src="img/google-play-badge.png" alt=""></a></li>
                    </ul>
                </div>
                <!-- end footer list -->

                <!-- footer list -->
                <div class="col-6 col-sm-4 col-md-3">
                    <h6 class="footer__title">Resources</h6>
                    <ul class="footer__list">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Pricing Plan</a></li>
                        <li><a href="#">Help</a></li>
                    </ul>
                </div>
                <!-- end footer list -->

                <!-- footer list -->
                <div class="col-6 col-sm-4 col-md-3">
                    <h6 class="footer__title">Legal</h6>
                    <ul class="footer__list">
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Security</a></li>
                    </ul>
                </div>
                <!-- end footer list -->

                <!-- footer list -->
                <div class="col-12 col-sm-4 col-md-3">
                    <h6 class="footer__title">Contact</h6>
                    <ul class="footer__list">
                        <li><a href="tel:+18002345678">+1 (800) 234-5678</a></li>
                        <li><a href="mailto:support@moviego.com">support@flixgo.com</a></li>
                    </ul>
                    <ul class="footer__social">
                        <li class="facebook"><a href="#"><i class="icon ion-logo-facebook"></i></a></li>
                        <li class="instagram"><a href="#"><i class="icon ion-logo-instagram"></i></a></li>
                        <li class="twitter"><a href="#"><i class="icon ion-logo-twitter"></i></a></li>
                        <li class="vk"><a href="#"><i class="icon ion-logo-vk"></i></a></li>
                    </ul>
                </div>
                <!-- end footer list -->

                <!-- footer copyright -->
                <div class="col-12">
                    <div class="footer__copyright">
                        <small><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></small>

                        <ul>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <!-- end footer copyright -->
            </div>
        </div>
    </footer>
    <!-- end footer -->

    <!-- JS -->
    <script src="{{asset('js/jquery_3.3.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/jquery.mousewheel.min.js')}}"></script>
    <script src="{{asset('js/jquery.mCustomScrollbar.min.js')}}"></script>
    <script src="{{asset('js/wNumb.js')}}"></script>
    <script src="{{asset('js/nouislider.min.js')}}"></script>
    <script src="{{asset('js/plyr.min.js')}}"></script>
    <script src="{{asset('js/jquery.morelines.min.js')}}"></script>
    <script src="{{asset('js/photoswipe.min.js')}}"></script>
    <script src="{{asset('js/photoswipe_ui_default.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#timkiem').keyup(function() {
          var searchTerm = $(this).val();
         if(searchTerm!=''){
             $('#result').html('');
            var expression=new RegExp(searchTerm,'i');
            $.getJSON('/json_file/movie.json', function(data) {
             $.each(data, function(key, val) {
                    if(val.title.search(expression) !=-1){
                        $('#result').append('<li style="color:rgba(255,255,255,0.75);margin-left:50px; cursor:pointer" class="list-group-item"><img width:"60" height="60" src="uploads/movie/'+val.image+'">'+val.title+'</li>');
                    }
                });   
            });
         }else{
            $('result').css('display', 'none');
         }
        });
      });
      $('#result').on('click', 'li', function() {

        var click=$(this).text();
        $('#timkiem').val($.trim(click));
        $('#result').html('');
      });
</script>
</body>

</html{{{>