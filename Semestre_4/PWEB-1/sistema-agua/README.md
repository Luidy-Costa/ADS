# Instituto Federal do Ceará — IFCE | Campus Boa Viagem | Curso de ADS
## Avaliação Prática
### Semestre 2026.1 | Disciplina: Programação Web I
### Professor: Renato William Rodrigues de Souza

---

# Sistema de Gestão de Abastecimento de Água Comunitário

Este projeto consiste em um sistema web simples desenvolvido em **Laravel** para substituir o processo manual de gerenciamento de abastecimento de água de uma associação comunitária. O sistema automatiza o cadastro de consumidores, o registro das leituras mensais de consumo (realizado pelo leiturista), o cálculo automático das faturas baseado em regras de cobrança configuráveis e a notificação de cobrança via WhatsApp.

---

## Trio Integrante
* **Aerton David Barbosa Mendes**
* **Letícia Justino Maciel**
* **Luidy Costa dos Santos**

---

## Tecnologias Utilizadas
* **Framework:** Laravel 10.x / 11.x
* **Linguagem:** PHP 8.x
* **Banco de Dados:** MySQL
* **Frontend:** Blade Templates (com Tailwind CSS ou Bootstrap)
* **Ferramentas:** Artisan CLI & Git

---

## Regras de Negócio e Cobrança Implementadas

* **Taxa Fixa (Até 10 m³ ou 10.000 litros):** Valor padrão de R$ 25,00 (configurável pelo painel do gestor).
* **Excedente (Acima de 10 m³):** Taxa fixa + R$ 2,00 (configurável) por cada 1 m³ (1.000 litros) excedente.
  * *Exemplo:* Consumo de 15 m³ → R$ 25,00 (fixa) + R$ 10,00 (5 m³ excedentes × R$ 2,00) = R$ 35,00 totais.
* **Consumo Mensal:** Calculado dinamicamente através da fórmula: `Consumo = Leitura Atual - Leitura Anterior`.
* **Validações de Segurança:**
    * A leitura atual não pode, em hipótese alguma, ser menor que a leitura anterior.
    * É permitida apenas uma única leitura por consumidor dentro do mesmo mês/ano de referência.
    * O número do medidor é único para cada consumidor cadastrado.

---

## Como Instalar e Rodar o Projeto Localmente

Siga o passo a passo abaixo para clonar, configurar e executar o projeto em sua máquina:

### 1. Clonar o Repositório
```bash
git clone <https://github.com/Luidy-Costa/ADS/tree/main/Semestre_4/PWEB-1/sistema-agua>
cd <sistema-agua>
