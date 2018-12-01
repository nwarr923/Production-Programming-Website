<?php
require_once("DB.class.php");
if(!isset($_POST['data']))
{
    print json_encode(array("Result" => "no data"));
    exit();
}

$array = json_decode($_POST['data'], true);

if($array != null) 
{
    if (isset($array["username"]) && isset($array["password"])) 
    {
        $username = $array["username"];
        $password = $array["password"];
        $username = filter_var($username, FILTER_SANITIZE_EMAIL);
        $password = filter_var($password, FILTER_SANITIZE_STRING);
        $username = filter_var($username, FILTER_VALIDATE_EMAIL);

        if ($username == FALSE || $password == FALSE) 
        {
            print json_encode(array("Result" => null));
        }
        else 
        {
            $safeuser = $array["username"];
            $safepass = $array["password"];

            $db = new DB();
            if (!$db->getConnStatus()) 
            {
                print json_encode(array("Result" => null));
                exit;
            }

            $query = "SELECT role.rolename, user.realname, user.userpass" .
                " FROM  user2role, user , role" .
                " WHERE username = '" . $safeuser . "'".                
                " AND user.id = user2role.userid" .
                " AND role.id = user2role.roleid";

            $result = $db->dbCall($query);

            //print var_dump($result);            
           
            if($result != null && password_verify($safepass, $result[0]['userpass']))
            {      
                print json_encode(array("Result" => $result));
            }
            else
            {
                print json_encode(array("Result" => null));
            }
        }
    }
    else
    {
        print json_encode(array("Result" => null));
    }
}
else 
{
    print json_encode(array("Result" => null));
}
?>