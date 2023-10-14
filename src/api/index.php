<?php 

require_once './user/UserRepository.php';

$userRepository = new UserRepository();

$data = (object) [
  'id' => 10,
  'email' => 'leandrp@gmail.com',
  'password' => 'senha',
  'username' => 'leandrosantino'
];

// var_dump($data);

// echo $userRepository->create($data);

echo $userRepository->getAll();