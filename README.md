# CN Estética - Sistema de Agendamento

Este projeto foi desenvolvido como parte do curso de **TADS**. Trata-se de uma aplicação web para gestão de serviços e agendamentos de uma clínica de estética, utilizando arquitetura MVC e boas práticas de desenvolvimento backend.

## Propósito do Sistema
O propósito deste sistema de gestão para a clínica CN Estética é centralizar e automatizar o fluxo de atendimento desde o primeiro contato do cliente até a persistência das informações no banco de dados, garantindo que nenhum agendamento se perca e que a clínica tenha controle total sobre a demanda de serviços. O projeto funciona sob a arquitetura Model-View-Controller, onde o usuário interage com uma interface dinâmica desenvolvida em Bootstrap para selecionar procedimentos específicos e escolher períodos de atendimento personalizados. Assim que o botão de agendamento é acionado, o controlador intercepta esses dados e os valida antes de delegar ao modelo a responsabilidade de realizar o registro seguro no MySQL utilizando a biblioteca PDO, o que impede vulnerabilidades como SQL Injection. A estrutura robusta do banco de dados assegura a integridade referencial por meio de chaves estrangeiras, permitindo que cada solicitação seja vinculada de forma precisa ao catálogo de serviços oferecido pela clínica, resultando em um feedback imediato de sucesso para o usuário e na organização otimizada da agenda administrativa.

## LINKS:
Diagrama(DER) do projeto: https://drive.google.com/file/d/1k-U8_YYmm-16grE9W9YRr_hqzB20cor4/view?usp=sharing

Site: http://cnestetica.infinityfreeapp.com/?i=1

Repositorio do GitHub:https://github.com/matheus-pires-costa/tech-academy3


## Tecnologias Utilizadas
**Linguagem:** PHP
**Arquitetura:** MVC
**Banco de Dados:** MySQL
**Persistência:** PDO
**Frontend:** HTML5, CSS3, Bootstrap
**Ferramenta de Modelagem:** MySQL Workbench