<div class="container-fluid">
    <h1 class="mt-4"></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo site_url('customer') ?>">Customer</a></li>
        <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <a href="<?php echo site_url('customer/add') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add New</a>
        </div>
        <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success mt-2" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="tabelcustomer" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIK</th>
                            <th>Nama Customer</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                        foreach ($customer as $c) {?>
                                <tr>
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $c->nik;?></td>
                                    <td><?php echo $c->name;?></td>
                                    <td><?php echo $c->telp;?></td>
                                    <td><?php echo $c->email;?></td>
                                    <td><?php echo $c->alamat;?></td>
                                    <td>
                                        <a href="<?php echo base_url('customer/getedit/' . $c->id);?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="<?php echo base_url('customer/delete/' . $c->id);?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data customer ini?');"><i class="fas fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>