<style>
    .modern-footer {
        --footer-bg: var(--bg-neutral-1);
        --footer-border: var(--bg-neutral-3);
        --footer-text: var(--divider-color);
        --footer-heading: var(--font-color);
        --footer-link-hover: var(--primary-color);
        --footer-divider: var(--bg-neutral-3);

        background: var(--footer-bg);
        border-top: 1px solid var(--footer-border);
        margin-top: 2rem;
        padding: 4rem 0 2rem;
        position: relative;
    }

    .footer-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .footer-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 3rem;
        margin-bottom: 4rem;
    }

    .footer-column h3 {
        color: var(--footer-heading);
        font-size: 1.125rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        position: relative;
    }

    .footer-column h3::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -0.5rem;
        width: 2rem;
        height: 2px;
        background: var(--primary-color);
        border-radius: var(--radius-s);
    }

    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-links li {
        margin-bottom: 0.75rem;
    }

    .footer-links a {
        color: var(--footer-text);
        text-decoration: none;
        font-size: 0.875rem;
        display: inline-flex;
        align-items: center;
        transition: color 0.2s ease;
    }

    .footer-links a:hover {
        color: var(--footer-link-hover);
    }

    .footer-links a::before {
        content: '→';
        margin-right: 0.5rem;
        font-size: 0.75rem;
        opacity: 0;
        transform: translateX(-0.5rem);
        transition: all 0.2s ease;
    }

    .footer-links a:hover::before {
        opacity: 1;
        transform: translateX(0);
    }

    .footer-social {
        display: flex;
        gap: 1rem;
        margin-top: 1rem;
    }

    .social-icon {
        width: 2.5rem;
        height: 2.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--bg-neutral-2);
        border: 1px solid var(--footer-border);
        border-radius: var(--radius-m);
        color: var(--footer-text);
        transition: all 0.2s ease;
    }

    .social-icon:hover {
        background: var(--primary-color);
        color: var(--font-color);
        transform: translateY(-2px);
    }

    .footer-bottom {
        padding-top: 2rem;
        margin-top: 2rem;
        border-top: 1px solid var(--footer-divider);
        text-align: center;
        color: var(--footer-text);
        font-size: 0.875rem;
    }

    .footer-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
        margin-top: 1rem;
    }

    .footer-user {
        color: var(--primary-color);
        font-weight: 500;
    }

    .footer-time {
        color: var(--footer-text);
    }

    @media (max-width: 768px) {
        .footer-grid {
            gap: 2rem;
        }

        .footer-info {
            flex-direction: column;
            text-align: center;
        }
    }
</style>

<footer class="modern-footer">
    <div class="footer-container">
        <div class="footer-grid">
            <!-- Company Info -->
            <div class="footer-column">
                <h3>About Us</h3>
                <p style="color: var(--footer-text); font-size: 0.875rem; line-height: 1.6; margin-bottom: 1rem;">
                    Empowering developers with cutting-edge knowledge and resources to build the future of technology.
                </p>
                <div class="footer-social">
                    <a href="#" class="social-icon">𝕏</a>
                    <a href="#" class="social-icon">𝔾</a>
                    <a href="#" class="social-icon">in</a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="footer-column">
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Latest Articles</a></li>
                    <li><a href="#">Contact Support</a></li>
                </ul>
            </div>

            <!-- Resources -->
            <div class="footer-column">
                <h3>Resources</h3>
                <ul class="footer-links">
                    <li><a href="#">Documentation</a></li>
                    <li><a href="#">Tutorials</a></li>
                    <li><a href="#">API Reference</a></li>
                    <li><a href="#">Community Forum</a></li>
                </ul>
            </div>

            <!-- Legal -->
            <div class="footer-column">
                <h3>Legal</h3>
                <ul class="footer-links">
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Cookie Policy</a></li>
                    <li><a href="#">GDPR Compliance</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>© 2025 Horizon Tech. All rights reserved.</p>
        </div>
    </div>
</footer>
