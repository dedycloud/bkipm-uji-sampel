        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

           <div class="row">
           		<div class="col-lg-6">

           			<!-- alert -->
           			 <?= form_error('jns_sampel','<div class="alert alert-danger" role="alert">','</div>');?>

           			 <?=$this->session->flashdata('message');?>

           			<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#samModal">Add Jenis Sampel</a>
           					
           		<table class="table table-hover">
				  	<thead>
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Jenis Sampel</th>
				      <th scope="col">Action</th>
				    </tr>
				    
				  </thead>

				  <tbody>
					<?php $i =1; ?>
				  	<?php foreach ($data as $d):?>
				  	
					   <tr>
					      <th scope="row"><?= $i;?></th>
				     	 <td><?= $d['jns_sampel'];?></td>
					      <td>
					     		<a href="<?=base_url();?>menu/ubahsampel/<?=$d['id_sampel'];?>" class="badge badge-warning" data-toggle="modal" data-target="#editModal-<?=$d['id_sampel'];?>">Edit</a> 
					     		<a href="<?= base_url();?>menu/hapussam/<?= $d['id_sampel'];?>" class="badge badge-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus <?= $d['jns_sampel'];?>?')">Delete</a>
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

     <!-- Modal -->
   <div class="modal fade" id="samModal" tabindex="-1" role="dialog" aria-labelledby="samModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="samModalLabel">Data Jenis Sampel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Menu/Sampel');?>" method="post">
	      <div class="modal-body">
	        <div class="form-group">
			    <input type="text" class="form-control" id="jns_sampel" name="jns_sampel" placeholder="Nama Sampel...">
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
<?php foreach ($data as $d): $i++;?>
<div class="modal fade" id="editModal-<?=$d['id_sampel'];?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Ubah Data Sampel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Menu/ubahsampel');?>" method="post">
	      <div class="modal-body">
	      	
	      	<div class="form-group">
			    <input type="hidden" class="form-control" id="id_sampel" name="id_sampel" value="<?= $d['id_sampel'];?>" placeholder="">
			  </div>

	        <div class="form-group">
	        	<label class="control-label">Jenis Sampel :</label > 
			    <input type="text" class="form-control" id="jns_sampel" name="jns_sampel" value="<?= $d['jns_sampel'];?>" placeholder="Nama Petugas...">
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