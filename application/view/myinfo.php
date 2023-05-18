<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/application/view/css/common.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>MYINFO</title>
</head>
<body>
    <?php 
    require_once("application/view/header.php");
    ?>
    <div class="allMain">
    <h1> 내 정보 </h1>
    <div>
        <div><span>이름</span> <?php echo $this->result["u_name"] ?> </div>
        <div><span>아이디</span> <?php echo $this->result["u_id"] ?> </div>
    </div>
    
    <form action="/user/update" method="get">
        <button type="submit" id="btnupdate"> 수정 </button>
    </form>

    <form action="/user/del" method="get">
        
        <button type="submit" class="btnDel"> 탈퇴 </button>
    </form>
</div>
<?php 
          require_once("application/view/footer.php");
        ?>
    <script src="/application/view/js/common.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>