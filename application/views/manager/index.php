        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

           <div class="row">
           		<div class="table-responsive ">


           		<div class="navbar-form" >
           			<?php echo form_open('menu/search')?>
           			<input type="text" id="no_pps" name="no_pps" placeholder="Search...">
           			<button type="submit" class="btn btn-success btn-small">Cari</button>
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
					     		<a href="<?= base_url();?>menu/hapuspps/<?= $m['id'];?>" class="badge badge-danger float-right" onclick="return confirm('yakin?')">Delete</a>
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



      