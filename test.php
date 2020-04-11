<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Drag — A JavaScript hold and drag utility</title>
    <script src="/fyp/js/jquery.js"></script>
    <script src="/fyp/js/script.js"></script>
    <script src="/fyp/js/sortable.js"></script>
    <script src="/fyp/js/mouse.js"></script>
    <script src="/fyp/js/jquery.dragscroll.min.js"></script>
<style>
.drag-box{
  /* width: 400px; */
  overflow: hidden;
    white-space: nowrap;
}</style>
<body>
<div class="drag-box">

<!-- draggable content -->
<center class="drag">
  <img id="test" src="https://source.unsplash.com/KZc9h88nwpM/500x400">
  <img src="https://source.unsplash.com/KZc9h88nwpM/500x400">
</center>
<img  src="a">
<script>
    $("img")
    .on('error', function() { alert("error loading image"); })
    .attr("src", $(originalImage).attr("src"))
;
$(function(){
  $('.drag').dragscroll();
});
</script>
</div>
</body>
</html>