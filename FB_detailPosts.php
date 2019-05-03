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
        <h2>Detail Posts Table</h2>
        <div class="post_id"><%= request.getParameter("post_id")%></div>
        <p>The .table-hover class adds a hover effect (grey background color) on table rows:</p>            
        <table class="table table-dark table-hover">
          <thead>
            <tr>
              <th>留言時間</th>
              <!-- <th>留言者</th> -->
              <!-- <th>留言者id</th> -->
              <th>留言內容</th>
            </tr>
          </thead>
          <tbody class="tbody">
                
          </tbody>
        </table>
      </div>
</body>
</html>



<script>
  // .========================sdk初始化============================================
  
$(function() {
  var token = 'EAAEoyVfeYyoBAM3wBKQ5KLr9OQ1Tif2ZAhRhdt4i9SahHYWAhY0tn6DEnE8nGfJQ2elh4cC7uv8m3TvfnFIV7YItZCX09KewDHZCsSWlPcYf0teSFeh1nqHC004JZClbK8kpJoq3eh2VKNTTC4rsp4ZA6psZBZAMzhxBFiTjOvMXs3e2evLizxdc4YDBYrcZBuZB0zT1xt3ZCvWrjd25aZBJ9VzYXRxHder3WXcVKgoa0xj7AZDZD';
  function init() {
    var post_id = $('.post_id').text()   
    console.log(post_id);
    FB.api('/' + post_id + '/comments', {
      access_token : token
    }, function(response) {
        console.log(response);
        response.data.forEach(element => {
            var created_time = element.created_time;
            // var comment_name = element.from.name;
            // var comment_id = element.from.id;
            var message = element.message;
            $('.tbody').append('<tr><td>' + created_time + '</td><td>' + message + '</td></tr>') ;
            // $('.tbody').append('<tr><td>' + created_time + '</td><td>'+ comment_name + '</td><td>'+ comment_id + '</td><td>' + message + '</td></tr>') ;
        });
    });
  }
  
  init();
  
  
})


 </script>

