<?php

/*
 * CREATE TABLE Messages(
      id int AUTO_INCREMENT,
      send_id int NOT NULL,
      receive_id int NOT NULL,
      text varchar(500),
      dataWyslania DATETIME,
      przeczytana int default 1,
      PRIMARY KEY(id),
      FOREIGN KEY(send_id) REFERENCES Users(id)
      FOREIGN KEY(receive_id) REFERENCES Users(id)

  );
 */


class Message{

    static private $connection = null;
    private $id;
    private $sendId;
    private $receiveId;
    private $text;
    private $dataWyslania;
    private $statusPrzeczytania;

    static public function SetConnection(mysqli $newConnection){
        Message::$connection = $newConnection;
    }
    static public function Create($idWysylajacego, $idOdbiorcy, $textWiadomosci){
        $sql = "INSERT INTO Messages(send_id, receive_id, text, dataWyslania)
                VALUES ($idWysylajacego, $idOdbiorcy, '$textWiadomosci', now())";
        $result = self::$connection->query($sql);
        if($result === true){
            $newTweet = new Message(self::$connection->insert_id,$idWysylajacego, $idOdbiorcy, $textWiadomosci);
            return $newTweet;
        }
        return false;
    }
    static public function loadAllSendMessages($id){
        $ret = [];
        $sql = "SELECT * FROM Messages, Users WHERE Messages.send_id=Users.id AND send_id = $id ORDER BY dataWyslania DESC";
        $result = self::$connection->query($sql);
        if($result !== false) {
            if($result->num_rows>0) {
                while($row = $result->fetch_assoc()){
                    $message = new Message($row['id'], $row['send_id'], $row['receive_id'], $row['text'], $row['dataWyslania'], $row['przeczytana']);
                    $ret[] = $message;
                }
            }
        }
        return $ret;
    }
    static public function loadAllReceivedMessages($id){
        $ret = [];
        $sql = "SELECT * FROM Messages, Users WHERE Messages.send_id=Users.id AND receive_id = $id ORDER BY dataWyslania DESC";
        $result = self::$connection->query($sql);
        if($result !== false) {
            if($result->num_rows>0) {
                while($row = $result->fetch_assoc()){
                    $message = new Message($row['id'], $row['send_id'], $row['receive_id'], $row['text'], $row['dataWyslania'], $row['przeczytana']);
                    $ret[] = $message;
                }
            }
        }
        return $ret;
    }

    public function __construct($newId, $newSendId, $newReceiveId, $newText, $newDataWyslania, $newStatusPrzeczytania){
        $this->id = $newId;
        $this->setSendId($newSendId);
        $this->setReceiveId($newReceiveId);
        $this->setText($newText);
        $this->setDataWyslania($newDataWyslania);
        $this->setStatusPrzeczytania($newStatusPrzeczytania);

    }
    public function setSendId($newSendId){
        $this->sendId = $newSendId;
    }
    public function setReceiveId($newReceiveId){
        $this->receiveId = $newReceiveId;
    }
    public function setText($newText){
        $this->text = $newText;
    }
    public function setDataWyslania($newDataWyslania){
        $this->dataWyslania = $newDataWyslania;
    }
    public function setStatusPrzeczytania($newStatusPrzeczytania){
        $this->statusPrzeczytania = $newStatusPrzeczytania;
    }
    public function getId(){
        return $this->id;
    }
    public function getSendId(){
        return $this->sendId;
    }
    public function getReceiveId(){
        return $this->receiveId;
    }
    public function getText(){
        return $this->text;
    }
    public function getDataWyslania(){
        return $this->dataWyslania;
    }
    public function getStatusPrzeczytania(){
        return $this->statusPrzeczytania;
    }
    public function getFirstThirtyChar(){
        if (strlen($this->text)>30){
            return substr($this->text, 0, 30) . "...";
        }else{
            return $this->text;
        }
    }

}