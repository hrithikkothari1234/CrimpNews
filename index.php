<?php require_once('include/header.php'); ?>
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
        <div class="page-content col-lg-12">

            <!-- container for 3 news category cards -->
            <div class="container" style="margin-top: 1rem;">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-sm-12 news-category-card">
                        <h6>
                            Tech
                        </h6>
                        <hr>
                        <div class="imgBox">
                            <img src="https://source.unsplash.com/random/?tech"
                            onclick="window.location.href='index.php?q=Tech'"
                            alt="Tech-img">
                        </div>
                        <a href="index.php?q=Tech"> Latest Technical News </a>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-sm-12 news-category-card">
                        <h6>
                            Business
                        </h6>
                        <hr>
                        <div class="imgBox">
                            <img src="https://source.unsplash.com/random/?business"
                            onclick="window.location.href='index.php?q=Business'"
                            alt="Firm-img">
                        </div>
                        <a href="index.php?q=Business"> Latest Business News </a>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-sm-12 news-category-card">
                        <h6>
                            World
                        </h6>
                        <hr>
                        <div class="imgBox">
                            <img src="https://source.unsplash.com/random/?World"
                            onclick="window.location.href='index.php?q=World'"
                            alt="World-img">
                        </div>
                        <a href="index.php?q=World"> Latest World News </a>
                    </div>
                </div>
            </div>
            <!-- container ends -->

            <!-- Actual News Stories -->
            <?php
                if(!isset($_GET['q']))     // top stories
                    get_topstories();  // display top stories
                else if($_GET['q'] == 'India')      // india
                    get_indiastories();
                else if($_GET['q'] == 'World')      // world
                    get_worldstories();
                else if($_GET['q'] == 'Tech' || $_GET['q'] == 'Technology')  // Technology
                    get_techstories();
                else if($_GET['q'] == 'Budget') //   Budget
                    get_budgetstories();
                else if($_GET['q'] == 'Business')      // Business
                    get_businessstories();
                else if($_GET['q'] == 'Industry')      // Industry
                    get_industrystories();
                else if($_GET['q'] == 'Entertainment') //   Entertainment
                    get_entertainmentstories();
                else if($_GET['q'] == 'Science') //   Science
                    get_sciencestories();
                else if($_GET['q'] == 'Sports') //   Sports
                    get_sportsstories();
            ?>

        </div>

    </div>

</div>


<?php require_once("include/footer.php"); ?>
