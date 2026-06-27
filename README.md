# CN Estética e Bem-Estar - Sistema de Gestão e Agendamentos

Este projeto é um sistema web completo para gerenciamento administrativo e agendamento de serviços de uma clínica de estética. Ele foi desenvolvido do zero utilizando o padrão de arquitetura **MVC (Model-View-Controller)** em PHP nativo e banco de dados MySQL.

O sistema conta com controle de acesso (login), um painel (dashboard) com indicadores em tempo real e 3 telas de gerenciamento (CRUDs) integradas: Procedimentos Estéticos, Clientes e Agendamentos. Além disso, o banco de dados possui regras inteligentes como travas de horários lotados e histórico de preços.

---

## 🔗 Links do Projeto

* **Repositório no GitHub:** https://github.com/matheus-pires-costa/tech-academy4
* **Link do Site (Produção/Deploy):** cnesteticaadm.infinityfree.io

---

## 🔧 Como Rodar o Projeto na Sua Máquina

Siga os passos abaixo para executar o projeto localmente usando o XAMPP:

### 1. Preparar os arquivos
1. Baixe ou clone este repositório.
2. Coloque a pasta do projeto dentro do diretório `htdocs` do seu XAMPP (geralmente em `C:\xampp\htdocs\`).
3. Certifique-se de que a pasta se chama `tech-academy4`.

### 2. Configurar o Banco de Dados
1. Abra o **XAMPP Control Panel** e inicialize os módulos **Apache** e **MySQL**.
2. Abra o **MySQL Workbench** (ou o phpMyAdmin em `http://localhost/phpmyadmin`).
3. Importe e execute o arquivo de script SQL (localizado na pasta do projeto) para criar o banco de dados `clinica_estetica` e suas tabelas.

### 3. Acessar o Sistema
1. Abra o seu navegador e digite o endereço:
   ```text
   http://localhost/tech-academy4/
