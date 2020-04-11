<?php 
    if (!(isset($_POST["query"]) xor isset($_POST["next"]))) {
        require("404.php");
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $required=1;
        require("loadMoreStartPlace_text.php");
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
                $(".loadMoreStartPlace").remove();
<?php
                foreach ($obj["results"] as $results) {
                    if (isset($results["photos"])) {
                        $img = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=".$results["photos"][0]["photo_reference"]."&key=".$googleapi;
                    } else {
                        $img = "imgs/noimg.png";
                    }
?>
                    var skip = false;
                    $("#startPointPlan .searchplace").find("tbody tr").each(function() {
                        if ($(this).attr("data") == "<?php echo $results["place_id"]?>") {
                            skip = true;
                        }
                    })
                    if (!skip) {
                        var html = '<tr class="startplace">'+
                                        '<td><a href="place?gid=<?php echo $results["place_id"]?>" target="_blank"><img src="<?php echo $img?>" style="margin:10px"></a></td>'+
                                        '<td><a href="place?gid=<?php echo $results["place_id"]?>" target="_blank"><b style="color:black"><?php echo str_replace("'","\\'",$results["name"])?></b></a><br><button><?php echo $loadMoreStartPlace_text["setPoint"]?></button></td>+'
                                    '</tr>';
                        $("#startPointPlan .searchplace").find("tbody").append(html);
                    }
<?php
                }
                if (isset($obj["next_page_token"])) {
                    if ($obj["next_page_token"] != null) {
?>
                        $("#startPointPlan .searchplace").find("center").append('<button class="loadMoreStartPlace"><?php echo $loadMoreStartPlace_text["loadmore"]?></button>');
                        $(".loadMoreStartPlace").click(function() {
                            $("#load").load("loadMoreStartPlace",{"next":"<?php echo $obj["next_page_token"]?>"});
                        })
<?php
                    }
                } 
?> 
                $(".startplace button").off("click");
                $(".startplace button").click(function() {
                    var img = $(this).closest(".startplace").find("img").attr("src");
                    var name = $(this).closest(".startplace").find("b").text();
                    var link = $(this).closest(".startplace").find("a").eq(0).attr("href");
                    var html = "<td><a href="+link+" target='_blank'><img src="+img+"></a></td>"+
                            "<td><a href="+link+" target='_blank'><b style='color:black'>"+name+"</b></a><br><?php echo $loadMoreStartPlace_text["starttime"] ?>:<br>"+
                            "<input style='width:70'>:<input style='width:70'><br><?php echo $loadMoreStartPlace_text["timespend"]?> <input><br><?php echo $loadMoreStartPlace_text["type"]?><br><span class='remove'><?php echo $loadMoreStartPlace_text["remove"]?></span>"+
                            "</td>";
                    $(".start").html(html);
                    $('.start').find('.remove').click(function() {
                        $(this).closest('.start').html('<td colspan="2">'+
                            "<div><?php echo $loadMoreStartPlace_text["startpoint"]?></div>"+
                        "</td>");
                        $(".start div").click(function() {
                            $(".panel").hide();
                            $("#startPointPlan").show();
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