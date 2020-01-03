<?php require_once('include/header.php'); ?>
<?php require_once('include/weather.php'); ?>
            <!-- stories -->
<?php require_once('stories/topstories.php'); ?>
<?php require_once('stories/indiastories.php'); ?>
<?php require_once('stories/worldstories.php'); ?>
<?php require_once('stories/techstories.php'); ?>
<?php require_once('stories/budgetstories.php'); ?>
<?php require_once('stories/businessstories.php'); ?>
<?php require_once('stories/industrystories.php'); ?>
<?php require_once('stories/entertainmentstories.php'); ?>
<?php require_once('stories/sciencestories.php'); ?>
<?php require_once('stories/sportsstories.php'); ?>

<div class="container">

    <div class="row">

    <!-- Page content holder -->
        <div class="page-content col-lg-8">

            <?php
                if(!isset($_GET['q']))
                    get_topstories();
                else if($_GET['q'] == 'India')
                    get_indiastories();
                else if($_GET['q'] == 'World')
                    get_worldstories();
                else if($_GET['q'] == 'Tech' || $_GET['q'] == 'Technology')
                    get_techstories();
                else if($_GET['q'] == 'Budget')
                    get_budgetstories();
                else if($_GET['q'] == 'Business')
                    get_businessstories();
                else if($_GET['q'] == 'Industry')
                    get_industrystories();
                else if($_GET['q'] == 'Entertainment')
                    get_entertainmentstories();
                else if($_GET['q'] == 'Science')
                    get_sciencestories();
                else if($_GET['q'] == 'Sports')
                    get_sportsstories();
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


<?php require_once("include/footer.php"); ?>
