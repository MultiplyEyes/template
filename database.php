<?php
class database{
    //properties (= class variables)
    private $host;
    private $user;
    private $password;
    private $db;
    private $charet;
    private $connection;

    function __construct(){
        $this->host = 'localhost';
        $this->user = 'root';
        $this->password = '';
        $this->db = 'login';
        $this->charset = 'utf8mb4';

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE=> PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES=>false
        ];

        try {
            $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
            $this->connection = new PDO("mysql:host=$this->host; dbname=$this->db", $this->user, $this->password, $options);
        
        } catch(PDOException $e) {
            throw new PDOException("error message is". $e->getMessage());
        }
    }
    // public function login($uname, $psw, $locatie){
    //     //deze functie checkt of de user bestaat
    //     //vervolgens checkt hij of de ingevoerde username/password de correcte combo is in de database

    //     //todo: vervang usertabel met je user tabel in je database
    //     $sql = "SELECT id, username, password FROM user WHERE username=:uname";
    //     $named_placeholder = [
    //         'uname'=>$username
    //     ];
    //     $user = $this->select($sql, $named_placeholder);

    //     if(is_array($user) && count($user) > 0){
    //         $hashed_password = $user['password'];
    //         $username = $user['username'];

    //         if($uname == $username && password_verify($psw, $hashed_password)){
    //             session_start();
    //             $_SESSION['id'] = $user['id'];
    //             $_SESSION['username'] = $username;
    //             $_SESSION['logged_in'] = true;
    //             $_SESSION['user_type'] = $user['usertype'];
    //              //het stuurt de user naar de pagina de je wilt als ze hebben ingelogd
    //             header('location: $locatie');
    //         }else{
    //             echo ("Username and/of assword incorrect. please fix you input en try again");
    //         }
    //     }else{
    //         echo ("Failed to login, please fix your input and try again");
    //     }
        
    // }

    public function login($sql, $username, $wachtwoord, $locatie) {    
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([
      'gebruikersnaam' => $username
    ]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    print_r($result);
    print_r($result['wachtwoord']);
    
    if (is_array($result)){
       
    
        if(count($result)> 0){
            
            if($username == $result['gebruikersnaam'] && password_verify($wachtwoord, $result['wachtwoord']));{ // && means both of them have to be true    == means is/ identical too     
                session_start();
                $_SESSION['id'] = $result['id'];
                $_SESSION['username'] = $result['gebruikersnaam'];
                header("location: $locatie");
            }
        }else{
            $message = "failed to login";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    
    }else{
        $message = "failed to login";
        echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
    public function select($statement, $placeholder){
        //prepared statement
        $stmt = $this->connection->prepare($statement);
        $stmt->execute($placeholder);
        //fetch data alleen als we het over select hebben
        $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insert($statements , $placeholder, $locatie){
        try{
            // start transaction
            $this->connection->beginTransaction();

            $stmt = $this->connection->prepare($statements);
            //INSERT INTO table VALUES id=NULL, username=:uname, password=:pass
            //['uname'=>$_POST['username'] , 'pass'=>$_POST['psw']]
            $stmt->execute( $placeholder);

            //commmit
            $this->connection->commit();

            header("location: $locatie");

        }catch(Exception $e){
            $this->connection->rollback();
            echo "ERROR message" . $e->getMessage();
        }
    }

    Public function is_admin($uname){
        $sql = "select * from user where username=:uname";
        $pl = ['uname'=>$uname];
        $result = $this->select($sql,$pl);

        $location = 'klant-homepage.php';

        if($is_admin){
            $location = 'medewerker-homepage.php';
        }

        $db->login($sql, $placeholder, $location);

    }
    public function edit_or_delete($statement, $placeholder, $location){
        $stmt = $this->connection->prepare($statement);
        $stmt->execute($placeholder);
        header("location: $location");
    }

}
?>