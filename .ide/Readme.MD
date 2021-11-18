<!--
* @Author: kenan
* @Date: 2021-10-29 11:06:45
* @LastEditors: kenan
* @LastEditTime: 2021-11-01 10:03:28
* @Description: file content
  -->

# ide.yaml使用说明

## 安装smartide-cli

> 详情请见[安装手册](https://smartide.dev/zh/docs/quickstart/)

## 使用远程vm启动smartide
 - 需要保证vm用户环境：建议Ubuntu20+、Git、Docker、docker-compose命令
```bash
# github
smartide vm start -f .ide/.ide.yaml --host 192.168.1.5 --username leansoft --repourl https://github.com/SmartIDE/iTop --password leansoft -d
# github仓库慢的话，使用gitee的
smartide vm start -f .ide/.ide.yaml --host 192.168.1.5 --username leansoft --password leansoft --repourl https://gitee.com/chileeb/smartide-itop.git -d
# 最新修改的模式
smartide start --host 192.168.1.5 --username leansoft --password leansoft --repourl https://gitee.com/chileeb/smartide-itop.git --branch develop --filepath .ide/.ide.yaml
smartide start --host 20.198.250.255 --username azureuser --password '******' --repourl https://gitee.com/chileeb/smartide-itop.git --branch develop --filepath .ide/.ide.yaml

```
## 启动Apache服务
```bash
apachectl -k start
```
## 安装PHP依赖插件

> 在弹出浏览器中安装如下插件

- PHP Extension Pack
  
  ![php_extension_pack.png](img/php_extension_pack.png)
## 调试
### 安装Xdebug调试
```bash
cd / && ./install-xdebug.sh 9003 openvs
```
### 重新启动Apache服务
```bash
apachectl -k restart
```
### Chrome Xdebug helper扩展安装及设置
- 安装参考：https://github.com/mac-cain13/xdebug-helper-for-chrome
- 设置：
  
  ![chrome_xdebug_install.png](img/chrome_xdebug_install.png)
- 开启：
  
  ![chrome_xdebug_debug.png](img/chrome_xdebug_debug.png)
### 断点位置
- setup/wizard.php
  
  ![setup_wizard_breakpoint.png](img/setup_wizard_breakpoint.png)
### 启动调试

  ![debug.png](img/debug.png)
### 触发断点
- 访问：http://localhost:8080/
- 触发open vscode断点
  ![debugging.png](img/debugging.png)
