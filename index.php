<?php require_once('include/header.php'); ?>
<?php require_once('include/weather.php'); ?>
<?php require_once('include/topstories.php'); ?>

<div class="container">

    <div class="row">

    <!-- Page content holder -->
        <div class="page-content col-xl-7" id="content">

            <h5 style="padding-bottom: 2%;"> Headlines </h5>
            <?php get_topstories(); ?>

        </div>

    <!-- weather content -->
        <div class="weathercontent col-xl-3" id="weather">

            <?php get_weather(); ?>

        </div>

<?php require_once("include/footer.php"); ?>
