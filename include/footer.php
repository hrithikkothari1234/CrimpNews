        <footer>
            <div class="pull-left">
                <img src="public/images/icon.jpg" onclick="document.documentElement.scrollTop = 0;">
            </div>
            <span>
                <h7>
                    Crimp News is an online platform to help management students get the important day to day business news inorder to
                    ease their task of reading industry reports , podcast and other articles which will improve their performance during
                    Group Discussion and in Interviews.
                </h7>
            </span>
        </footer>

        <div class="lower-footer">
            <div class="pull-left">
                <span id="year">
                </span>
                <h7 onclick="document.documentElement.scrollTop = 0;">
                    | Crimp News
                </h7>
            </div>
            <div class="pull-right">
                <h5 class="scroll-top-btn" onclick="document.documentElement.scrollTop = 0;">
                    <i class="fa fa-angle-up fa-fw"></i>
                </h5>
            </div>
        </div>
        <!-- footer ends-->

        <!-- script cdns -->
        <script
        src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>

        <script>
            // Get the current year for the copyright
            $('#year').text(new Date().getFullYear());
            
            // search to work when enter-key pressed
            $(".search-input").keyup(function(event) {
                if (event.keyCode === 13) {
                    search();
                }
            });

            // search clicked
            function search(){
                var value = $(".search-input").val();
                window.location.replace('index.php?q='+value);
            }
        </script>

    </body>

</html>
