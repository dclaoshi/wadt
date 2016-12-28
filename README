# 简介
---
这是一个手机网上答题系统，基于php+mysql，实现的基本功能是答题，如果有答错，给用户回显正确答案，如果全部答对，给用户回显全部答对，然后在数据库中记录此次结果，该系统并没有制作后台，统计需要从数据库表里直接查询。该系统UI使用了[MUI](http://www.dcloud.io/mui.html)，能够自动适配移动端和PC端。

一个简单使用GIF

![](images/luxiang.gif)

# 快速开始

## 配置数据库

首先，sql文件为`wadt.sql`，导入mysql中，编码使用utf-8。

在`config.php`文件中的

```php
$hostname="mysql"; //mysql地址
$basename="root"; //mysql用户名
$basepass="123456"; //mysql密码
$database="wadt"; //mysql数据库名称
```

部分按照注释填入相对应内容。

## 修改题目个数

在`config.php`文件中的

```php
$v_question_count = 20; //总题目数
$v_question_select_num =3; //在答题活动中一共有多少道题目
```

目前给出的sql文件中一共给出了20道题目，所以如果不是自己新增加了题目，这里不用改动参数`v_question_count`，`v_question_select_num`为答题活动中一共有多少道题目。

配置完成了，直接就可以放到环境里跑了，推荐使用[xampp](https://www.apachefriends.org/zh_cn/index.html)集成环境，或者使用[docker]()环境部署运行。
