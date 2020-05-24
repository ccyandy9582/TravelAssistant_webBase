<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION["userid"])) {
?>
        <script>
            window.location.replace('home');
        </script>
<?php
    } else {
        $required=1;
        require("html_start.php");
        require("database.php");
        require("myplan_text.php");
        $userid = $_SESSION["userid"];
        if (isset($_SESSION["admin"])) {
            if (isset($_GET["name"])) {
                $sql = "SELECT userid from user where name = '{$_GET["name"]}'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    if ($row = $result->fetch_assoc()) {
                        $userid = $row["userid"];
                    }
                }
            }
            if (isset($_GET["id"])) {
                $userid = $_GET["id"];
            }
        }
?>
        <h2><?php echo $myplan_text["myplan"];?></h2>
        <table id="plantable">
            <tr>
                <th><?php echo $myplan_text["start"];?></th><th><?php echo $myplan_text["end"];?></th><th><?php echo $myplan_text["Location"];?></th><th></th><th></th> 
            </tr>
<?php
            $sql = "SELECT plan.planid,startTime,endTime,".$_SESSION["lang"]." as countryname FROM plan, user_plan,country where plan.countryid = country.countryid and plan.planid = user_plan.planid and user_plan.userid = {$userid}";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
                        <tr plan='".$row["planid"]."'>
                            <td width='10%'>".$row["startTime"]."</td><td width='10%'>".$row["endTime"]."</td><td>".$row["countryname"]."</td><td width='5%'><a href='plan?id=".$row["planid"]."' class='view'>".$myplan_text["view"]."</a></td><td width='5%'><span class='remove'>".$myplan_text["remove"]."</span></td>
                        </tr>
                    ";
                }
            }
?>
        </table>
        <script>
            $("#plantable .remove").click(function() {
                $("#load").load("removeplan",{planid: $(this).closest("tr").attr("plan"), userid: <?php echo $userid;?>});
            })
        </script>
        <h2><?php echo $myplan_text["myblog"]?></h2>
        <table id="blogtable">
            <tr>
                <th><?php echo $myplan_text["title"]?></th><th></th><th></th><th></th><th></th>
            </tr>
<?php
            $sql = "SELECT blogid,title,state FROM blog where userid = {$userid}";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if ($row["state"]==2) {
                        echo "
                            <tr blog='".$row["blogid"]."'>
                                <td>".$row["title"]."</td>
                                <td width='5%'><a href='blog?id=".$row["blogid"]."' class='view'>".$myplan_text["view"]."</a></td>
                                <td colspan='2' width='15%'>removed by admin".((isset($_SESSION["admin"]))?" <span class='undo'>undo</span>":"")."</td>
                                <td width='5%'><span class='remove'>".$myplan_text["remove"]."</span></td>
                            </tr>
                        ";
                    } else if ($row["state"]==1) {
                    echo "
                        <tr blog='".$row["blogid"]."'>
                            <td>".$row["title"]."</td>
                            <td width='5%'><a href='blog?id=".$row["blogid"]."' class='view'>".$myplan_text["view"]."</a></td>
                            <td width='5%'><a class='blogedit' href='editblog?id=".$row["blogid"]."'>".$myplan_text["edit"]."</span></td>
                            <td width='5%'><select class='privacy'><option value='0'>".$myplan_text["private"]."</option><option value='1' selected='selected'>".$myplan_text["public"]."</option></select></td>
                            <td width='5%'><span class='remove'>".$myplan_text["remove"]."</span></td>
                        </tr>
                    ";
                    } else {
                        echo "
                            <tr blog='".$row["blogid"]."'>
                                <td>".$row["title"]."</td>
                                <td width='5%'><a href='blog?id=".$row["blogid"]."' class='view'>".$myplan_text["view"]."</a></td>
                                <td width='5%'><a class='blogedit' href='editblog?id=".$row["blogid"]."'>".$myplan_text["edit"]."</span></td>
                                <td width='5%'><select class='privacy'><option value='0'>".$myplan_text["private"]."</option><option value='1'>".$myplan_text["public"]."</option></select></td>
                                <td width='5%'><span class='remove'>".$myplan_text["remove"]."</span></td>
                            </tr>
                        ";
                    }
                }
            }
?>
        </table>
        <script>
            $("#plantable .remove").click(function() {
                $("#load").load("removeplan",{planid: $(this).closest("tr").attr("plan"), userid: <?php echo $userid;?>});
            })
            $("#blogtable .remove").click(function() {
                $("#load").load("removeblog",{blogid: $(this).closest("tr").attr("blog"), userid: <?php echo $userid;?>});
            })
            $("#blogtable .privacy").change(function() {
                $("#load").load("blogprivacy",{blogid: $(this).closest("tr").attr("blog"), userid: <?php echo $userid;?>,privacy: $(this).val()});
            })
<?php
            if (isset($_SESSION["admin"])) {
?>
                $("#blogtable .undo").click(function() {
                    $("#load").load("undoremoveblog",{blogid: $(this).closest("tr").attr("blog"), userid: <?php echo $userid;?>});
                })
<?php
            }
?>
        </script>
<?php
        $conn->close();
    }
    require("html_end.php");
?>