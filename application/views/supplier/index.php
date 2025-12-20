<div class="container-fluid">
    <h1 class="mt-4"></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo site_url('supplier') ?>">Supplier</a></li>
        <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <a href="<?php echo site_url('supplier/add') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add New</a>
        </div>
        <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success mt-2" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="tabelsupplier" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIK</th>
                            <th>Nama Supplier</th>
                            <th>Perusahaan</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th>Info Bank</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                        foreach ($supplier as $s) {?>
                                <tr>
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $s->nik;?></td>
                                    <td><?php echo $s->name;?></td>
                                    <td><?php echo $s->perusahaan;?></td>
                                    <td><?php echo $s->telp;?></td>
                                    <td><?php echo $s->alamat;?></td>
                                    <td>
                                        <small>
                                            <b><?php echo $s->nama_bank;?></b><br>
                                            No: <?php echo $s->no_akun_bank;?><br>
                                            A/N: <?php echo $s->nama_akun_bank;?>
                                        </small>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('supplier/getedit/' . $s->id);?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="<?php echo base_url('supplier/delete/' . $s->id);?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus supplier ini?');"><i class="fas fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>