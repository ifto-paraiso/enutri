<?php

namespace Enutri\View\Helper;

use Cake\View\Helper;

/**
 * Helper para construção de ícones
 * 
 * @author Renato Uchôa <contato@renatouchoa.com.br>
 */
class IconHelper extends Helper
{
    /**
     * Classes CSS dos ícones padronizados
     * 
     * @var array
     */
    private $aliases = [];
    
    /**
     * Outros helpers utilizados
     * 
     * @var array
     */
    public $helpers = ['Html'];
    
    /**
     * Inicializador da classe
     * 
     * @param array $config
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        $defaultConfig = [
            'aliases' => null,
        ];
        $config = array_merge($defaultConfig, $config);
        if (null !== $config['aliases']) {
            $this->setAliases($config['aliases']);
        }
    }
    
    public function setAliases(array $aliases = [])
    {
        $this->aliases = $aliases;
    }
       
    /**
     * Constrói um ícone
     * 
     * @param string $class Classe CSS ou alias do ícone
     * @param array $options Array com as demais opções
     * 
     * @return string HTML do ícone
     */
    public function make($class, $options = [])
    {
        if (isset($this->aliases[$class])) {
            $class = $this->aliases[$class];
        }
        
        $defaultOptions = [
            'class' => '',
        ];
        
        $options = array_merge($defaultOptions, $options);
        
        $options['class'] = trim("{$class} {$options['class']}");
        
        return $this->Html->tag('i', '', $options);
    }
}