@extends('front.base')

@section('content')
    <header class="hero">
        @include('front.partials.navlist')
        <div id="heart"></div>
        <h1 class="hero-title">Complete Living</h1>
        <p class="hero-tagline">Stephanie Joyner, Consulting Dietitian</p>
    </header>
    <section class="hp-section services container">
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
        <div class="half-page services-right text-block">
            <p>I offer a variety of services, from one-on-one consults, group or family consults, sleep apnea testing,
                group talks and corporate wellness programmes.</p>
            <p>One-on-one consults are around an hour which allows me to gather the information I need to develop a plan
                that will be targeted to your needs and lifestyle. Family consults ensure sustainability as the whole
                family is working together to reach their health goals. Group talks can be targeted at a variety of
                audiences: sports clubs, work colleagues or school children for example.</p>
            <p>Sleep apnea testing is an extra service I offer to general medical practitioners and specialist doctors
                who want clarification of whether their patient suffers from this condition or not. If you are not sure
                what it is you are looking for, send me a message and I’ll be happy to help out.</p>
            <div class="section-button"><a href="/services">learn more</a></div>
        </div>
    </section>
    <section class="hp-section resources alt-section">
        <div class="container">
            <h1 class="section-heading">Articles, Recipes, Tips and more</h1>
            <div class="half-page text-block resources-left">
                <p>Julia Child said: “The only time to eat diet food is when you are waiting for the steak to cook”. I
                    couldn’t agree more. Food is an important part of our lives and should be enjoyed. To me, there is
                    nothing more satisfying than sitting down to a delicious meal that I have prepared with carefully
                    thought out ingredients, and I assure you that eating healthily or losing weight should not equate
                    to eating boring or bland meals. You can trust me on that.</p>
                <p>There is so much conflicting health-related information available out there it is easy to become
                    confused. Should you eat wheat or not? Should you be including dairy or excluding it? Should you try
                    this new weight loss miracle fruit? I strive to separate the information from the misinformation
                    with my articles, and to give you take-home information that you can easily implement in your day to
                    day life.</p>
                <div class="section-button"><a href="/blog">browse</a></div>
            </div>
            <div class="half-page resources-right">
                <img class="screen-shot" src="/images/assets/recipe.png" alt="screenshot">
                <img class="screen-shot iphone" src="/images/assets/iphone.png" alt="screenshot">
            </div>
        </div>
    </section>
    <section class="hp-section about-me container">
        <h1 class="section-heading">All About Me</h1>
        <div class="half-page">
            <aside class="cold-hard-fact-wrapper">
                <div class="hot-fact">
                    I'm a registered dietitian, with a Master's degree.
                </div>
            </aside>
            <aside class="cold-hard-fact-wrapper">
                <div class="hot-fact">
                    I am passionate about working with people to reach their health goals
                </div>
            </aside>
            <aside class="cold-hard-fact-wrapper">
                <div class="hot-fact">
                    I assist patients in a way that suits their lifestyle, as I don't believe there is a "one size fits
                    all" solution to health
                </div>
            </aside>
            <aside class="cold-hard-fact-wrapper">
                <div class="hot-fact">
                    I research the science and put it into practical and sustainable solutions for my patients
                </div>
            </aside>
        </div>
        <div class="half-page text-block">
            <p>I am a qualified dietician with a Masters degree from the University of Kwa-Zulu Natal but my focus is
                very much on holistic health. Nutrition is just one piece (albeit an important one) of a large puzzle
                which is our health, happiness and wellness. My priority is to help patients in getting all their puzzle
                pieces into place. I am lucky to have a network of highly qualified and competent colleagues to refer my
                patients to when needed.</p>
            <p>The word “diet” is a filthy four-lettered word. If someone asks for a diet, my goal is to help them
                change their outlook and see food as something that can be both nourishing and enjoyable. When they
                understand that their health and aesthetic goals can be reached without needing to use food as a
                punishment/reward tool, they leave as happier and healthier people.</p>
            <p>My other passion is long-distance running and in 2016 I will attempt to finish my 6th Comrades Marathon.
                I have been running for 12 years now and this has led to a keen interest and much research into the
                field of sports nutrition for endurance sports. I feel the benefit every day and in every facet of my
                life of my holistic approach to healthy eating, and I would love to help you find that perfect path.</p>
        </div>
    </section>
    @include('front.partials.footer')
@endsection