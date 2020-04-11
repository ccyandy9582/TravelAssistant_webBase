<?php
    if(!isset($_POST["country"]) || !isset($_POST["query"])) {
        require("404.php");
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $required=1;
        require("startPointPlan_text.php");
        require("api_key.php");
        require("database.php");
        $sql = "SELECT EN AS name FROM country WHERE countryID = ".$_POST["country"];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $countryname = $row["name"];
            }
        }
        $countryname = str_replace(" ","+",$countryname);
        $query = trim($_POST["query"]);
?>
    <center><h2><?php echo $startPointPlan_text["choosetitle"]?></h2>
    <input id="startAirportSearch" value="<?php echo $_POST["query"]?>"></input> <button id="startAirportSearchBtn"><?php echo $startPointPlan_text["search"]?></button></center><br>
    <script>
        $("#startAirportSearchBtn").click(function() {
            $("#startPointPlan").load("startPointPlan",{country: <?php echo $_POST["country"]?>,query: $("#startAirportSearch").val()});
        })
    </script>
    <div class="searchPlace">
        <center><table>
            <tbody>
<?php
        $sql = "SELECT name,img,attractionId,googleid FROM attraction, attraction_type WHERE name LIKE '%$query%' AND countryID = ".$_POST["country"]." AND attraction.attractionID = attraction_type.id AND type = 'airport' GROUP BY attractionId";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
?>
                <tr class="startplace" data="<?php echo $row["googleid"]?>">
                    <td><a href="place?id=<?php echo $row["attractionId"]?>" target='_blank'><img src="<?php echo "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=".$row["img"]."&key=".$googleapi?>" style="margin:10px"></a></td>
                    <td><a href="place?id=<?php echo $row["attractionId"]?>" target='_blank'><b style="color:black"><?php echo $row["name"]?></b></a><br><button><?php echo $startPointPlan_text["setPoint"] ?></button></td>
                </tr>
<?php
            }
        } else {
?>
            <script>
                $("#load").load("loadMoreStartPlace",{"query":"<?php echo $query.'+'.$countryname?>"});
            </script>
<?php
        }
    }
    $conn->close();
?>
        </tbody>
    </table><button class="loadMoreStartPlace"><?php echo $startPointPlan_text["loadmore"]?>></button></center>
</div>



<script>
    $(".loadMoreStartPlace").click(function() {
        $("#load").load("loadMoreStartPlace",{"query":"<?php echo $query.'+'.$countryname?>"});
    })
    $(".startplace button").click(function() {
        var img = $(this).closest(".startplace").find("img").attr("src");
        var name = $(this).closest(".startplace").find("b").text();
        var link = $(this).closest(".startplace").find("a").eq(0).attr("href");
        var html = "<td><a href="+link+" target='_blank'><img src="+img+"></a></td>"+
                   "<td><a href="+link+" target='_blank'><b style='color:black'>"+name+"</b></a><br><?php echo $startPointPlan_text["starttime"]?>:<br>"+
                   "<input style='width:70'>:<input style='width:70'><br><?php echo $startPointPlan_text["timespend"]?> <input><br><?php echo $startPointPlan_text["type"]?><br><span class='remove'><?php echo $startPointPlan_text["remove"]?></span>"+
                   "</td>";
        $(".start").html(html);
        $('.start').find('.remove').click(function() {
            $(this).closest('.start').html('<td colspan="2">'+
                "<div><?php echo $startPointPlan_text["startpoint"]?></div>"+
            "</td>");
            $(".start div").click(function() {
                $(".panel").hide();
                $("#startPointPlan").show();
            })
        })
    })
    $("img").on('error', function() {
        $(this).attr("src", "imgs/imgNotAvaliable.jpeg")
    })
</script>
