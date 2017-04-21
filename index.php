<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grocery App</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
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
                <a class="nav-link" href="#test">Groceri List</a>
            </li>
        </ul>
    </div>
    <a id ="nav-header" class="navbar-brand float-left mr-0 hidden-xs-down" href="#home"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Groceri</a>
</div>
</nav>

<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid mb-0">
    <div class="container text-sm-center pt-3">
        <h1 id = "main-header" class="display-2 text-white">Groceri</h1>
        <p id="sub-header" class="lead text-white"> Be efficient | Build a list</p>
        <div class="btn-group" role="group" aria-label="Basic example">
            <a class="btn btn-primary btn-lg" href="#test" data-toggle="modal" data-target="#createListModal">Create List</a>
        </div>
    </div>
</div>
<!-- /jumbotron -->
<!--<div id="about" class="container pt-2">-->
<!--    <!-- About -->
<!--    <div class="row">-->
<!--        <div class="col-lg-8 lg-push-4">-->
<!--            <h2 class="mb-2">About Groceri</h2>-->
<!--            <p>Groceri is a full service inventory management platform that is both user-friendly and powerful at the same time.</p>-->
<!--            <p>Through its proprietary content-management engine, users are able to use their time more efficiently and stay on top of their daily Groceri needs. <a href="#"> See what our customers are saying about Groceri.</a></p>-->
<!--            <blockquote class="blockquote blockquote-reverse text-muted">-->
<!--                <p class="mb-0">Groceri has saved my company time and money in ways I couldn't have imagined. Everyone should adopt their platform.</p>-->
<!--                <footer class="blockquote-footer">Jeff Bezos <cite title="Source Title">Amazon CEO</cite></footer>-->
<!--            </blockquote>-->
<!--        </div>-->
<!---->
<!---->
<!--        <div class="col-lg-4 lg-pull-4 mb-4">-->
<!--            <h2 class="mb-2">What Groceri Provides</h2>-->
<!--            <div class="list-group">-->
<!--                <a href="#" class="list-group-item"><strong>Scalability</strong>: Customize any type of list</a>-->
<!--                <a href="#" class="list-group-item"><strong>Efficiency</strong>: Updates in real time </a>-->
<!--                <a href="#" class="list-group-item"><strong>Portability</strong>: Access from around the globe</a>-->
<!--                <a href="#" class="list-group-item"><strong>Intelligence</strong>: Predictive search based off of data analytics</a>-->
<!--                <a href="#" class="list-group-item"><strong>Reliability</strong>: 24/7 customer service</a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<div id="jumbotron" class="jumbotron jumbotron-fluid mt-8">
    <div id="test"></div>
</div>
<!-- /grocery list


<!--footer-->
<footer>
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
<div class="modal fade" id="createListModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add List</h4>
            </div>
            <div class="modal-body">
            <input type="text" id="listTitle" class="form-control"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveListButton">Save List</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/8dd28529fa.js"></script>
    <script type="text/javascript" src="assets/main.js"></script>
</body>
</html>

