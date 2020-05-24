<?php 
    if (!((isset($_POST["country"]) && isset($_POST["number"]) && isset($_POST["start"]) && isset($_POST["end"]) && isset($_POST["transport"])) xor (isset($_POST["planid"]) && isset($_POST["edit"]) && isset($_POST["date"])))) {
        require("404.php");
    } else { 
        $required = 1;
        require("database.php");
        if (!isset($_POST["edit"])) {
            echo "<script>";
            if (!in_array($_POST["transport"],array("true","false"))) {
                echo "alert('Error!\\r\\nPlease try again.');";
            } else if ($_POST["country"]<1 || !is_numeric($_POST["country"])) {
                echo "alert('please choose a country.');";
            } else if ($_POST["number"]<1 || !is_numeric($_POST["number"])) {
                echo "alert('please enter the number of participate.');";
            } else {
                $start=explode("-",$_POST["start"]);
                if (sizeOf($start)!=3) {
                    echo "alert('please enter the start date.');";
                } else if (!checkdate($start[1],$start[2],$start[0])) {
                    echo "alert('Error!\\r\\nPlease try again.');";
                } else if (strtotime($start[0]."-".$start[1]."-".$start[2]) <= strtotime('today')) {
                    echo "alert('Please enter a future date');";
                } else {
                    $end=explode("-",$_POST["end"]);
                    if (sizeOf($end)!=3) {
                        echo "alert('please enter the end date.');";
                    } else if (!checkdate($end[1],$end[2],$end[0])) {
                        echo "alert('Error!\\r\\nPlease try again.');";
                    } else if (strtotime($end[0]."-".$end[1]."-".$end[2]) < strtotime($start[0]."-".$start[1]."-".$start[2])) {
                        echo "alert('There\\'s some error in the dates.');";
                    } else {
                        $sql = "INSERT INTO plan (useTransport, noOfParty, countryID, startTime, endTime, state)
                        VALUES (".$_POST["transport"].", '".$_POST["number"]."', '".$_POST["country"]."', '".$_POST["start"]."', '".$_POST["end"]."' ,0)";
                        if ($conn->query($sql) === TRUE) {
                        $ok = true;
                        $id = $conn->insert_id;
                        } else {
                            echo "alert('Error!\\r\\nPlease try again.');";
                        }
                    }
                }
            }
            echo "</script>";
            $_POST["edit"] = 0;
            $_POST["plaid"] = -1;
        } else {
            $sql = "SELECT useTransport, noOfParty, countryID, DATEDIFF(endTime, startTime) as day from plan where planid = ".$_POST["planid"];
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                if ($row = $result->fetch_assoc()) {
                    $sql = "INSERT INTO plan (useTransport, noOfParty, countryID, startTime, endTime, state)
                    VALUES (".$row["useTransport"].", '".$row["noOfParty"]."', '".$row["countryID"]."', '".$_POST["date"]."', DATE_ADD('".$_POST["date"]."',INTERVAL ".$row["day"]." DAY) ,0)";
                    if ($conn->query($sql) === TRUE) {
                    $ok = true;
                    $id = $conn->insert_id;
                    } else {
                        echo $sql;
                        echo "<script>alert('Error!\\r\\nPlease try again.');</script>";
                    }
                }
            }
            $_POST["edit"] = 1;
        }
        $conn->close();
        if($ok) {
?>
            <form id="gen_step1_frm" method="post" action="generatePlan">
                <input name="planid" value="<?php echo $id?>">
                <input name="planold" value="<?php echo $_POST["planid"]?>">
                <input name="edit" value="<?php echo $_POST["edit"]?>">
            </form>
            <script>
                $("#gen_step1_frm").submit();
            </script>
<?php
        }
    }
?>