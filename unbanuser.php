<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION["admin"])) {
        require("404.php");
    } else {
        $required = 1;
        require("database.php");
        require("html_start.php");
        ?>
                <table border="1">
                    <tr><th>email</th><th>display name</th><th></th></tr>
        <?php
        $sql = "SELECT email, name, userid from user where banned = 1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["email"]."</td><td>".$row["name"]."</td><td><span class='ban' user='".$row["userid"]."'>unban</span></td></tr>";
            }
        }
        $conn->close();
?> 
        </table>
        <script>
            $('.ban').click(function() {
                $('#load').load('ban',{banned: 1, user: $(this).attr('user')});
            })
        </script>
<?php
        require("html_end.php");
    }
?>
