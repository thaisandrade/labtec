<?php

class AdminController extends AppController {

    public $uses = array('Usuarios');

    public $components = array('Crop', 'Fit');

    public $layout = "admin";

    public function beforeFilter() {
        $this->Auth->deny();
        // linha importante para o sistema de usuarios
        if (!CakeSession::check("Auth.User.id")) {
            $this->redirect("/login");
        }

        $this->Crop->image_directory = 'files'; //image thumbs folder,
        //has to be in your webroot, has to be same folder of the orginal image file
        $this->Crop->quality = 90; // 0 for no compression at all, 100 for the best quality compression

    }

    public function index() {
        $total_categorias = $this->Categoria->find('count');
        $total_produtos = $this->Produto->find('count');
        $total_materiais = $this->Material->find('count');
        $this->set(compact('total_categorias', 'total_produtos', 'total_materiais'));
    }


    // CATEGORIAS ///////////////////////////////

    public function categoria($id = null) {
        if (is_numeric($id)) {
            $categoria_edit = $this->Categoria->findById($id);
            $this->set('categoria_edit', $categoria_edit);

            if ($this->request->is('post')) {
                if (empty($this->request->data['Categoria']['imagem']['tmp_name'])) {
                    unset($this->request->data['Categoria']['imagem']);
                    unset($this->request->data['Categoria']['imagem_dir']);
                }
                if (empty($this->request->data['Categoria']['imagem_topo']['tmp_name'])) {
                    unset($this->request->data['Categoria']['imagem_topo']);
                    unset($this->request->data['Categoria']['imagem_topo_dir']);
                }
                $this->Categoria->id = $id;
            }

        }
        if (isset($this->data['Categoria'])) {
            if ($this->Categoria->save($this->data['Categoria'])) {
                $this->Session->setFlash("Categoria cadastrada com sucesso.");
                $this->redirect('/admin/categoria');
            } else {
                debug($this->Cliente->validationErrors);
            }
        }

        $categorias = $this->Categoria->find('all');
        $this->set('categorias', $categorias);
    }

    public function categoria_delete($id = null) {
        if (is_numeric($id)) {
            $categoria = $this->Categoria->findById($id);
            if (empty($categoria['Produto'])) {
                $this->Categoria->delete($id);
                $this->Session->setFlash("Categoria excluida com sucesso.");
            } else {
                $this->Session->setFlash("Não é possível excluir uma categoria com produtos cadastrados.");
            }
        }
        $this->redirect('/admin/categoria');
    }



    // USUARIOS ///////////
    public function usuario($id = null) {
        if (is_numeric($id)) {
            $usuario_edit = $this->Usuario->findById($id);
            $this->set('usuario_edit', $usuario_edit);

            if ($this->request->is('post')) {
                $this->Usuario->id = $id;
            }
        }
        if (isset($this->data['Usuario'])) {
            if ($this->Usuario->save($this->data['Usuario'])) {
                $this->Session->setFlash("Usuário cadastrado com sucesso.");
                $this->redirect('/admin/usuario');
            } else {
                $this->Session->setFlash('Erro ao cadastrar o usuário, certifique que todos os campos estão preenchidos corretamente', "erro");
            }
        }
        $this->usuario_ativo();

    }
    public function usuario_ativo() {
        $usuarios = $this->Usuario->find('all');
        $this->set(compact('usuarios', $usuarios));
        $this->render('usuario');

    }

    //deletar um usuário
    public function usuario_delete($id = null) {
        if (!is_numeric($id)) {
            $this->redirect('/admin/usuario');
        }

        if ($this->Usuario->delete($id)) {
            $this->Session->setFlash("Usuário deletado com sucesso.");
        } else {
            $this->Session->setFlash('Erro ao cadastrar o usuário, certifique que todos os campos estão preenchidos corretamente', "erro");
        }
        $this->redirect('/admin/usuario');
    }
// finaliza a inserção de usuarios
}
