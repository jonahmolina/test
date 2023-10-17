<?php
include 'Db.php';
class Index extends Db{

    public function getQuestion1(){

        $db = $this->connect();

        $sql = "SELECT artist,count(album) as total_album FROM importcsv GROUP BY artist";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();


        return $result;

    }

    public function getQuestion2(){

        $db = $this->connect();

        $sql = "SELECT artist,album,SUM(2022_Sales) as total_sale FROM `importcsv` GROUP BY album order by artist asc";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;

    }

    public function getQuestion3(){

        $db = $this->connect();

        $sql = "SELECT artist,album,SUM(2022_Sales) as total_sale FROM `importcsv` GROUP BY album order by total_sale desc limit 1";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;

    }

    public function getQuestion4(){

        $db = $this->connect();

        $sql = "SELECT album,2022_sales FROM `importcsv` order by 2022_Sales desc limit 10";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;

    }

    public function getQuestion5($artist){

        $db = $this->connect();

        $sql = "SELECT album FROM `importcsv` WHERE artist = ? group by album order by 2022_Sales desc";
        $params = ([$artist]);
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetchAll();

        return $result;

    }



    



}