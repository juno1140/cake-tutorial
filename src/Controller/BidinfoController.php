<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Bidinfo Controller
 *
 * @property \App\Model\Table\BidinfoTable $Bidinfo
 * @method \App\Model\Entity\Bidinfo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BidinfoController extends AuctionController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Biditems', 'Users'],
        ];
        $bidinfo = $this->paginate($this->Bidinfo);

        $this->set(compact('bidinfo'));
    }

    /**
     * View method
     *
     * @param string|null $id Bidinfo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bidinfo = $this->Bidinfo->get($id, [
            'contain' => ['Biditems', 'Users', 'Bidmessages'],
        ]);

        $this->set(compact('bidinfo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bidinfo = $this->Bidinfo->newEmptyEntity();
        if ($this->request->is('post')) {
            $bidinfo = $this->Bidinfo->patchEntity($bidinfo, $this->request->getData());
            if ($this->Bidinfo->save($bidinfo)) {
                $this->Flash->success(__('The bidinfo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bidinfo could not be saved. Please, try again.'));
        }
        $biditems = $this->Bidinfo->Biditems->find('list', ['limit' => 200]);
        $users = $this->Bidinfo->Users->find('list', ['limit' => 200]);
        $this->set(compact('bidinfo', 'biditems', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bidinfo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bidinfo = $this->Bidinfo->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bidinfo = $this->Bidinfo->patchEntity($bidinfo, $this->request->getData());
            if ($this->Bidinfo->save($bidinfo)) {
                $this->Flash->success(__('The bidinfo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bidinfo could not be saved. Please, try again.'));
        }
        $biditems = $this->Bidinfo->Biditems->find('list', ['limit' => 200]);
        $users = $this->Bidinfo->Users->find('list', ['limit' => 200]);
        $this->set(compact('bidinfo', 'biditems', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bidinfo id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bidinfo = $this->Bidinfo->get($id);
        if ($this->Bidinfo->delete($bidinfo)) {
            $this->Flash->success(__('The bidinfo has been deleted.'));
        } else {
            $this->Flash->error(__('The bidinfo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
