<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 3/22/2018
 * Time: 22:19
 */

class dbConn
{
    protected static $db;


    //veritabanına bağlanan fonksiyon
    public function __construct()
    {
        try{
            self::$db = new PDO("mysql:host=localhost;dbname=ililce;charset=utf8", "root", "123456");
        }
        catch (PDOException $exception)
        {
            print $exception->getMessage();
        }
    }

    //Bölgeleri getiren fonksiyon
    public function getBolgeList()
    {
        $data=array();
        $query = self::$db->query("SELECT DISTINCT bolge from ilveilceler", PDO::FETCH_ASSOC);
        if($query->rowCount())
        {
            foreach ($query as $row)
            {
                $data[]=$row["bolge"];
            }
        }
        echo json_encode($data);
    }


    //İlleri getiren fonksiyon
    public function getIlList($bolge){
        $data=array();
        $query = self::$db->prepare("SELECT DISTINCT il FROM ilveilceler WHERE bolge=:bolge");
        $query->execute(array(":bolge"=>$bolge));
        if($query->rowCount())
        {
            foreach ($query as $row)
            {
                $data[]=$row["il"];
            }
        }
        echo json_encode($data);
    }


    //İlçeleri getiren fonksiyon
    public function getIlceList($il){
        $data=array();
        $query = self::$db->prepare("SELECT DISTINCT ilce FROM ilveilceler WHERE il=:il");
        $query->execute(array(":il"=>$il));
        if($query->rowCount())
        {
            foreach ($query as $row)
            {
                $data[]=$row["ilce"];
            }
        }
        echo json_encode($data);
    }
}