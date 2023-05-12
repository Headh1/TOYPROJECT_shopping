<?php
spl_autoload_register( function($path) {
    $path = str_replace("\\","/",$path); // \를 / 로 변환
    // $arr_path = explode("/",$path); // /기준으로 배열로 변환
    
    // 각 디렉토리 분류
    require_once( $path._EXTENSION_PHP);
}
);

?>