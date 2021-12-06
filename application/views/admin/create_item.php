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
                  <div class="col-8">
                      <div class="card">
                          <div class="card-body">
                              <div class="form-group">
                                  <label>
                                      Titre
                                  </label>
                                  <input class="form-control" type="text" is="item_name" name="item_name" placeholder="Titre du Produit">
                              </div>
                          </div>
                      </div>
                      <div class="card">
                          <div class="card-body">
                              <div class="form-group">
                                  <div class="form-group">
                                      <label>
                                          Description du produit
                                      </label>
                                      <textarea id="summernote">
                Place <em>some</em> <u>text</u> <strong>here</strong>
              </textarea>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="card">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-6">
                                      <div class="form-group">
                                          <label>
                                              Prix du produit
                                          </label>
                                          <input class="form-control" type="number" id="item_price" name="item_price">
                                      </div>
                                  </div>
                                  <div class="col-6">
                                      <div class="form-group">
                                          <label>
                                              Inventaire
                                          </label>
                                          <input class="form-control" type="number" name="item_stock" name="item_stock">
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <!-- /.card-body -->
                          <div class="card-footer">
                              <button type="button" onclick="additem(); return false" class="btn btn-success">Créer</button>
                          </div>
                          <!-- /.card-footer-->
                      </div>
                  </div>
                  <div class="col-4">
                      <div class="card">
                          <div class="card-body">
                              <div class="form-group">
                                  <label>
                                      Catégorie
                                  </label>
                                  <select class="form-control" id="category" name="category">
                                      <option value="">Choisisser une catégorie</option>
                                      <?php foreach ($categories as $category) : ?>
                                          <option value="<?= $category->category_id ?>"><?= $category->name ?></option>
                                      <?php endforeach; ?>
                                  </select>
                              </div>
                          </div>
                      </div>
                      <!-- /.card -->
                      <div class="card">
                          <div class="card-body">
                              <div class="form-group">
                                  <label>
                                      Tag produit
                                  </label>
                                  <input type="text" name="product_tag" class="form-control" id="item_tag">
                              </div>
                          </div>
                      </div>
                      <!-- /.card -->
                      <div class="card">
                          <div class="card-body">
                              <div class="form-group">
                                  <label>
                                      Image mise en avant
                                  </label>
                                  <div class="">
                                      <a href="javascript:void(0)" onclick="openDialog()">
                                          <img src="<?= base_url() ?>assets/backoffice/img/place.jpg" id="apercu" class="card-img-top img-fluid rounded" alt="...">
                                      </a>

                                  </div>
                                  <input type="file" name="item_img" class="form-control" id="item_img" style="display : none">
                              </div>
                          </div>
                      </div>
                      <!-- /.card -->
                  </div>
              </div>
          </form>

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
      function additem() {
          var form = $("#newitem_form")[0];
          var form_data = new FormData(form);
          form_data.append("description", $('#summernote').summernote('code'));
        //   console.log(form_data);
          //   return false;
        //   var textareaValue = $('#summernote').summernote('code');
          $.ajax({
              url: "<?= base_url() ?>shop/add_item",
              method: "POST",
              data: form_data,
              contentType: false,
              cache: false,
              processData: false,
              // beforeSend: function() {
              //     $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
              // },
              success: function(msg) {
                  console.log(msg)
                //   if (msg == "false") {
                //       alert("");
                //   }
              }
          });
      }


      function openDialog() {
          // alert("ok")
          $("#item_img").trigger('click');
      }


      $("#item_img").change(function() {
          $('#apercu').attr('src', "<?= base_url() ?>assets/backoffice/img/place.jpg");
          // recuperation de l'extension du fichier
          var cheminImage = $(this)[0].value;
          var nameImage = $(this)[0].files[0].name;
          // console.log($(this)[0].files[0].name);
          var extension = cheminImage.substring(cheminImage.lastIndexOf('.') + 1).toLowerCase();

          if (extension == 'gif' || extension == 'png' || extension == 'jpg' || extension == 'jpeg') {

              if (this.files && this.files[0]) {

                  var reader = new FileReader();
                  reader.onload = function(e) {
                      $('#apercu').attr('src', e.target.result);
                  }

                  reader.readAsDataURL(this.files[0]);
              }
          } else {
              toastr.error('Veillez choisir un fichier de format image');
          }
      })
  </script>