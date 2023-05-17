<?php
namespace application\model;

// class UserModel extends Model{
//     public function getUser($arrUserInfo, $pwFlg = true ) {
//         $sql =" SELECT * from user_info where ";
//         if($pwFlg) {
//             $sql .= "u_id = :u_id and u_pw = :u_pw ";
//         }else {
//             $sql .= " u_id = :u_id ";
//         }
//         // $prepare = [];
//         if($pwFlg) {
//             $prepare = [
//                 ":u_id" => $arrUserInfo["u_id"]
//                 , ":u_pw" => $arrUserInfo["u_pw"]];
//         }else {
//             $prepare = [
//                 ":u_id" => $arrUserInfo["u_id"]
//         ];
//         }

//         try {
//             $stmt = $this->conn->prepare($sql);
//             $stmt->execute($prepare);
//             $result = $stmt->fetchAll();

//         } catch ( Exception $e) {
//             echo "UserModel->getUser Error : ".$e->getMessage();
//             exit();
//         }
//         return $result;
//     }

class UserModel extends Model{
    public function getUser($arrUserInfo, $pwFlg = true ) {
        $sql =" SELECT * from user_info where delflg = '0' and u_id = :u_id ";
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

    public function upUser($arrUserupdate , $pwFlg=true) {
        $sql = " UPDATE user_info SET ";

        if($pwFlg){
            $sql .= " u_name = :u_name , u_pw = :u_pw WHERE u_id = :u_id";
        }else {
            $sql .= " delflg = '1' WHERE u_id = :u_id";
        }
        if($pwFlg) {
            $prepare = [
                ":u_name" => $arrUserupdate["u_name"]
                , ":u_pw" => $arrUserupdate["u_pw"]
                , ":u_id" => $arrUserupdate["u_id"]
            ];
        } else {
            $prepare = [
                ":u_id" => $arrUserupdate["u_id"]
            ];
        }
            
        try {
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute($prepare);
            return $result;
            }
        catch ( Exception $e) {
            return false;
            }
        return $result;

    }
    // }
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