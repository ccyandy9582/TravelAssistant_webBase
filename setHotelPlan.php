<?php
    if(!isset($_POST["country"]) || !isset($_POST["query"]) || !isset($_POST["day"]) || !isset($_POST["check"])) {
        require("404.php");
    } else {
        $required=1;
        require("api_key.php");
        require("database.php");
        $sql = "SELECT name FROM country WHERE countryID = ".$_POST["country"];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $countryname = $row["name"];
            }
        }
        $countryname = str_replace(" ","+",$countryname);
        $query = trim($_POST["query"]);
        // $query= str_replace(" ","+",$_POST["query"]);
?>
    <center><h2>Choose Your Hotel</h2>
    <div id="hotelsetday" style="display:none"><?php echo $_POST["day"];?></div>
    <input id="setHotelSearch" value="<?php echo $_POST["query"]?>"></input> <button id="setHotelSearchBtn">search</button>
    <input type="checkbox" class="allHotel" <?php echo $_POST["check"]==1?"checked":"" ?>> Choose this hotel for all day(s).</center>
    <br>
    <script>
        $("#setHotelSearchBtn").click(function() {
            $("#setHotelPlan").load("setHotelPlan",{country: <?php echo $_POST["country"]?>,query: $("#setHotelSearch").val(),day: <?php echo $_POST["day"]?>,check: $(".allHotel").is(':checked')?1:0});
        })
    </script>
    <div class="searchPlace">
        <center><table>
            <tbody>
<?php
            $sql = "SELECT name,img,attractionId,googleid FROM attraction, attraction_type WHERE name LIKE '%$query%' AND countryID = ".$_POST["country"]." AND attraction.attractionID = attraction_type.id AND type = 'lodging' GROUP BY attractionId";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
?>
                    <tr class="startplace" data="<?php echo $row["googleid"]?>">
                        <td><a href="place?id=<?php echo $row["attractionId"]?>"><img src="<?php echo "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=".$row["img"]."&key=".$googleapi?>" style="margin:10px"></a></td>
                        <td><a href="place?id=<?php echo $row["attractionId"]?>"><b style="color:black"><?php echo $row["name"]?></b></a><br><button>Set as starting point</button></td>
                    </tr>
<?php
                }
            } else {
                if ($query!="") {
?>
                <script>
                    $("#load").load("loadMoreStartPlace",{"query":"<?php echo $query.'+'.$countryname?>"});
                </script>
<?php
                }
            }
    }
    $conn->close();
?>
        </tbody>
    </table><?php if ($query!="") {echo '<button class="loadMoreHotel">load more</button>';}?></center>
</div>



<script>
    $(".loadMoreHotel").click(function() {
        $("#load").load("loadMoreHotel",{"query":"<?php echo $query.'+'.$countryname?>"});
    })
    $(".hotel button").click(function() {
        var img = $(this).closest(".hotel").find("img").attr("src");
        var name = $(this).closest(".hotel").find("b").text();
        var html = "<table><tr>"+
                    "<td><img src='"+img+"'></td>"+
                    "<td><b>"+name+"</b><br>Type: Hotel<br><span class='remove'>remove</span></td>"+
                "</tr></table>";
        if ($(".allHotel").is(':checked')) {
            $(".editHotel_container").html(html);
        } else {
            $(".editHotel_container").eq($("#hotelsetday").html()).html(html);
        }
        $('.editHotel_container').find('.remove').click(function() {
            $(this).closest('.editHotel_container').html('<div>Set Hotel</div>');
            $(".editHotel_container div").click(function() {
                $("#hotelsetday").html($(this).closest(".editHotel_container").attr("data"));
                $(".panel").hide();
                $("#setHotelPlan").show();
            })
        })
    })
</script>
