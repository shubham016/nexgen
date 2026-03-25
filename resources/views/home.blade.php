@extends('layouts.app')

@section('title', 'NEX GEN - Complete Security Camera Solutions')

@section('content')

<!-- Hero Section -->
<section class="hero" id="home">
    <div class="hbg"></div>
    <div class="cn">
        <div class="hg">
            <div>
                <div class="hsub">Advanced Security Solutions</div>
                <h1 class="htl">
                    Professional <b>CCTV</b> Camera & Security System
                </h1>
                <p class="hd">
                    We provide comprehensive CCTV surveillance and security solutions
                    for homes, offices, and businesses. Keep your property safe with
                    state-of-the-art monitoring.
                </p>
                <div class="hbt">
                    <a href="#services" class="btn btn-o">Our Services <i class="fas fa-arrow-right"></i></a>
                    <a href="#contact" class="btn btn-ol">Free Consultation <i class="fas fa-phone-alt"></i></a>
                </div>
            </div>
            <div class="hv">
                <div class="cc">
                    <div class="cg">
                        <div class="cp">
                            <div class="scl">
                                <video autoplay muted loop playsinline>
                                    <source src="{{ asset('videos/cctv_footage.mp4') }}" type="video/mp4" />
                                </video>
                            </div>
                            <span class="cml">cam 01 - front gate</span>
                            <span class="cdt"></span>
                        </div>
                        <div class="cp">
                            <div class="scl" style="animation-delay: 1s">
                                <video autoplay muted loop playsinline>
                                    <source src="{{ asset('videos/cctv_footage.mp4') }}" type="video/mp4" />
                                </video>
                            </div>
                            <span class="cml">cam 02 - parking</span>
                            <span class="cdt"></span>
                        </div>
                        <div class="cp">
                            <div class="scl" style="animation-delay: 2s">
                                <video autoplay muted loop playsinline>
                                    <source src="{{ asset('videos/cctv_footage.mp4') }}" type="video/mp4" />
                                </video>
                            </div>
                            <span class="cml">cam 03 - back door</span>
                            <span class="cdt"></span>
                        </div>
                        <div class="cp">
                            <div class="scl" style="animation-delay: 3s">
                                <video autoplay muted loop playsinline>
                                    <source src="{{ asset('videos/cctv_footage.mp4') }}" type="video/mp4" />
                                </video>
                            </div>
                            <span class="cml">cam 04 - rooftop</span>
                            <span class="cdt"></span>
                        </div>
                    </div>
                    <div class="cmb">
                        <div class="cms">
                            <i class="fas fa-circle" style="font-size: 0.5rem"></i> All Systems Online
                        </div>
                        <div class="cmt" id="hTime">00:00:00</div>
                    </div>
                </div>
                <div class="hfl f1">
                    <div class="fic fb1"><i class="fas fa-shield-halved"></i></div>
                    <div>
                        <div class="ftx">100% Secured</div>
                        <div class="fsx">End-to-end encryption</div>
                    </div>
                </div>
                <div class="hfl f2">
                    <div class="fic fo1"><i class="fas fa-bolt"></i></div>
                    <div>
                        <div class="ftx">AI Powered</div>
                        <div class="fsx">Smart detection</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Info Strip -->
<div class="istr">
    <div class="cn" style="padding: 0">
        <div class="igr">
            <div class="iit">
                <div class="iico"><i class="fas fa-headset"></i></div>
                <div class="iitx">
                    <h4>24/7 Support</h4>
                    <p>Round the clock help</p>
                </div>
            </div>
            <div class="iit">
                <div class="iico"><i class="fas fa-tools"></i></div>
                <div class="iitx">
                    <h4>Expert Installation</h4>
                    <p>Certified technicians</p>
                </div>
            </div>
            <div class="iit">
                <div class="iico"><i class="fas fa-dollar-sign"></i></div>
                <div class="iitx">
                    <h4>Best Pricing</h4>
                    <p>Competitive rates</p>
                </div>
            </div>
            <div class="iit">
                <div class="iico"><i class="fas fa-certificate"></i></div>
                <div class="iitx">
                    <h4>2 Year Warranty</h4>
                    <p>Full product warranty</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- About Section -->
