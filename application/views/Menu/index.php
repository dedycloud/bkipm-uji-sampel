        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

           <div class="row">
           		<div class="table-responsive ">

           			 <?= form_error('nama_cs','<div class="alert alert-danger" role="alert">','</div>');?>

           			 <?=$this->session->flashdata('message');?>
           			
           			<a href="" class="btn btn-primary mb-4" data-toggle="modal" data-target="#ppsModal">Add Permintaan</a>

           			<div class="navbar-form " >
           			<?php echo form_open('menu/search')?>
           			<input type="text" id="nama_cs" name="nama_cs" placeholder="Nama Customer...">
           			<button type="submit" class="btn btn-success">Cari</button>
           			<?php echo form_close()?>
           		</div><br>

           					
           		<table class="table table-hover">
           			

				  	<thead>
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">No PPS</th>
				      <th scope="col">Nama CS</th>
				      <th scope="col">Person</th>
				      <th scope="col">Phone</th>
				      <th scope="col">Alamat</th>
				      <th scope="col">Jenis Sampel</th>
				      <th scope="col">jumlah sampel</th>
				      <th scope="col">Desk_sampel</th>
				      <th scope="col">Bentuk</th>
				      <th scope="col">Berat</th>
				      <th scope="col">Wadah</th>
				      <th scope="col">Tgl Permohonan</th>
				      <th scope="col">pengujian</th>
				      <th scope="col">Status</th>
				      <th scope="col">Petugas</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i =1; ?>
				  	<?php foreach ($menu as $m):?>
				    <tr>
				      <th scope="row"><?= $i;?></th>
				      <td><?= $m['no_pps'];?></td>
				      <td><?= $m['nama_cs'];?></td>
				      <td><?= $m['person'];?></td>
				      <td><?= $m['phone'];?></td>
				      <td><?= $m['alamat'];?></td>
				      <td><?= $m['jns_sampel'];?></td>
				      <td><?= $m['jum_sampel'];?></td>
				   	  <td><?= $m['desk_sampel'];?></td>
				      <td><?= $m['bentuk'];?></td>
				      <td><?= $m['berat_isi'];?></td>
			    	  <td><?= $m['wadah'];?></td>
				      <td><?= $m['tgl_permo'];?></td>
				      <td><?= $m['pengujian'];?></td>
				      <td><?= $m['status'];?></td>
				      <td><?= $m['nama_ptgs'];?></td>
				      <td>
					     		<a href="<?=base_url();?>menu/ubahpps/<?=$m['id_pps'];?>" class="badge badge-warning" data-toggle="modal" data-target= "#editModal-<?=$m['id_pps'];?>">Edit</a> 
					     		<a href="<?= base_url();?>menu/hapuspps/<?= $m['id_pps'];?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin ingin menghapus <?= $m['nama_cs'];?>')">Delete</a>
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



      <!-- tambah Modal -->
   <div class="modal fade" id="ppsModal" tabindex="-1" role="dialog" aria-labelledby="ppsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
     
        	<h5 class="modal-title text-dark" id="ppsModalLabel"><strong>FORM PERMINTAAN PENGUJIAN SAMPEL</strong></h5>
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Menu');?>" method="post">
	      <div class="modal-body">
	        <div class="form-group row">
	        	<label class="text-dark"><b>Nomor PPS*</b></label >
       		<input type="text" class="form-control" id="no_pps" name="no_pps" placeholder="Masukan Nomor PPS...">
  		  </div>
  	
  			<div class="form-group row">
  				<label class="text-dark"><b>Nama Customer*</b></label >
      		 <input type="text" class="form-control" id="nama_cs" name="nama_cs" placeholder="Nama Customer/Perusahaan....">
    		</div>

			 <div class="form-group row">
			 	<label class="text-dark"><b>Nama Personal*</b></label >
			 <input type="text" class="form-control" id="person" name="person" placeholder="Nama Personal...">
			 </div>

		    <div class="form-group row">
		    	<label class="text-dark"><b>No Telphone*</b></label >
		     <input type="text" class="form-control" id="phone" name="phone" placeholder="No Telp...">
		    </div>

		    <div class="form-group row">
		    	<label class="text-dark"><b>Alamat*</b></label >
		     <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Customer...">
		    </div>

		     <div class="form-group row">
		    	<label class="text-dark"><b>Jenis Sampel*</b></label > 
		    	<select class="form-control" name="jns_sampel" >
		    	<option value="">--Pilih--</option>
		    	<?php foreach($data as $d ) {?>
		    	<option value="<?= $d['id_sampel'];?>"><?= $d['jns_sampel'];?></option>
		    	<?php } ?> 
		    	</select>
		    
		    </div>

		    <div class="form-group row">
		    	<label class="text-dark"><b>Jumlah*</b></label >
		    <input type="text" class="form-control" id="jum_sampel" name="jum_sampel" placeholder="Masukan Jumlah Sampel dengan Angka...">
		    </div>

		    <div class="form-group row">
		    	<label class="text-dark"><b>Deskripsi*</b></label >
		     <input type="text" class="form-control" id="desk_sampel" name="desk_sampel" placeholder="Deskripsi...">
		    </div>

		    <div class="form-group row">
		    	<label class="text-dark"><b>Bentuk*</b></label >
		     <input type="text" class="form-control" id="bentuk" name="bentuk" placeholder="Masukan Beku/Cair/dll...">
		    </div>

		    <div class="form-group row">
		    	<label class="text-dark"><b>Berat/isi*</b></label >
		     <input type="text" class="form-control" id="berat_isi" name="berat_isi" placeholder="Berat/Isi...">
		    </div>

		    <div class="form-group row">
		    	<label class="text-dark"><b>Wadah*</b></label >
		     <input type="text" class="form-control" id="wadah" name="wadah" placeholder="Masukan Kantong Plastik/Kotak/dll...">
		    </div>

		    <div class="form-group row">
		     <label class="text-dark"><b>Tanggal*</b></label >
		     <input type="date" class="form-control" id="tgl_permo" name="tgl_permo" placeholder="Tgl Permohonan...">
		    </div>

		   
		    <div class="form-check" > 
		    	 <label class="text-dark"><b>Pilih pengujian*</b></label >
		    	 
		    	 <?php foreach($uji as $u ) {?>
		     	<p><input type="checkbox"  name="pengujian[]" id="pengujian" value="<?= $u['id_uji'];?>" > <?= $u['pengujian'];?>
		    	<?php } ?>
		    
		    </div>

		    <div class="form-group row">
		    <label class="text-dark"><b>Status*</b></label > 
		 	<select class="form-control" name="status">
		 	<option value="">--Pilih--</option>
		 	<option value="Diterima">Diterima</option>
		 	<option value="Pending">Pending</option>
		 	<option value="Ditolak">Ditolak</option>
		 	</select>
		    </div>

		    <div class="form-group row">
		    	<label class="text-dark"><b>Petugas*</b></label > 
		    	<select class="form-control" name="nama_ptgs">
		    	<option value="">--Pilih--</option>
		    	<?php foreach($petugas as $p ) {?>
		    	<option value="<?= $p['id_ptgs'];?>"><?= $p['nama_ptgs'];?></option>
		    	<?php } ?> 
		    	</select>
		    
		    </div>
		  
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Add</button>
	      </div>
      </form>
    </div>
  </div>
