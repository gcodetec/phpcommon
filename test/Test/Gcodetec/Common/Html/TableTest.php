<?php

namespace Tests\Gcodetec\Common\Html;

use Gcodetec\Common\Html\Table;
use PHPUnit_Framework_TestCase;

class TableTest extends PHPUnit_Framework_TestCase
{

    public function testRender()
    {
        $headers = ['Nome', 'Telefone', 'E-mail'];
        $rows = [
                ['George', '71555-7777', 'mycontact@gmail.com'],
                ['George Moura', '71555-7777', 'mycontact@gmail.com'],
                ['George Barros', '71555-7777', 'mycontact@gmail.com'],
        ];

        $table = Table::render($headers, $rows)->toString();
        
        $this->assertContains($rows[0][0], $table);
        $this->assertContains($rows[1][0], $table);
        $this->assertContains($rows[2][0], $table);
        $this->assertContains("<table", $table);
    }
}
