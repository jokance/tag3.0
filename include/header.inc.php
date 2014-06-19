	<div id="header">
		<div class="search">
			<form action="results.php" method="post" name="search">
				<input type="hidden" class="move" value="0"/>
				<input type="text" class="search_box" name="search_text" placeholder="输入检索词..." />
				<input type="submit" class="submit" onclick="return isempty();" value="search"/>
			</form>
		</div>
		<div class="tag"><h2>热门标签：</h2>
			<ul>
				<li><a href="###">兴奋</a></li>
				<li><a href="###">享受</a></li>
				<li><a href="###">美丽</a></li>
				<li><a href="###">爱心</a></li>
			</ul>
		</div>
		<div class="upload">
			<a href="index.php">回主页</a>
			<a href="upload.php" target="_blank">上传图片</a>
		</div>
	</div>
	<script type="text/javascript">
		$('.search_box').focus(function(){
			$('.move').val('1');
		});
		$('.search_box').blur(function(){
	
			$('.move').val('0');
		});
	
		$(window).scroll(function(){
			if($('.move').val()=='1'){
				$(window).scrollTop(0);
				
			}else if($('.move').val()=='0'){
				
			}
		});
	</script>