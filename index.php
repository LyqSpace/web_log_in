<html>
<head>
	<title>Welcome to Music Concert!</title>
	<link rel="stylesheet" type"text/css" href="style.css" />
	
	<script type = "text/javascript">

		function get_cookie(c_name) {
			var c_start, c_end;
			if (document.cookie.length > 0) {
				c_start = document.cookie.indexOf(c_name+"=");
				if (c_start != -1) {
					c_start = c_start + c_name.length + 1;
					c_end = document.cookie.indexOf(";", c_start);
					if (c_end == -1) c_end=document.cookie.length;
					return unescape(document.cookie.substring(c_start, c_end));
				}
			}
			return "";
		}
		function check_cookie() {
			var username = get_cookie('username');
			if (username != null && username != "") {
				location.href = 'welcome.php?xuehao=' + username + '@&submit=Submit';
			}
		}
		function set_cookie(username) {
			var date = new Date();
			date.setDate(date.getDate()+1);
			document.cookie = "username" + "=" + escape(username) + ";";
			document.cookie = "expires=" + date.toGMTString();
		}
	
		function validate_required(field, alerttxt) {
			with (field) {
  				if (value == null || value == "") {
  					document.getElementById("alert").innerHTML = alerttxt;
  					return false;
  				}else {
  					return true;
  				}
  			}
		}
		function validate_number(field, alerttxt) {
			with (field) {
				for (var i = 0; i < value.length; i++) {
					if (!(value[i] >= "0" && value[i] <= "9")) {
						document.getElementById("alert").innerHTML = alerttxt;
						return false;
					}
				}
				
				set_cookie(value.substring(0, value.length));
				return true;
			}
		}
		function validate_form(thisform) {
			with (thisform) {
				if (validate_required(xuehao, "Xuehao is required.") == false) {
					xuehao.focus();
					return false;
				}
				if (validate_number(xuehao, "Invalid xuehao format.") == false) {
					xuehao.focus();
					return false;
				}
  				return true;
			}
		}
	</script>
</head>

<body onLoad="check_cookie()">

<div class="page">
	<section class="title_background">
		<span class="title_content">Enter your Xuehao for log in.</span>
	</section>
	<section class="content">
		<form method="get" action="welcome.php" onsubmit="return validate_form(this);">
			Xuehao: <input type="text" name="xuehao" maxLength="15" />
			<span class="error">* <span id="alert"></span></span>
			<input type="submit" name = "submit" value="Submit" />
		</form>
	</section>
</div>

<br/>

</body>

</html>
