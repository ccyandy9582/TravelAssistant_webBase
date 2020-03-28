<?php 
    if (!(isset($_POST["query"]) xor isset($_POST["next"]))) {
        require("404.php");
    } else {
        $required=1;
        require("api_key.php");
        if (isset($_POST["query"])) {
            $json = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query='.$_POST["query"].'&language=en&key='.$googleapi.'&type=airport');
        } else {
            $json = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?pagetoken='.$_POST["next"].'&language=en&key='.$googleapi);
        }
        $obj = json_decode($json,true);
        if ($obj["status"] == "OK") {
?>
            <script>
                $(".loadMoreEndPlace").remove();
<?php
                foreach ($obj["results"] as $results) {
                    if (isset($results["photos"])) {
                        $img = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=".$results["photos"][0]["photo_reference"]."&key=".$googleapi;
                    } else {
                        $img = "imgs/noimg.png";
                    }
?>
                    var skip = false;
                    $("#endPointPlan .searchplace").find("tbody tr").each(function() {
                        if ($(this).attr("data") == "<?php echo $results["place_id"]?>") {
                            skip = true;
                        }
                    })
                    if (!skip) {
                        var html = '<tr class="endplace">'+
                                        '<td><a href="attraction?gid=<?php echo $results["place_id"]?>"><img src="<?php echo $img?>" style="margin:10px"></a></td>'+
                                        '<td><a href="attraction?gid=<?php echo $results["place_id"]?>"><b style="color:black"><?php echo str_replace("'","\\'",$results["name"])?></b></a><br><button>Set as starting point</button></td>+'
                                    '</tr>';
                        $("#endPointPlan .searchplace").find("tbody").append(html);
                    }
<?php
                }
                if (isset($obj["next_page_token"])) {
                    if ($obj["next_page_token"] != null) {
?>
                        $("#endPointPlan .searchplace").find("center").append('<button class="loadMoreEndPlace">load more</button>');
                        $(".loadMoreEndPlace").click(function() {
                            $("#load").load("loadMoreEndPlace",{"next":"<?php echo $obj["next_page_token"]?>"});
                        })
<?php
                    }
                } 
?> 
            </script>
<?php
        }
    }
?>