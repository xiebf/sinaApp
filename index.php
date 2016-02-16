<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>前端学习分享</title>
    <link rel="stylesheet" type="text/css" href="css/stylesheet_tm.css">
    <link rel="stylesheet" type="text/css" href="css/mainstyle.css">
    <script src="js/jscript_jquery-1.4.2.min.js" type="text/javascript"></script>
    <script src="js/jscript_jquery.faded.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $("#faded").faded();
            var music = document.getElementById("bgMusic");
            $("#audioBtn").click(function(){
                if(music.paused){
                    music.play();
                    $(this).addClass('start');
                }else{
                    music.pause();
                    $(this).removeClass('start');
                }
            });
        });

    </script>
</head>
<body>
    <div id="faded">
        <ul>
            <li><img height='468px' alt="" src="images/pic2.jpg" width='1024px'></li>
            <li><img height='468px' alt="" src="images/pic3.jpg" width='1024px'></li>
            <li><img height='468px' alt="" src="images/pic4.jpg" width='1024px'></li>
            <li><img height='468px' alt="" src="images/pic5.jpg" width='1024px'></li>
            <li><img height='468px' alt="" src="images/pic6.jpg" width='1024px'></li>
        </ul>
    </div>
    <a class="mscBtn start" id="audioBtn" style="cursor:pointer;">♬</a>
    <audio id="bgMusic" src="music/Westlife - Seasons In The Sun.mp3" autoplay="autoplay" loop="loop"></audio>
    <div class='title_item'>
        <b>
            <a class="title" href="content/baidu_heat_map.php" target="_blank">百度地图API-Web开发-JavaScript API的一些总结</a> 
        </b>
        <br />
        <p class="title_content">
            &nbsp;公司搞了一个tms系统(运输管理系统)，想利用百度API显示一个地区的订单的分布情况，刚开始是利用描点来显示，一个
        点一个点画，数量少的时候也勉强能看出订单的分布情况，当添加多个点且点数达到6000以上时，浏览器就hold不住了，于是
        乎有幸让我去用热力图来显示订单分布情况...

        </p>
    </div>
    <div class='title_item'>
        <b>
            <a class="title" href="content/password_level.php" target="_blank">JS判断密码强度</a> 
        </b>
        <br />
        <p class="title_content">
            &nbsp;收藏了一个JS判断密码强度的demo,用二进制1、10、100和1000分别表示含有数字、含有大写字母、含有小写字母和含有其
        他字符的密码，用'|'运算组合多种类型的密码，再判断二进制数mode中1的个数来判断含有类型的个数，判断完一个位数后，
        二进制数mode向右移一位，代码非常的精简...
        </p>
    </div>
    <div class='title_item'>
        <b>
            <a class="title" href="content/disabled_readonly.php" target="_blank">表单中Readonly和Disabled的区别</a> 
        </b>
        <br />
        <p class="title_content">
            &nbsp;今天发生了神奇的BUG，用户信息修改后，用户名会变成空，顿时觉得好奇怪，用户名怎么会莫名其妙的变为空了，一看用户名是不
        可编辑，感觉问题是出在这里了，F12看下源码，原来是disabled=“disabled”出了问题，当样式为disabled时，表单提交是无法获取数据的，
        百度了一下，记录下disabled和readonly的详细区别...
        </p>
    </div>
</body>
</html>