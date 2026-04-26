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

    // Product Quick View Modal
    (function () {
        var overlay    = document.getElementById('pmOverlay');
        if (!overlay) return;

        var pmImg      = document.getElementById('pmImg');
        var pmBadge    = document.getElementById('pmBadge');
        var pmCat      = document.getElementById('pmCat');
        var pmName     = document.getElementById('pmName');
        var pmStars    = document.getElementById('pmStars');
        var pmPrice    = document.getElementById('pmPrice');
        var pmOldPrice = document.getElementById('pmOldPrice');
        var pmDesc     = document.getElementById('pmDesc');
        var pmFeatures = document.getElementById('pmFeatures');
        var pmMeta     = document.getElementById('pmMeta');
        var pmCta      = document.getElementById('pmCta');

        function makeStars(rating) {
            var full = Math.floor(rating);
            var half = (rating - full) >= 0.5;
            var html = '';
            for (var i = 0; i < full; i++)                           html += '<i class="fas fa-star"></i>';
            if (half)                                                 html += '<i class="fas fa-star-half-alt"></i>';
            for (var i = 0; i < (5 - full - (half ? 1 : 0)); i++)   html += '<i class="far fa-star"></i>';
            return html;
        }

        function openModal(btn) {
            var d = btn.dataset;

            pmImg.src        = d.image || '';
            pmImg.alt        = d.name  || '';
            pmCat.textContent  = d.category || '';
            pmName.textContent = d.name     || '';
            pmStars.innerHTML  = makeStars(parseFloat(d.rating) || 0);
            pmPrice.textContent = d.price || '';

            if (d.oldPrice) {
                pmOldPrice.textContent   = d.oldPrice;
                pmOldPrice.style.display = '';
            } else {
                pmOldPrice.style.display = 'none';
            }

            if (d.description) {
                pmDesc.textContent   = d.description;
                pmDesc.style.display = '';
            } else {
                pmDesc.style.display = 'none';
            }

            if (d.badge) {
                pmBadge.textContent = d.badge;
                pmBadge.className   = 'pbdg ' + (d.badgeClass || '');
                pmBadge.style.display = '';
            } else {
                pmBadge.style.display = 'none';
            }

            if (d.features) {
                var lines = d.features.split('\n').filter(function (l) { return l.trim(); });
                pmFeatures.innerHTML     = lines.map(function (l) {
                    return '<div class="pf-item"><i class="fas fa-check-circle"></i><span>' + l.trim() + '</span></div>';
                }).join('');
                pmFeatures.style.display = '';
            } else {
                pmFeatures.innerHTML     = '';
                pmFeatures.style.display = 'none';
            }

            var meta = [];
            if (d.stock !== undefined && d.stock !== '') {
                var s     = parseInt(d.stock);
                var label = s > 10 ? 'In Stock' : (s > 0 ? 'Low Stock (' + s + ' left)' : 'Out of Stock');
                var color = s > 10 ? '#22c55e'  : (s > 0 ? '#f59e0b'                    : '#ef4444');
                meta.push('<span class="pm-meta-item" style="color:' + color + ';font-weight:700;">' + label + '</span>');
            }
            if (d.sku) {
                meta.push('<span class="pm-meta-item"><strong>SKU:</strong> ' + d.sku + '</span>');
            }
            pmMeta.innerHTML = meta.join('');

            overlay.classList.add('open');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            overlay.classList.remove('open');
            document.body.style.overflow = '';
        }

        document.querySelectorAll('.pab').forEach(function (btn) {
            btn.addEventListener('click', function () { openModal(btn); });
        });

        overlay.addEventListener('click', function (e) {
            if (e.target === overlay) closeModal();
        });

        document.querySelector('.pm-close').addEventListener('click', closeModal);

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeModal();
        });

        if (pmCta) {
            pmCta.addEventListener('click', closeModal);
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

    // Navbar Search Overlay
    (function () {
        var btn     = document.getElementById('nsrBtn');
        var overlay = document.getElementById('nsoOverlay');
        var input   = document.getElementById('nsoInput');
        var close   = document.getElementById('nsoClose');
        var hint    = document.getElementById('nsoHint');
        var results = document.getElementById('nsoResults');
        if (!btn || !overlay) return;

        var pfSearch = document.getElementById('pfSearch');
        var grid     = document.getElementById('prgd');
        var products = document.getElementById('products');
        var cards    = grid ? Array.from(grid.querySelectorAll('[data-pf-name]')) : [];

        function open() {
            overlay.classList.add('open');
            document.body.style.overflow = 'hidden';
            setTimeout(function () { input.focus(); }, 50);
        }

        function closeOverlay() {
            overlay.classList.remove('open');
            document.body.style.overflow = '';
        }

        function goToProducts(term) {
            // Sync the in-page filter bar
            if (pfSearch) {
                pfSearch.value = term;
                pfSearch.dispatchEvent(new Event('input'));
            }
            closeOverlay();
            if (products) {
                setTimeout(function () {
                    products.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 80);
            }
        }

        function buildResults(term) {
            if (!results) return;
            if (!term) {
                results.innerHTML = '';
                results.classList.remove('has-results');
                hint.innerHTML = 'Type to search \u2014 press <kbd>Esc</kbd> to close';
                return;
            }

            var matched = cards.filter(function (c) {
                return c.dataset.pfName.indexOf(term) !== -1;
            });

            if (matched.length === 0) {
                results.innerHTML = '<div class="nso-no-results">No products found for "<strong>' + term + '</strong>"</div>';
                results.classList.add('has-results');
                hint.textContent = '0 products found';
                return;
            }

            var html = matched.slice(0, 6).map(function (c) {
                var img   = c.querySelector('img');
                var imgEl = img
                    ? '<img src="' + img.src + '" alt="">'
                    : '<i class="fas fa-camera"></i>';
                var name  = c.dataset.pfName;
                var cat   = c.dataset.pfCat;
                // Highlight the matched term
                var re    = new RegExp('(' + term.replace(/[.*+?^${}()|[\]\\]/g, '\\$&') + ')', 'gi');
                var hl    = name.replace(re, '<mark style="background:#dbeafe;color:var(--bl);border-radius:2px;">$1</mark>');
                return '<div class="nso-result-item" data-term="' + term + '">'
                     + '<div class="nso-result-ico">' + imgEl + '</div>'
                     + '<span class="nso-result-name">' + hl + '</span>'
                     + '<span class="nso-result-cat">' + cat + '</span>'
                     + '</div>';
            }).join('');

            results.innerHTML = html;
            results.classList.add('has-results');
            hint.textContent = matched.length + (matched.length === 1 ? ' product found — click to view' : ' products found — click to view');

            results.querySelectorAll('.nso-result-item').forEach(function (item) {
                item.addEventListener('click', function () {
                    goToProducts(item.dataset.term);
                });
            });
        }

        btn.addEventListener('click', open);
        close.addEventListener('click', closeOverlay);

        input.addEventListener('input', function () {
            buildResults(this.value.toLowerCase().trim());
        });

        input.addEventListener('keydown', function (e) {
            if (e.key === 'Enter') {
                goToProducts(this.value.trim());
            }
        });

        overlay.addEventListener('click', function (e) {
            if (e.target === overlay) closeOverlay();
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && overlay.classList.contains('open')) closeOverlay();
            if (e.key === '/' && document.activeElement.tagName !== 'INPUT' && document.activeElement.tagName !== 'TEXTAREA') {
                e.preventDefault();
                open();
            }
        });
    }());

    // Product Filter — category tabs + search
    (function () {
        var tabs      = document.querySelectorAll('.pft');
        var search    = document.getElementById('pfSearch');
        var grid      = document.getElementById('prgd');
        var empty     = document.getElementById('pfEmpty');
        if (!grid) return;

        var cards     = grid.querySelectorAll('[data-pf-name]');
        var activeCat = 'all';
        var term      = '';

        function run() {
            var visible = 0;
            cards.forEach(function (c) {
                var catOk  = activeCat === 'all' || c.dataset.pfCat === activeCat;
                var nameOk = !term || c.dataset.pfName.indexOf(term) !== -1;
                var show   = catOk && nameOk;
                c.style.display = show ? '' : 'none';
                if (show) visible++;
            });
            if (empty) empty.style.display = visible === 0 ? 'flex' : 'none';
        }

        tabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                tabs.forEach(function (t) { t.classList.remove('active'); });
                this.classList.add('active');
                activeCat = this.dataset.cat;
                run();
            });
        });

        if (search) {
            search.addEventListener('input', function () {
                term = this.value.toLowerCase().trim();
                run();
            });
        }
    }());
</script>
