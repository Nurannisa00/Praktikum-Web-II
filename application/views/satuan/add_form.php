<div class="container-fluid">
    <h1 class="mt-4">Tambah Satuan</h1>
    <div class="card mb-4">
        <div class="card-body">
            <form action="<?php echo site_url('satuan/save') ?>" method="post">
                <div class="form-group">
                    <label>Nama Satuan*</label>
                    <input class="form-control" type="text" name="name" placeholder="Nama satuan" required />
                </div>
                <div class="form-group">
                    <label>Deskripsi*</label>
                    <textarea class="form-control" name="deskripsi" placeholder="Deskripsi..." required></textarea>
                </div> </br>
                <input class="btn btn-success" type="submit" value="save" />
                <a href="<?php echo site_url('satuan') ?>" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>