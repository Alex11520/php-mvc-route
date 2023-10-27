# 基于mysql:latest镜像构建
FROM mysql:latest

# 切换用户到root，执行所需操作
USER root

# 设置文件权限
RUN chmod 755 /var/lib/mysql