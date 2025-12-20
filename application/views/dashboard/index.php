<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Statistik Data Master</li>
    </ol>

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <div class="small text-white-50">Total Barang</div>
                        <div class="display-6 fw-bold"><?php echo $total_barang; ?></div>
                    </div>
                    <i class="fas fa-box fa-2x text-white-50"></i>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between small">
                    <a class="text-white stretched-link" href="<?php echo site_url('barang'); ?>">View Details</a>
                    <div class="text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <div class="small text-white-50">Total Supplier</div>
                        <div class="display-6 fw-bold"><?php echo $total_supplier; ?></div>
                    </div>
                    <i class="fas fa-truck fa-2x text-white-50"></i>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between small">
                    <a class="text-white stretched-link" href="<?php echo site_url('supplier'); ?>">View Details</a>
                    <div class="text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <div class="small text-white-50">Total Customer</div>
                        <div class="display-6 fw-bold"><?php echo $total_customer; ?></div>
                    </div>
                    <i class="fas fa-users fa-2x text-white-50"></i>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between small">
                    <a class="text-white stretched-link" href="<?php echo site_url('customer'); ?>">View Details</a>
                    <div class="text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <div class="small text-white-50">Total User</div>
                        <div class="display-6 fw-bold"><?php echo $total_user; ?></div>
                    </div>
                    <i class="fas fa-user-shield fa-2x text-white-50"></i>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between small">
                    <a class="text-white stretched-link" href="<?php echo site_url('user'); ?>">View Details</a>
                    <div class="text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>