<section class="about" id="about">
    <div class="cn">
        <div class="abg">
            <div class="abi rv">
                <div class="abm"><i class="fas fa-video"></i></div>
                <div class="abs2"><i class="fas fa-shield-halved"></i></div>
                <div class="exb">
                    <div class="en">15+</div>
                    <div class="el">Years<br />Experience</div>
                </div>
            </div>
            <div class="abc rv">
                <div class="ssub">About CCTV Pro</div>
                <h2 class="stt">We Provide The Best CCTV Security Service</h2>
                <p class="abt">
                    CCTV Pro is a leading provider of security camera systems and
                    surveillance solutions. We specialize in designing, installing,
                    and maintaining security systems for residential, commercial, and
                    industrial properties.
                </p>
                <p class="abt">
                    Our certified technicians bring over 15 years of experience,
                    ensuring every installation meets the highest quality standards.
                </p>
                <div class="abf">
                    <div class="afi"><i class="fas fa-check"></i> HD & 4K Cameras</div>
                    <div class="afi"><i class="fas fa-check"></i> Night Vision</div>
                    <div class="afi"><i class="fas fa-check"></i> Remote Monitoring</div>
                    <div class="afi"><i class="fas fa-check"></i> Cloud Storage</div>
                    <div class="afi"><i class="fas fa-check"></i> Motion Detection</div>
                    <div class="afi"><i class="fas fa-check"></i> Free Site Survey</div>
                </div>
                <a href="#services" class="btn btn-p">Discover More <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="svc" id="services">
    <div class="cn">
        <div class="sh rv">
            <div class="ssub">What We Offer</div>
            <h2 class="stt">Our Professional Services</h2>
            <div class="sln"></div>
        </div>
        <div class="svg2">
            <div class="scard rv">
                <div class="siw"><i class="fas fa-video"></i></div>
                <h3>CCTV Installation</h3>
                <p>Professional installation of IP, analog, and wireless camera systems with strategic placement.</p>
                <a href="#" class="slnk">Read More <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="scard rv">
                <div class="siw"><i class="fas fa-desktop"></i></div>
                <h3>Live Monitoring</h3>
                <p>24/7 real-time surveillance with AI-powered alerts and instant notifications.</p>
                <a href="#" class="slnk">Read More <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="scard rv">
                <div class="siw"><i class="fas fa-cloud"></i></div>
                <h3>Cloud Recording</h3>
                <p>Secure cloud-based video storage with access from anywhere in the world.</p>
                <a href="#" class="slnk">Read More <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="scard rv">
                <div class="siw"><i class="fas fa-door-open"></i></div>
                <h3>Access Control</h3>
                <p>Smart locks, biometric systems, and keycard access integrated with cameras.</p>
                <a href="#" class="slnk">Read More <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="scard rv">
                <div class="siw"><i class="fas fa-bell"></i></div>
                <h3>Alarm Systems</h3>
                <p>Intrusion detection, fire alarm, and smoke sensors linked to centers.</p>
                <a href="#" class="slnk">Read More <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="scard rv">
                <div class="siw"><i class="fas fa-wrench"></i></div>
                <h3>AMC & Maintenance</h3>
                <p>Annual contracts with inspections, firmware updates, and priority support.</p>
                <a href="#" class="slnk">Read More <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
