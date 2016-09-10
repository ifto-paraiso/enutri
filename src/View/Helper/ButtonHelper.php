<?php

namespace Enutri\View\Helper;

use Cake\View\Helper;

/**
 * Constroi botões
 * 
 * Métodos que podem ser invocados dinamicamente
 * @method string default(string $text, array $options)
 * @method string primary(string $text, array $options)
 * @method string success(string $text, array $options)
 * @method string info(string $text, array $options)
 * @method string danger(string $text, array $options)
 * @method string warning(string $text, array $options)
 * @method string maroom(string $text, array $options)
 * @method string purble(string $text, array $options)
 * @method string navy(string $text, array $options)
 * @method string orange(string $text, array $options)
 * @method string olive(string $text, array $options)
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
     * Classes CSS para tamanhos pré-definidos
     * 
     * @var array
     */
    protected $sizes = [
        'normal' => '',
        'large'  => 'btn-lg',
        'small'  => 'btn-sm',
        'xsmall' => 'btn-xs',
    ];
    
    /**
     * Classes CSS para estilos pré-definidos
     * 
     * @var array
     */
    protected $styles = [
        'default' => 'btn-default',
        'primary' => 'btn-primary',
        'success' => 'btn-success',
        'info'    => 'btn-info',
        'danger'  => 'btn-danger',
        'warning' => 'btn-warning',
        'maroom'  => 'bg-maroom',
        'purple'  => 'bg-purple',
        'navy'    => 'bg-navy',
        'orange'  => 'bg-orange',
        'olive'   => 'bg-olive',
        'link'    => 'btn-link',
    ];
    
    /**
     * Constroi o botão
     * 
     * @param array $options
     * As chaves não reservadas serão inseridas como atributo/valor da tag
     * Chaves reservadas:
     * 'text'     Texto apresentado no botão
     * 'size'     Tamanos pré definidos (normal, large, small, xsmall)
     * 'style'    Estilos pré definidos (default, primary, succcess, etc...)
     * 'url       Href do botão  
     * 'flat'     Boolean
     * 'block'    Boolean
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
            'class'    => '',
            'size'     => 'normal',
            'style'    => 'default',
            'url'      => '#',
            'flat'     => false,
            'block'    => false,
            'icon'     => null,
            'iconLeft' => true,
            'tag'      => 'link',
            'escape'   => false,
        ];
        
        $options = array_merge($defaultOptions, $options);
        
        /**
         * Classes CSS básicas para formatar o botão
         * 
         * @var string
         */
        $classes = ['btn'];
        
        // Configura o texto apresentado no botão
        $text = $options['text'];
        unset($options['text']);
        
        // Configura o tamanho do botão...
        if (!array_key_exists($options['size'], $this->sizes)) {
            $options['size'] = 'normal';
        }
        $classes[] = $this->sizes[$options['size']];
        unset($options['size']);
        
        // Configura o estilo do botão...
        if (!array_key_exists($options['style'], $this->styles)) {
            $options['style'] = 'default';
        }
        $classes[] = $this->styles[$options['style']];
        unset($options['style']);
        
        // Configura a URL do botão...
        $url = $options['url'];
        unset($options['url']);
        
        // Configura a propriedade 'flat' do botão...
        if (false !== $options['flat']) {
            $classes[] = 'btn-flat';
        }
        unset($options['flat']);
        
        // Configura a propriedade 'block' do botão...
        if (false !== $options['block']) {
            $classes[] = 'btn-block';
        }
        unset($options['block']);
        
        // Configura o ícone do botão...
        $icon = '';
        if (null !== $options['icon']) {
            $icon = $this->Icon->make($options['icon']);
        }
        if (!$options['iconLeft']) {
            $text = sprintf('%s %s', $text, $icon);
        } else {
            $text = sprintf('%s %s', $icon, $text);
        }
        unset($options['icon']);
        unset($options['iconLeft']);
        
        $options['class'] = trim(sprintf('%s %s', $options['class'], implode(' ', $classes)));
        
        // Configura a tag do botão...
        $tag = $options['tag'];
        unset($options['tag']);
        
        // Constroi e retorna o botão, de acordo com a tag desejada
        switch ($tag) {
            case 'link':   return $this->makeLink($text, $url, $options);
            case 'button': return $this->makeButton($text, $options);
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
    
    public function submit($text = 'Salvar', $options = [])
    {
        $defaultOptions = [
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
     * [0]  Texto do botão
     * [1]  Array com as opções do botão
     * 
     * @return string HTML do botão
     */
    public function __call($method, $params)
    {
        $text    = isset($params[0]) ? $params[0] : '';
        $options = isset($params[1]) ? $params[1] : [];
        
        if (array_key_exists($method, $this->styles)) {
            $options['style'] = $method;
            return $this->make($text, $options);
        }
    }
}