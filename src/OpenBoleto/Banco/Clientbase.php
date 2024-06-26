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

use Mpdf\QrCode\QrCode;
use Mpdf\QrCode\Output;

class Clientbase extends BoletoAbstract
{
    protected $logomarca = 'logomarca.png';

    protected $codigoBanco = '462';

    protected $logoBanco = 'logomarca.png';

    protected $carteiras = array('1', '2', '5');

    protected $convenio = '12345';

    protected $numParcelas = '001';

    protected $localPagamento = 'Pagável em qualquer banco.';

    protected $modalidades = array('01','02','05');

    protected $codigo_de_barras;

    protected $qrcode_pix;

    protected $pix_copia_cola;

    public function getQrcodePix()
    {
        return $this->qrcode_pix;
    }

    public function getPixCopiaCola()
    {
        return $this->pix_copia_cola;
    }

    public function setQrcodePix($qrcode_pix)
    {
        if (!$qrcode_pix) {
            return $this;
        }
        $this->pix_copia_cola = $qrcode_pix;
        $qrcode_pix = new QrCode($qrcode_pix);
        $output = new Output\Png();
        $this->qrcode_pix = $output->output($qrcode_pix, 130);
        return $this;
    }

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
        return $this->nosso_numero;
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
