<?php

class AreaInstituicaosController extends AppController
{

    public $name = "AreaInstituicaos";
    public $components = array('Auth', 'Paginator', 'Flash');

    // var $scaffold;

    public function beforeFilter()
    {

        parent::beforeFilter();
        // Admin
        if ($this->Session->read('id_categoria') === '1') {
            $this->Auth->allow();
            // $this->Session->setFlash("Administrador");
            // Estudantes
        } elseif ($this->Session->read('id_categoria') === '2') {
            $this->Auth->allow('index', 'view');
            // $this->Session->setFlash("Estudante");
        } elseif ($this->Session->read('id_categoria') === '3') {
            $this->Auth->allow('index', 'view');
            // $this->Session->setFlash("Professor");
            // Professores, Supervisores
        } elseif ($this->Session->read('id_categoria') === '4') {
            $this->Auth->allow('index', 'view');
            // $this->Session->setFlash("Professor/Supervisor");
        } else {
            $this->Session->setFlash("Não autorizado");
            // $this->redirect('/users/login/');
        }
        // die(pr($this->Session->read('user')));
    }

    public function index()
    {

        $this->AreaInstituicao->virtualFields['quantidadeArea'] = 'count(Instituicao.area_instituicoes_id)';

        $areas = $this->AreaInstituicao->find(
            'all',
            [
                'joins' => [
                    [
                        'table' => 'estagio',
                        'alias' => 'Instituicao',
                        'type' => 'left',
                        'conditions' => array('Instituicao.area_instituicoes_id = AreaInstituicao.id')
                    ]
                ],
                'fields' => array('AreaInstituicao.id', 'AreaInstituicao.area', 'count(Instituicao.area_instituicoes_id) as AreaInstituicao__quantidadeArea'),
                'group' => array('AreaInstituicao.id'),
                'order' => array('AreaInstituicao.area')
            ]
        );

        // pr($areas);
        $this->set('areas', $areas);
    }

    public function view($id = NULL)
    {

        $area = $this->AreaInstituicao->find(
            'first',
            array(
                'conditions' => array('AreaInstituicao.id' => $id)
            )
        );
        // pr($supervisor);

        $this->set('area', $area);
    }

    public function edit($id = NULL)
    {

        $this->AreaInstituicao->id = $id;

        if (empty($this->data)) {
            $this->data = $this->AreaInstituicao->read();
        } else {
            if ($this->AreaInstituicao->save($this->data)) {
                // print_r($this->data);
                // die();
                $this->Flash->success(__("Atualizado"));
                $this->redirect('/AreaInstituicaos/view/' . $id);
            }
        }
    }

    public function add()
    {

        if ($this->data) {
            if ($this->AreaInstituicao->save($this->data)) {
                $this->Flash->success(__('Dados inseridos'));
                $this->redirect('/AreaInstituicaos/view/' . $this->AreaInstituicao->getLastInsertId());
            }
        }
    }

    public function delete($id = null)
    {

        $area = $this->AreaInstituicao->find(
            'first',
            array(
                'conditions' => array('AreaInstituicao.id' => $id)
            )
        );

        // $this->loadModel('Estagiario');
        /*
        $estagiarios = $this->AreaInstituicao->Estagiario->find('first', array(
        'conditions' => 'Estagiario.id_area = ' . $id));
        // pr($estagiarios);
        if ($estagiarios) {
        $this->Session->setFlash("Error: Há estagiários vinculados com esta área");
        // die("Estagiarios vinculados com essa área");
        $this->redirect('/AreaInstituicao/view/' . $id);
        } else {
        */
        $this->AreaInstituicao->delete($id);
        $this->Flash->success(__("Área excluída"));
        // die("Área excluída");
        $this->redirect('/AreaInstituicaos/index/');
    }

}

?>