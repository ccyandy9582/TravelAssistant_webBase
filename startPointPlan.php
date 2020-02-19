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
    <center><h2>Choose Your Starting Location</h2>
    <input id="startAirportSearch" value="<?php echo $_POST["query"]?>"></input> <button id="startAirportSearchBtn">search</button></center><br>
    <script>
        $("#startAirportSearchBtn").click(function() {
            $("#startPointPlan").load("startPointPlan",{country: <?php echo $_POST["country"]?>,query: $("#startAirportSearch").val()});
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
            <tr class="startplace">
                <td><img src="<?php echo "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=".$results["photos"][0]["photo_reference"]."&key=".$googleapi?>"></td>
                <td><b><?php echo $results["name"]?></b><br><button>Set as starting point</button></td>
            </tr>
<?php
        }
    }
?>
        </tbody>
    </table></center>
</div>



<script>
    $(".startplace button").click(function() {
        var img = $(this).closest(".startplace").find("img").attr("src");
        var name = $(this).closest(".startplace").find("b").text();
        var html = "<td><img src="+img+"></td>"+
                   "<td><b>"+name+"</b><br>spend time: (in min) <input><br>Type: starting point<br><span class='remove'>remove</span>"+
                   "</td>";
        $(".start").html(html);
        $('.start').find('.remove').click(function() {
            $(this).closest('.start').html('<td colspan="2">'+
                "<div>Set Starting Point</div>"+
            "</td>");
            $(".start div").click(function() {
                $(".panel").hide();
                $("#startPointPlan").show();
            })
        })
    })
</script>
