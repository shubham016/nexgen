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
                    <h4>1 Year Warranty</h4>
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
                    <div class="en">5+</div>
                    <div class="el">Years<br />Experience</div>
                </div>
            </div>
            <div class="abc rv">
                <div class="ssub">About NexGen Build Tech</div>
                <h2 class="stt">We Provide The Best CCTV Security Service</h2>
                <p class="abt">
                    NexGen Build Tech is a leading provider of security camera systems and
                    surveillance solutions. We specialize in designing, installing,
                    and maintaining security systems for residential, commercial, and
                    industrial properties.
                </p>
                <p class="abt">
                    Our certified technicians bring over 5 years of experience,
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
                <!-- <a href="#" class="slnk">Read More <i class="fas fa-arrow-right"></i></a> -->
            </div>
            <div class="scard rv">
                <div class="siw"><i class="fas fa-desktop"></i></div>
                <h3>Live Monitoring</h3>
                <p>24/7 real-time surveillance with AI-powered alerts and instant notifications.</p>
                <!-- <a href="#" class="slnk">Read More <i class="fas fa-arrow-right"></i></a> -->
            </div>
            <div class="scard rv">
                <div class="siw"><i class="fas fa-cloud"></i></div>
                <h3>Cloud Recording</h3>
                <p>Secure cloud-based video storage with access from anywhere in the world.</p>
                <!-- <a href="#" class="slnk">Read More <i class="fas fa-arrow-right"></i></a> -->
            </div>
            <div class="scard rv">
                <div class="siw"><i class="fas fa-door-open"></i></div>
                <h3>Access Control</h3>
                <p>Smart locks, biometric systems, and keycard access integrated with cameras.</p>
                <!-- <a href="#" class="slnk">Read More <i class="fas fa-arrow-right"></i></a> -->
            </div>
            <div class="scard rv">
                <div class="siw"><i class="fas fa-bell"></i></div>
                <h3>Alarm Systems</h3>
                <p>Intrusion detection, fire alarm, and smoke sensors linked to centers.</p>
                <!-- <a href="#" class="slnk">Read More <i class="fas fa-arrow-right"></i></a> -->
            </div>
            <div class="scard rv">
                <div class="siw"><i class="fas fa-wrench"></i></div>
                <h3>AMC & Maintenance</h3>
                <p>Annual contracts with inspections, firmware updates, and priority support.</p>
                <!-- <a href="#" class="slnk">Read More <i class="fas fa-arrow-right"></i></a> -->
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
        @php
            $uniqueCats = ($products ?? collect())->filter(fn($p) => $p->category)->pluck('category')->unique('id')->sortBy('name');
        @endphp
        @if($uniqueCats->isNotEmpty() || ($products ?? collect())->isNotEmpty())
        <div class="pfb">
            <div class="pfts" id="pfTabs">
                <button class="pft active" data-cat="all">All Products</button>
                @foreach($uniqueCats as $cat)
                    <button class="pft" data-cat="{{ strtolower($cat->name) }}">{{ $cat->name }}</button>
                @endforeach
            </div>
            <div class="pfsw">
                <i class="fas fa-search"></i>
                <input type="text" id="pfSearch" placeholder="Search products...">
            </div>
        </div>
        @endif
        <div class="prgd" id="prgd">
            @forelse($products ?? [] as $product)
                @include('partials.product-card', [
                    'image'       => $product->imageUrl(),
                    'badge'       => $product->badge ? ucfirst($product->badge) : null,
                    'badgeClass'  => $product->badgeClass(),
                    'category'    => $product->category?->name ?? 'Security Camera',
                    'name'        => $product->name,
                    'rating'      => (float) $product->rating,
                    'price'       => $product->formattedPrice(),
                    'oldPrice'    => $product->formattedOldPrice(),
                    'description' => $product->description,
                    'features'    => $product->features,
                    'stock'       => $product->stock,
                    'sku'         => $product->sku,
                ])
            @empty
                <div style="grid-column:1/-1;text-align:center;padding:60px 0;">
                    <p style="color:#888;">No products available yet. Check back soon!</p>
                </div>
            @endforelse
        </div>
        <div class="pfempty" id="pfEmpty" style="display:none;">
            <i class="fas fa-search"></i>
            <p>No products match your search.</p>
        </div>
    </div>
</section>

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
            <div class="wcr rv">...fallback...</div>
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

{{-- CTA Section — commented out --}}
{{-- <section class="cta">...</section> --}}

