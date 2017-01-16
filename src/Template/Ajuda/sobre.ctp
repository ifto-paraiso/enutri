<?php

$this->extend('_ajuda');

$this->assign('content-icon', 'sobre');
$this->assign('content-description', 'Sobre o sistema');

echo $this->Box->create();

echo $this->Box->body();

?>
    
<h2>
    Sobre o ENUTRI
</h2>

<p>
    
</p>

<h2> Licença </h2>

<p>
    O ENUTRI é distribuído sob licença GPLv3.
</p>

<?php

echo $this->Box->end();
