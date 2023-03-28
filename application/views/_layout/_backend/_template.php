<!DOCTYPE HTML>
<html lang="en">

<?= @$_header?>

<body data-sidebar="dark">
    <div id="layout-wrapper">

		<?= @$_menu?>

		<?= @$_topnav?>
		
		<?= @$_sidebar?>
		
		<div class="main-content" id="result">
			<?= @$_content?>
        </div>
			
		
		<?=@$_footer?>
		
	</div>

	<!-- JAVASCRIPT -->
    <script src="<?=base_url()?>assets/backend/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?=base_url()?>assets/backend/libs/simplebar/simplebar.min.js"></script>
    <script src="<?=base_url()?>assets/backend/libs/node-waves/waves.min.js"></script>

	<script src="<?=base_url()?>assets/backend/js/app.js"></script>
</body>
</html>
