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
		<div class="content_textarea">
			<p>{{$returnmsg}}</p>
		</div>
		<div class="content_formarea">
			<form action="/mypage" method="post">
				@csrf
				<table>
					<thead></thead>
					<tbody>
						<tr>
							<th>ユーザー名</th>
							<td><input type="text" name="username"></td>
							@error('username')
							<td>{{$message}}</td>
							@enderror
						</tr>
						<tr>
							<th>パスワード</th>
							<td><input type="text" name="password"></td>
							@error('password')
							<td>{{$message}}</td>
							@enderror
						</tr>
						<tr>
							<th>年齢</th>
							<td><input type="text" name="age"></td>
							@error('age')
							<td>{{$message}}</td>
							@enderror
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