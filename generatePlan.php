<?php 
    if (!isset($_POST["planid"])) {
        require("404.php");
    } else { 
        $required=1;
        require("html_start.php");
        require("database.php");
        $sql = "SELECT plan.countryID,DATEDIFF(endTime, startTime)+1 AS day,country.name FROM plan,country WHERE planID = {$_POST["planid"]} AND state = 0 AND country.countryID = plan.countryID";
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
            <h4>Place to go (<?php echo $countryName;?>) <span>Add</span></h4>
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
            <h4>Day <?php echo $i?></h4>
            <!-- <div style="height:102px; border:5px dashed black; border-radius:15px"></div> -->
            <table>
                <tbody class="drag">
                    <?php if($i == 1){?>
                    <tr class="start">
                        <td colspan="2">
                            <div>Set Starting Point</div>
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
                            <div>Set Ending Point</div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php if ($i != $day) {?>
        <div class="editHotel_container" data="<?php echo $i?>">
            <div>Set Hotel</div>
        </div>
        <?php }?>
<?php }?>
        <br>
        <center><div id="gen_btn">generate</div></center><br>
        <div class="loading"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
        <script>
            $("#gen_btn").click(function() {
                // window.location.href = "resultPage";
                // $(".loading").show();
                // setTimeout(function() {window.location.replace("resultPage");},11346);
                $("#load").load("temp.php",{"test":"<?php echo $countryName;?>"});
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