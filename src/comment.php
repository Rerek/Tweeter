<?php

/*
 * CREATE TABLE Comments(
      id int AUTO_INCREMENT,
      user_id int NOT NULL,
      tweet_id int NOT NULL,
      text varchar(60),
      dataDodania DATETIME,
      FOREIGN KEY(user_id) REFERENCES Users(id)
      FOREIGN KEY(tweet_id) REFERENCES Tweets(id)
      PRIMARY KEY(id)
  );
 */



class Comment{

    static private $connection = null;
    private $id;
    private $idUsera;
    private $idPostu;
    private $creationDate;
    private $text;

    static public function loadAllComments($id){
        $ret = [];
        $sql = "SELECT * FROM Comments, Users WHERE Comments.user_id=Users.id AND tweet_id = $id ORDER BY dataDodania DESC";
        $result = self::$connection->query($sql);
        if($result !== false) {
            if($result->num_rows>0) {
                while($row = $result->fetch_assoc()){
                    $comment = new Comment($row['id'], $row['name'], $row['tweet_id'], $row['text'], $row['dataDodania']);
                    $ret[] = $comment;
                }
            }
        }
        return $ret;
    }
    static public function SetConnection(mysqli $newConnection){
        Comment::$connection = $newConnection;
    }
    static public function Create($idUsera, $idPostu, $text){
        $sql = "INSERT INTO Comments(user_id, tweet_id, text, dataDodania)
                VALUES ('$idUsera', '$idPostu', '$text', now())";

        $result = self::$connection->query($sql);
        if($result === true){
            $newComment = new Comment(self::$connection->insert_id, $idUsera, $idPostu, $text);
            return $newComment;

        }
        return false;
    }
    static public function ShowComment($id){
        $sql = "SELECT * FROM Comments Where id = $id";        //tworze zapytanie do bazy danych
        $result = self::$connection->query($sql);
        if($result !== false) {
            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                $comment = new Comment($row['id'], $row['user_id'], $row['tweet_id'], $row['text'], $row['dataDodania']);
                return $comment;
            }
        }
        return false;
    }
    static public function getCommentById($id){
        $sql = "SELECT * FROM Comments WHERE id = $id";        //tworze zapytanie do bazy danych
        $result = self::$connection->query($sql);
        if($result !== false) {
            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                $comment = new Comment($row['id'], $row['user_id'], $row['tweet_id'], $row['text'], $row['dataDodania']);
                return $comment;
            }
        }
        return false;
    }


    public function __construct($newId, $newIdUsera, $newIdPostu,  $newText, $newCreationDate){
        $this->id = $newId;
        $this->setIdUsera($newIdUsera);
        $this->setIdPostu($newIdPostu);
        $this->setCreationDate($newCreationDate);
        $this->setText($newText);
    }
    public function getId(){
       return $this->id;
    }
    public function getIdUsera(){
        return $this->idUsera;
    }
    public function getIdPostu(){
        return $this->idPostu;
    }
    public function getCreationDate(){
        return $this->creationDate;
    }
    public function getText(){
        return $this->text;
    }
    public function setIdUsera($newIdUsera){
        $this->idUsera = $newIdUsera;
    }
    public function setIdPostu($newIdPostu){
        $this->idPostu = $newIdPostu;
    }
    public function setCreationDate($newCreationDate){
        $this->creationDate = $newCreationDate;
    }
    public function setText($newText){
        $this->text = $newText;
    }
    public function saveToDB(){
        $sql = "UPDATE Comments SET text=('$this->text') WHERE id = $this->id";
        $result = self::$connection->query($sql);
        if ($result === True){
            return True;
        }
        return FALSE;
    }
}





?>