<?php
include_once('src/db/connect.php');
class ModelStat {

    private $connect;

    public function __construct() {
            $cnt = new connect;
            $this->connect = $cnt->setConnection();
        }


    public function read() {
        $maxParticipant = array();
        $participant = array();
        $avg = array();
        $nbrNote = array();
        $nbrDej = array();
        $nbrDin = array();
        $avgAt = array();
        $nameAt = array();
        $req = $this->connect->query('SELECT id, name_ev, desc_ev, dej, din, lat, lon, nbr_atelier, logo, address, date_ev FROM event ORDER BY date_ev DESC');
        $res = $this->connect->query('SELECT id, name_ev, desc_ev, dej, din, lat, lon, nbr_atelier, logo, address, date_ev FROM event ORDER BY date_ev DESC');
        $l = 0;
        while ($data = $req->fetch())
        { 
            $id = $data['id'];
            $req2 = $this->connect->prepare('SELECT COUNT(id) AS nbr_max FROM participant WHERE id_event=:value');
            $req2->bindParam(':value', $id, PDO::PARAM_INT);
            $req2->execute();

            array_push($maxParticipant, $req2->fetch());

            $req2->closeCursor();

            $req22 = $this->connect->prepare('SELECT COUNT(id) AS nbr FROM participant WHERE id_event=:value AND participe = "oui"');
            $req22->bindParam(':value', $id, PDO::PARAM_INT);
            $req22->execute();

            array_push($participant, $req22->fetch());

            $req22->closeCursor();

            $req3 = $this->connect->prepare('SELECT AVG(note) AS note FROM satisfaction WHERE id_event=:value AND id_atelier=0');
            $req3->bindParam(':value', $id, PDO::PARAM_INT);
            $req3->execute();

            array_push($avg, $req3->fetch());

            $req3->closeCursor();


            $req4 = $this->connect->prepare('SELECT count(id) AS nbr_note FROM satisfaction WHERE id_event=:value AND id_atelier=0');
            $req4->bindParam(':value', $id, PDO::PARAM_INT);
            $req4->execute();

            array_push($nbrNote, $req4->fetch());

            $req4->closeCursor();

            $req5 = $this->connect->prepare("SELECT count(id) AS nbr_dej FROM participant WHERE id_event=:value AND dej = 'oui'");
            $req5->bindParam(':value', $id, PDO::PARAM_INT);
            $req5->execute();

            array_push($nbrDej, $req5->fetch());

            $req5->closeCursor();

            $req6 = $this->connect->prepare("SELECT count(id) AS nbr_din FROM participant WHERE id_event=:value AND din = 'oui'");
            $req6->bindParam(':value', $id, PDO::PARAM_INT);
            $req6->execute();

            array_push($nbrDin, $req6->fetch());

            $req6->closeCursor();

            $req7 = $this->connect->prepare('SELECT name_atelier, id FROM atelier WHERE id_event=:value');
            $res7 = $this->connect->prepare('SELECT name_atelier, id FROM atelier WHERE id_event=:value');
            $req7->bindParam(':value', $id, PDO::PARAM_INT);
            $req7->execute();
            $i = 0;
            while ($dataAt = $req7->fetch())
            { 
                 $at = $dataAt['id'];
                 $req8 = $this->connect->prepare('SELECT AVG(note) AS avg FROM satisfaction WHERE id_atelier=19');
                 $req8->execute();
                 $nameAt[$l][$i] = $dataAt['name_atelier'];
                 $dataAvgAt = $req8->fetch();
                 $avgAt[$l][$i] =  $dataAvgAt['avg'];
                 $i++;
            }
            $req7->closeCursor();

 
            $l++;
        }
        $return = array("res" => $res, "maxParticipant" => $maxParticipant, "participant" => $participant, "avg" => $avg, "nbrNote" => $nbrNote, "nbrDej" => $nbrDej, "nbrDin" => $nbrDin, "nameAt" => $nameAt, "avgAt" => $avgAt);
        return $return;
    }

}
?>