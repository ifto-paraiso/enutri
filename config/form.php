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
    'button' => '<button{{attrs}} class="btn btn-default">{{text}}</button>',
    'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}>',
    //'checkboxFormGroup' => '<label>{{input}} {{label}}</label>',
    'checkboxWrapper' => '<div class="checkbox">{{input}}{{label}}</div>',
    'dateWidget' => '{{year}}{{month}}{{day}}{{hour}}{{minute}}{{second}}{{meridian}}',
    'error' => '<div class="error-message">{{content}}</div>',
    'errorList' => '<ul>{{content}}</ul>',
    'errorItem' => '<li>{{text}}</li>',
    'file' => '<input type="file" name="{{name}}"{{attrs}}>',
    'fieldset' => '<fieldset>{{content}}</fieldset>',
    'formstart' => '<form{{attrs}}>',
    'formend' => '</form>',
    'formGroup' => '{{label}}{{input}}',
    'hiddenblock' => '<div style="display:none;">{{content}}</div>',
    'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}>',
    'password' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}>',
    'inputSubmit' => '<input class="btn btn-primary" type="{{type}}"{{attrs}}>',
    'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>',
    'inputContainerError' => '<div class="form-group {{type}}{{required}} has-error">{{content}}{{error}}</div>',
    'label' => '<label class="control-label" {{attrs}}>{{text}}</label>',
    'legend' => '<legend>{{text}}</legend>',
    'option' => '<option value="{{value}}"{{attrs}}>{{text}}</option>',
    'optgroup' => '<optgroup label="{{label}}"{{attrs}}>{{content}}</optgroup>',
    'select' => '<select class="form-control" name="{{name}}"{{attrs}}>{{content}}</select>',
    'selectMultiple' => '<select class="form-control" name="{{name}}[]" multiple="multiple"{{attrs}}>{{content}}</select>',
    'radio' => '<input type="radio" name="{{name}}" value="{{value}}"{{attrs}}>',
    'radioWrapper' => '<div class="radio"><label>{{input}} {{label}}</label></div>',
    'textarea' => '<textarea class="form-control" name="{{name}}"{{attrs}}>{{value}}</textarea>',
    'submitContainer' => '<div class="submit">{{content}}</div>',
];