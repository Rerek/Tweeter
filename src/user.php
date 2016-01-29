<?php
/*
 * CREATE TABLE Users(
      id int AUTO_INCREMENT,
      name varchar(255),
      email varchar(255) UNIQUE,
      password char(60),
      description varchar(255),
      PRIMARY KEY(id)
  );
 */


class User{
    static private $connection = null;
    static public function SetConnection(mysqli $newConnection){
        User::$connection = $newConnection;
    }
    static public function Register($newName, $newEmail, $password1, $password2, $newDescription){
        if($password1 !== $password2){
            return false;
        }
        $options = [                                        //haszowanie hasła start
            'cost' => 11,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        ];
        $hassedPassword = password_hash($password1, PASSWORD_BCRYPT, $options); // haszowanie hasła stop

        $sql = "INSERT INTO Users(name, email, password, description)
                VALUES ('$newName', '$newEmail', '$hassedPassword', '$newDescription')";

        $result = self::$connection->query($sql);
        if($result === true){
            $newUser = new User(self::$connection->insert_id, $newName, $newEmail, $newDescription);
            return $newUser;

        }
        return false;
    }
    static public function LogInUser($email, $password){
        $sql = "SELECT * FROM Users WHERE email LIKE '$email'";
        $result = self::$connection->query($sql);
        if ($result !== False){
            if($result->num_rows === 1){
                $row = $result->fetch_assoc();
                $isPasswordOk = password_verify($password, $row['password']);  //sprawdzenie hasla
                if($isPasswordOk=== true){
                    $user = new User($row['id'], $row['name'], $row['email'], $row['description']);
                    return $user;
                }
            }
        }
        return false;
    }
    static public function getUserById($id){
        $sql = "SELECT * FROM Users WHERE id = $id";
        $result = self::$connection->query($sql);
        if($result !== false) {
            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                $user = new User($row['id'], $row['name'], $row['email'], $row['description']);
                return $user;
            }
        }
        return false;
    }
    static public function getAllUsers(){
        $ret = [];
        $sql = "SELECT * FROM Users";
        $result = self::$connection->query($sql);
        if($result !== false) {
            if($result->num_rows>0) {
                while($row = $result->fetch_assoc()){
                    $user = new User($row['id'], $row['name'], $row['email'], $row['description']);
                    $ret[] = $user;
                }
            }
        }
        return $ret;
    }



    private $id;
    private $name;
    private $email;
    private $description;

    public function __construct($newId, $newName, $newEmail, $newDescription){
        $this->id = $newId;
        $this->name = $newName;
        $this->email = $newEmail;
        $this->setDescription($newDescription);
    }
    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($newDescription){
        if(is_string($newDescription)){
            $this->description=$newDescription;
        }
    }
    public function saveToDB(){
        $sql = "UPDATE Users SET description=('$this->description') WHERE id = $this->id";
        $result = self::$connection->query($sql);
        if ($result === True){
            return True;
        }
        return FALSE;
    }
    public function loadAllTweets(){
        $ret = [];
        // TODO: Finis this function
        // TODO: ta funkcja powinna zwracać wszystkie tweety użytkownika (data DESC)
        return $ret;
    }
    public function loadAllSendMassages(){
        $ret = [];
        // TODO: Finis this function
        // TODO: ta funkcja powinna zwracać wszystkie wiadomości użytkownika (data DESC)
        return $ret;
    }


}
?>