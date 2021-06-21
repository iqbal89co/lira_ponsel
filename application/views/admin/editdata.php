<div class="container-fluid">
<h3>Halaman edit data</h3>
<br>

<form method="post" action="<?php echo base_url('Admin/proses_edit_data');?>">
  <div class="form-group row">

    <input type="hidden" name="id" value="<?php echo $master['id'] ?>">

    <label for="name" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="name" value="<?php echo $master['name'] ?>">
    </div>
  </div>

    <div class="form-group row">
    <label for="username" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="username" value="<?php echo $master['username'] ?>">
    </div>
  </div>

    <div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">Password Baru</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" name="password" value="">
    </div>
  </div>

   <div class="form-group row">
    <label for="role" class="col-sm-2 col-form-label">Role</label>
    <div class="col-sm-5">
      <input type="number" class="form-control" name="role" value="<?php echo $master['role_id'] ?>">
    </div>
  </div>

<button type="submit" class="btn btn-primary">Edit</button>
<button type="reset" class="btn btn-danger">Reset</button>
</form>
 </div>
