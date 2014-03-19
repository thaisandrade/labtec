<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package        app.Controller
 * @link        http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    //public $layout = "default";
    public $layout = "labtec";

    public $uses = array('Configuracoes');

    public $page_title = "";

    public $busca_texto = "";

    public $banner_home = array();

    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => "/",
            'logoutRedirect' => "/login",
            'authError' => "É necessário fazer login",
            'authenticate' => array(
                'Form' => array(
                    'userModel' => 'Usuario',
                    'fields' => array('username' => 'email', 'password' => 'password')
                )
            )
        ),
        'RequestHandler'
    );

    public function beforeFilter() {
        // Determinando o tipo de criptografia
        Security::setHash('sha512');
        // permitindo o acesso as páginas públicas
        $this->Auth->allow();
    }

    public function beforeRender() {
        $this->set('title_for_layout', 'Labtec Projeto TCC' . (!empty($this->page_title) ? " - " . $this->page_title : ""));
        $this->set("busca_texto", $this->busca_texto);
        $this->set("usuario", CakeSession::read("Auth.User"));
        $configuracoes = $this->Configuracoes->find('first');
        $this->set(compact('configuracoes'));
        if ($this->request->is("ajax"))
            $this->layout = "ajax";
    }

    public function pr($var) {
        echo "<pre>";
        print_r($var);
        echo "</pre>";
    }

    public function prd($var) {
        $this->pr($var);
        die();
    }

    public function getIdsFromCheckboxArray($search_pattern, $this_data) {
        $keys = array_keys($this_data);
        $pre = preg_grep('/' . $search_pattern . '/', $keys);
        $arr_ids = array();
        foreach ($pre as $key) {
            array_push($arr_ids, $this_data[$key]);
        }
        return $arr_ids;
    }

    public function getArrayWithoutCheckbox($begin_text, $array_ids, $array_input) {
        foreach ($array_ids as $id) {
            unset($array_input[$begin_text . $id]);
        }
        return $array_input;
    }

    public function convertCheckboxInModel($model_name, $begin_text, $array_input) {
        $ids = $this->getIdsFromCheckboxArray($begin_text, $array_input);
        $array_input = $this->getArrayWithoutCheckbox($begin_text, $ids, $array_input);
        $array_input[$model_name] = $ids;
        return $array_input;
    }



    //Retira limite de memória.. afim de permitir processamento de grandes quantidades de informação
    public function unlimitMemory(){
        ini_set('memory_limit', '-1');
    }
}
