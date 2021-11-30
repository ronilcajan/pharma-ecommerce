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
                                <th>Order No</th>
                                <th>Customer Name</th>
                                <th>Payment Method</th>
                                <th>Transaction</th>
                                <th>Notes</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Order No</th>
                                <th>Customer Name</th>
                                <th>Payment Method</th>
                                <th>Transaction</th>
                                <th>Notes</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($orders as $row) : ?>
                                <tr>

                                    <td><a href="<?= site_url('admin/orders/') . $row->id ?>">D0000<?= $row->id ?></a></td>
                                    <td><a data-toggle="modal" href="#customer" data-id="<?= $row->user_id ?>" onclick="getCustomer(this)"><?= $row->first_name . ' ' . $row->last_name ?></a></td>
                                    <td><?= htmlspecialchars($row->payment_method, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($row->transaction, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($row->notes, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td>
                                        <?php if ($row->status == 'Processing') : ?>
                                            <span class="badge badge-primary">Processing</span>
                                        <?php elseif ($row->status == 'Delivery ongoing') : ?>
                                            <span class="badge badge-danger">Delivery ongoing</span>
                                        <?php else : ?>
                                            <span class="badge badge-success">Order Delivered</span>
                                        <?php endif ?>
                                    </td>
                                    <td>P <?= number_format($row->total_order, 2); ?></td>
                                    <td><?= date('M d, Y h:i A', strtotime($row->date)) ?></td>
                                    <td>
                                        <div class="form-button-action">
                                            <?php if ($row->status == 'Processing') : ?>
                                                <a class="btn btn-link btn-primary p-1" type="button" href="<?= site_url("products/deliver/" . $row->id); ?>" data-toggle="tooltip" onclick="return confirm('Are you sure you this order is ready to deliver?');" data-original-title="Ready to Deliver?">
                                                    <i class="fas fa-truck"></i>
                                                </a>
                                            <?php elseif ($row->status == 'Delivery ongoing') : ?>
                                                <a class="btn btn-link btn-danger p-1" type="button" href="<?= site_url("products/delivered/" . $row->id); ?>" data-toggle="tooltip" onclick="return confirm('Are you sure you this order is has been delivered?');" data-original-title="Order Delivered?">
                                                    <i class="fas fa-shipping-fast"></i>
                                                </a>
                                            <?php else : ?>
                                                <a class="btn btn-link btn-success p-1" type="button" href="javascript:void(0)" data-toggle="tooltip" data-original-title="Order has been delivered">
                                                    <i class="fas fa-check-circle"></i>
                                                </a>
                                            <?php endif ?>


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

<?php $this->load->view('order/modal') ?>