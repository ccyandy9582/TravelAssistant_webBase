<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(!(isset($_POST["planid"]) && isset($_SESSION["userid"]))) {
        require("404.php");
    } else {
        $required = true;
        require("database.php");
        echo $sql = "Update plan set state = 3 where planid = {$_POST["planid"]} and state = 2";
        if ($conn->query($sql) === TRUE) {
            if (mysqli_affected_rows($conn) == 1) {
?>
                <script>
                    $(".loading").show();
                    setInterval(function(){ 
                        $("#load").load("gen_step3",{"planid":<?php echo$_POST["planid"]?> });
                    }, 5000);
                </script>
<?php
            } else {
                echo "<script>alert('Error');</script>";
            }
        } else {
            echo "<script>alert('Error');</script>";
        }
        $conn->close();
    }
?>