<?php
	session_start();
	require_once ("scripts/connect.php"); 
	require_once ("scripts/view.php"); 
?>
<!DOCTYPE HTML>
<html lang="ru">
<head>
	<title>���������� ������</title>
	<meta name="keywords" content = "������ ����, �������� ����, ������� ����">
	<meta http-equiv="Content-Type" type="text/html;charset UTF-8">
	<link href="css/index.css" rel="stylesheet" type="text/css">
	<link href="css/checkout.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="/img/icon.png" />
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/checkout.js"></script>
	<script src="js/jquery.maskedinput.js" type="text/javascript"></script>
	<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
	<script src="//yastatic.net/share2/share.js"></script>
</head>
<body>
<div id="question">
		<img src="../img/x.png">
		<form id="question_box" action="scripts/send_question.php" style="margin:0 auto" method="POST">
			<p>Email:</p>
			<input type="email" name="email" required>
			<p>��� ������:</p>
			<textarea rows="10" cols="52" name="question" required></textarea>
			<p><input type="button" id="send_question" value = "��������� ������"></p>
		</form>
</div>
<div id="login">
		<img src="../img/x.png">
		<form id="login_box" action="scripts/authorize.php?href=checkout.php" style="margin:0 auto" method="POST">
			<h2>���� �� ����</h2>
			<p>Email:</p>
			<input type="email" name="email" required>
			<p>������:</p>
			<input type="password" name="password" required>
			<div id="regRef"><a href="registration.php">�����������</a></div>
			<p><input type="submit" value="����� �� ����"></p>
		</form>
</div>
<div id="overlay">
</div>
<?php
	if(isset($_GET['error_message']))
	echo '<div class="error">'.$_GET['error_message'].'</div>';
	if(isset($_GET['success_message']))
	echo '<div class="success">'.$_GET['success_message'].'</div>';
?>
<header>
	<div id="header_box">
		<a href="index.php"><img src="../img/logo.png"></a>
		<?php show_cart(); ?>
		<span id="mail">shop@youthwatch.ru</span>
	</div>
</header>
<nav id = "menu">
	<ul>
		<li><img src="../img/watch.png"><a href ="catalog.php">������� �������</a></li>
		<li><img src="../img/Truck.png"><a href = "delivery.php">�������� � ������</a></li>
		<li><img src="../img/otzivi.png"><a href = "reviews.php">������</a></li>
		<li><img src="../img/support.png"><a href = "question.php">������ ������</a></li>
	</ul>
</nav>
<div id="container">
	<div id="line">
	</div>
	<div id="content">
		<div id ="title">���������� ������</div>
		<form id="checkout_form" action="scripts/checkout.php" style="margin:0 auto" method="POST">
		<div class="field" style="width:100%;text-align:right;">
			<label for="delivery">������ ��������: </label>
			<select size="1"  name="delivery">
			<option selected value="1">�������� (�� ������)</option>
			<option value="2">������ ������</option>
		   </select><br>
		   <label for="pay">������ ������:</label>
			<select size="1"  name="pay">
			<option selected value="1">��������� �������</option>
			<option value="2">���������� ���������</option>
		   </select>
		 </div>
		    <label >����� ��������:</label><br>
			<div id="address">
				<div class="adr_block">
					<label for="city">�����:<sup>*</sup></label>
					<input name="city" type="text" value="������" readonly></input>
				</div>
				<div class="adr_block">
					<label for="street">�����:<sup>*</sup></label>
					<input name="street" type="text"></input>
				</div>
				<div class="adr_block">
					<label for="house">���, ������:<sup>*</sup></label>
					<input name="house" type="text"></input>
				</div>
				<div class="adr_block">
					<label for="apartment">��������:<sup>*</sup></label>
					<input name="apartment" type="text"></input>
				</div>
				<div class="adr_block">
					<label for="access">�������:<sup>*</sup></label>
					<input name="access" type="text"></input>
				</div>
				<div class="adr_block">
					<label for="floor">����:</label>
					<input name="floor" type="text"></input>
				</div>
				<div class="adr_block" style="display:none;">
					<label for="index">������:<sup>*</sup></label>
					<input name="index" type="text"></input>
				</div>
				<div id="index">
					����� ������ ������ �������������� <a href="https://www.pochta.ru/offices">������� ���������</a> ����� ������
				</div>
			</div>
			<div id="name">
					<div style="margin-bottom:15px;">���������� � ����������:</div>
					<div class="adr_block" >
						<label for="name">���:<sup>*</sup></label>
						<input name="name" type="text"></input>
					</div>
					<div class="adr_block">
						<label for="surname">�������:<sup>*</sup></label>
						<input name="surname" type="text"></input>
					</div>
					<div class="adr_block">
						<label for="patronymic">��������:</label>
						<input name="patronymic" type="text"></input>
					</div>
				</div>
		   <label for="tel">���������� �������:</label>
		   <input name="tel" type="tel" id="phone"></input><br>
		   <label for="enail" style="margin-left:50px;margin-right:75px;">Email:<sup>*</sup></label>
		   <input name="email" type="enail"></input><br>
		   <label for="comment">�����������:</label><br>
		   <textarea rows="5" cols="52" name="comment"></textarea><br>
		 <!-- <iframe frameborder="0" allowtransparency="true" scrolling="no" src="pay.php" width="450" height="198"></iframe>-->
		   <p><input type="submit" value="�������� �����" id="checkout"></p>
		</form>
	</div>
</div>
<footer>
	<img src="../img/logo_footer.png">
	<div id="footer_box">
		<div id="footer_block">
			<nav id="footer_menu">
				<ul>
					<li><a href ="catalog.php">������� �������</a></li>
					<li><a href = "delivery.php">�������� � ������</a></li>
					<li><a href = "reviews.php">������</a></li>
					<li><a href = "question.php">������ ������</a></li>
				</ul>
			</nav>
			<div id="footer_mail">
				�� �������� ���������� �� email: <span style="text-decoration:underline;">shop@youthwatch.ru</span>
			</div>
		</div>
		<div id="share">
			<div class="ya-share2" style="float:right;margin-right:10px;" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,gplus" data-counter=""></div>
		</div>
	</div>
</footer>
</body>
</html>