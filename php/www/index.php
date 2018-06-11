<!DOCTYPE html>
<html>
	<head>
		<title>Test</title>
	</head>
	<body>
		<p>Alooo</p>
		<?php phpinfo(); ?>
		<?php 
			// $dbconn = pg_connect("host=tantor.db.elephantsql.com dbname=apllexzx user=apllexzx password=dv0rai7aFCh91Q1aBLD1xU29zQYXb-fQ");
			// // or die("Can't connect to database".pg_last_error());
			// echo $dbconn;
			try {
				$db = new PDO("pgsql:host=tantor.db.elephantsql.com dbname=apllexzx user=apllexzx password=dv0rai7aFCh91Q1aBLD1xU29zQYXb-fQ");
				echo $db;
			} catch (PDOException  $e) {
				print $e->getMessage();
		 }
		?>
	</body>
</html>