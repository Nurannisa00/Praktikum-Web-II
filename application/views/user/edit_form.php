<div class="container-fluid px-4">
    <h1 class="mt-4"><?php echo $title ?></h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo site_url('user') ?>">User</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>

    <div class="card mb-4">
        <div class="card-body">

            <form action="<?php echo site_url('user/edit') ?>" method="post">

                <input type="hidden" name="id" value="<?php echo $user->id ?>">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Username</label>
                        <input class="form-control" name="username" value="<?php echo $user->username ?>" required>
                    </div>

                    <div class="col-md-6">
                        <label>Full Name</label>
                        <input class="form-control" name="full_name" value="<?php echo $user->full_name ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email" value="<?php echo $user->email ?>" required>
                    </div>

                    <div class="col-md-6">
                        <label>Phone</label>
                        <input class="form-control" name="phone" value="<?php echo $user->phone ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Role</label>
                        <select class="form-control" name="role">
                            <option                                                                                                                                                                                <?php echo $user->role == 'PEMILIK' ? 'selected' : '' ?>>PEMILIK</option>
                            <option                                                                                                                                                                                <?php echo $user->role == 'ADMIN' ? 'selected' : '' ?>>ADMIN</option>
                            <option                                                                                                                                                                                <?php echo $user->role == 'KASIR' ? 'selected' : '' ?>>KASIR</option>
                        </select>
                    </div>
                </div>

              <button class="btn btn-warning">
    <i class="fas fa-plus"></i> UPDATE
</button>


            </form>

        </div>
    </div>
</div>
