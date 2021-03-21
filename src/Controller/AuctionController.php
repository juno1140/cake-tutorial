<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Bidrequest;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\Event;
use Cake\Event\EventInterface;


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AuctionController extends AuctionBaseController
{
    // デフォルトテーブルは使わない
    public $useTable = false;

    public function initialize(): void
    {
        parent::initialize();
        // 各種コンポーネントのロード
        $this->loadComponent('Paginator');
        $this->loadModel('Users');
        $this->loadModel('Biditems');
        $this->loadModel('Bidrequests');
        $this->loadModel('Bidinfo');
        $this->loadModel('Bidmessages');
        // ログインしているユーザー情報をauthuserに設定
        $this->set('authuser', $this->Auth->user());
        // レイアウトをauctionに変更
        $this->viewBuilder()->setLayout('auction');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // ページネーションでBititemsを取得
        $auction = $this->paginate('Biditems', [
            'order' => ['endtime' => 'desc'],
            'limit' => 10
        ]);
        $this->set(compact('auction'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $biditem = $this->Biditems->get($id, [
            'contain' => ['Users', 'Bidinfo', 'Bidinfo.Users'],
        ]);
        // オークション終了時の処理
        if ($biditem->endtime < new \DateTime('now') and $biditem->finished == 0) {
            // finishedを1にして変更を保存
            $biditem->finished = 1;
            $this->Biditems->save($biditem);
            // Bidinfoを作成する
            $bidinfo = $this->Bidinfo->newEmptyEntity();
            // Bidinfoのbidt¥imte_idを$idに設定
            $bidinfo->biditem_id = $id;
            // 最高金額のBidrequestを検索
            $bidrequest = $this->Bidrequests->find('all', [
                'conditions' => ['biditem_id' => $id],
                'contain' => ['Users'],
                'order' => ['price' => 'desc'],
            ])->first();
            // Bidrequestが得られたときの処理
            if (!empty($bidrequest)) {
                // Bidinfoの各種プロパティを設定して保存する
                $bidinfo->user_id = $bidrequest->user->id;
                $bidinfo->user = $bidrequest->user;
                $bidinfo->price = $bidrequest->price;
                $this->Bidinfo->save($bidinfo);
            }
            // Biditemのbidinfoに$bidinfoを設定
            $biditem->bidinfo = $bidinfo;
        }
        // Bidrequestsからbiditem_idが$idのものを取得
        $bidrequests = $this->Bidrequests->find('all', [
            'conditions' => ['biditem_id' => $id],
            'contain' => ['Users'],
            'order' => ['price' => 'desc'],
        ])->toArray();
        // オブジェクト類をテンプレート用に設定
        $this->set(compact('biditem', 'bidrequests'));
    }

    // 出品する処理
    public function add()
    {
        $biditem = $this->Biditems->newEmptyEntity();
        // POST送信時
        if ($this->request->is('post')) {
            // フォーム内容を反映
            $biditem = $this->Biditems->patchEntity($biditem, $this->request->getData());
            if ($this->Biditems->save($biditem)) {
                $this->Flash->success(__('保存しました。'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('保存に失敗しました。もう一度入力してください。'));
        }
        $this->set(compact('biditem'));
    }

    public function bid($biditem_id = null)
    {
        $bidrequest = $this->Bidrequests->newEmptyEntity();
        $bidrequest->biditem_id = $biditem_id;
        $bidrequest->user_id = $this->Auth->user('id');
        // POST送信時
        if ($this->request->is('post')) {
            // フォーム内容を反映
            $bidrequest = $this->Bidrequests->patchEntity($bidrequest, $this->request->getData());
            if ($this->Bidrequests->save($bidrequest)) {
                $this->Flash->success(__('入札を送信しました。'));
                return $this->redirect(['action' => 'view', $biditem_id]);
            }
            $this->Flash->error(__('入札に失敗しました。もう一度入力してください。'));
        }
        $biditem = $this->Biditems->get($biditem_id);
        $this->set(compact('bidrequest', 'biditem'));
    }

    public function msg($bidinfo_id = null)
    {
        $bidmsg = $this->Bidmessages->newEmptyEntity();
        // POST送信時
        if ($this->request->is('post')) {
            // フォーム内容を反映
            $bidmsg = $this->Bidmessages->patchEntity($bidmsg, $this->request->getData());
            if ($this->Bidmessages->save($bidmsg)) {
                $this->Flash->success(__('保存しました。'));
            } else {
                $this->Flash->error(__('保存に失敗しました。もう一度入力してください。'));
            }
        }
        try {
            $bidinfo = $this->Bidinfo->get($bidinfo_id, ['contain'=>['Biditems']]);
        } catch (\Exception $e) {
            $bidinfo = null;
        }
        $bidmsgs = $this->Bidmessages->find('all', [
            'conditions' => ['bidinfo_id' => $bidinfo_id],
            'contain' => ['Users'],
            'order' => ['created' => 'desc'],
        ]);
        $this->set(compact('bidmsgs', 'bidinfo', 'bidmsg'));
    }

    public function home()
    {
        $bidinfo = $this->paginate('Bidinfo', [
            'conditions' => ['Bidinfo.user_id' => $this->Auth->user('id')],
            'contain' => ['Users', 'Biditems'],
            'order' => ['created' => 'desc'],
            'limit' => 10
        ])->toArray();
        $this->set(compact('bidinfo'));
    }

    public function home2()
    {
        $biditems = $this->paginate('Biditems', [
            'conditions' => ['Biditems.user_id' => $this->Auth->user('id')],
            'contain' => ['Users', 'Bidinfo'],
            'order' => ['created' => 'desc'],
            'limit' => 10
        ])->toArray();
        $this->set(compact('biditems'));
    }


}
