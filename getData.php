<?php
$host = "db.cbn7hdryrize.us-west-2.rds.amazonaws.com"; //database host server
$db = "bb"; //database name
$user = "wuichen01"; //database user
$pass = "wuichen01"; //password

$connection = mysql_connect($host, $user, $pass);

//Check to see if we can connect to the server
if(!$connection)
{
    die("Database server connection failed.");  
}
else
{
    //Attempt to select the database
    $dbconnect = mysql_select_db("bb", $connection);

    //Check to see if we could select the database
    if(!$dbconnect)
    {
        die("Unable to connect to the specified database!");
    }
    else
    {
        $query = "SELECT * FROM pictures";
        $resultset = mysql_query($query, $connection);

        $records = array();

        //Loop through all our records and add them to our array
        while($r = mysql_fetch_assoc($resultset))
        {
            $records[] = $r;        
        }

        //Output the data as JSON

        echo json_encode($records);
    }
}


?>