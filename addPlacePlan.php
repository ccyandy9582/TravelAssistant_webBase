<?php
    if(!isset($_POST["country"]) || !isset($_POST["query"]) || !isset($_POST["type"])) {
        require("404.php");
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $required=1;
        require("addPlacePlan_text.php");
        require("api_key.php");
        require("database.php");
        $sql = "SELECT EN AS name FROM country WHERE countryID = ".$_POST["country"];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()) {
                $countryname = $row["name"];
            }
        }
        $query = trim($_POST["query"]);
?>
    <center><h2><?php echo $addPlacePlan_text["choosetitle"]?></h2>
    <select id="addLocationType">
        <option value="tourist_attraction"><?php echo $addPlacePlan_text["touristattraction"]?></option>
        <option value="amusement_park"><?php echo $addPlacePlan_text["amusementpark"]?></option>
        <option value="museum"><?php echo $addPlacePlan_text["museum"]?></option>
        <option value="aquarium"><?php echo $addPlacePlan_text["aquarium"]?></option>
        <option value="natural_feature"><?php echo $addPlacePlan_text["naturalfeature"]?></option>
        <option value="zoo"><?php echo $addPlacePlan_text["zoo"]?></option>
        <!-- <option value="any"><?php echo $addPlacePlan_text["anytype"]?></option> -->
    </select>
    <script>
        $("#addLocationType").val("<?php echo$_POST["type"]?>");
    </script>
    <input id="addLocationSearch" value="<?php echo $_POST["query"]?>"></input> <button id="addLocationSearchBtn"><?php echo $addPlacePlan_text["search"]?></button></center><br>
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
        $sql = "SELECT name,img,attractionId,googleid FROM attraction, attraction_type WHERE name LIKE"." '%".addslashes($query)."%' AND countryID = ".$_POST["country"]." AND attraction.attractionID = attraction_type.id $sql_type GROUP BY attractionId";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($row["img"]!=null) {
                    $img = 'https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference='.$row["img"].'&key='.$googleapi;
                } else {
                    $img = "imgs/noimg.png";
                }
?>
                <tr class="place" data="<?php echo $row["googleid"]?>">
                    <td><a href="place?id=<?php echo $row["attractionId"]?>" target='_blank'><img src="<?php echo $img;?>" style="margin:10px"></a></td>
                    <td><a href="place?id=<?php echo $row["attractionId"]?>" target='_blank'><b style="color:black"><?php echo $row["name"]?></b></a><br><button><?php echo $addPlacePlan_text["add"]?></button></td>
                </tr>
<?php
            }
        } else {
?>
            <script>
                $("#load").load("loadMoreAddPlace",{"query":"<?php echo $query.' '.$countryname?>",type: "<?php echo $_POST["type"]?>",countryname: "<?php echo $countryname?>"});
            </script>
<?php
        }
    }
    $conn->close();
?>
        </tbody>
    </table><button class="loadMoreAddPlace"><?php echo $addPlacePlan_text["loadmore"]?></button></center>
</div>



<script>
    $(".loadMoreAddPlace").click(function() {
        $("#load").load("loadMoreAddPlace",{"query":"<?php echo $query.' '.$countryname?>",type: "<?php echo $_POST["type"]?>",countryname: "<?php echo $countryname?>"});
    })
    $(".place button").click(function() {
        var img = $(this).closest(".place").find("img").attr("src");
        var name = $(this).closest(".place").find("b").text();
        var link = $(this).closest(".place").find("a").eq(0).attr("href");
        var html = "<tr class='addPlace'><td><a href="+link+" target='_blank'><img src='"+img+"'></a></td>"+
                        "<td><a href="+link+" target='_blank'><b style='color:black;'>"+name+"</b></a><br><?php echo $addPlacePlan_text["starttime"]?><br>"+
                        "<input style='width:70'>:<input style='width:70'><br><?php echo $addPlacePlan_text["timespend"]?> <input><br><?php echo $addPlacePlan_text["type"]?><br><span class='remove'><?php echo $addPlacePlan_text["remove"]?></span></td></tr>";
        $(".ptg tbody").append(html);
        $('.addPlace').find('.remove').click(function() {
            $(this).closest('tr').remove();
        })
    })
    $("img").on('error', function() {
        $(this).attr("src", "imgs/imgNotAvaliable.jpeg")
    })
</script>
