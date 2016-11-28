<?php

/*
 * Copyright 2016 Denys.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace TIExpert\WSBoletoSantander;

/** Classe que representa os dados de um título de boleto a ser utilizado no WebService do banco Santander
 * 
 * @author Denys Xavier <equipe@tiexpert.net>
 */
class Titulo {

    /** @property string $nossoNumero Número do Título no Banco. */
    private $nossoNumero;

    /** @property string $seuNumero Número do Título no cliente. Opcional. */
    private $seuNumero;

    /** @property \DateTime $dataVencimento Data de vencimento do título. */
    private $dataVencimento;

    /** @property \DateTime $dataEmissao Data de emissão do Título. */
    private $dataEmissao;

    /** @property int $especie Código da Espécie do Documento. */
    private $especie;

    /** @property float $valor Valor nominal do título, com 2 casas decimais. */
    private $valor;

    /** @property string $mensagem Mensagem do boleto. */
    private $mensagem;

    /** @property InstrucoesDeTitulo $instrucoes Instruções do que o banco Santander deve fazer com o título bancário. */
    private $instrucoes;

    /** Cria uma nova instância de Titulo
     * 
     * @param float $valor Valor nominal do título com 2 casas decimais. 
     * @param string $nossoNumero Número do Título no Banco.
     * @param string $seuNumero Número do Título no cliente.
     * @param \DateTime $dataVencimento Data de vencimento do título.
     * @param string $mensagem Mensagem do boleto.
     * @param \DateTime $dataEmissao Data de emissão do Título.
     * @param int $especie Código da Espécie do Documento.      
     * @param \TIExpert\WSBoletoSantander\InstrucoesDeTitulo $instrucoes Instruções do que o banco Santander deve fazer com o título bancário.
     */
    public function __construct($valor, $nossoNumero, $seuNumero = NULL, $dataVencimento = NULL, $mensagem = NULL, $dataEmissao = NULL, $especie = NULL, InstrucoesDeTitulo $instrucoes = NULL) {
        if (is_null($dataVencimento)) {
            $dataVencimento = new \DateTime();
        }

        if (is_null($dataEmissao)) {
            $dataEmissao = new \DateTime();
        }

        $this->setNossoNumero($nossoNumero);
        $this->setSeuNumero($seuNumero);
        $this->setDataVencimento($dataVencimento);
        $this->setMensagem($mensagem);
        $this->setDataEmissao($dataEmissao);
        $this->setEspecie($especie);
        $this->setValor($valor);
        $this->setInstrucoes($instrucoes);
    }

    /** Obtém o número do título no banco.
     * 
     * @return string
     */
    public function getNossoNumero() {
        return $this->nossoNumero;
    }

    /** Obtém o número do Título no cliente.
     * 
     * @return string
     */
    public function getSeuNumero() {
        return $this->seuNumero;
    }

    /** Obtém a data de vencimento do título.
     * 
     * @return \DateTime
     */
    public function getDataVencimento() {
        return $this->dataVencimento;
    }

    /** Obtém a data de emissão do Título.
     * 
     * @return \DateTime
     */
    public function getDataEmissao() {
        return $this->dataEmissao;
    }

    /** Obtém o código da Espécie do Documento.
     * 
     * @return int
     */
    public function getEspecie() {
        return $this->especie;
    }

    /** Obtém o valor nominal do título, com 2 casas decimais.
     * 
     * @return float
     */
    public function getValor() {
        return $this->valor;
    }

    /** Obtém a mensagem do boleto.
     * 
     * @return string
     */
    public function getMensagem() {
        return $this->mensagem;
    }

    /** Obtém as instruções do que o banco Santander deve fazer com o título bancário.
     * 
     * @return InstrucoesDeTitulo
     */
    public function getInstrucoes() {
        return $this->instrucoes;
    }

    /** Determina o número do título no banco.
     * 
     * @param string $nossoNumero Número do Título no Banco.
     * @return \TIExpert\WSBoletoSantander\Titulo
     */
    public function setNossoNumero($nossoNumero) {
        $this->nossoNumero = $nossoNumero;
        return $this;
    }

    /** Determina o número do Título no cliente.
     * 
     * @param string $seuNumero Número do Título no cliente.
     * @return \TIExpert\WSBoletoSantander\Titulo
     */
    public function setSeuNumero($seuNumero) {
        $this->seuNumero = $seuNumero;
        return $this;
    }

    /** Determina a data de vencimento do título.
     * 
     * @param \DateTime $dataVencimento Data de vencimento do título.
     * @return \TIExpert\WSBoletoSantander\Titulo
     */
    public function setDataVencimento($dataVencimento) {
        try {
            $this->dataVencimento = Util::converterParaDateTime($dataVencimento);
        } catch (\Exception $ex) {
            throw $ex;
        }
        return $this;
    }

    /** Determina a data de emissão do Título.
     * 
     * @param \DateTime $dataEmissao Data de emissão do Título.
     * @return \TIExpert\WSBoletoSantander\Titulo
     */
    public function setDataEmissao($dataEmissao) {
        try {
            $this->dataEmissao = Util::converterParaDateTime($dataEmissao);
        } catch (\Exception $ex) {
            throw $ex;
        }
        return $this;
    }

    /** Determina o código da Espécie do Documento.
     * 
     * @param int $especie Código da Espécie do Documento.
     * @return \TIExpert\WSBoletoSantander\Titulo
     */
    public function setEspecie($especie) {
        $this->especie = $especie;
        return $this;
    }

    /** Determina o valor nominal do título, com 2 casas decimais.
     * 
     * @param float $valor Valor nominal do título, com 2 casas decimais.
     * @return \TIExpert\WSBoletoSantander\Titulo
     */
    public function setValor($valor) {
        $this->valor = $valor;
        return $this;
    }

    /** Determina as instruções do que o banco Santander deve fazer com o título bancário.
     * 
     * @param \TIExpert\WSBoletoSantander\InstrucoesDeTitulo $instrucoes
     * @return \TIExpert\WSBoletoSantander\Titulo
     */
    public function setInstrucoes(InstrucoesDeTitulo $instrucoes = NULL) {
        $this->instrucoes = $instrucoes;
        return $this;
    }

    /** Determina a mensagem do boleto.
     * 
     * @param string $mensagem Mensagem do boleto.
     * @return \TIExpert\WSBoletoSantander\Titulo
     */
    public function setMensagem($mensagem) {
        $this->mensagem = $mensagem;
        return $this;
    }

}