- As partes do site simples foram divididas em header, menu, index e footer.
- Os items do menu são artigos buscados no banco de dados ou páginas estaticas ( exemplo: contato ).
- No index são chamados (inseridos) por require o header, o menu, o footer e as páginas estaticas correspondentes.
- Todas as requisições são encaminhadas para o index.php pelo .htaccess.
- A função v_pagina(index) verifica se existe um conteudo no banco de dados com o apelido igual a pagina.
- Se existir conteudo no banco content.php é chamado com formatação para artigo, se existir uma pagina estatica, estatica.php é chamado com formatação para estatica, se nenhum dos dois for encontrado 404.php é chamado com formatação própria.
- Na página de contato só será exibida a mensagem de sucesso, se todos os campos forem preenchidos.
