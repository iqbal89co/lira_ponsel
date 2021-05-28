<!-- Begin Page Content -->
<div class="container-fluid">
<?= $this->session->flashdata('message'); ?>   
 <div class="container">
        <div class="card-body p-0">
            <div class="card shadow mb-4" style="max-width: 600px; margin: 0 auto; float: none;">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-center" style="color: #00abe8;"><?= $title ?>
                    <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#newMenuModal"> + </button> 
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

