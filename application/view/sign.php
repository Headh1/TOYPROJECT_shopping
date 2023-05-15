<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3 style="color:red;"><?php echo isset($this->errMsg) ? $this->errMsg : "" ?></h3>
    <form action="/user/sign" method="post">
        <legend> 회원 가입 창</legend>
        <label for="u_id"> ID </label>
        <input type="text" name="u_id" id="u_id" required>
        <br>
        <label for="u_pw"> PW </label>
        <input type="password" name="u_pw" id= "u_pw" required>
        <label for="pw_once"> PW CHECK </label>
        <input type="password" name="pw_once" id= "pw_once" required>
        <br>
        <button type="submit"> 가입 </button>
    </form>
</body>
</html>