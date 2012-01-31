<div class="pagination">
	<ul>

		<?php if ($page == 1): ?>
			<li class="prev disabled"><a>&larr; Previous</a></li>
		<?php else: ?>
			<li class="prev"><a href="<?php echo URL::site(Route::get($route)->uri(array_merge($route_params, array($route_page_param => $page-1)))); ?>">&larr; Previous</a></li>
		<?php endif; ?>

		<li <?php if ($page == 1): ?>class="active"<?php endif; ?>><a href="<?php echo URL::site(Route::get($route)->uri(array_merge($route_params, array($route_page_param => 1)))); ?>">1</a></li>

		<?php 
			$start_page = $page - ($show_max_pages) + 1;
			$end_page   = $page + ($show_max_pages) - 1;
			if ($end_page > $pages-1) { $end_page = $pages-1; }

			if ($start_page < 2 || $page == $pages && $pages <= $show_max_pages + 2) { $start_page = 2; }
			if ($end_page > $pages-1 || $page == 1 && 1 >= $show_max_pages - 2) { $end_page = $pages-1; }
		?>

		<?php if ($start_page > 2): ?> <li><a>...</a></li><?php endif; ?>

		<?php for($i=$start_page; $i<=$end_page; $i++): ?>
		<li <?php if ($page == $i): ?>class="active"<?php endif; ?>><a href="<?php echo URL::site(Route::get($route)->uri(array_merge($route_params, array($route_page_param => $i)))); ?>"><?php echo $i; ?></a></li>
		<?php endfor; ?>

		<?php if ($end_page < $pages-1): ?> <li><a>...</a></li><?php endif; ?>

		<li <?php if ($page == $pages): ?>class="active"<?php endif; ?>><a href="<?php echo URL::site(Route::get($route)->uri(array_merge($route_params, array($route_page_param => $pages)))); ?>"><?php echo $pages; ?></a></li>


		<?php if ($page == $pages): ?>
			<li class="next disabled"><a>Next &rarr;</a></li>
		<?php else: ?>
			<li class="next"><a href="<?php echo URL::site(Route::get($route)->uri(array_merge($route_params, array($route_page_param => $page+1)))); ?>">Next &rarr;</a></li>
		<?php endif; ?>

  </ul>
</div>