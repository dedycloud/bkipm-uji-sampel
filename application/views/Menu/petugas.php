        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

         

           <div class="row">
           		<div class="col-lg-6">
           			<!-- alert -->
           			 <?= form_error('nama_ptgs','<div class="alert alert-danger" role="alert">','</div>');?>

           			 <?=$this->session->flashdata('message');?>

           			<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#ptgsModal">Add Petugas</a>
           					
           		<table class="table table-hover">
				  	<thead>
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Nama Petugas</th>
				      <th scope="col">Action</th>
				    </tr>
				    
				  </thead>

				  <tbody>
					<?php $i =1; ?>
				  	<?php foreach ($petugas as $p):?>
				  	
					   <tr>
					      <th scope="row"><?= $i;?></th>
				     	   <td><?=$p['nama_ptgs'];?></td>
					      <td>
					      		
					     		<a href="<?=base_url();?>menu/ubahpetugas/<?=$p['id_ptgs'];?>" class="badge badge-warning" data-toggle="modal" data-target="#editModal-<?=$p['id_ptgs'];?>">Edit</a> 
					     		<a href="<?= base_url();?>menu/hapuspetugas/<?= $p['id_ptgs'];?>" class="badge badge-danger glyphicon glyphicon-clearcle" onclick="return confirm('Apakah Anda yakin ingin menghapus <?= $p['nama_ptgs'];?>?');">Delete</a>	
					      </td>
					    
					    </tr>
					   <?php $i++;?>
				   <?php endforeach;?>  
					 
				  </tbody>
				</table> 
			</div>
		</div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->



<!-- Modal tambah -->
<div class="modal fade" id="ptgsModal" tabindex="-1" role="dialog" aria-labelledby="ptgsModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ptgsModalLabel">Data Petugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Menu/Petugas');?>" method="post">
	      <div class="modal-body">

	        <div class="form-group">
			    <input type="text" class="form-control" id="nama_ptgs" name="nama_ptgs" placeholder="Masukan Nama Petugas...">
			  </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Add</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal edit -->

<?php $i =1; ?>
<?php foreach ($petugas as $p): $i++;?>
<div class="modal fade" id="editModal-<?=$p['id_ptgs'];?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Ubah Data Petugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Menu/ubahpetugas');?>" method="post">
	      <div class="modal-body">
	      	
	      	<div class="form-group">
			    <input type="hidden" class="form-control" id="id_ptgs" name="id_ptgs" value="<?= $p['id_ptgs'];?>" placeholder="">
			  </div>

	        <div class="form-group">
	        	<label class="control-label">Nama Petugas :</label > 
			    <input type="text" class="form-control" id="nama_ptgs" name="nama_ptgs" value="<?= $p['nama_ptgs'];?>" placeholder="Nama Petugas...">
			  </div>
	      </div>
 
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save</button>
	      </div>
      </form>
    </div>
  </div>
</div>
   
<?php endforeach;?> 

