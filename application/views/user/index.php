<div class="container-fluid">
    <h1 class="mt-4"></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo site_url('user') ?>">User</a></li>
        <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <a href="<?php echo site_url('user/add') ?>"><i class="fas fa-plus"></i> Add New</a>
        </div>
        <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="tabelkelas" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($user as $user) {
                                echo "<tr>";
                                echo "<td>$no</td>";
                                echo "<td>$user->username</td>";
                                echo "<td>$user->email</td>";
                                echo "<td>$user->phone</td>";
                                echo "<td>$user->role</td>";
                                echo "<td>";
                                echo "<div class=''>";

                                // Tombol Edit
                                echo "<a href='" . base_url('user/getedit/' . $user->id) . "' class='btn btn-sm btn-info'><i class='fas fa-edit'></i> Edit</a> ";

                                // Tombol Hapus
                                echo "<a href='" . base_url('user/delete/' . $user->id) . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Ingin menghapus data user ini?\");'><i class='fas fa-trash'></i> Hapus</a>";

                                echo "</div>";
                                echo "</td>";
                                echo "</tr>";
                                $no++;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div style="height: 100vh"></div>
</div>