<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> 회원 가입 </h1>
    <br>
    <h3>
        <?php if(isset($this->errMsg)) { ?>
            <span> <?php echo $this->errMsg ?></span> 
        <?php } ?> 
    </h3>

    <form action="/user/sign" method="post">
        <label for="u_name"> NAME </label>
        <input type="text" name="u_name" id="u_name">
        <span>
            <?php 
                if(isset($this->arrError["u_name"])) { 
                    echo $this->arrError["u_name"];
                }?>
        </span>
        <br>
        <br>
        <label for="u_id">  ID </label>
        <input type="text" name="u_id" id="u_id">
        <button type="button" onclick="chkDuplicationId()"> 중복확인 </button>
        <span id="errMsgId" >
            <?php 
            if(isset($this->arrError["u_id"])) {
            echo $this->arrError["u_id"];
            } ?> 
        </span>
        <br>
        <br>
        <label for="u_pw"> PW </label>
        <input type="password" name="u_pw" id= "u_pw">
        <span>
            <?php if(isset($this->arrError["u_pw"])) {
                echo $this->arrError["u_pw"]; 
            }?>
        </span>
        <label for="pw_once"> PW CHECK </label>
        <input type="password" name="pw_once" id= "pw_once">
        <span>
            <?php if(isset($this->arrError["pw_once"])) {
                echo $this->arrError["pw_once"];  
            }?> 
        </span>
        <br>
        <br>
        <button type="submit"> 가입하기 </button>
    </form>
    <script src="/application/view/js/sign.js"> </script>
</body>
</html>