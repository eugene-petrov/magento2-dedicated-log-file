[![M2 Coding Standard](https://github.com/eugene-petrov/magento2-dedicated-log-file/actions/workflows/coding-standard.yml/badge.svg?branch=main)](https://github.com/eugene-petrov/magento2-dedicated-log-file/actions/workflows/coding-standard.yml)
[![M2 Mess Detector](https://github.com/eugene-petrov/magento2-dedicated-log-file/actions/workflows/mess-detector.yml/badge.svg?branch=main)](https://github.com/eugene-petrov/magento2-dedicated-log-file/actions/workflows/mess-detector.yml)
[![M2 PHPStan](https://github.com/eugene-petrov/magento2-dedicated-log-file/actions/workflows/phpstan.yml/badge.svg?branch=main)](https://github.com/eugene-petrov/magento2-dedicated-log-file/actions/workflows/phpstan.yml)

***Snippet_DedicatedLogFile***

**Description** 

Example of how to start using a dedicated log file

**How to install**
- composer require magento2-dedicated-log-file
- php bin/magento module:enable Snippet_DedicatedLogFile
- php bin/magento setup:upgrade
- php bin/magento clean:cache

**Example**

Go to: `http://{host.name}/snippet/log/`

and you will see the following form:
![form](./.readme/img.png)

Write you text and submit:
![form_submitted](./.readme/img_1.png)

Observe the content of the file: `var/log/snippet.log`
