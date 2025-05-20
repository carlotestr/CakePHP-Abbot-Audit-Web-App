<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Event\Event;
use Cake\Routing\Router;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

  public function initialize()
   {
       parent::initialize();
       $this->Auth->allow(['login','logout']);

   }

  public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $login = $this->Auth->user();

        if (!is_null($login)) {

          $authorizedPositions = ['QA Analysts','QA Manager', 'Administrator','Agents/Employees','Supervisor/MSE','Operations Manager' ];
          $authorizedDefaultAccessibility = ['logout','profile','updateprofile'];

          $administrativePositions = ['QA Analysts','QA Manager', 'Administrator'];
          $administrativeDefaultAccessibility = ['index','view','add','edit','delete','profile','updateprofile','sendTemporaryPassword','passwordresetrequest','logout'];


          if ( ( in_array($login['emp_position'], $authorizedPositions)  && in_array($this->request->action, $authorizedDefaultAccessibility) ) || ( in_array($login['emp_position'], $administrativePositions)  && in_array($this->request->action, $administrativeDefaultAccessibility) ) ) {
           
           return true;

          } else {

            $this->Flash->error(__('Sorry!, User account restricted access.'));

            return $this->redirect(['action' => 'profile']);
          }
         
        } 

        // if (in_array($login['emp_position'], $authorizedPositions)) {
        //    return true;
        // } else {

        //   $this->redirect( Router::url( $this->referer(), true ) );
        //   $this->Flash->error(__('Sorry! Page restricted.'));

        // }

  }


    public function login()
    {
      if ($_POST) {
        $user = $this->Auth->identify();

        if ($user) {
            $this->Auth->setUser($user);
            return $this->redirect($this->Auth->redirectUrl());
        }
        $this->Flash->error(__('Invalid username or password, try again'));
      }
      
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));

        $login = $this->Auth->user();

        $this->set('login',$login);
        $this->set(compact('users','login'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id);
        $manager =  $this->Users->get($user['emp_manager'] );
        $supervisor =  $this->Users->get($user['emp_supervisor'] );
        $login = $this->Auth->user();
        
        $this->set('manager',$manager);
        $this->set('supervisor',$supervisor);
        $this->set('login',$login);
        $this->set('user', $user);
        $this->set(compact('user','login','manager','supervisor'));

    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {       
        
        // echo $date->format("Y");
        //$now->setDate(2013, 10, 31);
 
        $supervisorOptions = $this->Users->find('list', ['limit' => 200,'keyField' => 'id', 'valueField' => 'emp_fullname']);
        $managersOptions = $this->Users->find('list', ['limit' => 200,'keyField' => 'id', 'valueField' => 'emp_fullname']);

        $positionKeys = array("QA Analysts","QA Manager","Operations Manager","Supervisor/MSE","Agents/Employees","Administrator");
        $positionValues = array("QA Analysts","QA Manager","Operations Manager","Supervisor/MSE","Agents/Employees","Administrator");

        $employeePositionOptions = array_combine($positionKeys, $positionValues);

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $emp_hiredate = date_create($this->request->getData("emp_hiredate"));
            $emp_hiredate = date_format($emp_hiredate,"Y-m-d");
            $user["emp_hiredate"] = $emp_hiredate;
            $user["password"] = $this->request->getData('employee_id');
            $user["emp_username"] = $this->request->getData('employee_id');
            $user["emp_fullname"] = $this->request->getData('emp_firstname').' '.$this->request->getData('emp_lastname');
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The {0} has been saved.', 'User'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'User'));
        }
        $login = $this->Auth->user();
        
        $this->set('login',$login);
        $this->set(compact('user','login','managersOptions','supervisorOptions','employeePositionOptions'));
    }


    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
       
        $supervisorOptions = $this->Users->find('list', ['limit' => 200,'keyField' => 'id', 'valueField' => 'emp_fullname']);
        $managersOptions = $this->Users->find('list', ['limit' => 200,'keyField' => 'id', 'valueField' => 'emp_fullname']);


        $positionKeys = array("QA Analysts","QA Manager","Operations Manager","Supervisor/MSE","Agents/Employees","Administrator");
        $positionValues = array("QA Analysts","QA Manager","Operations Manager","Supervisor/MSE","Agents/Employees","Administrator");

        $employeePositionOptions = array_combine($positionKeys, $positionValues);

        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $emp_hiredate = date_create($this->request->getData("emp_hiredate"));
            $emp_hiredate = date_format($emp_hiredate,"Y-m-d");
            $user["emp_hiredate"] = $emp_hiredate;
            $user["emp_fullname"] = $this->request->getData('emp_firstname').' '.$this->request->getData('emp_lastname');
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The {0} has been saved.', 'User'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'User'));
        }
        $login = $this->Auth->user();
        
        $this->set('login',$login);
        $this->set(compact('user','login','supervisorOptions','managersOptions','employeePositionOptions'));
    }


    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The {0} has been deleted.', 'User'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'User'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function profile()
    {

      /**read all data from session of current login user**/
      // $session = $this->Auth->session->read();

      /**fetch user id in session*/
        $id = $this->Auth->session->read($this->Auth->sessionKey . '.id');

        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $login = $this->Auth->user();
        $this->set('login',$login);

        $this->set('user', $user);
    }

    public function search(){


      $users = $this->Users->find('search', ['search' => $this->request->query]);
      $usersCount = $users->count();

      $login = $this->Auth->user();
      $this->set('login',$login);

      $this->set(compact('users','usersCount','login'));
    }

    public function updateprofile()
    {

      $id = $this->Auth->session->read($this->Auth->sessionKey . '.id');

      $supervisorOptions = $this->Users->find('all');
        $managersOptions = $this->Users->find('all');

      $user = $this->Users->get($id, [
            'contain' => []
        ]);


        if ($this->request->is(['patch', 'post', 'put'])) {

            $user = $this->Users->patchEntity($user, $this->request->getData());

            $emp_hiredate = date_create($this->request->getData("emp_hiredate"));
            $emp_hiredate = date_format($emp_hiredate,"Y-m-d");
            $user["emp_hiredate"] = $emp_hiredate;

            // $birthdate = $this->request->getData("birthdate");
            // $birthdate = new \DateTime($birthdate);
            // $birthdate = $birthdate->format('Y-m-d');

            // $user["birthdate"] = $birthdate;
            if ($this->Users->save($user)) {

              // $this->Auth->session->write($this->Auth->sessionKey . '.role_id', $user->role_id);
              $this->Auth->session->write($this->Auth->sessionKey . '.emp_username', $user->emp_username);
              $this->Auth->session->write($this->Auth->sessionKey . '.emp_firstname', $user->emp_firstname);
              $this->Auth->session->write($this->Auth->sessionKey . '.emp_lastname', $user->emp_lastname);
              $this->Auth->session->write($this->Auth->sessionKey . '.image', $user->image);
              // $this->Auth->session->write($this->Auth->sessionKey . '.gender', $user->gender);
              $this->Auth->session->write($this->Auth->sessionKey . '.image_dir', $user->image_dir);
              // $this->Auth->session->write($this->Auth->sessionKey . '.is_active', $user->is_active);
              $this->Auth->session->write($this->Auth->sessionKey . '.created ', $user->created);
              $this->Auth->session->write($this->Auth->sessionKey . '.modified ', $user->modified);

                $this->Flash->success(__('User account details succesfully saved!'));

                return $this->redirect(['action' => 'profile']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'User'));
        }

        $login = $this->Auth->user();
        $this->set('login',$login);
        $this->set(compact('user','supervisorOptions','managersOptions'));
    }

     public function passwordresetrequest()
    {
        

            /**SEND EMAIL RESET PASSWORD FOR ACTIVE USER REQUEST PASSWORD RESET**/
             $email = $this->Auth->session->read($this->Auth->sessionKey . '.emp_email');

             $query = $this->Users->find()
                         ->WHERE(['emp_email =' => $email]);
                $row = $query->first();


                $queryCount = $query->count();

                $user = $this->Users->newEntity();

                if ($queryCount >= 1) {

                    function randomPassword() {
                            $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
                                $pass = array(); //remember to declare $pass as an array
                                $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
                                for ($i = 0; $i < 8; $i++) {
                                $n = rand(0, $alphaLength);
                                $pass[] = $alphabet[$n];
                               }
                                return implode($pass); //turn the array into a string
                                }

                    $user = $this->Users->get($row->id); // Return article with id 12
                    $password = randomPassword();
                    $this->request->data['password'] = $password;
                    $user->password = $this->request->data['password'];
                    $user->temp_password =  $password;
                    if ($this->Users->save($user)) {

                        $email = new Email();
                        $clientname = $row->emp_firstname . ' ' . $row->emp_lastname;
                        $newpassword = $this->request->data['password'];
                        $email->setViewVars(['user' => $user]);
                        $email->setViewVars(['newpassword' => $newpassword]);
                        $email
                        ->template('resetpassword', 'default')
                        ->emailFormat('html')
                        ->setto($row->emp_email)
                        ->setFrom('denny.itdwebdev@gmail.com','Abbot Diagnostic Support Team')
                        ->setSubject('Reset your password')
                        ->send('');                       

                    }

                    $this->Flash->success(__('Temporary password sent to your email.'));

                        return $this->redirect(['action' => 'profile']);
                }

        $login = $this->Auth->user();
        $this->set('login',$login);
        $this->set(compact('login'));
           

    }//eof password reset


     public function sendTemporaryPassword($email)
    {

            $emailAddress =  $email;

             $query = $this->Users->find()
                         ->WHERE(['emp_email =' => $email]);
                $row = $query->first();


                $queryCount = $query->count();

                $user = $this->Users->newEntity();

                if ($queryCount >= 1) {

                    function randomPassword() {
                            $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
                                $pass = array(); //remember to declare $pass as an array
                                $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
                                for ($i = 0; $i < 8; $i++) {
                                $n = rand(0, $alphaLength);
                                $pass[] = $alphabet[$n];
                               }
                                return implode($pass); //turn the array into a string
                                }

                    $user = $this->Users->get($row->id); // Return article with id 12
                    $password = randomPassword();
                    $this->request->data['password'] = $password;
                    $user->password = $this->request->data['password'];
                    $user->temp_password =  $password;
                    if ($this->Users->save($user)) {

                        $email = new Email();
                        $clientname = $row->emp_firstname . ' ' . $row->emp_lastname;
                        $newpassword = $this->request->data['password'];
                        $email->setViewVars(['user' => $user]);
                        $email->setViewVars(['newpassword' => $newpassword]);
                        $email
                        ->template('resetpassword', 'default')
                        ->emailFormat('html')
                        ->setto($row->emp_email)
                        ->setFrom('denny.itdwebdev@gmail.com','Abbot Diagnostic Support Team')
                        ->setSubject('Reset your password')
                        ->send('');                       

                    }

                    $this->Flash->success(__('Temporary password sent to email: '.$emailAddress));

                        return $this->redirect(['action' => 'index']);
                    //return $this->referer();
                }

        $login = $this->Auth->user();
        $this->set('login',$login);
        $this->set(compact('login'));
           

    }//eof password reset
}
