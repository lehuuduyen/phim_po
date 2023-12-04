 <!-- Page Heading -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Phim</h6>
     </div>
     <div class="card-body">
         <div class="table-responsive">
             <table class="table table-bordered" width="100%" >
                 <thead>
                     <tr>
                         <!-- <th style="width: 10%;">Tên danh mục</th> -->
                         <th style="width: 10%;">Tên bài viết</th>
                         <th style="width: 10%;">Meta Description</th>
                         <th style="width: 40%;">Nội dung bài viết</th>
                         <th style="width: 10%;">Hình ảnh </th>
                         <th style="width: 10%;">Link trang</th>
                         <th style="width: 10%;"><button style="padding: 3px 20px;" data-toggle="modal" data-target="#exampleModalCreate" class="btn btn-success">Thêm</button></th>
                     </tr>
                 </thead>

                 <tbody>
                     <?php
                    
                                        foreach($phim as $value){
                                            $id=$value['id'];
                                            $name=$value['name'];
                                            $meta_description=$value['meta_description'];
                                            $content=$value['content'];
                                            ?>
                     <tr>
                         <td style="width: 10%;"><?=$value['name']?></td>
                         <td style="width: 10%; white-space: pre-wrap;"><?=$value['meta_description']?></td>
                         <td style="width: 40%; white-space: pre-wrap;"><?=$value['content']?></td>
                         <td style="width: 10%;"> <img width="50" height="50" src="<?=$value['image']?>" >  </td>
                         <td style="width: 10%;"><a href="<?=$http.$value['slug']?>" target="_blank" ><?=$http.$value['slug']?></a></td>
                         <td style="width: 10%;">
                             <a data-toggle="modal" data-target="#exampleModal"
                                 onclick="clickEditBlog('<?=$name?>',<?=$id?>,`<?=$meta_description?>`,`<?=$content?>`,`<?=$value['image']?>`,`<?=$value['url_movie']?>`,`<?=$value['category_id']?>`)" class="btn btn-info btn-circle">
                                 <i class="fas fa-info-circle"></i>

                             </a>
                             <a href="/superadmin/phim/delete?id=<?=$id?>" class="btn btn-danger btn-circle ">
                                 <i class="fas fa-trash"></i>
                             </a>
                         </td>
                     </tr>
                     <?php
                                        }
                                        ?>
                 </tbody>
             </table>
             <nav aria-label="...">
  <ul class="pagination">
    <li class="page-item <?=($page <= 1)?"disabled":""?> ">
      <a class="page-link" href="/superadmin/phim?page=<?=$page - 1?>" tabindex="-1">Previous</a>
    </li>
    <?php for($i=1;$i<= ceil($phimCount / $limit);$i++ ){
        if($page == $i){
            ?>

            <li class="page-item active">
                <a class="page-link" href="/superadmin/phim?page=<?=$i?>"><?=$i?> <span class="sr-only">(current)</span></a>
            </li>

            <?php
        }else if($i == 1){
            ?>
                <li class="page-item"><a class="page-link" href="/superadmin/phim?page=<?=$i?>"><?=$i?></a></li>
            <?php
        }
        else if($i == ceil($phimCount / $limit)){
            ?>
                            <li class="page-item"><a class="page-link" href="/superadmin/phim?page=<?=$i?>"><?=$i?></a></li>
            <?php
        }
        else if($page -1 == $i){
            ?>
                <li class="page-item"><a class="page-link" href="">...</a></li>

                <li class="page-item"><a class="page-link" href="/superadmin/phim?page=<?=$i?>"><?=$i?></a></li>

            <?php
        }
        else if($page + 1 == $i){
            ?>

                <li class="page-item"><a class="page-link" href="/superadmin/phim?page=<?=$i?>"><?=$i?></a></li>
                <li class="page-item"><a class="page-link" href="">...</a></li>

            <?php
        }
        
        }?>
    <li class="page-item <?=($page >= ceil($phimCount / $limit))?"disabled":""?> ">
      <a class="page-link" href="/superadmin/phim?page=<?=$page + 1?>">Next</a>
    </li>
  </ul>
</nav>
         </div>
     </div>
 </div>
 <div class="modal fade" id="exampleModalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <form name="login" action="/superadmin/create/blog" enctype="multipart/form-data" method="post">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Thêm</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="form-group">
                         <label for="exampleInputEmail1">Tên bài viết  </label>
                         <input type="text" class="form-control"  name="name"  >
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Link hình  </label>
                         <input type="file" class="form-control" style="padding:0;height:32px" accept="image/png, image/gif, image/jpeg" name="image"  >
                     </div>
                    
                     <div class="form-group">
                         <label for="exampleInputEmail1">Meta Description  </label>
                         <br/>
                         <textarea  name="meta_description" cols="50" rows="5"></textarea>
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Nội dung bài viết  </label>
                         <br/>
                         <textarea id="editor" name="content"></textarea>

                         <!-- <textarea  name="content" cols="50" rows="5"></textarea> -->
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Trạng thái  </label>
                        <select class="form-control" name="status">
                            <option value="1">Mở</option>
                            <option value="0">Đóng</option>
                        </select>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary" name="create-blog">Save changes</button>
                 </div>
             </div>
         </form>

     </div>
 </div>
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <form name="login" action="/superadmin/edit/blog" method="post">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Cập nhật</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                    <input type="hidden" class="form-control" id="id" name="id" >

                    <div class="form-group">
                         <label for="exampleInputEmail1">Tên bài viết  </label>
                         <input type="text" class="form-control" id="name" name="name"  >
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Link hình  </label>
                         <input type="file" class="form-control" id="image" style="padding:0;height:32px" accept="image/png, image/gif, image/jpeg" name="image"  >
                     </div>
                    
                     <div class="form-group">
                         <label for="exampleInputEmail1">Meta Description  </label>
                         <br/>
                         <textarea  name="meta_description" cols="50" id="meta_description" rows="5"></textarea>
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Nội dung bài viết  </label>
                         <br/>
                         <textarea id="editor" name="content"></textarea>

                         <!-- <textarea  name="content" cols="50" rows="5"></textarea> -->
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Trạng thái  </label>
                        <select class="form-control" name="status">
                            <option value="1">Mở</option>
                            <option value="0">Đóng</option>
                        </select>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary" name="edit-blog">Save changes</button>
                 </div>
             </div>
         </form>

     </div>
 </div>


 