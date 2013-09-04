<?php

namespace DataStructure\LinkedList;

/**
 * Class SingleList
 *
 * @package DataStructure\LinkedList
 */
class DoubleList extends SingleList
{
	/**
	 * @var DoubleNode
	 */
	protected $root = NULL;

	/**
	 * @return boolean
	 */
	public function isEmpty ()
	{
		return is_null($this->root);
	}

	/**
	 * @param mixed $item
	 *
	 * @return $this
	 */
	public function insertFirst ($item)
	{
		$node = new DoubleNode($item);

		$node->setNext($this->root);
		$this->root = $node;

		return $this;
	}

	/**
	 * @param mixed $item
	 *
	 * @return $this
	 */
	public function insertLast ($item)
	{
		$node = new DoubleNode($item);

		if ($this->isEmpty())
		{
			$this->root = $node;
		}
		else
		{
			$current = $this->root;
			while (!is_null($current->getNext()))
			{
				$current = $current->getNext();
			}
			$current->setNext($node);
		}
		return $this;
	}

	/**
	 * @return mixed
	 *
	 * @throws \UnderflowException
	 */
	public function extractFirst ()
	{
		if ($this->isEmpty())
		{
			throw new \UnderflowException('List is empty!');
		}
		$first       = $this->root->getValue();
		$this->root  = $this->root->getNext();

		return $first;
	}

	/**
	 * @return mixed
	 *
	 * @throws \UnderflowException
	 */
	public function extractLast ()
	{
		if ($this->isEmpty())
		{
			throw new \UnderflowException('List is empty!');
		}

		$current = $this->root;
		while (!is_null($current->getNext()))
		{
			$current = $current->getNext();
		}
		$current_value = $current->getValue();
		$current->getPreview()->removeNext();
		return $current_value;
	}

	public function dump ()
	{
		$list    = array();
		$current = $this->root;
		while (!is_null($current))
		{
			$list[]  = $current->getValue();
			$current = $current->getNext();
		}
		echo '<pre>'; print_r($list); echo '</pre>';
	}
}
