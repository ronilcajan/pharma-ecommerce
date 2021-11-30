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
            <a href="javascript:void(0)">Category</a>
        </li>
    </ul>
    <div class="ml-md-auto py-2 py-md-0">
        <a href="#add" data-toggle="modal" class="btn btn-secondary btn-round text-light">Add Category</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Product Categories</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="categoryTable" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Category</th>
                                <th>Details</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Category</th>
                                <th>Details</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($category as $row) : ?>
                                <tr>
                                    <td><a href="<?= site_url('admin/category/') . $row->id ?>"><?= $row->id ?></a></td>
                                    <td><?= htmlspecialchars($row->name, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($row->details, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td>
                                        <div class="form-button-action">
                                            <a class="btn btn-link btn-primary p-1" type="button" onclick="editCat(this)" href="#edit" data-toggle="modal" title="Edit Category" data-id="<?= $row->id ?>" data-cname="<?= $row->name ?>" data-desc="<?= $row->details ?> ">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a class="btn btn-link btn-danger p-1" type="button" href="<?= site_url("category/delete/" . $row->id); ?>" data-toggle="tooltip" onclick="return confirm('Are you sure you want to delete this category?');" data-original-title="Remove">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('category/modal') ?>