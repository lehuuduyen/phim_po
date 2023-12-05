<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2023</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>



<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../js/demo/datatables-demo.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script> -->

<script src="
https://cdn.jsdelivr.net/npm/ckeditor5-build-classic-with-image-resize@12.4.0/build/ckeditor.min.js
"></script>
<script src="
https://cdn.jsdelivr.net/npm/@ckeditor/ckeditor5-clipboard@40.1.0/src/dragdropblocktoolbar.min.js
"></script>
<script>
    let toolbar =  {
}
    function clickEdit(name, id, meta_description, content, image, url_movie, category_id) {
        $("#id").val(id)
        $("#name").val(name)
        $("#meta_description").val(meta_description)
        $("#content_value").val(content)
        $("#image").val(image)
        $("#url_movie").val(url_movie)
        $('#category_id').val(category_id.split(','));
        $('#category_id').select2();

    }

    function clickEditBlog(name, id, meta_description, content, image, url_movie) {

        $("#id").val(id)
        $("#name").val(name)
        $("#meta_description").val(meta_description)
        $("#thumbnail").attr('src', '/' + image)

        $("#exampleModal .ck-editor").remove()
        ClassicEditor.create(document.querySelector('#editor2'),  {
        ckfinder: {
            uploadUrl: '/superadmin/upload.php?command=QuickUpload&type=FilesUpload&responseType=json'
        },toolbar:toolbar
        
    }).then(editor2 => {
            editor2.setData(decodeURIComponent(content.replace(/\+/g, '%20')))
        })

    }
    $('.js-example-basic-multiple,#category_id').select2();
</script>
<script>
    ClassicEditor.create(document.querySelector('#editor'),  {
        ckfinder: {
            uploadUrl: '/superadmin/upload.php?command=QuickUpload&type=FilesUpload&responseType=json'
        },toolbar:toolbar
        
    })
        .catch(error => {
            console.error(error);
        });

    ClassicEditor.create(document.querySelector('#editor2'),  {
        ckfinder: {
            uploadUrl: '/superadmin/upload.php?command=QuickUpload&type=FilesUpload&responseType=json'
        },toolbar:toolbar
        
    })
        .catch(error => {
            console.error(error);
        });
</script>
</body>

</html>