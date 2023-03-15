<?php

    require_once('db_info_class.php');
    require_once('item_class.php');

    date_default_timezone_set("America/Denver");

    class codex_manager {

        public function search_for_php($term, $search_type) {

            $db = connect_to_db();

            $sql = "SELECT * FROM items WHERE $search_type LIKE '%$term%' ORDER BY created DESC";
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            try {
                $query = $db->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_CLASS, 'item');
            }
            
            catch (Exception $ex) {
                echo "{$ex->getMessage()}<br/>";
            }

            return $results;

        }

        public function admin_show_all() {

            $db = connect_to_db();

            $sql = "SELECT * FROM items ORDER BY id ASC";
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            try {
                $query = $db->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_CLASS, 'item');
            }
            
            catch (Exception $ex) {
                echo "{$ex->getMessage()}<br/>";
            }

            return $results;

        }


        public function create($id, $title, $content) {

            $currentTime = date("Y.m.d h:i:sa");

            $db = connect_to_db();

            $sql = "INSERT INTO items(`id`, `title`, `content`, `created`) 
                    VALUES (:id, :title, :content, '$currentTime')";

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try {
                $query = $db->prepare($sql);
                $query->bindParam(':id', $id);
                $query->bindParam(':title', $title);
                $query->bindParam(':content', $content);
                $query->execute();
            }
            
            catch (Exception $ex) {
                echo "{$ex->getMessage()}<br/>";
            }
            
            //return $db->lastInsertId();
        }

        public function update($id, $description, $type, $priority) {

            $currentTime = date("Y.m.d h:i:sa");

            $db = new PDO("mysql:host=localhost;dbname=tasker", 'blazerv82', '');

            $sql = "UPDATE tasks set `description` = :description, `type` = :type, 
                    `priority` = :priority, `time_created` = '$currentTime' 
                    where `id`=:id";

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try {
                $query = $db->prepare($sql);
                $query->bindParam(':description', $description);
                $query->bindParam(':type', $type);
                $query->bindParam(':priority', $priority);
                $query->bindParam(':id', $id);
                $query->execute();
            }
            
            catch (Exception $ex) {
                echo "{$ex->getMessage()}<br/>";
            }
            
            //return $db->lastInsertId();
        }

        
        public function remove($id){

            $db = new PDO("mysql:host=localhost;dbname=tasker", "blazerv82", "");

            $sql = "DELETE FROM tasks WHERE `id`=:id";

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try
            {
                $query = $db->prepare($sql);
                $query->bindParam(':id', $id);
                $query->execute();
            }

            catch (Exception $ex)
            {
                echo "{$ex->getMessage()}<br/>";
            }
            

        }

        

    }

?>