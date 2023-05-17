<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/application/view/css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>LOGIN</title>
</head>
<body>
    <?php 
    require_once("application/view/header.php");
    ?>
    <div class="allMain">
            <h1 class="titleName"> LOGIN </h1>
            <h3 style="color:red;"><?php echo isset($this->errMsg) ? $this->errMsg : "" ?></h3>
            <form action="/user/login" method="post">
                <div>
                    <label for="u_id"></label>
                    <input type="text" name="u_id" id="u_id" placeholder="ID">
                </div>
                <div>
                    <label for="u_pw"></label>
                    <input type="text" name="u_pw" id="u_pw" placeholder="Password">
                </div>
                <button type="submit" class="btnLogin">Login</button>
            </form>
            <form action="/user/sign" method="get">
                <button type="submit" class="btnSign">회원가입</button>
            </form>

    </div>
    <script src="/application/view/js/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>