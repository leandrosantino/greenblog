<?php 

  include './repositories/UserRepository.php';

  $userRepository = new UserRepository();
  $userRepository->create();

?>