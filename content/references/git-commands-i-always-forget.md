---
title: Git Commands I Always Forget
---

My personal git cookbook.

## Commits

Undo the last commit
```bash
git reset --soft HEAD~1
```

Revert the last commit (this deletes things!)
```bash
git reset --hard HEAD~1
```

Get current commit hash
```bash
git rev-parse HEAD
```

## Branches

Delete a branch
```bash
git branch -d <branchname>
```

Merge one file from a branch
```bash
git checkout -p <branch> <code>
```

Merge a branch without checking out
```bash
git merge <this branch> <to this branch>
```

## Tags

Amend a tag (don't forget to force push afterwards)
```bash
git tag -a <tag> <new-commit> -f
```

Remove a tag (and then remove it from the remote)
```bash
git tag -d <tag>
git push origin :refs/tags/<tag>
```

## Staging

Remove all untracked files
```bash
git clean -f
```

## Remotes

Sync your fork with the original repository
```bash
git remote add upstream https://github.com/<user>/<repo>.git
git fetch upstream
git checkout master
git rebase upstream/master
```

## Settings

Setting a global .gitignore
```bash
git config --global core.excludesfile ~/.gitignore_global
```
