<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 27/03/2018
 * Time: 18:27
 */

namespace App\Controller;


use App\Repository\TaskRepository;
use App\Services\semantic\TasksGui;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Task;
use Symfony\Component\HttpFoundation\Response;

class TasksController extends CrudController
{
    public function __construct(TasksGui $gui,TaskRepository $repo){
        $this->gui=$gui;
        $this->repository=$repo;
        $this->type="tasks";
        $this->subHeader="task list";
        $this->icon="tasks";
    }
    /**
     * @Route("/tasks", name="tasks")
     */
    public function index(){
        return $this->_index();
    }

    /**
     * @Route("/tasks/refresh", name="tasks_refresh")
     */
    public function refresh(){
        return $this->_refresh();
    }

    /**
     * @Route("/tasks/edit/{id}", name="tasks_edit")
     */
    public function edit($id){
        return $this->_edit($id);
    }

    /**
     * @Route("/tasks/new", name="tasks_new")
     */
    public function add(){
        return $this->_add("\App\Entity\Task");
    }

    /**
     * @Route("/tasks/update", name="tasks_update")
     */
    public function update(Request $request){
        return $this->_update($request,"\App\Entity\Task");
    }


    /**
     * @Route("/tasks/confirmDelete/{id}", name="tasks_confirm_delete")
     */
    public function deleteConfirm($id){
        return $this->_deleteConfirm($id);
    }


    /**
     * @Route("/tasks/delete/{id}", name="tasks_delete")
     */
    public function delete($id,Request $request){
        return $this->_delete($id, $request);
    }
}