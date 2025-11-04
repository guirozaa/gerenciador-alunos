# 🎓 Projeto Aluno

O **Projeto Aluno** consiste em uma plataforma de **cadastro e listagem de alunos** com **sistema de login**.

---

## 🧩 Funcionalidades

### 📝 Cadastro

- Formulário completo com campos de escrita e upload de documentos.
- Armazena todas as informações no banco de dados.

### 📋 Listagem

- Lista os alunos em **ordem alfabética**.
- Exibe a **foto de cada aluno**.
- Inclui **campo de pesquisa** para localizar alunos pelo nome.

---

## 💭 Dúvida Inicial

> **Fazer em procedural ou em POO (Programação Orientada a Objetos)?**

| Abordagem      | Vantagem                                                                           |
| -------------- | ---------------------------------------------------------------------------------- |
| **Procedural** | Mais rápida de implementar, domínio maior atualmente.                              |
| **POO**        | Mais fácil de escalar e manter caso o sistema cresça; oportunidade de aprendizado. |

🧠 **Decisão:** Optou-se por **POO** para favorecer a expansão e o aprendizado durante o desenvolvimento.

---

## 🛠️ Passo a Passo do Desenvolvimento

### **1️⃣ Criação do Banco de Dados**

- Banco: `sistemaAlunos_bd`
- Tabela principal: `alunos_tb`

### **2️⃣ Estrutura de Scripts**

Como o projeto foi feito em **POO**, foram criadas as seguintes camadas:

- **Model** → Representa a estrutura do aluno.
- **Repository** → Responsável pela conexão e manipulação no banco de dados.
- **Controller** → Intermedia os dados entre o front-end e o repositório.

---

## 🕒 Histórico de Desenvolvimento

**🗓️ 04/11/2025 — 10h às 12h30**

✅ Criação do banco de dados.  
✅ Implementação da estrutura **MVC** (Model–View–Controller) para o módulo **Aluno**.  
✅ Sistema funcional e **salvando corretamente os dados no banco**.
✅**Validar login e sessão** de usuário.

---

## 🚧 O que ainda falta

- [ ] **Finalizar o `index.php`** para tratar dados e organizar no array corretamente.
- [ ] Finalizar com a parte de **Listar alunos**.

---

## 📚 Tecnologias Utilizadas

- **PHP** (POO)
- **MySQL**
- **HTML / CSS / JS**
- **MVC Pattern**

---

## 👨‍💻 Autor

Desenvolvido por Guilherme Rosa
🕓 Projeto iniciado em **novembro de 2025**
