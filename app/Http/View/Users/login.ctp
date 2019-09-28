<?php
/**
 * @var \App\Http\View\AppView $this
 */
?>
<h1>Login</h1>
<?php 
   echo $this->Form->create();
   echo $this->Form->control('email');
   echo $this->Form->control('password');
   echo $this->Form->button(__('Login'), ['class' => 'btn btn-primary','type'=>'submit']);
   echo $this->Form->end();
?>