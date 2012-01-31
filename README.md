Kohana Pagination
=================

There are many like it, but this one is mine.

The default view uses the [Bootstrap](http://twitter.github.com/bootstrap) pagination markup.

Usage
-----

### Controller
```php
<?php

# Make sure you have <page> defined in your route (or a different parameter - see Pagination::$route_page_param

...

public function action_user() {
	$users = ORM::factory('users');
	# Add where clause, etc, here if filtering
	$pagination = new Pagination($users, $this->request->param('page'), 'admin_user');
	$this->template->content->pagination = $pagination;
}
```

### View
```php
<?php echo $pagination->render(); ?>

<?php foreach ($pagination->result() as $user): ?>
	Username: <?php echo $user->username; ?><br />
	Email: <?php echo $user->email; ?><br />
	<br />
<?php endforeach; ?>

<?php echo $pagination->render(); ?>
```