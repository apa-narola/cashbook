<?php

App::uses('AppController', 'Controller');

/**
 * Transactions Controller
 *
 * @property Transaction $Transaction
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TransactionsController extends AppController
{

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator', 'Session');

	/**
	 * Helpers
	 *
	 * @var array
	 */
	public $helpers = array('Js');

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index()
	{
		$this->Transaction->recursive = 0;
		if ($this->UserAuth->getGroupName() != 'Admin')
		{
			$this->Paginator->settings = array(
				'conditions' => array('Transaction.created_by' => $this->UserAuth->getUserId()),
				'limit' => 10
			);
		}
		$this->set('transactions', $this->Paginator->paginate());
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
		if (!$this->Transaction->exists($id))
		{
			throw new NotFoundException(__('Invalid transaction'));
		}
		$options = array('conditions' => array('Transaction.' . $this->Transaction->primaryKey => $id));
		$this->set('transaction', $this->Transaction->find('first', $options));
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
			$this->request->data["Transaction"]["created_by"] = $this->UserAuth->getUserId();
			$this->request->data["Transaction"]["created_on"] = date("Y-m-d H:i:s");

			$this->Transaction->create();
			if ($this->Transaction->save($this->request->data))
			{
				$this->Session->setFlash(__('The transaction has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else
			{
				$this->Session->setFlash(__('The transaction could not be saved. Please, try again.'));
			}
		}
		$transactionTypes = $this->Transaction->TransactionType->getTransactionTypes('list', 0);
		$transactionSubTypes = $this->Transaction->TransactionType->getTransactionTypes('list', 0);

		$transactionRecipients = $this->Transaction->TransactionRecipient->find('list', array('fields' => array("id", 'username')));
		$transactionCreatedBies = $this->Transaction->TransactionCreatedBy->find('list');
		$transactionUpdatedBies = $this->Transaction->TransactionUpdatedBy->find('list');
		$this->set(compact('transactionTypes', 'transactionSubTypes', 'transactionRecipients', 'transactionCreatedBies', 'transactionUpdatedBies'));
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
		if (!$this->Transaction->exists($id))
		{
			throw new NotFoundException(__('Invalid transaction'));
		}
		if ($this->request->is(array('post', 'put')))
		{
			$this->request->data["Transaction"]["updated_by"] = $this->UserAuth->getUserId();
			$this->request->data["Transaction"]["updated_on"] = date("Y-m-d H:i:s");
			if ($this->Transaction->save($this->request->data))
			{
				$this->Session->setFlash(__('The transaction has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else
			{
				$this->Session->setFlash(__('The transaction could not be saved. Please, try again.'));
			}
		} else
		{
			$options = array('conditions' => array('Transaction.' . $this->Transaction->primaryKey => $id));
			$this->request->data = $this->Transaction->find('first', $options);
		}
		$transactionTypes = $this->Transaction->TransactionType->getTransactionTypes('list', 0);
		$transactionSubTypes = $this->Transaction->TransactionSubType->find('list');
		$transactionRecipients = $this->Transaction->TransactionRecipient->find('list', array('fields' => array("id", 'username')));
		$transactionCreatedBies = $this->Transaction->TransactionCreatedBy->find('list');
		$transactionUpdatedBies = $this->Transaction->TransactionUpdatedBy->find('list');
		$this->set(compact('transactionTypes', 'transactionSubTypes', 'transactionRecipients', 'transactionCreatedBies', 'transactionUpdatedBies'));
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
		$this->Transaction->id = $id;
		if (!$this->Transaction->exists())
		{
			throw new NotFoundException(__('Invalid transaction'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Transaction->delete())
		{
			$this->Session->setFlash(__('The transaction has been deleted.'));
		} else
		{
			$this->Session->setFlash(__('The transaction could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	/**
	 * getByTransactionType method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function getTransactionTypeByParentId($transactionTypeId = null)
	{
		$subTransactionTypes = $this->Transaction->TransactionType->getTransactionTypes('list', $transactionTypeId);
		$this->set(get_defined_vars());
		$this->layout = 'ajax';
	}

}
