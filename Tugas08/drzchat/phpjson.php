<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$servername;dbname=simple_chat", $username, $password);
$json = '{"messages": {';
$query = $conn->query( "select * from message");
$json .= '"pesan": [ ';
while($x = $query->fetch()){
	$json .= '{';
	$json .= '"id": "' . $x['message_id'] . '",
	"user": "' . htmlspecialchars($x['username']) . '",
	"text": "' . htmlspecialchars($x['message']) . '",
	"time": "' . $x['post_time'] . '"
},';
}
//hilangkan koma (,) di akhir
$json = substr($json,0,strlen($json)-1);
//lengkapi penutup format json
$json .= ']';
$json .= '}}';

echo $json;
?>