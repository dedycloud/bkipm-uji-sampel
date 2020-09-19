       <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

         

           <div class="row">
           		<div class="col-lg-6">
           			<!-- alert -->
           			 <?= form_error('pengujian','<div class="alert alert-danger" role="alert">','</div>');?>

           			 <?=$this->session->flashdata('message');?>

           			<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#ujiModal">Add Pengujian</a>
           					
           		<table class="table table-hover">
				  	<thead>
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Nama Pengujian</th>
				      <th scope="col">Action</th>
				    </tr>
				    
				  </thead>

				  <tbody>
					<?php $i =1; ?>
				  	<?php foreach ($uji as $u):?>
				  	
					   <tr>
					      <th scope="row"><?= $i;?></th>
				     	   <td><?=$u['pengujian'];?></td>
					      <td>
					      		
					     		<a href="<?=base_url();?>menu/ubahpengujian/<?=$u['id_uji'];?>" class="badge badge-warning" data-toggle="modal" data-target="#editModal-<?=$u['id_uji'];?>">Edit</a> 
					     		<a href="<?= base_url();?>menu/hapuspengujian/<?= $u['id_uji'];?>" class="badge badge-danger glyphicon glyphicon-clearcle" onclick="return confirm('Apakah Anda yakin ingin menghapus <?= $u['pengujian'];?>?');">Delete</a>	
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
<div class="modal fade" id="ujiModal" tabindex="-1" role="dialog" aria-labelledby="ujiModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ptgsModalLabel">Data Pengujian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Menu/Pengujian');?>" method="post">
	      <div class="modal-body">

	        <div class="form-group">
			    <input type="text" class="form-control" id="pengujian" name="pengujian" placeholder="Masukan Nama Pengujian...">
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
<?php foreach ($uji as $u): $i++;?>
<div class="modal fade" id="editModal-<?=$u['id_uji'];?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Ubah Data Pengujian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Menu/ubahpengujian');?>" method="post">
	      <div class="modal-body">
	      	
	      	<div class="form-group">
			    <input type="hidden" class="form-control" id="id_uji" name="id_uji" value="<?= $u['id_uji'];?>" placeholder="">
			  </div>

	        <div class="form-group">
	        	<label class="control-label">Nama Pengujian :</label > 
			    <input type="text" class="form-control" id="pengujian" name="pengujian" value="<?= $u['pengujian'];?>" placeholder="Nama Pengujian...">
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
