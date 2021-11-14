<!--
* @Author: kenan
* @Date: 2021-10-29 11:06:45
* @LastEditors: kenan
* @LastEditTime: 2021-11-01 10:03:28
* @Description: file content
  -->

# ide.yaml使用说明

## 安装smaride-cli

> 详情请见[安装手册](https://smartide.dev/zh/docs/getting-started/install/)

## 使用远程vm 启动smaritde

```bash
smartide vm start -f .ide/.ide-simple.yaml --host 192.168.1.5 --username leansoft --repourl  https://github.com/SmartIDE/metersphere.git --password leansoft -d
smartide vm start -f .ide/.ide-simple.yaml --host sm-ms-ws001.chinanorth2.cloudapp.chinacloudapi.cn --username ${username} --repourl  https://github.com/SmartIDE/metersphere.git --password ${password}

```
## 启动Apache服务
```bash
/usr/sbin/apachectl -DNO_DETACH -k start
```
## 安装Java 依赖插件

> 在弹出浏览器中安装如下插件

- Extension Pack for Java
- Spring Boot Extension Pack

![extension](./img/step2.png)

## 编译项目

```bash
mvn package
```
![build](./img/step3.png)

**注意编译成功后在右侧菜单栏JAVA PROJECTS若为空（无法编译），尝试打开Java 项目backend**

![project](./img/step4.png)
![openjava](./img/step5.png)

**若打开导入Java项目成功成功如下图所示**
![step6](./img/step6.png)

> 重载项目

![step7](./img/step7.png)

若重载成功，如下图所示
![step8](./img/step8.png)

## 调试

### 断点位置

![step9](./img/step9.png)

### 启动调试

![step10](./img/step10.png)

忽略此处报错

![step11](./img/step11.png)

### 触发断点

![step12](./img/step12.png)
