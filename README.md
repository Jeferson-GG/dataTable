
# DataTable Customizado com Modal

Este projeto utiliza o plugin **DataTables** para criar uma tabela dinâmica e responsiva com funcionalidades de busca, paginação, exportação de dados, e exibição de detalhes via modal.

## Funcionalidades

### 1. Tabela Responsiva
A tabela é responsiva e se adapta automaticamente a diferentes resoluções e tamanhos de tela, garantindo uma boa experiência em dispositivos móveis e desktops.

### 2. Exibição de Detalhes via Modal
Ao invés de expandir as informações diretamente na tabela, as informações complementares de cada linha são exibidas em um modal. Quando o usuário clica no ícone "+" ao lado de uma linha, o modal é aberto com os dados detalhados dessa linha.

### 3. Paginação e Busca
A tabela oferece suporte à paginação e à busca personalizada, permitindo ao usuário filtrar os dados dinamicamente enquanto navega por diferentes páginas.

### 4. Botões de Exportação
A tabela permite exportar os dados para diferentes formatos, como:
- CSV
- Excel
- PDF
- Imprimir

Esses botões podem ser ocultados ou exibidos dinamicamente via dropdown.

### 5. Dropdown para Exibir/Ocultar Controles
Um dropdown no lado direito da interface permite que o usuário oculte ou exiba o seletor de quantidade de linhas e os botões de exportação. A interface inicia com esses controles ocultos por padrão.

### 6. Tradução para Português
A interface do DataTables está configurada para ser exibida em português, incluindo as mensagens de paginação, filtros e outras interações com o usuário.

## Requisitos

- **jQuery** (>= 3.6.0)
- **Bootstrap 5** (para estilos e modais)
- **DataTables** (>= 1.13.0)
- **DataTables Responsive** (>= 2.4.1)
- **DataTables Buttons** (>= 2.3.6)

## Instalação

### Passos para Configuração:

1. Clone este repositório.

   git clone https://github.com/Jeferson-GG/dataTable.git

2. Certifique-se de ter as bibliotecas necessárias instaladas no seu projeto
3. Inclua também os scripts necessários

---

## Licença

Este projeto é licenciado sob a [Licença MIT](https://opensource.org/licenses/MIT). Sinta-se à vontade para usar e modificar conforme necessário.

