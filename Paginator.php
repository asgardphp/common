<?php
namespace Asgard\Common;

/**
 * Paginator.
 * @author Michel Hognerud <michel@hognerud.com>
 */
class Paginator implements PaginatorInterface {
	/**
	 * Number of elements per page.
	 * @var integer
	 */
	public $per_page;
	/**
	 * Total number of elements.
	 * @var integer
	 */
	public $total;
	/**
	 * Page number.
	 * @var integer
	 */
	public $page;
	/**
	 * HTTP request.
	 * @var \Asgard\Http\Request
	 */
	protected $request;

	/**
	 * Constructor.
	 * @param integer                    $total
	 * @param integer                    $page
	 * @param integer                    $per_page
	 * @param \Asgard\Http\Request       $request
	 */
	public function __construct($total, $page=1, $per_page=10, $request=null) {
		$this->per_page = $per_page;
		$this->total    = $total;
		$this->page     = $page ? $page:1;
		$this->request  = $request;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getPerPage() {
		return $this->per_page;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getPages() {
		return ceil($this->total/$this->per_page);
	}

	/**
	 * {@inheritDoc}
	 */
	public function getFirst() {
		$first = ($this->page-1)*$this->per_page+1;
		if($first > $this->total)
			return $this->total;
		else
			return $first;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getLast() {
		$last = $this->getFirst()-1+$this->getPerPage();
		if($last > $this->total)
			return $this->total;
		else
			return $last;
	}

	/**
	 * {@inheritDoc}
	 */
	public function render() {
		$r = '';
		if($this->page > 1)
			$r .= '<a href="'.$this->getPrev().'">«</a>';
		for($i=1; $i<=$this->getPages(); $i++)
			$r .= '<a href="'.$this->request->url->full(['page'=>$i]).'"'.($this->page === $i ? ' class="active"':'').'>'.$i.'</a>';
		if($this->page < $this->getPages())
			$r .= '<a href="'.$this->getNext().'">»</a>';
		return $r;
	}

	/**
	 * {@inheritDoc}
	 */
	public function hasPrev() {
		return ($this->page > 1);
	}

	/**
	 * {@inheritDoc}
	 */
	public function hasNext() {
		return ($this->page < $this->getPages());
	}

	/**
	 * {@inheritDoc}
	 */
	public function getPrev() {
		return $this->request->url->full(['page'=>$this->page-1]);
	}

	/**
	 * {@inheritDoc}
	 */
	public function getNext() {
		return $this->request->url->full(['page'=>$this->page+1]);
	}
}