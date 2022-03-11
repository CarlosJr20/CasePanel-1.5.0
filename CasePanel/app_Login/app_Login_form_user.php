<!DOCTYPE html>
<html lang="en">
    <head>
        <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
        <title>WebCase IoT</title>
		
        <link rel="stylesheet" type="text/css" href="../_lib/libraries/grp/login/login/css/login2.css">
        <link rel="stylesheet" type="text/css" href="../_lib/libraries/grp/login/libs/css/styles.css">
     	      <link rel="icon" type="imagem/ico" href= "shortcut icon""../_lib/img/login/imgs/favicon.ico"/>
        
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body class="page-sidebar page-background bg-half-img" style="background-image:url('../_lib/libraries/grp/login/imgs/fundo.png');background-size:100%;">
        <div class="page">
            <div class="container">
                <div class="grid">
					
                    <div class="col-7">
						
                        <div class="content">
							
								<div class= "left">
								<div class= "img2">
						 <img src="../_lib/libraries/grp/login/imgs/
SC_webcaseiot original_cortada_2 2000x.png" alt="logo" > 
							 </div>
								 </div>
							<br>
							<br>
						<br>
							<br>
						
							<br>
							
							
                   <p>
                          
						 Tecnologia em gestão de dados. O futuro da sua empresa, agora!
							
                           </p>
								 <br>
							
                            <p>
                                <a href="https://webcaseiot.com.br/">Acesse o nosso site »</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-1">
                    </div>
					  
                    <div class="col-4">
						
                        <form class="form half-size" action=""  name="F1" method="post" 
               action="./" 
               target="_self">
                            <input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nmgp_url_saida); ?>">
<input type="hidden" name="bok" value="OK">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />

							
								<br> <img src="../_lib/libraries/grp/login/imgs/
SC_casePanel 350x black.png" alt="logo" >
							</br>
						<br>
                            <h2>
                               Entrar
                            </h2>
                             <div class="control">
                    <label class="form-label">Usuário</label>
                    <input class="input  sc-js-input " type="text" placeholder="Usuário"  name="login" id="id_sc_field_login" value="<?php echo $this->form_encode_input($login) ?>"  alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: true, autoTab: false, selectOnFocus: false, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >					
                </div>
                <div class="control">
                    <label class="form-label">Senha</label>
                    <input class="input  sc-js-input " type="password" placeholder="Senha"  name="pswd" id="id_sc_field_pswd" value="<?php echo $this->form_encode_input($pswd) ?>"  alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: true, autoTab: false, selectOnFocus: false, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >					
                </div>
                           	<!--SC_CAPTCHA-->
							* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?>
                    	
                <div class="submit">
                    <input class="button button-block" type="button" value="Entrar"  onclick="nm_atualiza('alterar');"  />
                </div>
                <input type="hidden" name="links" value = "">
<input type="hidden" name="links_sc_target_name" value = "">
<div id="id-links-1" class="class-links ">
 <a href="javascript:nm_menu_link_links('app_form_add_users', '_self')">Cadastrar</a>
</div><div id="id-links-2" class="class-links ">
 <a href="javascript:nm_menu_link_links('app_retrieve_pswd', '_self')">Esqueceu a senha?</a>
</div>
          
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="alert-message negative">
            <span class="message"></span>
            <span class="close">&times;</span>
        </div>
        
         <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_userSweetAlertDisplayed = false;
 </SCRIPT>
        <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" />

<script>
var scFocusFirstErrorField = true;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("app_Login_sajax_js.php");
?>
<script type="text/javascript">
var Nm_Proc_Atualiz = false;
</script>
<script type="text/javascript">
<?php

include_once('app_Login_jquery.php');

?>
</script>
<script type="text/javascript">
 $(function() {
  scJQElementsAdd('');
  scJQGeneralAdd();
<?php
if ('' == $this->scFormFocusErrorName)
{
?>
  scFocusField('login');

<?php
}
?>
 });

