# yii2-keycdn
A Yii2 extension for some KeyCDN lovin' that's so simple even your dog will be able to use it.

## Defining the Extension

Here is the full definition, from an example:

	'keycdn' => [
		'class' => 'sammaye\keycdn\KeyCdn',
		'apiKey' => 'your_api_key'
	]
    
Everything is quite self explanatory.

These directly relate to the SDK's own.

Now with this definition you can just use the API like the component doesn't even exist, for example:

    $cdn = Yii::$app->rackspace->cdnService();
    var_dump($cdn->listServices());
    
## Links

- [Issue Tracker](https://github.com/Sammaye/yii2-rackspace/issues)
- [Github](https://github.com/Sammaye/yii2-rackspace)
- [Packagist](https://packagist.org/packages/sammaye/yii2-rackspace)
