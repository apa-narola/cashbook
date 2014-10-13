<?php

App::uses('AppController', 'Controller');

/**
 * TransactionTypes Controller
 *
 * @property TransactionType $TransactionType
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TransactionTypesController extends AppController
{

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator', 'Session');

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index()
	{
		$this->TransactionType->recursive = 0;
		$this->set('transactionTypes', $this->Paginator->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null)
	{
		if (!$this->TransactionType->exists($id))
		{
			throw new NotFoundException(__('Invalid transaction type'));
		}
		$options = array('conditions' => array('TransactionType.' . $this->TransactionType->primaryKey => $id));
		$this->set('transactionType', $this->TransactionType->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add()
	{
		if ($this->request->is('post'))
		{
			if ($this->TransactionType->validates())
			{
				$this->TransactionType->create();
				if ($this->TransactionType->save($this->request->data))
				{
					$this->Session->setFlash(__('The transaction type has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else
				{
					$this->Session->setFlash(__('The transaction type could not be saved. Please, try again.'));
				}
			}
		}
		$activeParentTransactionTypesList = $this->TransactionType->getTransactionTypes("list",0);
		array_unshift($activeParentTransactionTypesList, "Please select"); // default parent
		$this->set(get_defined_vars());
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null)
	{
		if (!$this->TransactionType->exists($id))
		{
			throw new NotFoundException(__('Invalid transaction type'));
		}
		if ($this->request->is(array('post', 'put')))
		{
			if ($this->TransactionType->save($this->request->data))
			{
				$this->Session->setFlash(__('The transaction type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else
			{
				$this->Session->setFlash(__('The transaction type could not be saved. Please, try again.'));
			}
		} else
		{
			$options = array('conditions' => array('TransactionType.' . $this->TransactionType->primaryKey => $id));
			$this->request->data = $this->TransactionType->find('first', $options);
		}
		$activeParentTransactionTypesList = $this->TransactionType->getTransactionTypes("list",0);
		array_unshift($activeParentTransactionTypesList, "Please select"); // default parent
		$this->set(get_defined_vars());
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null)
	{
		$this->TransactionType->id = $id;
		if (!$this->TransactionType->exists())
		{
			throw new NotFoundException(__('Invalid transaction type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TransactionType->delete())
		{
			$this->Session->setFlash(__('The transaction type has been deleted.'));
		} else
		{
			$this->Session->setFlash(__('The transaction type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

}
