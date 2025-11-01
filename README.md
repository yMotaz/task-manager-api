# ✅ Task Manager API

Uma API RESTful para gerenciamento de **usuários** e **tarefas**. Ideal para fins educacionais, testes de integração, prototipagem de sistemas ou como base para projetos mais complexos que envolvam operações básicas de cadastro, consulta, atualização e exclusão de dados.

---

## 🧠 Desafio

O desafio é desenvolver uma API simples e funcional que permita o gerenciamento de **usuários** e **tasks**, sem autenticação, login ou controle de acesso. O sistema deve oferecer rotas abertas para facilitar a integração com outras aplicações, com foco exclusivo nas operações CRUD.

---

## 🎯 Objetivos do Sistema

- Criar e gerenciar **usuários** com dados básicos como nome, e-mail e função.  
- Criar e gerenciar **tasks** associadas a usuários.  
- Permitir a criação, consulta, atualização e exclusão de registros.  
- Garantir organização e integridade dos dados.  
- Facilitar a integração com front-ends ou sistemas externos.  

---

## 📌 Escopo do Projeto

### ✅ Pré-requisitos

Este projeto tem como objetivo fornecer uma API genérica e acessível para o gerenciamento de usuários e tarefas. Todas as rotas são públicas e não há autenticação implementada, permitindo testes rápidos e integração direta com outras ferramentas.

---

### 🔧 Requisitos Funcionais

- **Criar Usuário**  
  Permitir o cadastro de novos usuários com informações como nome, e-mail e função.

- **Listar Usuários**  
  Retornar uma lista de todos os usuários cadastrados.

- **Atualizar Usuário**  
  Permitir a edição dos dados de um usuário existente.

- **Deletar Usuário**  
  Remover um usuário do sistema de forma permanente.

- **Criar Task**  
  Permitir o cadastro de novas tarefas vinculadas a um usuário.

- **Listar Tasks**  
  Retornar todas as tarefas cadastradas.

- **Atualizar Task**  
  Permitir a edição de uma tarefa existente.

- **Deletar Task**  
  Remover uma tarefa do sistema de forma permanente.

---

### 🛠️ Requisitos Não Funcionais

- **Performance**  
  A API deve responder às requisições em até 2 segundos, mesmo com grande volume de dados.

- **Disponibilidade**  
  Sistema acessível 24/7, com tolerância a falhas e logs de erro.

- **Backup Automático**  
  Cópia de segurança diária do banco de dados em ambiente externo ou cloud.

- **Usabilidade da API**  
  Endpoints bem definidos e documentados para facilitar integração.

---

## 📅 Planejamento de Entregas  

- **SPRINT 1:** Estrutura inicial da API e CRUD de usuários ✅  
- **SPRINT 2:** CRUD de tasks + integração com usuários ✅  
- **SPRINT 3:** Configuração de testes automatizados e CI/CD ✅  

---

## 🚀 Tecnologias Utilizadas

- **PHP** (lógica da aplicação)  
- **MySQL** (banco de dados relacional)  
- **Composer** (gerenciador de dependências)  
- **PHPUnit** (testes automatizados)  
- **GitHub Actions** (integração contínua)  
- **Render** (entrega contínua / deploy automático – a configurar)  

---

## 📂 Metodologia Utilizada  

- **Metodologia Ágil:** Framework Scrum/Kanban  
- Entregas incrementais com integração contínua (CI) e entrega contínua (CD).  

---

## 🧪 Testes Automatizados

- Testes unitários implementados com PHPUnit.  
- Executados automaticamente no GitHub Actions a cada push/pull request na branch `main`.  
- Pelo menos **3 testes independentes** garantem a validação do código.  

---

## ⚙️ CI/CD

- **CI (Continuous Integration):**  
  - Rodando no GitHub Actions.  
  - Executa `composer install` e `vendor/bin/phpunit`.  
  - Garante que o código está estável antes de integrar.  

- **CD (Continuous Delivery):**  
  - Deploy automático no **Render** (em configuração).  
  - Cada push na `main` → testes → deploy → aplicação online.  

---

## 🌐 Deploy

A aplicação estará disponível em breve no Render.  
👉 Link será adicionado após configuração do serviço.  

---
