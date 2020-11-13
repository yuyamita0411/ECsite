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
	@include('commonparts.globalnav')
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
		<div class="content_textarea">
		</div>
		<div class="content_formarea">
			<div>
				<p>スケジュール管理</p>
			</div>
			<form action="/mypage" method="post">
				@csrf
				<div style="display: flex;">
				@for($dates=$startdate; $dates<=date("Y-m-d",strtotime($startdate . '+ 6day')); $dates++)
					<div style="display:inline-block; float:left; width:calc(100% / 7);">
						<div style="display:inline-block;">{{$dates}}</div>
						<table>
						@foreach($schedulearr as $sval)
						<tr><td>
							<span style="font-size:12px;">{{$sval}}</span>
							</td></tr>
						@endforeach
		                <tr><td><a href="/myschedule?scheduletime={{$dates}}">□</a></td></tr>
		                </table>
	                </div>
				@endfor
			</div>

			<div>
				<ul>
					<li style="list-style: none; display: inline-block;"><a href="?date={{$prev1}}"><</a></li>
					<li style="list-style: none; display: inline-block;"><a href="?date={{$next1}}">></a></li>
				</ul>
				<ul>
					<li style="list-style: none; display: inline-block;"><a href="?date={{$prev2}}"><<</a></li>
					<li style="list-style: none; display: inline-block;"><a href="?date={{$next2}}">>></a></li>
				</ul>
			</div>
			</form>
		</div>
	</div>
	<!--コンテンツ-->

	<!--フッター-->
	@include('commonparts.footer')
	<!--フッター-->
</body>
</html>