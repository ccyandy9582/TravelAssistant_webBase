<?php 
    if (!isset($_POST["query"])) {
        require("404.php");
    } else {
        $_POST["query"]= str_replace(" ","+",trim($_POST["query"]));
        $required=1;
        require("api_key.php");
            if ($_POST["query"]!="") {
                $json = file_get_contents('http://engine.hotellook.com/api/v2/lookup.json?query='.$_POST["query"].'&lang=en&lookFor=both&limit=10&token='.$hotelapi);
                $obj = json_decode($json,true);
                if ($obj["status"]=="ok") {
?>
                    <script>
                        $(".loadMoreHotel").remove();
<?php
                    foreach ($obj["results"]["hotels"] as $results) {
                        $jsonPlace = file_get_contents("https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input=".str_replace(" ","+",$results["fullName"])."&language=en&inputtype=textquery&fields=photos,name,place_id&key=".$googleapi);
                        $objPlace = json_decode($jsonPlace,true);
                        if ($objPlace["status"]=="OK") {
                            if (isset($objPlace["candidates"][0]["photos"])) {
                                $img = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=".$objPlace["candidates"][0]["photos"][0]["photo_reference"]."&key=".$googleapi;
                            } else {
                                $img = "imgs/noimg.png";
                            }
?>
                    var skip = false;
                    $("#setHotelPlan .searchplace").find("tbody tr").each(function() {
                        if ($(this).attr("data") == "<?php echo $objPlace["candidates"][0]["place_id"]?>") {
                            skip = true;
                        }
                    })
                    if (!skip) {
                        var html = '<tr class="hotel">'+
                                        '<td><a href="place?gid=<?php echo $objPlace["candidates"][0]["place_id"]?>"  target="_blank"><img src="<?php echo $img?>" style="margin:10px"></td>'+
                                        '<td><a href="place?gid=<?php echo $objPlace["candidates"][0]["place_id"]?>"  target="_blank"><b style="color:black"><?php echo $objPlace["candidates"][0]["name"]?></b></a><br><button>Choose this hotel</button></td>+'
                                    '</tr>';
                        $("#setHotelPlan .searchplace").find("tbody").append(html);
                    }
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
                                    "<td><a href='"+link+"' target='_blank'><b style='color:black;'>"+name+"</b></a><br>Type: Hotel<br><span class='remove'>remove</span></td>"+
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
<?php
                }
            } else {
                require("404.php");
            }
    }
?>