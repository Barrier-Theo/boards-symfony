<?php

namespace App\Services\semantic;

use Ajax\semantic\html\elements\HtmlLabel;
use App\Entity\Tag;
use Ajax\semantic\html\base\constants\Color;

class TagsGui extends SemanticGui{
	public function dataTable($tags,$type){
		$dt=$this->_semantic->dataTable("dt-".$type, "App\Entity\Tag", $tags);
		$dt->setFields(["tag"]);
		$dt->setCaptions(["Tag"]);
		$dt->setValueFunction("tag", function($v,$tag){
			$lbl=new HtmlLabel("",$tag->getTitle());
			$lbl->setColor($tag->getColor());
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
        $dt->setUrls(["edit"=>"developers/edit","delete"=>"developers/confirmDelete"]);
		$dt->setUrls(["edit"=>"tags/edit","delete"=>"tags/confirmDelete"]);
		$dt->setTargetSelector("#frm");
		return $dt;
	}

	public function dataForm($tags,$type,$di=null){
        $df=$this->_semantic->dataForm("frm-".$type,$tags);
        $df->setFields(["title\n","id\n","tilte"]);
        $df->setCaptions(["Modification","","Title"]);
        $df->fieldAsMessage(0,["icon"=>"info circle"]);
        $df->fieldAsHidden(1);
        $df->fieldAsInput("title",["rules"=>"empty"]);
        $df->setValidationParams(["on"=>"blur","inline"=>true]);
        $df->setSubmitParams("tags/update","#frm",["attr"=>"","hasLoader"=>false]);
        return $df;
    }
}

