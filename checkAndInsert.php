<?php
$connect = mysql_connect('localhost','root','root');

if (!$connect) {
die('Could not connect to MySQL: ' . mysql_error());
}    


//database name
$cid =mysql_select_db('db_attendance',$connect);


// path where your CSV file is located
define('CSV_PATH','/var/www/Monday/');


// Name of your CSV file
$csv_file = CSV_PATH . "timings.csv";

#$flag=0; //0 for IN and 1 for OUT .Default 0.

if (($getfile = fopen($csv_file, "r")) !== FALSE) {
         #$data = fgetcsv($getfile, 1024, ",");
	#echo "$data\n";
    while (($data = fgetcsv($getfile, 1024, ",")) !== FALSE) {
        $num = count($data);
echo "num is ".$num;
        for ($c=2; $c < $num; $c++) {
                $result = $data;
            $str = implode(",", $result);
            $slice = explode(",", $str);
        
            $col1 = $slice[0];
            $col2 = $slice[1];
            $col3 = $slice[2];

#echo "$col1";
#echo "$col2";
#echo "$col3";

//Query for counting no of records
$result = mysql_query("select count(*) FROM tb_timings WHERE name = '".$col1."' AND curDate = '".$col2."'");

if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}

$row = mysql_fetch_array($result);

$total = $row[0];
echo "Total rows: ".$total;

if(($total % 2)==0)
{

	//even
         $flag = 0;
         echo "IN";
}
else
{
	//odd
        $flag = 1;
        echo "OUT";
}

//
  
// SQL Query to insert data into DataBase
$query = "INSERT INTO tb_timings(id,name,curDate,curTime,status) VALUES('"."','".$col1."','".$col2."','".$col3."','$flag')";
$s=mysql_query($query, $connect );
            
        }
    }
}

echo "Data successfully imported to database !!";
mysql_close($connect);

?>
