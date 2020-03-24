<?php 
include 'conn.php';
## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
// print_r($_POST);
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = 'n_nik'; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value
$table = "(SELECT k.n_id_karyawan, k.n_nik, k.s_nm_lengkap, kd.s_departement, kd.s_bagian, kd.s_jabatan, kd.d_tgl_mulai FROM masterkaryawan AS k 
INNER JOIN masterkaryawan_det AS kd ON k.n_id_karyawan=kd.n_id_karyawan)X";


### Search 
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

## Total number of records without filtering
$sel = mysqli_query($conn,"select count(*) allcount from $table");
$records = mysqli_fetch_assoc($sel); 

$totalRecords = $records['allcount'];

## Total number of record with filtering
$sel = mysqli_query($conn,"select count(*)  allcount from $table WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];
## Fetch records
$colomn = "X.n_id_karyawan
		  ,X.n_nik
		  ,X.s_nm_lengkap
		  ,X.s_departement
		  ,X.s_bagian
		  ,X.s_jabatan
		  ,X.d_tgl_mulai";

$empQuery = "select $colomn  from $table WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($conn, $empQuery);
$data = array();
$no = 1;
//echo $empQuery;
while ($row = mysqli_fetch_assoc($empRecords)) {
//echo $row['n_post'];
		$button = '';
			$button .= "<a href='#' class='btn btn-primary' onclick='edit(".'"'.$row['n_id_karyawan'].'"'.")' ><i class='fas fa-pencil-alt'> </i></a>";		
			$button .=" <a href='#' class='btn btn-warning' onclick='delete(".'"'.$row['n_id_karyawan'].'"'.")' ><i class='fas fa-trash-alt'> </i></a>";	

			$data[] = array( 
				"no"=>$no,
				"n_nik"=>$row['n_nik'],
				"s_nm_lengkap"=>$row['s_nm_lengkap'],
				"s_departement"=>$row['s_departement'],
				"s_bagian"=>$row['s_bagian'],
				"s_jabatan"=>$row['s_jabatan'],
				"d_tgl_mulai"=>$row['d_tgl_mulai'],
				"button"=>rawurlencode($button)
			   );
			   $no++;
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