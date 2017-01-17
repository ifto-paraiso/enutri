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
 * Helper para auxiliar a construção de elementos Box (AdminLTE)
 * 
 * @link https://almsaeedstudio.com/themes/AdminLTE/pages/widgets.html
 */
class BoxHelper extends Helper
{
    /**
     * Outros helpers utilizados
     * @var array
     */
    public $helpers = ['Html', 'Toolbar', 'Icon'];
    
    private $boxOpened = false;
    
    /**
     * Flag. Se true, o corpo do Box foi aberto
     * 
     * @var boolean
     */
    private $bodyOpened = false;
    
    public function setBoxOpened($opened)
    {
        $this->boxOpened = (bool) $opened;
    }
    
    public function isBoxOpened()
    {
        return $this->boxOpened;
    }
    
    public function setBodyOpened($opened)
    {
        $this->bodyOpened = (bool) $opened;
    }
    
    public function isBodyOpened()
    {
        return $this->bodyOpened;
    }
    
    /**
     * Cria o HTML de abertura de um elemento Box
     * 
     * @param array $options Opções do box
     * Chaves pré reservadas:
     * 'style'
     * As demais chaves serão inseridas como propriedade/valor da tag
     * 
     * @return string
     */
    public function create($options = [])
    {
        $defaultOptions = [
            'class' => 'box-default',
        ];
        $options = array_merge($defaultOptions, $options);
        
        // Configura as classes CSS da Box
        $options['class'] = trim('box ' . $options['class']);

        $this->setBoxOpened(true);
        
        // Constroi e retorna o HTML de abertura do Box
        return $this->Html->tag('div', null, $options);
    }
    
    /**
     * Constroi o HTML do header da Box
     * 
     * @param array $options
     * Chaves reservadas
     * 'toolbar'
     * 'text'
     * 'icon'
     * 
     * @return string
     */
    public function header($options = [])
    {
        $defaultOptions = [
            'toolbar' => null,
            'text'    => '',
            'icon'    => null,
            'escape'  => false,
            'class'   => ''
        ];
        $options = array_merge($defaultOptions, $options);
        
        // Constroi o ícone, se tiver sido definido
        $iconHtml = '';
        if (null !== $options['icon']) {
            $iconHtml = $this->Icon->make($options['icon']);
        }
        unset($options['icon']);
        
        // Constroi o texto do header
        $textHtml = $this->Html->tag('h3', $iconHtml . $options['text'], ['class' => 'box-title']);
        unset($options['text']);
        
        // Constroi a toolbar
        $toolbarHtml = '';
        if (null !== $options['toolbar']) {
            $toolbarHtml = $this->Toolbar->make($options['toolbar']);
            $toolbarHtml = $this->Html->tag('div', $toolbarHtml, ['class' => 'box-tools']);
        }
        unset($options['toolbar']);
        
        $options['class'] = trim('box-header ' . $options['class']);
        
        // Constroi e retorna o HTML do header
        return $this->Html->tag('div', $textHtml . $toolbarHtml, $options);
    }
    
    /**
     * 
     * @param array $options
     * @return string
     */
    public function body(array $options = [])
    {
        $defaultOptions = [
            'class' => '',
        ];
        $options = array_merge($defaultOptions, $options);
        
        $options['class'] = trim('box-body ' . $options['class']);
        
        if ($this->isBodyOpened() === true) {
            trigger_error('Corpo da Box já está aberto.', E_USER_WARNING);
        }
        
        $this->setBodyOpened(true);
        
        return $this->Html->tag('div', null, $options);
    }
    
    /**
     * Retorna o HTML de fechamento do corpo de uma Box
     * 
     * @return string
     */
    public function bodyEnd()
    {
        if ($this->isBoxOpened() === false) {
            trigger_error('O Box não foi aberto.', E_USER_WARNING);
        }
        if ($this->isBodyOpened() === false) {
            trigger_error('O corpo da Box não está aberto.', E_USER_WARNING);
        }
        $this->setBodyOpened(false);
        return '</div>';
    }
    
    /**
     * Constrói o HTML de fechamento de uma Box
     * Encerra também o corpo da Box, se estiver aberto
     * 
     * @return string
     */
    public function end()
    {
        if ($this->isBoxOpened() === false) {
            trigger_error('O Box não foi aberto.', E_USER_WARNING);
        }
        $bodyEndHtml = '';
        if ($this->isBodyOpened() === true) {
            $bodyEndHtml .= $this->bodyEnd();
            $this->setBodyOpened(false);
        }
        return $bodyEndHtml . '</div>';
    }
}