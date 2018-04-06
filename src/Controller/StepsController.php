<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 21/03/2018
 * Time: 15:39
 */

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use App\Controller\CrudController;
use App\Repository\StepRepository;
use App\Services\semantic\StepsGui;
use Symfony\Component\HttpFoundation\Request;

Class StepsController extends CrudController{

public function __construct(StepsGui $gui,StepRepository $repo){
    $this->gui=$gui;
    $this->repository=$repo;
    $this->type="steps";
    $this->subHeader="Steps list";
    $this->icon="step forward";
}
/**
 * @Route("/steps", name="steps")
 */
public function index(){
    return $this->_index();
}

/**
 * @Route("/steps/refresh", name="steps_refresh")
 */
public function refresh(){
    return $this->_refresh();
}

/**
 * @Route("/steps/edit/{id}", name="steps_edit")
 */
public function edit($id){
    return $this->_edit($id);
}

/**
 * @Route("/steps/new", name="steps_new")
 */
public function add(){
    return $this->_add("\App\Entity\Step");
}

/**
 * @Route("/steps/update", name="steps_update")
 */
public function update(Request $request){
    return $this->_update($request, "\App\Entity\Step");
}

/**
 * @Route("/steps/confirmDelete/{id}", name="steps_confirm_delete")
 */
public function deleteConfirm($id){
    return $this->_deleteConfirm($id);
}

/**
 * @Route("/steps/delete/{id}", name="steps_delete")
 */
public function delete($id,Request $request){
    return $this->_delete($id, $request);
}
}