#Key Code Snippets
* options.php include all options for customization.
```php
of_get_option( $name, $default = false )//it will get the option value.
```
* echo whole template file, social-fa.php and slider-nivo.php for these samples.
```php
<?php get_template_part('social', 'fa'); ?> 

<?php get_template_part('slider', 'nivo'); ?>

<?php get_template_part('sidebar', 'footer'); ?> equals <?php get_sidebar('footer'); ?>
```
* check option and show it in social-fa.php seciton

```php
<?php if ( of_get_option('weibo', true) != "") { ?>
    <a target="_blank" href="<?php echo esc_url(of_get_option('weibo', true)); ?>" title="微博" >
    <i class="social-icon fa fa-weibo"  aria-hidden="true"></i></a>
<?php } ?>
```

#Fontawesome is awesome


#TODO List
* widget for quick comment on hxj and wxs. widget with option?
* add reply on comment