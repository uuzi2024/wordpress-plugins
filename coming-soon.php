<?php
/*
Plugin Name: 敬请期待
Description: 开启后，网站将显示“网站即将上线”页面给未登录的访客。只有已登录并具有编辑权限的用户才能正常浏览网站。
Version: 1.0
Author: 兔哥
*/

function coming_soon_mode() {
  if (!current_user_can('edit_themes') || !is_user_logged_in()) {
    wp_die(
      '<style>
        body { text-align: center; padding: 70px; font-family: sans-serif; background: #f4f4f4; }
        h1 { font-size: 50px; }
        body > div { display: inline-block; padding: 30px; background: white; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
      </style>
      <div>
        <h1>网站即将上线</h1>
        <p>网站建设中！！！<br>我们正在准备中，敬请期待！</p>
      </div>',
      'Coming Soon',
      array('response' => 503)
    );
  }
}
add_action('get_header', 'coming_soon_mode');
