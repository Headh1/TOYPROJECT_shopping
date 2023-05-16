<?php
namespace application\model;

class UserModel extends Model{
    public function getUser($arrUserInfo, $pwFlg = true ) {
        $sql =" SELECT * from user_info where u_id = :u_id ";
        if($pwFlg) {
            $sql .= " and u_pw = :u_pw ";
        }
        
        $prepare = [
            ":u_id" => $arrUserInfo["u_id"]
        ];
        if($pwFlg) {
            $prepare[":u_pw"] = $arrUserInfo["u_pw"];
        } 

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();

        } catch ( Exception $e) {
            echo "UserModel->getUser Error : ".$e->getMessage();
            exit();
        }
        return $result;
    }

    public function signUser($arrUsersign) {
        $sql =
            " INSERT INTO  user_info ( "
            ." u_id "
            ." , u_pw "
            ." , u_name ) "
            ." VALUES "
            ." ( "
            ." :u_id "
            ." , :u_pw "
            ." , :u_name ) ";

        $prepare = [ 
            ":u_id" => $arrUsersign["u_id"] 
            , ":u_pw" => $arrUsersign["u_pw"] 
            , ":u_name" => $arrUsersign["u_name"] 
    ];
    
        try {
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute($prepare);
            return $result;
        }
        catch ( Exception $e) {
            return false;
        }
    }

    // public function getUserid($arrUserInfo){
    //     $sql =" SELECT u_id from user_info where u_id = :u_id ";
    //     $prepare = [
    //         ":u_id" => $arrUserInfo["u_id"]
    //     ];
    //     try {
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute($prepare);
    //         $result = $stmt->rowcount();
    //         // $result = $stmt->fetchAll();

    //     } catch ( Exception $e) {
    //         echo "UserModel->getUser Error : ".$e->getMessage();
    //         exit();
    //     }
    //     return $result;
    // }

    // public function signUser($arrUsersign) {
    //     $sql =
    //         " INSERT INTO  user_info "
    //         ." ( "
    //         ." u_id "
    //         ." , u_pw "
    //         ." , u_name ) "
    //         ." VALUES "
    //         ." ( "
    //         ." :u_id "
    //         ." ,  :u_pw "
    //         ." , :u_name) ";

    //     $prepare = [ ":u_id" => $arrUsersign["u_id"] 
    //     , ":u_pw" => $arrUsersign["u_pw"] 
    //     , ":u_name" => $arrUsersign["u_name"] 
    // ];
    
    //     try {
    //         $this->conn->beginTransaction();
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute($prepare);
    //         $result = $stmt->rowcount();
    //         $this->conn->commit();
    //     }
    //     catch ( Exception $e) {
    //         $this->connrollback();
    //         return $e->getmessage();
    //     }
    //     return $result;
    // }
    
}
?>