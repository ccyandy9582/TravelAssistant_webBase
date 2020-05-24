<?php
    if (!(isset($_GET["id"]))) {
        ?>
            <script>
                window.location.replace('home');
            </script>
        <?php
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $required=1;
        require("html_start.php");
        require("database.php");
        require("plan_text.php");
        $ok = false;
        $self = false;
        $sql = "SELECT planid from plan where planid = {$_GET["id"]} and state = 2";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if (isset($_SESSION["userid"])) {
                $sql = "SELECT planid from user_plan where planid = {$_GET["id"]} and userid = {$_SESSION["userid"]}";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $ok = true;
                    $self = true;
                }
            }
            $sql = "SELECT planid from blog where planid = {$_GET["id"]}";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $ok = true;
            }
        }
        if (!($ok || isset($_SESSION["admin"]))) {
            echo "<h2>".$plan_text["notFound"]."!</h2>";
        } else {
?>
            <div id="popoutdate">
                <div id="popoutdate_content">
                    <span id="popoutdate_close">&times;</span>
                    Choose start date: <input type="date" id="popoutdate_date"><br>
                    <button class="edit">Edit</button>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    var modal3 = document.getElementById("popoutdate");
                    var span3 = document.getElementById("popoutdate_close");
                    span3.onclick = function() {
                        modal3.style.display = "none";
                        // location.reload();
                }
                window.onclick = function(event) {
                    if (event.target == modal3) {
                        modal3.style.display = "none";
                        // location.reload();
                    }
                }
                })
                var dt = new Date();
                var tmr = new Date(dt);
                tmr.setDate(tmr.getDate()+1);
                var time = tmr.getFullYear() + "-" + ("0"+(tmr.getMonth()+1)).slice(-2) + "-" + ("0"+(tmr.getDate())).slice(-2);
                $("#popoutdate").find("input[type='date']").each(function() {
                    $(this).attr("min",time);
                })
            </script>
