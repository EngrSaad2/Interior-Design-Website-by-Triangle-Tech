/**
 * DIT Studio - Modern Frontend Interactions
 */
document.addEventListener('DOMContentLoaded', function () {
    // 1. Sticky Header
    const header = document.querySelector('.site-header');
    const floatTop = document.querySelector('.float-top');

    window.addEventListener('scroll', function () {
        if (window.scrollY > 50) {
            header?.classList.add('scrolled');
        } else {
            header?.classList.remove('scrolled');
        }

        if (window.scrollY > 350) {
            floatTop?.classList.add('visible');
        } else {
            floatTop?.classList.remove('visible');
        }
    });

    floatTop?.addEventListener('click', function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // 2. Mobile Menu Toggle
    const mobileToggle = document.querySelector('.mobile-toggle');
    const mobileNavDrawer = document.querySelector('.mobile-nav-drawer');
    const mobileClose = document.querySelector('.mobile-nav-close');
    const mobileOverlay = document.getElementById('mobileNavOverlay');

    function closeMobileMenu() {
        mobileNavDrawer?.classList.remove('open');
        mobileOverlay?.classList.remove('active');
        document.body.style.overflow = '';
    }

    mobileToggle?.addEventListener('click', function () {
        mobileNavDrawer?.classList.add('open');
        mobileOverlay?.classList.add('active');
        document.body.style.overflow = 'hidden';
    });

    mobileClose?.addEventListener('click', closeMobileMenu);
    mobileOverlay?.addEventListener('click', closeMobileMenu);

    // Mobile dropdown toggle
    document.querySelectorAll('.mobile-dropdown-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const submenu = this.nextElementSibling;
            if (submenu) {
                submenu.classList.toggle('open');
                this.querySelector('i')?.classList.toggle('rotate');
            }
        });
    });

    // 3. FAQ Accordion
    document.querySelectorAll('.faq-question').forEach(q => {
        q.addEventListener('click', function () {
            const parent = this.closest('.faq-item');
            const isActive = parent.classList.contains('active');

            // Close others
            document.querySelectorAll('.faq-item').forEach(item => {
                item.classList.remove('active');
            });

            if (!isActive) {
                parent.classList.add('active');
            }
        });
    });

    // 4. Consultation Modal
    const consultationModal = document.getElementById('consultationModal');
    const consultationTriggers = document.querySelectorAll('.open-consultation-modal');
    const modalClose = document.querySelector('.modal-close');

    consultationTriggers.forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            consultationModal?.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    });

    modalClose?.addEventListener('click', function () {
        consultationModal?.classList.remove('active');
        document.body.style.overflow = '';
    });

    consultationModal?.addEventListener('click', function (e) {
        if (e.target === this) {
            this.classList.remove('active');
            document.body.style.overflow = '';
        }
    });

    // 5. Shopping Cart Simulation (Stored in localStorage)
    const cart = {
        items: JSON.parse(localStorage.getItem('dit_cart') || '[]'),
        save() {
            localStorage.setItem('dit_cart', JSON.stringify(this.items));
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
            const badge = document.querySelector('.cart-badge');
            if (badge) badge.textContent = this.getCount();

            const cartDrawerItems = document.getElementById('cartDrawerItems');
            const cartDrawerTotal = document.getElementById('cartDrawerTotal');

            if (cartDrawerItems) {
                if (this.items.length === 0) {
                    cartDrawerItems.innerHTML = '<div style="text-align:center; padding: 3rem 1rem; color: #94a3b8;"><i class="fas fa-shopping-bag" style="font-size:2.5rem; margin-bottom:1rem; opacity:0.4;"></i><p>Your cart is empty</p></div>';
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
            document.getElementById('cartDrawer')?.classList.add('open');
            document.body.style.overflow = 'hidden';
        },
        closeDrawer() {
            document.getElementById('cartDrawer')?.classList.remove('open');
            document.body.style.overflow = '';
        }
    };

    window.cart = cart;
    cart.updateUI();

    document.querySelector('.cart-toggle-btn')?.addEventListener('click', function () {
        cart.openDrawer();
    });

    document.querySelector('.cart-drawer-close')?.addEventListener('click', function () {
        cart.closeDrawer();
    });

    document.querySelectorAll('.btn-add-to-cart').forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            const id = this.dataset.id;
            const title = this.dataset.title;
            const price = this.dataset.price;
            const image = this.dataset.image;
            cart.addItem(id, title, price, image);
        });
    });
});
