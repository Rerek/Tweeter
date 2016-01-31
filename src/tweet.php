<?php
/*
 * CREATE TABLE Tweets(
      id int AUTO_INCREMENT,
      user_id int NOT NULL,
      text varchar(140),
      DATETIME,
      FOREIGN KEY(user_id) REFERENCES Users(id)
      PRIMARY KEY(id)
  );
 */

class Tweet{
    static private $connection = null;
    private $id;
    private $idUsera;
    private $text;
    private $dataDodania;


    static public function SetConnection(mysqli $newConnection){
        Tweet::$connection = $newConnection;
    }
    static public function loadAllTweets(){
        $ret = [];
        $sql = "SELECT * FROM Tweets";
        $result = self::$connection->query($sql);
        if($result !== false) {
            if($result->num_rows>0) {
                while($row = $result->fetch_assoc()){
                    $tweet = new Tweet($row['id'], $row['user_id'], $row['text'], $row['addDate']);
                    $ret[] = $tweet;
                }
            }
        }
        return $ret;
    }
    static public function Create($idDodjącego, $trescTweeta){
        $sql = "INSERT INTO Tweets(user_id, text, addDate)
                VALUES ($idDodjącego, '$trescTweeta', now())";
        $result = self::$connection->query($sql);
        if($result === true){
            $newTweet = new Tweet(self::$connection->insert_id, $idDodjącego, $trescTweeta);
            return $newTweet;
        }
        return false;
    }
    static public function ShowTweet($id){
        $sql = "SELECT Tweets.id, Tweets.text, Tweets.addDate, Users.name FROM Tweets JOIN Users ON Tweets.user_id=Users.id WHERE Tweets.id = $id";        //tworze zapytanie do bazy danych
        $result = self::$connection->query($sql);
        if($result !== false) {
            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                $tweet = new Tweet($row['id'], $row['name'], $row['text'], $row['addDate']);
                return $tweet;
            }
        }
        return false;
    }
    static public function getTweetById($id){
        $sql = "SELECT * FROM Tweets WHERE id = $id";        //tworze zapytanie do bazy danych
        $result = self::$connection->query($sql);
        if($result !== false) {
            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                $tweet = new Tweet($row['id'], $row['user_id'], $row['text'], $row['addDate']);
                return $tweet;
            }
        }
        return false;
    }


    public function __construct($newId, $newIdUsera, $newText, $newDatadodania){
        $this->dataDodania = $newDatadodania;
        $this->id =$newId;
        $this->setIdUsera($newIdUsera);
        $this->setText($newText);
    }
    public function setIdUsera($newIdUsera)
    {
        $this->idUsera = $newIdUsera;
    }
    public function setText($newText)
    {
        $this->text = $newText;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getIdUsera()
    {
        return $this->idUsera;
    }
    public function getText()
    {
        return $this->text;
    }
    public function getdataDodania()
    {
        return $this->dataDodania;
    }
    public function saveToDB(){
        $sql = "UPDATE Tweets SET text=('$this->text') WHERE id = $this->id";
        $result = self::$connection->query($sql);
        if ($result === True){
            return True;
        }
        return FALSE;
    }

    public function getAllComents(){
        $ret = [];
        $sql = "SELECT * FROM Comments ORDER BY dataDodania DESC";
        $result = self::$connection->query($sql);
        if($result !== false) {
            if($result->num_rows>0) {
                while($row = $result->fetch_assoc()){
                    $comment = new Comment($row['id'], $row['user_id'], $row['tweet_id'], $row['text'], $row['dataDodania']);
                    $ret[] = $comment;
                }
            }
        }
        return $ret;
    }




}



?>