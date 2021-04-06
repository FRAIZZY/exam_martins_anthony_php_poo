<?php
class UserManager extends DbManager
{

    public function __construct()
    {
        parent::__construct();
    }

    public function checkLogin(User $user)
    {
        $sql = 'SELECT * FROM user WHERE username = ? AND password = ?';
        $request = $this->bdd->prepare($sql);
        $request->bindParam(1, $user->getUsername());
        $request->bindParam(2, $user->getPassword());
        $request->execute();

        $res = $request->fetch();

        return $res;
    }

    public function register(User $user)
    {
        $sql = 'INSERT INTO user (username, password) VALUES (:username, :password)';
        $request = $this->bdd->prepare($sql);
        $res = $request->execute([':username' => $user->getUsername(), ':password' => $user->getPassword(),]);

        return $res;
    }
}
