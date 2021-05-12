<script type="text/javascript" src="..\files\assets\pages\notification\notification.js"></script>    
<?php if (session()->get('success') != ""): ?>
  <script>
  $(document).ready(function() {
        $.toast({
			heading: 'Congratulations!!!',
            text: '<?= session()->get('success') ?>',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'success',
            hideAfter: 3500,
            stack: 6
        })
    });
  </script>
<?php endif; ?>

    <!-- notification js -->
    <script type="text/javascript" src="..\files\assets\js\bootstrap-growl.min.js"></script>
    <script type="text/javascript" src="..\files\assets\pages\notification\notification.js"></script>    
    <!-- Required Jquery -->
    <script type="text/javascript" src="<?= base_url() ?>/files/bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/files/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/files/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?= base_url() ?>/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="<?= base_url() ?>/files/bower_components/modernizr/js/modernizr.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/files/bower_components/modernizr/js/css-scrollbars.js"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="<?= base_url() ?>/files/bower_components/chart.js/js/Chart.js"></script>
    <!-- Google map js -->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="<?= base_url() ?>/files/assets/pages/google-maps/gmaps.js"></script>
    <!-- gauge js -->
    <script src="<?= base_url() ?>/files/assets/pages/widget/gauge/gauge.min.js"></script>
    <script src="<?= base_url() ?>/files/assets/pages/widget/amchart/amcharts.js"></script>
    <script src="<?= base_url() ?>/files/assets/pages/widget/amchart/serial.js"></script>
    <script src="<?= base_url() ?>/files/assets/pages/widget/amchart/gauge.js"></script>
    <script src="<?= base_url() ?>/files/assets/pages/widget/amchart/pie.js"></script>
    <script src="<?= base_url() ?>/files/assets/pages/widget/amchart/light.js"></script>
     <!-- Validation js -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
    <script type="text/javascript" src="..\files\assets\pages\form-validation\validate.js"></script>
    <!-- Custom js -->
    <script src="<?= base_url() ?>/files/assets/js/pcoded.min.js"></script>
    <script src="<?= base_url() ?>/files/assets/js/vartical-layout.min.js"></script>
    <script src="<?= base_url() ?>/files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/files/assets/pages/dashboard/crm-dashboard.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/files/assets/js/script.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body>

</html>
