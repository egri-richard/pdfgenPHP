<?php

namespace Petrik\Egridr;
use DateTime;

class Tiger {
    private $nev;
    private $tulNev;
    private $orokDat;

    private function __construct(String $Nev, String $TulNev, DateTime $OrokDat) {
        $this->nev = $Nev;
        $this->tulNev = $TulNev;
        $this->orokDat = $OrokDat;
    }

    public function toString(): String {
        return "Név: ".$this->nev." | Tulajdonos neve: ".$this->tulNev." | Örökbefogadás dátuma: ".$this->orokDat->format('Y-m-d')."\n"; 
    }

    public static function getAll() : array {
        global $db;
        $retArr = [];
        
        $query = $db->query('SELECT * FROM tigrisek')->fetchAll();

        foreach($query as $row) {
            $e = new Tiger($row['Nev'], $row['TulajNev'], new DateTime($row['OrokbeDatum']));

            $retArr[] = $e;
        }

        return $retArr;
    }   
}