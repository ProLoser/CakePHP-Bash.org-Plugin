<?php
App::uses('AppController', 'Controller');
/**
 * Quotes Controller
 *
 * @property Quote $Quote
 */
class QuotesController extends AppController {
	public $components = array('Paginator');
/**
 * Scans records from bash.org
 *
 * @param int $start page
 * @param int $end page
 */
	public function scan($start = 1, $stop = 1) {
		# don't forget the library
		App::uses('simple_html_dom', 'Bash.Vendor');

	    # this is the global array we fill with article information
	    $articles = array();

	    # passing in the first page to parse, it will crawl to the end
	    # on its own
		for ($i = $start; $i <= $stop; $i++) {
		    $page = 'http://bash.org/?browse&p=' . $i;
			global $articles;

		    $html = new simple_html_dom();
		    $html->load_file($page);

			$infos = $html->find('p[class=quote]');
		    $items = $html->find('p[class=qt]');  

		    foreach ($items as $j => $quote) {
				$a = $infos[$j]->find('a');
				$id = substr($a[0]->getAttribute('href'), 1);
		        # remember comments count as nodes
		        $articles[] = array(
					'bash_id' => $id, 
					'quote' => $quote->innertext(),
					'rank' => substr(substr($infos[$j]->text(), 4 + strlen($id)), 0, -6),
				);
		    }
		}
		$this->Quote->saveMany($articles);
		$this->set('page', $stop);
		$this->set('quotes', $articles);
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Quote->recursive = 0;
		if (!empty($this->request->data['Quote']['search'])) {
			$this->request->params['named']['search'] = $this->request->data['Quote']['search'];
		}
		if (!empty($this->request->params['named']['search'])) {
			$this->Paginator->settings['conditions'] = array("Quote.quote LIKE '%" . $this->request->params['named']['search'] . "%'");
		}
		$this->set('quotes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Quote->id = $id;
		if (!$this->Quote->exists()) {
			throw new NotFoundException(__('Invalid quote'));
		}
		$this->set('quote', $this->Quote->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Quote->create();
			if ($this->Quote->save($this->request->data)) {
				$this->Session->setFlash(__('The quote has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quote could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Quote->id = $id;
		if (!$this->Quote->exists()) {
			throw new NotFoundException(__('Invalid quote'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Quote->save($this->request->data)) {
				$this->Session->setFlash(__('The quote has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quote could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Quote->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Quote->id = $id;
		if (!$this->Quote->exists()) {
			throw new NotFoundException(__('Invalid quote'));
		}
		if ($this->Quote->delete()) {
			$this->Session->setFlash(__('Quote deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Quote was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
