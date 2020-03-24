<?php 
include __DIR__ .'/conn.php';
## Read value
// $draw = $_POST['draw'];
print_r($_POST);
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value
$table = "(SELECT k.n_id_karyawan, k.n_nik, k.s_nm_lengkap, kd.s_departement, kd.s_bagian, kd.s_jabatan, kd.d_tgl_mulai FROM masterkaryawan AS k 
INNER JOIN masterkaryawan_det AS kd ON k.n_id_karyawan=kd.n_id_karyawan) as X";

## Search 
$searchQuery = " ";
if($searchValue != ''){
	$searchQuery = " AND (
   		   X.n_nik				LIKE '%".$searchValue."%'
		OR X.s_nm_lengkap		LIKE '%".$searchValue."%'
		OR X.s_departement     LIKE '%".$searchValue."%'
		OR X.s_bagian          LIKE '%".$searchValue."%'
		OR X.s_jabatan         LIKE '%".$searchValue."%'
		OR X.d_tgl_mulai       LIKE '%".$searchValue."%'
	)";
}

## Fetch records
$colomn = "X.n_nik
		  ,X.s_nm_lengkap
		  ,X.s_departement
		  ,X.s_bagian
		  ,X.s_jabatan
		  ,X.d_tgl_mulai";

$empQuery = "select $colomn  from $table WHERE 1 ".$searchQuery." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($conn, $empQuery);
$data = array();
//echo $empQuery;
while ($row = mysqli_fetch_assoc($empRecords)) {
//echo $row['n_post'];

		$button = '';
		if($row['n_post'] != 2){
			$button .= "<a href='#' class='btn btn-primary' onclick='edit(".'"'.$row['n_id_karyawan'].'"'.")' ><i class='fa fa-pencil'> </i></a>";
			$button .= "<a href='#' class='btn btn-info' onclick='send(".'"'.$row['n_id_karyawan'].'",'.'"INV"'.")' ><i class='fa fa-send'> </i></a>";			
			$button .=" <a href='#' class='btn btn-warning' onclick='print(".'"'.$row['n_id_karyawan'].'"'.")' ><i class='fa fa-file-pdf-o'> </i></a>";	
		}else{
			$button .=" <a href='#' class='btn btn-warning' onclick='print(".'"'.$row['n_id_karyawan'].'"'.")' ><i class='fa fa-file-pdf-o'> </i></a>";				
		}	
	
$data[] = array( 
			"k.n_nik"=>$row['k.n_nik'],
			"k.s_nm_lengkap"=>$row['k.s_nm_lengkap'],
			"kd.s_departement"=>$row['kd.s_departement'],
			"kd.s_bagian"=>$row['kd.s_bagian'],
			"kd.s_jabatan"=>$row['kd.s_jabatan'],
			"kd.d_tgl_mulai"=>$row['kd.d_tgl_mulai'],
			"button"=>rawurlencode($button)
   		);
}

## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecordwithFilter,
  "iTotalDisplayRecords" => $totalRecords,
  "aaData" => $data
);

echo json_encode($response);

?>