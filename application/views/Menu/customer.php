        <!-- Begin Page Content -->
        <div class="container-fluid">



          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

           <div class="row">
           		<div class="col-lg-6">

           			<!-- alert -->
           			 <?= form_error('nama_cs','<div class="alert alert-danger" role="alert">','</div>');?>

           			 <?=$this->session->flashdata('message');?>

           			<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#customerModal">Add Customer</a>
           					
           		<table class="table table-hover">
				  	<thead>
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Nama Customer</th>
				      <th scope="col">Action</th>
				    </tr>
				    
				  </thead>

				  <tbody>
					<?php $i =1; ?>
				  	<?php foreach ($data as $d):?>
				  	
					   <tr>
					      <th scope="row"><?= $i;?></th>
				     	 <td><?= $d['nama_cs'];?></td>
					      <td>
					     		<p><a href="<?= base_url();?>menu/ubahcustomer/<?= $d['nama_cs'];?>" class="badge badge-success">Edit</a> 
					     		<a href="<?= base_url();?>menu/hapuscustomer/<?= $d['id_cs'];?>" class="badge badge-danger" onclick="return confirm('yakin?')">Delete</a></p>	
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
   <div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="customerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="customerModalLabel">Data Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Menu/Customer');?>" method="post">
	      <div class="modal-body">
	        <div class="form-group">
			    <input type="text" class="form-control" id="nama_cs" name="nama_cs" placeholder="Nama Customer...">
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