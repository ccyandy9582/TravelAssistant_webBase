<?php
    print_r($_POST);
    if (!isset($_POST["start"]) || !isset($_POST["end"]) || !isset($_POST["place"]) || !isset($_POST["hotel"]) || !isset($_POST["plan"])) {
        require("404.php");
    } else {
        $required=1;
        require("database.php");
        // $sql = "UPDATE plan set state = 1 WHERE state = 0 AND planID = '{$_POST["plan"]}'";
        // if ($conn->query($sql) === TRUE) {
            if (is_array($_POST["start"]["place"])) {
                if ($_POST["start"]["place"]["id"]!=null) {
                    $id_field = "attractionID";
                    $id = $_POST["start"]["place"]["id"];
                } else if ($_POST["start"]["place"]["gid"]!=null) {
                    $id_field = "googleId";
                    $id = $_POST["start"]["place"]["gid"];
                }
                $sql = 'INSERT INTO plan_content (planID, '.$id_field.', duration, start_time, type) VALUES ("'.$_POST["plan"].'", "'.$id.'", "'.$_POST["start"]["place"]["spend"].'", "';
                $sql .= str_pad($_POST["start"]["place"]["start_h"], 2, 0, STR_PAD_LEFT).":".str_pad($_POST["start"]["place"]["start_m"], 2, 0, STR_PAD_LEFT).'",0)';
                $conn->query($sql); 
                echo $sql;
            }
            if (is_array($_POST["end"]["place"])) {
                if ($_POST["end"]["place"]["id"]!=null) {
                    $id_field = "attractionID";
                    $id = $_POST["end"]["place"]["id"];
                } else if ($_POST["end"]["place"]["gid"]!=null) {
                    $id_field = "googleId";
                    $id = $_POST["end"]["place"]["gid"];
                }
                $sql = 'INSERT INTO plan_content (planID, '.$id_field.', start_time, type) VALUES ("'.$_POST["plan"].'", "'.$id.'", "';
                $sql .= str_pad($_POST["end"]["place"]["start_h"], 2, 0, STR_PAD_LEFT).":".str_pad($_POST["end"]["place"]["start_m"], 2, 0, STR_PAD_LEFT).'",3)';
                $conn->query($sql); 
            }
            if (is_array($_POST["place"]["place"])) {
                for ($i = 0; $i<count($_POST["place"]["place"]);$i++) {
                    if (is_array($_POST["place"]["place"][$i])) {
                        for ($j = 0; $j<count($_POST["place"]["place"][$i]);$j++) {
                            if ($_POST["place"]["place"][$i][$j]["id"]!=null) {
                                $id_field = "attractionID";
                                $id = $_POST["place"]["place"][$i][$j]["id"];
                            } else if ($_POST["place"]["place"][$i][$j]["gid"]!=null) {
                                $id_field = "googleId";
                                $id = $_POST["place"]["place"][$i][$j]["gid"];
                            }
                            $sql = 'INSERT INTO plan_content (planID, '.$id_field.', duration, start_time,day,placeOrder, type) VALUES ("'.$_POST["plan"].'", "'.$id.'", "'.$_POST["place"]["place"][$i][$j]["spend"].'", "';
                            $sql .= str_pad($_POST["place"]["place"][$i][$j]["start_h"], 2, 0, STR_PAD_LEFT).":".str_pad($_POST["place"]["place"][$i][$j]["start_m"], 2, 0, STR_PAD_LEFT).'",'.$i.','.$j.',1)';
                            $conn->query($sql); 
                            echo $sql;
                        }
                    }
                }
            }
            if ($_POST["hotel"]["place"] != null) {
                for ($i = 0; $i<count($_POST["hotel"]["place"]);$i++) {
                    if ($_POST["hotel"]["place"][$i]["id"]!=null) {
                        $id_field = "attractionID";
                        $id = $_POST["hotel"]["place"][$i]["id"];
                    } else if ($_POST["hotel"]["place"][$i]["gid"]!=null) {
                        $id_field = "googleId";
                        $id = $_POST["hotel"]["place"][$i]["gid"];
                    }
                    $sql = 'INSERT INTO plan_content (planID, '.$id_field.',day ,type) VALUES ("'.$_POST["plan"].'", "'.$id.'", '.$i.',2)';
                    $conn->query($sql); 
                }
            }
        // } else {
        //     echo "<script>alert('Error!')</script>";
        // }
        $conn->close();
    }
?>