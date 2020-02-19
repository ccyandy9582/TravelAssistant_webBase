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
            // output data of each row
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
    <div id="searchPlace">
        <center><table>
            <tbody>
<?php
        $json = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query='.$query.'+'.$countryname.'&key='.$googleapi.'&type=airport');
        $obj = json_decode($json,true);
        foreach ($obj["results"] as $results) {
            // if ($result["photos"]["photo_reference"])
?>
            <tr class="endplace">
                <td><img src="<?php echo "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=".$results["photos"][0]["photo_reference"]."&key=".$googleapi?>"></td>
                <td><b><?php echo $results["name"]?></b><br><button>Set as Ending point</button></td>
            </tr>
<?php
        }
    }
?>
        </tbody>
    </table></center>
</div>



<script>
    $(".endplace button").click(function() {
        var img = $(this).closest(".endplace").find("img").attr("src");
        var name = $(this).closest(".endplace").find("b").text();
        var html = "<td><img src="+img+"></td>"+
                   "<td><b>"+name+"</b><br>spend time: (in min) <input><br>Type: ending point<br><span class='remove'>remove</span>"+
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
