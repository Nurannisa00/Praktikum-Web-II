<div class="container-fluid">
    <h1 class="mt-4">Edit Customer</h1>
    <div class="card mb-4">
        <div class="card-body">
            <form action="<?php echo site_url('customer/edit')?>" method="post">
                <input type="hidden" name="id" value="<?php echo $customer->id?>" />
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3"><label>NIK*</label><input class="form-control" name="nik" value="<?php echo $customer->nik?>" required /></div>
                        <div class="form-group mb-3"><label>Nama Lengkap*</label><input class="form-control" name="name" value="<?php echo $customer->name?>" required /></div>
                        <div class="form-group mb-3"><label>Telepon</label><input class="form-control" name="telp" value="<?php echo $customer->telp?>" /></div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3"><label>Email</label><input class="form-control" type="email" name="email" value="<?php echo $customer->email?>" /></div>
                        <div class="form-group mb-3"><label>Alamat</label><textarea class="form-control" name="alamat"><?php echo $customer->alamat?></textarea></div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="<?php echo site_url('customer')?>" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>