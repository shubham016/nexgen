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
                nav.classList.remove('nb-glass', 'nb-dark');
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

    // Smooth Scroll for Anchor Links
    document.querySelectorAll('a[href^="#"]').forEach(function (a) {
        a.addEventListener("click", function (e) {
            e.preventDefault();
            var t = document.querySelector(a.getAttribute("href"));
            if (t) t.scrollIntoView({ behavior: "smooth", block: "start" });
        });
    });
</script>
