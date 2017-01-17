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

/**
 * Autorização de usuários não autenticados
 */
$public = [
    'Acesso' => [
        'login'  => 'allow',
        'logout' => 'allow',
    ],
];

/**
 * Permissões de todos os usuários autenticados
 */
$usuario = [
    'Usuarios' => [
        'alterarSenha' => 'allow',
    ],
    'Painel' => [
        'index' => 'allow',
    ],
    'Ajuda'  => [
        'sobre' => 'allow',
    ],
];

/**
 * Coordenador de apoio escolar
 */
$uexCoord = [
    'Painel' => [
        'uex-coord' => 'allow',
    ],
    'Processos' => [
        'index'               => 'allow',
        'selecionarUex'       => 'allow',
        'listar'              => 'allow',
        'visualizar'          => 'allow',
        'cadastrar'           => 'allow',
        'editar'              => 'allow',
        'excluir'             => 'allow',
        'modalidadeInserir'   => 'allow',
        'modalidadeEditar'    => 'allow',
        'modalidadeRemover'   => 'allow',
        'relatorioPrevisao'   => 'allow',
        'relatorioResumo'     => 'allow',
        'relatorioCardapios'  => 'allow',
        'relatorioCalendario' => 'allow',
    ],
    'Cardapios' => [
        'visualizar'         => 'allow',
        'cadastrar'          => 'allow',
        'editar'             => 'allow',
        'excluir'            => 'allow',
        'ingredientesEditar' => 'allow',
        'ingredienteRemover' => 'allow',
        'atendimentosEditar' => 'allow',
        'atendimentoRemover' => 'allow',
    ],
];

/**
 * Assistente administrativo da Semec
 */
$eexAssist = [
    'Painel' => [
        'uex-coord'  => 'deny',
        'eex-assist' => 'allow',
    ],
    'Centralizacoes' => [
        'index'             => 'allow',
        'listar'            => 'allow',
        'visualizar'        => 'allow',
        'cadastrar'         => 'allow',
        'editar'            => 'allow',
        'excluir'           => 'allow',
        'processoIncluir'   => 'allow',
        'processoRemover'   => 'allow',
        'relatorioResumo'   => 'allow',
        'relatorioPrevisao' => 'allow',
        'relatorioMapa'     => 'allow',
    ],
];

/**
 * Nutricionista da EEx
 */
$eexNutri = [
    'Painel' => [
        'eex-assist' => 'deny',
        'eex-nutri'  => 'allow',
    ],   
    'Alimentos' => [
        'index'      => 'allow',
        'listar'     => 'allow',
        'visualizar' => 'allow',
        'cadastrar'  => 'allow',
        'editar'     => 'allow',
        'excluir'    => 'allow',
    ],
    'Processos' => [
        'aprovar'    => 'allow',
        'reprovar'   => 'allow',
    ],
];

/**
 * Coordenador da alimentação escolar
 */
$eexCoord = [
    'Painel' => [
        'eex-assist' => 'deny',
        'eex-coord'  => 'allow',
    ],   
    'Usuarios' => [
        'index'            => 'allow',
        'listar'           => 'allow',
        'visualizar'       => 'allow',
        'cadastrar'        => 'allow',
        'editar'           => 'allow',
        'excluir'          => 'allow',
        'lotacaoCadastrar' => 'allow',
        'lotacaoExcluir'   => 'allow',
        'redefinirSenha'   => 'allow',
    ],
    'Uexs' => [
        'index'      => 'allow',
        'listar'     => 'allow',
        'visualizar' => 'allow',
        'cadastrar'  => 'allow',
        'editar'     => 'allow',
        'excluir'    => 'allow'
    ],
    'Exercicios' => [
        'index'               => 'allow',
        'listar'              => 'allow',
        'cadastrar'           => 'allow',
        'visualizar'          => 'allow',
        'editar'              => 'allow',
        'excluir'             => 'allow',
        'participanteInserir' => 'allow',
        'participanteRemover' => 'allow',
        'participanteEditar'  => 'allow',
    ],
];

/**
 * Super Usuário
 */
$super = [];

// Configuração das heranças de permissões
$usuario   = array_merge_recursive($public,    $usuario);
$uexCoord  = array_merge_recursive($usuario,   $uexCoord);
$eexAssist = array_merge_recursive($uexCoord,  $eexAssist);
$eexNutri  = array_merge_recursive($eexAssist, $eexNutri);
$eexCoord  = array_merge_recursive($eexAssist, $eexCoord);
$super     = array_merge_recursive($super,     $eexNutri);
$super     = array_merge($super, $eexCoord);

// Finaliza e retorna o array de permissões
return [
    'Permissions' => [
        'public'        => $public,
        'usuario'       => $usuario,
        'uex_coord'     => $uexCoord,
        'eex_assist'    => $eexAssist,
        'eex_nutri'     => $eexNutri,
        'eex_coord'     => $eexCoord,
        'super'         => $super,
    ]
];
