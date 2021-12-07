<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Facture n° <?= $invoice['invoice_number'] ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/backoffice/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/backoffice/dist/css/adminlte.min.css">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        <i class="fas fa-globe"></i> AdminLTE, Inc.
                        <small class="float-right">Date: <?= date('d/m/Y', strtotime($invoice['invoice_date'])) ?></small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>Admin, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        Phone: (804) 123-5432<br>
                        Email: info@almasaeedstudio.com
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong><?= $this->session->userdata('firstname') . ' ' . $this->session->userdata('lastname') ?></strong><br>
                        <?= $this->session->userdata('street') . ', ' . $this->session->userdata('postalcode') ?><br>
                        <?= $this->session->userdata('city') . ', ' . $this->session->userdata('country') ?><br>
                        Phone: <?= $this->session->userdata('phone') ?><br>
                        Email: <?= $this->session->userdata('email') ?>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Facture n° <?= $invoice['invoice_number'] ?></b><br>
                    <br>
                    <b>Commande n°:</b> <?= $order['code'] ?><br>
                    <!-- <b>Payment Due:</b> 2/22/2014<br>
        <b>Account:</b> 968-34567 -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Qté</th>
                                <th>REF</th>
                                <th>Articles </th>
                                <th>PU </th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($invoicelines as $line) : ?>
                                <tr>
                                    <td><?= $line->quantity ?></td>
                                    <td><?= $line->item_ref ?></td>
                                    <td><?= $line->item_name ?></td>
                                    <td><?= number_format($line->unit_price, 2, ',', ' ') ?></td>
                                    <td><?= number_format($line->subtotal, 2, ',', ' ') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                    <p class="lead">Payment Methods:</p>
                    <img src="<?= base_url() ?>assets/backoffice/dist/img/credit/visa.png" alt="Visa">
                    <img src="<?= base_url() ?>assets/backoffice/dist/img/credit/mastercard.png" alt="Mastercard">
                    <img src="<?= base_url() ?>assets/backoffice/dist/img/credit/american-express.png" alt="American Express">
                    <img src="<?= base_url() ?>assets/backoffice/dist/img/credit/paypal2.png" alt="Paypal">

                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr
                        jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                    </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <p class="lead">Amount Due 2/22/2014</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td><?= number_format($invoice['invoice_amount'], 2, ',', ' ')?> € </td>
                            </tr>
                            <tr>
                                <th>Tax (9.3%)</th>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th>Shipping:</th>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td><?= number_format($invoice['invoice_amount'], 2, ',', ' ')?> € </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <div>
        <!-- <button class="btn btn-default" onclick="window.print()"><i class="fa fa-print"></i> Imprimer la facture</button> -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
          window.addEventListener("load", window.print());
    </script>
</body>

</html>