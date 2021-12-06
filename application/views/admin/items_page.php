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
                         <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                 <h3 class="card-title">Article disponibles</h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body">
                 <table id="example1" class="table table-bordered table-striped">
                     <thead>
                         <tr>
                             <th>REF</th>
                             <th>Article</th>
                             <th>Categorie</th>
                             <th>Stock Disponible</th>
                             <th>Prix</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php foreach ($items as $item) : ?>
                             <tr>
                                 <td><?= $item->reference ?></th>
                                 <td><?= $item->name ?></th>
                                 <td><?= $item->category_name ?></th>
                                 <td><?= (intval($item->stock) - intval($item->stock_av) <= 0 ) ? '<span class="badge badge-soft-danger p-2">Rupture de stock</span>' : (intval($item->stock) - intval($item->stock_av)) ?></th>
                                 <td><?= number_format($item->price_max, 2, ',', ' ') ?></th>
                                 <td>
                                     <a href="<?= base_url() ?>item/detail/<?= $item->item_id ?>" class="btn-sm btn-default" title="voir l'article"><i class="fa fa-eye"></i></a>
                                     <a class="btn-sm btn-default" title="mofifier l'article"><i class="fa fa-pen"></i></a>
                                 </th>
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