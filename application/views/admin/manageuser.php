


<!-- Begin Page Content -->
<div class="container-fluid">
  <script src="<?= base_url("assets/") ?>vendor/jquery/jquery.min.js"></script>

    <div class="card shadow mb-4" style="max-width: 900px; margin: 0 auto; /* Added */
    float: none; /* Added */
    margin-bottom: 10px;">
    <?= $this->session->flashdata('message'); ?>
    <div class="card-header py-3 text-center">
        <a href="<?php echo base_url('Admin/tambah_data') ?>" class="btn btn-primary btn-sm float-center">Tambah Data</a>
  
    <div class="card-body text-center">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                   <th></th>
          
                </tr>
            </thead>
            
               <?php
                $no = 1;
                foreach ($master as $ms) : ?>
                <tr>
                    <td><?php echo $no++ ?> </td>
                    <td><?php echo $ms['name']; ?></td>
                    <td><?php echo $ms['username']; ?></td>
                    <td><?php echo $ms['role_id']; ?></td>
                    <td onclick="javascript: return confirm('Yakin hapus data?')"><a href="<?php echo base_url() ?>Admin/hapus_data/<?php echo $ms['id']; ?>" class="badge badge-danger">Delete</a>
                      <td>
                      <a href="<?php echo base_url() ?>Admin/edit_data/<?php echo $ms['id']; ?>" class="badge badge-primary">Edit</a>
                        
                </tr>
            <?php endforeach; ?>
            


        </table>
    </div>
</div>
</div>
</div>




<!-- Modal tambah user -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- end modal -->