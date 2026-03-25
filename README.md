# TecnicoWeb

Configuração Inicial:


git config --global user.name "Seu Nome" - Define seu nome para os commits.
git config --global user.email "algo@exemplo.com" - Define seu e-mail.
git config --list - Lista todas as configurações.
Iniciando um Repositório:


git init - Cria um novo repositório Git local na pasta atual.
git clone - Clonar um repositório remoto existente.
Fluxo de Trabalho (Stage e Commit):


git status - Mostra o estado dos arquivos (modificados, na stage, etc.).
git add - Adiciona um arquivo específico à stage (área de preparação).
git add . - Adiciona todos os arquivos modificados à stage.
git commit -m "mensagem" - Salva as alterações da stage no repositório com uma mensagem.
git commit -am "mensagem" - Adiciona arquivos rastreados e faz o commit de uma só vez.
Branches (Ramos):


git branch - Lista os branches existentes.
git branch - Cria um novo branch.
git checkout - Alterna para o branch especificado.
git checkout -b - Cria e alterna para um novo branch ao mesmo tempo.
Repositórios Remotos:


git remote add origin - Conecta o repositório local a um remoto (ex: GitHub).
git push -u origin - Envia os commits locais para o repositório remoto.
git pull - Atualiza o repositório local com as mudanças do remoto.
Mesclagem e Histórico:


git log - Mostra o histórico de commits.
git log --oneline --graph - Mostra o histórico de forma simplificada e gráfica.
git merge - Mescla um branch no branch atual.
Tags:


git tag - Cria uma tag leve para marcar uma versão.
Desfazendo Ações:


git reset --hard HEAD~1 - Desfaz o último commit e remove as alterações locais (perigoso!).
git stash - Guarda alterações temporariamente sem fazer commit.
