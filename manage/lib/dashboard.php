<?php
	// We need to use sessions, so you should always start sessions using the below code.
	session_start();

	// If the user is not logged in redirect to the login page...
	if (!isset($_SESSION['loggedin'])) {
		header('Location: ../login.html');
		exit;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>單字管理</title>
	<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"> -->
	<style type="text/css">
		@import"../../css/dashboard.css";
	</style>
</head>
<body class="loggedin">
	<nav class="navtop">
			<div>
				<a href="./logout.php"><i class="fas fa-sign-out-alt"></i>登出</a>
			</div>
	</nav>

	<div class="voc_list">單字清單</div>
	<p>Welcome back, <?=$_SESSION['name']?>!</p>
	
	<form action="./search_voc.php" method="POST" onsubmit="get_voc(event)">
		<input type="text" name="keyword_search" id="keyword_search" placeholder="請輸入 英文單字/中文翻譯">
		<input type="submit" value="單字查詢" class="submit">
	</form>
	
	<button type="button" class="tb_btn" id="tb_btn_new" onclick='location.href = "../new_voc.html";' >新增單字</button>

	<table class="voc_edit_table">
		<thead>
			<tr class="voc_edit_th">
				<th>英文單字</th>
				<th>中文翻譯</th>
				<th>單字詞性</th>
				<th>編輯</th>
			</tr>
		</thead>
		<tbody>
			<tr class="voc_edit_tb">
				<td>
					<span id="tb_eng">[英文單字]</span>
				</td>
				<td>
					<span id="tb_chi">[中文翻譯]</span>
				</td>
				<td>
					<span id="tb_part_of_speech">[單字詞性]</span>
				</td>
				<td>
					<button type="button" class="tb_btn" id="tb_btn_edit">修改</button>
					<button type="button" class="tb_btn" id="tb_btn_del">刪除</button>
				</td>
			</tr>
		</tbody>
	</table>
	<script src="../../js/search_voc.js"></script>
</body>
</html>