</script>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("app_Login_js0.php");
?>
<?php
$msgDefClose = isset($this->arr_buttons['bmessageclose']) ? $this->arr_buttons['bmessageclose']['value'] : 'Ok';
?>
<script type="text/javascript">
var scMsgDefTitle = "<?php if (isset($this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl'])) {echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl'];} ?>";
var scMsgDefButton = "Ok";
var scMsgDefClose = "<?php echo $msgDefClose; ?>";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->page; ?>";
</script>
<script type='text/javascript'>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login']['sc_modal'])
{
?>
  parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
elseif ($this->lig_edit_lookup)
{
?>
  opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
?>
}
if (bLigEditLookupCall)
{
  scLigEditLookupCall();
}
<?php
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
<?php
$sIconTitle = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
$sErrorIcon = (isset($_SESSION['scriptcase']['error_icon']['app_Login']) && '' != $_SESSION['scriptcase']['error_icon']['app_Login']) ? $_SESSION['scriptcase']['error_icon']['app_Login']  : "";
$sCloseIcon = (isset($_SESSION['scriptcase']['error_close']['app_Login']) && '' != trim($_SESSION['scriptcase']['error_close']['app_Login'])) ? $_SESSION['scriptcase']['error_close']['app_Login'] : "<td><input class=\"scButton_default\" type=\"button\" onClick=\"document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false\" value=\"X\" /></td>";
if ('' != $sIconTitle && '' != $sErrorIcon) {
    $sErrorIcon = '';
}
?>
<script type="text/javascript">
$(function() {
    $(document.F1).on("submit", function (e) {
        e.preventDefault();
    });
});

if (typeof scDisplayUserError === "undefined") {
    function scDisplayUserError(errorMessage) {
        var divObj, displayDiv = "", displayDivHtml = "";

        displayDiv = '<div id="id_error_display_fixed">';
        displayDiv += '</div>';

        divObj = $("#id_error_display_fixed");
        if (divObj.length) {
            divObj.html("");
        } else {
            $("body").append(displayDiv);
            divObj = $("#id_error_display_fixed");
        }

        displayDivHtml  = '<TABLE class="scFormErrorTable scFormToastTable" align="center">';
        displayDivHtml +=  '<TR>';
<?php
if ('' != $sIconTitle) {
?>
        displayDivHtml +=   '<td style="padding: 0px" rowspan="2"><img src="<?php echo $sIconTitle; ?>" style="border-width: 0px" align="top"></td>';
<?php
}
?>
        displayDivHtml +=   '<TD class="scFormErrorTitle scFormToastTitle" align="left">';
        displayDivHtml +=    '<table style="border-collapse: collapse; border-width: 0px; width: 100%">';
        displayDivHtml +=     '<tr>';
        displayDivHtml +=      '<td class="scFormErrorTitleFont" style="padding: 0px; width: 100%">';
<?php
if ('' != $sErrorIcon) {
?>
        displayDivHtml +=       "<?php echo str_replace('"', '\"', $sErrorIcon); ?>";
<?php
}
?>
        displayDivHtml +=       "<?php echo $this->Ini->Nm_lang['lang_errm_errt']; ?>";
        displayDivHtml +=      '</td>';
        displayDivHtml +=      "<?php echo str_replace(array('"', "\r\n"), array('\"', ''), $sCloseIcon); ?>";
        displayDivHtml +=     '</tr>';
        displayDivHtml +=    '</table>';
        displayDivHtml +=   '</TD>';
        displayDivHtml +=  '</TR>';
        displayDivHtml +=  '<TR>';
        displayDivHtml +=   '<TD class="scFormErrorMessage scFormToastMessage" align="center"><span id="id_error_message_fixed">' + errorMessage + ' </span></TD>';
        displayDivHtml +=  '</TR>';
        displayDivHtml += '</TABLE>';

        divObj.html(displayDivHtml).show();
    }
}
if (typeof scDisplayUserDebug === "undefined") {
    function scDisplayUserDebug(debugMessage) {
        var divObj, displayDiv = "", displayDivHtml = "";

        displayDiv = '<div id="id_error_display_fixed">';
        displayDiv += '</div>';

        divObj = $("#id_error_display_fixed");
        if (divObj.length) {
            divObj.html("");
        } else {
            $("body").append(displayDiv);
            divObj = $("#id_error_display_fixed");
        }

        displayDivHtml  = '<TABLE class="scFormErrorTable scFormToastTable" align="center">';
        displayDivHtml +=  '<TR>';
<?php
if ('' != $sIconTitle) {
?>
        displayDivHtml +=   '<td style="padding: 0px" rowspan="2"><img src="<?php echo $sIconTitle; ?>" style="border-width: 0px" align="top"></td>';
<?php
}
?>
        displayDivHtml +=   '<TD class="scFormErrorTitle scFormToastTitle" align="left">';
        displayDivHtml +=    '<table style="border-collapse: collapse; border-width: 0px; width: 100%">';
        displayDivHtml +=     '<tr>';
        displayDivHtml +=      '<td class="scFormErrorTitleFont" style="padding: 0px; width: 100%">';
<?php
if ('' != $sErrorIcon) {
?>
        displayDivHtml +=       "<?php echo str_replace('"', '\"', $sErrorIcon); ?>";
<?php
}
?>
        displayDivHtml +=       "<?php echo $this->Ini->Nm_lang['lang_errm_errt']; ?>";
        displayDivHtml +=      '</td>';
        displayDivHtml +=      "<?php echo str_replace(array('"', "\r\n"), array('\"', ''), $sCloseIcon); ?>";
        displayDivHtml +=     '</tr>';
        displayDivHtml +=    '</table>';
        displayDivHtml +=   '</TD>';
        displayDivHtml +=  '</TR>';
        displayDivHtml +=  '<TR>';
        displayDivHtml +=   '<TD class="scFormErrorMessage scFormToastMessage" align="center"><span id="id_error_message_fixed">' + debugMessage + ' </span></TD>';
        displayDivHtml +=  '</TR>';
        displayDivHtml += '</TABLE>';

        divObj.html(displayDivHtml).show();
    }
}
if (typeof scDisplayUserMessage === "undefined") {
    function scDisplayUserMessage(userMessage) {
        var divObj, displayDiv = "", displayDivHtml = "";

        displayDiv = '<div id="id_error_display_fixed">';
        displayDiv += '</div>';

        divObj = $("#id_error_display_fixed");
        if (divObj.length) {
            divObj.html("");
        } else {
            $("body").append(displayDiv);
            divObj = $("#id_error_display_fixed");
        }

        displayDivHtml  = '<TABLE class="scFormErrorTable scFormToastTable" align="center">';
        displayDivHtml +=  '<TR>';
<?php
if ('' != $sIconTitle) {
?>
        displayDivHtml +=   '<td style="padding: 0px" rowspan="2"><img src="<?php echo $sIconTitle; ?>" style="border-width: 0px" align="top"></td>';
<?php
}
?>
        displayDivHtml +=   '<TD class="scFormErrorTitle scFormToastTitle" align="left">';
        displayDivHtml +=    '<table style="border-collapse: collapse; border-width: 0px; width: 100%">';
        displayDivHtml +=     '<tr>';
        displayDivHtml +=      '<td class="scFormErrorTitleFont" style="padding: 0px; width: 100%">';
<?php
if ('' != $sErrorIcon) {
?>
        displayDivHtml +=       "<?php echo str_replace('"', '\"', $sErrorIcon); ?>";
<?php
}
?>
        displayDivHtml +=       "<?php echo $this->Ini->Nm_lang['lang_errm_errt']; ?>";
        displayDivHtml +=      '</td>';
        displayDivHtml +=      "<?php echo str_replace(array('"', "\r\n"), array('\"', ''), $sCloseIcon); ?>";
        displayDivHtml +=     '</tr>';
        displayDivHtml +=    '</table>';
        displayDivHtml +=   '</TD>';
        displayDivHtml +=  '</TR>';
        displayDivHtml +=  '<TR>';
        displayDivHtml +=   '<TD class="scFormErrorMessage scFormToastMessage" align="center"><span id="id_error_message_fixed">' + userMessage + ' </span></TD>';
        displayDivHtml +=  '</TR>';
        displayDivHtml += '</TABLE>';

        divObj.html(displayDivHtml).show();
    }
}
</script>


        <script type="text/javascript" src="../_lib/libraries/grp/login/libs/js/error.js"></script>
    </body>
</html> 