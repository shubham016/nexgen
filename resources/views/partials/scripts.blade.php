<script>
    // Force play all CCTV videos
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".scl video").forEach(function (v) {
            v.muted = true;
            v.play().catch(function () {});
        });
    });

    // Update Clock
    function uc() {
        var d = new Date();
        var t = [d.getHours(), d.getMinutes(), d.getSeconds()]
            .map(function (n) {
                return String(n).padStart(2, "0");
            })
            .join(":");
        var e = document.getElementById("hTime");
        if (e) e.textContent = t;
    }
    setInterval(uc, 1000);
    uc();

    // Scroll to Top Button
    window.addEventListener("scroll", function () {
        document.getElementById("stp").classList.toggle("v", window.scrollY > 400);
    });

    // Navbar state: solid (top) → liquid glass (hero) → subtle glass (white sections)
    (function () {
        var nav = document.querySelector('.nb');
        var hero = document.querySelector('.hero');
        var topbar = document.querySelector('.topbar');
        if (!nav || !hero) return;

        // Glass only kicks in once the topbar is fully scrolled away
        var topbarH = topbar ? topbar.offsetHeight : 44;

        function updateNav() {
            var scrollY = window.scrollY;
            var heroBottom = hero.offsetTop + hero.offsetHeight - nav.offsetHeight;

            if (scrollY < topbarH) {
                nav.style.transition = 'none';
                nav.classList.remove('nb-glass', 'nb-dark');
                requestAnimationFrame(function() {
                    requestAnimationFrame(function() {
                        nav.style.transition = '';
                    });
                });
            } else if (scrollY < heroBottom) {
                nav.classList.remove('nb-dark');
                nav.classList.add('nb-glass');
            } else {
                nav.classList.remove('nb-glass');
                nav.classList.add('nb-dark');
            }
        }

        window.addEventListener('scroll', updateNav, { passive: true });
        updateNav();
    }());

    // Reveal on Scroll Animation
    var els = document.querySelectorAll(".rv");
    var ob = new IntersectionObserver(
        function (entries) {
            entries.forEach(function (e, i) {
                if (e.isIntersecting) {
                    setTimeout(function () {
                        e.target.classList.add("ac");
                    }, i * 80);
                    ob.unobserve(e.target);
                }
            });
        },
        { threshold: 0.1 }
    );
    els.forEach(function (el) {
        ob.observe(el);
    });

    // Clean URL navigation — intercept nav links, scroll to section, update URL
    var pathMap = {
        '/': 'home',
        '/about': 'about',
        '/services': 'services',
        '/products': 'products',
        '/reviews': 'testi',
        '/contact': 'contact'
    };

    var navLinks = document.querySelectorAll('.nmn a');

    function setActive(href) {
        navLinks.forEach(function (l) { l.classList.remove('active'); });
        navLinks.forEach(function (l) {
            if (l.getAttribute('href') === href) l.classList.add('active');
        });
    }

    document.querySelectorAll('a[href]').forEach(function (a) {
        var href = a.getAttribute('href');
        if (pathMap.hasOwnProperty(href)) {
            a.addEventListener('click', function (e) {
                e.preventDefault();
                var sectionId = pathMap[href];
                var target = document.getElementById(sectionId);
                if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                history.pushState(null, '', href);
                setActive(href);
            });
        }
    });

    // On direct URL visit (e.g. /about), scroll to correct section and set active
    (function () {
        var path = window.location.pathname;
        setActive(path === '/' ? '/' : path);
        if (path !== '/' && pathMap[path]) {
            var target = document.getElementById(pathMap[path]);
            if (target) setTimeout(function () {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 300);
        }
    }());

    // Scrollspy — update active link and URL as user scrolls through sections
    (function () {
        var sectionToPath = {
            'home':     '/',
            'about':    '/about',
            'services': '/services',
            'products': '/products',
            'testi':    '/reviews',
            'contact':  '/contact'
        };

        var sections = Object.keys(sectionToPath).map(function (id) {
            return document.getElementById(id);
        }).filter(Boolean);

        var scrollSpy = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    var id = entry.target.getAttribute('id');
                    var path = sectionToPath[id];
                    setActive(path);
                    history.replaceState(null, '', path);
                }
            });
        }, { threshold: 0.4 });

        sections.forEach(function (s) { scrollSpy.observe(s); });
    }());
</script>
