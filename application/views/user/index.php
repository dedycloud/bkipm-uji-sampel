        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

           <div class="row">
           		<div class="table-responsive ">

           			<div>
           			<label class="text-dark"><b>Keterangan</b></label> <br>
           			<label class="text-dark">1. Permintaan Pengujian Sampel dengan cara melakukan pengisian form yang telah disediakan dengan klik tombol</label> 
 <!--tombol tambah--><a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#ppsModal">Add Permintaan</a><br>
           			<label class="text-dark">2. Menunggu konfirmasi dari admin</label> 
           			<label class="text-success"><b>diterima </b></label>
           			<label >lihat pada kolom status, jika </label>
           			<label class="text-danger"><b>ditolak</b></label>
           			 <label>maka lakukan pengujian ditempat lain.</label> <br>
           			<label class="text-dark">3. setelah pengajuan <label class="text-success"><b>diterima </b></label> oleh admin, segera membawa sampel kekantor dan dilakukan pemeriksaan sampel.</label><br>

           			</div>

           			<br>
           			<br>

           		<div class="navbar-form" >
           			<?php echo form_open('menu/search')?>
           			<input type="text" id="no_pps" name="no_pps" placeholder="Search...">
           			<button type="submit" class="btn btn-primary btn-small">Cari</button>
           			<?php echo form_close()?>
           		</div> <br>
           					
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
					     		<a href="" class="badge badge-success">Edit</a> 
					     		<a href="<?= base_url();?>menu/hapuspps/<?= $m['id_pps'];?>" class="badge badge-danger float-right" onclick="return confirm('yakin?')">Delete</a>
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
   <div class="modal fade" id="ppsModal" tabindex="-1" role="dialog" aria-labelledby="ppsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ppsModalLabel">Form Permintaan Pengujian Sampel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url(). 'user/action_add'; ?>" method="post">
	      <div class="modal-body">
  	
  			<div class="form-group row">
  				<label class="control-label">Nama Customer*</label >
      		 <input type="text" class="form-control" id="nama_cs" name="nama_cs" placeholder="Nama Customer/Perusahaan....">
    		</div>

			 <div class="form-group row">
			 	<label class="control-label">Nama Personal*</label >
			 <input type="text" class="form-control" id="person" name="person" placeholder="Nama Personal...">
			 </div>

		    <div class="form-group row">
		    	<label class="control-label">No Telphone*</label >
		     <input type="text" class="form-control" id="phone" name="phone" placeholder="No Telp...">
		    </div>

		    <div class="form-group row">
		    	<label class="control-label">Alamat*</label >
		     <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Customer...">
		    </div>

		     <div class="form-group row">
		    	<label class="control-label">Jenis Sampel*</label > 
		    	<select class="form-control" name="sampel">
		    	<option value="">--Pilih--</option>
		    	<?php foreach($data as $d ) {?>
		    	<option value="<?= $d['id_sampel'];?>"><?= $d['jns_sampel']?></option>
		    	<?php } ?> 
		    	</select>
		    
		    </div>

		    <div class="form-group row">
		    	<label class="control-label">Jumlah*</label >
		    <input type="text" class="form-control" id="jum_sampel" name="jum_sampel" placeholder="Masukan Jumlah Sampel dengan Angka...">
		    </div>

		    <div class="form-group row">
		    	<label class="control-label">Deskripsi*</label >
		     <input type="text" class="form-control" id="desk_sampel" name="desk_sampel" placeholder="Deskripsi...">
		    </div>

		    <div class="form-group row">
		    	<label class="control-label">Bentuk*</label >
		     <input type="text" class="form-control" id="bentuk" name="bentuk" placeholder="Masukan Beku/Cair/dll...">
		    </div>

		    <div class="form-group row">
		    	<label class="control-label">Berat/isi*</label >
		     <input type="text" class="form-control" id="berat_isi" name="berat_isi" placeholder="Berat/Isi...">
		    </div>

		    <div class="form-group row">
		    	<label class="control-label">Wadah*</label >
		     <input type="text" class="form-control" id="wadah" name="wadah" placeholder="Masukan Kantong Plastik/Kotak/dll...">
		    </div>

		    <div class="form-group row">
		     <label class="control-label">Tanggal*</label >
		     <input type="date" class="form-control" id="tgl_permo" name="tgl_permo" placeholder="Tgl Permohonan...">
		    </div>

		    <label class="control-label">Pilih pengujian </br> Kualitas Air  :</label >
		    <div class="form-group row"> 
		    	
		    	<?php foreach ($pengujian as $m):?>

		     <p><input type="checkbox"  name="check_list[]" alt="checkbox" value="<?= $m['id_uji'];?>"><?= $m['pengujian'];?>
		 <!--     <p><input type="checkbox"  name="check_list[]" alt="checkbox" value="temperatur">Temperatur
		     <p><input type="checkbox"  name="check_list[]" alt="checkbox" value="vps ">Derajat keasaman(pH)
		     <p><input type="checkbox"  name="check_list[]" alt="checkbox" value="vps">Nitrit(NO)
		     <p><input type="checkbox"  name="check_list[]" alt="checkbox" value="vps">Nitrat(NO)
		     <p><input type="checkbox"  name="check_list[]" alt="checkbox" value="vps">Ammonia (NH)
		     <p><input type="checkbox"  name="check_list[]" alt="checkbox" value="vps">Sulfit(SO)
		     <p><input type="checkbox"  name="check_list[]" alt="checkbox" value="vps">Sulfat(SO) -->
<!-- 		     <p><input type="checkbox"  name="check_list[]" alt="checkbox" value="vps">Kesadahan
 -->		     	   <?php endforeach;?>
		  	</div>
		  
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Add</button>
	      </div>
      </form>
    </div>
  </div>
</div>