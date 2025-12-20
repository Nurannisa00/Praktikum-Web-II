<div class="container-fluid">
    <h1 class="mt-4"></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo site_url('barang') ?>">Barang</a></li>
        <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <a href="<?php echo site_url('barang/add') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add New</a>
        </div>
        <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success mt-2" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="tabelbarang" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Barcode</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Satuan</th>
                            <th>Stok</th>
                            <th>Harga Jual</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                        foreach ($barang as $b) {?>
                                <tr>
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $b->barcode;?></td>
                                    <td><?php echo $b->name;?></td>
                                    <td><?php echo $b->nama_kategori;?></td>
                                    <td><?php echo $b->nama_satuan;?></td>
                                    <td><?php echo $b->stok;?></td>
                                    <td><?php echo number_format($b->harga_jual, 0, ',', '.');?></td>
                                    <td>
                                        <a href="<?php echo base_url('barang/getedit/' . $b->id);?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="<?php echo base_url('barang/delete/' . $b->id);?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus barang ini?');"><i class="fas fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>