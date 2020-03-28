<?php 
    if (!((isset($_POST["query"]) && isset($_POST["type"]))xor isset($_POST["next"]))) {
        require("404.php");
    } else {
        $required=1;
        require("api_key.php");
        if (isset($_POST["query"])) {
            if ($_POST["type"]=="any"){
                $json = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query='.$_POST["query"].'&language=en&key='.$googleapi);
            } else {
                $json = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query='.$_POST["query"].'&language=en&key='.$googleapi.'&type='.$_POST["type"]);
            }
        } else {
            $json = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?pagetoken='.$_POST["next"].'&language=en&key='.$googleapi);
        }
        $obj = json_decode($json,true);
        if ($obj["status"] == "OK") {
?>
            <script>
                $(".loadMoreAddPlace").remove();
<?php
                foreach ($obj["results"] as $results) {
                    if (isset($results["photos"])) {
                        $img = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=".$results["photos"][0]["photo_reference"]."&key=".$googleapi;
                    } else {
                        $img = "imgs/noimg.png";
                    }
?>
                    var skip = false;
                    $("#addPlacePlan .searchplace").find("tbody tr").each(function() {
                        if ($(this).attr("data") == "<?php echo $results["place_id"]?>") {
                            skip = true;
                        }
                    })
                    if (!skip) {
                        var html = '<tr class="place">'+
                                        '<td><a href="attraction?gid=<?php echo $results["place_id"]?>"><img src="<?php echo $img?>" style="margin:10px"></a></td>'+
                                        '<td><a href="attraction?gid=<?php echo $results["place_id"]?>"><b style="color:black"><?php echo str_replace("'","\\'",$results["name"])?></b></a><br><button>Add</button></td>+'
                                    '</tr>';
                        $("#addPlacePlan .searchplace").find("tbody").append(html);
                    }
<?php
                }
                if (isset($obj["next_page_token"])) {
                    if ($obj["next_page_token"] != null) {
?>
                        $("#addPlacePlan .searchplace").find("center").append('<button class="loadMoreAddPlace">load more</button>');
                        $(".loadMoreAddPlace").click(function() {
                            $("#load").load("loadMoreAddPlace",{"next":"<?php echo $obj["next_page_token"]?>"});
                        })
<?php
                    }
                } 
?> 
                $(".place button").off("click");
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
<?php
        }
    }
?>










<!-- $json = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query='.$query.'+'.$countryname.'&key='.$googleapi.'&type='.$_POST["type"]);
        $obj = json_decode($json,true);
        foreach ($obj["results"] as $results) {
            // if ($result["photos"]["photo_reference"])
?>
            <tr class="place">
                <td><img src="<?php echo "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=".$results["photos"][0]["photo_reference"]."&key=".$googleapi?>" style="margin:10px"></td>
                <td><b><?php echo $results["name"]?></b><br><button>Add</button></td>
            </tr> -->