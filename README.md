# magenteria1
Plugin para Magento 1.x que sincroniza assinantes da Newsletter com uma conta na Templateria.

## build

Para empacotar a extensão no formato MagentoConnect é preciso usar o script [MagentoTarToConnect](https://github.com/astorm/MagentoTarToConnect):

```bash
wget "https://github.com/astorm/MagentoTarToConnect/raw/master/magento-tar-to-connect.phar" -O magento-tar-to-connect
chmod +x magento-tar-to-connect
./build.sh
```

Esse comando criará um pacote `tgz` dentro do diretório `build` com a extensão. Para alterar os metadados da extensão, altere o arquivo `package.config.php`.