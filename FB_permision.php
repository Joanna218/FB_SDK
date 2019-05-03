<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <script src="./js/FB2.js"></script>
</head>
<body>
    <input type="button"  value="登出"  scope="public_profile,email" onclick="fbLogout();" onlogin="checkLoginState();" />
    <div id="status">
        <input class="myList" type="button"  value="我的文章列表" />
    </div>
</body>
</html>



<script>

  $(function() {
    $('.myList').click(function() {
      window.location.replace('./FB_mylist.jsp');
    });
  });
 </script>

