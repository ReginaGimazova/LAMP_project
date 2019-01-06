<?php
/**
 * Created by PhpStorm.
 * User: regagim
 * Date: 05.01.19
 * Time: 18:13
 */

require '/home/regagim/sites/LAMP_project/vendor/froala/wysiwyg-editor-php-sdk/lib/FroalaEditor.php';

try{
    $response = FroalaEditor_Image::upload('/home/regagim/sites/LAMP_project/public/img/upload/');
    echo stripcslashes(json_encode($response));
}

catch (Exception $e){
    http_response_code(404);
}