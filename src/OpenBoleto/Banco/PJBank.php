<?php
/*
 * OpenBoleto - Geração de boletos bancários em PHP
 *
 * LICENSE: The MIT License (MIT)
 *
 * Copyright (C) 2013 Estrada Virtual
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this
 * software and associated documentation files (the "Software"), to deal in the Software
 * without restriction, including without limitation the rights to use, copy, modify,
 * merge, publish, distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to the following
 * conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies
 * or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED,
 * INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A
 * PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
 * SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

namespace OpenBoleto\Banco;

use OpenBoleto\BoletoAbstract;
use OpenBoleto\Exception;

class PJBank extends BoletoAbstract
{
    protected $codigoBanco = '301';

    protected $logoBanco = 'sicoob.jpg';

    protected $carteiras = array('1', '2', '5');

    protected $convenio = '12345';

    protected $numParcelas = '001';

    protected $localPagamento = 'Pagável em qualquer banco.';

    protected $modalidades = array('01','02','05');

    protected $codigo_de_barras;

    public function setCodigoDeBarras($codigo_de_barras)
    {
        $this->codigo_de_barras = $codigo_de_barras;
        return $this;
    }

    public function getCodigoDeBarras()
    {
        return $this->codigo_de_barras;
    }

    public function getNumeroFebraban()
    {
        return $this->codigo_de_barras;
    }

    public function getNossoNumero($incluirFormatacao = true)
    {
        return substr_replace($this->nosso_numero, ' ' . substr($this->nosso_numero, -1), 12, 1);
    }

    protected function gerarNossoNumero()
    {
       return $this;
    }

    protected function getDigitoVerificador()
    {
        return $this;
    }

    public function getCampoLivre()
    {
        return $this;
    }

    public function setModalidade($modalidade)
    {
        if (!in_array($modalidade, $this->getModalidades())) {
            throw new Exception("Modalidade não disponível!");
        }

        $this->modalidade = $modalidade;

        return $this;
    }

    public function setConvenio($convenio) {
        $this->convenio = $convenio;

        return $this;
    }

    public function getModalidade()
    {
        return $this->modalidade;
    }

    public function getModalidades()
    {
        return $this->modalidades;
    }

    public function getNumParcelas()
    {
        return $this->numParcelas;
    }

    public function setCarteira($carteira)
    {
        return $this;
    }

    public function getConvenio()
    {
        return $this->convenio;
    }
}
