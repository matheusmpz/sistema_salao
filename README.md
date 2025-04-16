# Cabeleleila Leila - Sistema de Agendamentos

O Cabeleleila Leila é um sistema de agendamentos online desenvolvido para gerenciar os serviços de um salão de beleza. Ele permite que clientes agendem serviços, editem seus agendamentos e consultem um histórico de atendimentos. Além disso, administradores podem gerenciar serviços e agendamentos diretamente pelo painel administrativo.

![Capa da Aplicação](public/img/imagem-capa-salao.png)

## 🚀 Tecnologias Utilizadas

O projeto foi desenvolvido utilizando as seguintes tecnologias:

- **PHP** – Back-end para lógica de negócio e conexão com banco de dados  
- **MySQL** – Armazenamento dos agendamentos e usuários  
- **HTML, CSS e JavaScript** – Estrutura e interatividade no front-end  
- **Tailwind CSS** – Estilização do layout  
- **Figma** – Protótipo e design do sistema  

## 🎨 Funcionalidades do Sistema

- Para Clientes:
✅ Cadastro e login.
✅ Agendamento de serviços com validações de horário.
✅ Edição de agendamentos (até 2 dias antes da data marcada).
✅ Histórico de agendamentos com detalhes.
✅ Sugestão de datas alternativas em caso de conflitos de horário.

- Para Administradores:
✅ Login seguro para acesso ao painel administrativo.
✅ Gerenciamento de serviços (adicionar, editar e excluir).
✅ Gerenciamento de agendamentos (criar, editar e filtrar por data, serviço e status).
✅ Dashboard com resumo de agendamentos do dia. 

## 📸 Prints das Telas

Os prints das principais telas estão na pasta **/docs/prints** dentro do projeto.

## 🎥 Demonstração

Assista ao vídeo demonstrativo do sistema funcionando: **[https://youtu.be/LekoegqO9JA]**  

## 🛠 Como Rodar o Projeto

Para rodar o projeto localmente, siga os passos:

1. Clone o repositório (caso tenha usado GitHub):
   ```bash
   git clone https://github.com/matheusmpz/sistema_salao.git

2. Configure o banco de dados:

Crie um banco de dados no MySQL chamado salao_leila
Importe o arquivo database.sql disponível no projeto em **/docs/database**

3. Suba um servidor local (XAMPP, WAMP, Laragon):

Se estiver usando XAMPP, inicie o Apache e o MySQL
Acesse a pasta do projeto pelo navegador:
    http://localhost/sistema_salao

4. Faça login ou cadastre-se para testar o sistema. 🚀    
