<?php require_once('include/sessions.php'); ?>
<?php require_once('include/header.php'); ?>

<?php
    if(isset($_POST["subscribe"])){
        require_once('include/db.php');

        $name = $_POST["name"];
        $email = $_POST["email"];
        if(!$name || !$email)
            $_SESSION["ErrorMessage"]="Name or Email missing.";
        $connection;
        $connectingdb;
        if( $connectingdb ){
            $query = "SELECT * FROM subscribed_users where email = '{$email}'";
            $Execute=mysqli_query($connection, $query);
            if($Execute->num_rows){
                $_SESSION["ErrorMessage"]="Email already subscribed.";
            }
            else{
                $query = "INSERT INTO subscribed_users VALUES('$name','$email')";
                $Execute=mysqli_query($connection,$query);
                if($Execute)
                    $_SESSION["SuccessMessage"]="Subscribed Succesfully.";
                else
                    $_SESSION["ErrorMessage"]="Something Went wrong,try again..";
            }
        }
        else{
            $_SESSION["ErrorMessage"]="Server Error , try again later!";
        }

        mysqli_close($connection);
    }
?>

<div class="container">
    <div class="row">
        <!-- Subscribe Page content holder -->
        <div class="col-lg-8 subscribe-page-content">
            <div class="card p-4">
                <div class="card-body">
                    <?php echo errormessage(); echo successmessage(); ?>
                    <h3 class="text-center" style="font-family: Playfair Display, serif;">
                        GET MORE STUFF
                    </h3>
                    <h6 class="text-center text-muted">Subscribe us for latest letters </h6>
                    <hr>
                    <form action="subscribe.php" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                   <input type="email" class="form-control" placeholder="Email" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-info btn-lg btn-block" type="submit" name="subscribe">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <h7>
                        We respect your privacy and take protecting it very seriously.
                    </h7>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once("include/footer.php"); ?>
