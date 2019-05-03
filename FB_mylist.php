<%@ page import = "java.sql.*, java.util.*"%>
<%@ page language="java" contentType="text/html; charset=utf-8" pageEncoding="utf-8"%>
<%@include file="config1.jsp" %>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v3.2&appId=326320204440362&autoLogAppEvents=1"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="./js/FB2.js"></script>
</head>
<body>
    <input type="button"  value="Facebook登出"  scope="public_profile,email" onclick="fbLogout();" onlogin="checkLoginState();" />
    <div class="container">
        <h2>Posts Table</h2>
        <p>The .table-hover class adds a hover effect (grey background color) on table rows:</p>    
          <table class="table table-dark table-hover">
            <thead>
              <tr>
                <th>發文時間</th>
                <th>發文內容</th>
                <th>文章id</th>
                <th>動作</th>
              </tr>
            </thead>
            <tbody class="tbody">
              <!-- 抓api資料 -->
            </tbody>
      </div>
</body>
</html>



<script>
  // .========================sdk初始化============================================
  
$(function() {
  var token = 'EAAEoyVfeYyoBAM3wBKQ5KLr9OQ1Tif2ZAhRhdt4i9SahHYWAhY0tn6DEnE8nGfJQ2elh4cC7uv8m3TvfnFIV7YItZCX09KewDHZCsSWlPcYf0teSFeh1nqHC004JZClbK8kpJoq3eh2VKNTTC4rsp4ZA6psZBZAMzhxBFiTjOvMXs3e2evLizxdc4YDBYrcZBuZB0zT1xt3ZCvWrjd25aZBJ9VzYXRxHder3WXcVKgoa0xj7AZDZD';
  function getMe() {
    FB.api('/me', {
      access_token : token
    }, function(response) {
        init(response.id);
    });
  }
  function init() {
    FB.api('/2130903117234683/posts', {
      access_token : token
    }, function(response) {
      console.log(response);
      response.data.forEach(element => {
        console.log(element);
        var created_time = element.created_time;
        var message = element.message;
        var id = element.id;
        var btnString = '</td><td class="button_td"><input class="btn btn-primary " value="查看" data-id=' + id + ' type="button" /></td></tr>';
        $('.tbody').append('<tr><td>' + created_time + '</td><td>'+ message + '</td><td>' + id + btnString) ;

      });
    });
  }
  
  init();
  
  

  $('body').on('click', '.btn', function() {
    // var bid = this.id; // button ID 
    // var trid = $(this).closest('tr').attr('id'); // table row ID 
    // console.log($(this).val())
    var btn_id = $(this).attr("data-id");
    console.log(btn_id);
    $('.button_td').append('<form id="post_data" action="./FB_detailPosts.jsp" method="post"><input type="hidden" name="post_id" value=' + btn_id + '></form>');
    $('#post_data').submit();
  });
  
})

 </script>

