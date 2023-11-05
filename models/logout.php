<?php
    session_start();
    
    session_destroy();

    $poruka="index.php";
    echo json_encode($poruka);
    http_response_code(200);
    
?>