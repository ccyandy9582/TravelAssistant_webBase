<?php require("html_start.php");?>
<table id="blog_search_container">
    <tr><td>
        <input placeholder="Search.."> <button>search</button>
    </td></tr>
</table><br>
<?php if(!isset($_GET["bid"])) {?>
    <select id="blog_sort">
        <option>most popular</option>
    <select><br><br><br>
    <div class="blog_container">
        <h4>大阪市區景點巡禮 <span>By user1</span></h4>
        如果你的關西自由行有打算停留滿滿的一天在大阪，推薦可以先從大阪市區幾個比較經典的景點開始玩，由於大阪的交通超方便！所有景點都可以搭乘「大阪地下鐵」到達，如果使用「大阪周遊卡」，這些景點都是免費不用再買門票入場，一整個超划算。
        <br><div class="blog_more"><a href="/fyp/blog?bid=1">Read More&#187;</a></div>
    </div>
    <div class="blog_container">
        <h4>環球影城一日遊 <span>By user2</span></h4>
        大阪最值得去的景點，飄兒首推大阪環球影城，縱使一整天都耗在園區裡也玩不膩，裡面設施、美景很多，無論大人小孩都可以玩得很盡興，如果晚上還有體力，就去道頓崛或梅田逛逛、吃美食都來得及，由於大阪環球影城要注意的事情太多，大家可以直接點下面文章參考：
        <br><div class="blog_more"><a>Read More&#187;</a></div>
    </div>
    <div class="blog_container">
        <h4>大阪購物逛街景點 <span>By user3</span></h4>
        購物行程沒什麼好安排的，飄兒直接提供大阪最好買的三個區域給大家，每個商業區可以逛的重點都不一樣，大家直接找自己想逛的去，如果一天想去三個也不是問題，交通方式都是靠大阪地下鐵或是JR就可以到了。
        <br><div class="blog_more"><a>Read More&#187;</a></div>
    </div>
    <div id="page">
        <div><</div><div>1</div><div>></div>
    </div>
<?php } else {?>
    <div id="blog">
        <h2>大阪市區景點巡禮</h2>
        自從飄兒開始寫大阪自由行旅遊攻略文開始，讀者對於如何安排大阪自由行行程、大阪交通票券怎麼買等大阪旅遊相關的留言與問題彷彿雪花般接踵而來，飄兒雖然無法一一回覆，但飄兒都有看到，為了幫助廣大的大阪自由行玩家們，你們的問題我都整理在這篇2020最新大阪自由行攻略文了！<br>
        <img src="/fyp/imgs/blog/example.webp">
    </div>
<?php }?>
<?php require("html_end.php");?>