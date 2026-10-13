<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <!-- Brand Info -->
            <div class="footer-widget">
                <a href="{{ route('home') }}" class="site-logo" style="margin-bottom:1.5rem; display:inline-block;">
                    <img src="{{ asset('images/triangle-logo-white.svg') }}" alt="Triangle Interior Design" style="height:44px; width:auto;">
                </a>
                <p>
                    Triangle Interior Design is a premier architectural and interior design firm in Bangladesh, delivering over 500+ residential and commercial transformations since 2011. Operating our own custom manufacturing facility in West Badda gives us end-to-end quality control and punctuality.
                </p>
                <div class="footer-socials">
                    <a href="{{ $settings['facebook'] ?? 'https://www.facebook.com/dit.interior/' }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ $settings['youtube'] ?? 'https://www.youtube.com/channel/UCH_kEOE-o6hlo1X1DVermTQ' }}" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    <a href="https://wa.me/8801810536303" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>

            <!-- Quick Links / Services -->
            <div class="footer-widget">
                <h4>Design Services</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('service.detail', 'home-interior-design') }}"><i class="fas fa-angle-right"></i> Full Home Interior</a></li>
                    <li><a href="{{ route('service.detail', 'modular-kitchen-design') }}"><i class="fas fa-angle-right"></i> Modular Kitchen Design</a></li>
                    <li><a href="{{ route('service.detail', 'bedroom-design') }}"><i class="fas fa-angle-right"></i> Bedroom Interior Design</a></li>
                    <li><a href="{{ route('service.detail', 'living-room-design') }}"><i class="fas fa-angle-right"></i> Living Room Design</a></li>
                    <li><a href="{{ route('service.detail', 'custom-furniture-design') }}"><i class="fas fa-angle-right"></i> Custom Furniture Design</a></li>
                    <li><a href="{{ route('service.detail', 'common-space-design') }}"><i class="fas fa-angle-right"></i> Common Space Design</a></li>
                    <li><a href="{{ route('services') }}"><i class="fas fa-angle-right"></i> View All 10 Services</a></li>
                </ul>
            </div>

            <!-- Area Landing Links (SEO) -->
            <div class="footer-widget">
                <h4>Areas Served</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('area.landing', 'gulshan') }}"><i class="fas fa-angle-right"></i> Interior Design in Gulshan</a></li>
                    <li><a href="{{ route('area.landing', 'banani') }}"><i class="fas fa-angle-right"></i> Interior Design in Banani</a></li>
                    <li><a href="{{ route('area.landing', 'dhanmondi') }}"><i class="fas fa-angle-right"></i> Interior Design in Dhanmondi</a></li>
                    <li><a href="{{ route('area.landing', 'uttara') }}"><i class="fas fa-angle-right"></i> Interior Design in Uttara</a></li>
                    <li><a href="{{ route('area.landing', 'bashundhara') }}"><i class="fas fa-angle-right"></i> Interior in Bashundhara</a></li>
                    <li><a href="{{ route('area.landing', 'mirpur') }}"><i class="fas fa-angle-right"></i> Interior Design in Mirpur</a></li>
                    <li><a href="{{ route('area.landing', 'chittagong') }}"><i class="fas fa-angle-right"></i> Interior in Chittagong</a></li>
                </ul>
            </div>

            <!-- Contact & Addresses -->
            <div class="footer-widget">
                <h4>Offices & Contact</h4>
                <div class="footer-contact-item">
                    <i class="fas fa-building"></i>
                    <div>
                        <strong style="color:#ffffff; display:block; margin-bottom:0.15rem;">Design Studio:</strong>
                        {{ $settings['office_address'] ?? 'House 127 (2nd floor), Road 05, Mohakhali New DOHS Dhaka 1206, Bangladesh' }}
                    </div>
                </div>
                <div class="footer-contact-item">
                    <i class="fas fa-industry"></i>
                    <div>
                        <strong style="color:#ffffff; display:block; margin-bottom:0.15rem;">Manufacturing Factory:</strong>
                        {{ $settings['factory_address'] ?? '1920, Koborsthan Road, East Badda, Dhaka 1212, Bangladesh' }}
                    </div>
                </div>
                <div class="footer-contact-item">
                    <i class="fas fa-phone-alt"></i>
                    <div>
                        <a href="tel:+8801810536303" style="color:#ffffff; font-weight:600;">
                            +8801810536303 (Hotline)
                        </a>
                        <span style="display:block; font-size:0.8rem; color:#94a3b8;">Factory: +8801810536303</span>
                    </div>
                </div>
                <div class="footer-contact-item">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <a href="mailto:{{ $settings['email'] ?? 'info@triangleinterior.com' }}">
                            {{ $settings['email'] ?? 'info@triangleinterior.com' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Bar with Developer Credit -->
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-copyright">
                    &copy; {{ date('Y') }} <strong>Triangle Interior Design</strong>. All rights reserved.
                </div>
                
                <div class="footer-developer-credit">
                    <span>Developed by </span>
                    <a href="https://engr-saad.com" target="_blank" rel="noopener noreferrer" class="developer-link" id="developerCreditLink">
                        Engr Saad <span class="arrow-ext">↗</span>
                    </a>
                </div>

                <div class="footer-bottom-links">
                    <a href="{{ route('faqs') }}">FAQs</a>
                    <a href="{{ route('why.choose') }}">Why Choose Us</a>
                    <a href="{{ route('contact') }}">Contact</a>
                    <a href="{{ route('shop') }}">Custom Furniture</a>
                </div>
            </div>
        </div>
    </div>
</footer>
