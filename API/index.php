<?php

require 'userAPI.php';

require './App/Models/AdherentRepository.php';
require './App/Models/AuteurRepository.php';
require './App/Models/ExemplaireRepository.php';
require './App/Models/LivreRepository.php';
require './App/Models/MaisonEditionRepository.php';
require './App/Models/OuvrageRepository.php';
require './App/Models/EmpruntRepository.php';

require './App/Controllers/AdherentController.php';
require './App/Controllers/LivreController.php';
require './App/Controllers/EmpruntController.php';

require './App/Lib/DatabaseConnection.php';
require './App/Lib/functions.php';
require './App/Lib/varsType.php';

require 'router.php';

