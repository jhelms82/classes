<?php
class AdminDB {


   public static function add_admin($username, $password)
    {
        $db = Database::getDB();
        $hash = password_hash ($password, PASSWORD_DEFAULT);
        $query = 'INSERT INTO administrators (username, password)
              VALUES (:username, :password)';
        $statement = $db -> prepare ($query);
        $statement -> bindValue (':username', $username);
        $statement -> bindValue (':password', $hash);
        $statement -> execute ();
        $statement -> closeCursor ();
    }


    public static function is_valid_admin_login($username, $password)
    {
        $db = Database::getDB();
        $query = 'SELECT password FROM administrators
              WHERE username = :username';
        $statement = $db -> prepare ($query);
        $statement -> bindValue (':username', $username);
        $statement -> execute ();
        $row = $statement -> fetch ();
        $statement -> closeCursor ();
        $hash = (!empty($row['password'])) ? $row['password'] : NULL;
        return password_verify ($password, $hash);

    }


    public static function valid_registration($username)
    {
        $db = Database::getDB();
        $statement = $db -> prepare ("SELECT username FROM administrators WHERE username = :username");
        $statement -> bindParam (':username', $username);
        $statement -> execute ();

        if ($statement -> rowCount () > 0) {
            return true;
        } else {
            return false;
        }
    }
}
