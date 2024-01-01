 <!-- Page Heading -->

 <div class="card shadow mb-4">

     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Danh mục </h6>
         
     </div>
     <div class="card-body">
        
         <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr>
                         <th>Tên danh mục</th>
                         <th>Meta Title</th>
                         <th>Meta Keyword</th>
                         <th>Meta Description</th>
                         <th>Link trang</th>
                         <th><button style="padding: 3px 20px;" data-toggle="modal" data-target="#exampleModalCreate" class="btn btn-success">Thêm</button></th>
                     </tr>
                 </thead>

                 <tbody>
                     <?php
                                        foreach($categories as $category){
                                            $id=$category['id'];
                                            $name=$category['name'];
                                            $meta_title=$category['meta_title'];
                                            $meta_description=$category['meta_description'];
                                            $meta_keyword=$category['meta_keyword'];
                                            $link=$category['link'];
                                            ?>
                     <tr>
                         <td><a href="/superadmin/phim?category=<?=$category['name']?>&title="><?=$category['name']?></a></td>
                         <td><?=$category['meta_title']?></td>
                         <td><?=$category['meta_keyword']?></td>
                         <td><?=$category['meta_description']?></td>
                         <td><?=$category['link']?></td>
                         <td>
                             <a data-toggle="modal" data-target="#exampleModal"
                                 onclick="clickEditCate('<?=$name?>','<?=$id?>','<?=$meta_title?>','<?=$meta_keyword?>',`<?=(empty($meta_description))?'':urlencode($meta_description)?>`)" class="btn btn-info btn-circle">
                                 <i class="fas fa-info-circle"></i>

                             </a>
                             <a href="/superadmin/category/delete?id=<?=$id?>" class="btn btn-danger btn-circle ">
                                 <i class="fas fa-trash"></i>
                             </a>
                         </td>
                     </tr>
                     <?php
                                        }
                                        ?>
                 </tbody>
             </table>
         </div>
     </div>
 </div>
 <div class="modal fade" id="exampleModalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <form name="login" action="/superadmin/create/category" method="post">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Thêm </h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="form-group">
                         <label for="exampleInputEmail1">Tên danh mục</label>
                         <input type="text" class="form-control"  name="name"  aria-describedby="emailHelp">
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Meta Title</label>
                         <input type="text" class="form-control"  name="meta_title"  aria-describedby="emailHelp">
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Meta Keyword</label>
                         <input type="text" class="form-control"  name="meta_keyword"  aria-describedby="emailHelp">
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Meta Description </label>
                         <br />
                         <textarea name="meta_description" cols="50" rows="5"></textarea>
                     </div>
                 </div>
                
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary" name="create-category">Save changes</button>
                 </div>
             </div>
         </form>

     </div>
 </div>
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <form name="login" action="/superadmin/edit/category" method="post">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Cập nhật</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="form-group">
                         <label for="exampleInputEmail1">Tên danh mục</label>
                         <input type="text" class="form-control" id="name" name="name"  aria-describedby="emailHelp">
                         <input type="hidden" class="form-control" id="id" name="id" aria-describedby="emailHelp">
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Meta Title</label>
                         <input type="text" class="form-control"  name="meta_title" id="meta_title"  aria-describedby="emailHelp">
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Meta Keyword</label>
                         <input type="text" class="form-control"  name="meta_keyword" id="meta_keyword"  aria-describedby="emailHelp">
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Meta Description </label>
                         <br />
                         <textarea name="meta_description" id="meta_description" cols="50" rows="5"></textarea>
                     </div>
                 </div>
                
                
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary" name="edit-category">Save changes</button>
                 </div>
             </div>
         </form>

     </div>
 </div>

 <script>
     function clickEditCate(name, id,meta_title,meta_keyword,content) {
        content = decodeURIComponent(content);
        content = content.replaceAll("+", " ");
         $("#id").val(id)
         $("#name").val(name)
         $("#meta_title").val(meta_title)
         $("#meta_keyword").val(meta_keyword)
         $("#meta_description").val(content)
     }
     function clickEdit(name, id, meta_description, content, image, url_movie, category_id) {
        content = decodeURIComponent(content);
        content = content.replaceAll("+", " ");

        $("#id").val(id)
        $("#name").val(name)
        $("#meta_description").val(meta_description)
        $("#content_value").val(content)
        $("#image").val(image)
        $("#url_movie").val(url_movie)
        $('#category_id').val(category_id.split(','));
        $('#category_id').select2();

    }
 </script>