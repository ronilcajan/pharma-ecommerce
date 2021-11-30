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
            <a href="javascript:void(0)">Transactions</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Payment Tables</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="transTable" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Transaction No.</th>
                                <th>Name</th>
                                <th>Order No.</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Transaction No.</th>
                                <th>Name</th>
                                <th>Order No.</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $no = 1;
                            foreach ($trans as $row) : ?>
                                <tr>
                                    <td><?= $row->id ?></td>
                                    <td><a data-toggle="modal" href="#customer" data-id="<?= $row->user_id ?>" onclick="getCustomer(this)"><?= $row->first_name . ' ' . $row->last_name ?></a></td>
                                    <td><a href="<?= site_url('admin/orders/') . $row->order_id ?>">D0000<?= $row->order_id ?></a></td>
                                    <td><?= number_format($row->amount, 2); ?></td>
                                    <td><?= date('M d, Y h:i A', strtotime($row->date)) ?></td>
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

<?php $this->load->view('payment/modal') ?>