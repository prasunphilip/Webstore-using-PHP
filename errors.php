

<style>
	.error{
		padding: 10px;
		border: 1px solid #a94442;
		color: #a94442;
		background: #f2dede;
		border-radius: 5px;
	}
</style>

<?php if(count($errors) > 0): ?>
		
      		  <div class="error">
				<?php foreach($errors as $error): ?>
					<p><?php echo $error; ?></p>
				<?php endforeach ?>
			</div>
      		</div>

      
<?php endif ?>


