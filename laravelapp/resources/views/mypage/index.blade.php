@extends('mypage')

@section('form')
<div class="form_message_area">

	@foreach($msg as $msgs)
	<p>{{$msgs}}</p>
	@endforeach
	
	@section('errormessage')
	<p>
		@foreach($errors->all() as $error)
		<span>{{$error}}</span>
		@endforeach
	</p>
	@endsection

	<p class="successarea"></p>
</div>
<form method="post" action="/mypage">
	@csrf
	<table>
		<tr>
			<th>名前</th>
			<td><input type="text" name="name" value="{{old('name')}}"></td>
		</tr>
		<tr>
			<th>メールアドレス</th>
			<td><input type="text" name="mail" value="{{old('mail')}}"></td>
		</tr>
		<tr>
			<th>年齢</th>
			<td><input type="text" name="age" value="{{old('age')}}"></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" value="送信する"></td>
		</tr>
	</table>
</form>
@endsection