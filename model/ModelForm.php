<?php
include_once('src/db/connect.php');
class ModelForm {

	private $connect;

	public function __construct() {
			$cnt = new connect;
			$this->connect = $cnt->setConnection();
		}

	public function readForm($id) {
		$req = $this->connect->prepare('SELECT id, name_ev, desc_ev, dej, din, lat, lon, nbr_atelier, logo, date_ev, address FROM event WHERE id=:value');
		$req->bindParam(':value', $id, PDO::PARAM_INT);
   	    $req->execute();
    	$data = $req->fetch();
        $req1 = ['id' => $data['id'], 'name' => $data['name_ev'], 'desc' => $data['desc_ev'], 'dej' => $data['dej'], 'din' => $data['din'], 'lat' => $data['lat'], 'lon' => $data['lon'], 'nbrAtelier' => $data['nbr_atelier'], 'logo' => $data['logo'], 'date' => $data['date_ev'], 'address' => $data['address']];
        $req->closeCursor();
        $req2 = $this->connect->prepare('SELECT id, id_event, name_atelier, desc_atelier FROM atelier WHERE id_event=:value');
		$req2->bindParam(':value', $id, PDO::PARAM_INT);
		$req2->execute();
		$req3 = $req2->fetchAll();
		$req2->closeCursor();
		$res = array("req1" => $req1, "req2" => $req3);
        return $res;
       }

    public function sendForm($id) {

    	$req = $this->connect->prepare('INSERT INTO participant (id_event, name, lastname, fonction, tel, mail, dej, din, particip) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
		$req->execute(array($id, strip_tags($_POST['name']), strip_tags($_POST['lastname']), strip_tags($_POST['fonction']), strip_tags($_POST['tel']), strip_tags($_POST['mail']), strip_tags($_POST['dej']), strip_tags($_POST['din']), strip_tags($_POST['participation'])));
		$req->closeCursor();
        return $req;
    }


}