<?php 
    class LivroFisico extends Livro { 
        
        private $taxaImpressao;

        function getTaxaImpressao() {
            return $this->taxaImpressa;
        }
        
        function setTaxaImpressao($taxaImpressao) { 
            $this->taxaImpressao = $taxaImpressao;
        }
    }

?>