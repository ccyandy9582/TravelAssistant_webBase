<?php
    if(!$_POST["load"]) {
        require("404.php");
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $required = true;
        require("setting_name_text.php");
        require("database.php");
        $sql = "select name from user where userid=".$_SESSION["userid"];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()) {
                $displayName = $row["name"];
            }
        }
        $conn->close();
?>
        <h2><?php echo $setting_name_text["ch_dname"];?></h2>
        <form id="ch_displayName_frm">
            <?php echo $displayName==null?"":$setting_name_text["currentName"]." : ".$displayName."<br>"; ?>
            <input type="text" name="name">
            <span></span><br><br>
            <button><?php echo $setting_name_text["submit"];?></button>
        </form>
        <script>
            $("#ch_displayName_frm").submit(function(e) {
                e.preventDefault();
                $("#load").load("ch_displayName_process",$(this).serializeArray());
            })
        </script>
<?php
    }
?>