<?php
     
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/loginheader.php');
	include_once ($filepath.'/../classes/admin.php');
	$ad = new Admin(); 
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
$adminData = $ad->getAdminData($_POST);
}



?>




<div class="main">
<h1>Admin Login</h1>
<div class="adminlogin">
	<form action="" method="post">
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="adminUser" required/></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="pass" name="adminPass" required/></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="login" value="Login"/></td>
			</tr>
             <tr>
             	<td cospan="2" > 
             		<?php
             		if(isset($adminData)){
             			echo  $adminData;
             		}



             		?>



             	</td>
             	


             </tr>

		</table>
	</from>
</div>
</div>
<?php include 'inc/footer.php'; ?>