<?php

/**
 * ENUTRI: Sistema de Apoio à Gestão da Alimentação Escolar
 * Copyright (c) Renato Uchôa Brandão <contato@renatouchoa.com.br>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * 
 * @copyright (c)   Renato Uchôa Brandão <contato@renatouchoa.com.br>
 * @since           1.0.0
 * @license         https://www.gnu.org/licenses/gpl-3.0.html GPL v.3
 */

$this->extend('_ajuda');

$this->assign('content-icon', 'sobre');
$this->assign('content-description', 'Sobre o sistema');

echo $this->Box->create();

echo $this->Box->body();

?>

<h2>
    Sobre
</h2>
<p>
    O Enutri é sistema web concebido para auxiliar a gestão da alimentação escolar 
    nos estados e municípios, sendo desenvolvido a partir de um projeto de 
    pesquisa do curso Superior de Tecnologia em Gestão da Tecnologia da 
    Informação do Campus Paraíso do Tocantins do Instituto Federal de Educação, 
    Ciência e Tecnologia do Tocantins-IFTO, em parceria com a Prefeitura
    Municipal de Paraíso do Tocantins.
</p>

<h2>
    Versão atual
</h2>
<p>
    <?= Cake\Core\Configure::read('Version') ?>
</p>

<h2>
    Outras informações
</h2>

<ul>
    <li>
        <a href="https://github.com/renatouchoa/enutri" target="_blank">
            Repositório do projeto
        </a>
    </li>
    <li>
        <a href="https://github.com/renatouchoa/enutri/blob/master/CHANGELOG.md" target="_blank">
            Histórico das versões
        </a>
    </li>
    <li>
        <a href="https://github.com/renatouchoa/enutri/blob/master/LICENCE.md" target="_blank">
            Licença GPL v3
        </a>
    </li>
</ul>


<?php

echo $this->Box->end();
