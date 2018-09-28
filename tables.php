<?php
    execute("
        DROP DATABASE IF EXISTS `api4erl`;
        CREATE DATABASE `api4erl` 
            CHARACTER SET 'utf8' 
            COLLATE 'utf8_general_ci';

        DROP TABLE IF EXISTS `module`;
        CREATE TABLE `module`
        (
            `id`                    INTEGER     NOT NULL                COMMENT 'ID',
            `name`                  VARCHAR(100)NOT NULL DEFAULT ''     COMMENT '名称',
            `summaryC`              VARCHAR(200)NOT NULL DEFAULT ''     COMMENT '摘要 - 中文',
            `summaryE`              VARCHAR(200)NOT NULL DEFAULT ''     COMMENT '摘要 - 英文',
            `detailC`               VARCHAR(200)NOT NULL DEFAULT ''     COMMENT '详情 - 中文',
            `detailE`               VARCHAR(200)NOT NULL DEFAULT ''     COMMENT '详情 - 英文',
            CONSTRAINT `pk_module` PRIMARY KEY (`id`)
        )
        COMMENT       = '模块'
        ENGINE        = 'InnoDB'
        CHARACTER SET = 'utf8'
        COLLATE       = 'utf8_general_ci';

        INSERT INTO `module` VALUES
            (1, 'Bifs',         'Erlang的内建函数',  'Build-in functions', '', ''),
            (2, 'application',  '通用OTP应用',      'Generic OTP application functions',
    '在OTP中，应用(application)表示实现某些特定功能的组件，
它可以作为一个单元来启动和停止，并且可以在其他系统中重用。

这个模块与应用控制器(application_controller)交互，
这是在每个Erlang运行时系统(Erlang runtime system :: ERTS)启动的一个进程。
这个模块包含 控制应用的函数(例如：启动和停止应用)和访问有关应用信息的函数(例如：参数配置)。

一个应用由应用规范定义。
规范通常位于名为 Application.app 的应用资源文件中，Application是该应用的名称。
有关应用规范的详情，请参见app(4)。

这个模块也可以看作根据OTP设计原则作为监督树的应用实现行为(-behaviour)。
如何定义启动和停止监督树位于应用回调(-callback)模块中，需导出(-export)这几个预定义的回调函数。

有关应用和行为的详情，请参加OTP设计原则(OTP Design Principles)。
', 
    'In OTP, application denotes a component implementing some specific functionality,
that can be started and stopped as a unit, and that can be reused in other systems.
This module interacts with application controller, 
a process started at every Erlang runtime system. 
This module contains functions for controlling applications 
(for example, starting and stopping applications), 
and functions to access information about applications (for example, configuration parameters).

An application is defined by an application specification. 
The specification is normally located in an application resource file named Application.app, 
where Application is the application name. 
For details about the application specification, see app(4).

This module can also be viewed as a behaviour for an application implemented 
according to the OTP design principles as a supervision tree. 
The definition of how to start and stop the tree is to be located in an application callback module,
exporting a predefined set of functions.

For details about applications and behaviours, see OTP Design Principles.
');

        DROP TABLE IF EXISTS `function`;
        CREATE TABLE `function`
        (
            `id`                    INTEGER     NOT NULL                COMMENT 'ID',
            `name`                  VARCHAR(100)NOT NULL DEFAULT ''     COMMENT '名称',
            `summary`               VARCHAR(200)NOT NULL DEFAULT ''     COMMENT '摘要',
            `detail`                VARCHAR(200)NOT NULL DEFAULT ''     COMMENT '详情',
            `module_id`             INTEGER     NOT NULL DEFAULT 0      COMMENT '模块ID',
            CONSTRAINT `pk_function` PRIMARY KEY (`id`)
        )
        COMMENT       = '函数'
        ENGINE        = 'InnoDB'
        CHARACTER SET = 'utf8'
        COLLATE       = 'utf8_general_ci';

        DROP TABLE IF EXISTS `data_type`;
        CREATE TABLE `data_type`
        (
            `id`                    INTEGER     NOT NULL                COMMENT 'ID',
            `name`                  VARCHAR(100)NOT NULL DEFAULT ''     COMMENT '名称',
            `summary`               VARCHAR(200)NOT NULL DEFAULT ''     COMMENT '摘要',
            `detail`                VARCHAR(200)NOT NULL DEFAULT ''     COMMENT '详情',
            `module_id`             INTEGER     NOT NULL DEFAULT 0      COMMENT '模块ID',
            CONSTRAINT `pk_data_type` PRIMARY KEY (`id`)
        )
        COMMENT       = '数据类型'
        ENGINE        = 'InnoDB'
        CHARACTER SET = 'utf8'
        COLLATE       = 'utf8_general_ci';

        DROP TABLE IF EXISTS `example`;
        CREATE TABLE `example`
        (
            `id`                    INTEGER     NOT NULL                COMMENT 'ID',
            `name`                  VARCHAR(100)NOT NULL DEFAULT ''     COMMENT '名称',
            `summary`               VARCHAR(200)NOT NULL DEFAULT ''     COMMENT '摘要',
            `detail`                VARCHAR(200)NOT NULL DEFAULT ''     COMMENT '详情',
            `module_id`             INTEGER     NOT NULL DEFAULT 0      COMMENT '模块ID',
            CONSTRAINT `pk_example` PRIMARY KEY (`id`)
        )
        COMMENT       = '例子'
        ENGINE        = 'InnoDB'
        CHARACTER SET = 'utf8'
        COLLATE       = 'utf8_general_ci';

        DROP TABLE IF EXISTS `notice`;
        CREATE TABLE `notice`
        (
            `id`                    INTEGER     NOT NULL                COMMENT 'ID',
            `name`                  VARCHAR(100)NOT NULL DEFAULT ''     COMMENT '名称',
            `summary`               VARCHAR(200)NOT NULL DEFAULT ''     COMMENT '摘要',
            `detail`                VARCHAR(200)NOT NULL DEFAULT ''     COMMENT '详情',
            `module_id`             INTEGER     NOT NULL DEFAULT 0      COMMENT '模块ID',
            CONSTRAINT `pk_notice` PRIMARY KEY (`id`)
        )
        COMMENT       = '注意'
        ENGINE        = 'InnoDB'
        CHARACTER SET = 'utf8'
        COLLATE       = 'utf8_general_ci';
    ");
?>