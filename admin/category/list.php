 <!-- Page Heading -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Danh mục</h6>
     </div>
     <div class="card-body">
         <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                     <tr>
                         <th>Tên danh mục</th>
                         <th>Link</th>
                         <th></th>
                     </tr>
                 </thead>

                 <tbody>
                     <?php
                                        foreach($categories as $category){
                                            $id=$category['id'];
                                            $name=$category['name'];
                                            $link=$category['link'];
                                            ?>
                     <tr>
                         <td><?=$category['name']?></td>
                         <td><?=$category['link']?></td>
                         <td>
                             <a data-toggle="modal" data-target="#exampleModal"
                                 onclick="clickEdit('<?=$name?>',<?=$id?>)" class="btn btn-info btn-circle">
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
     function clickEdit(name, id) {
         $("#id").val(id)
         $("#name").val(name)
     }
 </script>