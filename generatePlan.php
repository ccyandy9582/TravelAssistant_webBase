<?php 
    if (!isset($_POST["country"]) || !isset($_POST["number"]) || !isset($_POST["start"]) || !isset($_POST["end"]) || !isset($_POST["transport"])) {
        require("404.php");
    } else { 
        $required=1;
        require("html_start.php");
?>
    <script>
        $("document").ready(function() {
            $(".drag").sortable({connectWith: '.drag',items: "tr:not(.space):not(.start):not(.end)"});
            $("#startPointPlan").load("startPointPlan",{country: <?php echo $_POST["country"]?>,query: ""});
            $(".start div").click(function() {
                $(".panel").hide();
                $("#startPointPlan").show();
            })
            var endFirst = true;
            $(".end div").click(function() {
                if (endFirst) {
                    $("#endPointPlan").load("endPointPlan",{country: <?php echo $_POST["country"]?>,query: ""});
                    endFirst = false;
                }
                $(".panel").hide();
                $("#endPointPlan").show();
            })
            var addFirst = true;
            $(".ptg span").click(function() {
                if (addFirst) {
                    $("#addPlacePlan").load("addPlacePlan",{country: <?php echo $_POST["country"]?>,query: ""});
                    addFirst = false;
                }
                $(".panel").hide();
                $("#addPlacePlan").show();
            })
            var hotelFirst = true;
            $(".editHotel_container div").click(function() {
                if (hotelFirst) {
                    $("#setHotelPlan").load("setHotelPlan",{country: <?php echo $_POST["country"]?>,query: "", day: $(this).closest(".editHotel_container").attr("data"), check:1});
                    hotelFirst = false;
                }
                $(".panel").hide();
                $("#setHotelPlan").show();
            })
        })
    </script>
    <div id="editPlan">
        <div class="editDay_container ptg">
            <h4>Place to go <span>Add</span></h4>
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
        <div class="editDay_container">
            <h4>Day 1</h4>
            <!-- <div style="height:102px; border:5px dashed black; border-radius:15px"></div> -->
            <table>
                <tbody class="drag">
                    <tr class="start">
                        <td colspan="2">
                            <div>Set Starting Point</div>
                        </td>
                    </tr>
                    <!-- <tr class="space">
                        <td colspan="2" height="20"></td>
                    </tr> -->
                </tbody>
            </table>
        </div>
        <div class="editHotel_container" data="0">
            <div>Set Hotel</div>
        </div>
        <div class="editDay_container">
            <h4>Day 2</h4>
            <table>
                <tbody class="drag">
                    <tr class="space">
                        <td colspan="2" height="20"></td>
                    </tr>
                    <tr class="space" style="display:none">
                        <td colspan="2"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div  class="editHotel_container" data="1">
            <div>Set Hotel</div>
        </div>
        <div class="editDay_container">
            <h4>Day 3</h4>
            <table>
                <tbody class="drag">
                    <tr class="space">
                        <td colspan="2" height="20"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="display:none"></td>
                    </tr> 
                    <tr class="space" style="display:none">
                        <td colspan="2"></td>
                    </tr>
                    <tr class="space end">
                        <td colspan="2">
                            <div>Set Ending Point</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <center><div id="gen_btn">generate</div></center><br>
        <div class="loading"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
        <script>
            $("#gen_btn").click(function() {
                // window.location.href = "resultPage";
                $(".loading").show();
                setTimeout(function() {window.location.replace("resultPage");},5000);
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