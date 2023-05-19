<?php
namespace application\controller;

class ApiController extends Controller{
    public function userGet() {
        $arrGet = $_GET;
        $arrData = ["flg" => "0"];

        $this->model = $this->getModel("User");

        $result = $this->model->getUser($arrGet,false);

        // 유저유무체크
        if(count($result) !== 0) {
            $arrData["flg"] = "1";
            $arrData["msg"] = "이미 존재하는 아이디입니다.";
        }else{
            $arrData["msg"] = "사용 가능한 아이디입니다.";
        }
        
        if(mb_strlen($arrGet["u_id"]) === 0 || mb_strlen($arrGet["u_id"]) > 12) {
            $arrData["flg"] = "1";
            $arrData["msg"] = "아이디는 1~12글자로 입력해주세요.";
        }

        // 배열을 json으로 변경
        $json = json_encode($arrData);
        header('Content-type: application/json');
        echo $json;
        exit();
    } 
}

?>