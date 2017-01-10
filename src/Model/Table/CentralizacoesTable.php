<?php

namespace Enutri\Model\Table;

use ArrayObject;
use PDOException;
use RuntimeException;
use Cake\Event\Event;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
use Enutri\Model\Entity\Centralizacao;

/**
 * Repositório para manipulação de Centralizações
 */
class CentralizacoesTable extends EnutriTable
{
    /**
     * Inicialização da instância da classe
     * 
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        
        $this->belongsTo('Exercicios');
        $this->hasMany('CentralizacaoProcessos', [
            'foreignKey' => 'centralizacao_id',
        ]);
    }
    
    /**
     * Regras de validação default
     * 
     * @param Validator $validator
     * 
     * @return Validator
     */
    public function validationDefault(Validator $validator)
    {
        parent::validationDefault($validator);
        
        $validator->requirePresence('exercicio_id', 'create', 'Informe o Exercício');
        $validator->requirePresence('nome',         'create', 'Informe nome');
        
        $validator->notEmpty('exercicio_id', 'Informe o Exercício');
        $validator->notEmpty('nome',         'Informe nome');
        
        $validator->notBlank('nome',         'Informe nome');
        
        return $validator;
    }
    
    /**
     * Operações realizadas antes da validação dos dados
     * 
     * @param Event $event
     * @param ArrayObject $data
     * @param ArrayObject $options
     * 
     * @return void
     */
    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        \Enutri\Model\Util\Sanitize::trimFields($data, ['nome']);
    }    
    /**
     * Obtém a lista de centralizações cadastradas
     * 
     * @param array $options
     * 
     * @return \Cake\ORM\Query
     */
    public function listar(array $options = [])
    {
        $defaultOptions = [
            'contain' => [
                'CentralizacaoProcessos' => [
                    'Processos',
                ],
                'Exercicios',
            ],
            'order' => [
                'Exercicios.created DESC',
                'Centralizacoes.created DESC',
            ],
        ];
        $options = array_merge_recursive($defaultOptions, $options);
        return $this->find('all', $options);
    }
    
    /**
     * Obtém uma entidade com as informações da centralização especificada
     * 
     * @param int $centralizacaoId
     * @param array $options
     * 
     * @return \Enutri\Model\Entity\Centralizacao
     */
    public function localizar($centralizacaoId, array $options = [])
    {
        $defaultOptions = [
            'contain' => [
                'Exercicios',
                'CentralizacaoProcessos' => [
                    'Processos' => [
                        'ProcessoModalidades' => [
                            'Modalidades',
                        ],
                        'Cardapios' => [
                            'Atendimentos',
                            'Ingredientes' => [
                                'Alimentos',
                            ],
                        ],
                        'Participantes' => [
                            'Uexs',
                        ],
                    ],
                ],
            ],
        ];
        $options = array_merge_recursive($defaultOptions, $options);
        return $this->get($centralizacaoId, $options);
    }
    
    /**
     * Insere um conjunto de processos na centralização especificada
     * 
     * @param array $processos
     * O array de processos deve obedecer ao formato:
     * Array (
     *  [0] => Array (
     *      [processo_id] => 11
     *      [incluir] => 0
     *  )
     *  ...
     * )
     * 
     * @return int  Número de erros ocorridos na inserção dos processos
     */
    public function incluirProcessos (Centralizacao $centralizacao, array $processos = []) 
    {
        $errors         = 0;
        $processosTable = TableRegistry::get('Processos');
        $cpTable        = TableRegistry::get('CentralizacaoProcessos');
        
        foreach ($processos as $processo) {
            
            if ($processo['incluir'] == true) {
                
                /*
                 * Localiza o processo a ser inserido na centralização, cria
                 * e salva nova entidade CentralizaçãoProcesso
                 */
                try {
                    $processoEntity = $processosTable->get($processo['processo_id']);
                    $centralizacaoProcesso = $cpTable->newEntity();
                    $centralizacaoProcesso->processo_id      = $processoEntity->id;
                    $centralizacaoProcesso->centralizacao_id = $centralizacao->id;
                    $cpTable->save($centralizacaoProcesso);
                }
                
                /*
                 * Tratamento das excessões que podem ocorrer durante a 
                 * persistência da entidade CentralizaçãoProcesso
                 */
                catch (PDOException $e) {
                    $errors++;
                }
                
                /*
                 * Tratamento das excessões que podem ocorrer durante a
                 * busca do processo a ser inserido na centralização
                 */
                catch (RuntimeException $e) {
                    $errors++;
                }
            }
        }
        
        /*
         * Retorna a quantidade de erros ocorridos durante as inserções de
         * processos na centralização
         */
        return $errors;
    }
}
