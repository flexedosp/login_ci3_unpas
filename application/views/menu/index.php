<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>





    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger alert-dismissible fade show" role="alert">', '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="#" class="btn btn-primary formModalTambah mb-3" data-toggle="modal" data-target="#formMenuModal"> Add New Menu</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($menu as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $m['menu']; ?></td>
                            <td>
                                <a href="<?= base_url('menu/edit/') . $m['id']; ?>" class="badge badge-success editMenuModal" data-toggle="modal" data-target="#formMenuModal" data-id="<?= $m['id']; ?>"> Edit </a>
                                <a href="<?= base_url('menu/hapusMenu/') . $m['id']; ?>" class="badge badge-danger tombol-hapus"> Delete </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->

<div class="modal fade" id="formMenuModal" tabindex="-1" aria-labelledby="formMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formMenuModalLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu'); ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- End of Moda -->