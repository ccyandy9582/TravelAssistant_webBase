<?php 
    if (!isset($_POST["planid"])) {
        require("404.php");
    } else { 
        $required=1;
        require("html_start.php");
        require("generatePlan_text.php");
        require("database.php");
        $sql = "SELECT plan.countryID,DATEDIFF(endTime, startTime)+1 AS day,country.".$_SESSION["lang"]." AS name FROM plan,country WHERE planID = {$_POST["planid"]} AND state = 0 AND country.countryID = plan.countryID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $day = $row["day"];
                $countryID = $row["countryID"];
                $countryName = $row["name"];
            }
        } else {
            header("Location: home");
        }
        $conn->close();
?>
    <script>
        $("document").ready(function() {
            $(".drag").sortable({connectWith: '.drag',items: "tr:not(.space):not(.start):not(.end)"});
            $("#startPointPlan").load("startPointPlan",{country: <?php echo $countryID?>,query: ""});
            $(".start div").click(function() {
                $(".panel").hide();
                $("#startPointPlan").show();
            })
            var endFirst = true;
            $(".end div").click(function() {
                if (endFirst) {
                    $("#endPointPlan").load("endPointPlan",{country: <?php echo $countryID?>,query: ""});
                    endFirst = false;
                }
                $(".panel").hide();
                $("#endPointPlan").show();
            })
            var addFirst = true;
            $(".ptg span").click(function() {
                if (addFirst) {
                    $("#addPlacePlan").load("addPlacePlan",{country: <?php echo $countryID?>,query: "", type:"tourist_attraction"});
                    addFirst = false;
                }
                $(".panel").hide();
                $("#addPlacePlan").show();
            })
            var hotelFirst = true;
            $(".editHotel_container div").click(function() {
                if (hotelFirst) {
                    $("#setHotelPlan").load("setHotelPlan",{country: <?php echo $countryID?>,query: "", day: $(this).closest(".editHotel_container").attr("data"), check:1});
                    hotelFirst = false;
                } else {
                    $("#hotelsetday").html($(this).closest(".editHotel_container").attr("data"));
                }
                $(".panel").hide();
                $("#setHotelPlan").show();
            })
        })
    </script>
    <div id="editPlan">
        <div class="editDay_container ptg">
            <h4><?php echo $generatePlan_text["placetogo"]?> (<?php echo $countryName;?>) <span><?php echo $generatePlan_text["add"]?></span></h4>
            <table>
                <tbody class="drag" >
                    <tr class="space">
                        <td colspan="2" height="20"></td>
                    </tr>
                    <tr class="space" style="display:none">
                        <td colspan="2"></td>
                    </tr>
                </tbody>
            </table>
        </div>
