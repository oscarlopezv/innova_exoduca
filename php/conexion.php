<?php
class conectar{
	function mysqlsrv(){
		global $dbh;
		$dbname="exoeduca_pruebas";
		$user ="exoeduca_pruebas";
		$password="exoeduca_pruebas";
		
		try {
            $dsn = "mysql:host=localhost;dbname=$dbname";
            $dbh = new PDO($dsn, $user,$password);
        } catch (PDOException $e){
            echo $e->getMessage();
        }

		return $dbh;
	}
}
?>