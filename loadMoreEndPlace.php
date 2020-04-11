<?php 
    if (!(isset($_POST["query"]) xor isset($_POST["next"]))) {
        require("404.php");
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $required=1;
        require("loadMoreEndPlace_text.php");
        require("api_key.php");
        if (isset($_POST["query"])) {
            $_POST["query"]= str_replace(" ","+",trim($_POST["query"]));
            $json = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query='.rawurlencode($_POST["query"]).'&language=en&key='.$googleapi.'&type=airport');
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
                                        '<td><a href="place?gid=<?php echo $results["place_id"]?>" target="_blank"><img src="<?php echo $img?>" style="margin:10px"></a></td>'+
                                        '<td><a href="place?gid=<?php echo $results["place_id"]?>" target="_blank"><b style="color:black"><?php echo str_replace("'","\\'",$results["name"])?></b></a><br><button><?php echo $loadMoreEndPlace_text["setPoint"]?></button></td>+'
                                    '</tr>';
                        $("#endPointPlan .searchplace").find("tbody").append(html);
                    }
<?php
                }
                if (isset($obj["next_page_token"])) {
                    if ($obj["next_page_token"] != null) {
?>
                        $("#endPointPlan .searchplace").find("center").append('<button class="loadMoreEndPlace"><?php echo $loadMoreEndPlace_text["loadmore"]?></button>');
                        $(".loadMoreEndPlace").click(function() {
                            $("#load").load("loadMoreEndPlace",{"next":"<?php echo $obj["next_page_token"]?>"});
                        })
<?php
                    }
                } 
?> 
                $(".endplace button").off("click");
                $(".endplace button").click(function() {
                    var img = $(this).closest(".endplace").find("img").attr("src");
                    var name = $(this).closest(".endplace").find("b").text();
                    var link = $(this).closest(".endplace").find("a").eq(0).attr("href");
                    var html = "<td><a href="+link+" target='_blank'><img src="+img+"></a></td>"+
                            "<td><a href="+link+" target='_blank'><b style='color:black'>"+name+"</b></a><br><?php echo $loadMoreEndPlace_text["arrivingtime"]?>:<br><input style='width:70'>:<input style='width:70'><br>"+
                            "<?php echo $loadMoreEndPlace_text["type"]?><br><span class='remove'><?php echo $loadMoreEndPlace_text["remove"]?></span>"+
                            "</td>";
                    $(".end").html(html);
                    $('.end').find('.remove').click(function() {
                        $(this).closest('.end').html('<td colspan="2">'+
                            "<div><?php echo $loadMoreEndPlace_text["endpoint"]?></div>"+
                        "</td>");
                        $(".end div").click(function() {
                            $(".panel").hide();
                            $("#endPointPlan").show();
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