<?php 
    if (!(isset($_GET["id"]) xor isset($_GET["gid"]))) {
?>
        <script>
            window.location.replace('home');
        </script>
<?php
    } else {
        $required=1;
        require("api_key.php");
        require("html_start.php");
        require("database.php");
        require("place_text.php");  
        if (isset($_GET["id"])) {
            $sql = "select attractionID from attraction where attractionID = ".$_GET["id"];
            $result = $conn->query($sql);
            if ($result->num_rows == 0) {
                echo "<h2>".$place_text["notFound"]."!</h2>";
            } else {
?>
                <div id="place_flex">
                    <div id="place_map_container">
                        <div id="place_map"></div>
                    </div>
                    <div id="place_detail">
<?php
                        $sql = "select name,phone,address,businessHour,duration,lat,lon from attraction where attractionID = ".$_GET["id"];
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            if ($row = $result->fetch_assoc()) {
                                if ($row["duration"]!=null) {
                                    $duration = (floor($row["duration"]/60/60)==0)?"":(floor($row["duration"]/60/60))." h ";
                                    $duration .= (ceil(($row["duration"] % 3600)/60)  == 0)?"":(ceil(($row["duration"] % 3600)/60))." min";
                                }
                                echo "
                                    <h2>".$row["name"]."</h2>
                                    ".(($row["phone"]==null)?"":$place_text["phone"]." : ".$row["phone"]."<br>")."
                                    ".(($row["address"]==null)?"":$place_text["address"]." : ".$row["address"]."<br>")."
                                    ".(($row["businessHour"]==null)?"":$place_text["businessHour"]." : ".$row["businessHour"]."<br>")."
                                    ".(($row["duration"]==null)?"":$place_text["averagetime"]." : ".$duration."<br>")."
                                ";
                                $lat = $row["lat"];
                                $lon = $row["lon"];
                            }
                        }
?>
                    </div>
                    <script>
                        function initMap() {
                            var myLatLng = {lat:<?php echo $lat;?>,lng:<?php echo $lon;?>};
                    
                            var map = new google.maps.Map(document.getElementById('place_map'), {
                                zoom: 14,
                                center: myLatLng
                            });
                    
                            var marker = new google.maps.Marker({
                                position: myLatLng,
                                map: map
                            });
                        }
                    </script>
                    <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDog7hXlhQFMMuvI4PWVeMnhG_R_v8oFsk&libraries=geometry&callback=initMap">
                    </script>
                    <div id="place_ratebox"><div id="place_ratebox_container">
<?php
                        $sql = "select img,rating from attraction where attractionID = ".$_GET["id"];
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            if ($row = $result->fetch_assoc()) {
                                if ($row["img"]!=null) {
                                    $img = 'https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference='.$row["img"].'&key='.$googleapi;
                                } else {
                                    $img = "imgs/noimg.png";
                                }
                                $google_rating = $row["rating"];
                                echo '<img src="'.$img.'"><br>';
                            }
                        }
                        $sql = "select AVG(rating) as rating from userrate_attraction where attractionID = ".$_GET["id"];
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            if ($row = $result->fetch_assoc()) {
                                $user_rating = $row["rating"];
                            }
                        }
                        if ($google_rating == null && $user_rating == null) {
                            $rating = null;
                        } else if ($google_rating == null) {
                            $rating = $user_rating;
                        } else if ($user_rating == null) {
                            $rating = $google_rating;
                        } else {
                            $rating = $google_rating*0.7+$user_rating*0.3;
                        }
                        echo $place_text["rating"]." : ";
                        if ($rating == null) {
                            echo "-";
                        } else {
                            for ($i = 1; $i<=$rating; $i++) {
                                echo "★";
                            }
                            for ($i = 5;$i>$rating;$i--){
                                echo "☆";
                            }
                        }
?>
                    </div></div>
                    <div id="place_commentSection">
<?php
                        if (isset($_SESSION["userid"])) {
?>
                            <h2><?php echo $place_text["myrating"];?>:
<?php
                            $sql = "select rating from userrate_attraction where attractionID = ".$_GET["id"]." and userid = ".$_SESSION["userid"];
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                if ($row = $result->fetch_assoc()) {
                                    $myrating = $row["rating"];
                                }
                            } else {
                                $myrating = 0;
                            }
                            for ($i = 1; $i<=$myrating; $i++) {
                                echo '<span class="rating" val="'.$i.'">★</span>';
                            }
                            for ($i = $myrating+1;$i<=5;$i++){
                                echo '<span class="rating" val="'.$i.'">☆</span>';
                            }
?>
                            </h2>
                            <script>
                                $(".rating").click(function() {
                                    $("#load").load("rate_attraction_process.php",{rating: $(this).attr("val"),attractionid: <?php echo $_GET["id"]?>});
                                })
                            </script>
<?php
                        }
?>
                        <h2><?php echo $place_text["comments"];?>:</h2>