<section class="prod" id="products">
    <div class="cn">
        <div class="sh rv">
            <div class="ssub">Our Products</div>
            <h2 class="stt">Featured Security Products</h2>
            <div class="sln"></div>
        </div>
        <div class="prgd">
            @include('partials.product-card', [
                'image' => asset('images/camera/4.jpg.jpeg'),
                'badge' => 'Hot',
                'badgeClass' => 'pbh',
                'category' => 'Outdoor Camera',
                'name' => 'Bullet Camera IR Night Vision',
                'rating' => 4.5,
                'reviews' => 128,
                'price' => 'Rs 249',
                'oldPrice' => 'Rs 329'
            ])
            @include('partials.product-card', [
                'image' => asset('images/camera/5.jpg.jpeg'),
                'badge' => 'New',
                'badgeClass' => 'pbn',
                'category' => 'Outdoor Camera',
                'name' => 'Bullet Camera 8MP IP67 Weatherproof',
                'rating' => 5,
                'reviews' => 256,
                'price' => 'Rs 1,499',
                'oldPrice' => 'Rs 2,199'
            ])
            @include('partials.product-card', [
                'image' => asset('images/camera/9.jpg.jpeg'),
                'badge' => 'Sale',
                'badgeClass' => 'pbsl',
                'category' => 'DVR System',
                'name' => 'HD Digital Video Recorder 8-Channel',
                'rating' => 4,
                'reviews' => 89,
                'price' => 'Rs 749',
                'oldPrice' => 'Rs 999'
            ])
            @include('partials.product-card', [
                'image' => asset('images/camera/12.jpg.jpeg'),
                'category' => 'NVR System',
                'name' => 'HD Digital Video Recorder 16-Channel',
                'rating' => 4.5,
                'reviews' => 167,
                'price' => 'Rs 1,499',
                'oldPrice' => 'Rs 2,500'
            ])
            @include('partials.product-card', [
                'image' => asset('images/camera/6.jpg.jpeg'),
                'badge' => 'New',
                'badgeClass' => 'pbn',
                'category' => 'Networking',
                'name' => 'PoE Network Switch 8-Port',
                'rating' => 5,
                'reviews' => 312,
                'price' => 'Rs 129',
                'oldPrice' => 'Rs 179'
            ])
            @include('partials.product-card', [
                'image' => asset('images/camera/7.jpg.jpeg'),
                'badge' => 'Hot',
                'badgeClass' => 'pbh',
                'category' => 'DVR System',
                'name' => 'HD Digital Video Recorder 4-Channel',
                'rating' => 4,
                'reviews' => 74,
                'price' => 'Rs 2,499',
                'oldPrice' => 'Rs 5,199'
            ])
            @include('partials.product-card', [
                'image' => asset('images/camera/8.jpg.jpeg'),
                'category' => 'Networking',
                'name' => 'PoE Switch 4-Port 100Mbps',
                'rating' => 4.5,
                'reviews' => 198,
                'price' => 'Rs 299',
                'oldPrice' => 'Rs 399'
            ])
            @include('partials.product-card', [
                'image' => asset('images/camera/10.jpg.jpeg'),
                'badge' => 'Sale',
                'badgeClass' => 'pbsl',
                'category' => 'DVR System',
                'name' => 'HD Digital Video Recorder Pro',
                'rating' => 5,
                'reviews' => 445,
                'price' => 'Rs 2,499',
                'oldPrice' => 'Rs 3,199'
            ])
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="why">
    <div class="cn">
        <div class="sh rv">
            <div class="ssub">Why Choose Us</div>
            <h2 class="stt lt">Numbers Speak For Themselves</h2>
            <div class="sln"></div>
        </div>
        <div class="wgd">
            <div class="wcr rv">
                <div class="wic"><i class="fas fa-video"></i></div>
                <h3>15,000+</h3>
                <p>Cameras Installed</p>
            </div>
            <div class="wcr rv">
                <div class="wic"><i class="fas fa-users"></i></div>
                <h3>5,000+</h3>
                <p>Happy Clients</p>
            </div>
            <div class="wcr rv">
                <div class="wic"><i class="fas fa-building"></i></div>
                <h3>800+</h3>
                <p>Projects Completed</p>
            </div>
            <div class="wcr rv">
                <div class="wic"><i class="fas fa-trophy"></i></div>
                <h3>25+</h3>
                <p>Industry Awards</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testi" id="testi">
    <div class="cn">
        <div class="sh rv">
            <div class="ssub">Testimonials</div>
            <h2 class="stt">What Our Clients Say</h2>
            <div class="sln"></div>
        </div>
        <div class="tgd">
            @include('partials.testimonial', [
                'quote' => 'CCTV Pro installed a 16-camera system for our hotel. Clean, professional work. We monitor everything from phones now!',
                'avatar' => 'BT',
                'name' => 'Bikash Thapa',
                'role' => 'Hotel Owner, Pokhara',
                'rating' => 5
            ])
            @include('partials.testimonial', [
                'quote' => 'Upgraded our warehouse security. AI detection caught multiple incidents. Support responds within minutes!',
                'avatar' => 'PS',
                'name' => 'Priya Sharma',
                'role' => 'Operations Manager',
                'rating' => 5
            ])
            @include('partials.testimonial', [
                'quote' => 'Best CCTV service in Kathmandu! Free site survey, perfect setup for retail. Night vision is amazing!',
                'avatar' => 'RG',
                'name' => 'Ramesh Gurung',
                'role' => 'Retail Chain Owner',
                'rating' => 4.5
            ])
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta" id="contact">
    <div class="cn">
        <h2>Need A Security System For Your Property?</h2>
        <p>Get a free site survey and customized solution designed for your needs and budget.</p>
        <div class="ctab">
            <a href="#" class="btn btn-o">Get Free Quote <i class="fas fa-arrow-right"></i></a>
            <a href="tel:+9779820142449" class="btn btn-ol"><i class="fas fa-phone-alt"></i> +977-9820142449</a>
        </div>
    </div>
</section>

@endsection
