<?php
    if(!isset($_POST["country"]) || !isset($_POST["query"]) || !isset($_POST["type"])) {
        require("404.php");
    } else {
        $required=1;
        require("api_key.php");
        require("database.php");
        $sql = "SELECT name FROM country WHERE countryID = ".$_POST["country"];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $countryname = $row["name"];
            }
        }
        $countryname = str_replace(" ","+",$countryname);
        $query = trim($_POST["query"]);
?>
    <center><h2>Add a location</h2>
    <select id="addLocationType">
        <option value="tourist_attraction">tourist attraction</option>
        <option value="amusement_park">amusement park</option>
        <option value="museum">museum</option>
        <option value="aquarium">aquarium</option>
        <option value="natural_feature">natural feature</option>
        <option value="any">any place</option>
    </select>
    <script>
        $("#addLocationType").val("<?php echo$_POST["type"]?>");
    </script>
    <input id="addLocationSearch" value="<?php echo $_POST["query"]?>"></input> <button id="addLocationSearchBtn">search</button></center><br>
    <script>
        $("#addLocationSearchBtn").click(function() {
            $("#addPlacePlan").load("addPlacePlan",{country: <?php echo $_POST["country"]?>,query: $("#addLocationSearch").val(),type:$("#addLocationType").val()});
        })
    </script>
    <div class="searchPlace">
        <center><table>
            <tbody>
<?php
        $sql_type = "";
        if ($_POST["type"]!="any") {
            $sql_type="AND type = '".$_POST["type"]."'";
        }
        $sql = "SELECT name,img,attractionId,googleid FROM attraction, attraction_type WHERE name LIKE '%$query%' AND countryID = ".$_POST["country"]." AND attraction.attractionID = attraction_type.id $sql_type GROUP BY attractionId";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
?>
                <tr class="place" data="<?php echo $row["googleid"]?>">
                    <td><a href="place?id=<?php echo $row["attractionId"]?>"><img src="<?php echo "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=".$row["img"]."&key=".$googleapi?>" style="margin:10px"></a></td>
                    <td><a href="place?id=<?php echo $row["attractionId"]?>"><b style="color:black"><?php echo $row["name"]?></b></a><br><button>Add</button></td>
                </tr>
<?php
            }
        } else {
?>
            <script>
                $("#load").load("loadMoreAddPlace",{"query":"<?php echo $query.'+'.$countryname?>",type: "<?php echo $_POST["type"]?>"});
            </script>
<?php
        }
    }
    $conn->close();
?>
        </tbody>
    </table><button class="loadMoreAddPlace">load more</button></center>
</div>



<script>
    $(".loadMoreAddPlace").click(function() {
        $("#load").load("loadMoreAddPlace",{"query":"<?php echo $query.'+'.$countryname?>",type: "<?php echo $_POST["type"]?>"});
    })
    $(".place button").click(function() {
        var img = $(this).closest(".place").find("img").attr("src");
        var name = $(this).closest(".place").find("b").text();
        var html = "<tr><td><img src='"+img+"'></td>"+
                        "<td><b>"+name+"</b><br>starting time (optional): <input><br>spend time: (in min) <input><br>Type: attraction<br><span class='remove'>remove</span></td></tr>";
        $(".ptg tbody").append(html);
        $('.ptg tbody').find('.remove').click(function() {
            $(this).closest('tr').remove();
        })
    })
</script>
