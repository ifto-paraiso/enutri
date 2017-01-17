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

return [
    'nutrientes' => [
        array (
            'titulo' => 'Valor Energético',
            'alias'  => 'kcal',
            'medida' => 'kcal',
        ),
        array(
            'titulo' => 'Proteína',
            'alias'  => 'ptn',
            'medida' => 'g',
        ),
        array(
            'titulo' => 'Carboidrato',
            'alias'  => 'cho',
            'medida' => 'g',
        ),
        array(
            'titulo' => 'Lipídeo',
            'alias'  => 'lip',
            'medida' => 'g',
        ),
        array(
            'titulo' => 'Cálcio',
            'alias'  => 'ca',
            'medida' => 'mg',
        ),
        array(
            'titulo' => 'Ferro',
            'alias'  => 'fe',
            'medida' => 'mg',
        ),
        array(
            'titulo' => 'Magnésio',
            'alias'  => 'mg',
            'medida' => 'mg',
        ),
        array(
            'titulo' => 'Zinco',
            'alias'  => 'zn',
            'medida' => 'mg',
        ),
        array(
            'titulo' => 'Vitamina A',
            'alias'  => 'vita',
            'medida' => '&micro;g',
        ),
        array(
            'titulo' => 'Vitamina C',
            'alias'  => 'vitc',
            'medida' => 'mg',
        ),
    ],
    'faixas' => [
        array(
            'titulo' => '7~11m.',
            'nutrientes' => [
                'kcal' => 680,
                'cho'  => 95,
                'ptn'  => 11,
                'lip'  => 30,
                'ca'   => 270,
                'fe'   => 11,
                'mg'   => 75,
                'zn'   => 3,
                'vita' => 500,
                'vitc' => 50,
            ],
        ),
        array(
            'titulo' => '1~3a.',
            'nutrientes' => [
                'kcal' => 1010,
                'cho'  => 164,
                'ptn'  => 32,
                'lip'  => 25,
                'ca'   => 500,
                'fe'   => 7,
                'mg'   => 80,
                'zn'   => 3,
                'vita' => 300,
                'vitc' => 15,
            ],
        ),
        array(
            'titulo' => '4~5a.',
            'nutrientes' => [
                'kcal' => 1350,
                'cho'  => 227,
                'ptn'  => 43,
                'lip'  => 34,
                'ca'   => 800,
                'fe'   => 10,
                'mg'   => 130,
                'zn'   => 5,
                'vita' => 400,
                'vitc' => 25,
            ],
        ),
        array(
            'titulo' => '6~10a.',
            'nutrientes' => [
                'kcal' => 1510,
                'cho'  => 227,
                'ptn'  => 53,
                'lip'  => 43,
                'ca'   => 1300,
                'fe'   => 8,
                'mg'   => 240,
                'zn'   => 8,
                'vita' => 600,
                'vitc' => 45,
            ],
        ),
        array(
            'titulo' => '11~15a.',
            'nutrientes' => [
                'kcal' => 2175,
                'cho'  => 385,
                'ptn'  => 74,
                'lip'  => 59,
                'ca'   => 1300,
                'fe'   => 13,
                'mg'   => 385,
                'zn'   => 10,
                'vita' => 800,
                'vitc' => 70,
            ],
        ),
        array(
            'titulo' => '16~18a.',
            'nutrientes' => [
                'kcal' => 2497,
                'cho'  => 441,
                'ptn'  => 85,
                'lip'  => 67,
                'ca'   => 1300,
                'fe'   => 13,
                'mg'   => 385,
                'zn'   => 10,
                'vita' => 800,
                'vitc' => 70,
            ],
        ),
        array(
            'titulo' => '19~30a.',
            'nutrientes' => [
                'kcal' => 2265,
                'cho'  => 387,
                'ptn'  => 75,
                'lip'  => 60,
                'ca'   => 100,
                'fe'   => 13,
                'mg'   => 355,
                'zn'   => 10,
                'vita' => 800,
                'vitc' => 83,
            ],
        ),
        array(
            'titulo' => '31~60a.',
            'nutrientes' => [
                'kcal' => 2182,
                'cho'  => 373,
                'ptn'  => 72,
                'lip'  => 58,
                'ca'   => 1100,
                'fe'   => 11,
                'mg'   => 370,
                'zn'   => 10,
                'vita' => 800,
                'vitc' => 83,
            ],
        ),
    ],
];