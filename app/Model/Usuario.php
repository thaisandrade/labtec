<?php

class Usuario extends AppModel {
    public $belongsTo = array('Usunivel', 'Statu', 'Perfil');
    public $name = 'Usuario';
    public $validate = array(
        'email' => array(
            'required' => array('rule' => 'notEmpty', 'message' => 'Um endereço de email é requerido'),
            'email' => array('rule' => 'email', 'message' => 'Endereço de email inválido')
        ),
        'password' => array(
            'required' => array('rule' => 'notEmpty', 'message' => 'Uma senha é requerida'),
            'minLength' => array('rule' => array('minLength', 6), 'message' => 'A senha deve ter mais de 6 caracteres')
        )
    );

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }

    public function isMatchPassword($uid, $password) {
        $user = $this->findById($uid);
        $password_encryp_db = $user['Usuario']['password'];
        $password_encryp_test = AuthComponent::password($password);
        $verification = ($password_encryp_db . "" == $password_encryp_test . "");
        return $verification;
    }

}