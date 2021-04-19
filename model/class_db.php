<?php 

class ClassDB
{
    function get_classes()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM classes ORDER BY ID';
        $statement = $db -> prepare ($query);
        $statement -> execute ();
        $classes = $statement -> fetchAll ();
        $statement -> closeCursor ();
        return $classes;
    }

    function get_class_name($class_id)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM classes WHERE ID = :class_id';
        $statement = $db -> prepare ($query);
        $statement -> bindValue (':class_id', $class_id);
        $statement -> execute ();
        $class = $statement -> fetch ();
        $statement -> closeCursor ();
        $class_name = $class['Class'];
        return $class_name;
    }

    function delete_class($class_id)
    {
        $db = Database::getDB();
        $query = 'DELETE FROM classes WHERE ID = :class_id';
        $statement = $db -> prepare ($query);
        $statement -> bindValue (':class_id', $class_id);
        $statement -> execute ();
        $statement -> closeCursor ();
    }

    function add_class($class_name)
    {
        $db = Database::getDB();
        $query = 'INSERT INTO classes (Class)
              VALUES
                 (:className)';
        $statement = $db -> prepare ($query);
        $statement -> bindValue (':className', $class_name);
        $statement -> execute ();
        $statement -> closeCursor ();
    }
}    function get_classes() {
        global $db;
        $query = 'SELECT * FROM classes ORDER BY ID';
        $statement = $db->prepare($query);
        $statement->execute();
        $classes = $statement->fetchAll();
        $statement->closeCursor();
        return $classes;
    }

    function get_class_name($class_id) {
        global $db;
        $query = 'SELECT * FROM classes WHERE ID = :class_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_id', $class_id);
        $statement->execute();
        $class = $statement->fetch();
        $statement->closeCursor();
        $class_name = $class['Class'];
        return $class_name;
    }

    function delete_class($class_id) {
        global $db;
        $query = 'DELETE FROM classes WHERE ID = :class_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_id', $class_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_class($class_name) {
        global $db;
        $query = 'INSERT INTO classes (Class)
              VALUES
                 (:className)';
        $statement = $db->prepare($query);
        $statement->bindValue(':className', $class_name);
        $statement->execute();
        $statement->closeCursor();
    }
