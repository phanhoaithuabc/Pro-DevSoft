<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>The Wall Cinema</title>
</head>

<body>
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr height="200" bgcolor="#003300">
			<td colspan="7">
				<table height="200" width="100%" cellspacing="0">

					<tr height="20" bgcolor="#FFFFFF" align="center">
					<td width="850">
						<marquee behavior="scroll"  width="750px;" align="absmiddle">
						<span style="color: #3300CC; ">Chào mừng bạn đến với web xem phim The Wall Cinema</span>
						</marquee>
					</td>
					<td>
    					<div align="right">
							<?php
							error_reporting(E_ERROR | E_PARSE);
							session_start();
							if(isset($_SESSION['username']))
							{
							echo "Chào &nbsp;".$_SESSION["username"]; echo "&nbsp;&nbsp;";
							echo "<a href=\"logout.php\">Thoát</a>";
							}
							else
							{
							echo "<a href=\"index.php?id=dangnhap\">Đăng nhập</a>";echo "&nbsp;&nbsp;";
							echo "<a href=\"index.php?id=dangky\">Đăng ký</a>";
							}
							?>
						</div>
					</td>
					</tr>
					<tr>
						<td colspan="7">
							<img src="banner/banner%201.jpg" height="296" width="100%"  alt=""/>
						</td>
					</tr>
				</table>
			</td>
		</tr>

		<tr height="34" bgcolor="#009900">
			<td colspan="5">
				<table width="100%" height="34" cellpadding="0" cellspacing="0">
					<tr align="left" >
						<td valign="center" align="left" width="10%">
							<a href="index.php"><img src="images/trang chu.jpg" height="34" width="60"/> </a>
						</td>
						<td valign="center" align="left" width="10%">
							<a href="index.php?id=quocgia"><img src="images/quoc gia.jpg" height="34" width="90" /></a>
						</td>
						<td valign="center" align="left" width="10%">
							<a href="index.php?id=phimbo"><img src="images/phim bo.jpg" height="34" width="90" /></a>
						</td>
						<td valign="center" align="left" width="10%">
							<a href="index.php?id=phimle"><img src="images/phim le.jpg" height="34" width="90"/></a>
						</td>
						<td valign="center" align="left" width="10%">
							<a href="index.php?id=xemnhieu"><img src="images/xem nhieu.jpg" height="34" width="90" /></a>
						</td>
						<td valign="center" align="left" width="10%">
							<a href="index.php?id=lienhe"><img src="images/lienhe.jpg" height="34" width="90" /></a>
						</td>
						<td valign="center" align="center" width="40%" height="34">
						    <input type="text" value="Tìm kiếm" name="timkiem" />
						    <input type="submit" value="Tìm" name="tim" />
						    </form>	
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>
