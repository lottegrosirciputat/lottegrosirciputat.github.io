<?php 

session_start();
$_SESSION = [];
session_unset();
session_destroy();

?>

<script type="text/javascript">
	location.href = '../sgm/';
</script>