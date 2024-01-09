 <!-- Page Heading -->
 <div class="card shadow mb-4">
     <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Phim</h6>
     </div>
     <div class="card-body">
         <div class="table-responsive">
             <form action="/superadmin/phim" class="row g-3" method="get">
                 <div class="col-md-5">
                     <label for="inputEmail4" class="form-label">Danh mục</label>
                     <input type="text" class="form-control" name="category" value="<?=(isset($_GET['category']))?$_GET['category']:''?>">
                 </div>
                 <div class="col-md-5">
                     <label for="inputPassword4" class="form-label">Tên phim</label>
                     <input type="text" class="form-control" name="title" value="<?=(isset($_GET['title']))?$_GET['title']:''?>">
                 </div>
                 <div class="col-md-2">
                    <label for="inputPassword4" class="form-label">&nbsp</label>

                     <button type="submit" class="form-control btn btn-primary">Tìm kiếm</button>
                 </div>
             </form>
             <table class="table table-bordered" width="100%">
                <span style="color:red"><?=(isset($_GET['message']))?"Slug bị trùng ":""?> </span>

                 <thead>
                     <tr style="text-align: center;">
                         <!-- <th style="width: 10%;">Tên danh mục</th> -->
                         <th style="width: 10%;">Danh mục</th>
                         <th style="width: 10%;">Tên phim</th>
                         <th style="width: 10%;">Meta Description</th>
                         <th style="width: 40%;">Nội dung phim</th>
                         <th style="width: 10%;">Link Hình </th>
                         <th style="width: 10%;">Link phim</th>
                         <th style="width: 10%;">Link trang</th>
                         <th style="width: 10%;text-align: center;"><button style="padding: 3px 20px;"
                                 data-toggle="modal" data-target="#exampleModalCreate"
                                 class="btn btn-success">Thêm</button></th>
                     </tr>
                 </thead>

                 <tbody>
                     <?php
                                        foreach($phims as $value){
                                       
                                            
                                            $id=$value['id'];
                                            $name=$value['name'];
                                            $meta_description=$value['meta_description'];
                                            $content=$value['content'];
                                            ?>
                     <tr>
                         <!-- <td style="width: 10%;"><?=$value['textcategory']?></td> -->
                         <td style="width: 10%;"><?=$value['category_name']?></td>
                         <td style="width: 10%;"><?=$value['name']?></td>
                         <td style="width: 10%; white-space: pre-wrap;"><?=$value['meta_description']?></td>
                         <td style="width: 40%; white-space: pre-wrap;"><?=$value['content']?></td>
                         <td style="width: 10%;"> <img width="50" height="50" src="<?=$value['image']?>"> </td>
                         <td style="width: 10%;"><a href="<?=$value['url_movie']?>"
                                 target="_blank"><?=$value['url_movie']?></a></td>
                         <td style="width: 10%;"><a href="<?=$http.'/movie/'.$value['url_movie_origin']?>"
                                 target="_blank"><?=$http.'/movie/'.$value['url_movie_origin']?></a></td>
                         <td style="width: 10%;">
                             <a data-toggle="modal" data-target="#exampleModal"
                                 onclick="clickEdit('<?=$name?>',<?=$id?>,`<?=$meta_description?>`,`<?=urlencode($content)?>`,`<?=$value['image']?>`,`<?=$value['url_movie']?>`,`<?=$value['category_id']?>`,`<?=$value['url_movie_origin']?>`)"
                                 class="btn btn-info btn-circle">
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
                     
                     <?php 
                     $subdomain = '/superadmin/phim?';
                     if(isset($_GET['category'])){
                        $subdomain .= 'category='.$_GET['category'].'&';
                     }
                     if(isset($_GET['title'])){
                        $subdomain .= 'title='.$_GET['title'].'&';
                     }
                     
                     for($i=1;$i<= ceil($phimCount / $limit);$i++ ){
        if($page == $i){
            ?>

                     <li class="page-item active">
                         <a class="page-link" href="<?=$subdomain?>page=<?=$i?>"><?=$i?> <span
                                 class="sr-only">(current)</span></a>
                     </li>

                     <?php
        }else if($i == 1){
            ?>
                     <li class="page-item"><a class="page-link" href="<?=$subdomain?>page=<?=$i?>"><?=$i?></a></li>
                     <?php
        }
        else if($i == ceil($phimCount / $limit)){
            ?>
                     <li class="page-item"><a class="page-link" href="<?=$subdomain?>page=<?=$i?>"><?=$i?></a></li>
                     <?php
        }
        else if($page -1 == $i){
            ?>
                     <li class="page-item"><a class="page-link" href="">...</a></li>

                     <li class="page-item"><a class="page-link" href="<?=$subdomain?>page=<?=$i?>"><?=$i?></a></li>

                     <?php
        }
        else if($page + 1 == $i){
            ?>

                     <li class="page-item"><a class="page-link" href="<?=$subdomain?>page=<?=$i?>"><?=$i?></a></li>
                     <li class="page-item"><a class="page-link" href="">...</a></li>

                     <?php
        }
        
        }?>
                     <li class="page-item <?=($page >= ceil($phimCount / $limit))?"disabled":""?> ">
                         <a class="page-link" href="<?=$subdomain?>page=<?=$page + 1?>">Next</a>
                     </li>
                 </ul>
             </nav>
         </div>
     </div>
 </div>
 <div class="modal fade" id="exampleModalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <form name="login" action="/superadmin/create/phim" method="post">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Thêm</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="form-group">
                         <label for="exampleInputEmail1">Tên phim </label>
                         <input type="text" class="form-control" name="name">
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Link trang </label>
                         <div class="input-group mb-3">
                             <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon3"><?=$http?>/movie/</span>
                             </div>
                             <input type="text" class="form-control"  name="slug">

                         </div>
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Link hình </label>
                         <input type="text" class="form-control" name="image">
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Link phim </label>
                         <input type="text" class="form-control" name="url_movie">
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Danh mục </label>
                         <select class="js-example-basic-multiple form-control" style="width:100%" name="categories[]"
                             multiple="multiple">
                             <?php foreach($categories as $category){?>
                             <option value="<?=$category['id']?>"><?=$category['name']?></option>
                             <?php }?>
                         </select>
                     </div>

                     <div class="form-group">
                         <label for="exampleInputEmail1">Meta Description </label>
                         <br />
                         <textarea name="meta_description" cols="50" rows="5"></textarea>
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Nội dung phim </label>
                         <br />
                         <textarea name="content" cols="50" rows="5"></textarea>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary" name="create-phim">Save changes</button>
                 </div>
             </div>
         </form>

     </div>
 </div>
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <form name="login" action="/superadmin/edit/phim" method="post">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Cập nhật</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <input type="hidden" class="form-control" id="id" name="id">

                     <div class="form-group">
                         <label for="exampleInputEmail1">Tên phim </label>
                         <input type="text" class="form-control" id="name" name="name">
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Link trang </label>
                         <div class="input-group mb-3">
                             <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon3"><?=$http?>/movie/</span>
                             </div>
                             <input type="text" class="form-control" id="slug" name="slug">
                             <input type="hidden" class="form-control" id="slug_origin" name="slug_origin">

                         </div>
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Link hình </label>
                         <input type="text" class="form-control" id="image" name="image">
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Link phim </label>
                         <input type="text" class="form-control" id="url_movie" name="url_movie">
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Danh mục </label>
                         <select class="js-example-basic-multiple form-control" id="category_id" style="width:100%"
                             name="categories[]" multiple="multiple">
                             <?php foreach($categories as $category){?>
                             <option value="<?=$category['id']?>"><?=$category['name']?></option>
                             <?php }?>
                         </select>
                     </div>

                     <div class="form-group">
                         <label for="exampleInputEmail1">Meta Description </label>
                         <br />
                         <textarea id="meta_description" name="meta_description" cols="50" rows="5"></textarea>
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Nội dung phim </label>
                         <br />
                         <textarea id="content_value" name="content" cols="50" rows="5"></textarea>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary" name="edit-phim">Save changes</button>
                 </div>
             </div>
         </form>

     </div>
 </div>