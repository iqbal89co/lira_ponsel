<!-- Begin Page Content -->
<div class="container-fluid">
<?= $this->session->flashdata('message'); ?>   
 <div class="container">
        <div class="card-body p-0">
            <div class="card shadow mb-4" style="max-width: 600px; margin: 0 auto; float: none;">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-center" style="color: #00abe8;"><?= $title ?>
                  <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertCabangBaru">
                  Tambah
                 </button>

                </div> 

                <div class="col-lg">
                   <br>
                   <?php
                   $i = 1;
                   foreach ($datacabang as $d) :
                    ?>
                    <div class="list-group">

                      <a href="<?= base_url('pendataan/infocabang/') . $d['id'] ?>"  data-name="<?= $d['nama_toko'] ?>" class="list-group-item list-group-item-action">
                          <span><?= $d['nama_toko'] ?></span></a>
                          <a href="" class="badge bg-danger text-light" data-toggle="modal" data-target="#deleteCabangModal" data-id="<?= $d['id'] ?>">delete</a> 
                      </div> 

                      <br>
                      <?php
                      $i++;
                  endforeach;
                  ?>
              </div>

          </div>
      </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="insertCabangBaru" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form action="<?= base_url("Pendataan/tambahCabangBaru")?>" method="POST" name="insertCabangBaru">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="insertCabangBaru">Tambah Cabang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control my-2" name="addUserId" placeholder="User Id" required>
          <input type="text" class="form-control my-2" name="addNamaToko" placeholder="Nama Toko" required>
          <input type="text" class="form-control my-2" name="addAlamat" placeholder="Alamat" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- Modal delete Menu -->
<div class="modal fade" id="deleteCabangModal" tabindex="-1" aria-labelledby="deleteCabangModalLabel" aria-hidden="true">
  <form action="<?= base_url("Pendataan/deleteCabang")?>" method="POST" name="deleteCabang">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteCabangModalLabel">Are you sure want to delete <span id="deleteAlertMenu"></span> cabang?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="" id="deleteCabangButton" class="btn btn-info">Delete</a>
      </div>
    </div>
  </div>
</div>