<?php
class GroupUserModel extends DB
{

    public function getAll($keyword ='')
    {
        if (!empty($keyword)) {
            $sql = "SELECT * FROM groups_user WHERE name like '%" . $keyword . "%'";
        } else {
            $sql = 'SELECT * FROM groups_user';
        }
        return $this->pdo_query($sql);
    }

    public function insertGroup($name, $created_at)
    {
        $insert = "INSERT INTO groups_user(name, created_at) VALUE('$name', '$created_at')";
        return $this->pdo_execute($insert);
    }

    function updateGroup($id, $name, $updated_at)
    {
        $update = "UPDATE groups_user SET name = '$name', updated_at = '$updated_at' WHERE id = '$id'";
        return $this->pdo_execute($update);
    }

    function SelectOneGroup($id)
    {
        $select = "SELECT * FROM groups_user WHERE id = '$id'";
        if ($this->pdo_query_one($select)) {
            return $this->pdo_query_one($select);
        } else {
            return [];
        }
    }

    public function deleteGroup($id)
    {
        $detele = "DELETE FROM groups_user WHERE id = $id";
        return $this->pdo_execute($detele);
    }
}
