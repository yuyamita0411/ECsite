<html>
<head></head>
<body>
	<!--グローバルナビ-->
	@include('commonparts.globalnav')
	<!--グローバルナビ-->

	<!--コンテンツ-->
	<div>
		<?php
		class strmethod{
			public function strreplace($replacepattern, $replaceto, $targetstr){
				$newphrase = str_replace($replacepattern, $replaceto, $targetstr);
				return $newphrase;
			}
			public function strreplace_def($targetstr){
				return str_replace(array(" ", $_GET['scheduletime']), array("", ""), $targetstr);
			}			
		}
		$strmethod = new strmethod;
		?>
		<?php
		?>
        <script type="text/javascript">
            function returnuniquename(){
                const uniquename = [];
                document.querySelectorAll('input[data="for_rebase"]').
                forEach((elem, i) => {
                    uniquename.push(elem.getAttribute('name'));
                });
                return uniquename;
            }
            var uniquearraylist = returnuniquename();
        </script>
        <?php		
		?>
		<div class="content_textarea">
		</div>
		<div class="content_formarea">
			<div>
				<p>スケジュール管理</p>
			</div>
			<div>
				<h2>スケジュール一覧</h2>
				<div>
					<table>
						<thead>
						</thead>
						<tbody>
							<tr>
								<th>時間帯</th>
								<th>種別</th>
								<th>メモ</th>
							</tr>
						@foreach($senddata['scheduledata'] as $eachsenddata)
							@if(!empty($eachsenddata))
							<tr>
								<td>
									<?php
									$scheduletime = $strmethod->strreplace_def($eachsenddata->schedulestarttime.'~'.$eachsenddata->scheduleendtime);
									?>
									{{$scheduletime}}										
								</td>
								<td>{{$eachsenddata->schedulecat}}</td>
								<td>{{$eachsenddata->schedulememo}}</td>
								<td>
									<a href="#rebase_{{$scheduletime}}_{{$eachsenddata->schedulecat}}_{{$eachsenddata->schedulememo}}" class="rebase_schedule">修正する</a>
									<a href="#delete_{{$scheduletime}}_{{$eachsenddata->schedulecat}}_{{$eachsenddata->schedulememo}}" class="delete_schedule">削除する</a>
								</td>
							</tr>
							@endif
						@endforeach
						</tbody>
					</table>
				</div>

				<form method="post">
					@csrf
					<div class="modalarea">
						<h2>修正モーダル</h2>
					@foreach($senddata['scheduledata'] as $eachsenddata)
						@if(!empty($eachsenddata))
							<?php
							$scheduletime = $strmethod->strreplace_def($eachsenddata->schedulestarttime.'~'.$eachsenddata->scheduleendtime);

							$startvalsformodal = $strmethod->strreplace_def($eachsenddata->schedulestarttime);
							$startvalarr = explode(':', $startvalsformodal);

							$endvalsformodal = $strmethod->strreplace_def($eachsenddata->scheduleendtime);
							$endvalarr = explode(':', $endvalsformodal);
							?>
							<div id="rebase_{{$scheduletime}}_{{$eachsenddata->schedulecat}}_{{$eachsenddata->schedulememo}}" style="display: flex;">
								<select name="rebase_time1_1">
									<option value="{{$startvalarr[0]}}">{{$startvalarr[0]}}</option>
									@foreach($senddata['timeparam1'] as $eachtime1 => $eachtimeval1)
									<option value="{{$eachtime1}}">{{$eachtimeval1}}</option>
									@endforeach
								</select>
								:
								<select name="rebase_time1_2">
									<option value="{{$startvalarr[1]}}">{{$startvalarr[1]}}</option>
									@foreach($senddata['timeparam2'] as $eachtime2 => $eachtimeval2)
									<option value="{{$eachtime2}}">{{$eachtimeval2}}</option>
									@endforeach
								</select>
								~
								<select name="rebase_time2_1">
									<option value="{{$endvalarr[0]}}">{{$endvalarr[0]}}</option>
									@foreach($senddata['timeparam1'] as $eachtime1 => $eachtimeval1)
									<option value="{{$eachtime1}}">{{$eachtimeval1}}</option>
									@endforeach
								</select>
								:
								<select name="rebase_time2_2">
									<option value="{{$endvalarr[1]}}">{{$endvalarr[1]}}</option>
									@foreach($senddata['timeparam2'] as $eachtime2 => $eachtimeval2)
									<option value="{{$eachtime2}}">{{$eachtimeval2}}</option>
									@endforeach
								</select>
								<textarea name="rebase_memo" value="{{$eachsenddata->schedulememo}}">{{$eachsenddata->schedulememo}}</textarea>
								<input type="hidden" name="{{$eachsenddata->uniqueid}}" data="for_rebase" value="">
							</div>
						@endif
					@endforeach
						<input type="submit" value="修正する">

						<h2>削除モーダル</h2>
					</div>
					<div>
						<h2>スケジュールを追加する</h2>
						<div>
							<table>
								<tr>
									<td style="display: flex;">
										<select name="schedulecats">
											@foreach($senddata['schedulecats'] as $schedulecat)
											<option value="{{$schedulecat}}">{{$schedulecat}}</option>
											@endforeach
										</select>
										<select name="scheduletime1_1">
											@foreach($senddata['timeparam1'] as $eachtime1 => $eachtimeval1)
											<option value="{{$eachtime1}}">{{$eachtimeval1}}</option>
											@endforeach
										</select>
										<span>:</span>
										<select name="scheduletime1_2">
											@foreach($senddata['timeparam2'] as $eachtime2 => $eachtimeval2)
											<option value="{{$eachtime2}}">{{$eachtimeval2}}</option>
											@endforeach
										</select>
										<span>~</span>
										<select name="scheduletime2_1">
											@foreach($senddata['timeparam1'] as $eachtime1 => $eachtimeval1)
											<option value="{{$eachtime1}}">{{$eachtimeval1}}</option>
											@endforeach
										</select>
										<span>:</span>
										<select name="scheduletime2_2">
											@foreach($senddata['timeparam2'] as $eachtime2 => $eachtimeval2)
											<option value="{{$eachtime2}}">{{$eachtimeval2}}</option>
											@endforeach
										</select>
									</td>
								</tr>
								<tr>
									<td>
										<textarea name="schedulememo"></textarea>
									</td>
								</tr>
								<tr>
									<td>
										<input type="hidden" name="uniqueid" value="<?php echo $strmethod->strreplace(array(' ', ':', '-'), array('', '', ''), date("Y-m-d H:i:s").uniqid()); ?>">
										<input type="submit">
									</td>
								</tr>
							</table>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--コンテンツ-->

	<!--フッター-->
	@include('commonparts.footer')
	<!--フッター-->
</body>
</html>