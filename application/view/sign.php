<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/application/view/css/sign.css">
    
    <title>SIGN</title>
</head>
<body>
    <?php 
    require_once("application/view/header.php");
    ?>
    <div class="allMain">
        <div class = "mainForm">
            <h1> 회원 가입 </h1>
            <br>
            <h3>
                <?php if(isset($this->errMsg)) { ?>
                <span> <?php echo $this->errMsg ?></span> 
                <?php } ?> 
            </h3>

        <form action="/user/sign" method="post">
            <label for="u_name"></label>
            <input type="text" name="u_name" id="u_name" placeholder="Name">
            <span>
                <?php 
                    if(isset($this->arrError["u_name"])) { 
                        echo $this->arrError["u_name"];
                    }?>
            </span>
            <br>
            <br>
            <label for="u_id"></label>
            <input type="text" name="u_id" id="u_id" placeholder="ID">
            <button type="button" onclick="chkDuplicationId()"> 중복확인 </button>
            <span id="errMsgId" >
                <?php 
                if(isset($this->arrError["u_id"])) {
                echo $this->arrError["u_id"];
                } ?> 
            </span>
            <br>
            <br>
            <label for="u_pw"></label>
            <input type="password" name="u_pw" id= "u_pw" placeholder="Password">
            <span>
                <?php if(isset($this->arrError["u_pw"])) {
                    echo $this->arrError["u_pw"]; 
                }?>
            </span>
            <br>
            <label for="pw_once"></label>
            <input type="password" name="pw_once" id= "pw_once" placeholder="Password check">
            <span>
                <?php if(isset($this->arrError["pw_once"])) {
                    echo $this->arrError["pw_once"];  
                }?> 
            </span>
            <br>
            <br>
            <button type="submit" class="btnSign"> 가입하기 </button>
        </form>
            </div>
            </div>

    <script src="/application/view/js/sign.js"> </script>
</body>
</html>