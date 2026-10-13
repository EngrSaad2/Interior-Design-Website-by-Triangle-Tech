/**
 * Triangle Interior Design - Complete Frontend Interactivity
 * 100% Faithful replication of ditstudio.com.bd features
 */
document.addEventListener('DOMContentLoaded', function () {
    // =========================================================================
    // 1. DIT-HERO AUTO-ROTATING CROSSFADE SLIDER
    // =========================================================================
    const hero = document.getElementById('ditHero');
    if (hero) {
        const slides = hero.querySelectorAll('.dit-hero__slide');
        let currentIndex = 0;
        let slideTimer = null;
        const autoPlayDelay = parseInt(hero.dataset.autoplay, 10) || 5000;

        function goToSlide(nextIndex) {
            if (slides.length <= 1) return;
            const currentSlide = slides[currentIndex];
            const nextSlide = slides[nextIndex];

            // Mark current as previous (keeps it opaque beneath while next fades in)
            slides.forEach(s => s.classList.remove('is-prev', 'is-active'));
            currentSlide.classList.add('is-prev');
            nextSlide.classList.add('is-active');

            currentSlide.setAttribute('aria-hidden', 'true');
            nextSlide.setAttribute('aria-hidden', 'false');

            currentIndex = nextIndex;
        }

        function startAutoPlay() {
            stopAutoPlay();
            slideTimer = setInterval(() => {
                const next = (currentIndex + 1) % slides.length;
                goToSlide(next);
            }, autoPlayDelay);
        }

        function stopAutoPlay() {
            if (slideTimer) {
                clearInterval(slideTimer);
                slideTimer = null;
            }
        }

        startAutoPlay();
        hero.addEventListener('mouseenter', stopAutoPlay);
        hero.addEventListener('mouseleave', startAutoPlay);
    }

    // =========================================================================
    // 2. SERVICES CAROUSEL ARROW NAVIGATION
    // =========================================================================
    const track = document.getElementById('servicesCarouselTrack');
    const prevBtn = document.getElementById('servicesPrevBtn');
    const nextBtn = document.getElementById('servicesNextBtn');

    if (track) {
        const getScrollStep = () => {
            const card = track.querySelector('.service-slide-card');
            return card ? card.offsetWidth + 20 : 280;
        };

        prevBtn?.addEventListener('click', () => {
            track.scrollBy({ left: -getScrollStep(), behavior: 'smooth' });
        });

        nextBtn?.addEventListener('click', () => {
            track.scrollBy({ left: getScrollStep(), behavior: 'smooth' });
        });
    }

    // =========================================================================
    // 3. SEARCH MODAL OPEN / CLOSE
    // =========================================================================
    const searchBtn = document.getElementById('headerSearchBtn');
    const searchModal = document.getElementById('searchModal');
    const searchClose = document.getElementById('searchModalClose');
    const searchInput = document.getElementById('siteSearchInput');

    function openSearch() {
        searchModal?.classList.add('active');
        document.body.style.overflow = 'hidden';
        setTimeout(() => searchInput?.focus(), 100);
    }

    function closeSearch() {
        searchModal?.classList.remove('active');
        document.body.style.overflow = '';
    }

    searchBtn?.addEventListener('click', openSearch);
    searchClose?.addEventListener('click', closeSearch);

    searchModal?.addEventListener('click', (e) => {
        if (e.target === searchModal) closeSearch();
    });

    searchInput?.addEventListener('keydown', (e) => {
        if (e.key === 'Enter') {
            const query = encodeURIComponent(searchInput.value.trim());
            if (query) {
                window.location.href = `/projects?search=${query}`;
            }
        }
    });

    // =========================================================================
    // 4. MOBILE NAVIGATION DRAWER
    // =========================================================================
    const menuToggle = document.getElementById('mobileMenuToggle');
    const navDrawer = document.getElementById('mobileNavDrawer');
    const drawerClose = document.getElementById('mobileDrawerClose');
    const navOverlay = document.getElementById('mobileNavOverlay');

    function openDrawer() {
        navDrawer?.classList.add('active');
        navOverlay?.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeDrawer() {
        navDrawer?.classList.remove('active');
        navOverlay?.classList.remove('active');
        document.body.style.overflow = '';
    }

    menuToggle?.addEventListener('click', openDrawer);
    drawerClose?.addEventListener('click', closeDrawer);
    navOverlay?.addEventListener('click', closeDrawer);

    // =========================================================================
    // 5. FREE CONSULTATION MODAL
    // =========================================================================
    const consultationModal = document.getElementById('consultationModal');
    const consultationBtns = document.querySelectorAll('.open-consultation-modal');
    const consultClose = document.getElementById('consultationModalClose');

    function openConsultModal(e) {
        if (e) e.preventDefault();
        consultationModal?.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeConsultModal() {
        consultationModal?.classList.remove('active');
        document.body.style.overflow = '';
    }

    consultationBtns.forEach(btn => btn.addEventListener('click', openConsultModal));
    consultClose?.addEventListener('click', closeConsultModal);

    consultationModal?.addEventListener('click', (e) => {
        if (e.target === consultationModal) closeConsultModal();
    });

    // =========================================================================
    // 6. FAQ ACCORDION
    // =========================================================================
    document.querySelectorAll('.faq-accordion-header').forEach(header => {
        header.addEventListener('click', function () {
            const item = this.closest('.faq-accordion-item');
            const body = item.querySelector('.faq-accordion-body');
            const isActive = item.classList.contains('active');

            // Close siblings
            document.querySelectorAll('.faq-accordion-item').forEach(other => {
                if (other !== item) {
                    other.classList.remove('active');
                    const b = other.querySelector('.faq-accordion-body');
                    if (b) b.style.maxHeight = null;
                }
            });

            if (!isActive) {
                item.classList.add('active');
                body.style.maxHeight = body.scrollHeight + 'px';
            } else {
                item.classList.remove('active');
                body.style.maxHeight = null;
            }
        });
    });

    // =========================================================================
    // 7. PORTFOLIO PROJECT FILTER TABS
    // =========================================================================
    const filterButtons = document.querySelectorAll('.filter-btn');
    const projectCards = document.querySelectorAll('.project-item-card');

    filterButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            filterButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const filter = this.dataset.filter;
            projectCards.forEach(card => {
                const category = card.dataset.category;
                if (filter === 'all' || category === filter) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // =========================================================================
    // 8. SHOPPING CART SIMULATION (localStorage)
    // =========================================================================
    const cart = {
        items: JSON.parse(localStorage.getItem('triangle_cart') || '[]'),
        save() {
            localStorage.setItem('triangle_cart', JSON.stringify(this.items));
            this.updateUI();
        },
        addItem(id, title, price, image) {
            const existing = this.items.find(i => i.id === id);
            if (existing) {
                existing.qty += 1;
            } else {
                this.items.push({ id, title, price: parseFloat(price), image, qty: 1 });
            }
            this.save();
            this.openDrawer();
        },
        removeItem(id) {
            this.items = this.items.filter(i => i.id !== id);
            this.save();
        },
        updateQty(id, delta) {
            const item = this.items.find(i => i.id === id);
            if (item) {
                item.qty += delta;
                if (item.qty <= 0) {
                    this.removeItem(id);
                    return;
                }
            }
            this.save();
        },
        getTotal() {
            return this.items.reduce((sum, item) => sum + (item.price * item.qty), 0);
        },
        getCount() {
            return this.items.reduce((sum, item) => sum + item.qty, 0);
        },
        updateUI() {
            const count = this.getCount();
            document.querySelectorAll('.cart-badge, #floatingCartCount').forEach(badge => {
                badge.textContent = count;
            });

            const cartDrawerItems = document.getElementById('cartDrawerItems');
            const cartDrawerTotal = document.getElementById('cartDrawerTotal');

            if (cartDrawerItems) {
                if (this.items.length === 0) {
                    cartDrawerItems.innerHTML = '<div style="text-align:center; padding:3rem 1rem; color:#94a3b8;"><i class="fas fa-shopping-bag" style="font-size:2.5rem; margin-bottom:1rem; opacity:0.4;"></i><p>Your cart is empty</p></div>';
                } else {
                    cartDrawerItems.innerHTML = this.items.map(item => `
                        <div class="cart-drawer-item" style="display:flex; gap:1rem; padding:1rem 0; border-bottom:1px solid rgba(255,255,255,0.08);">
                            <img src="${item.image}" alt="${item.title}" style="width:60px; height:60px; object-fit:cover; border-radius:6px;">
                            <div style="flex-grow:1;">
                                <h5 style="color:#ffffff; font-size:0.9rem; margin-bottom:0.25rem;">${item.title}</h5>
                                <div style="color:var(--color-primary); font-weight:700; font-size:0.875rem;">৳ ${item.price.toLocaleString()}</div>
                                <div style="display:flex; align-items:center; gap:0.5rem; margin-top:0.4rem;">
                                    <button onclick="cart.updateQty('${item.id}', -1)" style="background:#222; border:none; color:#fff; width:22px; height:22px; border-radius:4px; cursor:pointer;">-</button>
                                    <span style="color:#fff; font-size:0.85rem;">${item.qty}</span>
                                    <button onclick="cart.updateQty('${item.id}', 1)" style="background:#222; border:none; color:#fff; width:22px; height:22px; border-radius:4px; cursor:pointer;">+</button>
                                    <button onclick="cart.removeItem('${item.id}')" style="margin-left:auto; background:none; border:none; color:#ef4444; font-size:0.8rem; cursor:pointer;"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </div>
                        </div>
                    `).join('');
                }
            }

            if (cartDrawerTotal) {
                cartDrawerTotal.textContent = '৳ ' + this.getTotal().toLocaleString();
            }
        },
        openDrawer() {
            document.getElementById('cartDrawer')?.classList.add('active');
            document.body.style.overflow = 'hidden';
        },
        closeDrawer() {
            document.getElementById('cartDrawer')?.classList.remove('active');
            document.body.style.overflow = '';
        }
    };

    window.cart = cart;
    cart.updateUI();

    document.querySelectorAll('.cart-toggle-btn, #floatingCartBasket').forEach(btn => {
        btn.addEventListener('click', (e) => {
            // If it's a link on mobile or desktop, open the slideout drawer instead of navigating away
            e.preventDefault();
            cart.openDrawer();
        });
    });

    document.getElementById('cartDrawerClose')?.addEventListener('click', () => {
        cart.closeDrawer();
    });

    document.getElementById('cartDrawer')?.addEventListener('click', function(e) {
        if (e.target === this) cart.closeDrawer();
    });
});
