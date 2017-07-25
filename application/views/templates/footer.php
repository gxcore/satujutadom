

			</div><!-- /.col main -->			
		</div><!-- /.row main -->
    </div><!-- /.container -->
	
	<footer class="fixed-bottom">
		<div class="container">
			<div>
      <a class="navbar-brand text-right" href="https://www.kominfo.go.id" targeet="_blank">
		<img src="<?php echo base_url('assets'); ?>/images/kominfo-logo-white.png" alt="KOMINFO" height="35"></a> 2017 &copy; <a href="https://www.kominfo.go.id" targeet="_blank">KOMINFO</a> for 1 Juta Domain</div>
		</div>
	</footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<!--script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script-->
    <!--script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script-->
    <!--script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script-->
    <script src="<?php echo base_url('assets'); ?>/js/jquery-3.2.1.min.js"></script>
	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	
    <script src="<?php echo base_url('assets'); ?>/bootstrap/js/bootstrap.min.js"></script>
	<!--script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script-->
	
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://v4-alpha.getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets'); ?>/twbs-pagination/jquery.twbsPagination.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>

	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
	
    
	
	<script>
		<?php echo ($id) ? 'var id="'.$id.'"': ''; ?>
	</script>
	<?php
		
		$page_filename = str_replace("/","-",$page_filename);		
		echo ( file_exists( FCPATH.'assets/js/custom-js-'.$page_filename.'.js' ) ) ? '<script src="'.base_url('assets').'/js/custom-js-'.$page_filename.'.js"></script>' : ''; 
		
	?>
	<script src="<?php echo base_url('assets'); ?>/js/script.js"></script>
	
  </body>
</html>
