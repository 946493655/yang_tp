<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>后台</title>
    <meta charset="utf-8">
    <!--<link rel="icon" type="image/png" href="/Public/assets/images/icon.png">-->
    <link href="/Public/assets/css/admin_cus.css" rel="stylesheet" type="text/css">
    <script src="/Public/assets/js/jquery.min.js"></script>
</head>
<body>
<div style="height:150px;"></div>
<div class="login">
    <p style="text-align:center;"><b>YANGYANG后台</b></p>
    <form action="<?php echo PREFIXADMIN; ?>/login/dologin" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>用户名：</td>
                <td><input type="text" name="uname" placeholder="2-20个字符"></td>
            </tr>
            <tr>
                <td>密 &nbsp; 码：</td>
                <td><input type="password" name="pwd" placeholder="建议字母数字组合，5-20位"></td>
            </tr>
        </table>
        <p class="star"></p>
        <table>
            <tr><td colspan="2" style="text-align:center;"><input type="submit" id="submit" value="登 录"></td></tr>
        </table>
    </form>
</div>
</body>
</html>