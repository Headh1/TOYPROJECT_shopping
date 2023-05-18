<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/application/view/css/common.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="/application/view/css/sign.css"> -->
    
    <title>SIGN</title>
</head>
<body>
    <?php 
    require_once("application/view/header.php");
    ?>
    <div class="allMain">
            <h1> 회원 가입 </h1>
            <br>
            <h3>
                <?php if(isset($this->errMsg)) { ?>
                <span> <?php echo $this->errMsg ?></span> 
                <?php } ?> 
            </h3>

        <form action="/user/sign" method="post">
            <input type="text" name="u_name" id="u_name" placeholder="Name" value="<?php echo !empty($_POST) ? $_POST["u_name"] : "" ?>">
            <br>
            <span>
                <?php 
                    if(isset($this->arrError["u_name"])) { 
                        echo $this->arrError["u_name"];
                    }?>
            </span>
            <br>
            <br>
            <input type="text" name="u_id" id="u_id" placeholder="ID" value="<?php echo !empty($_POST) ? $_POST["u_id"] : "" ?>">
            <button type="button" onclick="chkDuplicationId()" class="btnChk"> 중복확인 </button>
            <br>
            <span id="errMsgId" >
                <?php 
                if(isset($this->arrError["u_id"])) {
                echo $this->arrError["u_id"];
                } ?> 
            </span>
            <br>
            <br>
            <input type="password" name="u_pw" id= "u_pw" placeholder="Password" value="<?php echo !empty($_POST) ? $_POST["u_pw"] : "" ?>">
            <br>
            <span>
                <?php if(isset($this->arrError["u_pw"])) {
                    echo $this->arrError["u_pw"]; 
                }?>
            </span>
            <br>
            <input type="password" name="pw_once" id= "pw_once" placeholder="Password check" value="<?php echo !empty($_POST) ? $_POST["pw_once"] : "" ?>">
            <br>
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
            <?php 
            require_once("application/view/footer.php");
        ?>
    <script src="/application/view/js/common.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>