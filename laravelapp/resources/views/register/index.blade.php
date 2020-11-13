<html>
<head></head>
<body>
	<!--グローバルナビ-->
	@include('commonparts.globalnav')
	<!--グローバルナビ-->

	<!--コンテンツ-->
	<div>
		<div class="content_textarea">
			@if(!empty($_POST))
			<p>{{$returnmsg}}</p>
			@endif			
		</div>
		<div class="content_formarea">
			<span>会員登録がまだの方はこちら↓</span><br>
			<span style="font-weight: bold; font-size: 20px;">登録する</span>
			<form action="/register" method="post">
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
							<th>メールアドレス</th>
							<td><input type="text" name="mailaddress"></td>
							@error('mailaddress')
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
							<td><input type="submit" value="登録する"></td>
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