<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>百度地图API-Web开发-JavaScript API的一些总结</title>
	<link rel="stylesheet" type="text/css" href="../css/article.css">
	<link rel="stylesheet" type="text/css" href="../css/prism.css">
	<link type="text/css" href="calendar/css/calendar.css" rel="stylesheet" />
	<script src="../js/jscript_jquery-1.4.2.min.js" type="text/javascript"></script>
	<script src="calendar/js/calendar.js" type="text/javascript"></script>
	<script src="../js/prism.js"></script>
</head>
<body>
		<div class="main">
			<div class="header">
			<p>进击の小风</p>
			</div>
			<hr />
			<div class="title">
				<b>
	            	<a href="baidu_heat_map.html" target="_blank">百度地图API-Web开发-JavaScript API的一些总结</a> 
	        	</b>
	        	<p>
	        		&nbsp;首选介绍下如何使用javascript版的百度地图API：<br />
	        		&nbsp;1.获取密钥<br />
	        		&nbsp;2.在文件头部添加
	        		<pre>
	        			<code class="language-javascript">
	&lt;script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=你的密钥"&gt;&lt;/script&gt;
	        			</code>
	        		</pre>
	        	</p>
	        	<p>
	        		第一个步骤：如何切换到以某个城市为中心的视角<br />
	        	</p>
	        		<pre>
	        			<code class="language-javascript">	
	var map = new BMap.Map("container");          // 创建地图实例
    var point = new BMap.Point(116.418261, 39.921984);
    map.centerAndZoom(point, 15);             // 初始化地图，设置中心点坐标和地图级别
    map.enableScrollWheelZoom(); // 允许滚轮缩放
						</code>
					</pre>
    			<p>
    				第二个步骤：传递参数，显示热力图<br />
    				<pre>
    					<code class="language-javascript">
    var points =[
    {"lng":116.418261,"lat":39.921984,"count":50},
    {"lng":116.423332,"lat":39.916532,"count":51},
    {"lng":116.419787,"lat":39.930658,"count":15}];
    heatmapOverlay = new BMapLib.HeatmapOverlay({"radius":20});
	map.addOverlay(heatmapOverlay);
	heatmapOverlay.setDataSet({data:points,max:100});
	heatmapOverlay.show();
    					</code>
    				</pre>  		
	        	</p>
	        	<p>
	        		对，其实用起来就是这么简单，刚开始接到这任务的时候还以为很难得赶脚。另外再说一下描点的demo：
	        		<pre>
	        			<code class="language-javascript">
	var map = new BMap.Map("allmap");
	var point = new BMap.Point(116.400244,39.92556);
	map.centerAndZoom(point, 12);
	var marker = new BMap.Marker(point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	//marker.hide();                     //隐藏点
	//marker.show();                     //显示点
	//map.clearOverlays();				 //清空覆盖物
	        			</code>
	        		</pre>
	        	</p>
	        	<p>
	        		最后说一下地址转换坐标的方法getPoint(),方法介绍:<br />
	        		getPoint(address:String,callback:function,city:String),对指定的地址进行解析，如果地址定位成功，则以地址所在的坐标点Point
	        	  为参数调用回调函数。否则，回调函数的参数为null。city为地址所在的城市名，例如“杭州市”。
	        	</p>
	        		<pre>
	        			<code class="language-javascript">
	var map = new BMap.Map("container");    
	map.centerAndZoom(new BMap.Point(116.404, 39.915), 11);    // 创建地址解析器实例   
	var myGeo = new BMap.Geocoder();     					   // 将地址解析结果显示在地图上，并调整地图视野  
	myGeo.getPoint("北京市海淀区上地10街10号", function(point){    
	if (point) {    
	map.centerAndZoom(point, 16);    
	map.addOverlay(new BMap.Marker(point));    				   //添加标注点
	}    
	}, "北京市"); 
	        			</code>	
	        		</pre>
			</div>
			<div class="program"></div>
			<div class="month-container">
	      		<div class="month-head"><span></span></div>
	      			<ul class="month-body">
		      			<div class="month-cell orange"><span>日</span></div>    
		      			<div class="month-cell blue"><span>一</span></div>
		      			<div class="month-cell blue"><span>二</span></div>
		      			<div class="month-cell blue"><span>三</span></div>
		      			<div class="month-cell blue"><span>四</span></div>     
		      			<div class="month-cell blue"><span>五</span></div>      
		      			<div class="month-cell blue"><span>六</span></div>
	      			</ul>
	      	<div class="clear"></div>
			</div>
			<div class="demo">
				<a href="demo/demo1.html" target="_blank">查看示例</a>
			</div>
			<?php
				require('../config/db_mysql.php');
				global $db;
				$sql = "select * from app_wofw.wofw_reply";
    			$rs = $db -> getAll($sql);
    			?>
			<div  class="replyList">
				<div class="replyTop">评论列表</div>
				<?php 
					foreach ($rs as $key => $value) {
						echo '<div class="replyer">'.$value['name'].'&nbsp;&nbsp;'.$value['date_stamp'].'</div>';
						echo '<div class="replyContent">'.$value['reply_content'].'</div>';
					}
				?>
				
					
				
			</div>
			<div class="reply">
				<form method="POST" action="../admin/reply.php">
					<span>马甲:</span>
					<input type="text" value="游客" class="username" name="username" />
					<textarea name="reply_content"></textarea>
					<input type="submit" class="submit" name="submit" value="提交" />
					<input type="hidden" name="act" value="reply_add" />
				</form>
			</div>
		</div>
		<?php
    print_r($rs);
    ?>
</body>
</html>