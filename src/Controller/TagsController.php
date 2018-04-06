<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Repository\TagRepository;
use App\Services\semantic\TagsGui;
use App\Entity\Tag;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class TagsController extends CrudController {


    public function __construct(TagsGui $gui,TagRepository $repo){
        $this->gui=$gui;
        $this->repository=$repo;
        $this->type="tags";
        $this->subHeader="tag list";
        $this->icon="tag";
}
    /**
     * @Route("/tags", name="tags")
     */
    public function index(){
        return $this->_index();
    }

    /**
     * @Route("/tags/refresh", name="tags_refresh")
     */
    public function refresh(){
        return $this->_refresh();
    }

    /**
     * @Route("/tags/edit/{id}", name="tags_edit")
     */
    public function edit($id){
        return $this->_edit($id);
    }

    /**
     * @Route("/tags/new", name="tags_new")
     */
    public function add(){
        return $this->_add("\App\Entity\Tag");
    }

    /**
     * @Route("/tags/update", name="tags_update")
     */
    public function update(Request $request){
        return $this->_update($request,"\App\Entity\Tag");
    }


    /**
     * @Route("/tags/confirmDelete/{id}", name="tags_confirm_delete")
     */
    public function deleteConfirm($id){
        return $this->_deleteConfirm($id);
    }


    /**
     * @Route("/tags/delete/{id}", name="tags_delete")
     */
    public function delete($id,Request $request){
        return $this->_delete($id, $request);
    }







    /*
    /**
     * @Route("/td3/tags", name="td3_tags")
     */

  /*  public function tags(TagsGui $gui,TagRepository $tagRepo){
    	$tags=$tagRepo->findAll();
    	$gui->dataTable($tags,'tags');
    	return $gui->renderView('tags/td3/index.html.twig');;
    }

    /**
     * @Route("td3/tag/update/{id}", name="td3_tag_update")
     */
    /* public function update(Tag $tag,TagsGui $tagsGui){
    	$tagsGui->frm($tag);
    	return $tagsGui->renderView('tags/td3/frm.html.twig');
    }

    /**
     * @Route("td3/tag/submit", name="tag_submit")
     */
    /* public function submit(Request $request,TagRepository $tagRepo){
    	$tag=$tagRepo->find($request->get("id"));
    	if(isset($tag)){
    		$tag->setTitle($request->get("title"));
    		$tag->setColor($request->get("color"));
    		$tagRepo->update($tag);
    	}
    	return $this->redirectToRoute("td3_tags");
    }*/
}
