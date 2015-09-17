<?php

class ConnectDB
{

    protected $host = 'localhost';
    protected $dbname = 'db_msg';
    protected $user = 'root';
    protected $pass = 'rootroot';
    static $DBH;

    function __construct()
    {
        try {
            self::$DBH = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
        } catch (PDOException $e) {
            die('Подключение не удалось: ' . $e->getMessage());
        }
    }
}

class Queries
{

    /**
     * Выбираем все данные из таблицы
     * @return string
     */


}

class dbQuery extends ConnectDB
{
    /**
     * @return string
     */
    function getPosts()
    {
        return
            $get_posts = "SELECT P.id,P.content,P.create_time,P.author_id,U.username,U.email
                          FROM tbl_post AS P
                          INNER JOIN  tbl_user AS U
                          WHERE P.author_id=U.id ORDER BY create_time DESC;";
    }

    function insertData()
    {
        return
            $insert_data = "INSERT INTO tbl_user (username,password)
        VALUES (:username,SHA(:password))";
    }

    /**
     * @return string
     */
    function insertMsg()
    {
        return
            $insert_data = "INSERT INTO tbl_post (content,author_id)
        VALUES (:content,:id)";
    }

    /**
     * @return string
     */
    function upDate()
    {
        return
            $update = "UPDATE enterprises SET subcategories_id=:subcategories_id, image='logo.png' WHERE id=:enterprise_id";
    }

    /**
     * @param $author_id
     * @return string
     */
    function  deleteMsg($author_id)
    {
        return
            $delete = "DELETE FROM tbl_post WHERE author_id='$author_id'";
    }

    /**
     * @param $username
     * @return string
     */
    function dataUser($username)
    {
        return
            $data_user = "SELECT * FROM tbl_user WHERE username = '$username'";
    }

    /**
     * @param $sql
     * @return array
     */
    static function getQuery($sql)
    {
        $select = parent::$DBH->prepare("$sql");
        $select->execute();
        $arr = $select->fetchAll(PDO::FETCH_ASSOC);
        return $arr;
    }

    /**Регистрация пользователя
     * @param $sql
     * @param $username
     * @param $password
     * @return bool
     */
    function insertDataQuery($sql, $username, $password)
    {
        $insert = parent::$DBH->prepare("$sql");
        $insert->bindParam(':username', $username);
        $insert->bindParam(':password', $password);
        $end = $insert->execute();
        //print_r ($insert->errorInfo());
        return $end;
    }

    /**Запись введенного юзером сообщения в БД
     * @param $sql
     * @param $msg
     * @param $id
     * @return bool
     */
    function insertMsgQuery($sql, $msg, $id)
    {
        $insert = parent::$DBH->prepare("$sql");
        $insert->bindParam(':content', $msg);
        $insert->bindParam(':id', $id);
        $end = $insert->execute();
        //print_r ($insert->errorInfo());
        return $end;
    }

    /**
     * Обновление данных о подкатегории  преприятия
     * @param $sql
     * @return bool
     */
    function gupdate($sql, $subcategories_id, $enterprise_id)
    {
        $update = parent::$DBH->prepare("$sql");
        $update->bindParam(':subcategories_id', $subcategories_id);
        $update->bindParam(':enterprise_id', $enterprise_id);
        $end = $update->execute();
        return $end;
    }

    /**
     * Удаление строоки из БД
     * @param $sql
     * @return bool
     */
    function delete($sql)
    {
        $delete = parent::$DBH->prepare("$sql");
        $end = $delete->execute();
        return $end;
    }

}

class Validator
{

    /**
     * Валидация email-адреса
     * @param $email
     * @return mixed
     */
    function valid_email($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}

class SignUp extends ConnectDB
{


    /**
     * Регистрация нового пользователя
     * @param $username
     * @param $password
     * @param $repassword
     * @return bool
     */
    /*public function wwriteData($username,$password,$repassword){
        session_start();
        if ($password==$repassword){
            $select = $this->DBH->prepare("SELECT * FROM tbl_user WHERE username = '$username'");
            $select->execute();
            $count=$select->rowCount();
            $row=$select->fetch();
            //var_dump($count);
            if($count==0){
                $insert = $this->DBH->prepare("INSERT INTO vdn_users (username,password,date_registration)VALUE ('$username',SHA('$password'),NOW())");
                $id_user=$row['id_user'];
                $_SESSION['id_user']=$id_user;
                $username=$row['username'];
                $_SESSION['username']=$username;
                return $insert->execute();
            }else{$_SESSION['name_error']="that name already exists";}
        }else{$_SESSION['password_error']="passwords do not match";}
    }*/
    function writeData()
    {
        $dbQuery = new dbQuery;


        if (isset($_POST) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['repassword'])) {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $repassword = trim($_POST['repassword']);
            if ($_POST['password'] === $_POST['repassword']) {
                $select = $dbQuery->getQuery($dbQuery->dataUser($username));
                $count = count($select);
                //print_r($select);
                //echo $select['0']['id'];
                if ($count == 0) {
                    session_start();

                    $insert_data = $dbQuery->insertDataQuery($dbQuery->insertData(), $username, $password);
                    if ($insert_data == true) {
                        $_SESSION['id_user'] = $select['0']['id'];
                        $_SESSION['username'] = $select['']['username'];
                        header("Location: ../view/index-local.php?page=messages");
                    } else {
                        echo "Ошибка записи в БД";
                    }
                } else {
                    echo "Такое имя уже существует, придумайте другое имя";
                }
            }
        }
    }
}

class Authorization extends ConnectDB
{
    /**
     * Вход зарегестрированного пользователя
     * @param $username
     * @param $password
     * @return bool
     */
    public function  LogIn($username, $password)
    {
        session_start();
        $error_msg = " ";
        if (!isset($_SESSION['id_user'])) {
            if (!empty($username) && !empty($password)) {
                $select = $this->DBH->prepare("SELECT * FROM tbl_user WHERE username='$username' AND password=SHA('$password')");
                $select->execute();
                $count = $select->rowCount();
                if ($count == 1) {
                    $row = $select->fetch();
                    $id_user = $row['id_user'];
                    $_SESSION['id_user'] = $id_user;
                    setcookie('id_user', $row['id_user'], time() + 60 * 60);
                    $username = $row['username'];
                    $_SESSION['username'] = $username;
                    setcookie('username', $row['username'], time() + 60 * 60);
                    return true;
                } else {
                    $error_msg = 'To enter, you must enter a valid username and password';
                    $_SESSION['error_msg'] = $error_msg;
                }

            } else {
                $error_msg = 'Name or password is not correct';
                $_SESSION['error_msg'] = $error_msg;
            }
        }
    }

    /**
     * Выход зарегестрированного пользователя
     */
    public function  LogOut()
    {
        session_start();
        if (isset($_SESSION['id_user'])) {
            $_SESSION = array();
            if (isset($_COOKIE[session_name()])) {
                setcookie(session_name(), '', time() - 3600);
            }
            session_destroy();
        }
        setcookie('username', '$username', time() - 3600);
        setcookie('id_user', '$id_user', time() - 3600);
        $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
        header('Location:' . $home_url);
    }
}
