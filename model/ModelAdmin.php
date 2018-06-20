<?php

include_once('src/db/connect.php');
class Admin {

    private $connect;

    public function __construct() {
            $cnt = new connect;
            $this->connect = $cnt->setConnection();
        }

    public function calendar() {
        $req = $this->connect->query('SELECT id, name_ev, date_ev FROM event ORDER BY ID');
        return $req;
    }

    public function nextEv() {
       $req = $this->connect->query('SELECT id, name_ev, date_ev FROM event WHERE date_ev > CURRENT_DATE ORDER BY date_ev ASC LIMIT 1');
       $data = $req->fetch();
       $id = $data['id'];
       $req2 = $this->connect->query("SELECT COUNT(id) as nbr_participant FROM participant WHERE id_event = '$id' AND particip = 'oui'");
       $data2 = $req2->fetch();
       $particip = $data2['nbr_participant'];
       $nextEv = $data['name_ev'];
       $dateEv = $data['date_ev'];


       
       $res = ['dateEv' => $dateEv, 'nextEv' => $nextEv, 'particip' => $particip];
       return $res;
    }

    public function prevEv() {
       $req = $this->connect->query('SELECT id, name_ev, date_ev FROM event WHERE date_ev < CURRENT_DATE ORDER BY date_ev ASC LIMIT 1');
       $data = $req->fetch();
       $id = $data['id'];
       $req2 = $this->connect->query("SELECT COUNT(id) as nbr_participant FROM participant WHERE id_event = '$id' AND particip = 'oui'");
       $data2 = $req2->fetch();
       $particip = $data2['nbr_participant'];
       $prevEv = $data['name_ev'];
       $dateEv = $data['date_ev'];
       $req3 = $this->connect->query("SELECT AVG(note) AS note FROM satisfaction WHERE id_event = '$id' AND id_atelier=0");
       $req4 = $this->connect->query("SELECT count(id) AS nbr_note FROM satisfaction WHERE id_event = '$id' AND id_atelier=0");
       $data3 = $req3->fetch();
       $avg = $data3['note'];
       $data4 = $req4->fetch();
       $nbr = $data4['nbr_note'];
       
       $res = ['dateEv' => $dateEv, 'prevEv' => $prevEv, 'particip' => $particip, 'avg' => $avg, 'nbr' => $nbr];
       return $res;
    }
}