<?php for ($i = 1; $i<=$day; $i++) {?>
        <div class="editDay_container">
            <h4><?php printf($generatePlan_text["day"],$i)?></h4>
            <!-- <div style="height:102px; border:5px dashed black; border-radius:15px"></div> -->
            <table>
                <tbody class="drag">
                    <?php if($i == 1){?>
                    <tr class="start">
                        <td colspan="2">
                            <div><?php echo $generatePlan_text["startpoint"]?></div>
                        </td>
                    </tr>
                    <?php } ?>
                    <tr class="space">
                        <td colspan="2" height="20"></td>
                    </tr>
                    <tr class="space" style="display:none">
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="display:none"></td>
                    </tr> 
                    <?php if($i == $day){?>
                    <tr class="space end" style="background-color: white;">
                        <td colspan="2">
                            <div><?php echo $generatePlan_text["endingpoint"]?></div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php if ($i != $day) {?>
        <div class="editHotel_container" data="<?php echo ($i-1)?>">
            <div><?php echo $generatePlan_text["hotel"]?></div>
        </div>
        <?php }?>
<?php }?>
        <br>
        <center><div id="gen_btn"><?php echo $generatePlan_text["generate"]?></div></center><br>
        <div class="loading"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
        <script>
            $("#gen_btn").click(function() {
                // window.location.href = "resultPage";
                // $(".loading").show();
                // setTimeout(function() {window.location.replace("resultPage");},11346);
                var error = false;
                var start = {}
                start["place"] = null;
                if ($(".start").find("td").length==2) {
                    start["place"] = {};
                    start["place"]["id"] = null;
                    start["place"]["gid"] = null;
                    start["place"]["start_h"] = null;
                    start["place"]["start_m"] = null;
                    start["place"]["spend"] = null;
                    if ($(".start").find("a").eq(0).attr("href").includes("?id")) {
                        var temp = $(".start").find("a").eq(0).attr("href");
                        start["place"]["id"] = temp.substring(temp.indexOf("?id")+4,temp.length);
                    } else if ($(".start").find("a").eq(0).attr("href").includes("?gid")) {
                        var temp = $(".start").find("a").eq(0).attr("href");
                        start["place"]["gid"] = temp.substring(temp.indexOf("?gid")+5,temp.length);
                    }
                    if($(".start").find("input").eq(0).val().trim()!="") {
                        if(($(".start").find("input").eq(0).val().trim()-0)>=0 && ($(".start").find("input").eq(0).val().trim()-0)<24) {
                            start["place"]["start_h"] = $(".start").find("input").eq(0).val().trim();
                        } else {
                            $(".start").find("input").eq(0).css("border-color", "#ed4337");
                            error=true;
                        }
                    }
                    if($(".start").find("input").eq(1).val().trim()!="") {
                        if(($(".start").find("input").eq(1).val().trim()-0)>=0 && ($(".start").find("input").eq(1).val().trim()-0)<60) {
                            start["place"]["start_m"] = $(".start").find("input").eq(1).val().trim();
                        } else {
                            $(".start").find("input").eq(1).css("border-color", "#ed4337");
                            error=true;
                        }
                    }
                    if($(".start").find("input").eq(2).val().trim()!="") {
                        if(($(".start").find("input").eq(2).val().trim()-0)>0 && ($(".start").find("input").eq(2).val().trim()-0)<1440) {
                            start["place"]["spend"] = $(".start").find("input").eq(2).val().trim();
                        } else {
                            $(".start").find("input").eq(2).css("border-color", "#ed4337");
                            error=true;
                        }
                    }
                }
                var end = {}
                end["place"] = null;
                if ($(".end").find("td").length==2) {
                    end["place"] = {};
                    end["place"]["id"] = null;
                    end["place"]["gid"] = null;
                    end["place"]["start_h"] = null;
                    end["place"]["start_m"] = null;
                    if ($(".end").find("a").eq(0).attr("href").includes("?id")) {
                        var temp = $(".end").find("a").eq(0).attr("href");
                        end["place"]["id"] = temp.substring(temp.indexOf("?id")+4,temp.length);
                    } else if ($(".end").find("a").eq(0).attr("href").includes("?gid")) {
                        var temp = $(".end").find("a").eq(0).attr("href");
                        end["place"]["gid"] = temp.substring(temp.indexOf("?gid")+5,temp.length);
                    }
                    if($(".end").find("input").eq(0).val().trim()!="") {
                        if(($(".end").find("input").eq(0).val().trim()-0)>=0 && ($(".end").find("input").eq(0).val().trim()-0)<24) {
                            end["place"]["start_h"] = $(".end").find("input").eq(0).val().trim();
                        } else {
                            $(".end").find("input").eq(0).css("border-color", "#ed4337");
                            error=true;
                        }
                    }
                    if($(".end").find("input").eq(1).val().trim()!="") {
                        if(($(".end").find("input").eq(1).val().trim()-0)>=0 && ($(".end").find("input").eq(1).val().trim()-0)<60) {
                            end["place"]["start_m"] = $(".end").find("input").eq(1).val().trim();
                        } else {
                            $(".end").find("input").eq(1).css("border-color", "#ed4337");
                            error=true;
                        }
                    }
                }
                var place = {};
                place["place"] = null;
                if ($(".addPlace").length >0) {
                    place["place"] = {};
                    for (var i = 0 ; i< $(".editDay_container").length; i++) {
                        place["place"][i] = null;
                        if ($(".editDay_container").eq(i).find(".addPlace").length > 0) {
                            place["place"][i] = {};
                        }
                        var placeBlock = $(".editDay_container").eq(i).find(".addPlace");
                        for (var y = 0 ; y<placeBlock.length; y++) {
                            place["place"][i][y] = {};
                            place["place"][i][y]["id"] = null;
                            place["place"][i][y]["gid"] = null;
                            place["place"][i][y]["start_h"] = null;
                            place["place"][i][y]["start_m"] = null;
                            place["place"][i][y]["spend"] = null;
                            if ($(placeBlock).eq(y).find("a").eq(0).attr("href").includes("?id")) {
                                var temp = $(placeBlock).eq(y).find("a").eq(0).attr("href");
                                place["place"][i][y]["id"] = temp.substring(temp.indexOf("?id")+4,temp.length);
                            } else if ($(placeBlock).eq(y).find("a").eq(0).attr("href").includes("?gid")) {
                                var temp = $(placeBlock).eq(y).find("a").eq(0).attr("href");
                                place["place"][i][y]["gid"] = temp.substring(temp.indexOf("?gid")+5,temp.length);
                            }
                            if($(placeBlock).eq(y).find("input").eq(0).val().trim()!="") {
                                if(($(placeBlock).eq(y).find("input").eq(0).val().trim()-0)>=0 && ($(placeBlock).eq(y).find("input").eq(0).val().trim()-0)<24) {
                                    place["place"][i][y]["start_h"] = $(placeBlock).eq(y).find("input").eq(0).val().trim();
                                } else {
                                    $(placeBlock).eq(y).find("input").eq(0).css("border-color", "#ed4337");
                                    error=true;
                                }
                            }
                            if($(placeBlock).eq(y).find("input").eq(1).val().trim()!="") {
                                if(($(placeBlock).eq(y).find("input").eq(1).val().trim()-0)>=0 && ($(placeBlock).eq(y).find("input").eq(1).val().trim()-0)<60) {
                                    place["place"][i][y]["start_m"] = $(placeBlock).eq(y).find("input").eq(1).val().trim();
                                } else {
                                    $(placeBlock).eq(y).find("input").eq(1).css("border-color", "#ed4337");
                                    error=true;
                                }
                            }
                            if($(placeBlock).eq(y).find("input").eq(2).val().trim()!="") {
                                if(($(placeBlock).eq(y).find("input").eq(2).val().trim()-0)>0 && ($(placeBlock).eq(y).find("input").eq(2).val().trim()-0)<1440) {
                                    place["place"][i][y]["spend"] = $(placeBlock).eq(y).find("input").eq(2).val().trim();
                                } else {
                                    $(placeBlock).eq(y).find("input").eq(2).css("border-color", "#ed4337");
                                    error=true;
                                }
                            }
                        }
                    }
                }
                var hotel = {}
                hotel["place"] = null;
                if($(".editHotel_container").length>0) {
                    hotel["place"] = {};
                    for (var i = 0; i<$(".editHotel_container").length; i++) {
                        hotel["place"][i]=null;
                        var placeBlock = $(".editHotel_container").eq(i).find("tr");
                        if (placeBlock.length>0) {
                            hotel["place"][i] = {};
                            hotel["place"][i]["id"] = null;
                            hotel["place"][i]["gid"] = null;
                            if ($(placeBlock).find("a").eq(0).attr("href").includes("?id")) {
                                var temp = $(placeBlock).find("a").eq(0).attr("href");
                                hotel["place"][i]["id"] = temp.substring(temp.indexOf("?id")+4,temp.length);
                            } else if ($(placeBlock).find("a").eq(0).attr("href").includes("?gid")) {
                                var temp = $(placeBlock).find("a").eq(0).attr("href");
                                hotel["place"][i]["gid"] = temp.substring(temp.indexOf("?gid")+5,temp.length);
                            }
                        }
                    }
                }
                if (error) {
                    alert("error!\r\nPlease check your input.")
                } else {
                    $("#load").load("gen_step2",{"start":start,"end":end,"place":place,"hotel":hotel,"plan": "<?php echo $_POST["planid"]?>"});
                    $(".loading").show();
                    setInterval(function(){ 
                        $("#load").load("gen_step3",{"planid":<?php echo$_POST["planid"]?> });
                    }, 5000);
                }
            })
        </script>
    </div
    ><div id="editPlanPanel">
        <div id="addPlacePlan" class="panel" style="display: none"></div>
        <div id="startPointPlan" class="panel"></div>
        <div id="endPointPlan" class="panel" style="display: none"></div>
        <div id="setHotelPlan" class="panel" style="display: none"></div>
    </div>
<?php
        require("html_end.php");
    }
?>