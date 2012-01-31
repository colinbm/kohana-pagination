<?php defined('SYSPATH') or die('No direct script access.');

class Pagination {

	protected $result, $per_page, $page, $pages, $start, $total;

	public $route_page_param = 'page';
	public $show_max_pages   = 10;

	public function __construct(ORM $result, $page=1, $route, array $route_params=array(), $per_page=10) {
		$this->result       = $result;
		$this->route        = $route;
		$this->route_params = $route_params;
		$this->per_page     = $per_page;
		$this->page         = $page;
		$this->start        = $per_page * ($page-1);
		$this->total        = $this->result->find_all()->count();
		$this->pages        = ceil($this->total / $this->per_page);
	}

	public function count() {
		return $this->get_result_set()->find_all()->count();
	}

	public function result() {
		return $this->get_result_set()->find_all();
	}

	protected function get_result_set() {
		return $this->result->offset($this->start)->limit($this->per_page);
	}

	public function render() {
		$view = View::factory('pagination/render');
		$view->result             = $this->result;
		$view->page               = $this->page;
		$view->pages              = $this->pages;
		$view->route              = $this->route;
		$view->route_params       = $this->route_params;
		$view->route_page_param   = $this->route_page_param;
		$view->show_max_pages     = $this->show_max_pages;
		return $view->render();
	}

}