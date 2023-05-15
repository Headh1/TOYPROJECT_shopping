<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1> Login </h1>
    <h3 style="color:red;"><?php echo isset($this->errMsg) ? $this->errMsg : "" ?></h3>
    <form action="/user/login" method="post">
        <label for="u_id"> ID </label>
        <input type="text" name="u_id" id="u_id">
        <label for="u_pw"> PASSWORD </label>
        <input type="text" name="u_pw" id="u_pw">
        <button type="submit">Login</button>
    </form>
    <form action="/user/sign" method="get">
        <button type="submit">회원가입</button>
    </form>
</body>
</html>