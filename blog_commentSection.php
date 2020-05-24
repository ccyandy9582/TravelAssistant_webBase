
<?php
    if (!(isset($_POST["blogid"]))) {
        require("404.php");
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_POST["page"])) {
            $_POST["page"] = 1;
        }
        $required= true;
        require("blog_commentSection_text.php");
        require("database.php");
        $sql = "select count(commentid) as num from blog_comment where blogid = ".$_POST["blogid"];
        $result = $conn->query($sql);
        echo '
            <div style="text-align:right">
                '.$blog_commentSection_text["page"].':<select id="page">
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
                    $('#page').off('change');
                    $('#page').change(function() {
                        $('#blog_commentSection_list').load('blog_commentSection',{blogid:".$_POST["blogid"].",page: $(this).val()});
                    })
                </script>
            </div>
        ";
        if ($row["num"] == 0) {
            echo $blog_commentSection_text["noComment"];
        } else {
            $sql = "select name,comment,commentid,banned,user.userid from blog_comment,user where blog_comment.userid = user.userid and blogid = ".$_POST["blogid"]." Order by commentid desc Limit ".($currentpage*$commentPerPage-$commentPerPage).",".$commentPerPage;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
                        <div class='comment_container' data='".$row["commentid"]."'>
                            <div class='comment_user'>".$row["name"];
                    if (isset($_SESSION["admin"])) {
                        echo (($row["banned"]==0)?"<a href='myplan?id=".$row["userid"]."'>view</a> <span class='ban' banned='".$row["banned"]."' user='".$row["userid"]."'>".$blog_commentSection_text["ban"]."</span>":" <span class='ban' banned='".$row["banned"]."' user='".$row["userid"]."'>".$blog_commentSection_text["unban"]."</span>");
                    }
                    echo "</div>";
                    if (isset($_SESSION["admin"])) {
                        echo "<span style='float:right' class='remove' comment='".$row["commentid"]."'>".$blog_commentSection_text["remove"]."</span>";
                    } else if (isset($_SESSION["userid"])) {
                        if ($row["userid"]==$_SESSION["userid"]) {
                            echo "<span style='float:right' class='remove' comment='".$row["commentid"]."'>".$blog_commentSection_text["remove"]."</span>";
                        }
                    } 
                    echo "
                            <div class='comment_msg'>".nl2br($row["comment"])."</div>
                        </div>
                        <script>
                    ";
                    if (isset($_SESSION["admin"])) {
                        echo "
                        $('.ban').off('click');
                        $('.ban').click(function() {
                            $('#load').load('ban',{banned: $(this).attr('banned'), user: $(this).attr('user')});
                        })
                        ";
                    }
                    echo "
                        $('.remove').off('click');
                        $('.remove').click(function() {
                            $('#load').load('remove_blog_comment',{commentid: $(this).attr('comment'), blogid:".$_POST["blogid"]."});
                        })
                        </script>
                    ";
                }
            }
        }
        $conn->close();
    }
?>