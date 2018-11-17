<?php

class MentoresModule_CategoryMetaFields
{

    public function __construct()
    {
        add_action('category_add_form_fields', array($this, 'addFields'), 10, 2);
        add_action('category_edit_form_fields', array($this, 'editFields'), 10, 2);

        add_action('created_category', array($this, 'saveMeta'), 10, 2);
        add_action('edited_category', array($this, 'saveMeta'), 10, 2);
    }

    public function addFields($taxonomy)
    {
        ?>
        <div class="form-field term-group">
            <label for="meta-title">Título na página</label>
            <input type="text" class="postform" id="meta-title" name="meta[category_title]">
        </div>
        <?php
    }

    public function editFields($term, $taxonomy)
    {
        $title = get_term_meta($term->term_id, "category_title", true);
        ?>
        <tr class="form-field term-group-wrap">
            <th scope="row">
                <label for="meta-title">Título na página</label>
            </th>
            <td>
                <input type="text" class="postform" id="meta-title" name="meta[category_title]" value="<?php echo $title ?>">
            </td>
        </tr>
        <?php
    }

    public function saveMeta($term_id, $tt_id)
    {
        $data = $_POST;
        if (!empty($data['meta'])) {
            foreach ($data['meta'] as $key => $value) {
                update_term_meta($term_id, $key, $value);
            }
        }
    }

}
$categoryMetaFields = new MentoresModule_CategoryMetaFields();
