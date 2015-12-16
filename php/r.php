<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	case "client":
		selectClient($_GET);
		break;
	case "colis":
		selectColis($_GET);
		break;	
	default:
		;
	break;
}

function selectClient($data){
	global $conn;
	
	$sql = "SELECT * FROM client where id_client =".$data["id_client"];
	echo $sql."<br>";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "id_client: " . $row["id_client"]. " adresse_client: " . $row["adresse_client"]." tel_clinet: " . $row["tel_clinet"]."<br>";
		}
		echo "afficher client";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}

function selectcolis($data){
	global $conn;
	
	$sql = "SELECT * FROM colis where ( id_=".$data["id_colis"].")";
	if ($conn->query($sql) === TRUE) {
	    echo "afficher colis";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}
}
$conn->close();
?>