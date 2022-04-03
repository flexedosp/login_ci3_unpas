<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-10">
            <?=
            $this->session->flashdata('message');
            ?>
            <form action="<?= base_url('user/changepassword'); ?>" method="post">
                <div class="form-group row">
                    <div class="col-sm-7">
                        <input type="password" class="form-control" id="currentPassword" name="currentPassword" placeholder="Current Password">
                        <?= form_error('currentPassword', '<small class="text-danger pl-2"> ', '</small>'); ?>
                    </div>
                    <div class="col-lg-3 pl-0 d-flex align-items-start">
                        <a class="btn btn-link" id="showCurrentPassword" href="#" role="button"><i class="fas fa-fw fa-eye"></i></a>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-7">
                        <input type="password" class="form-control" id="newPassword1" name="newPassword1" placeholder="New Password">
                        <?= form_error('newPassword1', '<small class="text-danger pl-2"> ', '</small>'); ?>
                    </div>
                    <div class="col-lg-3 pl-0 d-flex align-items-start">
                        <a class="btn btn-link" id="showNewPassword1" href="#" role="button"><i class="fas fa-fw fa-eye"></i></a>
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-sm-7">
                        <input type="password" class="form-control" id="newPassword2" name="newPassword2" placeholder="Confirm New Password">
                        <?= form_error('newPassword2', '<small class="text-danger pl-2"> ', '</small>'); ?>
                    </div>
                    <div class="col-lg-3 pl-0 d-flex align-items-start">
                        <a class="btn btn-link" id="showNewPassword2" href="#" role="button"><i class="fas fa-fw fa-eye"></i></a>
                    </div>

                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->