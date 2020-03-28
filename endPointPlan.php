<?php
    if(!isset($_POST["country"]) || !isset($_POST["query"])) {
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
        $query= str_replace(" ","+",$_POST["query"]);
?>
    <center><h2>Choose Your Ending Location</h2>
    <input id="endAirportSearch" value="<?php echo $_POST["query"]?>"></input> <button id="endAirportSearchBtn">search</button></center><br>
    <script>
        $("#endAirportSearchBtn").click(function() {
            $("#endPointPlan").load("endPointPlan",{country: <?php echo $_POST["country"]?>,query: $("#endAirportSearch").val()});
        })
    </script>
    <div class="searchPlace">
        
    <center><table>
            <tbody>
<?php
        $sql = "SELECT name,img,attractionId,googleid FROM attraction, attraction_type WHERE countryID = ".$_POST["country"]." AND attraction.attractionID = attraction_type.id AND type = 'airport' GROUP BY attractionId";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
?>
                <tr class="endplace" data="<?php echo $row["googleid"]?>">
                    <td><a href="attraction?id=<?php echo $row["attractionId"]?>"><img src="<?php echo "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=".$row["img"]."&key=".$googleapi?>" style="margin:10px"></a></td>
                    <td><a href="attraction?id=<?php echo $row["attractionId"]?>"><b style="color:black"><?php echo $row["name"]?></b></a><br><button>Set as starting point</button></td>
                </tr>
<?php
            }
        }
    }
    $conn->close();
?>
        </tbody>
    </table><button class="loadMoreEndPlace">load more</button></center>
</div>



<script>
    $(".loadMoreEndPlace").click(function() {
        $("#load").load("loadMoreEndPlace",{"query":"<?php echo $query.'+'.$countryname?>"});
    })
    $(".endplace button").click(function() {
        var img = $(this).closest(".endplace").find("img").attr("src");
        var name = $(this).closest(".endplace").find("b").text();
        var html = "<td><img src="+img+"></td>"+
                   "<td><b>"+name+"</b><br>starting time (optional): <input><br>spend time: (in min) <input><br>Type: ending point<br><span class='remove'>remove</span>"+
                   "</td>";
        $(".end").html(html);
        $('.end').find('.remove').click(function() {
            $(this).closest('.end').html('<td colspan="2">'+
                "<div>Set Ending Point</div>"+
            "</td>");
            $(".end div").click(function() {
                $(".panel").hide();
                $("#endPointPlan").show();
            })
        })
    })
</script>
