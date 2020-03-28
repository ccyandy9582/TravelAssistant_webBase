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
    <center><h2>Add a location</h2>
    <input id="addLocationSearch" value="<?php echo $_POST["query"]?>"></input> <button id="addLocationSearchBtn">search</button></center><br>
    <script>
        $("#addLocationSearchBtn").click(function() {
            $("#addPlacePlan").load("addPlacePlan",{country: <?php echo $_POST["country"]?>,query: $("#addLocationSearch").val()});
        })
    </script>
    <div class="searchPlace">
        <center><table>
            <tbody>
<?php
        $json = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query='.$query.'+'.$countryname.'&key='.$googleapi.'&type=tourist_attraction');
        $obj = json_decode($json,true);
        foreach ($obj["results"] as $results) {
            // if ($result["photos"]["photo_reference"])
?>
            <tr class="place">
                <td><img src="<?php echo "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=".$results["photos"][0]["photo_reference"]."&key=".$googleapi?>" style="margin:10px"></td>
                <td><b><?php echo $results["name"]?></b><br><button>Add</button></td>
            </tr>
<?php
        }
    }
?>
        </tbody>
    </table></center>
</div>



<script>
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
