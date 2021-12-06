 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1><?= $page ?></h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard">Tableau de bord</a></li>
                         <li class="breadcrumb-item active"><?= $page ?></li>
                     </ol>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>

     <!-- Main content -->
     <section class="content">

         <div class="card">
             <div class="card-header">
                 <h3 class="card-title">Toutes les commandes</h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body">
                 <table id="example1" class="table table-bordered table-striped">
                     <thead>
                         <tr>
                             <th>REF</th>
                             <th>Date</th>
                             <th>Total</th>
                             <th>Statut</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php foreach ($orders as $order) : ?>
                             <tr>
                                 <td><?= $order->code ?></td>
                                 <td><?= refomat_date($order->creation_date) ?></td>
                                 <td><?= number_format($order->total,2, ',', ' ') ?></td>
                                 <td>
                                     <?php
                                        if ($order->status == 2)
                                            echo '<span class="badge badge-warning badge-pill">en cours de traitement</span>';
                                        elseif ($order->status == 1)
                                            echo '<span class="badge badge-success badge-pill">acceptée</span>';
                                        elseif ($order->status == 4)
                                            echo '<a href="javascript:void(0)" title="Please check your emails to be able to finalize this payment" ><span class="badge badge-soft-primary badge-pill">paiement en cours </span></a>';
                                        elseif ($order->status == 0)
                                            echo '<span class="badge badgedanger badge-pill"> rejetée </a></span>';
                                        ?>
                                 </td>
                                 <td>
                                     <a class="btn-sm btn-default" data-id="<?= $order->order_id ?>" onclick="orderdetails($(this).attr('data-id'))"><i class="fa fa-eye"></i></a>
                                 </td>
                             </tr>
                         <?php endforeach; ?>
                     </tbody>
                 </table>
             </div>
             <!-- /.card-body -->
         </div>
         <!-- /.card -->

     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
 <script>
     function orderdetails(order){
        alert(order)
     }
 </script>