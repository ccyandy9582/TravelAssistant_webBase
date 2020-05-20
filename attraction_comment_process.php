<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!(isset($_SESSION["userid"]) && isset($_POST["val"]) && isset($_POST["attractionid"]))) {
        require("404.php");
    } else {
        if (trim($_POST["val"])!="") {
            $required = true;
            require("attraction_comment_process_text.php");
            require("database.php");
            $_POST["val"] = trim($_POST["val"]);
            
            $sql = "select name from user where userID = ".$_SESSION["userid"];
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                if ($row = $result->fetch_assoc()) {
                    if ($row["name"]!=null) {
                        $sql = "INSERT INTO attraction_comment (attractionID, userID, comment) VALUES ({$_POST["attractionid"]}, {$_SESSION["userid"]}, '{$_POST["val"]}')";
            
                        if ($conn->query($sql) === TRUE) {
                            echo "<script>location.reload();</script>";
                        }
                    } else {
?>
                        <script>
                            $('#popout1 p').html('<?php echo $attraction_comment_process_text["msg"];?>')
                            $('#popout1').show();   
                        </script>
<?php
                    }
                }
            }
            $conn->close();
        }
    }
?>