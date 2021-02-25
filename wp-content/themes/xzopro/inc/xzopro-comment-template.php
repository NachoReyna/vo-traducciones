<?php

add_filter('comment_form_default_fields', 'xzopro_comment_form');

function xzopro_comment_form($xzopro_fields){

    $xzopro_fields['author'] = '
        <div class="row comment-form-wrap">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="name-cmt">'.esc_html__('Name', 'xzopro').' <span>*</span></label>
                <input type="text" name="author" id="name-cmt">
            </div>
        </div>
    ';

    $xzopro_fields['email'] =  '
        <div class="col-lg-6">
            <div class="form-group">
                <label for="email-cmt">'.esc_html__('Email', 'xzopro').' <span>*</span></label>
                <input type="email" name="email" id="email-cmt">
            </div>
        </div>
    ';

    $xzopro_fields['url'] = '
        <div class="col-lg-12">
            <div class="form-group">
                <label for="website">'.esc_html__('Website', 'xzopro').'</label>
                <input type="text" name="url" id="website">
            </div>
        </div>
        </div>
        
    ';

    return $xzopro_fields;
}


add_filter('comment_form_defaults', 'xzopro_comment_default_form');

function xzopro_comment_default_form($default_form){

    $default_form['comment_field'] = '
        <div class="row">
            <div class="col-sm-12">
                <div class="comment-message">
                    <label>'.esc_html__('Your Comment', 'xzopro').'<span>*</span></label>
                    <textarea name="comment" rows="4" required="required"></textarea>
                </div>
            </div>
    ';

    $default_form['submit_button'] = '
        </div>
        <button type="submit" class="fill-btn xzopro-btn">'.esc_html__('Post Comment', 'xzopro').'</button>
    ';

    $default_form['comment_notes_before'] = esc_html__('All fields marked with an asterisk (*) are required', 'xzopro' );
    $default_form['title_reply'] = esc_html__('Leave A Comment', 'xzopro');
    $default_form['title_reply_before'] = '<h4 class="comments-heading">';
    $default_form['title_reply_after'] = '</h4>';

    return $default_form;
}


function xzopro_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter( 'comment_form_fields', 'xzopro_move_comment_field_to_bottom' );