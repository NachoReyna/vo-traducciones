<?php
    $args = array(
        'public' => true,
        'show_in_menu'        => true,
    );
    $post_types = get_post_types( $args );
    $dr_options = get_option('dr_options');
?>
<div class="wrap">
    <?php screen_icon(); ?>
    <h2>Disable Google Recaptcha on Selected Pages</h2>
    <form method="post" action="options.php">
        <?php settings_fields( 'fh_disable_recaptcha' ); ?>
        <h3>Disable or remove annoying google recaptcha of contact form 7 from selected pages.</h3>
        <div class="fh-dr-tabs-wrap">
            <ul class="fh-dr-tabs">
                <li><a href="#" data-target="dr-tab-global" class="active">Global Setting</a></li>
            <?php
            $counter = 0; 
            foreach($post_types as $type) { 
                $type_data = get_post_type_object( $type );
                $active = '';
            ?>
                <li><a href="#" data-target="dr-tab-<?php echo $type; ?>" <?php echo (!empty($active)) ? 'class="'.$active.'"' : ''; ?>><?php echo $type_data->label; ?></a></li>
            <?php 
                $counter++;
            } 
            ?>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="dr-tab-contents-wrap">
            <div class="dr-tab-contents dr-tab-global" style="display:block;">
                <h3><?php _e('For Archive','fh-disable-recaptcha'); ?></h3>
                <div class="recaptcha_settings">
                    <table>
                        <tr>
                            <td>
                                <label>
                                    <input type="radio" name="dr_options[hide_dr_archive_global]" value="" <?php echo $dr_options['hide_dr_archive_global'] == '' ? 'checked' : ''; ?>>
                                    <?php _e('Use default settings','fh-disable-recaptcha'); ?>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input type="radio" name="dr_options[hide_dr_archive_global]" value="hide" <?php echo $dr_options['hide_dr_archive_global'] == 'hide' ? 'checked' : ''; ?>>
                                    <?php _e('Show badge if form exist','fh-disable-recaptcha'); ?>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input type="radio" name="dr_options[hide_dr_archive_global]" value="remove" <?php echo $dr_options['hide_dr_archive_global'] == 'remove' ? 'checked' : ''; ?>>
                                    <?php _e('Remove Recaptcha Badge','fh-disable-recaptcha'); ?>
                                </label>
                            </td>
                        </tr>
                    </table>
                </div>
                <h3><?php _e('For Single Page','fh-disable-recaptcha'); ?></h3>
                <div class="recaptcha_settings">
                    <table>
                        <tr>
                            <td>
                                <label>
                                    <input type="radio" name="dr_options[hide_dr_global]" value="" <?php echo $dr_options['hide_dr_global'] == '' ? 'checked' : ''; ?>>
                                    <?php _e('Use default settings','fh-disable-recaptcha'); ?>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input type="radio" name="dr_options[hide_dr_global]" value="hide" <?php echo $dr_options['hide_dr_global'] == 'hide' ? 'checked' : ''; ?>>
                                    <?php _e('Show badge if form exist','fh-disable-recaptcha'); ?>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>
                                    <input type="radio" name="dr_options[hide_dr_global]" value="remove" <?php echo $dr_options['hide_dr_global'] == 'remove' ? 'checked' : ''; ?>>
                                    <?php _e('Remove Recaptcha Badge','fh-disable-recaptcha'); ?>
                                </label>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php
            $counter = 0;
            foreach($post_types as $type) {
                $type_data = get_post_type_object( $type );
                $active = '';
                $posts = fh_dr_get_posts( $type );
                ?>
                <div class="dr-tab-contents dr-tab-<?php echo $type; ?>" <?php echo (!empty($active)) ? 'style="display:block;"' : ''; ?>>
                    <?php if($type != "page") { ?>
                        <h3><?php _e('For Archive','fh-disable-recaptcha'); ?></h3>
                        <div class="recaptcha_settings">
                            <table>
                                <tr>
                                    <td>
                                        <label>
                                            <input type="radio" name="dr_options[hide_dr_archive_<?php echo $type; ?>]" value="" <?php echo $dr_options['hide_dr_archive_'.$type] == '' ? 'checked' : ''; ?>>
                                            <?php _e('Use default settings','fh-disable-recaptcha'); ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>
                                            <input type="radio" name="dr_options[hide_dr_archive_<?php echo $type; ?>]" value="hide" <?php echo $dr_options['hide_dr_archive_'.$type] == 'hide' ? 'checked' : ''; ?>>
                                            <?php _e('Show badge if form exist','fh-disable-recaptcha'); ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>
                                            <input type="radio" name="dr_options[hide_dr_archive_<?php echo $type; ?>]" value="remove" <?php echo $dr_options['hide_dr_archive_'.$type] == 'remove' ? 'checked' : ''; ?>>
                                            <?php _e('Remove Recaptcha Badge','fh-disable-recaptcha'); ?>
                                        </label>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <h3><?php _e('For Single Page','fh-disable-recaptcha'); ?></h3>
                    <?php }
                    else {
                        ?>
                        <h3><?php echo $type_data->label; ?></h3>
                        <?php
                    } 
                    ?>
                    <div class="recaptcha_settings fh_single">
                        <table>
                            <tr>
                                <td>
                                    <label>
                                        <input type="radio" name="dr_options[hide_dr_<?php echo $type; ?>]" value="" <?php echo $dr_options['hide_dr_'.$type] == '' ? 'checked' : ''; ?>>
                                        <?php _e('Use default settings','fh-disable-recaptcha'); ?>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        <input type="radio" name="dr_options[hide_dr_<?php echo $type; ?>]" value="hide" <?php echo $dr_options['hide_dr_'.$type] == 'hide' ? 'checked' : ''; ?>>
                                        <?php _e('Show badge if form exist','fh-disable-recaptcha'); ?>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        <input type="radio" name="dr_options[hide_dr_<?php echo $type; ?>]" value="remove" <?php echo $dr_options['hide_dr_'.$type] == 'remove' ? 'checked' : ''; ?>>
                                        <?php _e('Remove Recaptcha Badge','fh-disable-recaptcha'); ?>
                                    </label>
                                </td>
                            </tr>
                            <?php if(count($posts)) { ?>
                            <tr>
                                <td>
                                    <label>
                                        <input type="radio" name="dr_options[hide_dr_<?php echo $type; ?>]" value="hide_custom" <?php echo $dr_options['hide_dr_'.$type] == 'hide_custom' ? 'checked' : ''; ?>>
                                        <?php _e('Show badge if form exist on selected items','fh-disable-recaptcha'); ?>
                                    </label>
                                    <div class="hide_selection hide-selected-dp" <?php echo $dr_options['hide_dr_'.$type] == 'hide_custom' ? 'style="display:block;"' : ''; ?>>
                                        <?php
                                            $selections = $dr_options['selected_hide_dr_'.$type];
                                            if(empty($selections)) {
                                                $selections = array();
                                            }
                                        ?>
                                        <select multiple="multiple" name="dr_options[selected_hide_dr_<?php echo $type; ?>][]" class="fh_multi_selection">
                                            <?php foreach($posts as $key => $value) { ?>
                                            <option value="<?php echo $key; ?>" <?php echo (in_array($key,$selections)) ? 'selected' : ''; ?>><?php echo $value; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>
                                        <input type="radio" name="dr_options[hide_dr_<?php echo $type; ?>]" value="remove_custom" <?php echo $dr_options['hide_dr_'.$type] == 'remove_custom' ? 'checked' : ''; ?>>
                                        <?php _e('Remove badge on selected items','fh-disable-recaptcha'); ?>
                                    </label>
                                    <div class="hide_selection remove-selected-dp" <?php echo $dr_options['hide_dr_'.$type] == 'remove_custom' ? 'style="display:block;"' : ''; ?>>
                                        <?php
                                            $selections = $dr_options['selected_remove_dr_'.$type];
                                            if(empty($selections)) {
                                                $selections = array();
                                            }
                                        ?>
                                        <select multiple="multiple" name="dr_options[selected_remove_dr_<?php echo $type; ?>][]" class="fh_multi_selection">
                                            <?php foreach($posts as $key => $value) { ?>
                                            <option value="<?php echo $key; ?>" <?php echo (in_array($key,$selections)) ? 'selected' : ''; ?>><?php echo $value; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
                <?php
                $counter++;
            }
            ?>
            <?php  submit_button(); ?>
        </div>
    </form>
</div>