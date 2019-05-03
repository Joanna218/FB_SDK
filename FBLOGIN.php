
<!-- <script async defer src="https://connect.facebook.net/en_US/sdk.js"></script> -->
<!-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v3.2"></script> -->
<script src="./js/FB.js"></script>
<!-- <input type="button"  value="Facebook登入" scope="public_profile,email" onclick="FB.login();" onlogin="statusChangeCallback();" /> -->
<input type="button"  value="登入"  scope="public_profile,email" onclick="fbLogin();" onlogin="checkLoginState();" />
<!-- <fb:login-button scope="public_profile,email" onlogin="checkLoginState();"> -->
</fb:login-button>
<div id="status"></div>
<div id="fb-root"></div>

