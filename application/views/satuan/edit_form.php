<div class="container-fluid">
    <h1 class="mt-4">Edit Satuan</h1>
    <div class="card mb-4">
        <div class="card-body">
          <form action="<?php echo site_url('satuan/edit') ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $satuan->id; ?>" />

                <div class="form-group">
                    <label>Nama Satuan*</label>
                    <input class="form-control" type="text" name="name" value="<?php echo $satuan->name; ?>" required />
                </div>
                <div class="form-group">
                    <label>Deskripsi*</label>
                    <textarea class="form-control" name="deskripsi" required><?php echo $satuan->deskripsi; ?></textarea>
                </div> </br>
                <input class="btn btn-success" type="submit" value="Update" />
                <a href="<?php echo site_url('satuan') ?>" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>