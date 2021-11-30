<div class="page-header">
    <h4 class="page-title"><?= $title ?></h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <a href="#">
                <i class="fas fa-cogs"></i>
            </a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="javascript:void(0)">Admin</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="javascript:void(0)">Products</a>
        </li>
    </ul>
    <div class="ml-md-auto py-2 py-md-0">
        <a href="#add" data-toggle="modal" class="btn btn-secondary btn-round text-light">Add Products</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Products</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="productTable" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Stocks</th>
                                <th>Unit</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Stocks</th>
                                <th>Unit</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $no = 1;
                            foreach ($products as $row) : ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><img width="50" src="<?= site_url('assets/uploads/') . $row->image ?>" alt="Image" class="img-fluid"></td>
                                    <td><?= htmlspecialchars($row->name, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($row->description, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($row->stocks, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($row->unit, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td>P<?= htmlspecialchars(!empty($row->price_2) ? number_format($row->price, 2) :  number_format($row->price_2, 2), ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= $row->status == 'New' ? '<span class="badge badge-primary">New</span>' : '<span class="badge badge-danger">Sale</span>' ?></td>
                                    <td>
                                        <div class="form-button-action">
                                            <a class="btn btn-link btn-primary p-1" type="button" onclick="editProduct(this)" href="#edit" data-toggle="modal" title="Edit Products" data-id="<?= $row->id ?>">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a class="btn btn-link btn-danger p-1" type="button" href="<?= site_url("products/delete/" . $row->id); ?>" data-toggle="tooltip" onclick="return confirm('Are you sure you want to delete this products?');" data-original-title="Remove">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php $no++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('products/modal') ?>