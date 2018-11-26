<?php

include_once '../../vendor/autoload.php';

$onepay = Transbank\Wrapper\TransbankConfig::environment()->onepay();

$result = $onepay->createNullify([
    'occ'                   => $_POST['occ'],
    'externalUniqueNumber'  => $_POST['externalUniqueNumber'],
    'authorizationCode'     => $_POST['authorizationCode'],
    'amount'                => $_POST['amount'],
]);

// Veamos el resultado.
echo '<pre>';
print_r($result);
echo '</pre>';
?>