<?php
class Bdd {

	

	private static $_instance = null;
	private $db;


	public static function getInstance() {

		if(is_null(self::$_instance)) {
			self::$_instance = new Bdd();  
		}
		
		return self::$_instance;
	}


	function __construct(){
		$this->db = new PDO('mysql:host=localhost;dbname=markethon;charset=utf8mb4', 'root', 'root');
	}
	function getOffreById($id){
		$result = $this->db->prepare('SELECT * FROM offre WHERE id = :id');
		$result->execute(array('id'=>$id));
		return $result->fetchAll();
	}
	function saveOffre($offre){
		if($offre->getId() == -1){
			$query = $this->db->prepare("INSERT INTO offre (name,idEntreprise) VALUES (:name,:idEntreprise)");
			$query->execute(array('name'=>$offre->getName(),'idEntreprise'=>$offre->getIdEntreprise()));
		}else{
			
			$query = $this->db->prepare("UPDATE offre SET name = :name, identreprise = :idEntreprise WHERE id=:id");
			var_dump($query->execute(array('name'=>$offre->getName(),'idEntreprise'=>$offre->getIdEntrprise(),'id'=>$offre->getId())));
		}


	}
	function getEntrepriseById($id){
		$result = $this->db->prepare('SELECT * FROM entreprise WHERE id = :id');
		$result->execute(array('id'=>$id));
		return $result->fetchAll();
	}
	function saveEntreprise($entreprise){
		
		if($entreprise->getId() == -1){
			$query = $this->db->prepare("INSERT INTO entreprise (name) VALUES (:name)");
			$query->execute(array('name'=>$entreprise->getName()));
		}else{
			$query = $this->db->prepare("UPDATE entreprise SET name = :name WHERE id=:id");
			$query->execute(array('name'=>$entreprise->getName(),'id'=>$entreprise->getId()));
		}
	}
	function AllEntreprise(){
		$result = $this->db->prepare('SELECT id,name FROM entreprise');
		$result->execute();
		return $result->fetchAll();
	}
	function getNameEntrepriseById($id){
		$result = $this->db->prepare('SELECT name FROM entreprise WHERE id = :id');
		$result->execute(array('id'=>$id));
		return $result->fetchAll();
	}
	function deleteEntreprise($id){
		$result = $this->db->prepare('DELETE FROM entreprise WHERE id = :id');
		$result->execute(array('id'=>$id));
	}
	function deleteOffre($id){
		$result = $this->db->prepare('DELETE FROM offre WHERE id = :id');
		$result->execute(array('id'=>$id));
	}
	

	

}