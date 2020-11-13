<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    </head>
    <body>
        <h1>テストページ</h1>

        <div>
            <form>
                @csrf
            <select id="depart" name='depart' class='form-control flex-items' onChange="pickEmployees();">
                <option value=''>部署を選んでください</option>
                <option value='事業推進部'>事業推進部</option>
                <option value='システム開発部'>システム開発部</option>
                <option value='営業部'>不動産投資営業部</option>
             </select>
            <select id="conceal" name="name" class='form-control mr-2 flex-items'>
               <option value="">名前を選んでください</option>
                   @foreach($employees as $employee)
                       <option value="{{ $employee->name }}">{{ $employee->name }}</option>
                   @endforeach
            </select>
            <input type="submit" value='探す' class='btn btn-success flex-items'>
            </form>
        </div>

        <script type="text/javascript">
         function pickEmployees()
           {
               let obj = document.getElementById('depart');
               let index = obj.selectedIndex;//選択した選択肢のindex番号取得
               let value = depart.options[index].value;//選択したoptionのvalueの値を取得
               $.ajax({
                   headers:{
                       'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                   },//headersを書き忘れるとエラーになる
                   type:"GET",//リクエストタイプ(postでも可)
                   url:"test/ajax",　//指定したコントローラーに付随するurl
                   data:{"value":value},//laravelに渡すデータ
                   dataType:"json" //データの取得タイプ
               }).done(function(data){
                   //非同期通信に成功したときに行いたい処理
                   //元からあるselectのoptionを削除
                   let select = document.getElementById('conceal');
                   let options = select.options;data
                   for(let i = options.length -1; 0 <= i; --i ){
                       select.remove(i);
                   }
                   //laravel内で処理された結果がdataに入って返ってくる
                   for(let i in data){
                       $("#conceal").append("<option value=" + data[i] + ">" + data[i] + "</option>");
                   }
               }).fail(function(){
                    //失敗した時の処理
                   alert('非同期に失敗しました');
               });
           }
        </script>

    </body>
</html>