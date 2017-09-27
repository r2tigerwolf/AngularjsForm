<?php 
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    define("DB_NAME", "jmir");
    define("TABLE_NAME", "users");
    
    include("db.class.php");
    
    $conn = new Connect();
    $listingConn = $conn->dbconnect();
    
    $list = new Listing; 
    
    $part = explode ("/", $_SERVER['REQUEST_URI']);
    $where = "";
    $id = end($part);   
    
	if ($id) {
        $where = " where id = " . $id;
    }
    
    $method = strtolower($_SERVER['REQUEST_METHOD']);
    $json = file_get_contents('php://input');
    $obj = json_decode($json, true);
    
    $start = $_GET['start'];
            
    switch( $method ) {
        case "get":
            $where = '';
            $order = 'ORDER BY users.id ASC';
            $sqlArray = array('conn' => $listingConn, 'rows' => 'users.id, users.name, users.province_id, users.telephone, users.postal_code, users.salary, provinces.name as province_name, (SELECT COUNT(users.id) FROM users limit 1) as total_row', 'table' => TABLE_NAME, 'join' => ' left join provinces on users.province_id = provinces.id', 'where' => $where, 'order' => $order, 'limit' => $start, 'numrows' => 10);
            $result = $list->select($sqlArray);             
                                                                                                
            $outp = '';
                                    
            foreach($result as $key => $val) {
                if ($outp != '') {$outp .= ',';}
                $outp .= '{"id":"' . $val['id'] . '",';
                $outp .= '"name":"' . $val['name'] . '",';
                $outp .= '"telephone":"' . $val['telephone'] . '",';
                $outp .= '"province_name":"' . $val['province_name'] . '",';
                $outp .= '"postal_code":"' . $val['postal_code'] . '",';
                $outp .= '"salary":"' . $val['salary'] . '",';
                $outp .= '"total_row":"' . $val['total_row'] . '"}';   
            }
            
            $outp ='{"records":['.$outp.']}';
            
            echo($outp);
            break;
    
        case "put":
            $sql = "UPDATE `" . DB_NAME . "`.`" . TABLE_NAME . "` set name = '" . $obj['name'] ."', province_id = '" . $obj['province_id'] . "', telephone = '" . $obj['telephone'] . "', postal_code = '" . $obj['postal_code'] . "', salary = '" . $obj['salary'] . "'  where id = ". $obj['id'];
            $sqlArray = array('conn' => $listingConn, 'rows' => 'id, name, province_id, telephone, postal_code, salary', 'table' => TABLE_NAME);
            $result = $list->updatelist($sqlArray, $obj['id'], $obj['name'], $obj['province_id'], $obj['telephone'], $obj['postal_code'], $obj['salary']); 
            break;       
    
        case "post":
            $name = $obj['name'];        
            $province_id = $obj['province_id'];
            $telephone = $obj['telephone'];
            $postal_code = $obj['postal_code'];
            $salaryOrig = $obj['salary'];                        
            $salary = str_replace(',', '', $obj['salary']);                
            $sqlArray = array('conn' => $listingConn, 'rows' => 'id, name, province_id, telephone, postal_code, salary', 'table' => TABLE_NAME);
            $result = $list->insertlist($sqlArray, $obj['id'], $name, $province_id, $telephone, $postal_code, $salary);
            
            $sqlArray = array('conn' => $listingConn, 'rows' => 'id, name', 'table' => 'provinces', 'join' => '', 'where' => ' where id = ' . $province_id, 'order' => '', 'limit' => '');
            $result = $list->provinces($sqlArray);
            
           
            
            $outp = '';
            if ($outp != '') {$outp .= ',';}
            $outp .= '{"name":"' . $name . '",';
            $outp .= '"province_id":"' . $province_id . '",';
            $outp .= '"province_name":"' . $result . '",';
            $outp .= '"telephone":"' . $telephone . '",';
            $outp .= '"postal_code":"' .$postal_code . '",';
            $outp .= '"salary":"' . $salaryOrig . '"}';
            
            echo($outp);
            break;
    
        case "delete":
            $sql = "DELETE FROM `" . DB_NAME . "`.`" . TABLE_NAME . "` where id = " . $obj['id'];
            $listingConn->query($sql);
            break;
    }

    function message($message) {
        if ($message === TRUE) {
    	   echo '{"message": "Successful!"}';
        } else {
            echo "{'message':'" . addslashes($conn->error) . "'}";
        }
    }
?>