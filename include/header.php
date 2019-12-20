<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">

    <title> Crimp News</title>
    <link rel = "icon"
    href = "https://www.crimpnews.in/wp-content/uploads/2019/08/cropped-Crimp-News-2-e1566650875324-1-192x192.png"
    type = "image/x-icon">

</head>

<body>

    <!-- horizontal nav -->
    <div class="horizontal-nav">
        <!-- Toggle button -->
        <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4">
            <i class="fa fa-bars mr-2"></i>
        </button>

        <span class="m-0">
            <u>Crimp News</u>
        </span>

        <!-- Search form -->
        <div class="input-group search">
            <input class="form-control search-field" type="search" placeholder="&#xF002;" style="font-family:Arial, FontAwesome">
            <div class="input-group-append">
                <div class="input-group-text">
                    <i class="fa fa-search" onclick="search()"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Vertical navbar -->
    <div class="vertical-nav bg-white" id="sidebar">
        <ul class="nav flex-column bg-white mb-0">
            <li class="nav-item">
                <a href="/" class="nav-link text-dark bg-light">
                    <i class="fa fa-newspaper-o mr-3 text-primary fa-fw"></i>
                    Top Stories
                </a>
            </li>
            <hr>
            <li class="nav-item">
                <a href="/?q=India" class="nav-link text-dark">
                    <i class="fa fa-flag mr-3 text-primary fa-fw"></i>
                    India
                </a>
            </li>
            <li class="nav-item">
                <a href="/?q=World" class="nav-link text-dark">
                    <i class="fa fa-globe mr-3 text-primary fa-fw"></i>
                    World
                </a>
            </li>
            <li class="nav-item">
                <a href="/?q=Tech" class="nav-link text-dark">
                    <i class="fa fa-desktop mr-3 text-primary fa-fw"></i>
                    Technology
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?q=Budget" class="nav-link text-dark">
                    <i class="fa fa-money mr-3 text-primary fa-fw"></i>
                    Budget
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?q=Business" class="nav-link text-dark">
                    <i class="fa fa-pencil mr-3 text-primary fa-fw"></i>
                    Business
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?q=Industry" class="nav-link text-dark">
                    <i class="fa fa-industry mr-3 text-primary fa-fw"></i>
                    Industry
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?q=Entertainment" class="nav-link text-dark">
                    <i class="fa fa-gamepad mr-3 text-primary fa-fw"></i>
                    Entertainment
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?q=Science" class="nav-link text-dark">
                    <i class="fa fa-flask mr-3 text-primary fa-fw"></i>
                    Science
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?q=Sports" class="nav-link text-dark">
                    <i class="fa fa-bicycle mr-3 text-primary fa-fw"></i>
                    Sports
                </a>
            </li>
            <hr>
            <li class="nav-item">
                <a href="index.php?q=Earlier" class="nav-link text-dark">
                    <i class="fa fa-hourglass-end mr-3 text-primary fa-fw"></i>
                    Earlier News
                </a>
            </li>
            <li class="nav-item">
                <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=simranjeet@crimpnews.in" target="_blank" class="nav-link text-dark">
                    <i class="fa fa-comments mr-3 text-primary fa-fw"></i>
                    Send Feedback
                </a>
            </li>
            <li class="nav-item">
                <a href="subscribe.php" class="nav-link text-dark">
                    <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                    Subscribe
                </a>
            </li>
            <li class="nav-item">
                <a href="aboutus.php" class="nav-link text-dark">
                    <i class="fa fa-user mr-3 text-primary fa-fw"></i>
                    About Us
                </a>
            </li>
            <li class="nav-item copyright">
                <span id="year"></span>
                <a href="/">
                    <i>Crimp News </i>
                </a>
            </li>
            <div style="height: 90px;">
                <!--extra div for scrolling through upto copyright on smaller device-->
            </div>
        </ul>
    </div>

    <!-- End vertical navbar -->
