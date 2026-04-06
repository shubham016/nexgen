@extends('layouts.app')

@section('title', 'NEXGEN - Complete Security Camera Solutions')

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
                        @php
                            $defaultVideoUrl = asset('videos/cctv_footage.mp4');
                            $defaultLabels   = ['cam 01 - front gate', 'cam 02 - parking', 'cam 03 - back door', 'cam 04 - rooftop'];
                            $heroCameras = ($cameras ?? collect())->count()
                                ? $cameras
                                : collect($defaultLabels)->map(function ($label) use ($defaultVideoUrl) {
                                    return new class($label, $defaultVideoUrl) {
                                        public string $label;
                                        private string $url;
                                        public function __construct(string $label, string $url) {
                                            $this->label = $label;
                                            $this->url   = $url;
                                        }
                                        public function videoUrl(): string { return $this->url; }
                                    };
                                });
                        @endphp
                        @foreach($heroCameras as $i => $cam)
                        <div class="cp">
                            <div class="scl"{{ $i > 0 ? ' style="animation-delay: ' . $i . 's"' : '' }}>
                                <video autoplay muted loop playsinline>
                                    <source src="{{ $cam->videoUrl() }}" type="video/mp4" />
                                </video>
                            </div>
                            <span class="cml">{{ $cam->label }}</span>
                            <span class="cdt"></span>
                        </div>
                        @endforeach
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
            @forelse($products ?? [] as $product)
                @include('partials.product-card', [
                    'image'      => $product->imageUrl(),
                    'badge'      => $product->badge ? ucfirst($product->badge) : null,
                    'badgeClass' => $product->badgeClass(),
                    'category'   => $product->category?->name ?? 'Security Camera',
                    'name'       => $product->name,
                    'rating'     => (float) $product->rating,
                    'price'      => $product->formattedPrice(),
                    'oldPrice'   => $product->formattedOldPrice(),
                ])
            @empty
                <div class="text-center py-5" style="grid-column: 1/-1;">
                    <p style="color:#888;">No products available yet. Check back soon!</p>
                </div>
            @endforelse
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
            @forelse($stats ?? [] as $stat)
            <div class="wcr rv">
                <div class="wic"><i class="{{ $stat->icon }}"></i></div>
                <h3>{{ $stat->value }}</h3>
                <p>{{ $stat->label }}</p>
            </div>
            @empty
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
            @endforelse
        </div>
    </div>
</section>

<!-- Testimonials Section -->
@if(($testimonials ?? collect())->isNotEmpty())
<section class="testi" id="testi">
    <div class="cn">
        <div class="sh rv">
            <div class="ssub">Testimonials</div>
            <h2 class="stt">What Our Clients Say</h2>
            <div class="sln"></div>
        </div>
        <div class="tslider">
            <button class="tsb tsprev" id="tsPrev" aria-label="Previous testimonial">
                <i class="fas fa-chevron-left"></i>
            </button>
            <div class="ttrack" id="tsTrack">
                <div class="tgd" id="tsGrid">
                    @foreach($testimonials as $t)
                        @include('partials.testimonial', [
                            'quote'  => $t->quote,
                            'avatar' => $t->avatar,
                            'photo'  => $t->photoUrl(),
                            'name'   => $t->name,
                            'role'   => $t->role,
                            'rating' => $t->rating,
                        ])
                    @endforeach
                </div>
            </div>
            <button class="tsb tsnext" id="tsNext" aria-label="Next testimonial">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>

        <script>
        (function () {
            var section = document.getElementById('testi');
            var track   = document.getElementById('tsTrack');
            var grid    = document.getElementById('tsGrid');
            var prevBtn = document.getElementById('tsPrev');
            var nextBtn = document.getElementById('tsNext');
            var cards   = grid ? Array.from(grid.querySelectorAll('.tcr')) : [];
            var GAP      = 28;
            var INTERVAL = 3000;
            var current  = 0;
            var timer    = null;

            if (!cards.length) return;

            function perPage()   { return window.innerWidth <= 768 ? 1 : 3; }
            function maxIndex()  { return Math.max(0, cards.length - perPage()); }
            function stepWidth() { return cards[0].offsetWidth + GAP; }

            function setCardWidths() {
                var ipp   = perPage();
                var cardW = (track.offsetWidth - GAP * (ipp - 1)) / ipp;
                cards.forEach(function (c) { c.style.flex = '0 0 ' + cardW + 'px'; });
            }

            function update() {
                current = Math.min(current, maxIndex());
                grid.style.transform = 'translateX(-' + (current * stepWidth()) + 'px)';
                prevBtn.disabled = current === 0;
                nextBtn.disabled = current >= maxIndex();
            }

            function next() {
                current = current >= maxIndex() ? 0 : current + 1;
                update();
            }

            function startAuto() {
                if (timer || maxIndex() === 0) return;
                timer = setInterval(next, INTERVAL);
            }

            function stopAuto() {
                clearInterval(timer);
                timer = null;
            }

            // Pause on hover, resume on leave
            section.addEventListener('mouseenter', stopAuto);
            section.addEventListener('mouseleave', function () {
                if (isVisible) startAuto();
            });

            // Manual controls reset the timer
            prevBtn.addEventListener('click', function () {
                stopAuto();
                current = Math.max(0, current - 1);
                update();
                if (isVisible) startAuto();
            });
            nextBtn.addEventListener('click', function () {
                stopAuto();
                current = Math.min(maxIndex(), current + 1);
                update();
                if (isVisible) startAuto();
            });

            window.addEventListener('resize', function () {
                stopAuto();
                current = 0;
                setCardWidths();
                update();
                if (isVisible) startAuto();
            });

            // Only autoplay when section is in viewport
            var isVisible = false;
            var observer  = new IntersectionObserver(function (entries) {
                isVisible = entries[0].isIntersecting;
                isVisible ? startAuto() : stopAuto();
            }, { threshold: 0.3 });

            observer.observe(section);

            function init() { setCardWidths(); update(); }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', init);
            } else {
                init();
            }
        })();
        </script>
    </div>
</section>
@endif

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
