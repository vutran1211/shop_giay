<a href="<?php echo _WEB_ROOT . '/user/add_user' ?>" class="btn btn-primary mb-2">Thêm người dùng</a>


<div class="mb-3">
    <form action="<?= _WEB_ROOT . '/user' ?>" method="get">
        <input type="text" class="form-control" placeholder="Tìm kiếm người dùng" name="search" value="<?= $data['keyword'] ?>">
    </form>
</div>

<?php
if (isset($_SESSION['msg']) && $_SESSION['msg'] != "") {
?>
    <div class="alert alert-success"><?php echo  $_SESSION['msg'] ?></div>
<?php
    $_SESSION['msg'] = '';
}
?>

<table class="table table-striped table_user">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">TÊN</th>
            <th scope="col">AVATAR</th>
            <th scope="col">THÔNG TIN NGƯỜI DÙNG</th>
            <th scope="col">THỜI GIAN TẠO</th>
            <th scope="col">THỜI GIAN CẬP NHẬT</th>
            <th scope="col">NHÓM NGƯỜI DÙNG</th>
            <th scope="col">THAO TÁC</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($data['users'])) {
            foreach ($data['users'] as $user) {
        ?>
                <tr>
                    <td class="align-middle" scope="row"><b><?php echo $user['id'] ?></b></td>
                    <td class="align-middle "><?php echo $user['name'] ?></td>
                    <td class="align-middle "><img src="<?php echo _PATH_AVATAR . $user['avatar'] ?>" class="align-middle img-thumbnail" style="width: 80px; height: 80px; margin-top: 5px; max-width: 100%; object-fit: cover; object-position: center;"></td>
                    <td class="align-middle" style="width: 100px;"><?php echo '<p class="m-0">' . $user['phone'] . '</p>' . '<p class="m-0">' . $user['email'] . '</p>' . '<p>' . $user['address'] . '</p>' ?></td>
                    <td class="align-middle "><?php echo $user['created_at'] ?></td>
                    <td class="align-middle "><?php echo $user['updated_at'] ?></td>

                    <td class="align-middle "><?php echo getNameUserGroup($user['gr_id']) ?></td>
                    <td class="align-middle text-center ">
                        <a class="align-middle btn btn-outline-primary" href="<?php echo _WEB_ROOT . '/user/update_user/' . $user['id'] ?>">
                            <i class="align-middle fas fa-edit"></i>
                        </a>
                        <a class="align-middle handle_delete btn btn-outline-danger" href="<?php echo _WEB_ROOT . '/user/delete_user/' . $user['id'] ?>">
                            <i class="align-middle fas fa-user-times"></i>
                        </a>
                    </td>
                </tr>
            <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="8" class="text-center">KHÔNG CÓ DỮ LIỆU</td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>