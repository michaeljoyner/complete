<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $post->title }}</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Merriweather+Sans:800' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Bitter:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
            position: relative;
        }

        .secondary-nav {
            position: absolute;
            top: -60px;
            width: 100%;
            height: 260px;
            padding: 10px 100px;
            background: #1D976C; /* fallback for old browsers */
            background: -webkit-linear-gradient(to left, #1D976C , #93F9B9); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to left, #1D976C , #93F9B9); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            z-index: -10;
        }

        .secondary-nav .branding {
            font-family: 'Merriweather Sans', sans-serif;
            display: inline-block;
            font-size: 24px;
            color: #1D7140;
        }

        .secondary-nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            font-family: 'Lato', sans-serif;
            display: inline-block;
            float: right;
        }

        .secondary-nav ul li {
            display: inline-block;
            color: #fff;
            font-size: 24px;
            margin: 0 10px;
        }

        article.article {
            max-width: 950px;
            width: 95%;
            margin: 0 auto;
            box-shadow: 3px 3px 5px rgba(0,0,0,.4);
            margin-top: 60px;
            background: white;
            padding: 20px 75px;
        }

        .article header {
            min-height: 180px;
            clear: both;
            position: relative;
        }

        .article header .title {
            margin: 0;
            font-family: 'Bitter', serif;
            font-size: 36px;
            color: #333;
            padding-bottom: 90px;
        }

        header .metadata {
            font-family: 'Lato', sans-serif;
            position: absolute;
            bottom: 15px;
            width: 100%;
        }

        .article header hr {
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        .metadata .author {
            float: left;
        }

        .metadata .published {
            float: right;
            color: #15ae55;
            margin: 1em;
        }

        .metadata .published span {
            vertical-align: super;
        }

        .post-body {
            font-size: 1.25em;
            line-height: 1.6;
            font-family: 'Lato', sans-serif;
            color: #3f3f3f;
        }
        .sharing {
            text-align: center;
        }
        .sharing .fa {
            background: #15ae55;
            color:  #fff;
            font-size: 1.75em;
            line-height: 50px;
            min-width: 50px;
            min-height: 50px;
            border-radius: 50%;
            margin: 40px 10px;
        }
    </style>
</head>
<body>
    <nav class="secondary-nav">
        <div class="branding">Complete Living</div>
        <ul>
            <li>Home</li>
            <li>Recipes</li>
            <li>Contact</li>
        </ul>
    </nav>
    <article class="article">
        <header>
            <h1 class="title">{{ $post->title }}</h1>
            <div class="metadata">
                <p class="author">Steph Joyner</p>
                <div class="published">
                    <i class="material-icons">event</i>
                    <span>{{ $post->published_at->toFormattedDateString() }}</span>
                </div>
            </div>
            <hr>
        </header>
        <section class="post-body">
            {!! $post->body !!}
        </section>
        <footer>
            <div class="sharing">
                <i class="fa fa-facebook"></i>
                <i class="fa fa-google-plus"></i>
                <i class="fa fa-twitter"></i>
            </div>
        </footer>
    </article>
</body>
</html>