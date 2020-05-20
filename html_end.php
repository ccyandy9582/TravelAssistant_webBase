<?php if (!isset($required)) {
    require("404.php");
} else {?>
        </div></center>
        <div id="load" style="display: none;"></div>
        <noscript style="z-index:21;top:0;position:fixed;background-color:cyan; height:100%;width:100%">
            <center style="position:relative;top:50%">ERROR: Please turn javascript on</center>
        </noscript>
        <script>
            $("img").on('error', function() {
                $(this).attr("src", "imgs/imgNotAvaliable.jpeg")
            })
        </script>
    </body>
</html>
<?php
        require("database.php");
        $sql = "select banned from user where userid = ".$_SESSION["userid"];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                if ($row["banned"] == 1) {
                    echo '
                        <script>
                            $("#load").load("logout", {"a": 1});
                        </script>
                    ';
                }
            }
        }
        $conn->close();
    }
?>