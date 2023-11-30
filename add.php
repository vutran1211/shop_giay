<?php
if (!empty($data['msg'])) {
  echo '<div class="alert alert-' . $data['type'] . '">' . $data['msg'] . '</div>';
}
?>

<form method="POST" action="<?php echo _WEB_ROOT . '/user/add_user' ?>" enctype="multipart/form-data" class="pb-5">
  <div class="grid-cols-12 grid gap-4">

    <div class="row">
      <div class="mb-3 col">
        <label for="exampleInputEmail1" class="form-label">Tên người dùng</label>
        <input type="text" class="form-control" name="username" placeholder="Name user" required>
      </div>
      <div class="mb-3 col">
        <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
        <input type="text" class="form-control" name="phone" placeholder="Phone" required>
      </div>
    </div>

    <div class="row">
      <div class="mb-3 col">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" placeholder="example@gmail.com" required>
      </div>
      <div class="mb-3 col">
        <label for="exampleInputEmail1" class="form-label">Mật khẩu</label>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
      </div>
    </div>
    <div class="row">
      <div class="mb-3 col" id="image-upload">
        <label for="image" class="form-label flex flex-col justify-center" id="upload-img">
          <span>Avatar</span>
          <!-- <div class="flex items-center gap-3  mt-2 px-2 py-1 rounded border">
            <img src="<?= _PATH_AVATAR . '' ?>" alt="" class="w-7">
            <span>
              Tải file lên
            </span>
          </div> -->
        </label>
        <input type="file" id="image" class="form-control hidden" name="avatar" onchange="readURL(this);"><br>
      </div>
      <div class="mb-3 col">
        <label for="exampleInputEmail1" class="form-label">Nhóm người dùng</label><br>
        <select name="group" id="groupuser" class="custom-select" required>
          <option>Chọn....</option>
          <?php
          foreach ($data['groups'] as $group) {
          ?>
            <option value="<?php echo $group['id'] ?>"><?php echo $group['name'] ?></option>
          <?php
          }
          ?>
        </select>
      </div>

    </div>
    <div class="row">
      <div class="mb-3 col">
        <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
        <textarea rows="4" type="text" class="form-control" name="address" placeholder="Address" required></textarea>
      </div>
      <div class="mb-3 col">
        <label for="exampleInputEmail1" class="form-label">Mô tả</label>
        <textarea rows="4" type="text" class="form-control" name="description" placeholder="Description"></textarea>
      </div>
    </div>




  </div>
  <input type="hidden" name="add_user" value="add_user">
  <button type="submit" class="btn btn-primary">Add</button>
</form>