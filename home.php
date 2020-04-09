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
    <h2><?php for ($i=0;$i<52;$i++) {echo "&nbsp;";}?>Popular countries </h2>
    <center><div>
        <img src="imgs/country/japan.jpg"><br>
        <b>Japan</b>
    </div>
    <div>
        <img src="imgs/country/Taiwan.jpg"><br>
        <b>Taiwan</b>
    </div>
    <div>
        <img src="imgs/country/Switzerland.jpg"><br>
        <b>Switzerland</b>
    </div>
    <div>
        <img src="imgs/country/UK.jpg"><br>
        <b>UK</b>
    </div></center>
</div>
<div id="explore_places">
    <h2><?php for ($i=0;$i<52;$i++) {echo "&nbsp;";}?>Explore places </h2>
    <center><div>
        <img src="imgs/attraction/osaka.jpg"><br>
        <b>Osaka</b>
    </div>
    <div>
        <img src="imgs/attraction/tokyo.jpg"><br>
        <b>Tokyo</b>
    </div>
    <div>
        <img src="imgs/attraction/nara.jpg"><br>
        <b>Nara</b>
    </div>
    <div>
        <img src="imgs/attraction/YasakaShrine.jpg"><br>
        <b>Yasaka Shrine</b>
    </div></center>
</div>
<?php $conn->close();require("html_end.php");?>