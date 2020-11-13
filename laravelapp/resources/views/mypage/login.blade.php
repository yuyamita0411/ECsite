<html>
<head></head>
<body>
	<!--グローバルナビ-->
	@include('commonparts.globalnav')
	<!--グローバルナビ-->

	<!--コンテンツ-->
	<div>
		<div class="content_textarea">
			<p></p>
		</div>
		<div class="content_formarea">
			<form action="/login" method="post">
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
							<th></th>
							<td><input type="submit" value="ログイン"></td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</div>
	<!--コンテンツ-->

	<!--フッター-->
	@include('commonparts.footer')
	<!--フッター-->
</body>
</html>