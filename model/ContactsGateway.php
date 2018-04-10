<?php

/**
 * Table data gateway.
 * 
 *  OK I'm using old MySQL driver, so kill me ...
 *  This will do for simple apps but for serious apps you should use PDO.
 */
class ContactsGateway {
    
    public function selectAll($order) {
        if ( !isset($order) ) {
            $order = "name";
        }
        $dbOrder =  mysqli_real_escape_string(mysqli_connect("localhost","root","","mvc-crud"),$order);
        $dbres = mysqli_query(mysqli_connect("localhost","root","","mvc-crud"),"SELECT * FROM contacts ORDER BY $dbOrder ASC");
        //$sql = "SELECT * FROM contacts ORDER BY $dbOrder ASC";
        $contacts = array();
      //  while ( ($obj = mysqli_fetch_object($dbres)) != NULL ) {
        //    $contacts[] = $obj;
        //}
        if ($result=$dbres) {
            while ($obj = mysqli_fetch_object($result)) {
                $contacts[] = $obj;
            }
        }
        
        
        return $contacts;
    }
    
    public function selectById($id) {
        $dbId = mysqli_real_escape_string(mysqli_connect("localhost","root","","mvc-crud"),$id);
        
        $dbres = mysqli_query(mysqli_connect("localhost","root","","mvc-crud"),"SELECT * FROM contacts WHERE id=$dbId");
        
        return mysqli_fetch_object($dbres);
		
    }
    
    public function insert( $name, $phone, $email, $address ) {
        
        $dbName = ($name != NULL)?"'".mysqli_real_escape_string(mysqli_connect("localhost","root","","mvc-crud"),$name)."'":'NULL';
        $dbPhone = ($phone != NULL)?"'".mysqli_real_escape_string(mysqli_connect("localhost","root","","mvc-crud"),$phone)."'":'NULL';
        $dbEmail = ($email != NULL)?"'".mysqli_real_escape_string(mysqli_connect("localhost","root","","mvc-crud"),$email)."'":'NULL';
        $dbAddress = ($address != NULL)?"'".mysqli_real_escape_string(mysqli_connect("localhost","root","","mvc-crud"),$address)."'":'NULL';
        
        mysqli_query(mysqli_connect("localhost","root","","mvc-crud"),"INSERT INTO contacts (name, phone, email, address) VALUES ($dbName, $dbPhone, $dbEmail, $dbAddress)");
        return mysqli_insert_id();
    }
    
    public function delete($id) {
        $dbId = mysqli_real_escape_string(mysqli_connect("localhost","root","","mvc-crud"),$id);
        mysqli_query(mysqli_connect("localhost","root","","mvc-crud"),"DELETE FROM contacts WHERE id=$dbId");
    }
    
    public function update($id,$name,$phone,$email,$address){
        $dbId = mysqli_real_escape_string(mysqli_connect("localhost","root","","mvc-crud"),$id);
        //mysqli_query(mysqli_connect("localhost","root","","mvc-crud"),"UPDATE contacts SET name='nVDS',phone='0770345672',email='nVe@gmail.com',address='matara' WHERE id=$id;");


        mysqli_query(mysqli_connect("localhost","root","","mvc-crud"),"UPDATE contacts SET name='$name',phone='$phone',email='$email',address='$address' WHERE id=$id;");

    }
}

?>
