<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="/application/view/css/main.css">
<link rel="stylesheet" href="/application/view/css/common.css">
    <title> YUMMY </title>
</head>
<body>
    <header>
    <!-- 첫번째 네비게이션 바 -->
    <div class="container" id="mainMid">
        <div class="d-flex justify-content-end py-3" id ="div2">
            <ul class="nav nav-pills" id="nav_log">
                <?php if( isset($_SESSION[_STR_LOGIN_ID] )){  ?>
                    <li class="nav-item">
                        <a href="/user/logout" class="nav-link" id = "alogout" onclick="alert('로그아웃 됩니다.')" >로그아웃</a></li>
                        <li class="nav-item">
                            <a href="/user/myinfo" class="nav-link" >내정보</a>
                        </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a href="/user/login" class="nav-link" >로그인</a></li>
                            <li class="nav-item">
                                <a href="/user/sign" class="nav-link" >회원가입</a>
                            </li>
                    <?php }?>
            </ul>
        </div>
    </div>
        <!-- 메인 중간 네비게이션 바  -->
        <div class="container" >
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-2 mb-4 border-bottom">
                <a href="/user/main" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                    <img src="/application/view/img/logo.png" alt="yummy">
                </a>

                <ul class="nav col-12 col-md-auto mb-2 justify-content-md-between mb-md-0 py-10">
                    <li class="nav-item dropdown"><p href="#" class="nav-link px-5 link-secondary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">카테고리</p>
                      <ul class="dropdown-menu px-5 link-secondary">
                        <li><a class="dropdown-item" href="#">한식</a></li>
                        <li><a class="dropdown-item" href="#">양식</a></li>
                        <li><a class="dropdown-item" href="#">중식</a></li>
                        <li><a class="dropdown-item" href="#">일식</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">웰빙</a></li>
                        <li><a class="dropdown-item" href="#">비건</a></li>
                      </ul></li>
                    <li><a href="#" class="nav-link px-4 link-dark">베스트</a></li>
                    <!-- <li><a href="#" class="nav-link px-4 link-dark">레시피</a></li> -->
                    <li><a href="#" class="nav-link px-4 link-dark">커뮤니티</a></li>
                    <li><a href="#" class="nav-link px-4 link-dark">구매하기</a></li>
                </ul>

                <div class="col-md-3 text-end">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25"height="25" fill="currentColor" class="bi bi-search me-2" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                    <?php if( isset($_SESSION[_STR_LOGIN_ID] )){ ?>
                      <?php } ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-heart me-2" viewBox="0 0 16 16">
                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-basket3" viewBox="0 0 16 16">
                    <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM3.394 15l-1.48-6h-.97l1.525 6.426a.75.75 0 0 0 .729.574h9.606a.75.75 0 0 0 .73-.574L15.056 9h-.972l-1.479 6h-9.21z"/>
                    </svg>
            </div>
        </div>
    </div>
        

    </header>
<!-- 이미지 슬라이드 -->
        <div id="carouselExampleIndicators" class="carousel slide w-90 carouselWidth" data-bs-ride="true">
            <div class="mainSlide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/application/view/img/food.jpg" class="d-block w-100" alt="food">
                </div>
                <div class="carousel-item">
                    <img src="/application/view/img/meal.jpg" class="d-block w-100" alt="meal">
                </div>
                <div class="carousel-item">
                    <img src="/application/view/img/pasta.jpg" class="d-block w-100" alt="pasta">
                </div>
                <div class="carousel-item">
                    <img src="/application/view/img/platter.jpg" class="d-block w-100" alt="platter">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
        </div>
        <h5> 인기 레시피 </h5>
        <div class="popCard">
          <div class="container text-center">
            <div class="row justify-content-between">
              <div class="card col me-3 w-75" style="width: 10rem;" id="cardimg">
                <img src="/application/view/img/비빔밥.jpg" class="card-img-top mt-1" alt="비빔밥">
                <div class="card-body">
                  <p class="card-text"> 비빔밥 </p>
                </div>
              </div>
              <div class="card col" style="width: 10rem;" id="cardimg">
                <img src="/application/view/img/닭볶음탕.jpg" class="card-img-top mt-1" alt="닭볶음탕">
                <div class="card-body">
                  <p class="card-text"> 닭볶음탕 </p>
                </div>
              </div>
              <div class="card col ms-3" style="width: 10rem;" id="cardimg">
                <img src="/application/view/img/밀푀유나베.jpg" class="card-img-top mt-1" alt="밀푀유나베">
                <div class="card-body">
                  <p class="card-text"> 밀푀유나베 </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <h5> 추천 레시피 </h5>
        <div class="popCard">
        <div class="container text-center">
          <div class="row">
            <div class="card col me-3 w-75" style="width: 10rem;" id="cardimg">
              <img src="/application/view/img/키토.jpg" class="card-img-top mt-1" alt="키토김밥">
              <div class="card-body">
                <p class="card-text"> 키토김밥 </p>
              </div>
            </div>
            <div class="card col" style="width: 10rem;" id="cardimg">
              <img src="/application/view/img/월남쌈.jpg" class="card-img-top mt-1" alt="월남쌈">
              <div class="card-body">
                <p class="card-text">월남쌈</p>
              </div>
            </div>
            <div class="card col ms-3" style="width: 10rem;" id="cardimg">
              <img src="/application/view/img/샐러드파스타.jpg" class="card-img-top mt-1" alt="샐러드파스타">
              <div class="card-body">
                <p class="card-text">샐러드 파스타</p>
              </div>
            </div>
          </div>
        </div>
        </div>
        <h5> 오늘의 레시피 </h5>
        <div class="popCard">
        <div class="container text-center mb-2">
          <div class="row">
            <div class="card col me-3 w-75" style="width: 10rem;" id="cardimg">
              <img src="/application/view/img/연어덮밥.jpg" class="card-img-top mt-1" alt="연어덮밥">
              <div class="card-body">
                <p class="card-text"> 연어덮밥 </p>
              </div>
            </div>
            <div class="card col" style="width: 10rem;" id="cardimg">
              <img src="/application/view/img/김치찌개.jpg" class="card-img-top mt-1" alt="김치찌개">
              <div class="card-body">
                <p class="card-text"> 김치찌개 </p>
              </div>
            </div>
            <div class="card col ms-3" style="width: 10rem;" id="cardimg">
              <img src="/application/view/img/떡볶이.jpg" class="card-img-top mt-1" alt="떡볶이">
              <div class="card-body">
                <p class="card-text"> 떡볶이 </p>
              </div>
            </div>
          </div>
        </div>
                        </div>
        <?php 
          require_once("application/view/footer.php");
        ?>

        <script src="/application/view/js/common.js"> </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


    </body>
</html>