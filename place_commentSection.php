
<?php
    if (!(isset($_POST["attractionid"]))) {
        require("404.php");
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $required= true;
        require("place_commentSection_text.php");
        require("database.php");
        $sql = "select count(commentid) as num from attraction_comment where attractionid = ".$_POST["attractionid"];
        $result = $conn->query($sql);
        echo '
            <div style="text-align:right">
                page:<select id="page">
                    <option>1</option>';
        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                if ($row["num"] == 0) {
                    $currentpage = 1;
                } else {
                    $currentpage = $_POST["page"];
                }
                $commentPerPage = 20;
                $pagenum = ceil($row["num"]/$commentPerPage);
                if ($currentpage > $pagenum && $currentpage != 1) {
                    $currentpage = $pagenum;
                }
                for ($i = 2; $i<=$pagenum;$i++){
                    echo "<option>".$i."</option>";
                }
            }
        }
        echo "
                </select>
                <script>
                    $('#page').val(".$currentpage.");
                    $('#page').change(function() {
                        $('#place_commentSection_list').load('place_commentSection',{attractionid:".$_POST["attractionid"].",page: $(this).val()});
                    })
                </script>
            </div>
        ";
        if ($row["num"] == 0) {
            echo "No comment avaliable";
        } else {
            $sql = "select name,comment,commentid,banned,user.userid from attraction_comment,user where attraction_comment.userid = user.userid and attractionid = ".$_POST["attractionid"]." Order by commentid desc Limit ".($currentpage*10-10).",".$commentPerPage;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
                        <div class='comment_container' data='".$row["commentid"]."'>
                            <div class='comment_user'>".$row["name"];
                    if (isset($_SESSION["admin"])) {
                        echo (($row["banned"]==0)?" <span class='ban' banned='".$row["banned"]."' user='".$row["userid"]."'>".$place_commentSection_text["ban"]."</span>":" <span class='ban' banned='".$row["banned"]."' user='".$row["userid"]."'>".$place_commentSection_text["unban"]."</span>");
                    }
                    echo "</div>";
                    if (isset($_SESSION["admin"])) {
                        echo "<span style='float:right' class='remove' comment='".$row["commentid"]."'>".$place_commentSection_text["remove"]."</span>";
                    } else if (isset($_SESSION["userid"])) {
                        if ($row["userid"]==$_SESSION["userid"]) {
                            echo "<span style='float:right' class='remove' comment='".$row["commentid"]."'>".$place_commentSection_text["remove"]."</span>";
                        }
                    } 
                    echo "
                            <div class='comment_msg'>".nl2br($row["comment"])."</div>
                        </div>
                        <script>
                    ";
                    if (isset($_SESSION["admin"])) {
                        echo "
                            $('.ban').click(function() {
                                $('#load').load('ban',{banned: $(this).attr('banned'), user: $(this).attr('user')});
                            })
                        ";
                    }
                    echo "
                        $('.remove').click(function() {
                            $('#load').load('remove_attraction_comment',{commentid: $(this).attr('comment')});
                        })
                        </script>
                    ";
                }
            }
        }
        $conn->close();
    }
?>