<?php
class User {
    public $email = '';
    public $password = '';
    public $id = '';
    protected $token = null;
   
    public function __construct($data) {
        $this->setAll($data);
    }

    public function setAll($data) {

        isset($data['email'])? $this->email = $data['email'] : '' ;
        isset($data['password'])? $this->password = password_hash($data['password'], PASSWORD_DEFAULT) : '' ;
        isset($data['id'])? $this->id = $data['id'] : '' ;

    }

    public function setToken($token){
        $this->token = $token;
    }

    function find($db) {
        $query = $db->createQueryBuilder();
        $query->select('u.*')
        ->from('users', 'u');

        if(isset($this->id)){
            $query->where('u.id = :id')
            ->setParameter('id', $this->id);
        }elseif(isset($this->email) && isset($this->password)){
            $query->where('u.email = :email')
            ->setParameter('email', $this->email)
            ->where('u.password = :password')
            ->setParameter('password', $this->password);
        }
        $result = $query->getQuery()->getResult();

        print_r($result);

        return true;
    }

    function insert($db) {
        $query = $db->createQueryBuilder();

        $uuid = Uuid::uuid4();

        $query
        ->insert('users')
        ->setValue('email', '?')
        ->setValue('password', '?')
        ->setValue('id', '?')
        ->setParameter(0, $data['mail'])
        ->setParameter(1, )
        ->setParameter(4, $uuid)
        ;

        if(isset($this->token)){
            $query
            ->setValue('token', $this->token->value)
            ->setValue('expire_date', $this->token->expire);
        ;
        }

        $query->execute();
    }
}
?>