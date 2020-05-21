<?php $required=1; require("html_start.php"); require("home_text.php"); require("database.php");?>
<div id="banner_container">
    <table style="width:100%; height:100%;text-align:center;">
            <tr><td>
        <div id="banner_content">
        <div>
            <form id="createPlanFrm">
                <formline><?php echo $home_text["plantrip"]?></formline>
                <formline><?php echo $home_text["country"] ?> 
                    <select style="width:500px">
                        <option value='0'><?php echo $home_text["selectcountry"]?></option>
<?php
                        $sql = "SELECT countryID, ".$_SESSION["lang"]." AS name FROM country ORDER BY name";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<option value='".$row["countryID"]."'>".$row["name"]."</option>";
                            }
                        }
?>
                    </select>
                </formline>
                <formline><?php echo $home_text["participant"]?> <input type="number" style="width:100px" value="1"></formline>
                <formline><?php echo $home_text["from"]?> <input type="date" data="start"> <?php echo $home_text["to"]?> <input type="date" data="end"></formline>
                <formline><input type="checkbox"> <?php echo $home_text["transport"]?></formline>
                <button><?php echo $home_text["nextstep"]?></button>
            </form>
            <?php //print_r($_SERVER)?>
            <?php //echo password_hash("!@3$%^&*()-_=+`~[{\]}\\|;:'\",<.>\/?]",PASSWORD_DEFAULT);?>
        </div>
</div>
</td></tr>
</table>
</div>
<div id="popular_country">
    <h2><?php echo $home_text["popularcountries"]?></h2>
    <center>
        <?php
            $sql = "SELECT country.countryID,".$_SESSION["lang"]." AS name, EN FROM country left join plan on country.countryID = plan.countryID AND state = 2 GROUP BY country.countryID ORDER BY count(EN) DESC, name";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<div class='drag'>";
                while($row = $result->fetch_assoc()) {
                    echo 
                        "<div data='".$row["countryID"]."'>".
                            "<img src='imgs/country/".$row["EN"].".jpg'><br>".
                            "<b style='cursor: pointer'>".$row["name"]."</b>".
                        "</div>";
                }
                echo "</div>";
            }
        ?>
    </center>
</div>
<script>
    $("#popular_country .drag").dragscroll();
</script>
<div id="explore_places">
</div>
<script>
    $("#popular_country b").click(function() {
        $("#explore_places").load("explorePlace",{"country": $(this).closest("div").attr("data")});
    })
        $("#explore_places").load("explorePlace",{"country": $("#popular_country div div").eq(0).attr("data")});
</script>
<?php $conn->close();require("html_end.php");?>