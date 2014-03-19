<?php

class UsuariosController extends AppController {

    public $layout = "login";
    public $helpers = array('Html', 'Form', 'Session', 'Js');
    public $uses = array('Usunivel', 'Perfil', 'Statu', 'Usuario');

    public function login() {

        $this->layout = "login";
        $this->page_title = "Acessar minha conta";

        if ($this->Auth->login()) {
            if (CakeSession::check("Auth.User.id")) {
                return $this->redirect("/admin");
            }
            return $this->redirect($this->Auth->redirectUrl());
        } else {
            if ($this->request->is('post')) {
                $this->Session->setFlash('Usuário ou senha inválida.', 'default', array('class' => 'alert alert-error'));
            }
        }
    }

    public function settings() {
        if ($this->request->is('post')) {
            var_dump($this->request->data['atual']);
            if ($this->Usuario->isMatchPassword(CakeSession::read('Auth.User.id'), $this->request->data['atual'])) {
                $this->Usuario->id = CakeSession::read('Auth.User.id');
                $this->Usuario->save(array("password" => $this->request->data['nova_senha']));
                $this->Session->setFlash('Senha alterada', 'default', array('class' => 'alert alert-success'));
                $this->redirect("/login");
            } else {
                $this->Session->setFlash('A senha atual está incorreta. Tente novamente.', 'default', array('class' => 'alert alert-error'));
            }
        }
    }

    public function logout() {
        $this->Session->destroy();
        $this->Auth->logout();
        $this->redirect('/login');
    }

    public function add() {
        $usuniveis_selectbox = $this->Usunivel->find('list', array('fields' => array('Usunivel.id', 'Usunivel.nome')));
        $perfil_selectbox = $this->Perfil->find('list', array('fields' => array('Perfil.id', 'Perfil.nome')));
        $status_selectbox = $this->Statu->find('list' , array('fields' => array('Statu.id', 'Statu.nome')));
        $this->set(compact('usuniveis_selectbox', 'perfil_selectbox', 'status_selectbox'));
        if ($this->request->is('post')) {
            $conta = $this->Usuario->find('count',
                array('conditions' => array(
                    'Usuario.email' => $this->data['email']
                ))
            );
            if($conta == 0){
                $this->Usuario->create();
                if ($this->Usuario->saveAll($this->data)) {
                    $this->Session->setFlash(__('The Usuario has been saved'));
                    $this->redirect('/');
                } else {
                    $this->Session->setFlash(__('The Usuario could not be saved. Please, try again.'));
                }
            }else{
                $this->Session->setFlash('Este email já está cadastrado no sistema.', 'default', array('class' => 'alert alert-error'));
            }
        }
    }

    // redifinir senha

    public function redefinirsenha(){
        if($this->request->is('post')){
            $conta = $this->Usuario->find('count',
                array('conditions' => array(
                    'Usuario.email' => $this->data['emailcadastro']
                ))
            );
            if($conta == 1){
                $email = $this->data['emailcadastro'];
                $frase = 'Email  enviado para '.$email;
                $this->Session->setFlash($frase, 'default', array('class' => 'alert alert-success'));

            }else{
                $this->Session->setFlash('O email informado não existe no sistema.', 'default', array('class' => 'alert alert-error'));
            }
        }
        $this->redirect('/login');
    }

}




