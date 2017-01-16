<?php

namespace Enutri\View\Helper;

use Cake\View\Helper;

/**
 * Helper para construção de Toolbars
 * Utiliza a classe .btn-toolbar do Twitter Boostrap
 * 
 * @author Renato Uchoa <contato@renatouchoa.com.br>
 */
class ToolbarHelper extends Helper
{
    /**
     * Outros helpers utilizados
     * 
     * @var array
     */
    public $helpers = ['Html', 'ButtonGroup'];
    
    /**
     * Constroi a toolbar
     * 
     * @param array $options Opções da toolbar
     * As chaves não reservadas serão utilizadas como atributo/valor da tag
     * Chaves reservadas:
     * 'groups':    Array com os grupos de botões
     * 
     * @return string HTML da Toolbar
     */
    public function make($options = [])
    {
        // Configura as opções default da toolbar
        $defaultOptions = [
            'groups' => [],
            'class'  => '',
        ];
        $options = array_merge($defaultOptions, $options);
        
        // Constroi o HTML dos grupos de botões
        $groupsHtml = '';
        foreach($options['groups'] as $group)
        {
            $groupsHtml .= $this->ButtonGroup->make($group);
        }
        unset($options['groups']);
        
        // Configura as classes CSS da toolbar
        $options['class'] = trim("btn-toolbar {$options['class']}");
        
        // Constroi e retorna o HTML da toolbar
        return $this->Html->tag('div', $groupsHtml, $options);
    }
}