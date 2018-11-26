<?php

if(!isset($_POST['data']))
{
    print json_encode(array("Result" => "no data"));
    exit();
}

$array = json_decode($_POST['data']);

if($array != null) 
{
    if (isset($array["username"]) && isset($array["password"])) 
    {
        $username = $_POST['email'];
        $password = $_POST['password'];
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
                print json_encode(array("Result" => "An error has occurred with connection"));
                exit;
            }

            $query = "SELECT role.rolename, user.realname" .
                " FROM  user2role, user , role" .
                " WHERE username = '" . $safeuser . "'".
                " AND userpass = '" . $safepass . "'".
                " AND user.id = user2role.userid" .
                " AND role.id = user2role.roleid";

            $result = $db->dbCall($query);
            $hash = password_hash($safepass,PASSWORD_DEFAULT);
            
            if($result != null && password_verify($result[0]['userpass'],$hash))
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