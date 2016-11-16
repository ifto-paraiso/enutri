<?php

namespace Enutri\View\Helper;

use Cake\View\Helper;

/**
 * Constroi botões
 * 
 * @return string HTML do botão
 * 
 * @author Renato Uchoa <contato@renatouchoa.com.br>
 */
class ButtonHelper extends Helper
{
    /**
     * Outros helpers utilizados
     * 
     * @var array
     */
    public $helpers = ['Html', 'Icon'];
    
    /**
     * Constroi o botão
     * 
     * @param array $options
     * As chaves não reservadas serão inseridas como atributo/valor da tag
     * Chaves reservadas:
     * 'text'     Texto apresentado no botão
     * 'url       Href do botão  
     * 'icon'     Classe do ícone (ou alias). Veja o IconHelper
     * 'iconLeft' Se falso, o ícone será construído à direita do texto
     * 'tag'      Tipo da tag do botão (link, button)
     * 
     * @return
     */
    public function make($options)
    {
        /**
         * Opções default do botão
         * 
         * @var array
         */
        $defaultOptions = [
            'text'     => '',
            'class'    => 'btn-default',
            'url'      => '#',
            'icon'     => null,
            'iconLeft' => true,
            'tag'      => 'link',
            'escape'   => false,
        ];
        
        $options = array_merge($defaultOptions, $options);
        
        $options['class'] = trim('btn ' . $options['class']);
        
        // Configura o texto apresentado no botão
        $textHtml = $options['text'];
        unset($options['text']);
        
        // Configura a URL do botão...
        $url = $options['url'];
        unset($options['url']);
        
        // Configura o ícone do botão...
        $iconHtml = '';
        if (null !== $options['icon']) {
            $iconHtml = $this->Icon->make($options['icon']);
        }
        if (true === (bool) $options['iconLeft']) {
            $textHtml = $iconHtml . $textHtml;
        } else {
            $textHtml = $textHtml . $iconHtml;
        }
        unset($options['icon']);
        unset($options['iconLeft']);
        
        // Configura a tag do botão...
        $tag = $options['tag'];
        unset($options['tag']);
        
        // Constroi e retorna o botão, de acordo com a tag desejada
        switch ($tag) {
            case 'a':
            case 'link':
                return $this->makeLink($textHtml, $url, $options);
            case 'button':
                return $this->makeButton($textHtml, $options);
        }
    }
    
    protected function makeLink($text, $url, $options)
    {
        return $this->Html->link($text, $url, $options);
    }
    
    protected function makeButton($text, $options = [])
    {
        return $this->Html->tag('button', $text, $options);
    }
    
    public function submit($options = [])
    {
        $defaultOptions = [
            'text'  => 'Salvar',
            'type'  => 'submit',
            'icon'  => 'salvar',
            'style' => 'primary',
            'tag'   => 'button',
        ];
        $options = array_merge($defaultOptions, $options);
        return $this->make($text, $options);
    }
    
    /**
     * Construção do botão utilizando o nome de um estilo pré definido
     * 
     * @param string $method Estilo pré definido
     * 
     * @param array $params  Parâmetros
     * Chaves:
     * [0]  Array com as opções do botão
     * 
     * @return string HTML do botão
     */
    public function __call($method, $params)
    {
        $options = is_array($params[0]) ? $params[0] : [];
        
        if (array_key_exists($method, $this->styles)) {
            $options['style'] = $method;
            return $this->make($options);
        }
    }
}