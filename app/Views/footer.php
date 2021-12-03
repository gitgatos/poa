<footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Dugwuai <?php echo date('Y')?> </div>
                
                <div>
                    <a href="https://www.facebook.com/Dugwuai-101875518631034" target="_blank">Facebook</a>
                    &middot;
                    
                    <a href="https://dugwuai.blogspot.com/" target="_blank">Blog</a>
                </div>
            </div>
        </div>
    </footer>
</div>
</div>



<script src="<?php echo base_url();?>/js/bootstrap.bundle.min.js" ></script>
<script src="<?php echo base_url();?>/js/scripts.js"></script>
<script src="<?php echo base_url();?>/js/simple-datatables@latest.js" ></script>
<script src="<?php echo base_url();?>/js/datatables-simple-demo.js"></script>



<script>
    var modalconfirma = document.getElementById('modalconfirma')
    modalconfirma.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget

        var id = button.getAttribute('data-bs-id')
        var nombre = button.getAttribute('data-bs-nonbreid')

        var modalTitle = modalconfirma.querySelector('.modal-title span')
            modalTitle.textContent = nombre

        var modelForm = modalconfirma.querySelector('#modelForm')
        var action = modelForm.getAttribute("data-bs-action")

            modelForm.setAttribute("action",action+id)
  
})
</script>





</body>

</html>