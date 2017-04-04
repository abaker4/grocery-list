<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grocery App</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="assets/styles.css" rel="stylesheet">

</head>
<body id="home" data-spy="scroll" data-target=".navbar" data-offset="100">
<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
<div class="container">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#todo">Groceri List</a>
            </li>
        </ul>
    </div>
    <a class="navbar-brand float-left mr-0 hidden-xs-down" href="#home"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Groceri</a>
</div>
</nav>

<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid">
    <div class="container text-sm-center pt-3">
        <h1 class="display-2 text-white">Groceri</h1>
        <p class="lead text-white"> Be efficient | Build a list</p>
        <div class="btn-group" role="group" aria-label="Basic example">
            <a class="btn btn-primary btn-lg" href="#todo">Create List</a>
        </div>
    </div>
</div>
 <!-- /jumbotron -->

<div id="about" class="container pt-2">
    <!-- About -->
    <div class="row">
        <div class="col-lg-8 lg-push-4">
            <h2 class="mb-2">About Groceri</h2>
            <p>Groceri is a full service inventory management platform that is both user-friendly and powerful at the same time.</p>
            <p>Through its proprietary content-management engine, users are able to use their time more efficiently and stay on top of their daily Groceri needs. <a href="#"> See what our customers are saying about Groceri.</a></p>
            <blockquote class="blockquote blockquote-reverse text-muted">
                <p class="mb-0">Groceri has saved my company time and money in ways I couldn't have imagined. Everyone should adopt their platform.</p>
                <footer class="blockquote-footer">Jeff Bezos <cite title="Source Title">Amazon CEO</cite></footer>
            </blockquote>
        </div>

<!--        <div class="col-lg-4 lg-pull-4">-->
<!--            <h3 class="mb-2">Expert Speakers</h3>-->
<!--            <p>Our expert speaker lineup was just announced, so don't wait too long before grabbing your tickets!</p>-->
<!--            <p>Want to meet the international JavaScript community and share skills with some of the world's top experts, hackers, and makers? Be the first to know what to expect for the future of JavaScript.</p>-->
<!--            <p>Full Stack Conf is committed to being inclusive and welcoming for everyone. We look forward to another intensive day of learning and sharing.</p>-->
<!---->
<!--        </div>-->
        <div class="col-lg-4 lg-pull-4 mb-4">
            <h2 class="mb-2">What Groceri Provides</h2>
            <div class="list-group">
                <a href="#" class="list-group-item"><strong>Scalability</strong>: Customize any type of list</a>
                <a href="#" class="list-group-item"><strong>Efficiency</strong>: Updates in real time </a>
                <a href="#" class="list-group-item"><strong>Portability</strong>: Access from around the globe</a>
                <a href="#" class="list-group-item"><strong>Intelligence</strong>: Predictive search based off of data analytics</a>
                <a href="#" class="list-group-item"><strong>Reliability</strong>: 24/7 customer service</a>
            </div>
        </div>
    </div>
</div><!-- About -->

<div id="jumbotron" class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-block">
                        <div>
                            <h1 id="todo">Groceri List</h1>
                            <input type="text" class="form-control" placeholder="Add Item">
                            <button class="btn btn-success mt-2">Mark all as done</button>

                            <hr>
                            <ul class="list-unstyled">
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value=""> Milk</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value=""> Bread</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value=""> Eggs</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
              </div>
            </div>
            <div class="col-md-6 float-right mr-0">
                <div class="card">
                    <div class="card-block">
                        <div>
                            <h1>Completed Items</h1>
                            <ul class="list-unstyled">
                                <li><del>Some item </del><button class="remove-item btn btn-default btn-xs pull-right"><span><i class="fa fa-times-circle" aria-hidden="true"></i></span></button></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 <!-- /jumbotron -->




<!--footer-->

<div class="footer-middle">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <!--Column1-->
                <div class="footer-pad">
                    <h4>Address</h4>
                    <address>
                        <ul class="list-unstyled">
                            <li>
                                123<br>
                                Anywhere Street<br>
                                Anywhere<br>
                                USA, 12345<br>
                            </li>
                        </ul>
                    </address>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <!--Column1-->
                <div class="footer-pad">
                    <h4>Popular Services</h4>
                    <ul class="list-unstyled">
                        <li><a href="#"></a></li>
                        <li><a href="#">Payment Center</a></li>
                        <li><a href="#">Contact Directory</a></li>
                        <li><a href="#">Forms</a></li>
                        <li><a href="#">News and Updates</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <!--Column1-->
                <div class="footer-pad">
                    <h4>Resources</h4>
                    <ul class="list-unstyled">
                        <li><a href="#"></a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Testimonials</a></li>
                        <li><a href="#">Our Team</a></li>
                        <li><a href="#">Join Us</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <!--Column1-->
                <div>
                    <h4>Website Information</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">Accessibility</a></li>
                        <li><a href="#">Disclaimer</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">FAQs</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="footer-bottom">
    <div class="container my-4">
        <div class="row">
            <div class="col-xs-12 col-lg-12">
                <!--Footer Bottom-->
                <p class="text-center">&copy; Copyright 2017 - City of USA.  All rights reserved.</p>
            </div>
        </div>
    </div>
</div>
</footer>


<!--footer-->




<!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/8dd28529fa.js"></script>
    <script type="text/javascript" src="assets/main.js"></script>
</body>
</html>

