<?php
/**
 * Create by: nic
 * Create at: 15/07/13 - 17:12
 */
?>
<?php if (!$this->request->is("ajax")): ?>
    <h2>Redimenciona imagem</h2>
<?php endif; ?>

<style type="text/css">
    .original_img {
        background-image: url("/<?= str_replace('webroot', '', $image_directory) ?>/<?= $images[0]['original_path'] ?>");
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
        height: 350px;
        width: 350px;
        border: 5px solid black;
        display: none;
    }
</style>

<div class="no-bootstrap-img">
    <form id="crop_form" accept-charset="utf-8" method="post" action="<?= $this->here ?>">
        <?php
        foreach ($images as $id_img => $img) {
            echo $this->Crop->ThumbInterface($img, $id_img, $image_directory);
        }
        ?>
        <div class='original_img'>
        </div>
        <p>
            <input type="checkbox" class="checkbox" name="fit"> Redimencionar para caber.
        </p>
        <?php
        if (!$this->request->is("ajax")) {
            echo $this->Form->end($options = array(
                'label' => 'Salvar',
                'class' => 'btn btn-success',
                'div' => array(
                    'class' => 'btn-toolbar',
                )
            ));
        } else {
            echo '</form>';
        }
        ?>

</div>

<script type="text/javascript">
    $('.checkbox').checkbox();
    $("input[name='fit']").change(function () {
        if (this.checked) {
            $('.jwc_frame').hide();
            $('.original_img').show();
        } else {
            $('.jwc_frame').show();
            $('.original_img').hide();
        }
    })
</script>