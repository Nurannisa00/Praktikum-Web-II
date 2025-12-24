<div class="container-fluid">
    <h1 class="mt-4"><?php echo $title; ?></h1>
    <div class="card mb-4 col-md-8">
        <div class="card-body">
         <form action="<?php echo site_url('barang/save') ?>" method="post">
    <div class="mb-3">
        <label>Barkode <code>*</code></label>
        <input name="id" value="<?php echo $barang->id; ?>" type="hidden" required />
        <input class="form-control" name="barcode" value="<?php echo $barang->barcode; ?>" type="text" placeholder="Barkode">
    </div>
    <div class="mb-3">
        <label>Nama Barang <code>*</code></label>
        <input class="form-control" name="name" value="<?php echo $barang->name; ?>" type="text" placeholder="Nama Barang">
    </div>
    <div class="mb-3">
        <label>Harga Beli <code>*</code></label>
        <input class="form-control" name="harga_beli" value="<?php echo $barang->harga_beli; ?>" type="text" placeholder="Harga Beli">
    </div>
    <div class="mb-3">
        <label>Harga Jual <code>*</code></label>
        <input class="form-control" name="harga_jual" value="<?php echo $barang->harga_jual; ?>" type="text" placeholder="Harga Jual">
    </div>
    <div class="mb-3">
        <label>Stok</label>
        <input class="form-control" name="stok" value="<?php echo $barang->stok; ?>" type="text" placeholder="Stok" disabled>
    </div>

    <div class="mb-3">
        <label>Kategori <code>*</code></label>
        <select name="kategori" class="form-control" required>
            <?php foreach ($kategori as $k): ?>
                <?php if ($barang->kategori_id == $k['id']): ?>
                    <option value="<?php echo $k['id']; ?>" selected><?php echo $k['name']; ?></option>
                <?php else: ?>
                    <option value="<?php echo $k['id']; ?>"><?php echo $k['name']; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Satuan <code>*</code></label>
        <select name="satuan" class="form-control" required>
            <?php foreach ($satuan as $s): ?>
                <?php if ($barang->satuan_id == $s['id']): ?>
                    <option value="<?php echo $s['id']; ?>" selected><?php echo $s['name']; ?></option>
                <?php else: ?>
                    <option value="<?php echo $s['id']; ?>"><?php echo $s['name']; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Supplier <code>*</code></label>
        <select name="supplier" class="form-control" required>
            <?php foreach ($supplier as $sp): ?>
                <?php if ($barang->supplier_id == $sp['id']): ?>
                    <option value="<?php echo $sp['id']; ?>" selected><?php echo $sp['name']; ?></option>
                <?php else: ?>
                    <option value="<?php echo $sp['id']; ?>"><?php echo $sp['name']; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>

    <button class="btn btn-warning" type="submit"><i class="fas fa-plus"></i> Update</button>
</form>
        </div>
    </div>
</div>