<!-- Contact Section -->
<section class="contact-sec" id="contact">
    <div class="cn">
        <div class="sh rv">
            <div class="ssub">Get In Touch</div>
            <h2 class="stt">Send Us a Message</h2>
            <div class="sln"></div>
        </div>
        <div class="ctc-grid">

            <!-- Form -->
            <div class="ctc-form-wrap rv">
                @if(session('contact_success'))
                    <div class="ctc-success">
                        <i class="fas fa-check-circle"></i>
                        {{ session('contact_success') }}
                    </div>
                @endif

                <form class="ctc-form" action="{{ route('contact.store') }}" method="POST" novalidate>
                    @csrf
                    <div class="ctc-row">
                        <div class="ctc-field">
                            <label for="ctcName">Full Name <span>*</span></label>
                            <input type="text" id="ctcName" name="name" placeholder="Suman Gurung"
                                value="{{ old('name') }}" required>
                            @error('name')<span class="ctc-err">{{ $message }}</span>@enderror
                        </div>
                        <div class="ctc-field">
                            <label for="ctcPhone">Phone Number</label>
                            <input type="tel" id="ctcPhone" name="phone" placeholder="+977-98XXXXXXXX"
                                value="{{ old('phone') }}">
                            @error('phone')<span class="ctc-err">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="ctc-field">
                        <label for="ctcEmail">Email Address <span>*</span></label>
                        <input type="email" id="ctcEmail" name="email" placeholder="your@gmail.com"
                            value="{{ old('email') }}" required>
                        @error('email')<span class="ctc-err">{{ $message }}</span>@enderror
                    </div>
                    <div class="ctc-field">
                        <label for="ctcSubject">Subject</label>
                        <input type="text" id="ctcSubject" name="subject" placeholder="Dome Camera Inquiry"
                            value="{{ old('subject') }}">
                        @error('subject')<span class="ctc-err">{{ $message }}</span>@enderror
                    </div>
                    <div class="ctc-field">
                        <label for="ctcMsg">Message <span>*</span></label>
                        <textarea id="ctcMsg" name="message" rows="5"
                            placeholder="Tell us about your property, number of cameras needed, or any questions…" required>{{ old('message') }}</textarea>
                        @error('message')<span class="ctc-err">{{ $message }}</span>@enderror
                    </div>
                    <button type="submit" class="btn btn-p ctc-btn">
                        Send Message <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="ctc-info rv">
                <h3>Contact Information</h3>
                <p class="ctc-sub">Reach out to us directly or fill the form and we'll respond within 24 hours.</p>

                <div class="ctc-items">
                    <div class="ctc-item">
                        <div class="ctc-ico"><i class="fas fa-phone-alt"></i></div>
                        <div>
                            <strong>Phone</strong>
                            <a href="tel:+9779820142449">+977-9820142449</a>
                        </div>
                    </div>
                    <div class="ctc-item">
                        <div class="ctc-ico"><i class="fab fa-whatsapp"></i></div>
                        <div>
                            <strong>WhatsApp</strong>
                            <a href="https://wa.me/9779820142449" target="_blank" rel="noopener">Chat with us</a>
                        </div>
                    </div>
                    <div class="ctc-item">
                        <div class="ctc-ico"><i class="fas fa-envelope"></i></div>
                        <div>
                            <strong>Email</strong>
                            <a href="mailto:sales@nexgenbuildtech.com">sales@nexgenbuildtech.com</a>
                        </div>
                    </div>
                    <div class="ctc-item">
                        <div class="ctc-ico"><i class="fas fa-map-marker-alt"></i></div>
                        <div>
                            <strong>Address</strong>
                            <span>Nepalgunj, Banke</span>
                        </div>
                    </div>
                    <div class="ctc-item">
                        <div class="ctc-ico"><i class="fas fa-clock"></i></div>
                        <div>
                            <strong>Working Hours</strong>
                            <span>Sun – Fri: 9:00 AM – 6:00 PM</span>
                        </div>
                    </div>
                </div>

                <div class="ctc-social">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="https://wa.me/9779820142449" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Product Quick View Modal -->
<div id="pmOverlay" class="pm-overlay" role="dialog" aria-modal="true" aria-label="Product details">
    <div class="pm-box">
        <button class="pm-close" aria-label="Close">&times;</button>
        <div class="pm-body">
            <div class="pm-img-wrap">
                <img id="pmImg" src="" alt="">
                <span id="pmBadge" class="pbdg" style="display:none;"></span>
            </div>
            <div class="pm-info">
                <div class="pm-cat" id="pmCat"></div>
                <h2 id="pmName"></h2>
                <div id="pmStars" class="prat"></div>
                <div class="pm-price-row">
                    <span id="pmPrice" class="pm-price"></span>
                    <span id="pmOldPrice" class="pm-old-price"></span>
                </div>
                <p id="pmDesc" class="pm-desc"></p>
                <div id="pmFeatures" class="pm-features"></div>
                <div id="pmMeta" class="pm-meta"></div>
                <a href="#contact" class="btn btn-p pm-cta" id="pmCta">Get a Quote <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>

@endsection
