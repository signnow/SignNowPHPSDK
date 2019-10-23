##How to run code examples

run.php is main script to run examples. There are a list of required parameters needed to make calls.
```php
authtype,token,script,host
```
Also each example could have required parameters, that described in $requiredParameters class variable.
Please pay attention, in file examples/config/map.php described mapping array. Key-value pair according to scriptname-exampleClass pair 
##Important 
All parameters should be divided by ```=```. 
Example:
```php
run examples/run.php --authtype=$authtype --token=$token --host=http://example.com -- --script=$scriptname
```