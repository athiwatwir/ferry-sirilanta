<style>
    .footer-links {
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem;
        justify-content: center;
        align-items: center;
        margin-bottom: 0.8rem;
    }

    .footer-links a {
        color: #6c757d;
        text-decoration: none;
        font-size: 0.95rem;
        font-weight: 500;
        padding: 0.5rem 0;
        position: relative;
        transition: all 0.3s ease;
        white-space: nowrap;
    }

    .footer-links a::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, #F16424, #ff8c5a);
        transition: width 0.3s ease;
    }

    .footer-links a:hover {
        color: #F16424;
    }

    .footer-links a:hover::after {
        width: 100%;
    }

    @media (max-width: 768px) {
        .footer-links {
            flex-direction: column;
            gap: 0.2rem;
            align-items: flex-start;
        }

        .footer-links a {
            width: 100%;
            padding: 0.1rem 0;
            border-bottom: 1px solid #a0a0a0;
        }

        .footer-links a:last-child {
            border-bottom: none;
        }

        .footer-links a::after {
            display: none;
        }
    }

    @media (min-width: 769px) {
        .footer-links {
            justify-content: flex-start;
        }
    }

</style>

<footer class="landing-footer bg-body footer-text">
    <div class="footer-bottom py-3 py-md-5">

        <div class="container d-flex flex-wrap justify-content-between flex-md-row flex-column text-center text-md-start">
            <div class="row w-100">
                <div class="col-12">
                    <div class="footer-links">
                        <a href="/">View Your Booking</a>
                        <a href="/">Station</a>
                        <a href="/">Route Map</a>
                        <a href="/">Time Table</a>
                        <a href="https://www.tigerlineferry.com/" target="_blank">Tigerline Ferry</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="mb-2 mb-md-0">
                <span class="footer-bottom-text">© Copyright
                    <script>
                        document.write(new Date().getFullYear());

                    </script> Sirilanta Co., Ltd. All rights reserved. Use of this website indicateds your compliance with our Terms and Conditions, Terms of Use and Privacy Policy. Indicates an external site which may or may not meet accessibility guidelines.
                </span>
                <a href="https://pixinvent.com" target="_blank" class="fw-medium text-white">,</a>

            </div>
            <div>

            </div>
        </div>
    </div>
</footer>
