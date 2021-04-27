<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Under Construction</title>
    <style>
        body {
            background: #282e3a;
            background-color: #282e3a;
        }

        h1 {
            color: #fff;
            text-align: center;
            font-size: 1.5rem;
        }

        p {
            text-align: center;
            color: #fff;
        }

        .Logo__Div {
            width: 100%;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .Logo__Div>img {
            width: 30%;
        }

        #geeks-countdown {
            width: 850px;
            margin: 10% auto;
        }

        #clock span {
            float: left;
            text-align: center;
            font-size: 84px;
            margin: 0 2.5%;
            color: #fff;
            padding: 20px;
            width: 20%;
            border-radius: 20px;
            box-sizing: border-box;
        }

        #clock:after {
            content: "";
            display: block;
            clear: both;
        }

        #units span {
            float: left;
            width: 25%;
            text-align: center;
            margin-top: 30px;
            color: #ddd;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 2px;

        }

        span.turn {
            animation: turn 1s ease forwards;
        }

        @keyframes turn {
            0% {
                transform: rotateY(360deg)
            }

            100% {
                transform: rotateY(0deg)
            }
        }
    </style>
</head>

<body>
    <div id="geeks-countdown">
        <div class="Logo__Div">
            <img src="https://firebasestorage.googleapis.com/v0/b/elfclicks-6f3b2.appspot.com/o/Logo.png?alt=media&token=c4a81cdb-73e7-4a20-bf85-6e37aa7ed38e" alt="">
        </div>
        <h1>Our Website is under Construction!</h1>
        <p>We will be coming soon</p>
        <hr>
        <div id="clock"></div>
        <div id="units">
            <span>Days</span>
            <span>Hours</span>
            <span>Minutes</span>
            <span>Seconds</span>
        </div>
    </div>
    <script>
        function updateTimer(deadline) {
            var time = deadline - new Date();
            return {
                'days': Math.floor(time / (1000 * 60 * 60 * 24)),
                'hours': Math.floor((time / (1000 * 60 * 60)) % 24),
                'minutes': Math.floor((time / 1000 / 60) % 60),
                'seconds': Math.floor((time / 1000) % 60),
                'total': time
            };
        }


        function animateClock(span) {
            span.className = "turn";
            setTimeout(function() {
                span.className = "";
            }, 700);
        }

        function startTimer(id, deadline) {
            var timerInterval = setInterval(function() {
                var clock = document.getElementById(id);
                var timer = updateTimer(deadline);

                clock.innerHTML = '<span>' + timer.days + '</span>' +
                    '<span>' + timer.hours + '</span>' +
                    '<span>' + timer.minutes + '</span>' +
                    '<span>' + timer.seconds + '</span>';

                //animations
                var spans = clock.getElementsByTagName("span");
                animateClock(spans[3]);
                if (timer.seconds == 59) animateClock(spans[2]);
                if (timer.minutes == 59 && timer.seconds == 59) animateClock(spans[1]);
                if (timer.hours == 23 && timer.minutes == 59 && timer.seconds == 59) animateClock(spans[0]);

                //check for end of timer
                if (timer.total < 1) {
                    clearInterval(timerInterval);
                    clock.innerHTML = '<span>0</span><span>0</span><span>0</span><span>0</span>';
                }


            }, 1000);
        }


        window.onload = function() {
            var deadline = new Date("April 30, 2021 12:00:00");
            startTimer("clock", deadline);
        };
    </script>
</body>

</html>