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

namespace Enutri\View\Helper;

use Cake\View\Helper;

/**
 * Helper para formatação de valores
 * 
 */
class FormatterHelper extends Helper
{
    public $helpers = ['Number'];
    
    protected $numberFormat = [
        'places' => 2,
        'precision' => 2,
        'locale' => 'pt_BR',
    ];
    
    public function float($value, array $options = [])
    {
        $options = array_merge($this->numberFormat, $options);
        return $this->Number->format($value, $options);
    }
    
    public function date(\DateTimeInterface $date)
    {
        return $date->i18nFormat('dd/MM/YYYY');
    }
    
    public function dateWeek(\DateTimeInterface $date)
    {
        return $date->i18nFormat("dd/MM/y '('E')'");
    }
    
    public function dateFull(\DateTimeInterface $date)
    {
        return $date->i18nFormat("dd 'de' MMMM 'de' y");
    }
}
