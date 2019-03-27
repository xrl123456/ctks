<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
     <h1>您好, {{ $user }} 您的邮箱验证已通过 </h1>
     <h3><a href="http://www.lang.com/admins/seek/email/{{ $id }}/{{ $token }}">请点击跳转修改密码</a></h3>
</body>
</html>