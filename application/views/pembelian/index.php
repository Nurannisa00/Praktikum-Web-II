<div class="container-fluid">
    <h1 class="mt-4">Data Pembelian</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo site_url('menu') ?>">Dashboard</a></li>
        <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-cart-arrow-down me-1"></i> Riwayat Pembelian Stok
            <a href="<?php echo site_url('pembelian/add') ?>" class="btn btn-success btn-sm float-end">
                <i class="fas fa-plus"></i> Tambah Pembelian
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>No. Referensi</th>
                            <th>Tanggal</th>
                            <th>Supplier</th>
                            <th>Total Bayar</th>
                            <th>Petugas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = $start + 1;
                            if (! empty($pembelian)):
                            foreach ($pembelian as $p): ?>
	                                <tr>
	                                    <td><?php echo $no++; ?></td>
	                                    <td><strong><?php echo $p['no_ref'] ?? $p['invoice']; ?></strong></td>
	                                    <td><?php echo date('d-m-Y', strtotime($p['tanggal'])); ?></td>
	                                    <td><?php echo $p['nama_supplier'] ?? 'Supplier Umum'; ?></td>
	                                    <td>Rp	                                           <?php echo number_format($p['total'], 0, ',', '.'); ?></td>
	                                    <td><?php echo $p['nama_petugas'] ?? 'Admin'; ?></td>
	                                </tr>
	                            <?php endforeach;
                                else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data pembelian</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                <?php echo $pagination; ?>
            </div>
        </div>
    </div>
</div>