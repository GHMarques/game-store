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
      'Delete' => 'Deletar'
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