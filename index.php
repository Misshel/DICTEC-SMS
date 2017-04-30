<?php

  $word = isset($_GET['word'])? $_GET['word'] : '';

  $words = [
    'catarsis' => 'Entre los antiguos griegos, purificación de las pasiones del ánimo mediante las emociones que provoca la contemplación de una situación trágica.',
    'figurativo' => 'Que representa una cosa'
    'sintagma' => 'Palabra o grupo de palabras que constituyen una unidad sintáctica y que cumplen una función determinada con respecto a otras palabras de la oración.',
    'carpanta'  => ' Def.: Hambre feroz. Sin.: Apetito, gazuza Ej.: Se levantó abruptamente a causa de la carpanta.'
    'florilegio' => 'Def.: Colección de fragmentos literarios selectos. Sin.: Antología Ej.: Carolina pasaba las tardes haciendo florilegios.'
    'lenidad' => ' Def.: Falta de rigor en exigir el cumplimiento de los deberes o en castigar las faltas. Sin.: Blandura Ej.: Los jueces trataban a los asesinos con lenidad. '
    'pignorar' => ' Def.: Dar o dejar algo en prenda. Sin.: Empeñar, hipotecar Ej.: El vicio le hizo a pignorar todo lo que tenía.'
    'stalin ' => 'Dictador del Partido Comunista de la Unión Soviética de 1929 a 1953. Industrializó el país y lideró el triunfo en la Segunda Guerra Mundial sobre Alemania.'
    'thomas alva edison ' => ' Creador estadounidense de más de mil inventos. Ej. Bombilla eléctrica y Fonógrafo.'
    'vesania' => 'Def.: Demencia o furia intensa. Sin.: Insania, rabia Ej.: Maldijo a los presentes por su vesania y la deslealtad sufrida.'
    'atrocidad' => 'Def.: Acción desmesurada y desproporcionada que se realiza con brutalidad o violencia. Sin.: Barbaridad, bestialidad. Ej.: Las atrocidades cometidas contra el pueblo fueron condenadas por el juez.'

];


if($_SERVER['REQUEST_METHOD'] === 'POST')
{

  $from = $_POST['from'];
  $message = $_POST['message'];
  $m = isset($words[strtolower($message)])? $words[strtolower($message)] : 'Palabra no encontrada';
  $reply[0] = [
    "to" => $from,
    "message" => $m,
    "uuid" => "1ba368bd-c467-4374-bf28"
  ];
  // Send JSON response back to SMSsync
  $response = json_encode(
  ["payload"=>
    [
      "success"=>true,
      "task"=>"send",
      "secret" => "12345",
      "messages"=>[
       [
        "to"=>$from,
      "message"=>$m
       ]
      ]
    ]
  ]);

  // Avoid caching
  header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
  header("Content-type: application/json; charset=utf-8");
  echo $response;

}
