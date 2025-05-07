# CRUD Projetos

Aplicação desenvolvida utilizando Cakephp 5, e uma base de dados MySQL.
Para executar a aplicação em ambiente local usando o Docker Compose execute:

```bash
docker compose up
```
note: a utilização de docker compose para gerenciamento de containers em ambientes de produção não é o mais indicado, o uso de volumes irá sobrescrever as dependencias instaladas pelo composer, portanto será necessário executar o composer install após a execução do container.
Para executar instalar as dependencias por dentro do container use:
```bash
docker exec -it IdDoContainerPHP bash
composer install
```
Ou dentro do diretorio da sua maquina caso tenha o ambiente de desenvolvimento configurado, use:
```bash
composer install
```
**A instalação das dependencias não é necessária quando não há uso de volumes, ou seja sem utilizar o docker compose.**

### **História de Usuário: CRUD de Projetos**

**Como** usuário autenticado,  
**Quero** criar, visualizar, editar e excluir projetos no sistema,  
**Para** organizar e gerenciar as informações de cada projeto de forma eficiente.

#### **Critérios de Aceitação:**
- O sistema deve **restringir o acesso** à tela de gerenciamento de projetos apenas para usuários autenticados.
- O sistema deve permitir a **criação** de um projeto informando os atributos necessários.
- O sistema deve permitir a **edição** dos atributos de um projeto já cadastrado.
- O sistema deve permitir a **visualização** de um projeto específico e a listagem de todos os projetos.
- O sistema deve permitir a **exclusão** de um projeto, garantindo que não haja dependências que impeçam a remoção.
- As ações de **criação** e **edição** devem validar campos obrigatórios e evitar duplicidades, conforme regras de negócio.
- O sistema deve garantir que apenas usuários autorizados possam criar, editar ou excluir projetos.
- Deve ser possível pesquisar projetos pelo nome ou outros critérios relevantes.

#### **Regras de Negócio:**
1. **Autenticação obrigatória**: Somente usuários autenticados podem acessar a tela de gerenciamento de projetos.
2. **Atributos do Projeto**:
   - **Nome do projeto**: Obrigatório e único.
   - **Descrição do projeto**: Opcional.
   - **Status do projeto**: Pode ser **Ativo** ou **Inativo**.
   - **Orçamento disponível**: Opcional.
3. A criação e edição de projetos devem respeitar as permissões do usuário logado.
4. A exclusão de um projeto só deve ser permitida se não houver registros dependentes associados.
