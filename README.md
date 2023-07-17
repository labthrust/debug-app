# debug-app

This application displays various information for debugging when you access `/`.

```json
{
  "currentBranch": "main",
  "lastCommit": {
    "commitHash": "1761ecca9b6ce614152859e092dff169a10c10e0",
    "subject": "feat: 🎸 add Dockerfile",
    "refs": "HEAD -> main, origin/main",
    "date": "2023-07-17T09:06:01+09:00",
    "committerName": "suin",
    "authorName": "suin"
  },
  "buildTimeEnvironmentVariables": {
    "HOME": "/root",
    "GPG_KEYS": "39B641343D8C104B2B146DC3F9C39DC0B9698544 E60913E4DF209907D8E30D96659A97C9CF2A795A 1198C0117593497A5EC5C199286AF1F9897469DC",
    "PATH": "/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin",
    "BUILD_TIME_VAR_1": "1",
    "BUILD_TIME_VAR_2": "2",
    "PWD": "/var/www/html",
    "BUILD_TIME_VAR_3": "3"
  },
  "runtimeEnvironmentVariables": {
    "HOSTNAME": "0c66c678b0e3",
    "A": "B",
    "GPG_KEYS": "39B641343D8C104B2B146DC3F9C39DC0B9698544 E60913E4DF209907D8E30D96659A97C9CF2A795A 1198C0117593497A5EC5C199286AF1F9897469DC",
    "TERM": "xterm",
    "PATH": "/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin",
    "LANG": "C",
    "PWD": "/var/www/html"
  }
}
```

- `currentBranch`: The current branch name that was used to build this application.
- `lastCommit`: The last commit information that was used to build this application.
- `buildTimeEnvironmentVariables`: The build time environment variables that were used to build this application.
- `runtimeEnvironmentVariables`: The runtime environment variables that are available in the container.

## Available build time variables

Available build time environment variables are listed below. These variables are defined in [`Dockerfile`](Dockerfile).

- `BUILD_TIME_VAR_1`
- `BUILD_TIME_VAR_2`
- `BUILD_TIME_VAR_3`

You can pass these variables to the container at the build time.
