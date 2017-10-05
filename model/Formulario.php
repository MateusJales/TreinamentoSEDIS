<?php

	class Formulario 
	{
		private $_cpf, $_funcionario, $_nascimento, $_idade, $_salBase, $_salFamilia, $_abono, $_salBruto, $_inss, $_salLiquido;


		public function __construct($p_cpf, $p_funcionario, $p_nascimento, $p_salBase, $p_numFilhos)
		{
			$this->_cpf = $p_cpf;
			$this->_funcionario = $p_funcionario;
			$this->_nascimento = $p_nascimento;
			$this->_idade = $this->calculaIdade($p_nascimento);
			$this->_salBase = $p_salBase;
			$this->_salFamilia = $this->calculaSalFamilia($p_numFilhos);
			$this->_abono = $this->calculaAbono($this->_idade);
			$this->_salBruto = $this->calculaSalBruto($this->_abono, $this->_salFamilia, $this->_salBase);
			$this->_inss = $this->calculaInss($this->_salBase);
			$this->_salLiquido = $this->calculaSalLiquido($this->_salBruto, $this->_inss);
		}

		public function calculaSalFamilia ($p_numFilhos)
		{
			return 30 * $p_numFilhos;
		}

		public function calculaIdade ($p_nascimento)
		{
			return 2017 - $p_nascimento;
		}

		public function calculaAbono ($p_idade)
		{
			if( $p_idade > 40 )
			{
				return 800;
			}
			else
			{
				return 0;
			}
		}

		public function calculaSalBruto ($p_abono, $p_salFamilia, $p_salBase)
		{
			return $p_abono + $p_salFamilia + $p_salBase;
		}

		public function calculaInss ($p_salBase)
		{
			return 0.08 * $p_salBase;
		}

		public function calculaSalLiquido ($p_salBruto, $p_inss)
		{
			return $p_salBruto - $p_inss;
		}

		public function returnData()
		{
			return array(
				'_cpf' => $this->_cpf,
				'_funcionario' => $this->_funcionario,
				'_nascimento' => $this->_nascimento,
				'_idade' => $this->_idade,
				'_salBase' => $this->_salBase,
				'_salFamilia' => $this->_salFamilia,
				'_abono' => $this->_abono,
				'_salBruto' => $this->_salBruto,
				'_inss' => $this->_inss,
				'_salLiquido' => $this->_salLiquido
			);
		}
	}