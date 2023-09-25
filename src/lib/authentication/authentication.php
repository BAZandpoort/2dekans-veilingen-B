<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once DATABASE . '/connect.php';
require_once LIB . '/util/util.php';

function register($email, $username, $password) {
  $data = insert(
    'INSERT INTO users (username, password, email) VALUES (?, ?, ?)',
    ['type' => 's', 'value' => $username],
    ['type' => 's', 'value' => $password],
    ['type' => 's', 'value' => $email],
  );

  return $data;
}

function login($email, $password) {
  $data = fetch(
    'SELECT * FROM users
    JOIN user_profile ON users.id = user_profile.userid
    WHERE users.email = ?',
    [
      'type' => 's',
      'value' => $email,
    ],
  );

  if (!$data) {
    return false;
  }

  if (!password_verify($password, $data['password'])) {
    return false;
  }

  return $data;
}
