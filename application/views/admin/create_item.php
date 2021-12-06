  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Blank Page</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item active">Blank Page</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <form id="newitem_form">

              <!-- Default box -->
              <div class="row">
                  <div class="col-6">
                      <div class="card">

                          <div class="card-body">
                              <div class="form-group">
                                  <label>
                                      Titre
                                  </label>
                                  <input class="form-control" type="text" is="item_name" name="item_name" placeholder="Titre du Produit">
                              </div>
                              <br>
                              <diiv class="form-group">
                                  <label>
                                      Description du produit
                                  </label>
                                  <textarea class="form-control" name="description" id="description"></textarea>
                              </diiv>
                              <br>
                              <div class="row">
                                  <div class="col-6">
                                      <div class="form-group">
                                          <label>
                                              Prix du produit
                                          </label>
                                          <input class="form-control" type="number">
                                      </div>
                                  </div>
                                  <div class="col-6"></div>
                              </div>

                          </div>
                      </div>
                      <!-- /.card -->
                  </div>
                  <div class="col-6">
                      <div class="card">
                          <div class="card-body">
                              <div class="form-group">
                                  <label>
                                      Catégorie
                                  </label>
                                  <select class="form-control" id="category">
                                      <option value="">Choisisser une catégorie</option>
                                      <?php foreach($categories as $category) :?>
                                      <option value="<?= $category->category_id ?>"><?= $category->name ?></option>
                                        <?php endforeach; ?>
                                  </select>
                              </div>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                              <button type="submit" class="btn btn-success">Créer</button>
                          </div>
                          <!-- /.card-footer-->
                      </div>
                      <!-- /.card -->
                  </div>
              </div>
          </form>

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->