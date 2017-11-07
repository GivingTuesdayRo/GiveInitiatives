<?php
/** @var \GiveInitiatives\Library\Metabox\Field\Fields\AbstractField $field */
?>

<label>
    <input id="<?php echo $field->getId(); ?>"
           type="text"
           name="<?php echo $field->getName(); ?>"
           value="<?php echo $field->getValue(); ?>"
    >
    <?php echo $label; ?>
</label>