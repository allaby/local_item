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
                         <li class="breadcrumb-item"><a href="#">Tableau de bord</a></li>
                         <li class="breadcrumb-item active"><?= $page ?></li>
                     </ol>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>

     <!-- Main content -->
     <section class="content">

         <!-- Default box -->
         <div class="row">
             <div class="col-6">
                 <div class="card">
                     <div class="card-header">
                         <h3 class="card-title">Ajouter une nouvelle categorie</h3>
                     </div>
                     <div class="card-body">
                         Start creating your amazing application!
                     </div>
                     <!-- /.card-footer-->
                 </div>
                 <!-- /.card -->
             </div>
             <div class="col-6">
                 <div class="card">
                     <div class="card-header">
                         <h3 class="card-title">Catégorie disponibles</h3>
                     </div>
                     <div class="card-body">
                         <table class="table table-striped">
                             <thead>
                                 <tr>
                                     <th>Catégorie</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php foreach ($categories as $category) : ?>
                                     <tr>
                                         <td><?= $category->name ?></td>
                                         <td>
                                             <a class="btn-sm btn-default" title="Modifier"><i class="fa fa-edit"></i></a>
                                             <a class="btn-sm btn-default" title="Désactiver"><i class="fa fa-check"></i></a>
                                             <a class="btn-sm btn-default" title="Activer"><i class="fa fa-times"></i></a>
                                         </td>
                                     </tr>
                                 <?php endforeach; ?>
                             </tbody>
                         </table>
                     </div>
                     <!-- /.card-footer-->
                 </div>
                 <!-- /.card -->
             </div>
         </div>


     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->