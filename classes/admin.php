<?php  
 $filepath = realpath(dirname(__FILE__));
	 
	// include_once ($filepath.'/../lib/session.php');
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class Admin {
	private $db;
	private $fm;

	public function __construct(){
	     $this->db = new Database();
	     $this->fm = new Format();

	}

	public function  getAdminData($data) {

	$adminUser = $this->fm->validation($data ['adminUser']);
	$adminPass = $this->fm->validation($data ['adminPass']);
	$adminUser  = mysqli_real_escape_string($this->db->link, $adminUser);
	$adminPass = mysqli_real_escape_string($this->db->link,md5($adminPass));

	$quary  = "SELECT * FROM  tbl_admin WHERE adminUser ='$adminUser' AND adminPass = '$adminPass'";
	$result = $this->$db->select($query);
	if($result  != false){
	   $value = $result->fetch_assoc();
	Session:: init();
	session::set("adminLogin",true);
	session::set("adminUser",$value["adminUser"]);
	session::set("adminId",$value["adminId"]);
    header("Location:index.php");
    }else{
        $msg = "<span class = 'error'> User or password not matched!  </span>";
    	return $msg;
}

    
}
}


?>