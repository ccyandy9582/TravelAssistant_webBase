<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!(isset($_SESSION["userid"]) && isset($_POST["val"]) && isset($_POST["blogid"]))) {
        require("404.php");
    } else {
        if (trim($_POST["val"])!="") {
            $required = true;
            require("blog_comment_process_text.php");
            require("database.php");
            $_POST["val"] = trim($_POST["val"]);
            
            $sql = "select name from user where userID = ".$_SESSION["userid"];
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                if ($row = $result->fetch_assoc()) {
                    if ($row["name"]!=null) {
                        $sql = "INSERT INTO blog_comment (blogID, userID, comment) VALUES ({$_POST["blogid"]}, {$_SESSION["userid"]}, '{$_POST["val"]}')";
            
                        if ($conn->query($sql) === TRUE) {
                            echo "
                                <script>
                                    $('#blog_commentSection_list').load('blog_commentSection',{blogid:".$_POST["blogid"]."});
                                </script>
                            ";
                        }
                    } else {
?>
                        <script>
                            $('#popout1 p').html('<?php echo $blog_comment_process_text["msg"];?>')
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