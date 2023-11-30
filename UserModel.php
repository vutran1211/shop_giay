<?php
class UserModel extends DB
{

    function getAll($keyword = '', $id = 0, $gr_id = 0)
    {
        $sql = "SELECT * FROM users WHERE 1";
        if (!empty($keyword)) {
            $sql .= " AND  name like '%" . $keyword . "%' OR email like '%" . $keyword . "%' OR phone like '%" . $keyword . "%' OR address like '%" . $keyword . "%'";
        }

        if ($id > 0) {
            $sql .= " AND id <> $id";
        }
        if ($gr_id > 0) {
            $sql .= " AND gr_id = $gr_id";
        }
        return $this->pdo_query($sql);
    }

    function InsertUser($name, $email, $password, $tel, $create_at)
    {
        $insert = "INSERT INTO users(gr_id, name, email, password, phone, created_at) VALUE(2, '$name', '$email', '$password','$tel', '$create_at')";
        return $this->pdo_execute($insert);
    }

    function SelectOneUser($email)
    {
        $select = "SELECT * FROM users WHERE email = '$email'";
        if ($this->pdo_query_one($select)) {
            return $this->pdo_query_one($select);
        } else {
            return [];
        }
    }

    function SelectUser($id)
    {
        $select = "SELECT * FROM users WHERE id = '$id'";
        if ($this->pdo_query_one($select)) {
            return $this->pdo_query_one($select);
        } else {
            return [];
        }
    }

    function checkGroupUser($gr_id)
    {
        $select = "SELECT * FROM users WHERE gr_id = '$gr_id'";
        if ($this->pdo_query($select)) {
            return $this->pdo_query($select);
        } else {
            return [];
        }
    }

    function insert($name, $avatar, $group, $email, $password, $phone, $address, $desc, $create_at)
    {
        $insert = "INSERT INTO users(name, avatar, gr_id, email, password, phone, address, description, created_at) VALUE('$name', '$avatar', $group ,'$email', '$password', '$phone', '$address', '$desc', '$create_at')";
        return $this->pdo_execute($insert);
    }

    // function updateUser($id, $name, $avatar, $group, $email, $password, $phone, $address, $desc, $updated_at)
    // {
    //     if (!empty($password) && empty($avatar)) {
    //         $update = "UPDATE users SET name = '$name', gr_id = '$group', email = '$email', password = '$password', phone = '$phone', address = '$address', description = '$desc', updated_at = '$updated_at' WHERE id = '$id'";
    //     } else if (empty($password) && !empty($avatar)) {
    //         $update = "UPDATE users SET name = '$name', avatar = '$avatar', gr_id = '$group', email = '$email', phone = '$phone', address = '$address', description = '$desc', updated_at = '$updated_at' WHERE id = '$id'";
    //     } else if (empty($password) && empty($avatar)) {
    //         $update = "UPDATE users SET name = '$name', gr_id = '$group', email = '$email', phone = '$phone', address = '$address', description = '$desc', updated_at = '$updated_at' WHERE id = '$id'";
    //     } else {
    //         $update = "UPDATE users SET name = '$name', avatar = '$avatar', gr_id = '$group', email = '$email', password = '$password', phone = '$phone', address = '$address', description = '$desc', updated_at = '$updated_at' WHERE id = '$id'";
    //     }
    //     return $this->pdo_execute($update);
    // }

    // function updateProfile($id, $name, $avatar, $email, $phone, $address, $desc, $updated_at)
    // {
    //     if (empty($avatar)) {
    //         $update = "UPDATE users SET name = '$name', email = '$email', phone = '$phone', address = '$address', description = '$desc', updated_at = '$updated_at' WHERE id = '$id'";
    //     } else {
    //         $update = "UPDATE users SET name = '$name', avatar = '$avatar', email = '$email', phone = '$phone', address = '$address', description = '$desc', updated_at = '$updated_at' WHERE id = '$id'";
    //     }

    //     return $this->pdo_execute($update);
    // }

    function deleteUser($id)
    {
        $delete = "DELETE FROM users WHERE id = '$id'";
        return $this->pdo_execute($delete);
    }
}
