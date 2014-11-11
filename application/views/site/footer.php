        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/site.js"></script>
    <?php if (file_exists(FCPATH.'assets/js/'.$this->uri->segment(1).'.js')): ?>
    <script src="<?php echo base_url() ?>assets/js/<?php echo $this->uri->segment(1) ?>.js"></script>
    <?php endif; ?>
    <?php if (isset($jsFiles) ): foreach($jsFiles as $js): ?>
    <script src="<?php echo base_url() ?>assets/js/<?php echo $js ?>.js"></script>
    <?php endforeach; endif; ?>

</body>

</html>
