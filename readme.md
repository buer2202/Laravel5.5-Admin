### Buer-B2B
B2B框架，功能介绍：

前台：注册，登录，注销，用户管理，财务管理。

后台：用户管理，前台RBAC，财务系统，财务报表，后台RBAC。

综合：WebSocket服务端、客户端，资金日结，Excel导出、Excel异步导出js插件。

数据：数据库迁移、数据填充。

#### 安装步骤：
1. 克隆代码
2. composer install
3. php artisan migrate --seed
4. php artisan db:seed
5. php artisan vendor:publish 拷贝Asset配置文件
6. cp .env.example .env && php artisan key:generate
