<?php
App::uses('AppController', 'Controller');
/**
 * Words Controller
 *
 * @property Word $Word
 */
class WordsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
        $this->paginate = array(
            'order' => array('id' => 'desc'),
        );
		$this->Word->recursive = 0;
		$this->set('words', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Word->id = $id;
		if (!$this->Word->exists()) {
			throw new NotFoundException(__('Invalid word'));
		}
		$this->set('word', $this->Word->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Word->create();
            $this->request->data['Word']['user_id'] = $this->user['User']['id'];
			if ($this->Word->save($this->request->data)) {
				$this->Session->setFlash(__('The word has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The word could not be saved. Please, try again.'));
			}
		}
		$users = $this->Word->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Word->id = $id;
		if (!$this->Word->exists()) {
			throw new NotFoundException(__('Invalid word'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Word->save($this->request->data)) {
				$this->Session->setFlash(__('The word has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The word could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Word->read(null, $id);
		}
		$users = $this->Word->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Word->id = $id;
		if (!$this->Word->exists()) {
			throw new NotFoundException(__('Invalid word'));
		}
		if ($this->Word->delete()) {
			$this->Session->setFlash(__('Word deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Word was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
