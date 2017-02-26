<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wx478a4ee1cf43c4d8", "22e4a856c8fad8f456362bd2e814dd86");
$assessToken = $jssdk->getAccessToken();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>微信JS-SDK Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <link rel="stylesheet" href="style.css">
</head>
<script src="zepto.min.js"></script>
<script src="jquery-3.1.1.min.js"></script>
<script>
document.querySelector('#get_materialcount').onclick = function () {
    $.ajax({
        type: "get",
        url:  "wxAPI.php";,
        data: { action: "get_materialcount" }
        }).done(function( msg ) {
        alert( "Result:" + msg );
    }); 
  };
</script>
<body>
    <button class="btn btn_primary" id="get_materialcount">get_materialcount</button>
    <div class="container">
            <form action="#" method="post">
                <input type="text" name="Priority" placeholder="Priority"></input><br/>
                <input type="text" name="Subject" placeholder="Subject"></input><br/>
                <input type="text" name="Desc" placeholder="Desc"></input><br/>
                <input type="text" name="Status" placeholder="Status"></input><br/>
                <input type="submit" name="submit" value="Submit"></input>
            </form>
    	</div>
    </div> <!-- /container -->
  </body>
</html>