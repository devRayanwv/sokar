<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sokar.co Track your blood sugar level</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/app.css" rel="stylesheet">
    <link href="css/styles2.css" rel="stylesheet">
</head>

<body>
    <div id="mobile-menu-open" class="shadow-large">
        <i class="fa fa-bars" aria-hidden="true"></i>
    </div>
    <!-- End #mobile-menu-toggle -->
    <header>
        <div id="mobile-menu-close">
            <span>Close</span> <i class="fa fa-times" aria-hidden="true"></i>
        </div>
        <ul id="menu" class="shadow">
            <li>
                <a href="#about">About</a>
            </li>
            <li>
                <a href="#changelog">Change Log</a>
            </li>
            <li>
                <a href="#contact">Contact</a>
            </li>
        </ul>
    </header>
    <!-- End header -->

    <div id="lead">
        <div id="lead-content">
            <h1>Sokar.co</h1>
            <h3><< Demo Version >></h3>
            <a href="login" class="btn btn-info">Login / Signup</a>
        </div>
        <!-- End #lead-content -->

        <div id="lead-overlay"></div>

        <div id="lead-down">
            <span>
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
            </span>
        </div>
        <!-- End #lead-down -->
    </div>
    <!-- End #lead -->

    <div id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="heading">About Project</h2>
                </div>
                <div class="col-md-8">
                    <p>
                        The application will help diabetics by tracking their sugar level, food, time, and medicine. Then the application will represent the data through the use of graphs. Also, users can easily share their data with others.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End #about -->

    <div id="changelog" class="background-alt">
        <h2 class="heading">Change Log</h2>
        <div id="changelog-timeline">
            <div data-date="07 Jan 2017 – 10 Jan 2017">
                <h3>Propose the project</h3>
            </div>

            <div data-date="11 Jan 2017 – 20 Jan 2017">
                <h3>Analyse the project requirements</h3>
            </div>

            <div data-date="21 Jan 2017 – 15 Feb 2017">
                <h3>Created complete three use cases</h3>
                <p>1- Registration Use Case</p>
                <p>2- UpdateUserProfile Use Case</p>
                <p>3- Manage Blood Sugar Use Case</p>

            </div>

            <div data-date="17 Feb 2017 –  10 Mar 2017">
                <h3>Created complete two use cases</h3>
                <p>1- Export PDF file Use Case</p>
                <p>2- Export JSON file Use Case</p>
                <h3>Created complete two use cases - for administrator actor</h3>
                <p>1- ModifyUser Use Case</p>
                <p>2- Track System Usage Use Case</p>
            </div>

            <div data-date="11 Mar 2017 – 20 Mar 2017">
                <h3>Setting Up project environment</h3>
                <p>1- Setting up server</p>
                <p>2- Setting up Github repository. <a href="https://github.com/devRayanwv/sokar" >Here</a> </p>
            </div>
        </div>
    </div>
    <!-- End #changelog -->

    <div id="contact">
        <h2>Get in Touch</h2>
        <div id="contact-form">
            <form method="POST" action="https://formspree.io/email@email.com">
                <input type="hidden" name="_subject" value="Contact request from personal website" />
                <input type="email" name="_replyto" placeholder="Your email" required>
                <textarea name="message" placeholder="Your message" required></textarea>
                <button type="submit">Send</button>
            </form>
        </div>
        <!-- End #contact-form -->
    </div>
    <!-- End #contact -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-5 copyright">
                    <p>
                        Copyright &copy; 2017 sokar.co
                    </p>
                </div>
                <div class="col-sm-2 top">
                    <span id="to-top">
                        <i class="fa fa-chevron-up" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="col-sm-5 social">
                    <ul>
                        <li>
                            <a href="https://github.com/devRayanwv/sokar"><i class="fa fa-github" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer -->

    <script src="js/jquery.min.js"></script>
    <script src="js/scripts2.min.js"></script>
</body>

</html>
