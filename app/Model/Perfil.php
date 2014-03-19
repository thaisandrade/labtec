<?php

class Perfil extends AppModel{
    public $hasMany = array('Usuario');
    public $name = 'Perfil';
}