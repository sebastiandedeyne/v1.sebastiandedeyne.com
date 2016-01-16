---
title: Unix Commands That Just Work
---

My personal unix cookbook.

## Filesystem

Find a file with specific contents
```bash
grep 'string' /lo/ca/tion -s
```

Create a symlink
```bash
ln -s <source> <target>
```

Zip things
```bash
zip <target> <input1> <input2> ...
```

Unzip things
```bash
unzip <target>
```

Secure copy
```bash
scp [-r] <remote>:<path> <target>
```

Delete all files based on a pattern
```bash
find /path . -name '*.orig' -type f -delete
```

Delete all empty directories
```bash
find . -type d -empty -delete
```

That tool for browsing the filesystem by filesize
```bash
sudo apt-get install ncdu
```

## Processes

Find a process' ID
```bash
ps aux | grep <process>
```

Find a process' ID that's listening to a certain port
```bash
lsof -i :<port>
```

Kill a process by PID
```bash
kill -9 <PID>
```

## Bash script stuff

Get the current script's directory
```bash
DIR="$(cd "$(dirname "$0")" && pwd)"
```

## Images

Resize an image based on a max size
```bash
sips -Z <size> *.<extension>
```
