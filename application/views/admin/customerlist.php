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
                             <th>Nom</th>
                             <th>Prénom</th>
                             <th>Email</th>
                             <th>Date d'inscription</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php foreach ($customers as $user) : ?>
                             <tr>
                                 <td><?= $user->lastname ?></td>
                                 <td><?= $user->fisrtname ?></td>
                                 <td><?= $user->email ?></th>
                                 <td><?= $user->creation_date ?></td>
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