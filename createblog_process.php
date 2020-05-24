<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!(isset($_SESSION["userid"]) && isset($_POST["planid"]))) {
        require("404.php");
    } else {
        $required = 1;
        require("database.php");
        $sql = "SELECT planid from user_plan WHERE userid = {$_SESSION["userid"]} and planid = {$_POST["planid"]}";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $sql = "SELECT blogid from blog WHERE userid = {$_SESSION["userid"]} and planid = {$_POST["planid"]}";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
?>
                    <script>
                        alert("You have created a blog for this plan already.");
                    </script>
<?php
            } else {
?>
                    <form id="createblog_process_frm" method="post" action="createblog">
                        <input type="hidden" value="<?php echo $_POST["planid"];?>" name="planid">
                    </form>
                    <script>
                        $("#createblog_process_frm").submit();
                    </script>
<?php
            }
        } else {
?>
            <script>
                alert("Error");
            </script>
<?php
        }
        $conn->close();
    }
?>