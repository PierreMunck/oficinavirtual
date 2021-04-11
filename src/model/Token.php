<?php
class Token {
    public $value = '';
    public $expire = null;

    public function create(){
        $token = openssl_random_pseudo_bytes(16);
        $this->token = bin2hex($token);
        $this->date = date('Y-m-d H:i:s', strtotime('+1 hour'));
    }
   
    public function updateForUser($id) {
        $query = $db->createQueryBuilder();

        $query
        ->update('users','u')
        ->where($query->expr()->eq('u.id', ':userId'))
        ->setValue('token', ':token')
        ->setValue('expire_date', ':expire_date')
        ->setParameter('userId', $id)
        ->setParameter('token', $this->token)
        ->setParameter('expire_date', $this->date)
        ;
    }
}
?>