## API do ICANN com RDAP

O RDAP foi projetado para substituir o protocolo WHOIS tradicional e oferece:
- Acesso estruturado a informações de registro de domínios.
- Suporte a respostas padronizadas em JSON.
- Funcionalidades avançadas como paginação e autenticação.

---

## Como Funciona o RDAP

O RDAP do ICANN permite consultar informações sobre domínios diretamente por meio de solicitações HTTP. Por exemplo:

1. **Consulta RDAP para um domínio:**
   Você pode acessar informações sobre um domínio consultando o endpoint RDAP do ICANN:
   ```bash
   https://rdap.org/domain/example.com
   ```

2. **Respostas Estruturadas:**
   O servidor retorna uma resposta em JSON com detalhes sobre o domínio, como:
   - **Nome do domínio**
   - **Status**
   - **Informações do registrador**
   - **Datas de criação e expiração**
   - **Servidores de nomes**

---

## Exemplos de Uso em PHP

Aqui está um exemplo simples para integrar o RDAP usando PHP:

### Código PHP
```php
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
```

### Explicação do Código
- A URL `https://rdap.org/domain/` é usada para realizar a consulta RDAP.
- Os dados retornados são decodificados do formato JSON para um array PHP.
- Informações importantes, como o nome do domínio e o status, são exibidas.

---

## Recursos do ICANN

Além do RDAP, o ICANN oferece outros serviços que podem ser usados em projetos:
1. **Busca WHOIS tradicional:**
   Ferramenta disponível em [ICANN WHOIS Lookup](https://lookup.icann.org/).
2. **Documentação do RDAP:**
   Consulte mais detalhes em [ICANN RDAP Guide](https://www.icann.org/rdap).

---

Se precisar de mais ajuda para implementar isso no seu projeto, posso ajustar o código para suas necessidades específicas!
