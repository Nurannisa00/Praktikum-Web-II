<div class="container-fluid">
    <h1 class="mt-4">Edit Supplier</h1>
    <div class="card mb-4">
        <div class="card-body">
            <form action="<?php echo site_url('supplier/edit')?>" method="post">
                <input type="hidden" name="id" value="<?php echo $supplier->id?>" />
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3"><label>NIK*</label><input class="form-control" name="nik" value="<?php echo $supplier->nik?>" required /></div>
                        <div class="form-group mb-3"><label>Nama Supplier*</label><input class="form-control" name="name" value="<?php echo $supplier->name?>" required /></div>
                        <div class="form-group mb-3"><label>Perusahaan</label><input class="form-control" name="perusahaan" value="<?php echo $supplier->perusahaan?>" /></div>
                        <div class="form-group mb-3"><label>Telepon</label><input class="form-control" name="telp" value="<?php echo $supplier->telp?>" /></div>
                        <div class="form-group mb-3"><label>Email</label><input class="form-control" type="email" name="email" value="<?php echo $supplier->email?>" /></div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3"><label>Alamat</label><textarea class="form-control" name="alamat"><?php echo $supplier->alamat?></textarea></div>
                        <div class="form-group mb-3"><label>Nama Bank</label><input class="form-control" name="nama_bank" value="<?php echo $supplier->nama_bank?>" /></div>
                        <div class="form-group mb-3"><label>No Akun Bank</label><input class="form-control" name="no_akun_bank" value="<?php echo $supplier->no_akun_bank?>" /></div>
                        <div class="form-group mb-3"><label>Nama Akun Bank</label><input class="form-control" name="nama_akun_bank" value="<?php echo $supplier->nama_akun_bank?>" /></div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="<?php echo site_url('supplier')?>" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>