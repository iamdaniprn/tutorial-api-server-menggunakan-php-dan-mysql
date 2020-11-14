<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	// Get data

$request_method=$_SERVER["REQUEST_METHOD"];

if($request_method == 'GET'){
	// Tampilkan Data Berrdasarkan id
	if(!empty($_GET["id"])) {
		$id = intval($_GET["id"]);
		get_pasien($id);
	}
	else {
		// Tampilkan Semua Data
		pasien();
	}
}else if($request_method == 'POST'){
	// Tambah Data
	add_pasien();

}else if($request_method == 'PUT'){
	// Update Data
	$id=intval($_GET["id"]);
	update_pasien($id);

}else if($request_method == 'DELETE'){
	// Hapus Data
	$id=intval($_GET["id"]);
	hapus_pasien($id);

}else{
	// Invalid Request Method
	header("HTTP/1.0 405 Method Not Allowed");
}

function pasien()
{
	include("inc/pdo.conf.php");
	$query = $db->query("SELECT * FROM registerpasien ORDER BY id_pasien ASC");
	$result = $query->fetchAll();
	$output = array();
	$data = array();
	foreach ($result as $row) {
		$data[] = array(
            'id_pasien' => $row['id_pasien'],
            'nama'     	=> $row['nama'],
            'nomedrek'  => $row['nomedrek'],
        );
	}
	$output["data"] = $data;
	$output["status"] = 200;
	$output["error"] = false;
	header('Content-Type: application/json');
	echo json_encode($output); 
	exit;
}

function get_pasien($id)
{
	include("inc/pdo.conf.php");
	$query = $db->query("SELECT * FROM registerpasien WHERE id_pasien = ".$id." Limit 1");
	$result = $query->fetchAll();
	$output = array();
	$data = array();
	foreach ($result as $row) {
		$data[] = array(
            'id_pasien' => $row['id_pasien'],
            'nama'     	=> $row['nama'],
            'nomedrek'  => $row['nomedrek'],
        );
	}
	$output["data"] = $data;
	$output["status"] = 200;
	$output["error"] = false;
	header('Content-Type: application/json');
	echo json_encode($output); 
	exit;
}

function add_pasien()
{
	include("inc/pdo.conf.php");

	$_POST ? '' : $_POST = json_decode(trim(file_get_contents('php://input')), true);
    $nama 	  	= $_POST["nama"];
	$nomedrek 	= $_POST["nomedrek"];
	// var_dump($_POST);
	
	$simpan = $db->prepare("INSERT INTO `registerpasien`(`nomedrek`, `nama`) VALUES (:nomedrek, :nama)");
	$simpan->bindParam(":nomedrek",$nomedrek,PDO::PARAM_STR);
	$simpan->bindParam(":nama",$nama,PDO::PARAM_STR);
	$simpan->execute();

	if($simpan) {
		$response=array(
			'status' => 1,
			'status_message' =>'Pasien Added Successfully.'
		);
	}
	else {
		$response=array(
			'status' => 0,
			'status_message' =>'Pasien Addition Failed.'
		);
	}
	header('Content-Type: application/json');
	echo json_encode($response);
}

function update_pasien($id)
{
	include("inc/pdo.conf.php");

	parse_str(file_get_contents('php://input'), $_PUT);
    $nama 	  	= $_PUT["nama"];
	$nomedrek 	= $_PUT["nomedrek"];
	
	$update = $db->prepare("UPDATE registerpasien SET nama=:nama, nomedrek=:nomedrek WHERE id_pasien=:id_pasien");
	$update->bindParam(":nama",$nama,PDO::PARAM_STR);
	$update->bindParam(":nomedrek",$nomedrek,PDO::PARAM_STR);
	$update->bindParam(":id_pasien",$id,PDO::PARAM_INT);
	$update->execute();

	if($update) {
		$response=array(
			'status' => 1,
			'status_message' =>'Pasien Updated Successfully.'
		);
	}
	else {
		$response=array(
			'status' => 0,
			'status_message' =>'Pasien Updation Failed.'
		);
	}
	header('Content-Type: application/json');
	echo json_encode($response);
}

function hapus_pasien($id)
{
	include("inc/pdo.conf.php");
	$query = $db->query("DELETE FROM registerpasien WHERE id_pasien = ".$id);
	if($query) {
		$response=array(
			'status' => 1,
			'status_message' =>'Pasien Deleted Successfully.'
		);
	}
	else {
		$response=array(
			'status' => 0,
			'status_message' =>'Pasien Deletion Failed.'
		);
	}
	header('Content-Type: application/json');
	echo json_encode($response);
}
?>
