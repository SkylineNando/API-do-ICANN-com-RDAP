<?php
$domain = "example.com"; // Substitua pelo domínio desejado
$url = "https://rdap.org/domain/$domain";

$response = file_get_contents($url);
$data = json_decode($response, true);

if ($data) {
    echo "Informações do Domínio:\n";
    echo "Nome do Domínio: " . ($data['ldhName'] ?? 'N/A') . "\n";
    echo "Status: " . implode(", ", $data['status'] ?? []) . "\n";
    echo "Criado em: " . ($data['events'][0]['eventDate'] ?? 'N/A') . "\n";
} else {
    echo "Erro ao consultar informações do domínio.";
}
?>
