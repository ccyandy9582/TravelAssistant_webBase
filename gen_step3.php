<?php 
    if (!isset($_POST["planid"])) {
        require("404.php");
    } else {
        $required=1;
        require("database.php");
        $sql = "select state from plan where planID = ".$_POST["planid"];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                if ($row["state"]==2) {
                    echo "
                    <form id='gen_step3_frm' action='resultPage' method='post'>
                        <input name='planid' type='hidden' value='".$_POST["planid"]."'>
                    </form>
                    <script>
                        $('#gen_step3_frm').submit();
                    </script>";
                }
            }
        }
        $conn->close();
    }
?>