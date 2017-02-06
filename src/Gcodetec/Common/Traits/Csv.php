<?php
namespace Gcodetec\Common\Traits;

use League\Csv\Reader;

trait Csv
{
    public function csvToArray($filePath)
    {
        $csv = Reader::createFromPath($filePath);
        return $csv->setOffset(1)->fetchAll();
    }

    public function fillArray($rows, $attributes)
    {
        $filledArray = [];
        foreach($rows as $row)
        {
            $fillAttributes = $this->merge($attributes, $row);
            $filledArray[] = $fillAttributes;
        }
        return $filledArray;
    }

    public function merge($attributes, $row)
    {
        $fillAttributes = [];
        foreach($attributes as $pos => $attribute){
            $v = $row[$pos];
            if($v == 'null'){
                $v = null;
            }elseif($v == ''){
                $v = null;
            }elseif(is_numeric($v)){
                $v = (int)$v;
            }
            $fillAttributes[$attribute] = $v;
        }
        return $fillAttributes;
    }
}