<?php
                        if (isset($_SESSION["userid"])) {
                            $sql = "select userid from user where userID = ".$_SESSION["userid"];
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                if ($row = $result->fetch_assoc()) {
                                    echo "
                                        <textarea id='command_input' rows='4'></textarea>
                                        <button  style='width: 100px' id='post_comment'>".$place_text["post"]."</button>
                                        <script>
                                            function autoResize() { 
                                                this.style.height = 'auto'; 
                                                this.style.height = this.scrollHeight + 'px'; 
                                            } 
                                            textarea = document.querySelector('#command_input'); 
                                            textarea.addEventListener('input', autoResize, false);
                                        </script>
                                    ";
?>
                                    <script>
                                        $('#post_comment').click(function() {
                                            $('#load').load('attraction_comment_process',{'val':$('#command_input').val(),'attractionid':<?php echo$_GET["id"];?>});
                                            $('#place_commentSection_list').load('place_commentSection',{'attractionid':<?php echo$_GET["id"];?>});
                                        })
                                    </script>
<?php
                                }
                            }
                        }
?>
                        <div id="place_commentSection_list"></div>
                        <script>
                            $('#place_commentSection_list').load('place_commentSection',{'attractionid':<?php echo$_GET["id"];?>});
                        </script>
                    </div>
                </div>
<?php 
            }
        } else {
            $sql = "select attractionid from attraction where googleid = '".$_GET["gid"]."'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                if ($row = $result->fetch_assoc()) {
?>
                    <script>
                        window.location.replace("place?id=<?php echo $row["attractionid"]?>");
                    </script>
<?php
                }
            } else {
                $json = file_get_contents("https://maps.googleapis.com/maps/api/place/details/json?place_id=".$_GET["gid"]."&fields=types,photos/photo_reference,address_components/long_name,address_components/types,name,rating,international_phone_number,formatted_address,geometry/location&language=EN&key=".$googleapi);
                $obj = json_decode($json,true);
                if ($obj["status"] != "OK") {
                    echo "<h2>".$place_text["notFound"]."!</h2>";
                } else {
                    if (in_array("tourist_attraction",$obj["result"]["types"]) || 
                    in_array("amusement_park",$obj["result"]["types"]) ||
                    in_array("museum",$obj["result"]["types"]) ||
                    in_array("aquarium",$obj["result"]["types"]) || 
                    in_array("natural_feature",$obj["result"]["types"]) || 
                    in_array("zoo",$obj["result"]["types"]) || 
                    in_array("lodging",$obj["result"]["types"]) || 
                    in_array("airport",$obj["result"]["types"])) {
                        for ($i = 0;$i <sizeof($obj["result"]["address_components"]);$i++) {
                            if (in_array("country",$obj["result"]["address_components"][$i]["types"])) {
                                $countryIndex = $i;
                            }
                        }
                        if (isset($countryIndex)) {
                            $country = $obj["result"]["address_components"][$countryIndex]["long_name"];
                        }
                        if (isset($country)) {
                            $sql = "select countryid from country WHERE EN = '{$country}'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                if ($row = $result->fetch_assoc()) {
                                    $countryid = $row["countryid"];
                                    $phone = "null";
                                    if (isset($obj["result"]["international_phone_number"])) {
                                        $phone = "'".$obj["result"]["international_phone_number"]."'";
                                    }
                                    $lat = $obj["result"]["geometry"]["location"]["lat"];
                                    $lon = $obj["result"]["geometry"]["location"]["lng"];
                                    $address = addslashes($obj["result"]["formatted_address"]);
                                    $name = addslashes($obj["result"]["name"]);
                                    $rating = "null";
                                    if (isset($obj["result"]["rating"])) {
                                        $rating = $obj["result"]["rating"];
                                    }
                                    $img = "null";
                                    if (isset($obj["result"]["photos"][0]["photo_reference"])) {
                                        $img = "'".$obj["result"]["photos"][0]["photo_reference"]."'";
                                    }
                                    $sql = "INSERT INTO attraction (googleid,name,lat,lon,img,phone,address,rating,countryid) VALUES ('{$_GET["gid"]}','$name',$lat,$lon,$img,$phone,'$address',$rating,$countryid)";
                                    if ($conn->query($sql) === TRUE) {
                                        $sql = "INSERT INTO attraction_type (id,type) VALUES (".($conn->insert_id).",'".$obj["result"]["types"][0]."')";
                                        for ($i = 1; $i < sizeof($obj["result"]["types"]) ;$i++) {
                                            $sql .= ",(".($conn->insert_id).",'".$obj["result"]["types"][$i]."')";
                                        }
                                        if ($conn->query($sql) === TRUE) {
                                            echo "<script>location.reload();</script>";
                                        }
                                    } else {
                                        echo "<h2>".$place_text["notFound"]."!</h2>";
                                    }
                                }
                            } else {
                                echo "<h2>".$place_text["notFound"]."!</h2>";
                            }
                        }
                    } else {
                        echo "<h2>".$place_text["notFound"]."!</h2>";
                    }
                    // echo $obj["result"]["address_components"];    
                    // if (isset($obj["result"]["address_components"]))
                }
            }
        }
        $conn->close();
        require("html_end.php");
    }
?>
