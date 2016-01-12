@extends('front.base')

@section('content')
    <header class="hero">
        @include('front.partials.navlist')
        <div id="heart"></div>
        <h1 class="hero-title">My Services</h1>
        {{--<p class="hero-tagline">By Stephanie Joyner, Dietitian</p>--}}
    </header>
    <section class="info-detailed container">
        <div class="info-detail">
            <div class="info-icon-box">
                <i class="material-icons">face</i>
            </div>
            <div class="info-text-box">
                <h2 class="title">One on One Consults</h2>
                <div class="divider"></div>
                <p>Whether you have a specific medical condition or you just want to improve your physique, health and
                    wellness, an individual consult is the place to start. This will involve going over your medical,
                    family and weight history, a clinical assessment as well as a review of your lifestyle, sleeping
                    patterns and physical activity. If necessary blood tests will be discussed and ordered. A body
                    composition analysis will provide a baseline and allow goals to be set. Follow up’s are vital to
                    ensure sustainability of new behaviours. These sessions are generally shorter than the initial
                    consult and are recommended every two to four weeks, depending in the individual’s
                    circumstances. </p>
            </div>
        </div>
        <div class="info-detail">
            <div class="info-icon-box">
                <i class="material-icons">group</i>
            </div>
            <div class="info-text-box">
                <h2 class="title">Family Consults</h2>
                <div class="divider"></div>
                <p>Want to makes sure the whole family is following the path to health and wellness? Bring in everyone
                    and get a reduced rate. </p>
            </div>
        </div>
        <div class="info-detail">
            <div class="info-icon-box">
                <i class="material-icons">snooze</i>
            </div>
            <div class="info-text-box">
                <h2 class="title">Sleep Apnea Testing</h2>
                <div class="divider"></div>
                <p>Sleep apnea can be a debilitating condition. If you suffer from excessive daytime sleepiness,
                    irritability and mood changes, the inability to concentrate, the inability to stay alert while
                    driving, or your partner has observed you snoring, gasping or stopping breathing while you sleep,
                    you are likely to suffer from sleep apnea. Those with sleep apnea are more likely to suffer from
                    obesity, high blood pressure and diabetes. If you think this is you, come and get tested as soon as
                    possible. There is treatment available for sleep apnea and the sooner you start the sooner you will
                    regain your life.</p>
            </div>
        </div>
        <div class="info-detail">
            <div class="info-icon-box">
                <i class="material-icons">directions_run</i>
            </div>
            <div class="info-text-box">
                <h2 class="title">athletes</h2>
                <div class="divider"></div>
                <p>From weekend warriors to elite athletes, nutrition is a key part of training and competing. It is
                    vital that athletes have a nutrition strategy in place to ensure they train optimally, compete at
                    their peak and recover efficiently, all without the risk of injury or illness. Achieving a certain
                    lean mass to body fat ratio, depending on what your sport is, can play a large role in how you
                    perform and is largely dependent on the food you eat.</p>
            </div>
        </div>
        <div class="info-detail">
            <div class="info-icon-box">
                <i class="material-icons">location_city</i>
            </div>
            <div class="info-text-box">
                <h2 class="title">corporate wellness</h2>
                <div class="divider"></div>
                <p>Companies lose millions each year due to employee illness and absenteeism. A lot of this is due to
                    lifestyle related illnesses that can be improved or prevented by good nutrition and lifestyle
                    changes. Staff wellness days, where staff are provided with individual consults and group
                    information sessions should be a regular part of your year calendar to ensure necessary changes are
                    implemented and maintained. This also provides the opportunity for companies using Discovery
                    Vitality to obtain points for their staff. A healthy work force is a happy and efficient
                    work-force!</p>
            </div>
        </div>
        <div class="info-detail">
            <div class="info-icon-box">
                <i class="material-icons">local_pizza</i>
            </div>
            <div class="info-text-box">
                <h2 class="title">Eating Disorders treatment and prevention</h2>
                <div class="divider"></div>
                <p>Eating disorder prevalence is on the rise, especially in high school age females. This is a delicate
                    and complicated condition and the correct intervention and treatment should be provided within 18
                    months of onset for a better chance of recovery. Parents and teachers alike should be aware of signs
                    to look out for in their child or students and be informed of the correct steps to take when
                    addressing the situation. School counsellors are important role players and should be aware of the
                    latest research on the treatment of eating disorders. Finally, adolescents themselves should be
                    informed on healthy and unhealthy eating behaviours.
                    This condition requires someone with the practical experience needed in successfully managing this
                    type of patient. Having worked with numerous eating disorder patients at various rehabilitation
                    centres, and having a team of experts on hand to assist with these patients, help is at hand. Get in
                    touch to organise group talks with pupils/staff/parents or for individual consults with eating
                    disorder sufferers.</p>
            </div>
        </div>
    </section>
    @include('front.partials.footer')
@endsection