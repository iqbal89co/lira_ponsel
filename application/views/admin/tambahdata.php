<div class="container-fluid">
<h3>Halaman tambah data</h3>
<br>

<form method="post" action="<?php echo base_url('Admin/proses_tambah_data');?>">
  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="name">
    </div>
  </div>

    <div class="form-group row">
    <label for="username" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="username">
    </div>
  </div>

    <div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" name="password">
    </div>
  </div>

   <div class="form-group row">
    <label for="role" class="col-sm-2 col-form-label">Role</label>
    <div class="col-sm-5">
      <input type="number" class="form-control" name="role">
    </div>
  </div>

<button type="submit" class="btn btn-primary">Tambah</button>
<button type="reset" class="btn btn-danger">Reset</button>
</form>
 </div>
