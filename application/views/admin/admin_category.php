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
                         <form>
                             <div class="form-group">
                                 <input class="form-control" type="text" placeholder="Catégorie" id="category_name">
                             </div>
                             <button type="submit" onclick="addCat() ; return false" class="btn btn-primary" id="catsubmit">Créer</button>
                         </form>
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
                     <div class="card-body table-responsive p-0" style="height: 300px;">
                         <table class="table table-head-fixed²">
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
 <script>
     function addCat() {
         $("#catsubmit").attr("disabled", true);
         $("#catsubmit").html('<i class="fas fa-spinner fa-pulse"></i>');
         var cat_name = $("#category_name").val();
         $.ajax({
             method: "POST",
             url: "<?= base_url() ?>shop/newcat",
             data: {
                 cat_name: cat_name
             },
             success: function(data) {
                 console.log(data);
                 var val = data.split("||");
                 if (val[0] == "false") {
                     $("#catsubmit").attr("disabled", false);
                     $("#catsubmit").html('Créer');
                     toastr.error(val[1])
                 } else if (val[0] == "true") {
                     $("#catsubmit").attr("disabled", false);
                     $("#catsubmit").html('Créer');
                     Toast.fire({
                         icon: 'success',
                         title: val[1],
                     })
                     location.reload();
                 }
             }
         })
     }
 </script>