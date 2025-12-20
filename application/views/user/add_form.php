<div class="container-fluid">
    <h1 class="mt-4"></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo site_url('user') ?>">User</a></li>
        <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <form action="<?php echo site_url('user/save') ?>" method="post">

                <div class="mb-3">
                    <label for="NIK">NIK <code>*</code></label>
                    <input type="text" name="nik" placeholder="NIK" required class="form-control">
                </div>

                <div class="mb-3">
                    <label for="USERNAME">USERNAME <code>*</code></label>
                    <input type="text" name="username" placeholder="USERNAME" required
                           class="form-control                                                                                                                                           <?php echo form_error('username') ? 'is-invalid' : '' ?>">
                    <?php echo form_error('username') ?>
                </div>

                <div class="mb-3">
                    <label for="FULL_NAME">FULL NAME <code>*</code></label>
                    <input type="text" name="full_name" placeholder="FULL NAME" required class="form-control">
                </div>

                <div class="mb-3">
                    <label for="PHONE">PHONE <code>*</code></label>
                    <input type="number" name="phone" placeholder="PHONE" required class="form-control">
                </div>

                <div class="mb-3">
                    <label for="EMAIL">EMAIL <code>*</code></label>
                    <input type="text" name="email" placeholder="EMAIL" required class="form-control">
                </div>

                <div class="mb-3">
                    <label for="ALAMAT">ALAMAT</label>
                    <input type="text" name="address" placeholder="ADDRESS" required class="form-control">
                </div>

                <div class="mb-3">
                    <label for="PASSWORD" class="control-label col-md-3 col-xs-12">PASSWORD</label>
                    <input type="password" name="password" id="password" placeholder="PASSWORD" autocomplete="off" required class="form-control col-md-4 col-xs-12">
                </div>

                <div class="mb-3">
                    <label for="Role">Role <code>*</code></label>
                    <select id="role" name="role" required class="form-control">
                        <option selected="selected" disable>PILIH</option>
                        <option value="PEMILIK">PEMILIK</option>
                        <option value="ADMIN">ADMIN</option>
                        <option value="KASIR">KASIR</option>
                    </select>
                </div>

                <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i> Save</button>
            </form>
        </div>
    </div>
    <div style="height: 100vh"></div>
</div>