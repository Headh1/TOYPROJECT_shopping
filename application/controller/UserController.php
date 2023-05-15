<?php
namespace application\controller;

class UserController extends Controller{

    public function loginGet() {
        return "login"._EXTENSION_PHP;
    }

    public function loginPost() {
        $result = $this->model->getUser($_POST);
        if(count($result) === 0) {
            
            $errMsg = "회원가입을 해주세요.";
            
            $this->addDynamicProperty("errMsg", $errMsg );
            return "login"._EXTENSION_PHP;
        }
        $_SESSION[_STR_LOGIN_ID] = $_POST["u_id"];
        return _BASE_REDIRECT."/recipe/main";
    }

    // 로그아웃 메소드
    public function logoutGet() {
        session_unset();
        session_destroy();
        return "main"._EXTENSION_PHP;
    }

    // 회원가입 메소드
    public function signGet() {
        return "sign"._EXTENSION_PHP;
    }

    public function signPost() {
        $arr = $_POST;
        $result = $this->model->getUserid($arr);

        if($result>0){
            $errMsg = "이미 존재하는 아이디 입니다.";
                $this->addDynamicProperty("errMsg", $errMsg );
                return "sign"._EXTENSION_PHP;
                $this->conn->closeConn();
        }
        // else if($arr["u_pw"] !== $arr["pw_once"]){
        //     $errMsg = "비밀번호를 다시 입력해주세요";
        //         $this->addDynamicProperty("errMsg", $errMsg );
        //         return "sign"._EXTENSION_PHP;
        // }
        else{
            $d = [
                'u_id' => $arr['u_id']
                ,'u_pw' => $arr['u_pw']
            ];
            $result = $this->model->signUser($d);
            $errMsg = "회원가입 완료 로그인을 해주세요!";
            $this->addDynamicProperty("errMsg", $errMsg );
            return _BASE_REDIRECT."/user/login";
        }


        // var_dump($result);
        // foreach ($result as $key=>$value) {
        //     if($_POST["id"] === $result["id"]){
        //         $errMsg = "돌아가";
        //         $this->addDynamicProperty("errMsg", $errMsg );
        //         return "sign"._EXTENSION_PHP;
        //     }
            
        // }

        // if($_POST["pw"] !== $_POST["pw_once"]){
        //     $errMsg ="비밀번호가 맞지 않습니다.";
        //     $this->addDynamicProperty("errMsg", $errMsg );
        //     return "sign"._EXTENSION_PHP;
        // }

        // return _BASE_REDIRECT."/user/login";
    }

}
?>