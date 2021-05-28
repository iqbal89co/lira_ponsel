<!-- Begin Page Content -->
<div class="container-fluid">
    <form action="<?= base_url('pendataan/infocabang/') . $datacabang['id'] ?>" method="POST">
        <!-- Page Heading -->
        <div class="card shadow mb-4" style="max-width: 600px; margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px;">
        <div class="card-header py-3 text-center">

           <h3 class="m-0 font-weight-bold text-info"><?= $title ?></h3> 
		 </div>
        <div class="card-body">
        <div>
            <div class="card-body">
                <table class="table table-borderless">
                    <div class="table-responsive">
                        <table class="table align-middle">
                        	<tr>
                        	<h5>Info </h5> 
                        	 </tr>
                        	 <tr>
                                <td>Nama Toko:</td>
                                <td><?= $datacabang['nama_toko']; ?></td>
                            </tr>
                            <tr>
                            	<td>Alamat:</td>
                            	<td><?= $datacabang['alamat']; ?></td>
                            </tr>
                        </table>
                    </div>
                </table>
            </div>
        </div>
    </div>
</div>
</form>
</div>
