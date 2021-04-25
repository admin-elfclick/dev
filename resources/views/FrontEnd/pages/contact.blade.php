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
<!-- contact -->
<div id="contact" class="contact cd-section">
    <div class="container">

        <h3 class="w3ls-title">Contact us</h3>
        <p class="w3lsorder-text">
            @isset($siteInfo->description)
            {{ $siteInfo->description  }}
            @endisset
        </p>
        {{-- message--}}

        @if(Session::has('message'))
            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('message') }}</strong>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        {{-- end message--}}
        <div class="contact-row agileits-w3layouts">
            <div class="col-xs-6 col-sm-6 contact-w3lsleft">
                <div class="contact-grid agileits">
                    <h4>DROP US A LINE </h4>
                    <form action="{{ route('customer_message') }}" method="post">
                        @csrf
                        <input type="text" name="name" placeholder="Name" required="">
                        <input type="email" name="email" placeholder="Email" required="">
                        <input type="text" name="number" placeholder="Phone Number" required="">
                        <textarea name="message" placeholder="Message..." required=""></textarea>
                        <input type="submit" value="Submit" >
                    </form>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 contact-w3lsright">
                <h6>
                    @isset($siteInfo->title)
                        {{ $siteInfo->title  }}
                    @endisset

                </h6>

                <div class="address-row w3-agileits">
                    <div class="col-xs-10 address-right">
                        <h5>Mail Us</h5>
                        @isset($siteInfo->email)

                        <p><a href="mailto:{{ $siteInfo->email }}"> {{ $siteInfo->email }}</a></p>
                        @endisset
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="address-row">

                    <div class="col-xs-10 address-right form-inline">
                        <h5>Call Us</h5>
                        @isset($siteInfo->phone_number)
                        <p>{{ $siteInfo->phone_number }}</p>
                        @endisset

                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- map -->
    <div class="map agileits">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.948805392833!2d-73.99619098458929!3d40.71914347933105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a27e2f24131%3A0x64ffc98d24069f02!2sCANADA!5e0!3m2!1sen!2sin!4v1479793484055"></iframe>
    </div>
    <!-- //map -->
</div>
<!-- //contact -->

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
