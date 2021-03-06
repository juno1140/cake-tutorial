<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\Event;
use Cake\Event\EventInterface;


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AuctionBaseController extends AppController
{
    public function initialize(): void
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        // 各種コンポーネントのロード
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize' => ['Controller'],
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'username',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginRedirect' => [
                'Controller' => 'Users',
                'action' => 'login',
            ],
            'logoutRedirect' => [
                'Controller' => 'Users',
                'action' => 'logout',
            ],
            'authError' => 'ログインしてください。',
        ]);
    }

    // ログイン処理
    function login()
    {
        // POST時の処理
        if($this->request->isPost()) {
            $user = $this->Auth->identify();
            // Authのidentifyをユーザーに指定
            if (!empty($user)) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('ユーザー名かパスワードが間違っています。');
        }
    }

    //ログアウト処理
    public function logout()
    {
        // セッション破棄
        $this->request->session()->destory();
        return $this->redirect($this->Auth->logout());
    }

    // 認証を使わないページの設定
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow([]);
    }

    // 認証時のロールのチェック
    public function isAuthorized($user = null)
    {
        // 管理者はTrue
        if ($user['role'] === 'admin') {
            return true;
        }
        // 一般ユーザーはAuctionControllerのみtrue、他はfalse
        if ($user['role'] === 'user') {
            if ($this->name == 'Auction') {
                return true;
            } else {
                return false;
            }
        }
        // 他はすべてfalse
        return false;
    }
}
