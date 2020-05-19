<?php 
    if (!isset($_POST["name"])) {
        require("404.php");
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $required = true;
        require("ch_displayName_process_text.php");
        $_POST["name"] = trim($_POST["name"]);
        if ($_POST["name"] == "") {
?> 
            <script>
                $('#ch_displayName_frm span').eq(0).text('* <?php echo $ch_displayName_process_text["pwsame"];?>');
            </script>
<?php
        } else {
            require("database.php");
            $sql = "UPDATE user set name = '{$_POST["name"]}' where userid = {$_SESSION["userid"]}";
            if ($conn->query($sql) === TRUE) {
                echo "
                    <script>
                        location.reload();
                    </script>
                ";
            } else {
?> 
                <script>
                    $('#ch_displayName_frm span').eq(0).text('* <?php echo $ch_displayName_process_text["used"];?>');
                </script>
<?php
            }
            $conn->close();
        }
    } 
?>