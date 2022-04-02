<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <form action="<?= base_url('user/changepassword'); ?>" method="post">
                <div class="form-group row">
                    <div class="col-sm-5">

                        <input type="password" class="form-control" id="currentPassword" name="currentPassword" placeholder="Current Password">
                    </div>
                    <div class="col-lg-3 pl-0 d-flex align-items-center">
                        <a class="btn btn-link" id="showCurrentPassword" href="#" role="button"><i class="fas fa-fw fa-eye"></i></a>
                    </div>
                </div>
                <div class="form-group">
                    <label for="newPassword">New Password</label>
                    <input type="password" class="form-control" id="newPassword" name="newPassword">
                </div>
                <div class="form-group">
                    <label for="newPassword2">Confirm New Password</label>
                    <input type="password" class="form-control" id="newPassword2" name="newPassword2">
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