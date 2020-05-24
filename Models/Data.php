<?php
class Data extends Model {
    public function selectForId($id_user) {
        $array = array();

        $sql = "SELECT * FROM data WHERE id_user = :id_user ORDER BY id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_user", $id_user);
        $sql->execute();

        if($sql->rowCount()) {
            $array = $sql->fetchAll();
        }

        return $array;

    }

    public function existUser($id_user) {
        $boolean = false;

        $sql = "SELECT * FROM users WHERE id = :id_user";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_user", $id_user);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $boolean = true;

        }

        return $boolean;

    }
    public function addSchedules($data_first, $data_end, $description, $id_user) {
        $sql = "INSERT INTO data (id_user, description, data_first, data_end) VALUES (:id_user, :description, :data_first, :data_end)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_user", $id_user);
        $sql->bindValue(":description", $description);
        $sql->bindValue(":data_first", $data_first);
        $sql->bindValue(":data_end", $data_end);
        $sql->execute();
    
    }

    public function doneSchedules($id_schedules, $id_user, $done) {
        $sql = "UPDATE data SET done = :done WHERE id = :id_schedules AND id_user = :id_user";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":done", $done);
        $sql->bindValue(":id_schedules", $id_schedules);
        $sql->bindValue(":id_user", $id_user);
        $sql->execute();


    }

    public function deleteSchedules($id_schedules, $id_user) {
        $sql = "DELETE FROM data WHERE id = :id_schedules AND id_user = :id_user ";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id_schedules", $id_schedules);
        $sql->bindValue(":id_user", $id_user);
        $sql->execute();

    }
}