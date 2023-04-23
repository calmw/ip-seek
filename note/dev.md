#### composer 包开发流程

1. 创建目录，并切换到目录
2. 执行 ``` composer init ``` ，根据要求信息一步步执行， type 可选择 1； minimum-stability 可选择 stable； license 可选择MIT
3. 向composer.json添加autoload，下面例子（最后面例子）中Calm和类名共同组成了命名空间，注意斜线
4. 在跟目录创建src目录，写上自己代码逻辑
5. 将代码传到gitLab或gitHub
6. 在package list注册账号并在导航栏操作submit，填入仓库地址等信息
7. 可以使用webhook实现仓库更新后，composer包自动更新，或者直接用GitHub登陆package list也可以实现包代码提交打上标签后自动更新

``` json
"autoload": {
    "psr-4": {
    "Calm\\": "src/"
    }
}
```