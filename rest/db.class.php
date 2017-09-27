<?php    
    class Connect {
        private $db_host = 'localhost';
        private $db_user = 'root';
        private $db_password = '';
        private $db_db = 'jmir';
    
        function dbconnect(){     
            $conn = mysqli_connect($this->db_host, $this->db_user, $this->db_password, $this->db_db);
            return $conn;
        }
    } 
   
    class Listing {
        private $result;
        
        public function insertlist($sqlArray, $id, $name, $province_id, $telephone, $postal_code, $salary) {
            $sql = "INSERT INTO " . TABLE_NAME . " (" . $sqlArray['rows'] . ") VALUES ('". $id . "', '" . $name ."', '" . $province_id ."', '" . $telephone . "', '" . $postal_code . "', '". $salary . "')";
            $sqlArray['conn']->query($sql);
        }
        
        public function updatelist($sqlArray, $id, $firstname, $lastname, $comment) {
            $sql = "UPDATE `" . DB_NAME . "`.`" . TABLE_NAME . "` set firstname = '" . $firstname ."', lastname = '" . $lastname . "', comment = '" . $comment . "' where id = ". $id;
            $sqlArray['conn']->query($sql);
        }
        
        public function deletelist($id) {
            $sql = "DELETE from " . TABLE_NAME . " where id = " . $id;
        }
        
        public function provinces($sqlArray) {      
            $sql = 'SELECT * FROM provinces' . $sqlArray['where'];
            $result =  $sqlArray['conn']->query($sql);

            $result =  $sqlArray['conn']->query($sql);
            $keyResult = $sqlArray['conn']->query($sql);
                        
            $listInfo = array_keys($keyResult->fetch_assoc());
            
            if($result->num_rows) { 
                $i = 0;
                
                while ($row = $result->fetch_assoc()) {
                   return $row['name'];
                }

                mysqli_close($con); 
            }
            else {
                return false;
                mysqli_close($con); 
            }

        }
        
        public function select($sqlArray) {
            $limit = '';
            if($sqlArray['where']) {
                $sqlArray['where'] = ' WHERE ' . $sqlArray['where'];
            }
            
    
            /** get last row **/           
            $sql = 'select id from users';
            $result =  $sqlArray['conn']->query($sql);
            $lastrow = (ceil($result->num_rows / 10) * 10) - 10;
            
            /** if no result, assign $lastrow to limit **/
            $sql = 'select id from users limit ' . $sqlArray['limit'] . ', 10';
            $result =  $sqlArray['conn']->query($sql);
            if(!$result->num_rows) {
                $sqlArray['limit'] = $lastrow;
            }
            
 
            
           
            $limit = ' limit  ' . $sqlArray['limit'] . ', ' . $sqlArray['numrows'];  
                                              
          
            $sql = 'SELECT ' . $sqlArray['rows'] . ' FROM `' . $sqlArray['table'] . '` ' . $sqlArray['join'] . $sqlArray['where'] . ' ' . $sqlArray['order'] . ' ' . $limit;

            $result =  $sqlArray['conn']->query($sql);
            $keyResult = $sqlArray['conn']->query($sql);
                        
            $listInfo = array_keys($keyResult->fetch_assoc());
            
            if($result->num_rows) { 
                $i = 0;
                
                while ($bus = $result->fetch_assoc()) {
                    for($j = 0; $j < count($listInfo); $j++) {
                        $this->result[$i][$listInfo[$j]] = $bus[$listInfo[$j]];
                    }
                    $i++;
                }
      
                return $this->result;
                mysqli_close($con); 
            }
            else {
                return false;
                mysqli_close($con); 
            }
        }
    }
?>