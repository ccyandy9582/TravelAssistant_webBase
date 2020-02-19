<?php $required=1; require("html_start.php"); require("database.php");?>
<div id="banner_container">
    <table style="width:100%; height:100%;text-align:center;">
            <tr><td>
        <div id="banner_content">
        <div>
            <form id="createPlanFrm">
                <formline>PLAN YOUR TRIP</formline>
                <formline>Country 
                    <select style="width:500px">
                        <option value='0'>------ SELECT A COUNTRY ------</option>
<?php
                        $sql = "SELECT * FROM country ORDER BY name";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<option value='".$row["countryID"]."'>".$row["name"]."</option>";
                            }
                        }
?>
                    </select>
                </formline>
                <formline>Number of participate <input type="number" style="width:100px" value="1"></formline>
                <formline>From <input type="date" data="start"> To <input type="date" data="end"></formline>
                <formline><input type="checkbox"> I will travel by transport in this trip.</formline>
                <button>Next Step</button>
            </form>
            <?php //print_r($_SERVER)?>
            <?php //echo password_hash("!@3$%^&*()-_=+`~[{\]}\\|;:'\",<.>\/?]",PASSWORD_DEFAULT);?>
        </div>
</div>
</td></tr>
</table>
</div>
<div id="popular_country">
    <h2>Popular countries </h2>
    <div>
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
    </div>
</div>
<div id="explore_places">
    <h2>Explore places </h2>
    <div>
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
    </div>
</div>
<?php $conn->close();require("html_end.php");?>