yii2-slideout-widget
==========================
The **Slideout widget** is a wrapper around the [slideout.js plugin](https://mango.github.io/slideout/),
 
> ...A touch slideout navigation menu for your mobile web apps.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist raoul2000/yii2-slideout-widget "*"
```

or add

```
"raoul2000/yii2-slideout-widget": "*"
```

to the require section of your `composer.json` file.


Usage
-----
Using Slideout widget is easy : you need some markup and some CSS (snippets below are retrieved from the [sideout.js demo site](https://mango.github.io/slideout/)) :

**The markup**
```html
<nav id="menu">
  <header>
    <h2>Menu</h2>
  </header>
</nav>

<main id="panel">
  <header>
    <h2>Panel</h2>
  </header>
</main>
```

**The CSS**

```CSS
html,
body {
  width: 100%;
  height: 100%;
}

.slideout-menu {
  position: fixed;
  left: 0;
  top: 0;
  bottom: 0;
  right: 0;
  z-index: 0;
  width: 256px;
  overflow-y: scroll;
  -webkit-overflow-scrolling: touch;
  display: none;
}

.slideout-panel {
  position:relative;
  z-index: 1;
}

.slideout-open,
.slideout-open body {
  overflow: hidden;
}

.slideout-open .slideout-menu {
  display: block;
}
```

And then eventually, the *Slideout* widget, and somewhere in the page a button to open/close the menu :

```php
<?php
 	echo raoul2000\widget\slideout\Slideout::widget([
	'pluginOptions' => [
		'panel' =>  new yii\web\JsExpression("document.getElementById('panel')"),
		'menu' => new yii\web\JsExpression("document.getElementById('menu')"),
		'padding' => 256,
		'tolerance' => 70
	]
]); 

?>
<!-- This button will open/close the side menu -->
<button onclick="yii2_raoul2000_slideout.toggle();">toggle menu</button>

```

The javascript variable `yii2_raoul2000_slideout` has been created by the widget so you can access the slideout menu instance
from anywhere in the page. In the example above, the *onclick* handler invokes *toggle()* which is part of the slideout API.

You may also note that both option `panel` and `menu` are expected to be JS objects (and not selectors).

For more information on the plugin options, please refer to [slideout github page](https://github.com/Mango/slideout).

Alternative
----------
- [yii2-jpanelmenu-widget](https://github.com/raoul2000/yii2-jpanelmenu-widget)
- [yii2-sidr-widget](https://github.com/raoul2000/yii2-sidr-widget)


License
-------

**yii2-slideout-widget** is released under the BSD 3-Clause License. See the bundled `LICENSE.md` for details.
