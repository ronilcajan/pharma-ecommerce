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
            <a href="javascript:void(0)">Orders</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="javascript:void(0)">D000<?= $id ?></a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Orders</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="orderTable" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Prescription</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Prescription</th>
                                <th>Total</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($orders as $row) : ?>
                                <tr>

                                    <td><img width="50" src="<?= site_url('assets/uploads/') . $row->image ?>" alt="Image" class="img-fluid"></td>
                                    <td><?= $row->name ?></td>
                                    <td>P <?= $row->price_2 != '0' ? number_format($row->price_2, 2) : number_format($row->price, 2) ?></td>
                                    <td><?= $row->quantity ?></td>
                                    <td>
                                        <?php if (!empty($row->prescription_file)) : ?>
                                            <a href="<?= site_url('assets/uploads/') . $row->prescription_file ?>" target="_blank">view</a>
                                        <?php endif ?>
                                    </td>
                                    <td>P <?= $row->price_2 != '0' ? number_format($row->price_2 * $row->quantity, 2) : number_format($row->price * $row->quantity, 2) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('products/modal') ?>