<?php require_once('include/sessions.php'); ?>
<?php require_once('include/header.php'); ?>

<?php
    if(isset($_POST["subscribe"])){
        require_once('include/db.php');

        error_reporting(0);

        $name = $_POST["name"];
        $email = $_POST["email"];
        $age = $_POST["age"];
        $sex = $_POST["sex"];
        $occupation = $_POST["occupation"];
        if(!$name || !$email)
            $_SESSION["ErrorMessage"]="Name or Email missing.";
        $con;
        if( $con ){
            $age = !empty($age) ? $age : NULL;
            $sex = !empty($sex) ? $sex : NULL;
            $occupation = !empty($occupation) ? $occupation : NULL;

            $stmt = $con->prepare("SELECT * FROM subscribed_users where email = ?");
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $stmt->store_result();
            $numRows = $stmt->num_rows;
            if($numRows > 0){
                $_SESSION["ErrorMessage"]="Email already subscribed.";
            }
            else{
                $stmt = $con->prepare("INSERT INTO subscribed_users(name, email, age, sex, occupation)
                VALUES(?,?,?,?,?)");
                $stmt->bind_param('sssss', $name, $email, $age, $sex, $occupation);
                $stmt->execute();
                if($stmt->affected_rows === -1)
                    $_SESSION["ErrorMessage"]="Something Went wrong,try again..";
                else{
                    $stmt->close();
                    $_SESSION["SuccessMessage"]="Subscribed Succesfully.";
                }
            }
            $con->close();
        }
        else{
            $_SESSION["ErrorMessage"]="Server Error , try again later!";
        }

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
                                    <h6>Name * </h6>
                                    <input type="text" class="form-control" placeholder="Name" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h6>Email * </h6>
                                   <input type="email" class="form-control" placeholder="Email" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h6>Age</h6>
                                    <input type="number" class="form-control" placeholder="Age" name="age">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h6>Sex</h6>
                                    <input type="radio" name="sex" value="male"> Male &nbsp;
                                    <input type="radio" name="sex" value="female"> Female &nbsp;
                                    <input type="radio" name="sex" value="other"> Other
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h6>Occupation </h6>
                                   <input type="text" class="form-control" placeholder="Occupation" name="occupation">
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
