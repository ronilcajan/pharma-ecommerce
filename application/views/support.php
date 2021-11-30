<div class="page-header">
    <h4 class="page-title"><?= $title ?></h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <a href="#">
                <i class="icon-grid"></i>
            </a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="javascript:void(0)">Inquiries</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Inquiries Table</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="inquiTable" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $no = 1;
                            foreach ($support as $row) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($no, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($row['fname'] . ' ' . $row['fname'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><a href="mailto:<?= $row['email'] ?>"><?= htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8'); ?></a></td>
                                    <td><?= htmlspecialchars($row['subject'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($row['message'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars(date('D., M jS, Y.g:i A', strtotime($row['date'])), ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td>
                                        <div class="form-button-action">
                                            <a class="btn btn-link btn-danger p-1" type="button" href="<?= site_url("support/delete/" . $row['id']); ?>" data-toggle="tooltip" onclick="return confirm('Are you sure you want to delete this inquiry?');" data-original-title="Remove">
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