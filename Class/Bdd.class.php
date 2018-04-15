<?
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
		$query = $this->db->prepare("INSERT INTO offre (name,idEntreprise) VALUES (:name,:idEntreprise)");
		$query->execute(array('name'=>$offre->getName(),'idEntreprise'=>$offre->getIdEntreprise()));
	}
	function getEntrepriseById($id){
		$result = $this->db->prepare('SELECT * FROM entreprise WHERE id = :id');
		$result->execute(array('id'=>$id));
		return $result->fetchAll();
	}
	function saveEntreprise($entreprise){
		$query = $this->db->prepare("INSERT INTO entreprise (name) VALUES (:name)");
		$query->execute(array('name'=>$entreprise->getName()));
	}
	function getNameIdEntreprise(){
		$result = $this->db->prepare('SELECT id,name FROM entreprise');
		$result->execute();
		return $result->fetchAll();
	}
	function getNameEntrepriseById($id){
		$result = $this->db->prepare('SELECT name FROM entreprise WHERE id = :id');
		$result->execute(array('id'=>$id));
		return $result->fetchAll();
	}
	

	

}