<?php
require_once(__DIR__.'/../vendor/autoload.php');

include_once("Models\Aluno.php");
include_once("DTOS\SensorDTO.php");
include_once("Persistence\ConnectionFactory.php");

echo "app...";

use App\Models\Aluno;
use App\Persistence\ConnectionFactory;
use App\DTOS\SensorDTO;

$connFactory = new ConnectionFactory();
$conn = $connFactory -> getInstance();

$sqlUseDB = "USE conexaophp;";
$stmt = $conn -> query($sqlUseDB);

// $al = new Aluno();
$sensorDTO11 = new SensorDTO(10,100);
$sensorDTO22 = new SensorDTO(20,200);

$sqlInsertData = "insert into clima_tempo (temperatura,umidade) values ";
$conn->exec($sqlInsertData."(".$sensorDTO11->_temperatura.",".$sensorDTO11->_umidade.");");
$conn->exec($sqlInsertData."(".$sensorDTO22->_temperatura.",".$sensorDTO22->_umidade.");");

$sqlSelectData = "select * from clima_tempo";

$stmt = $conn->query($sqlSelectData);
$sensorDataArr = $stmt->fetchAll(\PDO::FETCH_ASSOC);

echo "<br></br>temperatura -- umidade <br></br>";

foreach ($sensorDataArr as $sensorData){
    echo "<br></br>".$sensorData['temperatura']." -- ".$sensorData['umidade'];
}