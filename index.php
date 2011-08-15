<html>
<head>
    <title>Easy Popup</title>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="jquery.easypopup.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#pop").easyPopup().easyPopup("show");
        });
    </script>
</head>
<body>
<div id="pop">
<form action="http://www.google.com" target="_blank">
Search: <input type="text" name="q"><br><input type="submit" value="Search">
</form>
</div>
</body>
</html>