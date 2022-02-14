 <!-- BEGIN: PAGE SCRIPTS -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/jquery/jquery_ui/jquery-ui.min.js"></script>
    <!-- <script src="vendor/jquery/jquery_migrate/jquery-migrate-3.0.0.min.js"></script> -->

    <!-- CanvasBG Plugin(creates mousehover effect) -->
    <script src="vendor/plugins/canvasbg/canvasbg.js"></script>

    <!-- Theme Javascript -->
    <script src="assets/js/utility/utility.js"></script>
    <script src="assets/js/demo/demo.js"></script>
    <script src="assets/js/main.js"></script>

    <!-- Page Javascript -->
    <script type="text/javascript">
    domready(function() {

        // Init Demo JS
        Demo.init();

        // Init Theme Core
        Core.init();

        // Init CanvasBG and pass target starting location
        CanvasBG.init({
            Loc: {
                x: window.innerWidth / 2,
                y: window.innerHeight / 3.3
            },
        });

    });
    </script>

    <!-- END: PAGE SCRIPTS -->

</body>

</html>