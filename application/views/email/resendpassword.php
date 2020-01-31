Hi <?= $user_firstname;?>,
<br/>
<br/>
Your OCAhost's password is
<?=$this->m_authentication->decryption($user_password);?>
<br/>
kindly login with the password above
<br/>
<br/>
<br/>
Regards,
<br/>
Support OCAHost Team
