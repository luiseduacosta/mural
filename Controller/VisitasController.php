<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class VisitasController extends AppController
{

    public $name = "Visitas";
    public $components = array('Auth', 'Paginator', 'Flash');

    public function beforeFilter()
    {

        parent::beforeFilter();
        // Admin
        if ($this->Session->read('id_categoria') == '1') {
            $this->Auth->allow();
            // $this->Session->setFlash("Administrador");
            // Estudantes
        } elseif ($this->Session->read('id_categoria') == '2') {
            $this->Session->setFlash("Estudante não autorizado");
            $this->redirect('/murals/index/');
        } elseif ($this->Session->read('id_categoria') == '3') {
            $this->Auth->allow('add', 'edit', 'excluir', 'index', 'view');
            // $this->Session->setFlash("Professor");
            // Professores, Supervisores
        } elseif ($this->Session->read('id_categoria') == '4') {
            $this->Auth->allow('index', 'view', 'busca');
            // $this->Session->setFlash("Supervisor");
        } else {
            $this->Flash->error(__("Não autorizado"));
            $this->redirect('/murals/index/');
        }
    }

    public function index()
    {

        $this->Paginator->settings = [
            'Visita' => [
                'limit' => 10,
                'order' => ['data']
            ]
        ];

        $this->set('visitas', $this->Paginator->paginate('Visita'));
    }

    public function add($id = NULL)
    {

        $parametros = $this->params['named'];
        $instituicao_id = isset($parametros['instituicao_id']) ? $parametros['instituicao_id'] : NULL;

        if (!$instituicao_id) {
            $instituicao_id = $this->request->query("instituicao_id");
        }

        // Capturo e envio o id da instituicao se houver
        if ($instituicao_id == null) {
            $instituicao_id = $id;
            // pr($instituicao_id);
            $this->set('instituicao_id', $instituicao_id);
        } else {
            $this->Flash->error(__('Selecione uma instituição'));
            $this->redirect('/instituicaos/lista');
        }
        // Mostar as visitas anteriores
        $visitas = $this->Visita->find(
            'all',
            [
                'conditions' => ['Visita.estagio_id' => $instituicao_id]
            ]
        );

        if (!empty($visitas)) {
            $this->set('visitas', $visitas);
        }
        ;
        // pr($visitas);
        // $log = $this->Visita->getDataSource()->getLog(false, false);
        // debug($log);
        // die();
        // die();
        // Lista de selecao das insttuicoes
        $instituicoes = $this->Visita->Instituicao->find('list', array('order' => 'instituicao'));

        if ($this->data) {
            if ($this->Visita->save($this->data)) {
                $this->Flash->success(__('Dados da visita institucional inseridos!'));
                $this->redirect('/Visitas/view/' . $this->Visita->getLastInsertId());
            }
        }

        $this->set('instituicoes', $instituicoes);
    }

    public function edit($id = null)
    {

        $this->Visita->id = $id;

        if (empty($this->data)) {
            $this->data = $this->Visita->read();
        } else {
            if ($this->Visita->save($this->data)) {
                // print_r($this->data);
                $this->Session->setFlash("Atualizado");
                $this->redirect('/visitas/view/' . $id);
            }
        }
    }

    public function excluir($id = NULL)
    {
        $this->Visita->delete($id);
        $this->Session->setFlash('Visita institucional excluída');
        $this->redirect('/Visitas/index/');
    }

    public function view($id = NULL)
    {
        $visita = $this->Visita->find('first', array(
            'conditions' => array('Visita.id' => $id)
        )
        );
        // pr($visita);
        $this->set('visita', $visita);
    }

}