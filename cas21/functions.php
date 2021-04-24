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

?>