<?php
    if(!isset($_POST["country"]) || !isset($_POST["query"]) || !isset($_POST["day"]) || !isset($_POST["check"])) {
        require("404.php");
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $required=1;
        require("setHotelPlan_text.php");
        require("api_key.php");
        require("database.php");
        $sql = "SELECT EN AS name FROM country WHERE countryID = ".$_POST["country"];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()) {
                $countryname = $row["name"];
            }
        }
        $countryname = str_replace(" ","+",$countryname);
        $query = trim($_POST["query"]);
        // $query= str_replace(" ","+",$_POST["query"]);
?>
    <center><h2><?php echo $setHotelPlan_text["choosetitle"]?></h2>
    <div id="hotelsetday" style="display:none"><?php echo $_POST["day"];?></div>
    <input id="setHotelSearch" value="<?php echo $_POST["query"]?>"></input> <button id="setHotelSearchBtn"><?php echo $setHotelPlan_text["search"]?></button>
    <input type="checkbox" class="allHotel" <?php echo $_POST["check"]==1?"checked":"" ?>> <?php echo $setHotelPlan_text["changeall"]?></center>
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
                    if ($row["img"]!=null) {
                        $img = 'https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference='.$row["img"].'&key='.$googleapi;
                    } else {
                        $img = "imgs/noimg.png";
                    }
?>
                    <tr class="hotel" data="<?php echo $row["googleid"]?>">
                        <td><a href="place?id=<?php echo $row["attractionId"]?>" target='_blank'><img src="<?php echo $img;?>" style="margin:10px"></a></td>
                        <td><a href="place?id=<?php echo $row["attractionId"]?>" target='_blank'><b style="color:black"><?php echo $row["name"]?></b></a><br><button><?php echo $setHotelPlan_text["choosehotel"]?></button></td>
                    </tr>
<?php
                }
            } else {
                if ($query!="") {
?>
                <script>
                     $("#load").load("loadMoreHotel",{"query":"<?php echo $query.'+'.$countryname?>"});
                </script>
<?php
                }
            }
    }
    $conn->close();
?>
        </tbody>
    </table><?php if ($query!="") {echo '<button class="loadMoreHotel">'.$setHotelPlan_text["loadmore"].'</button>';}?></center>
</div>



<script>
    $(".loadMoreHotel").click(function() {
        $("#load").load("loadMoreHotel",{"query":"<?php echo $query.'+'.$countryname?>"});
    })
    $(".hotel button").click(function() {
        var img = $(this).closest(".hotel").find("img").attr("src");
        var name = $(this).closest(".hotel").find("b").text();
        var link = $(this).closest(".hotel").find("a").attr("href");
        var html = "<table><tr>"+
                    "<td><a href='"+link+"' target='_blank'><img src='"+img+"'></a></td>"+
                    "<td><a href='"+link+"' target='_blank'><b style='color:black;'>"+name+"</b></a><br><?php echo $setHotelPlan_text["type"]?><br><span class='remove'><?php echo $setHotelPlan_text["remove"]?></span></td>"+
                "</tr></table>";
        if ($(".allHotel").is(':checked')) {
            $(".editHotel_container").html(html);
        } else {
            $(".editHotel_container").eq($("#hotelsetday").html()).html(html);
        }
        $('.editHotel_container').find('.remove').click(function() {
            $(this).closest('.editHotel_container').html('<div><?php echo $setHotelPlan_text["sethotel"]?></div>');
            $(".editHotel_container div").click(function() {
                $("#hotelsetday").html($(this).closest(".editHotel_container").attr("data"));
                $(".panel").hide();
                $("#setHotelPlan").show();
            })
        })
    })
    $("img").on('error', function() {
        $(this).attr("src", "imgs/imgNotAvaliable.jpeg")
    })
</script>
