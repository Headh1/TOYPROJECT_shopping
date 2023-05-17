<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYINFO</title>
</head>
<body>
    <?php 
    require_once("application/view/header.php");
    ?>
    <h2> 내 정보 </h2>
    <div>
        <div><span>이름</span> <?php echo $this->result[0]["u_name"] ?> </div>
        <div><span>아이디</span> <?php echo $this->result[0]["u_id"] ?> </div>
    </div>
    
    <form action="/user/update" method="get">
        <button type="submit" id="btnupdate"> 수정 </button>
    </form>

    <form action="/user/del" method="get">
        
        <button type="submit"> 탈퇴 </button>
    </form>

    <script src="/application/view/js/muinfo.js"></script>
</body>
</html>