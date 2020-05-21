<?php
    if(!isset($_POST["country"]) || !isset($_POST["query"])) {
        require("404.php");
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $required=1;
        require("endPointPlan_text.php");
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
    <center><h2><?php echo $endPointPlan_text["choosetitle"]?></h2>
    <input id="endAirportSearch" value="<?php echo $_POST["query"]?>"></input> <button id="endAirportSearchBtn"><?php echo $endPointPlan_text["search"]?></button></center><br>
    <script>
        $("#endAirportSearchBtn").click(function() {
            $("#endPointPlan").load("endPointPlan",{country: <?php echo $_POST["country"]?>,query: $("#endAirportSearch").val()});
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
                if ($row["img"]!=null) {
                    $img = 'https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference='.$row["img"].'&key='.$googleapi;
                } else {
                    $img = "imgs/noimg.png";
                }
?>
                <tr class="endplace" data="<?php echo $row["googleid"]?>">
                    <td><a href="place?id=<?php echo $row["attractionId"]?>" target='_blank'><img src="<?php echo $img;?>" style="margin:10px"></a></td>
                    <td><a href="place?id=<?php echo $row["attractionId"]?>" target='_blank'><b style="color:black"><?php echo $row["name"]?></b></a><br><button><?php echo $endPointPlan_text["setPoint"]?></button></td>
                </tr>
<?php
            }
        } else {
?>
            <script>
                $("#load").load("loadMoreEndPlace",{"query":"<?php echo $query.' '.$countryname?>",countryname: "<?php echo $countryname?>"});
            </script>
<?php
        }
    }
    $conn->close();
?>
        </tbody>
    </table><button class="loadMoreEndPlace"><?php echo $endPointPlan_text["loadmore"]?></button></center>
</div>



<script>
    $(".loadMoreEndPlace").click(function() {
        $("#load").load("loadMoreEndPlace",{"query":"<?php echo $query.' '.$countryname?>",countryname: "<?php echo $countryname?>"});
    })
    $(".endplace button").click(function() {
        var img = $(this).closest(".endplace").find("img").attr("src");
        var name = $(this).closest(".endplace").find("b").text();
        var link = $(this).closest(".endplace").find("a").eq(0).attr("href");
        var html = "<td><a href="+link+" target='_blank'><img src="+img+"></a></td>"+
                   "<td><a href="+link+" target='_blank'><b style='color:black'>"+name+"</b></a><br><?php echo $endPointPlan_text["arrivingtime"]?>:<br>"+
                   "<input style='width:70'>:<input style='width:70'><br><?php echo $endPointPlan_text["type"]?><br><span class='remove'><?php echo $endPointPlan_text["remove"]?></span>"+
                   "</td>";
        $(".end").html(html);
        $('.end').find('.remove').click(function() {
            $(this).closest('.end').html('<td colspan="2">'+
                "<div><?php echo $endPointPlan_text["endpoint"]?></div>"+
            "</td>");
            $(".end div").click(function() {
                $(".panel").hide();
                $("#endPointPlan").show();
            })
        })
    })
    $("img").on('error', function() {
        $(this).attr("src", "imgs/imgNotAvaliable.jpeg")
    })
</script>
