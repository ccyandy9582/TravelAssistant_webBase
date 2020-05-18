<?php 
    if (!isset($_POST["country"]) || !isset($_POST["number"]) || !isset($_POST["start"]) || !isset($_POST["end"]) || !isset($_POST["transport"])) {
        require("404.php");
    } else { 
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
                    $required = 1;
                    require("database.php");
                    $sql = "INSERT INTO plan (useTransport, noOfParty, countryID, startTime, endTime, state)
                    VALUES (".$_POST["transport"].", '".$_POST["number"]."', '".$_POST["country"]."', '".$_POST["start"]."', '".$_POST["end"]."' ,0)";
                    if ($conn->query($sql) === TRUE) {
                    $ok = true;
                    $id = $conn->insert_id;
                    } else {
                        echo "alert('Error!\\r\\nPlease try again.');";
                    }
                    $conn->close();
                }
            }
        }
        echo "</script>";
        if($ok) {
?>
            <form id="gen_step1_frm" method="post" action="generatePlan">
                <input name="planid" value="<?php echo $id?>">
            </form>
            <script>
                $("#gen_step1_frm").submit();
            </script>
<?php
        }
    }
?>