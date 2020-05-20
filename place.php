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
        if (isset($_GET["id"])) {
            require("place_text.php");
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
                        <h2>my rating:
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
                        <script>
                            $(".rating").click(function() {
                                $("#load").load("rate_attraction_process.php",{rating: $(this).attr("val"),attractionid: <?php echo $_GET["id"]?>});
                            })
                        </script>
                        </h2>
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
                                    }
                                }
                            }
?>
                            <div id="place_commentSection_list"></div>
                            <script>
                                $('#post_comment').click(function() {
                                    $('#load').load('attraction_comment_process',{'val':$('#command_input').val(),'attractionid':<?php echo$_GET["id"];?>});
                                    $('#place_commentSection_list').load('place_commentSection',{'attractionid':<?php echo$_GET["id"];?>});
                                })
                                $('#place_commentSection_list').load('place_commentSection',{'attractionid':<?php echo$_GET["id"];?>});
                            </script>
                    </div>
                </div>
<?php 
            }
        } else {
            $sql = "select attractionid from attraction where googleid = ".$_GET["gid"];
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                if ($row = $result->fetch_assoc()) {
?>
                    <script>
                        window.location.replace("place?id=<?php echo $row["attractionid"]?>");
                    </script>
<?php
                }
            }
        }
        $conn->close();
        require("html_end.php");
    }
?>
