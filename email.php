<?php
if (isset($_POST['body'], $_POST['subject'], $_POST['info-name'], $_POST['info-org'], $_POST['info-email'])){
	$body = <<<BODY
	$_POST['body']
	
	Contact Info
	Name: $_POST['info-name']
	Organization: $_POST['info-org']
	Email: $_POST['info-email']
BODY;
echo $_POST['subject'];
echo $body;

} else
exit();
?>
