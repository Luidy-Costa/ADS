# Instituto Federal do Ceará — IFCE | Campus Boa Viagem | Curso de ADS
## Avaliação Prática
### Semestre 2026.1 | Disciplina: Programação Web I
### Professor: Renato William Rodrigues de Souza

---

# Sistema de Gestão de Abastecimento de Água Comunitário

Este projeto consiste em um sistema web desenvolvido em **Laravel** para substituir o processo manual de gerenciamento de abastecimento de água de uma associação comunitária. O sistema automatiza o cadastro de consumidores, o registro das leituras mensais de consumo, o cálculo automático das faturas baseado em regras de cobrança configuráveis e o controle de auditoria para conformidade com a LGPD.

---

## Trio Integrante
* **Aerton David Barbosa Mendes**
* **Letícia Justino Maciel**
* **Luidy Costa dos Santos**

---

## Tecnologias Utilizadas
* **Framework:** Laravel 11.x
* **Linguagem:** PHP 8.x
* **Banco de Dados:** MySQL / MariaDB
* **Frontend:** Blade Templates
* **Ferramentas:** Artisan CLI & Git

---

## Regras de Negócio e Cobrança Implementadas

* **Taxa Fixa (Até 10 m³ ou 10.000 litros):** Valor padrão de R$ 25,00 (configurável pelo painel do gestor).
* **Excedente (Acima de 10 m³):** Taxa fixa + R$ 2,00 (configurável) por cada 1 m³ (1.000 litros) excedente.
  * *Exemplo:* Consumo de 15 m³ → R$ 25,00 (fixa) + R$ 10,00 (5 m³ excedentes × R$ 2,00) = R$ 35,00 totais.
* **Consumo Mensal:** Calculado dinamicamente através da fórmula: `Consumo = Leitura Atual - Leitura Anterior`.
* **Validações de Segurança e Consistência:**
  * A leitura atual não pode, em hipótese alguma, ser menor que a leitura anterior.
  * É permitida apenas uma única leitura ativa por consumidor dentro do mesmo mês/ano de referência.
  * O número do medidor é único para cada consumidor cadastrado.

---

## 🚀 Evolução do Sistema (Melhorias de Segurança, Auditoria e LGPD)

Para atender às demandas reais de governança e adequação jurídica da associação comunitária, o sistema foi evoluído com recursos corporativos focados em **Controle de Acesso**, **Proteção à Privacidade** e **Resiliência de Dados**:

### 1. Controle de Acesso Baseado em Perfis (RBAC)
O sistema diferencia o nível de privilégio de quem manipula os dados utilizando *Gates* estruturadas no back-end:
* **Leiturista:** Perfil de campo. Possui permissão restrita para visualizar a lista geral e lançar/retificar medições. Tentativas de acesso a painéis de tarifas ou criação de novos usuários retornam automaticamente erro `403 | Forbidden`.
* **Gestor:** Mantém controle total da aplicação. É o único perfil autorizado a configurar taxas, cadastrar/editar consumidores e gerenciar baixas de pagamentos de faturas.

### 2. Blindagem e Mascaramento de Dados Pessoais (LGPD)
* **Criptografia em Banco:** Através do recurso `Eloquent Casts (encrypted)`, dados pessoais sensíveis (como telefone e CPF) são criptografados nativamente antes de persistirem no banco de dados. Isso impede a leitura em texto limpo caso ocorra um vazamento físico do arquivo `.sql`.
* **Mascaramento no Front-end:** Na interface de listagem, o sistema intercepta o perfil logado. O Gestor visualiza os dados completos, enquanto o Leiturista enxerga apenas o número ocultado por uma máscara de privacidade: `(85) 9****-****`.

### 3. Preservação de Histórico (Imutabilidade e Soft Deletes)
Para evitar que erros humanos de digitação apaguem o histórico de consumo da comunidade:
* O sistema utiliza **Deleção Lógica (Soft Deletes)**. Quando uma leitura com erro é retificada, a linha antiga não é sobrescrevida nem apagada; ela recebe uma marcação interna (`deleted_at`) saindo do fluxo visual do sistema.
* Uma **nova linha com os dados corrigidos** é criada no banco de dados, recalculando a fatura e mantendo o registro cronológico anterior intacto para auditorias financeiras.

### 4. Rastreabilidade Jurídica de Acessos (Logs de Auditoria)
* Implementação do componente customizado `LogAcessoLGPD` (Middleware).
* Toda vez que qualquer operador interagir com telas contendo dados de moradores, o sistema registra silenciosamente no arquivo de auditoria (`storage/logs/laravel.log`) as seguintes informações: **Nome do Usuário**, **ID da Conta**, **URL Acessada**, **IP de Origem** e **Data/Horário**. Esse registro serve como salvaguarda jurídica de conformidade perante a ANPD.

---

## Como Instalar e Rodar o Projeto Localmente

Siga o passo a passo abaixo para clonar, configurar e executar o projeto em sua máquina:

### 1. Clonar o Repositório
Como o projeto está dentro de uma pasta específica, clone o repositório principal e navegue até o diretório do sistema:

```bash
git clone [https://github.com/Luidy-Costa/ADS.git](https://github.com/Luidy-Costa/ADS.git)
cd ADS/Semestre_4/PWEB-1/sistema-agua

### 2. Instalar as Dependências do PHP
Certifique-se de ter o Composer instalado e rode:

```bash
composer install
```

### 3. Configuração do Ambiente (.env)
Copie o arquivo de exemplo para criar o seu arquivo oficial de configuração e gere a chave do sistema:

```bash
cp .env.example .env
php artisan key:generate
```

Abra o arquivo `.env` recém-criado e configure a conexão com o banco de dados. Exemplo utilizando os dados gerados em aula:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistema_agua
DB_USERNAME=admin
DB_PASSWORD=123
```

### 4. Banco de Dados e Migrations
No seu terminal do MySQL/MariaDB, crie o banco de dados vazio:

```sql
CREATE DATABASE sistema_agua;
```

Em seguida, execute o comando abaixo para gerar todas as tabelas, incluindo as novas estruturas de controle de acesso (role), chaves estrangeiras e deleções lógicas (deleted_at):

```bash
php artisan migrate:fresh
```

### 5. Iniciar o Servidor
Com tudo configurado, levante o servidor embutido do Laravel:

```bash
php artisan serve
```

Acesse no navegador: `http://localhost:8000`