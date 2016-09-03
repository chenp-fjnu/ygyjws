# wordpress
working on wordpress

# Wiki
https://developer.wordpress.org/

https://make.wordpress.org/core/handbook/best-practices/

http://www.wpcourse.com/

https://yun.baidu.com/share/home?uk=1476693679&view=share#category/type=0

https://developer.wordpress.org/plugins/

http://www.wordpress.la/codex.html
http://adambrown.info/p/wp_hooks

# WAMP server
http://www.wampserver.com/en/
http://downloads.sourceforge.net/project/wampserver/WampServer%203/WampServer%203.0.0/wampserver3.0.4_x64_apache2.4.18_mysql5.7.11_php5.6.19-7.0.4.exe?r=http%3A%2F%2Fwww.wampserver.com%2Fen%2F&ts=1471400456&use_mirror=ncu

# PHP Debuger for VS Core
https://marketplace.visualstudio.com/items?itemName=felixfbecker.php-debug

#Function in the core
```php
pulgin.php:
    apply_filters
        _wp_call_all_hook

formatting.php
    esc_attr: Escaping for HTML attributes.
l10n.php:
    esc_attr__: Retrieve the translation of $text and escapes it for safe use in an attribute.
    esc_attr_e: Display translated text that has been escaped for safe use in an attribute.
    esc_attr_x: Translate string with gettext context, and escapes it for safe use in an attribute.
```

#Widget

#Plugin

*http://adambrown.info/p/wp_hooks*
* Filter
```php
has_filters
add_filter()
apply_filters()
current_filter
merge_filters()
remove_filter()
remove_all_filters
```

* Action
```php
has_action
add_action
do_action
do_action_ref_array
did_action
remove_action
remove_all_actions
```

* ShortCode

#Theme

#Template

#Option

