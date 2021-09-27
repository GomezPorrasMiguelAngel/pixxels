
<?php foreach($u->result() as $row): ?>
<h1><?php echo $row->id; ?></h1>
<p><?php echo $row->nombre; ?></p>
<p><?php echo $row->a_paterno; ?></p>
<p><?php echo $row->correo; ?></p>

<?php endforeach; ?>
