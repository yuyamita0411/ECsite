<html>
    <head>
        <title></title>
    </head>
    <body>
    	<h1></h1>
    	<!--グローバルナビ-->
    	<div class="gnav">
    		@include('commonparts.globalnav')
    	</div>
    	<!--グローバルナビ-->

        <!--ログイン-->
        <div class="loginarea">
            @yield('form')
            @yield('errormessage')            
        </div>
        <!--ログイン-->

    	<!--コンテンツ-->
    	<div class="contents">
    	</div>
    	<!--コンテンツ-->

    	<!--サイドカラム-->
    	<div class="sidebar">
    		@yield('sidemenue')
    	</div>
    	<!--サイドカラム-->

    	<!--フッター-->
    	<div class="footer">
    		@include('commonparts.footer')
    	</div>
    	<!--フッター-->
    </body>
</html>