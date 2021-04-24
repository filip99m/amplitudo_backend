<?php 

    function uploadPhoto( $file ){
        $original_name = $_FILES[$file]['name'];
        $tmp_name = $_FILES[$file]['tmp_name'];
        // originalna ekstenzija
        $temp_arr = explode(".", $original_name );
        $ext = $temp_arr[ count($temp_arr)-1 ];
        
        $new_file_name = "./uploads/".uniqid().".".$ext;
        copy($tmp_name, $new_file_name);

        return $new_file_name;
    }

    function checkAuth(){
        if( !(isset($_SESSION['user']) && count($_SESSION['user']) == 2) ){
            header("location: login.html");
            exit();
        }
    }

?>