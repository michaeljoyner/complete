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
    <section class="hp-section resources alt-section">
        <div class="container">
            <h1 class="section-heading">Articles, Recipes, Tips and more</h1>
            <div class="half-page text-block resources-left">
                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem eligendi enim error harum inventore
                    magnam perferendis temporibus velit? Autem dolore, dolorum earum esse illo ipsa minus officia
                    possimus
                    praesentium quam!
                </div>
                <div>Adipisci animi corporis culpa cupiditate delectus dignissimos distinctio dolore illo impedit
                    laudantium
                    minus mollitia natus nemo nihil optio quasi quidem quis quod repellat repudiandae sequi sint, soluta
                    sunt tempora voluptatum!
                </div>
                <div class="section-button">browse</div>
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
                    I assist patients in a way that suits their lifestyle,  as I don't believe there is a "one size fits all" solution to health
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