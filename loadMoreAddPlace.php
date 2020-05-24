<?php 
    if (!((isset($_POST["query"]) && isset($_POST["type"]) && isset($_POST["countryname"])) xor (isset($_POST["next"]) && isset($_POST["countryname"])))) {
        require("404.php");
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $required=1;
        require("loadMoreAddPlace_text.php");
        require("api_key.php");
        if (isset($_POST["query"])) {
            $_POST["query"] = trim($_POST["query"]);
            $temp = explode(" ",$_POST["query"]);
            foreach ($temp as $val) {
                $val = rawurlencode($val);
            }
            $_POST["query"]= implode("+",$temp);
            // if ($_POST["type"]=="any"){
            //     $json = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query='.$_POST["query"].'&language=en&key='.$googleapi);
            // } else {
                $json = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query='.$_POST["query"].'&language=en&key='.$googleapi.'&type='.$_POST["type"]);
            // }
                
        } else {
            $json = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?pagetoken='.$_POST["next"].'&language=en&key='.$googleapi);
        }
        $obj = json_decode($json,true);
        if ($obj["status"] == "ZERO_RESULTS") {
?>
            <script>
                $(".loadMoreAddPlace").remove();
            </script>
<?php
        } else if ($obj["status"] == "OK") {
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
<?php
                    $temp = explode($_POST["countryname"],$results["formatted_address"]);
                    if (sizeof($temp) == 1 || $temp[sizeof($temp)-1] != "") {
                        echo "skip = true;";
                    }
?>
                    if (!skip) {
                            var html = '<tr class="place">'+
                                            '<td><a href="place?gid=<?php echo $results["place_id"]?>" target="_blank"><img src="<?php echo $img?>" style="margin:10px"></a></td>'+
                                            '<td><a href="place?gid=<?php echo $results["place_id"]?>"  target="_blank"><b style="color:black"><?php echo str_replace("'","\\'",$results["name"])?></b></a><br><button><?php echo $loadMoreAddPlace_text["add"]?></button></td>+'
                                        '</tr>';
                        $("#addPlacePlan .searchplace").find("tbody").append(html);
                    }
<?php
                }
                if (isset($obj["next_page_token"])) {
                    if ($obj["next_page_token"] != null) {
?> 
                        $("#addPlacePlan .searchplace").find("center").append('<button class="loadMoreAddPlace"><?php echo $loadMoreAddPlace_text["loadmore"]?></button>');
                        $(".loadMoreAddPlace").click(function() {
                            $("#load").load("loadMoreAddPlace",{"next":"<?php echo $obj["next_page_token"]?>",countryname: '<?php echo $_POST["countryname"]?>'});
                        })
<?php
                    }
                } 
?> 
                $(".place button").off("click");
                $(".place button").click(function() {
                    var img = $(this).closest(".place").find("img").attr("src");
                    var name = $(this).closest(".place").find("b").text();
                    var link = $(this).closest(".place").find("a").eq(0).attr("href");
                    var html = "<tr class='addPlace'><td><a href="+link+" target='_blank'><img src='"+img+"'></a></td>"+
                                    "<td><a href="+link+" target='_blank'><b style='color:black;'>"+name+"</b></a><br><?php echo $loadMoreAddPlace_text["starttime"]?><br>"+
                                    "<input style='width:70'>:<input style='width:70'><br><?php echo $loadMoreAddPlace_text["timespend"]?> <input><br><?php echo $loadMoreAddPlace_text["type"]?><br><span class='remove'><?php echo $loadMoreAddPlace_text["remove"]?></span></td></tr>";
                    $(".ptg tbody").append(html);
                    $('.addPlace').find('.remove').click(function() {
                        $(this).closest('tr').remove();
                    })
                })
                $("img").on('error', function() {
                    $(this).attr("src", "imgs/imgNotAvaliable.jpeg")
                })
            </script>
<?php
        }
    }
?>