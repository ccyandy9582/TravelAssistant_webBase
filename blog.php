<?php $required=1;
    require("html_start.php");
    require("blog_text.php");
    if(!isset($_GET["id"])) {?>
    <table id="blog_search_container">
        <tr><td>
            <input placeholder="<?php echo $blog_text["Search"]?>.."> <button><?php echo $blog_text["Search"]?></button>
        </td></tr>
    </table><br>
    <div id = "blog_load">
    </div>
    <script>
        $("#blog_load").load("blogload",{sort:"newest",page: 1, query: ""});
    </script>
<?php
    } else {
        require("database.php");
        $rating = null;
        $sql = "SELECT avg(rating) as rating from userrate_blog where blogid=".$_GET["id"];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                $rating = $row["rating"];
            }
        }
        $sql = "SELECT title, content, planid from blog where blogid=".$_GET["id"];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
?>
                <div id="blog">
                    <button class="viewplan" style="float:right"><?php echo $blog_text["viewplan"]?></button>
                    <h2 style="width:calc(100% - 150px)"><?php echo $row["title"]?></h2>
                    <script>
                        $(".viewplan").click(function() {
                             window.open("plan?id=<?php echo $row["planid"]?>");
                        });
                    </script>
<?php
                    echo $blog_text["rating"]." : ";
                    if ($rating == null) {
                        echo "-";
                    } else {
                        for ($i = 1; $i<=$rating; $i++) {
                            echo "★";
                        }
                        for ($i = 5;$i>$rating;$i--){
                            echo "☆";
                        }
                    }
?>
                    <hr>
                    <div class="content"></div>
                </div>
                <div style="display:none">
                    <div id="json"><?php echo htmlspecialchars($row["content"])?></div>
                    <div id="quill"></div>
                </div>
                <script>
                    quill = new Quill('#quill', {
                        theme: 'snow'
                    });
                    delta = JSON.parse($("#json").text());
                    quill.setContents(delta);
                    $("#blog .content").html($("#quill .ql-editor").html());
                </script>
                <div id="blog_commentSection">
<?php
                    if (isset($_SESSION["userid"])) {
?>
                        <h2><?php echo $blog_text["myrating"];?>:
<?php
                        $sql = "select rating from userrate_blog where blogid = ".$_GET["id"]." and userid = ".$_SESSION["userid"];
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            if ($row = $result->fetch_assoc()) {
                                $myrating = $row["rating"];
                            }
                        } else {
                            $myrating = 0;
                        }
                        for ($i = 1; $i<=$myrating; $i++) {
                            echo '<span class="rating" val="'.$i.'">★</span>';
                        }
                        for ($i = $myrating+1;$i<=5;$i++){
                            echo '<span class="rating" val="'.$i.'">☆</span>';
                        }
?>
                        </h2>
                        <script>
                            $(".rating").click(function() {
                                $("#load").load("rate_blog_process.php",{rating: $(this).attr("val"),blogid: <?php echo $_GET["id"]?>});
                            })
                        </script>
<?php
                        }
?>
                    <h2><?php echo $blog_text["comments"];?>:</h2>
<?php
                    if (isset($_SESSION["userid"])) {
                        $sql = "select userid from user where userID = ".$_SESSION["userid"];
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            if ($row = $result->fetch_assoc()) {
                                echo "
                                    <textarea id='command_input' rows='4'></textarea>
                                    <button  style='width: 100px' id='post_comment'>".$blog_text["post"]."</button>
                                    <script>
                                        function autoResize() { 
                                            this.style.height = 'auto'; 
                                            this.style.height = this.scrollHeight + 'px'; 
                                        } 
                                        textarea = document.querySelector('#command_input'); 
                                        textarea.addEventListener('input', autoResize, false);
                                    </script>
                                ";
?>
                                <script>
                                    $('#post_comment').click(function() {
                                        $('#load').load('blog_comment_process',{'val':$('#command_input').val(),'blogid':<?php echo$_GET["id"];?>});
                                        $('#blog_commentSection_list').load('blog_commentSection',{'blogid':<?php echo$_GET["id"];?>});
                                    })
                                </script>
<?php
                            }
                        }
                    }
?>
                    <div id="blog_commentSection_list"></div>
                    <script>
                        $('#blog_commentSection_list').load('blog_commentSection',{'blogid':<?php echo$_GET["id"];?>});
                    </script>
                </div>
<?php
            }
        } else {
?>
            <script>
                window.location.replace("blog");
            </script>
<?php
        }
        $conn->close();
    }
?>
<?php require("html_end.php");?>