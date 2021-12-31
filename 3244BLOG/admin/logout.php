<?php
error_reporting (0);
session_start();
include("includes/config.php");
$_SESSION['login']=="";
session_unset();
$_SESSION['errmsg']="You have successfully logout";
if($_SESSION['login']=="")
{
	echo "<script>
alert('You are successfully logout.');
</script>";
}
?>
<script language="javascript">
document.location = "index.php";
</script>