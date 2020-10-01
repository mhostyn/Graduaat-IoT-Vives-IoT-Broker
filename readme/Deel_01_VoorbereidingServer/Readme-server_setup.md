# Server software installatie

op een lokale testinstallatie gebruiken we momenteel de root

```bash
sudo passwd root
su
```


```bash
apt install default-mysql-server default-mysql-client apache2 apache2-doc
echo 'AcceptFilter http none' >> /etc/apache2/apache2.conf
echo 'AcceptFilter https none' >> /etc/apache2/apache2.conf
```
