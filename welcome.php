<html>
<head>
	<title>Welcome to Music Concert!</title>
	<link rel="stylesheet" type"text/css" href="style.css" />
	<script type="text/javascript">
		function del_cookie() {
			document.cookie="username" + "=" + "";
			location.href = "index.php";
		}
	</script>
	
</head>
<body>
<div class="page">
	<?php
		$file = fopen("member.txt", "a");
		fwrite($file, $_GET["xuehao"]);
		fwrite($file, "@fudan.edu.cn;\n");
		fclose($file);
	?>
	<section class="title_background">
		<span class="title_content">Welcome
			<?php 
				echo $_GET["xuehao"];
			?>
			:) 
		</span>
	</section>
	<section class="content">
		<button type="button" onclick="del_cookie()">Log out</button>
		<hr />
		qu mu biao.
	</section>
</div>
</body>

</html>