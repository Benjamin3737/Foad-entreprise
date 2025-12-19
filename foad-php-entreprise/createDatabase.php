<?php

include 'fonctions.php';
require 'connexiondb.php';

createDatabase($pdo, 'entreprise.sql');

redirect('/index.php');
