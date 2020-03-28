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
        $query= str_replace(" ","+",$_POST["query"]);
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
        if ($query!="") {
            $json = file_get_contents('http://engine.hotellook.com/api/v2/lookup.json?query='.$query.'&lang=en&lookFor=both&limit=10&token='.$hotelapi);
            $obj = json_decode($json,true);
            foreach ($obj["results"]["hotels"] as $results) {

                $jsonPlace = file_get_contents("https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=".str_replace(" ","%20",$results["fullName"])."&inputtype=textquery&fields=photos,name&key=".$googleapi);
                $objPlace = json_decode($jsonPlace,true);
?>
            <tr class="hotel">
                <td><img src="<?php echo "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=".$objPlace["candidates"][0]["photos"][0]["photo_reference"]."&key=".$googleapi?>" style="margin:10px"></td>
                <td><b><?php echo $objPlace["candidates"][0]["name"]?></b><br><button>Set as Hotel</button></td>
            </tr>
<?php
            }
        }
    }
?>
        </tbody>
    </table></center>
</div>



<script>
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
