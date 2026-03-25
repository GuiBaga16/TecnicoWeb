# 📚 TecnicoWeb - Guia de Git

Este repositório contém um resumo prático dos principais comandos do Git para uso no dia a dia.

---

## ⚙️ Configuração Inicial

```bash
git config --global user.name "Seu Nome"
```

Define seu nome para os commits.

```bash
git config --global user.email "algo@exemplo.com"
```

Define seu e-mail.

```bash
git config --list
```

Lista todas as configurações atuais.

---

## 🚀 Iniciando um Repositório

```bash
git init
```

Cria um novo repositório Git local na pasta atual.

```bash
git clone <url>
```

Clona um repositório remoto existente.

---

## 🔄 Fluxo de Trabalho (Stage e Commit)

```bash
git status
```

Mostra o estado dos arquivos.

```bash
git add <arquivo>
```

Adiciona um arquivo específico à stage.

```bash
git add .
```

Adiciona todos os arquivos modificados à stage.

```bash
git commit -m "mensagem"
```

Salva as alterações com uma mensagem.

```bash
git commit -am "mensagem"
```

Adiciona arquivos rastreados e faz commit direto.

---

## 🌿 Branches (Ramos)

```bash
git branch
```

Lista os branches existentes.

```bash
git branch <nome>
```

Cria um novo branch.

```bash
git checkout <nome>
```

Alterna para um branch.

```bash
git checkout -b <nome>
```

Cria e já troca para o novo branch.

---

## 🌐 Repositórios Remotos

```bash
git remote add origin <url>
```

Conecta ao repositório remoto.

```bash
git push -u origin <branch>
```

Envia commits para o remoto.

```bash
git pull
```

Atualiza o repositório local com o remoto.

---

## 🔀 Mesclagem e Histórico

```bash
git log
```

Mostra histórico completo.

```bash
git log --oneline --graph
```

Histórico simplificado e visual.

```bash
git merge <branch>
```

Mescla um branch no atual.

---

## 🏷️ Tags

```bash
git tag <nome>
```

Cria uma tag para marcar versões.

---

## ⚠️ Desfazendo Ações

```bash
git reset --hard HEAD~1
```

Desfaz o último commit (CUIDADO ⚠️).

```bash
git stash
```

Salva alterações temporariamente.

---

## 💡 Dicas de Uso

* Sempre escreva mensagens de commit claras
* Use branches para novas funcionalidades
* Evite usar `--hard` sem entender o impacto
* Faça commits pequenos e frequentes

---

## 📌 Objetivo

Este guia serve como referência rápida para desenvolvimento com Git no dia a dia.

---

