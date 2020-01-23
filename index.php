<?php require_once('include/header.php'); ?>
<?php require_once('include/weather.php'); ?>
<?php require_once('stories/topstories.php'); ?>


<!-- search field visible when icon clicked -->
<div class="row search-field" id="search-box">
    <div class="offset-sm-2 col-sm-8">
        <div class="row mb-4">
            <div class="form-group col-sm-10">
                <input type="text" placeholder="Search topics or categories" 
                class="search-input form-control form-control-underlined" autofocus>
            </div>
            <div class="form-group col-sm-2">
                <button class="btn btn-primary rounded-pill btn-block shadow-sm" onclick="search()">
                <i class="fa fa-search"></i> &nbsp; Search 
                </button>
            </div>
        </div>
    </div>
</div>

<div class="container">

    <div class="row">

    <!-- Page content holder -->
        <div class="page-content col-lg-8">

            <?php
                //Stories
                if(!isset($_GET['q']))
                    get_topstories();
                else if($_GET['q'] == 'India')
                    require_once('stories/indiastories.php');
                else if($_GET['q'] == 'World')
                    require_once('stories/worldstories.php');
                else if($_GET['q'] == 'Tech' || $_GET['q'] == 'Technology')
                    require_once('stories/techstories.php');
                else if($_GET['q'] == 'Budget')
                    require_once('stories/budgetstories.php');
                else if($_GET['q'] == 'Business')
                    require_once('stories/businessstories.php');
                else if($_GET['q'] == 'Industry')
                    require_once('stories/industrystories.php');
                else if($_GET['q'] == 'Entertainment')
                    require_once('stories/entertainmentstories.php');
                else if($_GET['q'] == 'Science')
                    require_once('stories/sciencestories.php');
                else if($_GET['q'] == 'Sports')
                    require_once('stories/sportsstories.php');
                else
                    require_once('stories/searchstories.php');
            ?>

        </div>

        <div class="offset-lg-1 col-lg-3 side-col-content">

            <h6 class="weather-container-title-box">
                Weather
            </h6>
            <hr class="news-container-title-box-hr">

            <div class="weather-widget">
                <?php get_weather(); ?>
            </div>

            <div class='top-news'>
                <h6>
                    Top News
                </h6>
                <?php get_topheadlines(); ?>
                <a href='#' id="topHeadlines" target="_blank"> </a>
            </div>

        </div>

    </div>

</div>

<script type="text/javascript" src="public/js/index.js"></script>

<?php require_once("include/footer.php"); ?>
