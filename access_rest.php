<?php
    $urlParts = explode('/',$_SERVER['REQUEST_URI']);
    $paramParts = explode('?',end($urlParts));
    
    $method = $paramParts[0];
    
    $data = json_decode(file_get_contents("php://input"));    
    $data_string = json_encode($data);
    
    if(isset($_GET["start"])) {
        $start = $_GET["start"];    
    } else {
        $start = 0;
    }
     
    $ch = curl_init('http://' . $_SERVER['SERVER_NAME'] . '/jmir/rest/rest.php?start=' . $start);
    
    switch( $method ) {  // Method sending data
        case "get":
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            break;
        case "put":
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            break;
        case "post":
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            break;
        case "delete":
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
            break;
    }
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string); // Data to send
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return result
    curl_setopt($ch, CURLOPT_HTTPHEADER, array( // header what type to return
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
    );
    $result = curl_exec($ch); // execute
    echo $result;    
?>