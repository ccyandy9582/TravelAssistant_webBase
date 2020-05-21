<?php 
    if (!isset($_POST["country"])) {
        require("404.php");
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $required = 1;
        require("explorePlace_text.php");
?>
        <h2><?php echo $explorePlace_text["exploreplace"]?></h2>
        <center>
<?php 
            require("database.php");
            require("api_key.php");
            $sql = "select attraction.attractionID, attraction.name, img from attraction left join (select attractionID, count(*) as num from plan, plan_content where plan.planID = plan_content.planID and plan_content.attractionID is not null and plan_content.type = 1 and plan.state = 1 group by attractionId order by count(*) desc) as plan_content on plan_content.attractionID = attraction.attractionID where attraction.countryID = ".$_POST["country"]." order by num desc, attraction.name LIMIT 20";
            //$sql = "select name,img,plan_content.attractionID from plan,plan_content,attraction where attraction.attractionID = plan_content.attractionID and plan.planID = plan_content.planID and plan.state = 2 and plan.countryID = ".$_POST["country"]." and plan_content.attractionID is not null and plan_content.type=1 group by plan_content.attractionID order by count(plan_content.attractionID) desc";
            //$sql = "select attraction.attractionID,name,img from attraction, (select attractionid from plan_content,plan WHERE plan.planid = plan_content.planid and attractionid is not null and type = 1 and add_by <> 2 and state = 2 and countryid = ".$_POST["country"]." group by plan_content.planID, attractionid) as num where attraction.attractionid = num.attractionid group by attraction.attractionid order by count(attraction.attractionid) desc LIMIT 20";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<div class='drag'>";
                while($row = $result->fetch_assoc()) {
                    echo 
                        "<div>".
                            "<img src='https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=".$row["img"]."&key=".$googleapi."'><br>".
                            "<a href='place?id=".$row["attractionID"]."'><b style='color:black'>".$row["name"]."</b></a>".
                        "</div>";
                }
                echo "</div>";
            }
?>
        </center>
        <script>
            $("#explore_places .drag").dragscroll();
            
            $("img").on('error', function() {
                $(this).attr("src", "imgs/imgNotAvaliable.jpeg")
            })
        </script>
<?php
        $conn->close();
    }
?>