<?php
add_filter('comment_form_fields', 'kama_reorder_comment_fields');
function kama_reorder_comment_fields($fields)
{
    // die(print_r( $fields )); // посмотрим какие поля есть

    $new_fields = array(); // сюда соберем поля в новом порядке

    $myorder = array('author', 'email', 'url', 'comment'); // нужный порядок

    foreach ($myorder as $key) {
        $new_fields[$key] = $fields[$key];
        unset($fields[$key]);
    }

    // если остались еще какие-то поля добавим их в конец
    if ($fields) {
        foreach ($fields as $key => $val) {
            $new_fields[$key] = $val;
        }
    }

    return $new_fields;
}
$defaults = array(
    'fields' => array(
        'author' => '<div class="cf">' . '<label for="author">' . __('Name') . ($req ? ' <span class="required">*</span>' : '') . '</label> ' .
        '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="35"' . $aria_req . $html_req . ' /></div>',
        'email' => '<div class="cf"><label for="email">' . __('Email') . ($req ? ' <span class="required">*</span>' : '') . '</label> ' .
        '<input id="email" name="email" ' . ($html5 ? 'type="email"' : 'type="text"') . ' value="' . esc_attr($commenter['comment_author_email']) . '" size="35" aria-describedby="email-notes"' . $aria_req . $html_req . ' /></div>',
        'url' => '<div class="cf"><label for="cWebsite">' . __('Website') . '</label> ' .
        '<input id="cWebsite" name="cWebsite" ' . ($html5 ? 'type="url"' : 'type="text"') . ' value="' . esc_attr($commenter['comment_author_url']) . '" size="35" /></div>',
    ),
    'comment_field' => '<div class="message cf"><label for="comment">' . _x('Comment', 'noun') . '<span class="required">*</span></label> <textarea style="resize:none;" id="comment" name="comment" cols="50" rows="10"  aria-required="true" required="required"></textarea></div>',
    'must_log_in' => '<p class="must-log-in">' . sprintf(__('You must be <a href="%s">logged in</a> to post a comment.'), wp_login_url(apply_filters('the_permalink', get_permalink($post_id)))) . '</p>',
    'logged_in_as' => '<p class="logged-in-as">' . sprintf(__('<a href="%1$s" aria-label="Logged in as %2$s. Edit your profile.">Logged in as %2$s</a>. <a href="%3$s">Log out?</a>'), get_edit_user_link(), $user_identity, wp_logout_url(apply_filters('the_permalink', get_permalink($post_id)))) . '</p>',
    'comment_notes_before' => '',
    'comment_notes_after' => '',
    'id_form' => 'contactForm',
    'id_submit' => '',
    'class_form' => 'contactForm',
    'class_submit' => 'submit',
    'name_submit' => 'submit',
    'title_reply' => 'Leave a Comment',
    'title_reply_to' => 'Leave a Reply to %s',
    'title_reply_before' => '<h3>',
    'title_reply_after' => '</h3>',
    'cancel_reply_before' => '',
    'cancel_reply_after' => '',
    'cancel_reply_link' => '',
    'label_submit' => 'Submit',
    'submit_button' => '<button name="%1$s" type="submit" id="%2$s" class="%3$s">%4$s</button>',
    'submit_field' => '<div>%1$s %2$s</div>',
    'format' => 'xhtml',
);

global $post;
               $id = $post->ID;
    // Получаем комментарии поста с ID XXX из базы данных 
    $comments = get_comments(array(
      'post_id' => $id,
         'status' => 'approve', // комментарии прошедшие модерацию
         'walker'            => null,
         'max_depth'         => '',
         'style'             => 'ol',
         'callback'          => null,
         'end-callback'      => null,
         'type'              => 'all',
         'reply_text'        => 'Reply',
         'page'              => '',
         'per_page'          => '',
         'avatar_size'       => 32,
         'reverse_top_level' => true,
         'reverse_children'  => '',
         'format'            => 'html5', // или xhtml, если HTML5 не поддерживается темой
         'short_ping'        => false,    // С версии 3.6,
         'echo'              => true, 
    ));

        // Формируем вывод списка полученных комментариев
        echo '<ol class="commentlist">';
    wp_list_comments(array(
      'per_page' => 10, // Пагинация комментариев - по 10 на страницу
      'reverse_top_level' => false // Показываем последние комментарии в начале
        ), $comments);
        echo '</ol>';

echo '<div class="respond">';
comment_form($defaults);
echo '</div>';