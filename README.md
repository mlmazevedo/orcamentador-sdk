# Orçamentador SDK (API SINAPI)

SDK oficial em PHP para consumo da **API do Orçamentador**, permitindo consultar insumos e composições da tabela **SINAPI**, além de indicadores, estados e recursos de orçamento, de forma simples, segura e padronizada.

Todos os parâmetros dos recursos podem ser encontrados na  
[documentação oficial da API](https://www.orcamentador.com.br/api/docs).

---

## 📦 Instalação

Via Composer:

```bash
composer require orcamentador/sdk
```

Requisitos:
- PHP >= 7.2
- Composer
- Extensão cURL habilitada

---

## 🚀 Uso básico

```php
<?php
require 'vendor/autoload.php'; // ajuste o caminho conforme seu projeto

use Orcamentador\SDK\Client;

$client = new Client('SUA_API_KEY');

$insumos = $client->insumos()->buscar([
    'nome'   => 'cimento',
    'estado' => 'sp',
    'limit'  => 10
]);

print_r($insumos);
```

---

## 🔑 Autenticação

A autenticação é feita via **chave de API**, enviada automaticamente no header HTTP `X-API-Key`.
 
```php
$client = new Client('SUA_API_KEY');
```

---

## 📚 Recursos disponíveis

Cada recurso da API é representado por uma classe **Resource** no SDK.

### 🧱 Insumos

```php
$client->insumos()->buscar([
    'nome'       => 'areia', // ou 'codigo' => 123456
    'estado'     => 'sp',
    'referencia' => '2025-09-01',
    'page'       => 1,
    'limit'      => 50
]);
```
No recurso "buscar", se não informado 'nome' ou 'codigo', o sistema retornará todos os insumos.
Outros parâmetros de "buscar": modo_busca, tipo, familia, regime, sort, order, output, data_ref, detail

```php
$client->insumos()->historico([
    'codigo'   => 123,
    'estado' => 'sp'
]);
```
Outros parâmetros de "historico": periodo, output

```php
$client->insumos()->comparar([
    'codigo'   => 123,
    'estados' => 'sp,rj,pb'
]);
```
Outros parâmetros de "comparar": data_ref, output

```php
$client->insumos()->previsao([
    'codigo'   => 123,
    'estado' => 'sp',
    'regime' => 'DESONERADO' // ou 'NAO_DESONERADO'
]);
```
Outros parâmetros de "previsao": output
---

### 🏗️ Composições

```php
$client->composicoes()->buscar([
    'nome'       => 'argamassa', // ou 'codigo' => 123456
    'estado'     => 'sp', 
    'referencia' => '2025-09-01',
    'page'       => 1,
    'limit'      => 50
]);
```
No recurso "buscar", se não informado 'nome' ou 'codigo', o sistema retornará todas as composições.
Outros parâmetros de "buscar": modo_busca, filtro, regime, sort, order, output, data_ref

```php
$client->composicoes()->detalhar([
    'codigo'   => 123456,
    'estado' => 'sp'
]);
```
Outros parâmetros de "detalhar": regime, output, data_ref

```php
$client->composicoes()->explode([
    'codigo'   => 123456,
    'estado' => 'sp',
    'regime' => 'DESONERADO' // ou 'NAO_DESONERADO'
]);
```
Outros parâmetros de "explode": regime, output, data_ref, sort, order

```php
$client->encargos()->buscar([
    'estado' => 'sp',
    'data_ref' => '2025-12-01' // ou deixe vazio para a tabela SINAPI mais recente
]);
```
Outros parâmetros de "encargos": output

```php
$client->composicoes()->historico([
    'codigo'   => 123456,
    'estado' => 'sp'
]);
```
Outros parâmetros de "historico": periodo, output

```php
$client->composicoes()->comparar([
    'codigo'   => 123456,
    'estados' => 'sp,rj,pb'
]);
```
Outros parâmetros de "comparar": data_ref, output

```php
$client->composicoes()->previsao([
    'codigo'   => 123456,
    'estado' => 'sp',
    'regime' => 'DESONERADO' // ou 'NAO_DESONERADO'
]);
```
Outros parâmetros de "previsao": output

---

### 📊 Indicadores

```php
$client->indicadores()->listar([
    'indicadores' => 'incc,incc_acumulado,ipca,igpm,selic,dolar'
]);
```

Outros parâmetros de "listar": output
---

### 🌎 Estados

```php
$client->estados()->listar([
    'estado' => 'sp' // ou 'ibge' => 35 ou 'regiao' => 'sudeste' ou, nenhum parâmetro (listar todos)
]);
```
Outros parâmetros de "listar": output
---

### 💰 Recursos de orçamento

```php
$client->orcamento()->gerar([
    'itens' => 'C:12321@3.2,I:234@12.5,I:3773@7', // formato [C|I]:codigo@quantidade,[C|I]:codigo@quantidade,...
    'estado' => 'sp',
    'regime' => 'DESONERADO' // ou 'NAO_DESONERADO'
]);
```
Outros parâmetros de "gerar": bdi, output, data_ref
---


## ⚠️ Tratamento de erros

O SDK lança exceções específicas conforme o erro retornado pela API.

```php
use Orcamentador\SDK\Exceptions\ApiException;

try {
    $client->insumos()->buscar(['nome' => 'cimento']);
} catch (ApiException $e) {
    echo $e->getMessage();
}
```

Exceções disponíveis:
- `AuthenticationException`
- `RateLimitException`
- `NotFoundException`
- `ServerException`

---

## 🔄 Versionamento

O SDK segue **Versionamento Semântico (SemVer)**:

- `1.x.x` — versão estável
- `x.0.0` — quebra de compatibilidade
- `x.y.0` — novas funcionalidades
- `x.y.z` — correções

---

## 🧪 Exemplos

Exemplos completos estão disponíveis na pasta:

```
/examples
```

---

## 📄 Licença

MIT License. Consulte o arquivo `LICENSE` para mais detalhes.

---

## 🔗 Links

- 🌐 Site: https://www.orcamentador.com.br
- 📘 Documentação da API: https://www.orcamentador.com.br/api/docs
- 🐙 GitHub: https://github.com/orcamentador/orcamentador-sdk

---

## 💡 Suporte

Dúvidas, sugestões ou problemas?

Entre em contato pelo site ou abra uma **issue** no GitHub.

