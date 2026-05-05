# Justificativa Técnica - Prática Orientada 03

**Disciplina:** Programação WEB I  
**Professor:** Dr. Renato William Rodrigues de Souza  
**Aluno:** Luidy  
**Contexto:** Evolução do Sistema Tropykaly (Arquitetura Profissional)

---

### 1. Quais problemas foram resolvidos?
O sistema anterior sofria com **alto acoplamento**, onde a lógica de negócio (cálculos e validações) estava misturada diretamente na interface (View). Resolvemos o problema de variáveis globais soltas no JavaScript, a falta de padronização na criação de objetos e a ausência de persistência de dados isolada, eliminando códigos duplicados e funções com múltiplas responsabilidades.

### 2. Como a arquitetura melhorou o sistema?
A implementação de uma **arquitetura em camadas** permitiu que as regras de negócio ficassem estritamente isoladas no servidor (Backend em PHP). O frontend agora funciona como uma interface limpa que apenas envia dados e exibe resultados, tornando o sistema muito mais escalável e fácil de manter, já que mudanças no visual não afetam a lógica de cálculo de pedidos.

### 3. Onde os padrões foram aplicados?
Foram aplicados quatro padrões de projeto (Design Patterns) fundamentais:
* **Factory Method:** Em `ProdutoFactory`, para centralizar a criação de diferentes tipos de produtos (pizzas, lanches, bebidas) com suas respectivas categorias.
* **Singleton:** Em `JsonDatabase`, garantindo uma instância única para manipular o arquivo de persistência (`pedidos.json`), evitando conflitos de escrita.
* **Strategy:** Em `DescontoStrategy`, permitindo que o sistema aplique diferentes regras de desconto (como o Desconto Pix de 10%) de forma plugável.
* **Repository:** Em `PedidoRepository`, isolando a lógica de armazenamento de dados da lógica de negócio das classes de modelo.

### 4. Como foi feita a integração frontend/backend?
A integração foi realizada através de uma **API REST** simples. O frontend utiliza a API nativa `fetch` do JavaScript para enviar requisições assíncronas (POST) contendo o carrinho de compras em formato JSON. O backend PHP recebe esses dados, processa através dos Controllers e Models, e devolve uma resposta estruturada também em JSON.

### 5. Quais dificuldades no deploy?
As principais dificuldades residem na configuração do ambiente de produção para lidar com a separação de domínios (CORS). Como o frontend e o backend operam como serviços distintos, é necessário garantir que os cabeçalhos de permissão estejam configurados corretamente para permitir a troca de dados entre as portas do container, além de garantir que as permissões de escrita no arquivo JSON persistam no servidor.

### 6. Qual o papel do Docker no projeto?
O Docker desempenha o papel de **padronização e portabilidade**. Através do `Dockerfile` e do `docker-compose.yml`, conseguimos criar um ambiente idêntico ao de produção no computador local. Ele isola as dependências do PHP e do Nginx em containers separados, permitindo que o sistema seja executado com um único comando (`docker-compose up`), independentemente das configurações específicas do sistema operacional do desenvolvedor.
