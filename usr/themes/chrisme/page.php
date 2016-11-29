<?php $this->need('header.php'); ?>

		  <div class="page">
		    <div class="post">
		      <h3 class="post-title">
			    <?php $this->title() ?>
			  </h3>
			  <div class="post-content">
			    <?php $this->content(); ?>
			  </div>
		    </div>
			<?php $this->need('comments.php'); ?>
		  </div>
		</div>
		
		<?php $this->need('sidebar.php'); ?>
		<?php $this->need('footer.php'); ?>