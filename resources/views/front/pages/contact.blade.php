@extends('front.base')

@section('content')
    <header class="hero">
        @include('front.partials.navlist')
        <div id="heart"></div>
        <h1 class="hero-title">Contact & Info</h1>
        {{--<p class="hero-tagline">By Stephanie Joyner, Dietitian</p>--}}
    </header>
    <section class="container contact-details info-detailed">
        <h1 class="section-heading">How to get in touch with me</h1>
        <div class="info-detail">
            <div class="info-icon-box">
                <i class="material-icons smaller">phone</i>
            </div>
            <div class="info-text-box">
                <h2 class="title">Call me, maybe?</h2>
                <div class="divider"></div>
                <p>Hey I just met you, and this is crazy, but here's my number, so call me maybe?</p>
                <p>033 347 0495 / 033 347 0474/ 033 347 0469</p>
            </div>
        </div>
        <div class="info-detail">
            <div class="info-icon-box">
                <i class="material-icons smaller">place</i>
            </div>
            <div class="info-text-box">
                <h2 class="title">Drop in at my office</h2>
                <div class="divider"></div>
                <p>Just be sure to call ahead, I'm often out.</p>
                <p>My address is Unit 13, 3 on Crescent, Cascades, Montrose, Pietermaritzburg</p>
                <div id="map"></div>
            </div>
        </div>
        <div class="info-detail">
            <div class="info-icon-box">
                <i class="material-icons smaller">message</i>
            </div>
            <div class="info-text-box">
                <h2 class="title">Send me a message</h2>
                <div class="divider"></div>
                <p>This is not some huge, faceless corporation. Send me a message, and I'll read it. Probably immediately, definitely as soon as possible. Then, if it's what you want, I'll get back to you.</p>
                <div id="contact-form-container">
                @include('front.partials.contactform')
                </div>
            </div>
        </div>
    </section>
    <section class="alt-section rates-section">
        <h1 class="section-heading">My Rates</h1>
        <div class="container">
            <article class="text-block">
                <p>If you have medical aid funds available, we are able to submit on your behalf for a R50 admin fee. You can also pay cash/card.</p>
                <table>
                    <thead>
                        <tr>
                            <td>Service</td>
                            <td>Rate</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>First consult</td>
                            <td>R520</td>
                        </tr>
                        <tr>
                            <td>First follow up consult</td>
                            <td>R300</td>
                        </tr>
                        <tr>
                            <td>Regular follow up consult</td>
                            <td>R220</td>
                        </tr>
                        <tr>
                            <td>Discovery Vitality Assessment</td>
                            <td>R340</td>
                        </tr>
                    </tbody>
                </table>
            </article>
        </div>
    </section>
    <section class="container hp-section">
        <aside class="cold-hard-fact-wrapper centered">
            <div class="hot-fact">If there is any information you'd like, or any way I may be of help to you, please just let me know. I'm always willing to get involved.</div>
        </aside>
    </section>
    @include('front.partials.footer')
@endsection

@section('bodyscripts')
    <script>
        var contactForm = new AjaxContactForm(document.querySelector('#rs-contact-form'));
        contactForm.init();
    </script>
    <script>
        var map;
        function initMap() {
            var myLat = {lat: -29.571290, lng: 30.357981}
            map = new google.maps.Map(document.getElementById('map'), {
                center: myLat,
                zoom: 15
            });

            var marker = new google.maps.Marker({
                position: myLat,
                map: map,
                title: 'Complete Living'
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA62-rQMl08D23ahoWRT11UF5pjqCa8-Uo&callback=initMap"
            async defer></script>
@endsection