<?php
            require("api_key.php");
            if ($self) {
                echo "<div><button class='duplicate'>".$plan_text["duplicate"]."</button><button class='toblog' style='float:right'>".$plan_text["toblog"]."</button></div>";
            } else if (isset($_SESSION["userid"])) {
                echo "<div style='text-align:right'><button class='save'>".$plan_text["save"]."</button></div>";
            } else {
                echo "<br>";
            }
            $sql = "select MAX(day) as day_num from plan_content where planid=".$_GET["id"];
            $array = array();
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                if ($row = $result->fetch_assoc()) {
                    $daynum = $row["day_num"];
                }
            }
            for ($i = 1; $i<= $daynum; $i++){
                $sql = "select start_time from plan_content where add_by <> 2 and type <> 2 and day = ".$i." and planid=".$_GET["id"]." order by placeOrder limit 1";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    if ($row = $result->fetch_assoc()) {
                        $array["start_time"][$i] = $row["start_time"];
                    }
                }
                $sql = "select lat,lon,plan_content.attractionid,name,img,placeOrder,plan_content.duration,type from attraction,plan_content where attraction.attractionid = plan_content.attractionid and type <> 2 and type <> 4 and add_by <> 2 and day = ".$i." and planid=".$_GET["id"];
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $array["content"][$i][$row["placeOrder"]]["id"] = $row["attractionid"];
                        $array["content"][$i][$row["placeOrder"]]["duration"] = $row["duration"];
                        $array["content"][$i][$row["placeOrder"]]["type"] = $row["type"];
                        $array["content"][$i][$row["placeOrder"]]["name"] = $row["name"];
                        $array["content"][$i][$row["placeOrder"]]["img"] = $row["img"];
                        $array["content"][$i][$row["placeOrder"]]["lat"] = $row["lat"];
                        $array["content"][$i][$row["placeOrder"]]["lon"] = $row["lon"];
                    }
                }
                $sql = "select route,placeOrder,duration,type from plan_content where type = 4 and add_by <> 2 and day = ".$i." and planid=".$_GET["id"];
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $array["content"][$i][$row["placeOrder"]]["duration"] = $row["duration"];
                        $array["content"][$i][$row["placeOrder"]]["type"] = $row["type"];
                        $array["content"][$i][$row["placeOrder"]]["route"] = $row["route"];
                    }
                }
                $sql = "select plan_content.attractionid,name,img,type from attraction,plan_content where attraction.attractionid = plan_content.attractionid and type = 2 and placeOrder <> 1 and add_by <> 2 and day = ".$i." and planid=".$_GET["id"];
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $array["hotel"][$i]["id"] = $row["attractionid"];
                        $array["hotel"][$i]["name"] = $row["name"];
                        $array["hotel"][$i]["img"] = $row["img"];
                        $array["hotel"][$i]["type"] = $row["type"];
                    }
                }
            }
            //print_r($array);
            foreach ($array["content"] as $key => $item) {
                echo "
                    <div class='day_container'>
                        <h4>Day ".$key." <span>".$plan_text["startTime"].": ".$array["start_time"][$key]."</span></h4>
                        <table>
                ";
                for ($i = 1; $i<=sizeof($item)+1;$i++){
                    if (isset($item[$i])) {
                        $duration = (floor($item[$i]["duration"]/60/60)==0)?"":(floor($item[$i]["duration"]/60/60))." h ";
                        $duration .= (ceil(($item[$i]["duration"] % 3600)/60)  == 0)?"":(ceil(($item[$i]["duration"] % 3600)/60))." min";
                        switch ($item[$i]["type"]) {
                            case 0:
                                $type = $plan_text["start"];
                                break; 
                            case 1:
                                $type = $plan_text["Attraction"];
                                break; 
                            case 3:
                                $type = $plan_text["end"];
                        }
                        if ($item[$i]["type"] != 4) {
                            echo "
                                <tr lat='".$item[$i]["lat"]."' lng='".$item[$i]["lon"]."'>
                                    <td><a href='place?id=".$item[$i]["id"]."' target='_blank'><img src='https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=".$item[$i]["img"]."&key=".$googleapi."'></a></td>
                                    <td><a href='place?id=".$item[$i]["id"]."' target='_blank'><b>".$item[$i]["name"]."</b></a><br>".$plan_text["spendtime"].": ".$duration."<br>".$plan_text["type"].": ".$type."</td>
                                </tr>
                            ";
                        } else if ($item[$i]["type"] == 4) {
                            echo "
                                <tr>
                                    <td></td>
                                    <td><b>Travel</b><br>".$plan_text["spendtime"].": ".$duration."<br><span class='viewroute' route='".$item[$i]["route"]."'>".$plan_text["viewRoute"]."</span></td>
                                </tr>
                            ";
                        } 
                    }
                }
                echo "
                        </table>
                    </div>
                ";
                if ($key < $daynum) {
                    echo "
                    <div  class='hotel_container'>
                        <table>
                            <tr>
                                <td><a href='place?id=".$array["hotel"][$key]["id"]."' target='_blank'><img src='https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=".$array["hotel"][$key]["img"]."&key=".$googleapi."'></a></td>
                                <td><a href='place?id=".$array["hotel"][$key]["id"]."' target='_blank'><b>".$array["hotel"][$key]["name"]."</b></a></td>
                            </tr>
                        </table>
                    </div>
                    ";
                }
            }
            ?>
            <script>
                function initMap() {
                    var myLatLng = {lat:1,lng:1};
                    var lat;
                    var lng;
                    var markers = [];
                    var polylines = [];
                    var map = new google.maps.Map(document.getElementById('popoutmap_content'), {
                        zoom: 1,
                        center: myLatLng
                    });
                    var bounds;
                    addMarker(myLatLng);
                    function setMapOnAll(map) {
                        bounds = new google.maps.LatLngBounds();
                        for (var i = 0; i < markers.length; i++) {
                            markers[i].setMap(map);
                            bounds.extend(markers[i].position);
                        }
                        for (var i = 0; i < polylines.length; i++) {
                            polylines[i].setMap(map);
                            polylines[i].getPath().forEach(function(latLng) {
                                bounds.extend(latLng);
                            });
                        }
                    }
                    function addMarker(location, name) {
                        var marker = new google.maps.Marker({
                        position: location,
                        title: name,
                        map: map
                        });
                        markers.push(marker);
                    }
                    function addPolyline(line) {
                        var polyline = new google.maps.Polyline({
                            path: google.maps.geometry.encoding.decodePath(line),
                            map: map,
                            strokeColor: "blue"
                        })
                        polylines.push(polyline);
                    }
                    function clearMarkers() {
                        setMapOnAll(null);
                    }
                    function showMarkers() {
                        setMapOnAll(map);
                    }
                    function deleteMarkers() {
                        clearMarkers();
                        markers = [];
                        polylines = [];
                    }
                    $(".viewroute").click(function() {
                        $("#popoutmap").show();
                        deleteMarkers();
                        if ($(this).closest("tr").prev().attr("lat") != null) {
                            lat = $(this).closest("tr").prev().attr("lat");
                            lng = $(this).closest("tr").prev().attr("lng");
                            addMarker(new google.maps.LatLng(lat,lng),"start")
                        }
                        if ($(this).closest("tr").next().attr("lat") != null) {
                            lat = $(this).closest("tr").next().attr("lat");
                            lng = $(this).closest("tr").next().attr("lng");
                            addMarker(new google.maps.LatLng(lat,lng),"destination")
                        }
                        if ($(this).attr("route") != null) {
                            route = $(this).attr("route");
                            addPolyline(route)
                        }
                        
                        setMapOnAll(map);
                        map.fitBounds(bounds);
                        map.panToBounds(bounds);
                    })
                    // var marker = new google.maps.Marker({
                    //     position: myLatLng,
                    //     map: map
                    // });
                }
<?php
                if (isset($_SESSION["userid"])) {
?>
                    $(".save").click(function() {
                        $("#load").load("saveplan",{planid: "<?php echo $_GET["id"]?>"});
                    })
                    $(".toblog").click(function() {
                        $("#load").load("createblog_process",{planid: "<?php echo $_GET["id"]?>"});
                    })
                    $(".duplicate").click(function () {
                        $("#popoutdate").show();
                    });
                    $(".edit").click(function() {
                        $("#load").load("gen_step1",{edit: true, planid:<?php echo $_GET["id"]?>, date: $("#popoutdate").find("input").val()});
                    })
<?php
                }
?>
            </script>
            <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDog7hXlhQFMMuvI4PWVeMnhG_R_v8oFsk&libraries=geometry&callback=initMap">
            </script>
<?php
            $conn->close();
            require("html_end.php");
        }
    }
?>