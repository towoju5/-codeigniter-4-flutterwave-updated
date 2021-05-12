<?php if(session()->get('success') != null): ?>
    <script>
        iziToast.success({
            message: '<?= session()->get('success') ?>',
        });
    </script>
<?php elseif(session()->get('warning') != null): ?>
    <script>
        iziToast.success({
            message: '<?= session()->get('warning') ?>',
        });
    </script>
<?php elseif(session()->get('info') != null): ?>
    <script>
        iziToast.success({
            message: '<?= session()->get('info') ?>',
        });
    </script>
<?php elseif(session()->get('error') != null): ?>
    <script>
        iziToast.success({
            message: '<?= session()->get('error') ?>',
        });
    </script>
<?php endif ?>
        <!-- Footer START -->
        <footer class="footer">
            <div class="footer-content">
                <p class="m-b-0">Copyright © 2020 ASAP Nigeria. All rights reserved.</p>
                <span>
                    <a href="#" class="text-gray m-r-15">Term &amp; Conditions</a>
                    <a href="#" class="text-gray">Privacy &amp; Policy</a>
                </span>
            </div>
        </footer>
        <!-- Footer END -->

    </div>
    <!-- Page Container END -->
    
<!--Website Select Box-->

    
    <!-- Core Vendors JS -->
    <script src="<?= base_url() ?>/assets/js/vendors.min.js"></script>

    <!-- page js -->
    <script src="<?= base_url() ?>/assets/vendors/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendors/datatables/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/pages/datatables.js"></script>

    <!-- Core JS -->
    <script src="<?= base_url() ?>/assets/js/app.min.js"></script>

</body>


</html>