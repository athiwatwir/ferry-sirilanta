<style>
    .footer-links {
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem;
        justify-content: center;
        align-items: center;

    }

    .footer-links a {

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
            justify-content: flex-start;
            text-align: left;
        }

        .footer-links a {
            width: 100%;
            padding: 0.1rem 0;
            border-bottom: 1px solid #999999;
            text-align: left;
        }

        .footer-links a:last-child {
            border-bottom: none;
        }

        .footer-links a::after {
            display: none;
        }

        .container.text-center {
            text-align: left !important;
        }
    }

    @media (min-width: 769px) {
        .footer-links {
            justify-content: flex-start;
        }
    }

    .ft-bg {
        background: linear-gradient(to right,
                #ffffff 0%,
                #f0f0f0 20%,
                #e4e4e4 55%,
                #d1d1d1 75%,
                #bdbdbd 100%);
    }

</style>

<footer class="footer-text">
    <div class="footer-bottom ">
        <div class="row ft-bg d-none d-md-block">
            <div class="col-12 py-4">
                <div class="container d-flex flex-wrap justify-content-between flex-md-row flex-column text-center text-md-start ">
                    <div class="row w-100">
                        <div class="col-12 py-2">
                            <div class="footer-links">
                                <a href="{{ route('timeTable.index') }}">Ferry Timetable</a>
                                <a href="{{ route('routeMap.index') }}">Ferry Route Map</a>
                                <a href="/">Check-in Station</a>
                                <a href="/">Term & Conditions</a>
                                <a href="/">View your booking</a>
                                <a href="https://www.tigerlineferry.com/" target="_blank">Deals & Loyalty, visit us on TigerlineFerry.com</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="container d-flex flex-wrap justify-content-between flex-md-row flex-column text-center text-md-start ">
                    <div class="row w-100 d-block d-md-none">
                        <div class="col-12 py-2">
                            <div class="footer-links">
                                <a href="{{ route('timeTable.index') }}">Ferry Timetable</a>
                                <a href="{{ route('routeMap.index') }}">Ferry Route Map</a>
                                <a href="/">Check-in Station</a>
                                <a href="/">Term & Conditions</a>
                                <a href="/">View your booking</a>
                                <a href="https://www.tigerlineferry.com/" target="_blank">Deals & Loyalty, visit us on TigerlineFerry.com</a>
                            </div>
                        </div>
                    </div>

                    <div class="row w-100">
                        <div class="col-12 py-2">
                            <span class="footer-bottom-text d-none d-md-block">
                                <p>© Copyright
                                    <script>
                                        document.write(new Date().getFullYear());

                                    </script> Sirilanta Co., Ltd. All rights reserved.
                                </p>
                                <p>Use of this website indicateds your compliance with our Terms and Conditions, Terms of Use and Privacy Policy.</p>
                                <p>Indicates an external site which may or may not meet accessibility guidelines.</p>
                            </span>
                            <span class="footer-bottom-text d-block d-md-none">
                                <p>© Copyright
                                    <script>
                                        document.write(new Date().getFullYear());

                                    </script> Sirilanta Co., Ltd. All rights reserved.
                                </p>
                                <p>Use of this website indicateds your compliance with our <br>Terms and Conditions, Terms of Use and Privacy Policy.</p>
                                <p>Indicates an external site which may or may not meet <br>accessibility guidelines.</p>
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    </div>
</footer>
