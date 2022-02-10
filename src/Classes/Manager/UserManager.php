<?php
namespace App\Classes\Manager;

use PDO;
use App\Classes\Entity\User;

class UserManager
{
    private $_db;

    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }

    public function setDb($db): UserManager
    {
        $this->_db = $db;
        return $this;
    }

    public function addUser($email, $password)
    {
        // Netoyge des donnés envoyées
        // $email = strip_tags($_POST['email']);
        // $password = strip_tags($_POST['password']);

        $stmt = $this->_db->prepare("INSERT INTO users (user_mail, `user_password`) VALUE (?, ?);");
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $password);

        // Appel de la procédure stockée
        $stmt->execute();
    }

    public function delete(User $user) //:bool

    {
        // TODO
    }

    public function update(User $user) //:bool

    {
        // TODO
    }

    public function connectUser($email, $password)
    {
        session_start();
        $_SESSION["connecter"] = "closed";
        $request = $this->_db->query('SELECT `user_id`, `user_mail`, `user_password` FROM users');
        while ($ligne = $request->fetch(PDO::FETCH_ASSOC)){
            if ($email == $ligne['user_mail']){
                $hash = $ligne['user_password'];
                if (password_verify($password, $hash)) {
                    echo 'Le mot de passe est valide !';
                    $_SESSION['connecter'] = "oppen";
                    header('Location: apprentissageList.php');
                } else {
                    session_destroy();
                    echo '<div class="error">Le mot de passe est invalide.</div>';
                }
            }
        }
    }

    public function getList(): array
    {
        $userList = array();

        $request = $this->_db->query('SELECT user_id, user_mail FROM users;');
        while ($ligne = $request->fetch(PDO::FETCH_ASSOC)) {
            $user = new User($ligne);
            $userList[] = $user;
        }
        return $userList;
    }
}


?>