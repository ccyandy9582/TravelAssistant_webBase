<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!(isset($_SESSION["userid"]) && isset($_GET["id"]))) {
?>
        <script>
            window.location.replace('home');
        </script>
<?php
    } else {
        $required = 1;
        require("html_start.php");
        require("editblog_text.php");
        require("database.php");
        $sql = "SELECT title, planid, content FROM blog where blogid =".$_GET["id"]." and userid = ".$_SESSION["userid"];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()) {
?>
                <h2><?php echo $editblog_text["editblog"]?> <button class="viewplan" style="float:right;"><?php echo $editblog_text["viewplan"];?></button></h2>
                <?php echo $editblog_text["title"];?>: <br><input type="text" style="width:100%" id="createblog_title" value="<?php echo $row["title"]?>">
                <div id="createblog_content">
                    <div class="toolbar-container">
                        <span class="ql-formats">
                            <select class="ql-font"></select>
                            <select class="ql-size"></select>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-bold"></button>
                            <button class="ql-italic"></button>
                            <button class="ql-underline"></button>
                            <button class="ql-strike"></button> </span>
                            <span class="ql-formats"> <select class="ql-color"></select>
                            <select class="ql-background"></select>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-script" value="sub"></button>
                            <button class="ql-script" value="super"></button>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-header" value="1"></button>
                            <button class="ql-header" value="2"></button>
                            <button class="ql-blockquote"></button>
                            <button class="ql-code-block"></button>
                        </span> <span class="ql-formats">
                            <button class="ql-list" value="ordered"></button>
                            <button class="ql-list" value="bullet"></button>
                            <button class="ql-indent" value="-1"></button>
                            <button class="ql-indent" value="+1"></button>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-direction" value="rtl"></button>
                            <select class="ql-align"></select>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-link"></button>
                            <button class="ql-image"></button>
                            <button class="ql-video"></button>
                            <button class="ql-formula"></button>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-clean"></button>
                        </span>
                        <div class="quill">
                            <p><br></p>
                        </div>
                    </div>
                </div><br><br><br><br>
                <div id="json" style="display: none;"><?php echo $row["content"]?></div>
                <div style="text-align:center"><button class="Post"><?php echo $editblog_text["post"]?></button></div>
                <script>
                    quill = new Quill('.quill', {
                        modules: { toolbar: '.toolbar-container' },
                        theme: 'snow', bounds: "#test"
                    });
                    quill.setContents(JSON.parse($("#json").eq(0).text()));
                    $(".viewplan").click(function() {
                        window.open("plan?id=<?php echo $row["planid"]?>");
                    })
                    $(".post").click(function() {
                        var delta = JSON.stringify(quill.getContents());
                        $("#load").load("editblog_submit",{title:$("#createblog_title").val(),blogid:<?php echo $_GET["id"]?>, content:delta});
                    })
                </script>
<?php
            }
        }
        $conn->close();
        require("html_end.php");
    }
?>