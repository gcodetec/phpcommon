<?php

namespace Gcodetec\Common\Html;

use HtmlGenerator\HtmlTag;

class Table
{
    public static function render($headers, $rows, array $attrs = array('class' => "table"))
    {
        $table = HtmlTag::createElement('table');
        
        foreach ($attrs as $attr => $value) {
            $table->set($attr, $value);
        }
        
        $table->addElement("tr");
        foreach($headers as $header){
            $table->addElement("th")->text($header);
        }
        
        foreach($rows as $key => $row){
            $table->addElement("tr")->set("data-id", $key);
            foreach($row as $column){
                $table->addElement("td")->text($column);
            }
        }
        return $table;
    }
}
