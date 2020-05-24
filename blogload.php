<?php
    if(!(isset($_POST["page"]) && isset($_POST["sort"]) && isset($_POST["query"]))) {
        require("404.php");
    } else {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $required = 1;
        require("database.php");
        require("blogload_text.php");
        if ($_POST["sort"] == "newest") {
            $sql = "SELECT count(blog.blogid) as num from user, blog where blog.userid = user.userid and blog.state <> 2";
        } else if ($_POST["sort"] == "rating") {
            $sql = "SELECT count(*) from (SELECT count(blog.blogid) as num  from user, blog, userrate_blog where blog.userid = user.userid and blog.state <> 2 and userrate_blog.blogid = blog.blogid  group by blog.blogid) as temp";
        }
        $result = $conn->query($sql);
        echo '
            <div style="text-align:right">
                '.$blogload_text["page"].':<select id="page">
                    <option>1</option>';
        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                if ($row["num"] == 0) {
                    $currentpage = 1;
                } else {
                    $currentpage = $_POST["page"];
                }
            }
        } else {
            $currentpage = 1;
        }
        $blogPerPage = 10;
        $pagenum = ceil($row["num"]/$blogPerPage);
        echo $pagenum;
        if ($currentpage > $pagenum && $currentpage != 1) {
            $currentpage = $pagenum;
        }
        for ($i = 2; $i<=$pagenum;$i++){
            echo "<option>".$i."</option>";
        }
        echo "</select></div>";
?>
        <select id="blog_sort">
            <option value="rating"><?php echo $blogload_text["rating"]?></option>
            <option value="newest"><?php echo $blogload_text["newest"]?></option>
        <select><br><br><br>
<?php
        if ($_POST["sort"] == "newest") {
            $sql = "SELECT name,content,title,blogid from user, blog where blog.userid = user.userid and blog.state = 1 order by blogid desc limit ".($currentpage*$blogPerPage-$blogPerPage).",".$blogPerPage;
        } else if ($_POST["sort"] == "rating") {
            $sql = "SELECT name,content,title,blog.blogid from user, blog, userrate_blog where blog.userid = user.userid and blog.state = 1 and userrate_blog.blogid = blog.blogid  group by blog.blogid order by avg(rating) desc limit ".($currentpage*$blogPerPage-$blogPerPage).",".$blogPerPage;
        }
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
?>
                <div class="blog_container" id="blog_<?php echo $row["blogid"]?>">
                    <h4><?php echo $row["title"]?>
                        <span><?php echo $blogload_text["by"]?>
                            <?php echo ((isset($_SESSION["admin"]))?"<a href='myplan?name=".$row["name"]."'>".$row["name"]."</a>":$row["name"])?>
                        </span>
                    </h4>
                    <span class="content"></span>
                    <br><div class="blog_more"><a href="/fyp/blog?id=<?php echo  $row["blogid"]?>"><?php echo $blogload_text["readmore"]?>&#187;</a></div>
                </div>
                <div style="display:none">
                    <div id="json_<?php echo $row["blogid"]?>"><?php echo htmlspecialchars($row["content"])?></div>
                    <div id="quill_<?php echo $row["blogid"]?>"></div>
                </div>
                <script>
                    quill<?php echo $row["blogid"]?> = new Quill('#quill_<?php echo $row["blogid"]?>', {
                        theme: 'snow'
                    });
                    delta = JSON.parse($("#json_<?php echo $row["blogid"]?>").text());
                    quill<?php echo $row["blogid"]?>.setContents(delta);
                    $("#blog_<?php echo $row["blogid"]?> .content").text( quill<?php echo $row["blogid"]?>.getText(0,1000));
                </script>
<?php
            }
        }
?>
        <script>
            $("#page").val(<?php echo $currentpage;?>);
            $("#blog_sort").val("<?php echo $_POST["sort"];?>");
            $("#blog_sort").off("change");
            $("#blog_sort").change(function() {
                $("#blog_load").load("blogload",{sort: $("#blog_sort").val(),page: $("#page").val(), query: $("#blog_search_container input").eq(0).val()});
            })
            $("#page").off("change");
            $("#page").change(function() {
                $("#blog_load").load("blogload",{sort: $("#blog_sort").val(),page: $("#page").val(), query: $("#blog_search_container input").eq(0).val()});
            })
        </script>
<?php 
        $conn->close();
    }
?>