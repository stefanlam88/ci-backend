Hi <?= $user_firstname; ?>,
<br/>
<br/>
Kindly verify your account using the below link.
<a target="_blank" href="<?=$this->config->item('web_url') . 'customer/verify/'.$hash;  ?>">Verification Link<a>
<br/>
<br/>
<br/>
Regards,
<br/>
Support OCAHost Team