</div>


      <!--Edit Modal -->
      <?php $i =1; ?>
	<?php foreach ($menu as $m):?>
   <div class="modal fade" id="editModal-<?=$m['id_pps'];?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
     
        	<h5 class="modal-title text-dark" id="editModalLabel"><strong>UBAH DATA PERMINTAAN PENGUJIAN SAMPEL</strong></h5>
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Menu/ubahpps');?>" method="post">
	      <div class="modal-body">
	        <div class="form-group row">

	        	<div class="form-group">
			    <input type="hidden" class="form-control" id="id_pps" name="id_pps" value="<?= $m['id_pps'];?>" placeholder="">
			  </div>

	        <label class="text-dark"><b>Nomor PPS*</b></label >
       		<input type="text" class="form-control" id="no_pps" name="no_pps" value="<?= $m['no_pps'];?>" placeholder="Masukan Nomor PPS...">
  		  </div>
  	
  			<div class="form-group row">
  				<label class="text-dark"><b>Nama Customer*</b></label >
      		 <input type="text" class="form-control" id="nama_cs" name="nama_cs" value="<?= $m['nama_cs'];?>" placeholder="Nama Customer/Perusahaan....">
    		</div>

			 <div class="form-group row">
			 	<label class="text-dark"><b>Nama Personal*</b></label >
			 <input type="text" class="form-control" id="person" name="person" value="<?= $m['person'];?>" placeholder="Nama Personal...">
			 </div>

		    <div class="form-group row">
		    	<label class="text-dark"><b>No Telphone*</b></label >
		     <input type="text" class="form-control" id="phone" name="phone" value="<?= $m['phone'];?>" placeholder="No Telp...">
		    </div>

		    <div class="form-group row">
		    	<label class="text-dark"><b>Alamat*</b></label >
		     <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $m['alamat'];?>" placeholder="Alamat Customer...">
		    </div>

		     <div class="form-group row">
		    	<label class="text-dark"><b>Jenis Sampel*</b></label > 
		    	<select class="form-control" name="jns_sampel" id="jns_sampel">
		    	<option value="">--Pilih--</option>
		    	<?php foreach($data as $d ) {?>
		    	<option value="<?= $d['id_sampel'];?>"><?= $d['jns_sampel']?></option>
		    	<?php } ?> 
		    	</select>
		    
		    </div>

		    <div class="form-group row">
		    	<label class="text-dark"><b>Jumlah*</b></label >
		    <input type="text" class="form-control" id="jum_sampel" name="jum_sampel" value="<?= $m['jum_sampel'];?>" placeholder="Masukan Jumlah Sampel dengan Angka...">
		    </div>

		    <div class="form-group row">
		    	<label class="text-dark"><b>Deskripsi*</b></label >
		     <input type="text" class="form-control" id="desk_sampel" name="desk_sampel" value="<?= $m['desk_sampel'];?>" placeholder="Deskripsi...">
		    </div>

		    <div class="form-group row">
		    	<label class="text-dark"><b>Bentuk*</b></label >
		     <input type="text" class="form-control" id="bentuk" name="bentuk" value="<?= $m['bentuk'];?>" placeholder="Masukan Beku/Cair/dll...">
		    </div>

		    <div class="form-group row">
		    	<label class="text-dark"><b>Berat/isi*</b></label >
		     <input type="text" class="form-control" id="berat_isi" name="berat_isi" value="<?= $m['berat_isi'];?>" placeholder="Berat/Isi...">
		    </div>

		    <div class="form-group row">
		    	<label class="text-dark"><b>Wadah*</b></label >
		     <input type="text" class="form-control" id="wadah" name="wadah" value="<?= $m['wadah'];?>" placeholder="Masukan Kantong Plastik/Kotak/dll...">
		    </div>

		    <div class="form-group row">
		     <label class="text-dark"><b>Tanggal*</b></label >
		     <input type="date" class="form-control" id="tgl_permo" name="tgl_permo" value="<?= $m['tgl_permo'];?>" placeholder="Tgl Permohonan...">
		    </div>

		   
		    <div class="form-group row"> 
		    	 <label class="text-dark"><b>Pilih pengujian*</b></label >
		    	 
		    	 <?php foreach($uji as $u ) {?>
		     <p><input type="checkbox"  name="pengujian[]" id="pengujian" value="<?= $u['id_uji'];?>" > <?= $u['pengujian'];?><br>
		    	<?php } ?> 
		   
		    
		    </div>

		    <div class="form-group row">
		    <label class="text-dark"><b>Status*</b></label > 
		 	<select class="form-control" name="status">
		 	<option value="">--Pilih--</option>
		 	<option value="Diterima">Diterima</option>
		 	<option value="Pending">Pending</option>
		 	<option value="Ditolak">Ditolak</option>
		 	</select>
		    </div>

		    <div class="form-group row">
		    	<label class="text-dark"><b>Petugas*</b></label > 
		    	<select class="form-control" name="nama_ptgs" id="nama_ptgs ">
		    	<option value="">--Pilih--</option>
		    	<?php foreach($petugas as $p ) {?>
		    	<option value="<?= $p['id_ptgs'];?>"><?= $p['nama_ptgs']?></option>
		    	<?php } ?> 
		    	</select>
		    
		    </div>
		  
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Ubah</button>
	      </div>
      </form>
    </div>
  </div>
</div>

   <?php endforeach;?>