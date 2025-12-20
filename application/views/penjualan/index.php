<div class="container-fluid">
    <h1 class="mt-4">Data Penjualan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo site_url('menu') ?>">Dashboard</a></li>
        <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i> Daftar Transaksi
            <a href="<?php echo site_url('penjualan/add') ?>" class="btn btn-primary btn-sm float-end">
                <i class="fas fa-plus"></i> Tambah Transaksi
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Invoice</th>
                            <th>Tanggal</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Kasir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Gunakan variabel $start dari controller agar nomor urut berlanjut
                            $no = $start + 1;
                            if (! empty($penjualan)):
                            foreach ($penjualan as $p): ?>
		                                <tr>
		                                    <td><?php echo $no++; ?></td>
		                                    <td><strong><?php echo $p['invoice']; ?></strong></td>
		                                    <td><?php echo date('d-m-Y', strtotime($p['tanggal'])); ?></td>
		                                    <td><?php echo $p['nama_customer'] ?? 'Umum'; ?></td>
		                                    <td>Rp		                                          	                                           <?php echo number_format($p['total'], 0, ',', '.'); ?></td>
		                                    <td><?php echo $p['nama_kasir'] ?? 'Admin'; ?></td>
		                                </tr>
		                            <?php endforeach;
                                    else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Data tidak ditemukan</td>
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