<?php

namespace Enutri\View\Helper;

use Cake\View\Helper;

/**
 * Helper para construção de grupos de botões
 * Utiliza a classe .btn-group do Twitter Bootstrap
 * 
 * @author Renato Uchoa <contato@renatouchoa.com.br>
 */
class ButtonGroupHelper extends Helper
{
    /**
     * Outros helpers utilizados
     * 
     * @var array
     */
    public $helpers = ['Html', 'Button'];
    
    /**
     * Constroi um grupo de botões
     * 
     * @param array $options
     * As chaves não reservadas são usadas como atributo/valor da tag
     * Chaves reservadas:
     * 'buttons'    Array com as opções dos botões
     * 
     * @return string HTML do grupo de botões
     */
    public function make($options)
    {
        // Configuração das chaves do array de opções
        $defaultOptions = [
            'buttons' => [],
            'class'   => '',
        ];
        $options = array_merge($defaultOptions, $options);
        
        // Construção do HTML dos botões
        $buttonsHtml = '';
        foreach ($options['buttons'] as $button) {
            $buttonsHtml .= $this->Button->make($button);
        }
        unset($options['buttons']);
        
        // Configuração da classe CSS do grupo
        $options['class'] = trim("btn-group {$options['class']}");
        
        // Constroi e retorna o HTML do grupo de botões
        return $this->Html->tag('div', $buttonsHtml, $options);
    }
}
