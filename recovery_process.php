<?php 
    if(!isset($_POST["email"])) {
        require("404.php");
    } else {
        session_start();
        $_POST["email"] = addslashes($_POST["email"]);
        $email = trim($_POST["email"]);
        $required = 1;
        require("recovery_process_text.php");
        require("database.php");
        $secret=md5(uniqid(rand(), true));
        $sql = "SELECT activated FROM user WHERE email='$email' AND activated = 0 AND TIMESTAMPDIFF(SECOND,action_time , now()) <= 1800";
        $result = $conn->query($sql);
        $activated = true;
        if ($result->num_rows > 0) {
            $activated = false;
?>
            <script>
                $("#recovery_form").find("input[name='email']").next().text("* <?php echo $recovery_process_text["activemail"]?>");
            </script>
<?php
        }
        if ($activated) {
            $sql = "UPDATE user SET action_time=now(),secret='$secret' WHERE email='$email'";

            if ($conn->query($sql) === TRUE) {
                if (mysqli_affected_rows($conn) > 0) {
                    require("mail_recovery.php");
                }
            ?>
            <script>
                $("#popout p").html("<?php echo $recovery_process_text["emailsent"]?>");
                $("#popout").show();
            </script>
            <?php
            } else {
                echo "<script>alert('Error!')</script>";
            }
        }

        $conn->close();
    }
?>