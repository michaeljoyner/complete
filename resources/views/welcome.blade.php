<!DOCTYPE html>
<html>
    <head>
        <title>Complete Living</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Merriweather+Sans:800' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        {{--<link rel="stylesheet" href="{{ elixir('css/app.css') }}">--}}
        <style>
            html {
                box-sizing: border-box;
            }
            *, *:before, *:after {
                box-sizing: inherit;
            }
            body {
                padding: 0;
                margin: 0;
            }
            .hero-section {
                background: #1D976C; /* fallback for old browsers */
                background: -webkit-linear-gradient(to left, #1D976C , #93F9B9); /* Chrome 10-25, Safari 5.1-6 */
                background: linear-gradient(to left, #1D976C , #93F9B9); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                min-height: 400px;
                width: 100%;
                padding: 50px;
                padding-top: 0;
            }

            .hero-title {
                font-family: 'Merriweather Sans', sans-serif;
                font-size: 100px;
                font-weight: 800;
                padding: 0;
                color: #fff;
                text-align: right;
                margin-bottom: 10px;
            }

            .hero-tagline {
                font-size: 200%;
                color: #fff;
                font-family: 'Lato', sans-serif;
                text-align: right;
                margin-top: 5px;
            }

            .main-nav {
                width: 100%;
                padding: 0;
                margin: 0;
            }

            .main-nav ul {
                list-style-type: none;
                text-align: right;
                color: #fff;
                padding: 0;
                margin: 0;
            }

            .main-nav ul li {
                display: inline-block;
                padding: 10px;
                margin: 0 20px;
                text-transform: capitalize;
                font-family: 'Lato', sans-serif;
                font-weight: 300;
                cursor: pointer;
            }

            .section-heading {
                color: #15ae55;
                text-align: center;
                font-family: 'Merriweather Sans', sans-serif;
                font-size: 36px;
            }

            .service-box {
                width: 28%;
                margin: 20px;
                /*border: 3px solid #15ae55;*/
                font-family:'Lato', sans-serif;
                display: inline-block;
                padding: 0 15px 10px;
            }

            .service-title {
                text-transform: uppercase;
                text-align: center;
            }

            .service-icon-holder {
                text-align: center;
                color: #15ae55;
            }

            .service-icon-holder i {
                font-size: 38px;
            }

            section {
                max-width: 970px;
                margin: 0 auto;
            }
            #heart {
                position: absolute;
                width: 300px;
                height: 270px;
                top: 100px;
                left: 100px;
            }
            #heart:hover {
                animation: heartBeat 2s 0s infinite;
            }
            #heart:before,
            #heart:after {
                position: absolute;
                content: "";
                left: 150px;
                top: 0;
                width: 150px;
                height: 240px;
                background: #1E976C;
                -moz-border-radius: 150px 150px 0 0;
                border-radius: 150px 150px 0 0;
                -webkit-transform: rotate(-45deg);
                -moz-transform: rotate(-45deg);
                -ms-transform: rotate(-45deg);
                -o-transform: rotate(-45deg);
                transform: rotate(-45deg);
                -webkit-transform-origin: 0 100%;
                -moz-transform-origin: 0 100%;
                -ms-transform-origin: 0 100%;
                -o-transform-origin: 0 100%;
                transform-origin: 0 100%;
            }
            #heart:after {
                left: 0;
                -webkit-transform: rotate(45deg);
                -moz-transform: rotate(45deg);
                -ms-transform: rotate(45deg);
                -o-transform: rotate(45deg);
                transform: rotate(45deg);
                -webkit-transform-origin: 100% 100%;
                -moz-transform-origin: 100% 100%;
                -ms-transform-origin: 100% 100%;
                -o-transform-origin: 100% 100%;
                transform-origin :100% 100%;
            }

            @-webkit-keyframes heartBeat {
                O% {-webkit-transform: scale(1);}
                10% {-webkit-transform: scale(1.1);}
                20% {-webkit-transform: scale(1);}
                70% {-webkit-transform: scale(1);}
                20% {-webkit-transform: scale(1.1);}
                20% {-webkit-transform: scale(1);}
            }

            @keyframes heartBeat {
                O% {transform: scale(1);}
                10% {transform: scale(1.1);}
                20% {transform: scale(1);}
                70% {transform: scale(1);}
                20% {transform: scale(1.1);}
                20% {transform: scale(1);}
            }

            .half-page {
                width: 49%;
                display: inline-block;
                vertical-align: top;
            }
            .services-left {
                padding: 0 50px 50px 0;
                -webkit-perspective: 1000px;
                position: relative;
            }
            .service-card {
                width: 150px;
                height: 150px;
                display: inline-block;
                margin: 1px;
                border: 2px solid #15ae55;
                vertical-align: top;

            }
            .service-card .service-title {
                font-family: 'Lato', sans-serif;
                color: #333;
            }
            .service-card-outer-wrapper {
                /*-webkit-perspective: 1000px;*/
            }
            .service-card-holder {
                transition: 1s;
                transform: rotateX(45deg) rotateY(27deg) rotateZ(-53deg) translateZ(-277px);
                transform-origin: 22% -10%;
                position: absolute;
                /*left: -100px;*/
                /*top: 50px;*/
            }

            .service-card-holder:hover {
                transform: rotateX(0) rotateY(0) rotateZ(0);
            }
            .services-right {
                padding: 50px 0 50px 50px;
                font-family: 'Lato', sans-serif;
                font-size: 120%;
                color: #333;
            }
            .services2 {
                padding-bottom: 200px;
            }

            .section-button {
                background: #15ae55;
                color: #fff;
                font-family: 'Lato', sans-serif;
                text-transform: uppercase;
                padding: 8px 16px;
                cursor: pointer;
                width: auto;
                display: inline-block;
                margin-top: 50px;
            }
        </style>
    </head>
    <body>
        <header class="hero-section">
            <nav class="main-nav">
                <ul>
                    <li>Articles</li>
                    <li>Recipes</li>
                    <li>Contact Me</li>
                </ul>
            </nav>
            <div id="heart"></div>
            <h1 class="hero-title">Complete Living</h1>
            <p class="hero-tagline">By Stephanie Joyner, Dietitian</p>
        </header>
    {{--<section class="services">--}}
        {{--<h1 class="section-heading">Services</h1>--}}
        {{--<div class="service-box">--}}
            {{--<p class="service-icon-holder">--}}
                {{--<i class="material-icons">face</i>--}}
            {{--</p>--}}
            {{--<h3 class="service-title">One on One Consults</h3>--}}
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus, asperiores aspernatur at beatae eaque earum facere fugit.</p>--}}
        {{--</div>--}}
        {{--<div class="service-box">--}}
            {{--<p class="service-icon-holder">--}}
                {{--<i class="material-icons">group</i>--}}
            {{--</p>--}}
            {{--<h3 class="service-title">Family Consults</h3>--}}
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus, asperiores aspernatur at beatae eaque earum facere fugit.</p>--}}
        {{--</div>--}}
        {{--<div class="service-box">--}}
            {{--<p class="service-icon-holder">--}}
                {{--<i class="material-icons">snooze</i>--}}
            {{--</p>--}}
            {{--<h3 class="service-title">Sleep Apnea Testing</h3>--}}
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus, asperiores aspernatur at beatae eaque earum facere fugit.</p>--}}
        {{--</div>--}}
        {{--<div class="service-box">--}}
            {{--<p class="service-icon-holder">--}}
                {{--<i class="material-icons">directions_run</i>--}}
            {{--</p>--}}
            {{--<h3 class="service-title">Athletes</h3>--}}
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus, asperiores aspernatur at beatae eaque earum facere fugit.</p>--}}
        {{--</div>--}}
        {{--<div class="service-box">--}}
            {{--<p class="service-icon-holder">--}}
                {{--<i class="material-icons">location_city</i>--}}
            {{--</p>--}}
            {{--<h3 class="service-title">Corporate Wellness</h3>--}}
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus, asperiores aspernatur at beatae eaque earum facere fugit.</p>--}}
        {{--</div>--}}
        {{--<div class="service-box">--}}
            {{--<p class="service-icon-holder">--}}
                {{--<i class="material-icons">local_pizza</i>--}}
            {{--</p>--}}
            {{--<h3 class="service-title">Eating Disorders</h3>--}}
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus, asperiores aspernatur at beatae eaque earum facere fugit.</p>--}}
        {{--</div>--}}
    {{--</section>--}}
    <section class="services2">
        <h1 class="section-heading">Services</h1>
        <div class="half-page services-left">
            <div class="service-card-holder">
            <div class="service-card">
                <p class="service-icon-holder">
                    <i class="material-icons">face</i>
                </p>
                <h3 class="service-title">One on One Consults</h3>
            </div>
            <div class="service-card">
                <p class="service-icon-holder">
                    <i class="material-icons">group</i>
                </p>
                <h3 class="service-title">Family Consults</h3>
            </div>
            <div class="service-card">
                <p class="service-icon-holder">
                    <i class="material-icons">snooze</i>
                </p>
                <h3 class="service-title">Sleep Apnea Testing</h3>
            </div>
            <div class="service-card">
                <p class="service-icon-holder">
                    <i class="material-icons">directions_run</i>
                </p>
                <h3 class="service-title">Athletes</h3>
            </div>
            <div class="service-card">
                <p class="service-icon-holder">
                    <i class="material-icons">location_city</i>
                </p>
                <h3 class="service-title">Corporate Wellness</h3>
            </div>
            <div class="service-card">
                <p class="service-icon-holder">
                    <i class="material-icons">local_pizza</i>
                </p>
                <h3 class="service-title">Eating Disorders</h3>
            </div>
            </div>
        </div>
        <div class="half-page services-right">
            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem eligendi enim error harum inventore
                magnam perferendis temporibus velit? Autem dolore, dolorum earum esse illo ipsa minus officia possimus
                praesentium quam!
            </div>
            <div>Adipisci animi corporis culpa cupiditate delectus dignissimos distinctio dolore illo impedit laudantium
                minus mollitia natus nemo nihil optio quasi quidem quis quod repellat repudiandae sequi sint, soluta
                sunt tempora voluptatum!
            </div>
            <div class="section-button">learn more</div>
        </div>
    </section>
    </body>
</html>
