
        <?php
            $mysqli = mysqli_connect("localhost","root","","oams_db");
            
            //check the connection
            if(mysqli_connect_errno())
            {
                echo "Failed to connect MYSQL:".mysqli_connect_errno();
            }
        ?>
