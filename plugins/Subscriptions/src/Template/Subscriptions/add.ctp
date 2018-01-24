<div id="plans-prices" class="">
    <h2>Plans and Prices</h2>
    <div class="contact-body">
		Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos.
    </div>
    <hr />
    <div class="contact-form">
        <?php
        	echo $this->Form->create($subscription);
        	echo $this->Form->input('plan_id', ['label' => __d('croogo', 'Your Plan')]);
        	echo $this->Form->input('name', ['label' => __d('croogo', 'Your name')]);
        	echo $this->Form->input('email', ['label' => __d('croogo', 'Your email')]);
	        echo $this->Form->submit();
	        echo $this->Form->end();
        ?>
    </div>
</div>
