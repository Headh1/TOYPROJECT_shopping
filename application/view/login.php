<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/application/view/css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="allMain">
        <div class = "mainForm">
            <h1> Login </h1>
            <h3 style="color:red;"><?php echo isset($this->errMsg) ? $this->errMsg : "" ?></h3>
            <form action="/user/login" method="post">
                <label for="u_id"></label>
                <input type="text" name="u_id" id="u_id" placeholder="ID">
                <br>
                <label for="u_pw"></label>
                <input type="text" name="u_pw" id="u_pw" placeholder="Password">
                <br>
                <button type="submit" class="btnLogin">Login</button>
            </form>
        </div>
            <form action="/user/sign" method="get">
                <button type="submit" class="btnSign">회원가입</button>
            </form>
    </div>
    <script src="/application/view/js/login.js"></script>
</body>
</html>