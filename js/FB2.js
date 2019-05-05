
window.fbAsyncInit = function() {
  FB.init({
    appId      : '326320204440362',
    xfbml      : true,
    version    : 'v3.2'
  });
  // FB.AppEvents.logPageView();
  checkLoginState();
};
  // This is called with the results from from FB.getLoginStatus().
function statusChangeCallback(response) {
  console.log('statusChangeCallback');
  console.log(response);
  // The response object is returned with a status field that lets the
  // app know the current login status of the person.
  // Full docs on the response object can be found in the documentation
  // for FB.getLoginStatus().
  if (response.status === 'connected') {
    // Logged into your app and Facebook.
    console.log('connected');
  } else if (response.status === 'not_authorized') {
    // The person is logged into Facebook, but not your app.
    console.log('not_authorized');
    window.location.replace('./index.php');
    // document.getElementById('status').innerHTML = 'Please log ' +
    //   'into this app.';
  } else {
    // The person is not logged into Facebook, so we're not sure if
    // they are logged into this app or not.
    console.log('else status');
    window.location.replace('./index.php');
    // document.getElementById('status').innerHTML = 'Please log ' +
    //   'into Facebook.';
  }
}

// This function is called when someone finishes with the Login
// Button.  See the onlogin handler attached to it in the sample
// code below.
function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
}

function fbLogout() {
  FB.logout(function() {
    console.log('您已登出!');
    window.location.replace('./index.php');
  });
}

// Load the SDK asynchronously
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

