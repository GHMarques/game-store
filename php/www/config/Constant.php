<?php 
  class Constant {
    private function __construct() {}
    private function __clone() {}
    //Array with all the sentences used in the system
    public static $language = array(
      'GameStore' => 'Game Store',
      'Menu' => 'Menu',
      'Create' => 'Cadastrar',
      'Update' => 'Alterar',
      'Delete' => 'Deletar',
      'Email' => 'Email',
      'Password' => 'Senha',
      'Birth' => 'Data de nascimento',
      'Street' => 'Rua',
      'Number' => 'Número',
      'State' => 'Estado',
      'Complement' => 'Complemento',
      'Country' => 'País',
      'Options' => 'Opções',
      'Name' => 'Nome',
      'Clients' => 'Clientes',
      'Games' => 'Jogos',
      'Statistics' => 'Estatísticas',
      'Help' => 'Ajuda',
      'Search' => 'Buscar',
      'Create client' => 'Cadastrar cliente',
      'Confirm password' => 'Confirme a senha',
      'Only alphabet, please!' => 'Apenas letras!',
      'Must be a valid email!' => 'O email deve ser válido',
      'Submit' => 'Enviar',
      'Edit client' => 'Editar cliente',
      'Edit' => 'Editar',
      'Required fields' => 'Campos obrigatórios',
      'Password and confirm password must be equal!' => 'Senha e confirmação devem ser iguais!',
      'Are you sure you want to delete this client?' => 'Deseja deletar esse cliente?',
      'Agree' => 'Confirmar',
      'Disagree' => 'Cancelar',
      'Delete' => 'Deletar',
      'Store' => 'Loja',
      'Edit buy' => 'Editar compra',
      'Create buy' => 'Cadastrar compra',
      'Client' => 'Cliente',
      'Game' => 'Jogo',
      'Buy date' => 'Data da compra',
      'Price' => 'Preço',
      'Payment type' => 'Tipo de pagamento',
      'Must be a number!' => 'Deve ser um número!',
      'Main statistics' => 'Principais estatísticas',
      'Are you sure you want to delete this buy?' => 'Tem certeza que deseja deletar essa compra?',
      'Are you sure you want to delete this client?' => 'Tem certeza que deseja deletar esse cliente?',
      'Best selling game' => 'Jogo mais vendido',
      'Most popular game' => 'Jogo mais popular',
      'Quantity' => 'Quantidade',
      'Most popular client' => 'Cliente com mais jogos',
      'Money spent' => 'Dinheiro gasto',
      'Best day' => 'Melhor dia',
      'Games sold' => 'Jogos vendidos',
      'Boleto' => 'Boleto',
      'Credit card' => 'Cartão de crédito',
      'Date' => 'Data',
      'Total amount' => 'Total arrecadado',
      'General' => 'Geral',
      'Most popular payment type' => 'Tipo de pagamento mais popular',
      'Best Company' => 'Melhor desenvolvedora'
    );
    /**
     * Return a translate string
     */
    public static function getString($string){
      $return = '';
      if(self::$language[$string])
        $return = self::$language[$string];
      else
        $return = $string;
      return $return;
    }
   }
?>