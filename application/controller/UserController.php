<?php
namespace application\controller;

class UserController extends Controller{

    public function loginGet() {
        return "login"._EXTENSION_PHP;
    }

    public function loginPost() {
        $result = $this->model->getUser($_POST);
        if(count($result) === 0) {
            $errMsg = "입력하신 회원 정보가 없습니다.";
            $this->addDynamicProperty("errMsg", $errMsg );
            return "login"._EXTENSION_PHP;
        }
        $_SESSION["u_id"] = $_POST["id"];
        return _BASE_REDIRECT."/product/list";
    }

    // 로그아웃 메소드
    public function logoutGet() {
        session_unset();
        session_destroy();

        return "login"._EXTENSION_PHP;
    }
}
?>