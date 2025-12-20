<div class="container-fluid">
    <h1 class="mt-4"></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo site_url('satuan') ?>">Satuan</a></li>
        <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <a href="<?php echo site_url('satuan/add') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add New</a>
        </div>
        <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success mt-2" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="tabelsatuan" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No.</th>
                            <th>Nama Satuan</th>
                            <th>Deskripsi</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                        foreach ($satuan as $s) {?>
                                <tr>
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $s->name;?></td>
                                    <td><?php echo $s->deskripsi;?></td>
                                    <td>
                                        <a href="<?php echo base_url('satuan/getedit/' . $s->id);?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="<?php echo base_url('satuan/delete/' . $s->id);?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus satuan ini?');"><i class="fas fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>