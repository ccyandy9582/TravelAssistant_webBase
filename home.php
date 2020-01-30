<?php require("html_start.php");?>
<div id="banner_container">
    <table style="width:100%; height:100%;text-align:center;">
            <tr><td>
        <div id="banner_content">
        <div>
            <form>
                <formline>PLAN YOUR TRIP</formline>
                <formline>Country <input style="width:300px"></input></formline>
                <formline>Number of participate <input type="number" style="width:100px"></formline>
                <formline>From <input type="date"> To <input type="date"></formline>
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
        <img src="/fyp/imgs/country/japan.jpg"><br>
        <b>Japan</b>
    </div>
    <div>
        <img src="/fyp/imgs/country/Taiwan.jpg"><br>
        <b>Taiwan</b>
    </div>
    <div>
        <img src="/fyp/imgs/country/Switzerland.jpg"><br>
        <b>Switzerland</b>
    </div>
    <div>
        <img src="/fyp/imgs/country/UK.jpg"><br>
        <b>UK</b>
    </div>
</div>
<div id="explore_places">
    <h2>Explore places </h2>
    <div>
        <img src="/fyp/imgs/attraction/osaka.jpg"><br>
        <b>Osaka</b>
    </div>
    <div>
        <img src="/fyp/imgs/attraction/tokyo.jpg"><br>
        <b>Tokyo</b>
    </div>
    <div>
        <img src="/fyp/imgs/attraction/nara.jpg"><br>
        <b>Nara</b>
    </div>
    <div>
        <img src="/fyp/imgs/attraction/YasakaShrine.jpg"><br>
        <b>Yasaka Shrine</b>
    </div>
</div>
<?php require("html_end.php");?>