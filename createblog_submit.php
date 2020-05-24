<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(!(isset($_POST["title"]) && isset($_SESSION["userid"]) && isset($_POST["content"]) && isset($_POST["planid"]))) {
        require("404.php");
    } else {
        $required = 1;
        require("createblog_submit_text.php");
        if (empty(trim($_POST["title"]))) {
            echo  "<script>alert('Please enter a title')</script>";
        } else {
            $required = true;
            require("database.php");
            $sql = "select name from user where userID = ".$_SESSION["userid"];
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                if ($row = $result->fetch_assoc()) {
                    if ($row["name"]!=null) {
                        $sql = "INSERT into blog (userid,planid,title,content) VALUES (".$_SESSION["userid"].",".$_POST["planid"].",'".addslashes($_POST["title"])."','".addslashes($_POST["content"])."')";
                        if ($conn->query($sql) === TRUE) {
                            echo "
                                <script>
                                window.location.replace('myplan');
                                </script>
                            ";
                        } else {
                            echo "<script>alert('Error');</script>";
                        }
                    } else {
?>
                        <script>
                            $('#popout1 p').html('<?php echo $createblog_submit_text["msg"];?>')
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