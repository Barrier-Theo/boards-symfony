<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 27/03/2018
 * Time: 18:44
 */

namespace App\Services\semantic;

use Ajax\php\symfony\JquerySemantic;
use Ajax\semantic\html\elements\HtmlLabel;
use App\Entity\Task;
use Ajax\semantic\html\base\constants\Color;

class TasksGui extends SemanticGui
{
    public function dataTable($tasks,$type){
        $dt=$this->_semantic->dataTable("dt-".$type, "App\Entity\Task", $tasks);
        $dt->setIdentifierFunction("getId");
        $dt->setFields(["content","idStory"]);
        $dt->setCaptions(["Task"]);
        $dt->setValueFunction("task", function($v,$tasks){
            $lbl=new HtmlLabel("",$tasks->getContent());
            return $lbl;
        });

        $dt->addEditDeleteButtons(false, [ "ajaxTransition" => "random","hasLoader"=>false ], function ($bt) {
            $bt->addClass("circular");
        }, function ($bt) {
            $bt->addClass("circular");
        });
        $dt->onPreCompile(function () use (&$dt) {
            $dt->getHtmlComponent()->colRight(1);
        });
        $dt->setUrls(["edit"=>"tasks/edit","delete"=>"tasks/confirmDelete"]);
        $dt->setTargetSelector("#frm");
        return $dt;
    }

    public function dataForm($tasks,$type,$di=null){
        $df=$this->_semantic->dataForm("frm-".$type,$tasks);
        $df->setFields(["content\n","id\n","content","1"]);
        $df->setCaptions(["Modification","","Content","idStory"]);
        $df->fieldAsMessage(0,["icon"=>"info circle"]);
        $df->fieldAsHidden(1);
        $df->fieldAsInput("content",["rules"=>"empty"]);
        $df->setValidationParams(["on"=>"blur","inline"=>true]);
        $df->setSubmitParams("tasks/update","#frm",["attr"=>"","hasLoader"=>false]);
        return $df;
    }
}