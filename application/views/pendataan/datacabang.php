<!-- Begin Page Content -->
<div class="container-fluid">
<?= $this->session->flashdata('message'); ?>   
 <div class="container">
        <div class="card-body p-0">
            <div class="card shadow mb-4" style="max-width: 600px; margin: 0 auto; float: none;">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-center" style="color: #00abe8;"><?= $title ?>
                   <button type="button" id="passToAddCabangId" class="float-right btn btn-primary" data-toggle="modal" data-target="#newCabangModal">tambah</button>
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

<!-- Modal create submenu -->
<div class="modal fade" id="newCabang" tabindex="-1" aria-labelledby="newCabangModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newCabangModalLabel">Masukkan data cabang yang ingin ditambahkan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input type="number" id="addMenuId" hidden disabled required>
          <input type="text" class="form-control my-2" id="addcabang" placeholder="Nama cabang" required>
          <input type="text" class="form-control my-2" id="addalamat" placeholder="Alamat" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="addNewCabangForm" type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

