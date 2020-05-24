    <?php 
        // $_POST["planid"]=12;
        if (!isset($_POST["planid"])) {
    ?>
            <script>
                window.location.replace('home');
            </script>
    <?php
        } else {
            $required=1;
            require("html_start.php");
            require("database.php");
            $sql = "select plan.planid from plan,user_plan where plan.planid = {$_POST["planid"]} and user_plan.planid = {$_POST["planid"]}";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
?>
                <script>
                    window.location.replace('home');
                </script>
<?php
            } else {
                require("api_key.php");
                require("resultPage_text.php");
                //echo $_POST["planid"];
                if (isset($_SESSION["userid"])) {
                    echo "<div><button class='regen'>".$resultPage_text["regen"]."</button><button class='save' style='float:right'>".$resultPage_text["save"]."</button></div>";
                } else {
                    echo "<br>";
                }
                $sql = "select MAX(day) as day_num from plan_content where planid=".$_POST["planid"];
                $array = array();
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    if ($row = $result->fetch_assoc()) {
                        $daynum = $row["day_num"];
                    }
                }
                for ($i = 1; $i<= $daynum; $i++){
                    $sql = "select start_time from plan_content where add_by <> 2 and type <> 2 and day = ".$i." and planid=".$_POST["planid"]." order by placeOrder limit 1";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        if ($row = $result->fetch_assoc()) {
                            $array["start_time"][$i] = $row["start_time"];
                        }
                    }
                    $sql = "select lat,lon,plan_content.attractionid,name,img,placeOrder,plan_content.duration,type from attraction,plan_content where attraction.attractionid = plan_content.attractionid and type <> 2 and type <> 4 and add_by <> 2 and day = ".$i." and planid=".$_POST["planid"];
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
                    $sql = "select route,placeOrder,duration,type from plan_content where type = 4 and add_by <> 2 and day = ".$i." and planid=".$_POST["planid"];
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $array["content"][$i][$row["placeOrder"]]["duration"] = $row["duration"];
                            $array["content"][$i][$row["placeOrder"]]["type"] = $row["type"];
                            $array["content"][$i][$row["placeOrder"]]["route"] = $row["route"];
                        }
                    }
                    $sql = "select plan_content.attractionid,name,img,type from attraction,plan_content where attraction.attractionid = plan_content.attractionid and type = 2 and placeOrder <> 1 and add_by <> 2 and day = ".$i." and planid=".$_POST["planid"];
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
                            <h4>Day ".$key." <span>".$resultPage_text["startTime"].": ".$array["start_time"][$key]."</span></h4>
                            <table>
                    ";
                    for ($i = 1; $i<=sizeof($item)+1;$i++){
                        if (isset($item[$i])) {
                            $duration = (floor($item[$i]["duration"]/60/60)==0)?"":(floor($item[$i]["duration"]/60/60))." h ";
                            $duration .= (ceil(($item[$i]["duration"] % 3600)/60)  == 0)?"":(ceil(($item[$i]["duration"] % 3600)/60))." min";
                            switch ($item[$i]["type"]) {
                                case 0:
                                    $type = $resultPage_text["start"];
                                    break; 
                                case 1:
                                    $type = $resultPage_text["Attraction"];
                                    break; 
                                case 3:
                                    $type = $resultPage_text["end"];
                            }
                            if ($item[$i]["type"] != 4) {
                                echo "
                                    <tr lat='".$item[$i]["lat"]."' lng='".$item[$i]["lon"]."'>
                                        <td><a href='place?id=".$item[$i]["id"]."' target='_blank'><img src='https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=".$item[$i]["img"]."&key=".$googleapi."'></a></td>
                                        <td><a href='place?id=".$item[$i]["id"]."' target='_blank'><b>".$item[$i]["name"]."</b></a><br>".$resultPage_text["spendtime"].": ".$duration."<br>".$resultPage_text["type"].": ".$type."</td>
                                    </tr>
                                ";
                            } else if ($item[$i]["type"] == 4) {
                                echo "
                                    <tr>
                                        <td></td>
                                        <td><b>Travel</b><br>".$resultPage_text["spendtime"].": ".$duration."<br><span class='viewroute' route='".$item[$i]["route"]."'>".$resultPage_text["viewRoute"]."</span></td>
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
                echo "<div class='loading'><div class='lds-ring'><div></div><div></div><div></div><div></div></div></div>";
                $sql = "select state from plan where planid = ".$_POST["planid"]." and state = 3";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<script>$('.loading').show();</script>";
                }
?>
                <div class="loading"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
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
                            $("#load").load("saveplan",{planid: "<?php echo $_POST["planid"]?>"});
                        })
                        $(".regen").click(function() {
                            $("#load").load("regenplan",{planid: "<?php echo $_POST["planid"]?>"});
                        })
    <?php
                    }
    ?>
                </script>
                <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDog7hXlhQFMMuvI4PWVeMnhG_R_v8oFsk&libraries=geometry&callback=initMap">
                </script>
    <?php
            }
            $conn->close();
            require("html_end.php");
        }
    ?>
