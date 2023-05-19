<?php
namespace application\controller;

class UserController extends Controller{

    public function loginGet() {
        return "login"._EXTENSION_PHP;
    }

    public function loginPost() {
        $result = $this->model->getUser($_POST);
        $this->model->close(); 

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

    public function delGet() {
        $arrGet = $_SESSION;
        // var_dump($arrGet);
        $this->model->transaction();
        $result = $this->model->upUser($arrGet, false);

        if( !$result ){
            $this->model->rollback();
            // echo " User Sign ERROR!";
            exit();
        }
        $this->model->commit();

        // 로그인 페이지로 이동
        session_unset();
        session_destroy();
        return _BASE_REDIRECT."/user/main";
    }

    // 회원가입 메소드
    public function signGet() {
        return "sign"._EXTENSION_PHP;
    }

    public function signPost() {
        $arrPost = $_POST;
        $arrError=[];

        $ptn = '/[^a-z0-9]/';
        $ptn2 = '/[^a-z0-9!@$&]/';
        

        // id 글자수 체크
        if(mb_strlen($arrPost["u_id"]) === 0 || mb_strlen($arrPost["u_id"]) > 12) {
            $arrError["u_id"] = "1~12글자로 입력해주세요.";
        }

        // id 영문 숫자 체크
        if(preg_match($ptn, $arrPost["u_id"]) > 0 ) {
            $arrError["u_id"] = "소문자와 숫자로만 입력해주세요.";
        }

        //pw 글자수 체크
        if(mb_strlen($arrPost["u_pw"]) < 8 || mb_strlen($arrPost["u_pw"]) > 20) {
            $arrError["u_pw"] = "8~20자 사이로 입력해주세요.";
        }

        // pw 영문숫자특문 체크
        if(preg_match($ptn2, $arrPost["u_pw"]) !== 0 ) {
            $arrError["u_pw"] = "소문자와 숫자 !,@,$,&만 입력해주세요.";
        }
        
        // $chk2 = preg_match('/^[0-9a-zA-Z\!\@\#\$\%\^\&\*]*$/u', $arrPost["u_pw"]);
        // if($chk2 !== 1) {
        //     $arrChkErr["u_pw"] = "영문, 숫자, 특수문자 조합으로 입력해 주세요.";
        // }

        //pw 두번확인
        if($arrPost["u_pw"] !== $arrPost["pw_once"]) {
            $arrError["pw_once"] = "비밀번호가 일치하지않습니다. 다시 입력해주세요.";
        }

        // 이름 확인
        if(mb_strlen($arrPost["u_name"]) === 0 || mb_strlen($arrPost["u_name"]) > 30) {
            $arrError["u_name"] = "이름은 30자 이하로 입력해주세요.";
        }

        // 에러메세지 셋팅
        if(!empty($arrError)) {
        $this->addDynamicProperty("arrError", $arrError );
        return "sign"._EXTENSION_PHP;
        }

        $result = $this->model->getUser($arrPost, false);
        
        if(count($result) !== 0) {
            $errMsg = "이미 존재하는 아이디 입니다.";
            $this->addDynamicProperty("errMsg", $errMsg );
            return "sign"._EXTENSION_PHP;
        }
        $this->model->transaction();

        if( !$this->model->signUser($arrPost)){
            $this->model->rollback();
            echo " User Sign ERROR!";
            exit();
        }
        $this->model->commit();

        // 로그인 페이지로 이동
        return _BASE_REDIRECT."/user/login";

        // if($result>0){
        //     $errMsg = "이미 존재하는 아이디 입니다.";
        //         $this->addDynamicProperty("errMsg", $errMsg );
        //         return "sign"._EXTENSION_PHP;
        //         $this->conn->closeConn();
        // }
        // else if($arr["u_pw"] !== $arr["pw_once"]){
        //     $errMsg = "비밀번호를 다시 입력해주세요";
        //         $this->addDynamicProperty("errMsg", $errMsg );
        //         return "sign"._EXTENSION_PHP;
        // }
        // else{
        //     $d = [
        //         'u_id' => $arr['u_id']
        //         ,'u_pw' => $arr['u_pw']
        //         ,'u_name' => $arr['u_name']
        //     ];
        //     $result = $this->model->signUser($d);
        //     $errMsg = "회원가입 완료 로그인을 해주세요!";
        //     $this->addDynamicProperty("errMsg", $errMsg );
        //     return _BASE_REDIRECT."/user/login";
        // }


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

    public function myinfoGet() {
        $arrID = $_SESSION[_STR_LOGIN_ID];
        $arr = ['u_id' => $arrID];
        $result = $this->model->getUser($arr,false);
        $this->addDynamicProperty("result", $result[0] );
        return "myinfo"._EXTENSION_PHP;
    }

    public function updateGet() {
        $arr = $_SESSION;
        $result = $this->model->getUser($arr,false);
        $this->addDynamicProperty("result", $result[0] );
        return "update"._EXTENSION_PHP;
    }

    public function updatePost() {
        $arrPost = $_POST;
        $arrError=[];

        // 대문자있는지 확인
        $ptn = '/[^a-z0-9]/';
        $ptn2 = '/[^a-z0-9!@$&]/';

        //pw 글자수 체크
        if(mb_strlen($arrPost["u_pw"]) < 8 || mb_strlen($arrPost["u_pw"]) > 20) {
            $arrError["u_pw"] = "8~20자 사이로 입력해주세요.";
        }

        // pw 영문숫자특문 체크
        if(preg_match($ptn2, $arrPost["u_pw"]) !== 0 ) {
            $arrError["u_pw"] = "소문자와 숫자 !,@,$,&만 입력해주세요.";
        }

        //pw 두번확인
        if($arrPost["u_pw"] !== $arrPost["pw_once"]) {
            $arrError["pw_once"] = "비밀번호가 일치하지않습니다. 다시 입력해주세요.";
        }

        // 이름 확인
        if(mb_strlen($arrPost["u_name"]) === 0 || mb_strlen($arrPost["u_name"]) > 30) {
            $arrError["u_name"] = "이름은 30자 이하로 입력해주세요.";
        }

        // 에러메세지 셋팅
        if(!empty($arrError)) {
            $this->addDynamicProperty("arrError", $arrError );
            return "update"._EXTENSION_PHP;
            }

        $this->model->transaction();
        
        $result = $this->model->upUser($arrPost);

        if( !$result ){
            $this->model->rollback();
            echo " User update ERROR!";
            exit();
        }
        $this->model->commit();

        // 로그인 페이지로 이동
        session_unset();
        session_destroy();
        return _BASE_REDIRECT."/user/login";
    }
}
?>