<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Custom Theme files -->
    <link href="{{ asset('Front') }}/contact/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="{{ asset('Front') }}/contact/style.css" type="text/css" rel="stylesheet" media="all">
    <link href="{{ asset('Front') }}/contact/font-awesome.css" rel="stylesheet"> <!-- font-awesome icons -->
    <!-- //Custom Theme files -->
    <!-- js -->
    <script src="{{ asset('Front') }}/contact/jquery-2.2.3.min.js"></script>
    <!-- //js -->
    <!-- web-fonts -->
    <link href="//fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Yantramanav:100,300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"  />
    <!-- //web-fonts -->
</head>
<body>

<!-- breadcrumb -->
@php
    $siteInfo = \App\Models\SiteInfo::first();
@endphp

<div class="container">
    <ol class="breadcrumb w3l-crumbs">
        <li>
            <a href="{{ url('/') }}">
                @isset($siteInfo->logo)

                <img src="{{ asset("Back/images/logo/".$siteInfo->logo) }}" alt="Logo" width="120px">
                @endisset
            </a>
        </li>
        <li><a href="{{ url('/') }}"> Home</a></li>
        <li class="active">Contact Us</li>
    </ol>
</div>
<!-- //breadcrumb -->

<!--  about-page -->
<div class="about">
    <div class="container">
        <h3 class="w3ls-title w3ls-title1">About Us</h3>
        <div class="about-text">
            <p>
                @isset($siteInfo->description)
                {{ $siteInfo->description }}
                @endisset
            </p>
            <div class="ftr-toprow">
                <div class="col-md-4 ftr-top-grids">
                    <div class="ftr-top-left">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                    </div>
                    <div class="ftr-top-right">
                        <h4>Fusce tempus</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus justo ac </p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="col-md-4 ftr-top-grids">
                    <div class="ftr-top-left">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <div class="ftr-top-right">
                        <h4>Consectetur</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus justo ac </p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="col-md-4 ftr-top-grids">
                    <div class="ftr-top-left">
                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                    </div>
                    <div class="ftr-top-right">
                        <h4>Dolor siet</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus justo ac </p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="history">
            <h3 class="w3ls-title">How does it work ?</h3>
            <p>Etiam faucibus viverra libero vel efficitur. Ut semper nisl ut laoreet ultrices. Maecenas dictum arcu purus, sit amet volutpat purus viverra sit amet. Quisque lacinia quam sed tortor interdum, malesuada congue nunc ornare. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In semper lorem eget tortor pulvinar ultricies. Nulla sodales efficitur consequat. Maecenas mi diam, imperdiet consectetur ultricies nec, convallis sit amet turpis.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempor vehicula ipsum nec ultrices. Pellentesque sed feugiat sapien.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempor vehicula ipsum nec ultrices. Pellentesque sed feugiat sapien.  ullamcorper nunc. Aenean eget massa orci. Vivamus vulputate elit at rutrum elementum. Duis sit amet posuere justo, sit amet finibus urna. Aenean elementum diam nec laoreet sodales. Morbi vulputate tempor nisl nec tristique.</p>
            <h3 class="w3ls-title">Our history</h3>
            <p>Etiam faucibus viverra libero vel efficitur. Ut semper nisl ut laoreet ultrices. Maecenas dictum arcu purus, sit amet volutpat purus viverra sit amet. Quisque lacinia quam sed tortor interdum, malesuada congue nunc ornare. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In semper lorem eget tortor pulvinar ultricies. Nulla sodales efficitur consequat. Maecenas mi diam, imperdiet consectetur ultricies nec, convallis sit amet turpis.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempor vehicula ipsum nec ultrices. Pellentesque sed feugiat sapien.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempor vehicula ipsum nec ultrices. Pellentesque sed feugiat sapien.  ullamcorper nunc. Aenean eget massa orci. Vivamus vulputate elit at rutrum elementum. Duis sit amet posuere justo, sit amet finibus urna. Aenean elementum diam nec laoreet sodales. Morbi vulputate tempor nisl nec tristique.</p>
        </div>
    </div>
</div>
<!-- //about-page -->

<!-- footer -->

<div class="copyw3-agile">
    <div class="container">
        <p>Copyright &copy; {{ now()->year }} ELF-CLICK.COM. All Rights Reserved | Developed by <a href="https://www.youtube.com/channel/UCE5ytZAJ6_DL0SUdrjDIquQ" title="With Us Buddy">WUB</a></p>
    </div>
</div>
<!-- //footer -->

<!-- start-smooth-scrolling -->
<script src="{{ asset('Front') }}/contact/SmoothScroll.min.js"></script>
<script type="text/javascript" src="{{ asset('Front') }}/contact/move-top.js"></script>
<script type="text/javascript" src="{{ asset('Front') }}/contact/easing.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){
            event.preventDefault();

            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
<!-- //end-smooth-scrolling -->
<!-- smooth-scrolling-of-move-up -->
<script type="text/javascript">
    $(document).ready(function() {
        /*
        var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
        };
        */

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<!-- //smooth-scrolling-of-move-up -->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('Front') }}/contact/bootstrap.js"></script>
</body>
</html>
