<?php 
    if (!((isset($_POST["query"]) && isset($_POST["countryname"])) xor isset($_POST["next"]))) {
        require("404.php");
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $required=1;
        require("loadMoreHotel_text.php");
        require("api_key.php");
        if (isset($_POST["query"])) {
            $_POST["query"] = trim($_POST["query"]);
            $temp = explode(" ",$_POST["query"]);
            foreach ($temp as $val) {
                $val = rawurlencode($val);
            }
            $_POST["query"]= implode("+",$temp);
            echo $_POST["countryname"];
            $json = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query='.$_POST["query"].'&language=en&key='.$googleapi.'&type=lodging');
        } else {
            $json = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?pagetoken='.$_POST["next"].'&language=en&key='.$googleapi);
        }
        $obj = json_decode($json,true);
        if ($obj["status"] == "ZERO_RESULTS") {
?>
            <script>
                $(".loadMoreHotel").remove();
            </script>
<?php
        } else if ($obj["status"] == "OK") {
?>
            <script>
                $(".loadMoreHotel").remove();
<?php
                foreach ($obj["results"] as $results) {
                    if (isset($results["photos"])) {
                        $img = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=".$results["photos"][0]["photo_reference"]."&key=".$googleapi;
                    } else {
                        $img = "imgs/noimg.png";
                    }
?>
                    var skip = false;
                    $("#setHotelPlan .searchplace").find("tbody tr").each(function() {
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
                        var html = '<tr class="hotel">'+
                                        '<td><a href="place?gid=<?php echo $results["place_id"]?>"  target="_blank"><img src="<?php echo $img?>" style="margin:10px"></td>'+
                                        '<td><a href="place?gid=<?php echo $results["place_id"]?>"  target="_blank"><b style="color:black"><?php echo addslashes($results["name"])?></b></a><br><button><?php echo  $loadMoreHotel_text["choosehotel"];?></button></td>+'
                                    '</tr>';
                        $("#setHotelPlan .searchplace").find("tbody").append(html);
                    }
<?php
                }
                if (isset($obj["next_page_token"])) {
                    if ($obj["next_page_token"] != null) {
?>
                        $("#setHotelPlan .searchplace").find("center").append('<button class="loadMoreHotel"><?php echo $loadMoreHotel_text["loadmore"]?></button>');
                        $(".loadMoreHotel").click(function() {
                            $("#load").load("loadMoreHotel",{"next":"<?php echo $obj["next_page_token"]?>"});
                        })
<?php
                    }
                } 
?> 
                $(".hotel button").off("click");
                $(".hotel button").click(function() {
                    var img = $(this).closest(".hotel").find("img").attr("src");
                    var name = $(this).closest(".hotel").find("b").text();
                    var link = $(this).closest(".hotel").find("a").attr("href");
                    var html = "<table><tr>"+
                                "<td><a href='"+link+"' target='_blank'><img src='"+img+"'></a></td>"+
                                "<td><a href='"+link+"' target='_blank'><b style='color:black;'>"+name+"</b></a><br><?php echo $loadMoreHotel_text["type"]?><br><span class='remove'><?php echo $loadMoreHotel_text["remove"];?></span></td>"+
                            "</tr></table>";
                    if ($(".allHotel").is(':checked')) {
                        $(".editHotel_container").html(html);
                    } else {
                        $(".editHotel_container").eq($("#hotelsetday").html()).html(html);
                    }
                    $('.editHotel_container').find('.remove').click(function() {
                        $(this).closest('.editHotel_container').html('<div><?php echo $loadMoreHotel_text["sethotel"];?></div>');
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
<?php
        }
    }
?>