PROJETO MÓDULO 4 – TADS
Tema: Loja virtual para venda de pneus

🎯 Objetivo Principal

Desenvolver uma loja virtual especializada na venda de pneus automotivos e de caminhão.

🖥️ Front-End

Expectativas e Estrutura Visual:

Banner principal:
Deve conter um bordão chamativo que eleve o nível e a qualidade dos produtos.

Cards de produtos:
Logo abaixo do banner, haverá cards exibindo os pneus disponíveis para venda, com imagem, nome e preço.

Navbar (menu superior):

Home

Catálogo

Sobre Nós

Entrar / Cadastrar-se

Carrinho 🛒

Funcionalidades do Catálogo:

Filtros para buscar produtos por marca e tipo.

O botão “Catálogo” abrirá uma caixa de seleção que permitirá escolher o tipo de pneu:

Carro

Caminhão

Frameworks Front-End:

Bootstrap (para layout e responsividade)

SweetAlert (para exibir alertas e mensagens interativas)

⚙️ Back-End

Fluxo de Usuário:

O usuário poderá navegar pelo site sem estar logado.

Ao tentar finalizar uma compra, o sistema verificará:

Se o usuário já estiver logado, prossegue para o pagamento.

Se não estiver logado, será solicitado o login ou cadastro.

Dados necessários para cadastro/login:

Nome completo

CPF

CEP

E-mail

Senha

Finalização da Compra:

Após o login, o sistema exibirá um resumo da compra (nota) com:

Produtos comprados

Dados de envio

Método de entrega:

Entrega no endereço informado, ou

Retirada na loja

Antes de concluir, será solicitado o endereço exato do comprador, para evitar problemas de entrega.

Frameworks Back-End:

Laravel (estrutura MVC e rotas dinâmicas)

Máscara de campos com JavaScript

💡 Resumo

O projeto visa oferecer uma experiência prática e confiável para compra de pneus, combinando interface moderna, funcionalidade segura e processo de compra intuitivo, com tecnologias atuais e foco na usabilidade.