<html>
<head></head>
<body>
	<!--グローバルナビ-->
	<div>
		<ul>
			<li>Mypage</li>
			<li>お気に入り</li>
			<li>あなたへのおすすめ</li>
		</ul>
	</div>
	<!--グローバルナビ-->

	<!--コンテンツ-->
	<div>
		<div class="content_textarea"></div>
		<div class="content_formarea">
			<form action="/mypage" method="post">
				<table>
					<thead></thead>
					<tbody>
						<tr>
							<th>お名前</th>
							<td><input type="text" name="onamae"></td>
						</tr>
						<tr>
							<th>パスワード</th>
							<td><input type="text" name="password"></td>
						</tr>
						<tr>
							<th>年齢</th>
							<td><input type="text" name="age"></td>
						</tr>
						<tr>
							<th></th>
							<td><input type="submit" value="送信する"></td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</div>
	<!--コンテンツ-->
</body>
</html>