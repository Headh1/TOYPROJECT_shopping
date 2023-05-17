<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/application/view/css/update.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <title>UPDATE</title>
</head>
<body>
    <?php 
    require_once("application/view/header.php");
    ?>
    <div class="allMain">
        <div class = "mainForm">
    <h1> 내 정보 수정</h1>
    <form action="" method="post">
        <label for="u_name"> NAME </label>
        <input type="text" name="u_name" id= "u_name" value ="<?php echo $this->result[0]["u_name"] ?>">
        <span>
                <?php 
                    if(isset($this->arrError["u_name"])) { 
                        echo $this->arrError["u_name"];
                    }?>
            </span>
        <br>
        <label for="u_id"> ID </label>
        <input type="text" name="u_id" id= "u_id" value ="<?php echo $this->result[0]["u_id"] ?>" readonly>
        <span id="errMsgId" >
        <br>
        <label for="u_pw"> NEW PW </label>
        <input type="password" name="u_pw" id= "u_pw" value ="<?php echo $this->result[0]["u_pw"] ?>">
        <span>
                <?php if(isset($this->arrError["u_pw"])) {
                    echo $this->arrError["u_pw"]; 
                }?>
            </span>
        <br>
        <label for="pw_once"> PW CHECK </label>
        <input type="password" name="pw_once" id= "pw_once">
        <span>
                <?php if(isset($this->arrError["pw_once"])) {
                    echo $this->arrError["pw_once"];  
                }?> 
            </span>
        <br>
        <button type="submit" class="btnUp"> 수정 </button>
    </form>
            </div>
            </div>
</body>
</html>