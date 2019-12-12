<?php require_once('include/header.php'); ?>
<?php require_once('include/weather.php'); ?>
<?php require_once('stories/topstories.php'); ?>
<?php require_once('stories/indiastories.php'); ?>
<?php require_once('stories/worldstories.php'); ?>
<?php require_once('stories/techstories.php'); ?>
<?php require_once('stories/businessstories.php'); ?>
<?php require_once('stories/industrystories.php'); ?>


<div class="container">

    <div class="row">

    <!-- Page content holder -->
        <div class="page-content col-xl-7" id="content">

            <?php
                if(!isset($_GET['q']))      // top stories
                    get_topstories();
                else if($_GET['q'] == 'India')      // india
                    get_indiastories();
                else if($_GET['q'] == 'World')      // world
                    get_worldstories();
                else if($_GET['q'] == 'Tech' || $_GET['q'] == 'Technology')  // Technology
                    get_techstories();
                else if($_GET['q'] == 'Business')      // Business
                    get_businessstories();
                else if($_GET['q'] == 'Industry')      // Industry
                    get_industrystories();
            ?>

        </div>

    <!-- weather content -->
        <div class="weathercontent col-xl-3" id="weather">

            <?php get_weather(); ?>

        </div>

<?php require_once("include/footer.php"); ?>
