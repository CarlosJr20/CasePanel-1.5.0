<?php
include_once('menu_fonte_olho_dagua_azul_session.php');
@ini_set('session.cookie_httponly', 1);
@ini_set('session.use_only_cookies', 1);
@ini_set('session.cookie_secure', 0);
session_start();
if (!function_exists("sc_check_mobile"))
{
    include_once("../_lib/lib/php/nm_check_mobile.php");
}
$_SESSION['scriptcase']['device_mobile'] = sc_check_mobile();
if (!isset($_SESSION['scriptcase']['display_mobile']))
{
    $_SESSION['scriptcase']['display_mobile'] = true;
}
if ($_SESSION['scriptcase']['device_mobile'])
{
    if ($_SESSION['scriptcase']['display_mobile'] && isset($_POST['_sc_force_mobile']) && 'out' == $_POST['_sc_force_mobile'])
    {
        $_SESSION['scriptcase']['display_mobile'] = false;
    }
    elseif (!$_SESSION['scriptcase']['display_mobile'] && isset($_POST['_sc_force_mobile']) && 'in' == $_POST['_sc_force_mobile'])
    {
        $_SESSION['scriptcase']['display_mobile'] = true;
    }
}
    $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_path_prod']      = "";
    $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_perfil']         = "host_oficial";
    $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_path_imag_temp'] = "";
    $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo']      = "";
    //check publication with the prod
    $str_path_apl_url  = $_SERVER['PHP_SELF'];
    $str_path_apl_url  = str_replace("\\", '/', $str_path_apl_url);
    $str_path_apl_url  = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
    $str_path_apl_url  = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
    //check prod
    if(empty($_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_path_prod']))
    {
            /*check prod*/$_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
    }
    //check tmp
    if(empty($_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_path_imag_temp']))
    {
            /*check tmp*/$_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
    }
    //end check publication with the prod

ob_start();

class menu_fonte_olho_dagua_azul_class
{
  var $Db;

 function sc_Include($path, $tp, $name)
 {
     if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
     {
         include_once($path);
     }
 } // sc_Include

 function menu_fonte_olho_dagua_azul_menu()
 {
    global $menu_fonte_olho_dagua_azul_menuData, $nm_data_fixa;
     if (isset($_POST["nmgp_idioma"]))  
     { 
         $Temp_lang = explode(";" , $_POST["nmgp_idioma"]);  
         if (isset($Temp_lang[0]) && !empty($Temp_lang[0]))  
          { 
             $_SESSION['scriptcase']['str_lang'] = $Temp_lang[0];
         } 
         if (isset($Temp_lang[1]) && !empty($Temp_lang[1])) 
         { 
             $_SESSION['scriptcase']['str_conf_reg'] = $Temp_lang[1];
         } 
     } 
   
     if (isset($_POST["nmgp_schema"]))  
     { 
         $_SESSION['scriptcase']['str_schema_all'] = $_POST["nmgp_schema"] . "/" . $_POST["nmgp_schema"];
     } 
   
           $nm_versao_sc  = "" ; 
           $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['contr_erro'] = 'off';
           $Campos_Mens_erro = "";
           $sc_site_ssl   = (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? true : false;
           $NM_dir_atual = getcwd();
           if (empty($NM_dir_atual))
           {
               $str_path_sys          = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
               $str_path_sys          = str_replace("\\", '/', $str_path_sys);
           }
           else
           {
               $sc_nm_arquivo         = explode("/", $_SERVER['PHP_SELF']);
               $str_path_sys          = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
           }
      //check publication with the prod
      $str_path_apl_url = $_SERVER['PHP_SELF'];
      $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
      $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
      $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
      //check prod
      if(empty($_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_path_prod']))
      {
              /*check prod*/$_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
      }
$this->sc_charset['UTF-8'] = 'utf-8';
$this->sc_charset['ISO-2022-JP'] = 'iso-2022-jp';
$this->sc_charset['ISO-2022-KR'] = 'iso-2022-kr';
$this->sc_charset['ISO-8859-1'] = 'iso-8859-1';
$this->sc_charset['ISO-8859-2'] = 'iso-8859-2';
$this->sc_charset['ISO-8859-3'] = 'iso-8859-3';
$this->sc_charset['ISO-8859-4'] = 'iso-8859-4';
$this->sc_charset['ISO-8859-5'] = 'iso-8859-5';
$this->sc_charset['ISO-8859-6'] = 'iso-8859-6';
$this->sc_charset['ISO-8859-7'] = 'iso-8859-7';
$this->sc_charset['ISO-8859-8'] = 'iso-8859-8';
$this->sc_charset['ISO-8859-8-I'] = 'iso-8859-8-i';
$this->sc_charset['ISO-8859-9'] = 'iso-8859-9';
$this->sc_charset['ISO-8859-10'] = 'iso-8859-10';
$this->sc_charset['ISO-8859-13'] = 'iso-8859-13';
$this->sc_charset['ISO-8859-14'] = 'iso-8859-14';
$this->sc_charset['ISO-8859-15'] = 'iso-8859-15';
$this->sc_charset['WINDOWS-1250'] = 'windows-1250';
$this->sc_charset['WINDOWS-1251'] = 'windows-1251';
$this->sc_charset['WINDOWS-1252'] = 'windows-1252';
$this->sc_charset['TIS-620'] = 'tis-620';
$this->sc_charset['WINDOWS-1253'] = 'windows-1253';
$this->sc_charset['WINDOWS-1254'] = 'windows-1254';
$this->sc_charset['WINDOWS-1255'] = 'windows-1255';
$this->sc_charset['WINDOWS-1256'] = 'windows-1256';
$this->sc_charset['WINDOWS-1257'] = 'windows-1257';
$this->sc_charset['KOI8-R'] = 'koi8-r';
$this->sc_charset['BIG-5'] = 'big5';
$this->sc_charset['EUC-CN'] = 'EUC-CN';
$this->sc_charset['GB18030'] = 'GB18030';
$this->sc_charset['GB2312'] = 'gb2312';
$this->sc_charset['EUC-JP'] = 'euc-jp';
$this->sc_charset['SJIS'] = 'shift-jis';
$this->sc_charset['EUC-KR'] = 'euc-kr';
$_SESSION['scriptcase']['charset_entities']['UTF-8'] = 'UTF-8';
$_SESSION['scriptcase']['charset_entities']['ISO-8859-1'] = 'ISO-8859-1';
$_SESSION['scriptcase']['charset_entities']['ISO-8859-5'] = 'ISO-8859-5';
$_SESSION['scriptcase']['charset_entities']['ISO-8859-15'] = 'ISO-8859-15';
$_SESSION['scriptcase']['charset_entities']['WINDOWS-1251'] = 'cp1251';
$_SESSION['scriptcase']['charset_entities']['WINDOWS-1252'] = 'cp1252';
$_SESSION['scriptcase']['charset_entities']['BIG-5'] = 'BIG5';
$_SESSION['scriptcase']['charset_entities']['EUC-CN'] = 'GB2312';
$_SESSION['scriptcase']['charset_entities']['GB2312'] = 'GB2312';
$_SESSION['scriptcase']['charset_entities']['SJIS'] = 'Shift_JIS';
$_SESSION['scriptcase']['charset_entities']['EUC-JP'] = 'EUC-JP';
$_SESSION['scriptcase']['charset_entities']['KOI8-R'] = 'KOI8-R';
$str_path_web   = $_SERVER['PHP_SELF'];
$str_path_web   = str_replace("\\", '/', $str_path_web);
$str_path_web   = str_replace('//', '/', $str_path_web);
$str_root       = substr($str_path_sys, 0, -1 * strlen($str_path_web));
$path_link      = substr($str_path_web, 0, strrpos($str_path_web, '/'));
$path_link      = substr($path_link, 0, strrpos($path_link, '/')) . '/';
$path_btn       = $str_root . $path_link . "_lib/buttons/";
$path_imag_cab  = $path_link . "_lib/img";
$this->force_mobile = false;
$this->path_botoes    = '../_lib/img';
$this->path_imag_apl  = $str_root . $path_link . "_lib/img";
$path_help      = $path_link . "_lib/webhelp/";
$path_libs      = $str_root . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_path_prod'] . "/lib/php";
$path_third     = $str_root . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_path_prod'] . "/third";
$path_adodb     = $str_root . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_path_prod'] . "/third/adodb";
$path_apls      = $str_root . substr($path_link, 0, strrpos($path_link, '/'));
$path_img_old   = $str_root . $path_link . "menu_fonte_olho_dagua_azul/img";
$this->path_css = $str_root . $path_link . "_lib/css/";
$_SESSION['scriptcase']['dir_temp'] = $str_root . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_path_imag_temp'];
$this->url_css = "../_lib/css/";
$path_lib_php   = $str_root . $path_link . "_lib/lib/php";
$menu_mobile_hide          = 'N';
$menu_mobile_inicial_state = 'escondido';
$menu_mobile_hide_onclick  = 'S';
$menutree_mobile_float     = 'N';
$menu_mobile_hide_icon     = 'N';
$menu_mobile_hide_icon_menu_position     = 'below';
$mobile_menu_mobile_hide          = 'N';
$mobile_menu_mobile_inicial_state = 'escondido';
$mobile_menu_mobile_hide_onclick  = 'S';
$mobile_menutree_mobile_float     = 'S';
$mobile_menu_mobile_hide_icon     = 'N';
$mobile_menu_mobile_hide_icon_menu_position     = 'right';

$this->sc_Include($path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
 if(function_exists('set_php_timezone')) set_php_timezone('menu_fonte_olho_dagua_azul');
if (isset($_SESSION['scriptcase']['user_logout']))
{
    foreach ($_SESSION['scriptcase']['user_logout'] as $ind => $parms)
    {
        if (isset($_SESSION[$parms['V']]) && $_SESSION[$parms['V']] == $parms['U'])
        {
            unset($_SESSION['scriptcase']['user_logout'][$ind]);
            $nm_apl_dest = $parms['R'];
            $dir = explode("/", $nm_apl_dest);
            if (count($dir) == 1)
            {
                $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
                $nm_apl_dest = $path_link . SC_dir_app_name($nm_apl_dest) . "/";
            }
?>
            <html>
            <body>
            <form name="FRedirect" method="POST" action="<?php echo $nm_apl_dest; ?>" target="<?php echo $parms['T']; ?>">
            </form>
            <script>
             document.FRedirect.submit();
            </script>
            </body>
            </html>
<?php
            exit;
        }
    }
}
if (!defined("SC_ERROR_HANDLER"))
{
    define("SC_ERROR_HANDLER", 1);
    include_once(dirname(__FILE__) . "/menu_fonte_olho_dagua_azul_erro.php");
}
include_once(dirname(__FILE__) . "/menu_fonte_olho_dagua_azul_erro.class.php"); 
$this->Erro = new menu_fonte_olho_dagua_azul_erro();
$str_path = substr($_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_path_prod'], 0, strrpos($_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_path_prod'], '/') + 1);
if (!is_file($str_root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
{
    unset($_SESSION['scriptcase']['nm_sc_retorno']);
    unset($_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_conexao']);
}

/* Defini????o dos Caminhos */
$menu_fonte_olho_dagua_azul_menuData         = array();
$menu_fonte_olho_dagua_azul_menuData['path'] = array();
$menu_fonte_olho_dagua_azul_menuData['url']  = array();
$NM_dir_atual = getcwd();
if (empty($NM_dir_atual))
{
    $menu_fonte_olho_dagua_azul_menuData['path']['sys'] = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
    $menu_fonte_olho_dagua_azul_menuData['path']['sys'] = str_replace("\\", '/', $str_path_sys);
    $menu_fonte_olho_dagua_azul_menuData['path']['sys'] = str_replace('//', '/', $str_path_sys);
}
else
{
    $sc_nm_arquivo                                   = explode("/", $_SERVER['PHP_SELF']);
    $menu_fonte_olho_dagua_azul_menuData['path']['sys'] = str_replace("\\", "/", str_replace("\\\\", "\\", getcwd())) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
}
$menu_fonte_olho_dagua_azul_menuData['url']['web']   = $_SERVER['PHP_SELF'];
$menu_fonte_olho_dagua_azul_menuData['url']['web']   = str_replace("\\", '/', $menu_fonte_olho_dagua_azul_menuData['url']['web']);
$menu_fonte_olho_dagua_azul_menuData['path']['root'] = substr($menu_fonte_olho_dagua_azul_menuData['path']['sys'],  0, -1 * strlen($menu_fonte_olho_dagua_azul_menuData['url']['web']));
$menu_fonte_olho_dagua_azul_menuData['path']['app']  = substr($menu_fonte_olho_dagua_azul_menuData['path']['sys'],  0, strrpos($menu_fonte_olho_dagua_azul_menuData['path']['sys'],  '/'));
$menu_fonte_olho_dagua_azul_menuData['path']['link'] = substr($menu_fonte_olho_dagua_azul_menuData['path']['app'],  0, strrpos($menu_fonte_olho_dagua_azul_menuData['path']['app'],  '/'));
$menu_fonte_olho_dagua_azul_menuData['path']['link'] = substr($menu_fonte_olho_dagua_azul_menuData['path']['link'], 0, strrpos($menu_fonte_olho_dagua_azul_menuData['path']['link'], '/')) . '/';
$menu_fonte_olho_dagua_azul_menuData['path']['app'] .= '/';
$menu_fonte_olho_dagua_azul_menuData['url']['app']   = substr($menu_fonte_olho_dagua_azul_menuData['url']['web'],  0, strrpos($menu_fonte_olho_dagua_azul_menuData['url']['web'],  '/'));
$menu_fonte_olho_dagua_azul_menuData['url']['link']  = substr($menu_fonte_olho_dagua_azul_menuData['url']['app'],  0, strrpos($menu_fonte_olho_dagua_azul_menuData['url']['app'],  '/'));
if ($_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] == "S")
{
    $menu_fonte_olho_dagua_azul_menuData['url']['link']  = substr($menu_fonte_olho_dagua_azul_menuData['url']['link'], 0, strrpos($menu_fonte_olho_dagua_azul_menuData['url']['link'], '/'));
}
$menu_fonte_olho_dagua_azul_menuData['url']['link']  .= '/';
$menu_fonte_olho_dagua_azul_menuData['url']['app']   .= '/';


$_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['sc_apl_link'] = $menu_fonte_olho_dagua_azul_menuData['url']['link'];

$nm_img_fun_menu = ""; 
if (!isset($_SESSION['scriptcase']['str_lang']) || empty($_SESSION['scriptcase']['str_lang']))
{
    $_SESSION['scriptcase']['str_lang'] = "pt_br";
}
if (!isset($_SESSION['scriptcase']['str_conf_reg']) || empty($_SESSION['scriptcase']['str_conf_reg']))
{
    $_SESSION['scriptcase']['str_conf_reg'] = "pt_br";
}
$this->str_lang        = $_SESSION['scriptcase']['str_lang'];
$this->str_conf_reg    = $_SESSION['scriptcase']['str_conf_reg'];
if (isset($_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['session_timeout']['lang'])) {
    $this->str_lang = $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['session_timeout']['lang'];
}
elseif (!isset($_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['actual_lang']) || $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['actual_lang'] != $this->str_lang) {
    $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['actual_lang'] = $this->str_lang;
    setcookie('sc_actual_lang_Web_Case_IoT_V_1_12',$this->str_lang,'0','/');
}
if (!function_exists("NM_is_utf8"))
{
   include_once("../_lib/lib/php/nm_utf8.php");
}
if (!function_exists("SC_dir_app_ini"))
{
    include_once("../_lib/lib/php/nm_ctrl_app_name.php");
}
SC_dir_app_ini('Web_Case_IoT_V_1_12');
if ($_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] == "S")
{
    $path_apls     = substr($path_apls, 0, strrpos($path_apls, '/'));
}
$path_apls     .= "/";
$this->str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Dark_nit/Dark_nit";
include("../_lib/lang/". $this->str_lang .".lang.php");
include("../_lib/css/" . $this->str_schema_all . "_menutab.php");
include("../_lib/css/" . $this->str_schema_all . "_menuH.php");
if(isset($pagina_schemamenu) && !empty($pagina_schemamenu) && is_file("../_lib/menuicons/". $pagina_schemamenu .".php"))
{
    include("../_lib/menuicons/". $pagina_schemamenu .".php");
}
$this->img_sep_toolbar = trim($str_toolbar_separator);
include("../_lib/lang/config_region.php");
include("../_lib/lang/lang_config_region.php");
$this->regionalDefault();
$str_button = (isset($_SESSION['scriptcase']['str_button_all'])) ? $_SESSION['scriptcase']['str_button_all'] : "scriptcase9_Midnight";
$_SESSION['scriptcase']['str_button_all'] = $str_button;
$Str_btn_menu = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
$Str_btn_css  = trim($str_button) . "/" . trim($str_button) . ".css";
$this->css_menutab_active_close_icon    = trim($css_menutab_active_close_icon);
$this->css_menutab_inactive_close_icon  = trim($css_menutab_inactive_close_icon);
$this->breadcrumbline_separator  = trim($breadcrumbline_separator);
include($path_btn . $Str_btn_menu);
if (!function_exists("nmButtonOutput"))
{
   include_once("../_lib/lib/php/nm_gp_config_btn.php");
}
asort($this->Nm_lang_conf_region);
$this->sc_Include($path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
$this->sc_Include($path_lib_php . "/nm_functions.php", "", "") ; 
$this->sc_Include($path_lib_php . "/nm_api.php", "", "") ; 
$this->nm_data = new nm_data("pt_br");
include_once("menu_fonte_olho_dagua_azul_toolbar.php");

$this->tab_grupo[0] = "Web_Case_IoT_V_1_12/";
if ($_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] != "S")
{
    $this->tab_grupo[0] = "";
}

     $_SESSION['scriptcase']['menu_atual'] = "menu_fonte_olho_dagua_azul";
     $_SESSION['scriptcase']['menu_apls']['menu_fonte_olho_dagua_azul'] = array();
     if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
     {
         foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
         {
             if (isset($_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_conexao']) && $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_conexao'] == $NM_con_orig)
             {
/*NM*/           $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_conexao'] = $NM_con_dest;
             }
             if (isset($_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_perfil']) && $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_perfil'] == $NM_con_orig)
             {
/*NM*/           $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_perfil'] = $NM_con_dest;
             }
             if (isset($_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_con_' . $NM_con_orig]))
             {
                 $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_con_' . $NM_con_orig] = $NM_con_dest;
             }
         }
     }
$_SESSION['scriptcase']['charset'] = "UTF-8";
ini_set('default_charset', $_SESSION['scriptcase']['charset']);
$_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
foreach ($this->Nm_conf_reg[$this->str_conf_reg] as $ind => $dados)
{
    if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
    {
        $this->Nm_conf_reg[$this->str_conf_reg][$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
    }
}
foreach ($this->Nm_lang as $ind => $dados)
{
    if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($ind))
    {
        $ind = sc_convert_encoding($ind, $_SESSION['scriptcase']['charset'], "UTF-8");
        $this->Nm_lang[$ind] = $dados;
    }
    if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
    {
        $this->Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
    }
}
if (isset($this->Nm_lang['lang_errm_dbcn_conn']))
{
    $_SESSION['scriptcase']['db_conn_error'] = $this->Nm_lang['lang_errm_dbcn_conn'];
}
if (isset($_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['session_timeout']['redir'])) {
    $SS_cod_html  = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
';
    $SS_cod_html .= "<HTML>\r\n";
    $SS_cod_html .= " <HEAD>\r\n";
    $SS_cod_html .= "  <TITLE></TITLE>\r\n";
    $SS_cod_html .= "   <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\"/>\r\n";
    if ($_SESSION['scriptcase']['proc_mobile']) {
        $SS_cod_html .= "   <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\"/>\r\n";
    }
    $SS_cod_html .= "   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n";
    $SS_cod_html .= "    <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n";
    if ($_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['session_timeout']['redir_tp'] == "R") {
        $SS_cod_html .= "  </HEAD>\r\n";
        $SS_cod_html .= "   <body>\r\n";
    }
    else {
        $SS_cod_html .= "    <link rel=\"shortcut icon\" href=\"../_lib/img/usr__NM__ico__NM__1132icone - Logo_Prancheta 1.ico\">\r\n";
        $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_menuH.css\"/>\r\n";
        $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_menuH" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\"/>\r\n";
        $SS_cod_html .= "  </HEAD>\r\n";
        $SS_cod_html .= "   <body class=\"scMenuHPage\">\r\n";
        $SS_cod_html .= "    <table align=\"center\"><tr><td style=\"padding: 0\"><div>\r\n";
        $SS_cod_html .= "    <table class=\"scMenuHTable\" width='100%' cellspacing=0 cellpadding=0><tr class=\"scMenuHHeader\"><td class=\"scMenuHHeaderFont\" style=\"padding: 15px 30px; text-align: center\">\r\n";
        $SS_cod_html .= $this->Nm_lang['lang_errm_expired_session'] . "\r\n";
        $SS_cod_html .= "     <form name=\"Fsession_redir\" method=\"post\"\r\n";
        $SS_cod_html .= "           target=\"_self\">\r\n";
        $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['session_timeout']['redir'] . "');\">\r\n";
        $SS_cod_html .= "     </form>\r\n";
        $SS_cod_html .= "    </td></tr></table>\r\n";
        $SS_cod_html .= "    </div></td></tr></table>\r\n";
    }
    $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
    if ($_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['session_timeout']['redir_tp'] == "R") {
        $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['session_timeout']['redir'] . "');\r\n";
    }
    $SS_cod_html .= "      function sc_session_redir(url_redir)\r\n";
    $SS_cod_html .= "      {\r\n";
    $SS_cod_html .= "         if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')\r\n";
    $SS_cod_html .= "         {\r\n";
    $SS_cod_html .= "            window.parent.sc_session_redir(url_redir);\r\n";
    $SS_cod_html .= "         }\r\n";
    $SS_cod_html .= "         else\r\n";
    $SS_cod_html .= "         {\r\n";
    $SS_cod_html .= "             if (window.opener && typeof window.opener.sc_session_redir === 'function')\r\n";
    $SS_cod_html .= "             {\r\n";
    $SS_cod_html .= "                 window.close();\r\n";
    $SS_cod_html .= "                 window.opener.sc_session_redir(url_redir);\r\n";
    $SS_cod_html .= "             }\r\n";
    $SS_cod_html .= "             else\r\n";
    $SS_cod_html .= "             {\r\n";
    $SS_cod_html .= "                 window.location = url_redir;\r\n";
    $SS_cod_html .= "             }\r\n";
    $SS_cod_html .= "         }\r\n";
    $SS_cod_html .= "      }\r\n";
    $SS_cod_html .= "    </script>\r\n";
    $SS_cod_html .= " </body>\r\n";
    $SS_cod_html .= "</HTML>\r\n";
    unset($_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['session_timeout']);
    unset($_SESSION['sc_session']);
}
if (isset($SS_cod_html))
{
    echo $SS_cod_html;
    exit;
}
$_SESSION['scriptcase']['erro']['str_schema'] = $this->str_schema_all . "_error.css";
$_SESSION['scriptcase']['erro']['str_schema_dir'] = $this->str_schema_all . "_error" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
$_SESSION['scriptcase']['erro']['str_lang']   = $this->str_lang;
if (is_dir($path_img_old))
{
    $Res_dir_img = @opendir($path_img_old);
    if ($Res_dir_img)
    {
        while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
        {
           $Str_arquivo = "/" . $Str_arquivo;
           if (@is_file($path_img_old . $Str_arquivo) && '.' != $Str_arquivo && '..' != $path_img_old . $Str_arquivo)
           {
               @unlink($path_img_old . $Str_arquivo);
           }
        }
    }
    @closedir($Res_dir_img);
    rmdir($path_img_old);
}
//
if (isset($_GET) && !empty($_GET))
{
    foreach ($_GET as $nmgp_var => $nmgp_val)
    {
        if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
        {
            $nmgp_var = substr($nmgp_var, 11);
            $nmgp_val = $_SESSION[$nmgp_val];
        }
        if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
        {
            $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
            $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
        }
         $$nmgp_var = $nmgp_val;
    }
}
if (isset($_POST) && !empty($_POST))
{
    foreach ($_POST as $nmgp_var => $nmgp_val)
    {
        if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
        {
            $nmgp_var = substr($nmgp_var, 11);
            $nmgp_val = $_SESSION[$nmgp_val];
        }
        if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
        {
            $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
            $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
        }
         $$nmgp_var = $nmgp_val;
    }
}
if (isset($script_case_init))
{
    $_SESSION['sc_session'][1]['menu_fonte_olho_dagua_azul']['init'] = $script_case_init;
}
else
if (!isset($_SESSION['sc_session'][1]['menu_fonte_olho_dagua_azul']['init']))
{
    $_SESSION['sc_session'][1]['menu_fonte_olho_dagua_azul']['init'] = "";
}
$script_case_init = $_SESSION['sc_session'][1]['menu_fonte_olho_dagua_azul']['init'];
if (isset($nmgp_parms) && !empty($nmgp_parms)) 
{ 
    $nmgp_parms = NM_decode_input($nmgp_parms);
    $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
    $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
    $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
    $todo  = explode("?@?", $todox);
    $ix = 0;
    while (!empty($todo[$ix]))
    {
       $cadapar = explode("?#?", $todo[$ix]);
       if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
       {
           $cadapar[0] = substr($cadapar[0], 11);
           $cadapar[1] = $_SESSION[$cadapar[1]];
       }
        if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
       $Tmp_par   = $cadapar[0];;
       $$Tmp_par = $cadapar[1];
       $_SESSION[$cadapar[0]] = $cadapar[1];
       $ix++;
     }
} 
if (isset($_SESSION['sc_session']['SC_parm_violation']) && !isset($_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['session_timeout']['redir']))
{
    unset($_SESSION['sc_session']['SC_parm_violation']);
    echo "<html>";
    echo "<body>";
    echo "<table align=\"center\" width=\"50%\" border=1 height=\"50px\">";
    echo "<tr>";
    echo "   <td align=\"center\">";
    echo "       <b><font size=4>" . $this->Nm_lang['lang_errm_ajax_data'] . "</font>";
    echo "   </b></td>";
    echo " </tr>";
    echo "</table>";
    echo "</body>";
    echo "</html>";
    exit;
}
$nm_url_saida = "";
if (isset($nmgp_url_saida))
{
    $nm_url_saida = $nmgp_url_saida;
    if (isset($script_case_init))
    {
        $nm_url_saida .= "?script_case_init=" . NM_encode_input($script_case_init);
    }
}
if (isset($_POST["nmgp_idioma"]) || isset($_POST["nmgp_schema"]))  
{ 
    $nm_url_saida = $_SESSION['scriptcase']['sc_saida_menu_fonte_olho_dagua_azul'];
}
elseif (!empty($nm_url_saida))
{
    $_SESSION['scriptcase']['sc_url_saida'][$script_case_init]  = $nm_url_saida;
    $_SESSION['scriptcase']['sc_saida_menu_fonte_olho_dagua_azul'] = $nm_url_saida;
}
else
{
    $_SESSION['scriptcase']['sc_saida_menu_fonte_olho_dagua_azul'] = (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : "javascript:window.close()";
}
$this->str_schema_all = $STR_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Dark_nit/Dark_nit";
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['menu_fonte_olho_dagua_azul'] = "on";
} 
if (!isset($_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['session_timeout']['redir']) && (!isset($_SESSION['scriptcase']['sc_apl_seg']['menu_fonte_olho_dagua_azul']) || $_SESSION['scriptcase']['sc_apl_seg']['menu_fonte_olho_dagua_azul'] != "on"))
{ 
    $NM_Mens_Erro = $this->Nm_lang['lang_errm_unth_user'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

    <HTML>
     <HEAD>
      <TITLE></TITLE>
     <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
      <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>      <META http-equiv="Pragma" content="no-cache"/>
      <link rel="shortcut icon" href="../_lib/img/usr__NM__ico__NM__1132icone - Logo_Prancheta 1.ico">
      <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $str_schema_all ?>_menuH.css" /> 
      <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $str_schema_all ?>_menuH<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
      <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_grid.css" /> 
      <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
     </HEAD>
     <body>
       <table align="center" class="scGridBorder"><tr><td style="padding: 0">
       <table style="width: 100%" class="scGridTabela"><tr class="scGridFieldOdd"><td class="scGridFieldOddFont" style="padding: 15px 30px; text-align: center">
        <?php echo $NM_Mens_Erro; ?>
        <br />
        <form name="Fseg" method="post" target="_self">
         <input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($script_case_init) ?>"/> 
         <input type="button" name="sc_sai_seg" value="OK" onclick="nm_saida()"> 
        </form> 
       </td></tr></table>
       </td></tr></table>
<?php
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']))
              {
?>
<br /><br /><br />
<table align="center" class="scGridBorder" style="width: 450px"><tr><td style="padding: 0">
 <table style="width: 100%" class="scGridTabela">
  <tr class="scGridFieldOdd">
   <td class="scGridFieldOddFont" style="padding: 15px 30px">
    <?php echo $this->Nm_lang['lang_errm_unth_hwto']; ?>
   </td>
  </tr>
 </table>
</td></tr></table>
<?php
              }
?>
     </body>
     <?php
     if ((isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true') || (isset($_SESSION['scriptcase']['sc_outra_jan']) && ($_SESSION['scriptcase']['sc_outra_jan'] == 'menutree' || $_SESSION['scriptcase']['sc_outra_jan'] == 'menu')))
     {
       $saida_final = 'window.close();';
     }
     else
     {
       $saida_final = 'history.back();';
     }
     ?>
    <script type="text/javascript">
      function nm_saida()
      {
<?php 
             echo $saida_final;
?> 
      }
     </script> 
<?php
    exit;
} 
$this->sc_Include($path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
include_once($path_adodb . "/adodb.inc.php"); 
$this->sc_Include($path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
 if(function_exists('set_php_timezone')) set_php_timezone('menu_fonte_olho_dagua_azul'); 
perfil_lib($path_libs);
if (!isset($_SESSION['sc_session'][1]['SC_Check_Perfil']))
{
    if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($path_libs, $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_path_prod']);
    $_SESSION['sc_session'][1]['SC_Check_Perfil'] = true;
}
$nm_falta_var    = ""; 
$nm_falta_var_db = ""; 
if (isset($_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_conexao']))
{
    db_conect_devel($_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_conexao'], $str_root . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_path_prod'], 'Web_Case_IoT_V_1_12', 2); 
}
if (isset($_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_perfil']))
{
   $_SESSION['scriptcase']['glo_perfil'] = $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_perfil'];
}
if (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
{
    $_SESSION['scriptcase']['glo_senha_protect'] = "";
    carrega_perfil($_SESSION['scriptcase']['glo_perfil'], $path_libs, "S");
    if (empty($_SESSION['scriptcase']['glo_senha_protect']))
    {
        $nm_falta_var .= "Perfil=" . $_SESSION['scriptcase']['glo_perfil'] . "; ";
    }
}
if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
{
    $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
    if (strlen($SC_temp) == 2)
    {
       $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['SC_sep_date']  = substr($SC_temp, 0, 1); 
       $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
   }
   else
    {
       $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['SC_sep_date']  = $SC_temp; 
       $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['SC_sep_date1'] = $SC_temp; 
   }
}
if (!isset($_SESSION['scriptcase']['glo_tpbanco']))
{
    $nm_falta_var_db .= "glo_tpbanco; ";
}
else
{
    $nm_tpbanco = $_SESSION['scriptcase']['glo_tpbanco']; 
}
if (!isset($_SESSION['scriptcase']['glo_servidor']))
{
    $nm_falta_var_db .= "glo_servidor; ";
}
else
{
    $nm_servidor = $_SESSION['scriptcase']['glo_servidor']; 
}
if (!isset($_SESSION['scriptcase']['glo_banco']))
{
    $nm_falta_var_db .= "glo_banco; ";
}
else
{
    $nm_banco = $_SESSION['scriptcase']['glo_banco']; 
}
if (!isset($_SESSION['scriptcase']['glo_usuario']))
{
    $nm_falta_var_db .= "glo_usuario; ";
}
else
{
    $nm_usuario = $_SESSION['scriptcase']['glo_usuario']; 
}
if (!isset($_SESSION['scriptcase']['glo_senha']))
{
    $nm_falta_var_db .= "glo_senha; ";
}
else
{
    $nm_senha = $_SESSION['scriptcase']['glo_senha']; 
}
$nm_con_db2 = array();
$nm_database_encoding = "";
if (isset($_SESSION['scriptcase']['glo_database_encoding']))
{
    $nm_database_encoding = $_SESSION['scriptcase']['glo_database_encoding']; 
}
$nm_arr_db_extra_args = array();
if (isset($_SESSION['scriptcase']['glo_use_ssl']))
{
    $nm_arr_db_extra_args['use_ssl'] = $_SESSION['scriptcase']['glo_use_ssl']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_key']))
{
    $nm_arr_db_extra_args['mysql_ssl_key'] = $_SESSION['scriptcase']['glo_mysql_ssl_key']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_cert']))
{
    $nm_arr_db_extra_args['mysql_ssl_cert'] = $_SESSION['scriptcase']['glo_mysql_ssl_cert']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_capath']))
{
    $nm_arr_db_extra_args['mysql_ssl_capath'] = $_SESSION['scriptcase']['glo_mysql_ssl_capath']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_ca']))
{
    $nm_arr_db_extra_args['mysql_ssl_ca'] = $_SESSION['scriptcase']['glo_mysql_ssl_ca']; 
}
if (isset($_SESSION['scriptcase']['glo_mysql_ssl_cipher']))
{
    $nm_arr_db_extra_args['mysql_ssl_cipher'] = $_SESSION['scriptcase']['glo_mysql_ssl_cipher']; 
}
$nm_con_persistente = "";
$nm_con_use_schema  = "";
if (isset($_SESSION['scriptcase']['glo_use_persistent']))
{
    $nm_con_persistente = $_SESSION['scriptcase']['glo_use_persistent']; 
}
if (isset($_SESSION['scriptcase']['glo_use_schema']))
{
    $nm_con_use_schema = $_SESSION['scriptcase']['glo_use_schema']; 
}
if (!empty($nm_falta_var) || !empty($nm_falta_var_db))
{
    if (empty($nm_falta_var_db))
    {
        echo "<table width=\"80%\"  border=\"1\" height=\"117\">";
        echo "<tr>";
        echo "   <td class=\"css_menu_sel\">";
        echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_glob'] . "</font>";
        echo "  " . $nm_falta_var;
        echo "   </b></td>";
        echo " </tr>";
        echo "</table>";
    }
    else
    {
        echo "<table width=\"80%\"  border=\"1\" height=\"117\">";
        echo "<tr>";
        echo "   <td class=\"css_menu_sel\">";
        echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_data'] . "</font>";
        echo "   </b></td>";
        echo " </tr>";
        echo "</table>";
    }
    if (isset($_SESSION['scriptcase']['nm_ret_exec']) && '' != $_SESSION['scriptcase']['nm_ret_exec'])
    { 
        if (isset($_SESSION['sc_session'][1]['menu_fonte_olho_dagua_azul']['sc_outra_jan']) && $_SESSION['sc_session'][1]['menu_fonte_olho_dagua_azul']['sc_outra_jan'])
        {
            echo "<a href='javascript:window.close()'><img border='0' src='" . $path_imag_cab . "/scriptcase__NM__exit.gif' title='" . $this->Nm_lang['lang_btns_menu_rtrn_hint'] . "' align=absmiddle></a> \n" ; 
        } 
        else 
        { 
            echo "<a href='" . $_SESSION['scriptcase']['nm_ret_exec'] . "><img border='0' src='" . $path_imag_cab . "/scriptcase__NM__exit.gif' title='" . $this->Nm_lang['lang_btns_menu_rtrn_hint'] . "' align=absmiddle></a> \n" ; 
        } 
    } 
    exit ;
} 
if (isset($_SESSION['scriptcase']['glo_db_master_usr']) && !empty($_SESSION['scriptcase']['glo_db_master_usr']))
{
    $nm_usuario = $_SESSION['scriptcase']['glo_db_master_usr']; 
}
if (isset($_SESSION['scriptcase']['glo_db_master_pass']) && !empty($_SESSION['scriptcase']['glo_db_master_pass']))
{
    $nm_senha = $_SESSION['scriptcase']['glo_db_master_pass']; 
}
if (isset($_SESSION['scriptcase']['glo_db_master_cript']) && !empty($_SESSION['scriptcase']['glo_db_master_cript']))
{
    $_SESSION['scriptcase']['glo_senha_protect'] = $_SESSION['scriptcase']['glo_db_master_cript']; 
}
$sc_tem_trans_banco = false;
$this->nm_bases_access    = array("access", "ado_access", "ace_access");
$this->nm_bases_ibase     = array("ibase", "firebird", "pdo_firebird", "borland_ibase");
$this->nm_bases_mysql     = array("mysql", "mysqlt", "mysqli", "maxsql", "pdo_mysql", "azure_mysql", "azure_mysqlt", "azure_mysqli", "azure_maxsql", "azure_pdo_mysql", "googlecloud_mysql", "googlecloud_mysqlt", "googlecloud_mysqli", "googlecloud_maxsql", "googlecloud_pdo_mysql", "amazonrds_mysql", "amazonrds_mysqlt", "amazonrds_mysqli", "amazonrds_maxsql", "amazonrds_pdo_mysql");
$this->nm_bases_postgres  = array("postgres", "postgres64", "postgres7", "pdo_pgsql", "azure_postgres", "azure_postgres64", "azure_postgres7", "azure_pdo_pgsql", "googlecloud_postgres", "googlecloud_postgres64", "googlecloud_postgres7", "googlecloud_pdo_pgsql", "amazonrds_postgres", "amazonrds_postgres64", "amazonrds_postgres7", "amazonrds_pdo_pgsql");
$this->nm_bases_sqlite    = array("sqlite", "sqlite3", "pdosqlite");
$this->nm_bases_sybase    = array("sybase", "pdo_sybase_odbc", "pdo_sybase_dblib");
$this->nm_bases_vfp       = array("vfp");
$this->nm_bases_odbc      = array("odbc");
$this->nm_bases_progress  = array("pdo_progress_odbc", "progress");
$_SESSION['scriptcase']['sc_num_page'] = 1;
$_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1HQNwH9BiZ1N7D5B/DMrYZSJqH5XKVEX7HQBsVIJwZ1rYV5FUDEBeHEBUHEFqHMBODcXGDQX7HAvCD5F7DMvOV9FeDWXCDoJsDcBwH9B/Z1rYHQJwHgveVkJqH5FGDoBqHQBiDuBqHArYHuJwDMvOV9BUDWXKVoF7HQBiZ1BiHAzGD5BOHgNKHEJqDWX7HMBiHQFYZSBiHIBeHuFaHuNOZSrCH5FqDoXGHQJmZ1X7HIBeHQFUDMvCVkJ3DuJeDorqHQJKDuFaHAN7HuNUDMvmVIBsDWJeVEF7D9JmZ1FaHIBOD5BODEBOHErCDWF/VoBiDcJUZSX7Z1BYHuFaHuzGVcFKDWFYVoJwDcBqZSFaHAN7D5FaDEBOVkJGHEXCVoB/HQJKDQJsZ1vCV5FGHuNOV9FeDWB3VoraD9BsZ1B/HArYV5FUDEvsHEJqV5FaVoBOD9XsZSX7Z1N7VWJsHgrKVcB/V5X7VoraD9BsZ1F7HIveD5FaDMNKZSXeH5F/DoraDcBwZSFGHABYV5FUHgrYDkBODWFaVEBiD9BiZ1B/HINaV5FUDErKHEFiDuJeDoBOHQJKDQJsZ1vCV5FGHuNOV9FeDWXCDoNUD9XGZ1F7D1rKHQFaHgrKHArCV5FqDoBqHQBiZ9F7HIrwD5NUDMvmVcFKV5BmVoBqD9BsZkFGHArKHuBOHgBYVkJqH5BmZuBqHQXsDQBqHAN7HQNUDMrwV9FeV5F/HMX7HQXGZ1BODSNOHQX7HgvCHArCHEXKZuBOHQNwDQFaHIrKV5FaDMrwVcB/Dur/VoBiHQJmZ1BOHArKHuJwDMrYZSXeDuFYVoXGDcJeZ9rqD1BeHuX7DMvsVIB/H5XCHMXGHQXGZ1BOHArYHuBOHgvCHArsDuXKDoJeDcXGH9BiDSvCVWJsDMrwV9FeDWFYHIJeDcFYZkBiD1rKHQF7HgvCHArCDWX7HIrqHQJeDuBqHABYHuX7HgNKDkBODuFqDoFGDcBqVIJwD1rwHQrqHgBYVkJ3DWXCHMBqHQFYDuFaHIrwHuX7DMrwV9FeDuFqHIX7DcNmVINUHIBeHuJwHgvCHArCH5F/HMX7DcBiDQB/HIrwHQBODMrwV9FeDuFqHMJeHQXOH9BOHArKHuJsDMrYZSXeDuFYVoXGDcJeZ9rqD1BeV5BqHgvsDkB/V5X7VorqDcBqZ1FaD1rKV5XGDMNKZSJ3H5X/ZuJsHQXGZSFUHAveV5BOHuNODkBODuX7VoX7DcBqZ1B/Z1vOD5raHgBOVkXeHEFqVoX7DcBwDQFGD1BOV5JwDMBYVIBODWFYVENUHQBiZ1B/HABYV5JsDMzGHAFKV5FaZuBOHQJeDuBOZ1BYV5JeHuvmVcrsDWB3VEF7HQNmVIJwZ1BeZMBODEvsZSJGDuFaDoJeD9XsZSX7Z1rwVWJsDMrwDkFCH5FqVoBqD9XOZSB/DSrYD5BqDEvsHEFiH5FYDoraD9NwZSX7D1vOV5JwHgNKDkBODuFqDoFGDcBqVIJwD1rwD5JeDMBYZSJqV5FaVoJeD9XsZSFGD1BeVWJsHgrYDkBsH5XCHMJwHQXGH9BqDSBeHuFUHgvsZSJqDWBmVoFGHQNwH9BiD1veHQF7DMvOVcFeHEBmVoX7HQNwH9BqHArKV5FUDMrYZSXeV5FqHIJsHQBiZ9XGHANKV5BODMvOV9BUDWB3VEX7HQNmVINUHANOHQJwDEBODkFeH5FYVoFGHQJKDQB/HIrwHQBODMNOVcBOH5FqHMF7DcJUH9B/DSBeD5NUDErKHENiDuJeDoB/HQJKZ9F7D1BOV5BqHgrwVIB/DuX7HMBiD9BsVIraD1rwV5X7HgBeHErCH5FYDoraD9NwH9X7HIBeV5JwHuzGZSJ3DWXCHMFUD9BsZ1F7HAN7V5FaDErKVkJGH5F/DoB/DcJUDQJsD1veV5FUHgNKVcXKH5FqDoFGD9BsZ1rqHANOD5NUDMrYHErCV5FqVoB/D9XsDQJsZ1NaV5BiDMzGZSB/HEF/DoJsD9JmZ1B/Z1BeD5XGHgBeHEFiV5B3DoF7D9XsDuFaHANKVWBqDMrwZSNiDWB3VEB/";
 $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_conexao']))
{ 
   $this->Db = db_conect_devel($_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_conexao'], $str_root . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_path_prod'], 'Web_Case_IoT_V_1_12'); 
} 
else 
{ 
   $this->Db = db_conect($nm_tpbanco, $nm_servidor, $nm_usuario, $nm_senha, $nm_banco, $glo_senha_protect, "S", $nm_con_persistente, $nm_con_db2, $nm_database_encoding, $nm_arr_db_extra_args); 
} 
$this->nm_tpbanco = $nm_tpbanco; 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_ibase) && function_exists('ibase_timefmt'))
{
    ibase_timefmt('%Y-%m-%d %H:%M:%S');
} 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_sybase))
{
   $this->Db->fetchMode = ADODB_FETCH_BOTH;
   $this->Db->Execute("set dateformat ymd");
} 
//
      $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['contr_erro'] = 'on';
if (!isset($_SESSION['usr_login'])) {$_SESSION['usr_login'] = "";}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
  ?>
<script>
document.querySelector("title").innerHTML = "WebCase IoT"
</script>

<?php

if($this->sc_temp_usr_login != "admin")
	{
$NM_tmp_del = 'item_22';
if (!is_array($NM_tmp_del))
{
    $NM_tmp_del = explode(",", $NM_tmp_del);
}
foreach ($NM_tmp_del as $Cada_del)
{
    $_SESSION['scriptcase']['sc_menu_del']['menu_fonte_olho_dagua_azul'][] = trim($Cada_del);
}

}
if (isset($this->sc_temp_usr_login)) {$_SESSION['usr_login'] = $this->sc_temp_usr_login;}
$_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['contr_erro'] = 'off';
/* Dados do menu em sessao */
$_SESSION['nm_menu'] = array('prod' => $str_root . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_path_prod'] . '/third/COOLjsMenu/',
                              'url' => $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_path_prod'] . '/third/COOLjsMenu/');

if ((isset($nmgp_outra_jan) && $nmgp_outra_jan == "true") || (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'menu_fonte_olho_dagua_azul'))
{
    $_SESSION['sc_session'][1]['menu_fonte_olho_dagua_azul']['sc_outra_jan'] = true;
     unset($_SESSION['scriptcase']['sc_outra_jan']);
    $_SESSION['scriptcase']['sc_saida_menu_fonte_olho_dagua_azul'] = "javascript:window.close()";
}
/* Vari??veis de Configura????o do Menu */
$menu_fonte_olho_dagua_azul_menuData['iframe'] = TRUE;

if (!isset($_SESSION['scriptcase']['sc_apl_seg']))
{
    $_SESSION['scriptcase']['sc_apl_seg'] = array();
}
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("home_fonte_olho_dagua_azul_complet") . "/home_fonte_olho_dagua_azul_complet_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['home_fonte_olho_dagua_azul_complet']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['home_fonte_olho_dagua_azul_complet'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['home_fonte_olho_dagua_azul_complet'] = "on";
} 
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_grid_sec_users") . "/app_grid_sec_users_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_grid_sec_users") . "/app_grid_sec_users_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_users']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_users'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_users'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_grid_sec_apps") . "/app_grid_sec_apps_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_grid_sec_apps") . "/app_grid_sec_apps_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_apps']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_apps'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_apps'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_grid_sec_groups") . "/app_grid_sec_groups_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_grid_sec_groups") . "/app_grid_sec_groups_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_groups']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_groups'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_groups'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_grid_sec_users_groups") . "/app_grid_sec_users_groups_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_grid_sec_users_groups") . "/app_grid_sec_users_groups_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_users_groups']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_users_groups'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_users_groups'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_search_sec_groups") . "/app_search_sec_groups_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_search_sec_groups") . "/app_search_sec_groups_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_search_sec_groups']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_search_sec_groups'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_search_sec_groups'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_sync_apps") . "/app_sync_apps_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_sync_apps") . "/app_sync_apps_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_sync_apps']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_sync_apps'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_sync_apps'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_logged_users") . "/app_logged_users_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_logged_users") . "/app_logged_users_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_logged_users']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_logged_users'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_logged_users'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_change_pswd") . "/app_change_pswd_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_change_pswd") . "/app_change_pswd_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_change_pswd']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_change_pswd'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_change_pswd'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_Login") . "/app_Login_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_Login") . "/app_Login_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_Login']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_Login'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_Login'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Historico") . "/Historico_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("Historico") . "/Historico_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['Historico']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['Historico'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['Historico'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("chart_fonte_nivel") . "/chart_fonte_nivel_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("chart_fonte_nivel") . "/chart_fonte_nivel_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['chart_fonte_nivel']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['chart_fonte_nivel'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['chart_fonte_nivel'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("chart_fonte_volume") . "/chart_fonte_volume_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("chart_fonte_volume") . "/chart_fonte_volume_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['chart_fonte_volume']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['chart_fonte_volume'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['chart_fonte_volume'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_change_pswd") . "/app_change_pswd_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_change_pswd") . "/app_change_pswd_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_change_pswd']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_change_pswd'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_change_pswd'] = "on";
    } 
}
if (is_file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_Login") . "/app_Login_ini.txt"))
{
    $sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("app_Login") . "/app_Login_ini.txt");
    if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
    {
        if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_Login']))
        {
            $_SESSION['scriptcase']['sc_apl_seg']['app_Login'] = "on";
        }
    }
    if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
    { 
        $_SESSION['scriptcase']['sc_apl_seg']['app_Login'] = "on";
    } 
}
/* Itens do Menu */
$_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['contr_erro'] = 'on';
  ?><?php





$_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['contr_erro'] = 'off';
if ($this->Db)
{
    $this->Db->Close(); 
}

$sOutputBuffer = ob_get_contents();
ob_end_clean();

 $nm_var_lab[0] = "";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[0]))
{
    $nm_var_lab[0] = sc_convert_encoding($nm_var_lab[0], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[1] = "Menu";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[1]))
{
    $nm_var_lab[1] = sc_convert_encoding($nm_var_lab[1], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[2] = "Hist??rico";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[2]))
{
    $nm_var_lab[2] = sc_convert_encoding($nm_var_lab[2], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[3] = "Tabela";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[3]))
{
    $nm_var_lab[3] = sc_convert_encoding($nm_var_lab[3], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[4] = "N??vel";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[4]))
{
    $nm_var_lab[4] = sc_convert_encoding($nm_var_lab[4], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[5] = "Volume";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[5]))
{
    $nm_var_lab[5] = sc_convert_encoding($nm_var_lab[5], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[6] = "Alterar Senha";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[6]))
{
    $nm_var_lab[6] = sc_convert_encoding($nm_var_lab[6], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_lab[7] = "Sair";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_lab[7]))
{
    $nm_var_lab[7] = sc_convert_encoding($nm_var_lab[7], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[0] = "Menu";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[0]))
{
    $nm_var_hint[0] = sc_convert_encoding($nm_var_hint[0], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[1] = "Hist??rico";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[1]))
{
    $nm_var_hint[1] = sc_convert_encoding($nm_var_hint[1], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[2] = "Tabela";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[2]))
{
    $nm_var_hint[2] = sc_convert_encoding($nm_var_hint[2], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[3] = "N??vel";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[3]))
{
    $nm_var_hint[3] = sc_convert_encoding($nm_var_hint[3], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[4] = "Volume";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[4]))
{
    $nm_var_hint[4] = sc_convert_encoding($nm_var_hint[4], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[5] = "Usu??rio";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[5]))
{
    $nm_var_hint[5] = sc_convert_encoding($nm_var_hint[5], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[6] = "Alterar Senha";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[6]))
{
    $nm_var_hint[6] = sc_convert_encoding($nm_var_hint[6], $_SESSION['scriptcase']['charset'], "UTF-8");
}
 $nm_var_hint[7] = "Sair";
if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($nm_var_hint[7]))
{
    $nm_var_hint[7] = sc_convert_encoding($nm_var_hint[7], $_SESSION['scriptcase']['charset'], "UTF-8");
}
$saida_apl = $_SESSION['scriptcase']['sc_saida_menu_fonte_olho_dagua_azul'];
$menu_fonte_olho_dagua_azul_menuData['data'] .= "item_22|.|" . $nm_var_lab[0] . "||" . $this->Nm_lang['lang_menu_security'] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_users']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_users']) == "on")
{
    $menu_fonte_olho_dagua_azul_menuData['data'] .= "item_23|..|" . $this->Nm_lang['lang_list_users'] . "|menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=item_23&sc_apl_menu=app_grid_sec_users&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_users'] . "||" . $this->menu_fonte_olho_dagua_azul_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_apps']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_apps']) == "on")
{
    $menu_fonte_olho_dagua_azul_menuData['data'] .= "item_24|..|" . $this->Nm_lang['lang_list_apps'] . "|menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=item_24&sc_apl_menu=app_grid_sec_apps&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_apps'] . "||" . $this->menu_fonte_olho_dagua_azul_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_groups']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_groups']) == "on")
{
    $menu_fonte_olho_dagua_azul_menuData['data'] .= "item_25|..|" . $this->Nm_lang['lang_list_groups'] . "|menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=item_25&sc_apl_menu=app_grid_sec_groups&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_groups'] . "||" . $this->menu_fonte_olho_dagua_azul_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_users_groups']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_users_groups']) == "on")
{
    $menu_fonte_olho_dagua_azul_menuData['data'] .= "item_32|..|" . $this->Nm_lang['lang_list_users_x_groups'] . "|menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=item_32&sc_apl_menu=app_grid_sec_users_groups&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_users_x_groups'] . "||" . $this->menu_fonte_olho_dagua_azul_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_search_sec_groups']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_search_sec_groups']) == "on")
{
    $menu_fonte_olho_dagua_azul_menuData['data'] .= "item_26|..|" . $this->Nm_lang['lang_list_apps_x_groups'] . "|menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=item_26&sc_apl_menu=app_search_sec_groups&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_apps_x_groups'] . "||" . $this->menu_fonte_olho_dagua_azul_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_sync_apps']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_sync_apps']) == "on")
{
    $menu_fonte_olho_dagua_azul_menuData['data'] .= "item_27|..|" . $this->Nm_lang['lang_list_sync_apps'] . "|menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=item_27&sc_apl_menu=app_sync_apps&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_list_sync_apps'] . "||" . $this->menu_fonte_olho_dagua_azul_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_logged_users']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_logged_users']) == "on")
{
    $menu_fonte_olho_dagua_azul_menuData['data'] .= "item_30|..|" . $this->Nm_lang['lang_logged_users'] . "|menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=item_30&sc_apl_menu=app_logged_users&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_logged_users'] . "||" . $this->menu_fonte_olho_dagua_azul_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_change_pswd']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_change_pswd']) == "on")
{
    $menu_fonte_olho_dagua_azul_menuData['data'] .= "item_28|..|" . $this->Nm_lang['lang_change_pswd'] . "|menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=item_28&sc_apl_menu=app_change_pswd&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_change_pswd'] . "||" . $this->menu_fonte_olho_dagua_azul_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_Login']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_Login']) == "on")
{
    $menu_fonte_olho_dagua_azul_menuData['data'] .= "item_29|..|" . $this->Nm_lang['lang_exit'] . "|menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=item_29&sc_apl_menu=app_Login&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . "|" . $this->Nm_lang['lang_exit'] . "||" . $this->menu_fonte_olho_dagua_azul_target('_parent') . "|" . "\n";
}

$menu_fonte_olho_dagua_azul_menuData['data'] .= "item_33|.|" . $nm_var_lab[1] . "||" . $nm_var_hint[0] . "||_self|\n";
$menu_fonte_olho_dagua_azul_menuData['data'] .= "item_35|..|" . $nm_var_lab[2] . "||" . $nm_var_hint[1] . "||_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['Historico']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['Historico']) == "on")
{
    $menu_fonte_olho_dagua_azul_menuData['data'] .= "item_38|...|" . $nm_var_lab[3] . "|menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=item_38&sc_apl_menu=Historico&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[2] . "||" . $this->menu_fonte_olho_dagua_azul_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['chart_fonte_nivel']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['chart_fonte_nivel']) == "on")
{
    $menu_fonte_olho_dagua_azul_menuData['data'] .= "item_36|...|" . $nm_var_lab[4] . "|menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=item_36&sc_apl_menu=chart_fonte_nivel&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[3] . "||" . $this->menu_fonte_olho_dagua_azul_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['chart_fonte_volume']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['chart_fonte_volume']) == "on")
{
    $menu_fonte_olho_dagua_azul_menuData['data'] .= "item_37|...|" . $nm_var_lab[5] . "|menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=item_37&sc_apl_menu=chart_fonte_volume&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[4] . "||" . $this->menu_fonte_olho_dagua_azul_target('_self') . "|" . "\n";
}

$menu_fonte_olho_dagua_azul_menuData['data'] .= "item_4|.|" . $_SESSION['usr_name'] . "||" . $nm_var_hint[5] . "|scriptcase__NM__bg__NM__admin_proj.png|_self|\n";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_change_pswd']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_change_pswd']) == "on")
{
    $menu_fonte_olho_dagua_azul_menuData['data'] .= "item_9|..|" . $nm_var_lab[6] . "|menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=item_9&sc_apl_menu=app_change_pswd&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[6] . "||" . $this->menu_fonte_olho_dagua_azul_target('_self') . "|" . "\n";
}

if (isset($_SESSION['scriptcase']['sc_apl_seg']['app_Login']) && strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_Login']) == "on")
{
    $menu_fonte_olho_dagua_azul_menuData['data'] .= "item_6|..|" . $nm_var_lab[7] . "|menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=item_6&sc_apl_menu=app_Login&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . "|" . $nm_var_hint[7] . "||" . $this->menu_fonte_olho_dagua_azul_target('_parent') . "|" . "\n";
}


$menu_fonte_olho_dagua_azul_menuData['data'] = array();
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_fonte_olho_dagua_azul_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[0] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $this->Nm_lang['lang_menu_security'] . "",
    'id'       => "item_22",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_22",
    'disabled' => $str_disabled,
    'display'     => "text_fontawesomeicon",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-unlock",
    'icon_color'     => "#3094db",
    'icon_color_hover'     => "#d2dae2",
    'icon_color_disabled'     => "#d2dae2",
);
$str_disabled = "N";
$str_link = "menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=item_23&sc_apl_menu=app_grid_sec_users&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_users']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_users']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_fonte_olho_dagua_azul_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_users'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_users'] . "",
        'id'       => "item_23",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_fonte_olho_dagua_azul_target('_self') . "\"",
        'sc_id'    => "item_23",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=item_24&sc_apl_menu=app_grid_sec_apps&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_apps']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_apps']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_fonte_olho_dagua_azul_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_apps'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_apps'] . "",
        'id'       => "item_24",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_fonte_olho_dagua_azul_target('_self') . "\"",
        'sc_id'    => "item_24",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=item_25&sc_apl_menu=app_grid_sec_groups&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_groups']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_groups']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_fonte_olho_dagua_azul_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_groups'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_groups'] . "",
        'id'       => "item_25",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_fonte_olho_dagua_azul_target('_self') . "\"",
        'sc_id'    => "item_25",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=item_32&sc_apl_menu=app_grid_sec_users_groups&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_users_groups']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_grid_sec_users_groups']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_fonte_olho_dagua_azul_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_users_x_groups'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_users_x_groups'] . "",
        'id'       => "item_32",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_fonte_olho_dagua_azul_target('_self') . "\"",
        'sc_id'    => "item_32",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=item_26&sc_apl_menu=app_search_sec_groups&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_search_sec_groups']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_search_sec_groups']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['filter']['active']))
    {
        $icon_aba = $arr_menuicons['filter']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['filter']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['filter']['inactive'];
    }
    $menu_fonte_olho_dagua_azul_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_apps_x_groups'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_apps_x_groups'] . "",
        'id'       => "item_26",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_fonte_olho_dagua_azul_target('_self') . "\"",
        'sc_id'    => "item_26",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=item_27&sc_apl_menu=app_sync_apps&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_sync_apps']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_sync_apps']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menu_fonte_olho_dagua_azul_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_list_sync_apps'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_list_sync_apps'] . "",
        'id'       => "item_27",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_fonte_olho_dagua_azul_target('_self') . "\"",
        'sc_id'    => "item_27",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=item_30&sc_apl_menu=app_logged_users&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_logged_users']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_logged_users']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_fonte_olho_dagua_azul_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_logged_users'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_logged_users'] . "",
        'id'       => "item_30",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_fonte_olho_dagua_azul_target('_self') . "\"",
        'sc_id'    => "item_30",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=item_28&sc_apl_menu=app_change_pswd&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_change_pswd']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_change_pswd']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menu_fonte_olho_dagua_azul_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_change_pswd'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_change_pswd'] . "",
        'id'       => "item_28",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_fonte_olho_dagua_azul_target('_self') . "\"",
        'sc_id'    => "item_28",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=item_29&sc_apl_menu=app_Login&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_Login']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_Login']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contrusr']['active']))
    {
        $icon_aba = $arr_menuicons['contrusr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contrusr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contrusr']['inactive'];
    }
    $menu_fonte_olho_dagua_azul_menuData['data'][] = array(
        'label'    => "" . $this->Nm_lang['lang_exit'] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $this->Nm_lang['lang_exit'] . "",
        'id'       => "item_29",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_fonte_olho_dagua_azul_target('_parent') . "\"",
        'sc_id'    => "item_29",
        'disabled' => $str_disabled,
        'display'     => "text_img",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-cog",
        'icon_color'     => "",
        'icon_color_hover'     => "",
        'icon_color_disabled'     => "",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_fonte_olho_dagua_azul_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[1] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[0] . "",
    'id'       => "item_33",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_33",
    'disabled' => $str_disabled,
    'display'     => "text_fontawesomeicon",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-align-justify",
    'icon_color'     => "#3094db",
    'icon_color_hover'     => "#d2dae2",
    'icon_color_disabled'     => "#d2dae2",
);
$str_disabled = "N";
$str_link = "#";
$str_icon = "";
$icon_aba = "";
$icon_aba_inactive = "";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_fonte_olho_dagua_azul_menuData['data'][] = array(
    'label'    => "" . $nm_var_lab[2] . "",
    'level'    => "1",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[1] . "",
    'id'       => "item_35",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_35",
    'disabled' => $str_disabled,
    'display'     => "text_fontawesomeicon",
    'display_position'=> "text_right",
    'icon_fa'     => "far fa-calendar-alt",
    'icon_color'     => "#3094db",
    'icon_color_hover'     => "#d2dae2",
    'icon_color_disabled'     => "#d2dae2",
);
$str_disabled = "N";
$str_link = "menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=item_38&sc_apl_menu=Historico&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['Historico']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['Historico']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['cons']['active']))
    {
        $icon_aba = $arr_menuicons['cons']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['cons']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['cons']['inactive'];
    }
    $menu_fonte_olho_dagua_azul_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[3] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[2] . "",
        'id'       => "item_38",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_fonte_olho_dagua_azul_target('_self') . "\"",
        'sc_id'    => "item_38",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-th",
        'icon_color'     => "#3094db",
        'icon_color_hover'     => "#d2dae2",
        'icon_color_disabled'     => "#d2dae2",
    );
$str_disabled = "N";
$str_link = "menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=item_36&sc_apl_menu=chart_fonte_nivel&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['chart_fonte_nivel']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['chart_fonte_nivel']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['chart']['active']))
    {
        $icon_aba = $arr_menuicons['chart']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['chart']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['chart']['inactive'];
    }
    $menu_fonte_olho_dagua_azul_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[4] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[3] . "",
        'id'       => "item_36",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_fonte_olho_dagua_azul_target('_self') . "\"",
        'sc_id'    => "item_36",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-chart-bar",
        'icon_color'     => "#3094db",
        'icon_color_hover'     => "#d2dae2",
        'icon_color_disabled'     => "#d2dae2",
    );
$str_disabled = "N";
$str_link = "menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=item_37&sc_apl_menu=chart_fonte_volume&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['chart_fonte_volume']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['chart_fonte_volume']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['chart']['active']))
    {
        $icon_aba = $arr_menuicons['chart']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['chart']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['chart']['inactive'];
    }
    $menu_fonte_olho_dagua_azul_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[5] . "",
        'level'    => "2",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[4] . "",
        'id'       => "item_37",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_fonte_olho_dagua_azul_target('_self') . "\"",
        'sc_id'    => "item_37",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "far fa-chart-bar",
        'icon_color'     => "#3094db",
        'icon_color_hover'     => "#d2dae2",
        'icon_color_disabled'     => "#d2dae2",
    );
$str_disabled = "N";
$str_link = "#";
$str_icon = "scriptcase__NM__bg__NM__admin_proj.png";
$icon_aba = "scriptcase__NM__bg__NM__admin_proj.png";
$icon_aba_inactive = "scriptcase__NM__bg__NM__admin_proj.png";
if(empty($icon_aba) && isset($arr_menuicons['others']['active']))
{
    $icon_aba = $arr_menuicons['others']['active'];
}
if(empty($icon_aba_inactive) && isset($arr_menuicons['others']['inactive']))
{
    $icon_aba_inactive = $arr_menuicons['others']['inactive'];
}
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
$str_link = "#";
}
$menu_fonte_olho_dagua_azul_menuData['data'][] = array(
    'label'    => "" . $_SESSION['usr_name'] . "",
    'level'    => "0",
    'link'     => $str_link,
    'hint'     => "" . $nm_var_hint[5] . "",
    'id'       => "item_4",
    'icon'     => $str_icon,
    'icon_aba' => $icon_aba,
    'icon_aba_inactive' => $icon_aba_inactive,
    'target'   => "",
    'sc_id'    => "item_4",
    'disabled' => $str_disabled,
    'display'     => "text_fontawesomeicon",
    'display_position'=> "text_right",
    'icon_fa'     => "fas fa-user-alt",
    'icon_color'     => "#3094db",
    'icon_color_hover'     => "#d2dae2",
    'icon_color_disabled'     => "#d2dae2",
);
$str_disabled = "N";
$str_link = "menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=item_9&sc_apl_menu=app_change_pswd&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_change_pswd']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_change_pswd']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contr']['active']))
    {
        $icon_aba = $arr_menuicons['contr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contr']['inactive'];
    }
    $menu_fonte_olho_dagua_azul_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[6] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[6] . "",
        'id'       => "item_9",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_fonte_olho_dagua_azul_target('_self') . "\"",
        'sc_id'    => "item_9",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-key",
        'icon_color'     => "#3094db",
        'icon_color_hover'     => "#d2dae2",
        'icon_color_disabled'     => "#d2dae2",
    );
$str_disabled = "N";
$str_link = "menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=item_6&sc_apl_menu=app_Login&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . "";
if (!isset($_SESSION['scriptcase']['sc_apl_seg']['app_Login']) || strtolower($_SESSION['scriptcase']['sc_apl_seg']['app_Login']) != "on")
{
    $str_link = "#";
    $str_disabled = "Y";
}
    $str_icon = "";
    $icon_aba = "";
    $icon_aba_inactive = "";
    if(empty($icon_aba) && isset($arr_menuicons['contrusr']['active']))
    {
        $icon_aba = $arr_menuicons['contrusr']['active'];
    }
    if(empty($icon_aba_inactive) && isset($arr_menuicons['contrusr']['inactive']))
    {
        $icon_aba_inactive = $arr_menuicons['contrusr']['inactive'];
    }
    $menu_fonte_olho_dagua_azul_menuData['data'][] = array(
        'label'    => "" . $nm_var_lab[7] . "",
        'level'    => "1",
        'link'     => $str_link,
        'hint'     => "" . $nm_var_hint[7] . "",
        'id'       => "item_6",
        'icon'     => $str_icon,
        'icon_aba' => $icon_aba,
        'icon_aba_inactive' => $icon_aba_inactive,
        'target'   => " item-target=\"" . $this->menu_fonte_olho_dagua_azul_target('_parent') . "\"",
        'sc_id'    => "item_6",
        'disabled' => $str_disabled,
        'display'     => "text_fontawesomeicon",
        'display_position'=> "text_right",
        'icon_fa'     => "fas fa-sign-out-alt",
        'icon_color'     => "#3094db",
        'icon_color_hover'     => "#d2dae2",
        'icon_color_disabled'     => "#d2dae2",
    );

if (isset($_SESSION['scriptcase']['sc_def_menu']['menu_fonte_olho_dagua_azul']))
{
    $arr_menu_usu = $this->nm_arr_menu_recursiv($_SESSION['scriptcase']['sc_def_menu']['menu_fonte_olho_dagua_azul']);
    $this->nm_gera_menus($str_menu_usu, $arr_menu_usu, 1, 'menu_fonte_olho_dagua_azul');
    $menu_fonte_olho_dagua_azul_menuData['data'] = $str_menu_usu;
}
if (is_file("menu_fonte_olho_dagua_azul_help.txt"))
{
    $Arq_WebHelp = file("menu_fonte_olho_dagua_azul_help.txt"); 
    if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
    {
        $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
        $Tmp = explode(";", $Arq_WebHelp[0]); 
        foreach ($Tmp as $Cada_help)
        {
            $Tmp1 = explode(":", $Cada_help); 
            if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "menu" && is_file($str_root . $path_help . $Tmp1[1]))
            {
                $str_disabled = "N";
                $str_link = "" . $path_help . $Tmp1[1] . "";
                $str_icon = "";
                $icon_aba = "";
                $icon_aba_inactive = "";
                if(empty($icon_aba) && isset($arr_menuicons['']['active']))
                {
                    $icon_aba = $arr_menuicons['']['active'];
                }
                if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
                {
                    $icon_aba_inactive = $arr_menuicons['']['inactive'];
                }
                $menu_fonte_olho_dagua_azul_menuData['data'][] = array(
                    'label'    => "" . $this->Nm_lang['lang_btns_help_hint'] . "",
                    'level'    => "0",
                    'link'     => $str_link,
                    'hint'     => "" . $this->Nm_lang['lang_btns_help_hint'] . "",
                    'id'       => "item_Help",
                    'icon'     => $str_icon,
                    'icon_aba' => $icon_aba,
                    'icon_aba_inactive' => $icon_aba_inactive,
                    'target'   => "" . $this->menu_fonte_olho_dagua_azul_target('_blank') . "",
                    'sc_id'    => "item_Help",
                    'disabled' => $str_disabled,
                    'display'     => "text",
                    'display_position'=> "",
                    'icon_fa'     => "",
                    'icon_color'     => "",
                    'icon_color_hover'     => "",
                    'icon_color_disabled'     => "",
                );
            }
        }
    }
}

if (isset($_SESSION['scriptcase']['sc_menu_del']['menu_fonte_olho_dagua_azul']) && !empty($_SESSION['scriptcase']['sc_menu_del']['menu_fonte_olho_dagua_azul']))
{
    $nivel = 0;
    $exclui_menu = false;
    foreach ($menu_fonte_olho_dagua_azul_menuData['data'] as $i_menu => $cada_menu)
    {
       if (in_array($cada_menu['id'], $_SESSION['scriptcase']['sc_menu_del']['menu_fonte_olho_dagua_azul']))
       {
          $nivel = $cada_menu['level'];
          $exclui_menu = true;
          unset($menu_fonte_olho_dagua_azul_menuData['data'][$i_menu]);
       }
       elseif ( empty($cada_menu) || ($exclui_menu && $nivel < $cada_menu['level']))
       {
          unset($menu_fonte_olho_dagua_azul_menuData['data'][$i_menu]);
       }
       else
       {
          $exclui_menu = false;
       }
    }
    $Temp_menu = array();
    foreach ($menu_fonte_olho_dagua_azul_menuData['data'] as $i_menu => $cada_menu)
    {
        $Temp_menu[] = $cada_menu;
    }
    $menu_fonte_olho_dagua_azul_menuData['data'] = $Temp_menu;
}

if (isset($_SESSION['scriptcase']['sc_menu_disable']['menu_fonte_olho_dagua_azul']) && !empty($_SESSION['scriptcase']['sc_menu_disable']['menu_fonte_olho_dagua_azul']))
{
    $disable_menu = false;
    foreach ($menu_fonte_olho_dagua_azul_menuData['data'] as $i_menu => $cada_menu)
    {
       if (in_array($cada_menu['id'], $_SESSION['scriptcase']['sc_menu_disable']['menu_fonte_olho_dagua_azul']))
       {
          $nivel = $cada_menu['level'];
          $disable_menu = true;
          $menu_fonte_olho_dagua_azul_menuData['data'][$i_menu]['disabled'] = 'Y';
       }
       elseif (!empty($cada_menu) && $disable_menu && $nivel < $cada_menu['level'])
       { 
          $menu_fonte_olho_dagua_azul_menuData['data'][$i_menu]['disabled'] = 'Y';
       }
       elseif (!empty($cada_menu))
       {
          $disable_menu = false;
       }
    }
}

$level_to_delete = false;
foreach ($menu_fonte_olho_dagua_azul_menuData['data'] as $chave => $cada_menu)
{
        if($level_to_delete !== false && $menu_fonte_olho_dagua_azul_menuData['data'][$chave]['level'] > $level_to_delete)
        {
                unset($menu_fonte_olho_dagua_azul_menuData['data'][$chave]);
        }
        else
        {
                $level_to_delete = false;
                
                if ($menu_fonte_olho_dagua_azul_menuData['data'][$chave]['disabled'] == 'Y')
                {
                        $level_to_delete = $menu_fonte_olho_dagua_azul_menuData['data'][$chave]['level'];
                        unset($menu_fonte_olho_dagua_azul_menuData['data'][$chave]);
                }
        }
}
$menu_fonte_olho_dagua_azul_menuData['data'] = array_values($menu_fonte_olho_dagua_azul_menuData['data']);
$flag = 1;
while ($flag == 1)
{
    $flag = 0;
    foreach ($menu_fonte_olho_dagua_azul_menuData['data'] as $chave => $cada_menu)
    {
        if (!empty($cada_menu))
        {
            if (isset($menu_fonte_olho_dagua_azul_menuData['data'][$chave + 1]) && !empty($menu_fonte_olho_dagua_azul_menuData['data'][$chave + 1]))
            {
                if ($menu_fonte_olho_dagua_azul_menuData['data'][$chave]['link'] == "#")
                {
                    if ($menu_fonte_olho_dagua_azul_menuData['data'][$chave]['level'] >= $menu_fonte_olho_dagua_azul_menuData['data'][$chave + 1]['level'] )
                    {
                        unset($menu_fonte_olho_dagua_azul_menuData['data'][$chave]);
                        $flag = 1;
                    }
                }
            }
            elseif ($menu_fonte_olho_dagua_azul_menuData['data'][$chave]['link'] == "#")
            {
                unset($menu_fonte_olho_dagua_azul_menuData['data'][$chave]);
            }
        }
    }
    $menu_fonte_olho_dagua_azul_menuData['data'] = array_values($menu_fonte_olho_dagua_azul_menuData['data']);
}

/* Cabe??alho HTML */
if ($menu_fonte_olho_dagua_azul_menuData['iframe'])
{
    $menu_fonte_olho_dagua_azul_menuData['height'] = '100%';
    header("X-XSS-Protection: 1; mode=block");
    header("X-Frame-Options: SAMEORIGIN");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?> style="height: 100%">
<head>
 <title><?php echo $this->Nm_lang['lang_v94_menu_content_title'] ?></title>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <?php
 if ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
 {
  ?>
   <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />
  <?php
 }
 ?>
 <link rel="shortcut icon" href="../_lib/img/usr__NM__ico__NM__1132icone - Logo_Prancheta 1.ico">
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <?php 
 if(isset($str_google_fonts) && !empty($str_google_fonts)) 
 { 
     ?> 
     <link rel="stylesheet" type="text/css" href="<?php echo $str_google_fonts ?>" /> 
     <?php 
 } 
 ?> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_btngrp.css<?php if (@is_file($this->path_css . $this->str_schema_all . '_btngrp.css')) { echo '?scp=' . md5($this->path_css . $this->str_schema_all . '_btngrp.css'); } ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_menutab.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_menutab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_menuH<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_menuH.css<?php if (@is_file($this->path_css . $this->str_schema_all . '_menuH.css')) { echo '?scp=' . md5($this->path_css . $this->str_schema_all . '_menuH.css'); } ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $Str_btn_css ?>" /> 
 <link rel="stylesheet" href="<?php echo $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_path_prod']; ?>/third/font-awesome/css/all.min.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="../_lib/css/_menuTheme/grp_Gleam_Sample_hor_<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir']; ?>.css<?php if (@is_file($this->path_css . '_menuTheme/' . "grp_Gleam_Sample" . '_' . hor . '.css')) { echo '?scp=' . md5($this->path_css . '_menuTheme/' . "grp_Gleam_Sample" . '_' . hor . '.css'); } ?>" />
<style>
   .scTabText {
   }   #item_22 .icon_fa{ color: #3094db  !important}
   #aba_td_item_22 i{ color:#3094db  !important}
   #item_22:hover .icon_fa{ color: #d2dae2  !important}
   #aba_td_item_22:hover i{ color:#d2dae2  !important}
   #item_22.scdisabledmain .icon_fa{ color: #d2dae2  !important}
   #item_22.scdisabledsub .icon_fa{ color: #d2dae2  !important}
   #aba_td_item_22.scTabInactive i{ color:#d2dae2  !important}
   #item_33 .icon_fa{ color: #3094db  !important}
   #aba_td_item_33 i{ color:#3094db  !important}
   #item_33:hover .icon_fa{ color: #d2dae2  !important}
   #aba_td_item_33:hover i{ color:#d2dae2  !important}
   #item_33.scdisabledmain .icon_fa{ color: #d2dae2  !important}
   #item_33.scdisabledsub .icon_fa{ color: #d2dae2  !important}
   #aba_td_item_33.scTabInactive i{ color:#d2dae2  !important}
   #item_35 .icon_fa{ color: #3094db  !important}
   #aba_td_item_35 i{ color:#3094db  !important}
   #item_35:hover .icon_fa{ color: #d2dae2  !important}
   #aba_td_item_35:hover i{ color:#d2dae2  !important}
   #item_35.scdisabledmain .icon_fa{ color: #d2dae2  !important}
   #item_35.scdisabledsub .icon_fa{ color: #d2dae2  !important}
   #aba_td_item_35.scTabInactive i{ color:#d2dae2  !important}
   #item_38 .icon_fa{ color: #3094db  !important}
   #aba_td_item_38 i{ color:#3094db  !important}
   #item_38:hover .icon_fa{ color: #d2dae2  !important}
   #aba_td_item_38:hover i{ color:#d2dae2  !important}
   #item_38.scdisabledmain .icon_fa{ color: #d2dae2  !important}
   #item_38.scdisabledsub .icon_fa{ color: #d2dae2  !important}
   #aba_td_item_38.scTabInactive i{ color:#d2dae2  !important}
   #item_36 .icon_fa{ color: #3094db  !important}
   #aba_td_item_36 i{ color:#3094db  !important}
   #item_36:hover .icon_fa{ color: #d2dae2  !important}
   #aba_td_item_36:hover i{ color:#d2dae2  !important}
   #item_36.scdisabledmain .icon_fa{ color: #d2dae2  !important}
   #item_36.scdisabledsub .icon_fa{ color: #d2dae2  !important}
   #aba_td_item_36.scTabInactive i{ color:#d2dae2  !important}
   #item_37 .icon_fa{ color: #3094db  !important}
   #aba_td_item_37 i{ color:#3094db  !important}
   #item_37:hover .icon_fa{ color: #d2dae2  !important}
   #aba_td_item_37:hover i{ color:#d2dae2  !important}
   #item_37.scdisabledmain .icon_fa{ color: #d2dae2  !important}
   #item_37.scdisabledsub .icon_fa{ color: #d2dae2  !important}
   #aba_td_item_37.scTabInactive i{ color:#d2dae2  !important}
   #item_4 .icon_fa{ color: #3094db  !important}
   #aba_td_item_4 i{ color:#3094db  !important}
   #item_4:hover .icon_fa{ color: #d2dae2  !important}
   #aba_td_item_4:hover i{ color:#d2dae2  !important}
   #item_4.scdisabledmain .icon_fa{ color: #d2dae2  !important}
   #item_4.scdisabledsub .icon_fa{ color: #d2dae2  !important}
   #aba_td_item_4.scTabInactive i{ color:#d2dae2  !important}
   #item_9 .icon_fa{ color: #3094db  !important}
   #aba_td_item_9 i{ color:#3094db  !important}
   #item_9:hover .icon_fa{ color: #d2dae2  !important}
   #aba_td_item_9:hover i{ color:#d2dae2  !important}
   #item_9.scdisabledmain .icon_fa{ color: #d2dae2  !important}
   #item_9.scdisabledsub .icon_fa{ color: #d2dae2  !important}
   #aba_td_item_9.scTabInactive i{ color:#d2dae2  !important}
   #item_6 .icon_fa{ color: #3094db  !important}
   #aba_td_item_6 i{ color:#3094db  !important}
   #item_6:hover .icon_fa{ color: #d2dae2  !important}
   #aba_td_item_6:hover i{ color:#d2dae2  !important}
   #item_6.scdisabledmain .icon_fa{ color: #d2dae2  !important}
   #item_6.scdisabledsub .icon_fa{ color: #d2dae2  !important}
   #aba_td_item_6.scTabInactive i{ color:#d2dae2  !important}
    <?php
        if(isset($_SESSION['scriptcase']['sc_def_menu']) && !empty($_SESSION['scriptcase']['sc_def_menu']))
        {
            foreach($_SESSION['scriptcase']['sc_def_menu'] as $arr_menus)
            {
              foreach($arr_menus as $id => $arr_item)
              {
                  if(isset($arr_item['icon_color']) && !empty($arr_item['icon_color']))
                  {
                      echo "   #" . $id . " .icon_fa{ color: ". $arr_item['icon_color'] ."  !important}
";
                      if(isset($menu_parms1['icons_inherit_style']) && $menu_parms1['icons_inherit_style'] == 'S')
                      {
                          echo "   #aba_td_" . $id . " i{ color:". $arr_item['icon_color'] ."  !important}
";
                      }
                  }
                  if(isset($arr_item['icon_color_hover']) && !empty($arr_item['icon_color_hover']))
                  {
                      echo "   #" . $id . ":hover .icon_fa{ color: ". $arr_item['icon_color_hover'] ."  !important}
";
                      if(isset($menu_parms1['icons_inherit_style']) && $menu_parms1['icons_inherit_style'] == 'S')
                      {
                          echo "   #aba_td_" . $id . ":hover i{ color:". $arr_item['icon_color_hover'] ."  !important}
";
                      }
                  }
                  if(isset($arr_item['icon_color_disabled']) && !empty($arr_item['icon_color_disabled']))
                  {
                      echo "   #" . $id . ".scdisabledmain .icon_fa{ color: ". $arr_item['icon_color_disabled'] ."  !important}
";
                      echo "   #" . $id . ".scdisabledsub .icon_fa{ color: ". $arr_item['icon_color_disabled'] ."  !important}
";
                      if(isset($menu_parms1['icons_inherit_style']) && $menu_parms1['icons_inherit_style'] == 'S')
                      {
                          echo "   #aba_td_" . $id . ".scTabInactive i{ color:". $arr_item['icon_color_disabled'] ."  !important}
";
                      }
                  }
              }
            }
        }
    ?>
</style>
<script type="text/javascript">
 var is_menu_vertical = false;
 function sc_session_redir(url_redir)
 {
     if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')
     {
         window.parent.sc_session_redir(url_redir);
     }
     else
     {
         if (window.opener && typeof window.opener.sc_session_redir === 'function')
         {
             window.close();
             window.opener.sc_session_redir(url_redir);
         }
         else
         {
             window.location = url_redir;
         }
     }
 }
</script>
</head>
<body style="height: 100%" scroll="no" class='scMenuHPage'>
<?php

if ('' != $sOutputBuffer)
{
    echo $sOutputBuffer;
}

    $NM_scr_iframe = (isset($_POST['hid_scr_iframe'])) ? $_POST['hid_scr_iframe'] : "";   
}
else
{
    $menu_fonte_olho_dagua_azul_menuData['height'] = '30px';
}

/* Arquivos JS */
?>
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_path_prod']; ?>/third/jquery/js/jquery.js"></script>
<script  type="text/javascript" src="<?php echo $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_path_prod']; ?>/third/jquery_plugin/contextmenu/jquery.contextmenu.js"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_path_prod']; ?>/third/jquery_plugin/contextmenu/contextmenu.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_contextmenu.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_contextmenu.css<?php if (@is_file($this->path_css . $this->str_schema_all . '_contextmenu.css')) { echo '?scp=' . md5($this->path_css . $this->str_schema_all . '_contextmenu.css'); } ?>" /> 
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_path_prod']; ?>/third/sweetalert/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_path_prod']; ?>/third/sweetalert/polyfill.min.js"></script>
<link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_sweetalert.css" />
<?php
$confirmButtonClass = '';
$cancelButtonClass  = '';
$confirmButtonText  = $this->Nm_lang['lang_btns_cfrm'];
$cancelButtonText   = $this->Nm_lang['lang_btns_cncl'];
$confirmButtonFA    = '';
$cancelButtonFA     = '';
$confirmButtonFAPos = '';
$cancelButtonFAPos  = '';
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['style']) && '' != $this->arr_buttons['bsweetalert_ok']['style']) {
    $confirmButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_ok']['style'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['style']) && '' != $this->arr_buttons['bsweetalert_cancel']['style']) {
    $cancelButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_cancel']['style'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['value']) && '' != $this->arr_buttons['bsweetalert_ok']['value']) {
    $confirmButtonText = $this->arr_buttons['bsweetalert_ok']['value'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['value']) && '' != $this->arr_buttons['bsweetalert_cancel']['value']) {
    $cancelButtonText = $this->arr_buttons['bsweetalert_cancel']['value'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) {
    $confirmButtonFA = $this->arr_buttons['bsweetalert_ok']['fontawesomeicon'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) {
    $cancelButtonFA = $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_ok']['display_position']) {
    $confirmButtonFAPos = 'text_right';
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_cancel']['display_position']) {
    $cancelButtonFAPos = 'text_right';
}
?>
<script type="text/javascript">
  var scSweetAlertConfirmButton = "<?php echo $confirmButtonClass ?>";
  var scSweetAlertCancelButton = "<?php echo $cancelButtonClass ?>";
  var scSweetAlertConfirmButtonText = "<?php echo $confirmButtonText ?>";
  var scSweetAlertCancelButtonText = "<?php echo $cancelButtonText ?>";
  var scSweetAlertConfirmButtonFA = "<?php echo $confirmButtonFA ?>";
  var scSweetAlertCancelButtonFA = "<?php echo $cancelButtonFA ?>";
  var scSweetAlertConfirmButtonFAPos = "<?php echo $confirmButtonFAPos ?>";
  var scSweetAlertCancelButtonFAPos = "<?php echo $cancelButtonFAPos ?>";
</script>
<script type="text/javascript" src="menu_fonte_olho_dagua_azul_message.js"></script>
<script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
<script type="text/javascript">
$(function() {
<?php
if (count($this->nm_mens_alert)) {
   if (isset($this->Ini->nm_mens_alert) && !empty($this->Ini->nm_mens_alert))
   {
       if (isset($this->nm_mens_alert) && !empty($this->nm_mens_alert))
       {
           $this->nm_mens_alert   = array_merge($this->Ini->nm_mens_alert, $this->nm_mens_alert);
           $this->nm_params_alert = array_merge($this->Ini->nm_params_alert, $this->nm_params_alert);
       }
       else
       {
           $this->nm_mens_alert   = $this->Ini->nm_mens_alert;
           $this->nm_params_alert = $this->Ini->nm_params_alert;
       }
   }
   if (isset($this->nm_mens_alert) && !empty($this->nm_mens_alert))
   {
       foreach ($this->nm_mens_alert as $i_alert => $mensagem)
       {
           $alertParams = array();
           if (isset($this->nm_params_alert[$i_alert]))
           {
               foreach ($this->nm_params_alert[$i_alert] as $paramName => $paramValue)
               {
                   if (in_array($paramName, array('title', 'timer', 'confirmButtonText', 'confirmButtonFA', 'confirmButtonFAPos', 'cancelButtonText', 'cancelButtonFA', 'cancelButtonFAPos', 'footer', 'width', 'padding')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif (in_array($paramName, array('showConfirmButton', 'showCancelButton', 'toast')) && in_array($paramValue, array(true, false)))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('position' == $paramName && in_array($paramValue, array('top', 'top-start', 'top-end', 'center', 'center-start', 'center-end', 'bottom', 'bottom-start', 'bottom-end')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('type' == $paramName && in_array($paramValue, array('warning', 'error', 'success', 'info', 'question')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('background' == $paramName)
                   {
                       $image_param = $paramValue;
                       preg_match_all('/url\(([\s])?(["|\'])?(.*?)(["|\'])?([\s])?\)/i', $paramValue, $matches, PREG_PATTERN_ORDER);
                       if (isset($matches[3])) {
                           foreach ($matches[3] as $match) {
                               if ('http:' != substr($match, 0, 5) && 'https:' != substr($match, 0, 6) && '/' != substr($match, 0, 1)) {
                                   $image_param = str_replace($match, "{$this->Ini->path_img_global}/{$match}", $image_param);
                               }
                           }
                       }
                       $paramValue = $image_param;
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
               }
           }
           $jsonParams = json_encode($alertParams);
?>
       scJs_alert('<?php echo $mensagem ?>', <?php echo $jsonParams ?>);
<?php
       }
   }
}
?>
});
</script>
<?php
$_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                  $this->Nm_lang['lang_mnth_janu'],
                                  $this->Nm_lang['lang_mnth_febr'],
                                  $this->Nm_lang['lang_mnth_marc'],
                                  $this->Nm_lang['lang_mnth_apri'],
                                  $this->Nm_lang['lang_mnth_mayy'],
                                  $this->Nm_lang['lang_mnth_june'],
                                  $this->Nm_lang['lang_mnth_july'],
                                  $this->Nm_lang['lang_mnth_augu'],
                                  $this->Nm_lang['lang_mnth_sept'],
                                  $this->Nm_lang['lang_mnth_octo'],
                                  $this->Nm_lang['lang_mnth_nove'],
                                  $this->Nm_lang['lang_mnth_dece']);
$_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                  $this->Nm_lang['lang_shrt_mnth_janu'],
                                  $this->Nm_lang['lang_shrt_mnth_febr'],
                                  $this->Nm_lang['lang_shrt_mnth_marc'],
                                  $this->Nm_lang['lang_shrt_mnth_apri'],
                                  $this->Nm_lang['lang_shrt_mnth_mayy'],
                                  $this->Nm_lang['lang_shrt_mnth_june'],
                                  $this->Nm_lang['lang_shrt_mnth_july'],
                                  $this->Nm_lang['lang_shrt_mnth_augu'],
                                  $this->Nm_lang['lang_shrt_mnth_sept'],
                                  $this->Nm_lang['lang_shrt_mnth_octo'],
                                  $this->Nm_lang['lang_shrt_mnth_nove'],
                                  $this->Nm_lang['lang_shrt_mnth_dece']);
$_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                  $this->Nm_lang['lang_days_sund'],
                                  $this->Nm_lang['lang_days_mond'],
                                  $this->Nm_lang['lang_days_tued'],
                                  $this->Nm_lang['lang_days_wend'],
                                  $this->Nm_lang['lang_days_thud'],
                                  $this->Nm_lang['lang_days_frid'],
                                  $this->Nm_lang['lang_days_satd']);
$_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                  $this->Nm_lang['lang_shrt_days_sund'],
                                  $this->Nm_lang['lang_shrt_days_mond'],
                                  $this->Nm_lang['lang_shrt_days_tued'],
                                  $this->Nm_lang['lang_shrt_days_wend'],
                                  $this->Nm_lang['lang_shrt_days_thud'],
                                  $this->Nm_lang['lang_shrt_days_frid'],
                                  $this->Nm_lang['lang_shrt_days_satd']);
$Str_date = strtolower($_SESSION['scriptcase']['reg_conf']['date_format']);
$Lim   = strlen($Str_date);
$Ult   = "";
$Arr_D = array();
for ($I = 0; $I < $Lim; $I++)
{
    $Char = substr($Str_date, $I, 1);
    if ($Char != $Ult)
    {
        $Arr_D[] = $Char;
    }
    $Ult = $Char;
}
$Prim = true;
$Str  = "";
foreach ($Arr_D as $Cada_d)
{
    $Str .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
    $Str .= $Cada_d;
    $Prim = false;
}
$Str = str_replace("a", "Y", $Str);
$Str = str_replace("y", "Y", $Str);
$nm_data_fixa = date($Str); 
?>
<?php
$larg_table = "100%";
$col_span   = "";
$strAlign = 'align=\'left\'';
?>
<?php
$str_bmenu = nmButtonOutput($this->arr_buttons, "bmenu", "showMenu();", "showMenu();", "bmenu", "", "" . $this->Nm_lang['lang_btns_menu'] . "", "position:absolute; top:0px; left:0px; z-index:9999;", "absmiddle", "", "0px", $this->path_botoes, "", "" . $this->Nm_lang['lang_btns_menu_hint'] . "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
if($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile']))
{
    $menu_mobile_hide          = $mobile_menu_mobile_hide;
    $menu_mobile_inicial_state = $mobile_menu_mobile_inicial_state;
    $menu_mobile_hide_onclick  = $mobile_menu_mobile_hide_onclick;
    $menutree_mobile_float     = $mobile_menutree_mobile_float;
    $menu_mobile_hide_icon     = $mobile_menu_mobile_hide_icon;
    $menu_mobile_hide_icon_menu_position     = $mobile_menu_mobile_hide_icon_menu_position;
}
if($menu_mobile_hide == 'S')
{
    if($menu_mobile_inicial_state =='escondido')
    {
            $str_menu_display="hide";
            $str_btn_display="show";
    }
    else
    {
        $str_menu_display="show";
        $str_btn_display="hide";
    }
    if($menu_mobile_hide_icon != 'S')
    {
        $str_btn_display="show";
    }
?>
<script>
    $( document ).ready(function() {
        $('#bmenu').<?php echo $str_btn_display; ?>();
        $('#idMenuCell').<?php echo $str_menu_display; ?>();
        $('#id_toolbar').<?php echo $str_menu_display; ?>();
        if($('#bmenu').length)
        {
            if($('.scMenuHHeader').length)
            {
                  $(".scMenuHHeader").css("padding-left", $('#bmenu').outerWidth());
            }
            else if($('.scMenuToolbar').length)
            {
                  $(".scMenuToolbar").css("padding-left", $('#bmenu').outerWidth());
            }
        }
        <?php
                if($menutree_mobile_float == 'S')
                {
                ?>
                    str_html_menu    = $('#idMenuCell').html();
                    str_html_toolbar = '';
                    if($('#idMenuToolbar').length)
                    {
                      str_html_toolbar = $('#idMenuToolbar').html();
                    }
                    $('#idMenuCell').remove()
                    $('#id_toolbar').remove()
                    $( 'body' ).prepend( "<div id='idMenuCell' style='position:absolute; top:0px; left:0px;z-index:9999;display:<?php echo (($menu_mobile_inicial_state =='escondido')?'none':''); ?>'>"+ str_html_menu + "<div>" + str_html_toolbar +"</div></div>" );
                    <?php
                    if($menu_mobile_hide_icon != 'S')
                    {
                        if($menu_mobile_hide_icon_menu_position == 'right')
                        {
                        ?>
                          $('#idMenuCell').css('left', $('#bmenu').outerWidth());
                        <?php
                        }
                        else
                        {
                          ?>
                          $('#idMenuCell').css('top', $('#bmenu').outerHeight());
                          <?php
                        }
                    }
                }
                elseif($menu_mobile_hide_icon == 'S')
                {
                ?>
                  $("#idDivMenu").css("padding-left", $('#bmenu').outerWidth());
                <?php
                }
                ?>
    });
    function showMenu()
    {
      <?php
      if($menu_mobile_hide_icon == 'S')
      {
      ?>
                $('#bmenu').hide();
      <?php
      }
      ?>
            $('#idMenuCell').fadeToggle();
            $('#id_toolbar').fadeToggle();
      <?php
      if($menutree_mobile_float != 'S')
      {
      ?>
  setTimeout(function(){ scToggleOverflow(); }, 600);
      <?php
      }
      ?>
    }
    function HideMenu()
    {
      <?php
      if($menu_mobile_hide_icon == 'S')
      {
      ?>
                $('#bmenu').show();
      <?php
      }
      ?>
            $('#idMenuCell').fadeToggle();
            $('#id_toolbar').fadeToggle();
      <?php
      if($menutree_mobile_float != 'S')
      {
      ?>
  setTimeout(function(){ scToggleOverflow(); }, 600);
      <?php
      }
      ?>
    }
</script>
<?php
echo $str_bmenu;
}
?>
<script>
        $( document ).ready(function() {
            $.contextMenu({
                selector:'#contrl_abas > li',
                leftButton: true,
                callback: function(key, options)
                {
                        switch(key)
                        {
                            case 'close':
                                contextMenuCloseTab($(this).attr('id'));
                            break;

                            case 'closeall':
                                contextMenuCloseAllTabs();
                            break;

                            case 'closeothers':
                                contextMenuCloseOthersTabs($(this).attr('id'));
                            break;

                            case 'closeright':
                                contextMenuCloseRight($(this).attr('id'));
                            break;

                            case 'closeleft':
                                contextMenuCloseLeft($(this).attr('id'));
                            break;
                        }
                    },
                items: {
                        "close": {name: '<?php echo str_replace("'", "\'", $this->Nm_lang['lang_othr_contextmenu_close']); ?>'},
                        "closeall": {name: '<?php echo str_replace("'", "\'", $this->Nm_lang['lang_othr_contextmenu_closeall']); ?>'},
                        "closeothers" : {name: '<?php echo str_replace("'", "\'", $this->Nm_lang['lang_othr_contextmenu_closeothers']); ?>'},
                        "closeright" : {name: '<?php echo str_replace("'", "\'", $this->Nm_lang['lang_othr_contextmenu_closeright']); ?>'},
                        "closeleft" : {name: '<?php echo str_replace("'", "\'", $this->Nm_lang['lang_othr_contextmenu_closeleft']); ?>'},
                    }
            });
        });

        function contextMenuCloseAllTabs()
        {
            $( "#contrl_abas li" ).each(function( index ) {
                contextMenuCloseTab($( this ).attr('id'));
            });
        }

        function contextMenuCloseTab(str_id)
        {
            if(str_id.indexOf('aba_td_') >= 0)
            {
                str_id = str_id.substr(7);
            }
            del_aba_td( str_id );
        }

        function contextMenuCloseRight(str_id)
        {
            bol_start_del = false;
            $( "#contrl_abas li" ).each(function( index ) {

                if(bol_start_del)
                {
                    contextMenuCloseTab($( this ).attr('id'));
                }

                if(str_id == $( this ).attr('id'))
                {
                    bol_start_del = true;
                }
            });
        }


        function contextMenuCloseLeft(str_id)
        {
            $( "#contrl_abas li" ).each(function( index ) {

                if(str_id == $( this ).attr('id'))
                {
                     return false;
                }
                else
                {
                    contextMenuCloseTab($( this ).attr('id'));
                }
            });
        }

        function contextMenuCloseOthersTabs(str_id)
        {
            $( "#contrl_abas li" ).each(function( index ) {
                if(str_id != $( this ).attr('id'))
                {
                    contextMenuCloseTab($( this ).attr('id'));
                }
            });
        }

function expandMenu()
{
    $('#idMenuHeader').hide();
    $('#idMenuLine').hide();
    $('#id_toolbar').hide();
    $('#id_expand').hide();
    $('#id_collapse').show();
}

function collapseMenu()
{
    $('#idMenuHeader').show();
    $('#idMenuLine').show();
    $('#id_toolbar').show();
    $('#id_expand').show();
    $('#id_collapse').hide();
}
Iframe_atual = "menu_fonte_olho_dagua_azul_iframe";
function writeFastMenu(arr_link)
{
  return false;
}
function clearFastMenu(arr_link)
{
  return false;
}
Tab_iframes         = new Array();
Tab_labels          = new Array();
Tab_hints           = new Array();
Tab_icons           = new Array();
Tab_icons_inactive  = new Array();
Tab_abas            = new Array();
Tab_refresh         = new Array();
Tab_icon_fa         = new Array();
Tab_icon_fa_inactive= new Array();
Tab_display         = new Array();
Tab_display_position= new Array();
Tab_links          = new Array();
var scScrollInterval = divOverflow = false;
Tab_ico_def        = new Array();
Tab_ico_ina_def    = new Array();
<?php
 foreach ($arr_menuicons as $tp => $icon)
 {
    echo "Tab_ico_def['$tp']     = '" . $icon['active'] . "';\r\n";
    echo "Tab_ico_ina_def['$tp'] = '" . $icon['inactive'] . "';\r\n";
 }
?>
Aba_atual    = "";
<?php
 $seq = 0;
echo "Tab_iframes[" . $seq . "] = \"menu_fonte_olho_dagua_azul\";\r\n";
echo "Tab_labels['menu_fonte_olho_dagua_azul'] = \"  Home\";\r\n";
echo "Tab_hints['menu_fonte_olho_dagua_azul'] = \"  Home\";\r\n";
echo "Tab_abas['menu_fonte_olho_dagua_azul']   = \"none\";\r\n";
echo "Tab_refresh['menu_fonte_olho_dagua_azul']   = \"\";\r\n";
echo "Tab_icons['menu_fonte_olho_dagua_azul'] = \"scriptcase__NM__ico__NM__sc_menu_home_e.png\";\r\n";
echo "Tab_icons_inactive['menu_fonte_olho_dagua_azul'] = \"scriptcase__NM__ico__NM__sc_menu_home_d.png\";\r\n";
echo "Tab_icon_fa['menu_fonte_olho_dagua_azul']   = \"\";\r\n";
echo "Tab_icon_fa_inactive['menu_fonte_olho_dagua_azul']   = \"\";\r\n";
echo "Tab_display['menu_fonte_olho_dagua_azul']   = \"\";\r\n";
echo "Tab_display_position['menu_fonte_olho_dagua_azul']   = \"\";\r\n";
echo "Tab_links['menu_fonte_olho_dagua_azul']   = \"\";\r\n";
         $seq++;
 if(isset($menu_fonte_olho_dagua_azul_menuData['data']) && !empty($menu_fonte_olho_dagua_azul_menuData['data']))
 {
   foreach ($menu_fonte_olho_dagua_azul_menuData['data'] as $ind => $dados_menu)
   {
     if ($dados_menu['link'] != "#")
     {
         if(empty($dados_menu['hint']))
         {
             $dados_menu['hint'] = $dados_menu['label'];
         }
         echo "Tab_iframes[" . $seq . "] = \"" . $dados_menu['id'] . "\";\r\n";
         echo "Tab_labels['" . $dados_menu['id'] . "'] = \"" . str_replace('"', '\"', $dados_menu['label']) . "\";\r\n";
         echo "Tab_hints['" . $dados_menu['id'] . "'] = \"" . strip_tags(str_replace('"', '\"', $dados_menu['hint'])) . "\";\r\n";
         echo "Tab_abas['" . $dados_menu['id'] . "']   = \"none\";\r\n";
         echo "Tab_refresh['" . $dados_menu['id'] . "']   = \"\";\r\n";
         echo "Tab_icons['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_aba'] . "\";\r\n";
         echo "Tab_icons_inactive['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_aba_inactive'] . "\";\r\n";
         echo "Tab_icon_fa['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_fa'] . "\";\r\n";
         echo "Tab_icon_fa_inactive['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_fa'] . "\";\r\n";
         echo "Tab_display['" . $dados_menu['id'] . "'] = \"" . $dados_menu['display'] . "\";\r\n";
         echo "Tab_display_position['" . $dados_menu['id'] . "'] = \"" . $dados_menu['display_position'] . "\";\r\n";
         echo "Tab_links['" . $dados_menu['id'] . "']   = \"\";\r\n";
         $seq++;
     }
   }
 }
 if(isset($menu_fonte_olho_dagua_azul_menuData['data_vertical']) && !empty($menu_fonte_olho_dagua_azul_menuData['data_vertical']))
 {
   foreach ($menu_fonte_olho_dagua_azul_menuData['data_vertical'] as $ind => $dados_menu)
   {
     if ($dados_menu['link'] != "#")
     {
         if(empty($dados_menu['hint']))
         {
             $dados_menu['hint'] = $dados_menu['label'];
         }
         echo "Tab_iframes[" . $seq . "] = \"" . $dados_menu['id'] . "\";\r\n";
         echo "Tab_labels['" . $dados_menu['id'] . "'] = \"" . str_replace('"', '\"', $dados_menu['label']) . "\";\r\n";
         echo "Tab_hints['" . $dados_menu['id'] . "'] = \"" . str_replace('"', '\"', $dados_menu['hint']) . "\";\r\n";
         echo "Tab_abas['" . $dados_menu['id'] . "']   = \"none\";\r\n";
         echo "Tab_refresh['" . $dados_menu['id'] . "']   = \"\";\r\n";
         echo "Tab_icons['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_aba'] . "\";\r\n";
         echo "Tab_icons_inactive['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_aba_inactive'] . "\";\r\n";
         echo "Tab_icon_fa['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_fa'] . "\";\r\n";
         echo "Tab_icon_fa_inactive['" . $dados_menu['id'] . "'] = \"" . $dados_menu['icon_fa'] . "\";\r\n";
         echo "Tab_display['" . $dados_menu['id'] . "'] = \"" . $dados_menu['display'] . "\";\r\n";
         echo "Tab_display_position['" . $dados_menu['id'] . "'] = \"" . $dados_menu['display_position'] . "\";\r\n";
         echo "Tab_links['" . $dados_menu['id'] . "']   = \"\";\r\n";
         $seq++;
     }
   }
 }
?>
Qtd_apls = <?php echo $seq ?>;
function createIframe(str_id, str_label, str_hint, str_img_on, str_img_off, str_link, tp_apl)
{
    apl_exist = false;
    Tab_icons[str_id] = str_img_on;
    Tab_icons_inactive[str_id] = str_img_off;
    Tab_refresh[str_id] = "";
    if (tp_apl == null || tp_apl == '')
    {
        tp_apl = 'others';
    }
    if (Tab_icons[str_id] == '')
    {
        Tab_icons[str_id] = Tab_ico_def[tp_apl];
    }
    if (Tab_icons_inactive[str_id] == '')
    {
        Tab_icons_inactive[str_id] = Tab_ico_ina_def[tp_apl];
    }
    for (i = 0; i < Qtd_apls; i++)
    {
        if (Tab_iframes[i] == str_id) {
            apl_exist = true;
        }
    }
    if (apl_exist)
    {
        if (Tab_abas[str_id] != 'show') {
            createAba(str_id);
        }
        var iframe = document.getElementById('iframe_' + str_id);
        iframe.src = str_link;
        mudaIframe(str_id);
        return;
    }
    var iframe = document.createElement('iframe');
    iframe.style.display = 'none';
    iframe.id = 'iframe_' + str_id;
    iframe.name = 'menu_fonte_olho_dagua_azul_' + str_id + '_iframe';
    iframe.src = str_link;
    $('#Iframe_control').append(iframe);
    $('#iframe_' + str_id).addClass( 'scMenuIframe');
    Tab_iframes[Qtd_apls] = str_id;
    Tab_labels[str_id] = str_label;
    Tab_hints[str_id] = str_hint;
    Tab_abas[str_id]   = 'none';
    Tab_links[str_id]   = '';
    Qtd_apls++;
    createAba(str_id);
    mudaIframe(str_id);
}
function createAba(str_id)
{
    var tmp = "";
    var html_icon = "";
        html_icon = "<div style='display:inline-block;'>";
        str_icon = Tab_icons[str_id];
        if(str_icon=='')
        {
            str_icon = 'scriptcase__NM__ico__NM__sc_menu_others_e.png';
        }
        if(str_icon != '')
        {
            html_icon += "<img id='aba_td_" + str_id + "_icon_active' src='<?php echo $this->path_botoes; ?>/"+ str_icon +"' align='absmiddle' class='scTabIcon'>";
        }
        str_icon = Tab_icons_inactive[str_id];
        if(str_icon=='')
        {
            str_icon = 'scriptcase__NM__ico__NM__sc_menu_others_d.png';
        }
        if(str_icon != '')
        {
            html_icon += "<img id='aba_td_" + str_id + "_icon_inactive' src='<?php echo $this->path_botoes; ?>/"+ str_icon +"' align='absmiddle' class='scTabIcon' style='display:none;'>";
        }
        html_icon += "</div>";
    if(Tab_display[ str_id ] == 'text_fontawesomeicon' || Tab_display[ str_id ] == 'only_fontawesomeicon')
    {
        html_icon = "<i id='aba_td_" + str_id + "_icon_active' class='"+ Tab_icon_fa[str_id] +"' style='vertical-align:middle;padding: 0px 4px; display:none;'></i>";
        html_icon += "<i id='aba_td_" + str_id + "_icon_inactive' class='"+ Tab_icon_fa_inactive[str_id] +"' style='vertical-align:middle;padding: 0px 4px;'></i>";
    }
    tmp  = "<li onclick=\"mudaIframe('" + str_id + "');\" id='aba_td_" + str_id + "' style='cursor:pointer' class='lslide scTabActive' title=\"" + Tab_hints[str_id] + "\">";
    if(Tab_display_position[ str_id ] != 'img_right')
    {
        tmp += html_icon;
    }
    var home_style="";
    if(str_id === 'menu_fonte_olho_dagua_azul'){ home_style=";padding-left:4px;min-height:14px;"; }
    tmp += "<div id='aba_td_txt_" + str_id + "' style='display:inline-block;cursor:pointer"+home_style+"' class='scTabText' >";
    tmp += Tab_labels[str_id];
    if(Tab_display_position[ str_id ] == 'img_right')
    {
        tmp += html_icon;
    }
    tmp += "</div>";
    tmp += "<div id='aba_td_3_" + str_id + "' style='display:none;'>...</div>";
if(str_id !== 'menu_fonte_olho_dagua_azul'){
    tmp += "<div style='display:inline-block;'>";
    tmp += "    <img id='aba_td_img_" + str_id + "' src='<?php echo $this->path_botoes . "/" . $this->css_menutab_active_close_icon; ?>' onclick=\"event.stopPropagation(); del_aba_td('" + str_id + "'); \" align='absmiddle' class='scTabCloseIcon' style='cursor:pointer; z-index:9999;'>";
    tmp += "</div>";
}
    tmp += "</li>";
    $('#contrl_abas').append(tmp);
    Tab_abas[str_id] = 'show';
}
function mudaIframe(str_id)
{
    $('#iframe_menu_fonte_olho_dagua_azul').hide();
    if (str_id == "")
    {
        $('#iframe_menu_fonte_olho_dagua_azul').show();
        $('#iframe_' + Aba_atual).prop('src', '');
        $('#links_abas').hide();
        $('#id_links_abas').hide();
    }
    else
    {
        $('#aba_td_' + Aba_atual).removeClass( 'scTabActive' );
        $('#aba_td_' + Aba_atual).addClass( 'scTabInactive' );
        $('#aba_td_' + Aba_atual+'_icon_active').hide();
        $('#aba_td_' + Aba_atual+'_icon_inactive').show();
        $('#aba_td_img_' + Aba_atual).prop( 'src', '<?php echo $this->path_botoes . "/" . $this->css_menutab_inactive_close_icon; ?>' );
    }
    for (i = 0; i < Tab_iframes.length; i++) 
    {
        if (Tab_iframes[i] == str_id) 
        {
            $('#iframe_' + Tab_iframes[i]).show();
            Aba_atual    = str_id;
            $('#aba_td_' + Aba_atual).removeClass( 'scTabInactive' );
            $('#aba_td_' + Aba_atual).addClass( 'scTabActive' );
            $('#aba_td_' + Aba_atual+'_icon_active').show();
            $('#aba_td_' + Aba_atual+'_icon_inactive').hide();
            $('#aba_td_img_' + Aba_atual).prop( 'src', '<?php echo $this->path_botoes . "/" . $this->css_menutab_active_close_icon; ?>' );
            if (Tab_iframes[i] != 'menu_fonte_olho_dagua_azul') 
            {
                Iframe_atual = "menu_fonte_olho_dagua_azul_" + Tab_iframes[i] + '_iframe';
            }
            $('#iframe_' + Tab_iframes[i]).contents().find('body').css('width', '');
            $('#iframe_' + Tab_iframes[i])[0].contentWindow.focus();
        } else {
            $('#iframe_' + Tab_iframes[i]).hide();
        }
    }
    if (Tab_refresh[str_id] == 'S' && typeof document.getElementById('iframe_' + str_id).contentWindow.nm_move === 'function')
    {
        Tab_refresh[str_id] = '';
        document.getElementById('iframe_' + str_id).contentWindow.nm_move('igual');
    }
}
function del_aba_td(str_id)
{
    if(str_id === 'menu_fonte_olho_dagua_azul') { return false; }
    $('#aba_td_' + str_id).remove();
    Tab_abas[str_id] = 'none';
    $('#iframe_' + str_id).prop('src', '');
    if (Aba_atual == str_id)
    {
        str_id = "";
        for (i = 0; i < Tab_iframes.length; i++) 
        {
            if (Tab_abas[Tab_iframes[i]] == 'show' && Tab_refresh[Tab_iframes[i]] == 'S')
            {
                str_id = Tab_iframes[i];
            }
        }
        if (str_id == "")
        {
            for (i = 0; i < Tab_iframes.length; i++) 
            {
                if (Tab_abas[Tab_iframes[i]] == 'show')
                {
                    str_id = Tab_iframes[i];
                }
            }
        }
        if (str_id == "" && Aba_atual != "menu_fonte_olho_dagua_azul")
        {
            document.getElementById('iframe_menu_fonte_olho_dagua_azul').click();
        }
        else
        {
            mudaIframe(str_id);
        }
    }
  scToggleOverflow();
}
$( document ).ready(function() { scToggleOverflow() });
function scToggleOverflow() {
  var width_offset = 0;
  if (is_menu_vertical === true) { width_offset = $('#idDivMenu').parent()[0].offsetWidth + 2; };
  if(width_offset == 0 && $('.scMenuTTable').length)
  {
      if($('.scMenuTTable').length > 2)
      {
          width_offset = $('.scMenuTTable').eq(1).parent()[0].offsetWidth + 2;
      }
      else
      {
          width_offset = $('.scMenuTTable').parent()[0].offsetWidth + 2;
      }
  }
  if( ($( window ).width() - width_offset) < 1)
  {
      width_offset = 0;
  }
  var hasOverflow, scrollElement;
  scrollElement = $('#div_contrl_abas')[0];
  if (scrollElement.offsetHeight < scrollElement.scrollHeight || scrollElement.offsetWidth < scrollElement.scrollWidth) {
      hasOverflow = true;
  } else {
      hasOverflow = false;
  }
  if (divOverflow === hasOverflow){ return false; }
  if (hasOverflow === true) {
      $('.scTabScroll').show();
      $('#div_contrl_abas').toggleClass('div-overflow');
  } else {
      $('.scTabScroll').hide();
      $('#div_contrl_abas').toggleClass('div-overflow');
  }
  divOverflow = hasOverflow;
}
function scTabScroll(axis) {
  if (axis == 'stop') {
      clearInterval(scScrollInterval);
      return;
  }
  if (axis == 'left') {
      scScrollInterval = setInterval("$('#div_contrl_abas').scrollLeft($('#div_contrl_abas').scrollLeft() - 3)", 2);
  } else {
      scScrollInterval = setInterval("$('#div_contrl_abas').scrollLeft($('#div_contrl_abas').scrollLeft() + 3)", 2);
  }
}
        function checkSubMenuPosition(str_id)
        {
            submenu = $('#' + str_id + '.menu__link').next('ul');
            if(submenu.length)
            {
                if(submenu.offset().left + submenu.outerWidth() > $('#main_menu_table').width())
                {
                    submenu.css('margin-left', ( $('#main_menu_table').width() - submenu.offset().left - submenu.outerWidth() - 10 ));
                }
           }
        }function openMenuItem(str_id)
{
  str_target_sv = "";
  if (str_id != "iframe_menu_fonte_olho_dagua_azul")
  {
      str_target_sv = str_id + "_iframe";
      str_id        = str_id.replace("menu_fonte_olho_dagua_azul_","");
  }
  if($('#' + str_id).parent().length)
  {
      if(!$('#' + str_id).parent().hasClass('menu__item--active'))
      {
        $('#' + str_id).closest('ul').find('li').removeClass('menu__item--active');
      }
       $('#' + str_id).parent().toggleClass('menu__item--active');
  }
  str_link   = $('#' + str_id).attr('item-href');
  str_target = $('#' + str_id).attr('item-target');
  if (typeof str_link !== typeof undefined && str_link !== false) {
    str_id = str_id.replace('iframe_menu_fonte_olho_dagua_azul', 'menu_fonte_olho_dagua_azul');
    if (str_target == "menu_fonte_olho_dagua_azul_iframe" && str_link != '' && str_link != '#' && str_link != 'javascript:')
    {
        str_target = (str_target_sv != "") ? str_target_sv : str_target;
        mudaIframe(str_id);
        $('#links_abas').css('display','');
        $('#id_links_abas').css('display','');
        if (Tab_abas[str_id] != 'show')
        {
            createAba(str_id);
      scToggleOverflow();
        }
    }
    //test link type
    if (str_link != '' && str_link != '#' && str_link != 'javascript:')
    {
        if (str_link.substring(0, 11) == 'javascript:')
        {
            eval(str_link.substring(11));
        }
        else if (str_link != '#' && str_target != '_parent')
        {
            window.open(str_link, str_target);
        }
        else if (str_link != '#' && str_target == '_parent')
        {
            document.location = str_link;
        }
        <?php
        if ($menu_mobile_hide == 'S' && $menu_mobile_hide_onclick == 'S')
        {
        ?>
            HideMenu();
        <?php
        }
        ?>
    }
    if(str_target != '_blank' && $('#iframe_menu_fonte_olho_dagua_azul').length)
        $('#iframe_menu_fonte_olho_dagua_azul')[0].contentWindow.focus();
  }
}
</script>

    <?php
    if(isset($expand_icon) && !empty($expand_icon) && isset($collapse_icon) && !empty($collapse_icon))
    {
      ?>
        <a href='#' onclick='expandMenu();' id='id_expand' class='scMenuExpand' style='z-index: 9999;'><img src='<?php echo $path_imag_cab . '/' . $expand_icon; ?>' border=0 /></a>
        <a href='#' onclick='collapseMenu();' id='id_collapse' class='scMenuCollapse' style='z-index: 9999;'><img src='<?php echo $path_imag_cab . '/' . $collapse_icon; ?>' border=0 /></a>
      <?php
    }
    ?>
<?php
$fixMainMenuPosition = ($this->force_mobile || ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])) ? '' : '; position: absolute';
?>
<table id="main_menu_table" <?php echo $strAlign; ?> style="border-collapse: collapse; border-width: 0px; height:100%; width: <?php echo $larg_table; ?><?php echo $fixMainMenuPosition; ?>" cellpadding=0 cellspacing=0>
  <tr class="scMenuHTableCssAlt" id='idMenuLine'>
      <td <?php echo $strAlign; ?> valign="top" class="scMenuLine" style="width:100%; height:30;padding: 0px;" id='idMenuCell'>
<div id="scScrollFix" style="height: 1px"></div>
<script type="text/javascript">
function fnScrollFix() {
 if($('#css3menu1 li').length > 0)
 {
     var txt = document.getElementById("scScrollFix").innerHTML;
     if ("&nbsp;" == txt) { txt = "&nbsp;&nbsp;"; } else { txt = "&nbsp;"; }
     document.getElementById("scScrollFix").innerHTML = txt;
 }
 setTimeout("fnScrollFix()", 1000);
}
setTimeout("fnScrollFix()", 1000);
</script>
<div id="idDivMenu">
<table style='width:100%'><tr><?php
echo $this->menu_fonte_olho_dagua_azul_escreveMenu($menu_fonte_olho_dagua_azul_menuData['data'], $path_imag_cab, $strAlign);
?></tr></table>
</div>
<?php
/* Controle de Iframe */
if ($menu_fonte_olho_dagua_azul_menuData['iframe'])
{
?>
    </td>
  </tr>
<?php echo $this->nm_show_toolbarmenu('', $saida_apl, $menu_fonte_olho_dagua_azul_menuData, $path_imag_cab); ?><?php echo $this->nm_gera_degrade(1, $bg_line_degrade, $path_imag_cab); ?>  <tr>
        <td id="links_abas" style="display: none;">
          <div id="id_links_abas" style="display: none;" class='scTabLine'>
            <div class='scTabScroll left' style='float:left;display:none;' onmousedown='scTabScroll("left");' onmouseup='scTabScroll("stop");' onmouseout='scTabScroll("stop");'></div>
            <div class='scTabScroll right' style='float:right;display:none;'onmousedown='scTabScroll("right");' onmouseup='scTabScroll("stop");' onmouseout='scTabScroll("stop");'></div>
            <div id='div_contrl_abas' class='scTabCtrl' style='overflow:hidden;white-space: nowrap;'>
              <ul id='contrl_abas' style='margin:0px; padding:0px;'></ul>
            </div>
          </div>
        </td>
        </tr><tr>
    <td id="Iframe_control_td" style="border-width: 1px; height: 100%; padding: 0px;vertical-align:top;text-align:center;">
    <div id="Iframe_control" style='width:100%; height:100%; margin:0px; padding:0px;'>
<?php
$link_default = "";
if (isset($_SESSION['scriptcase']['sc_apl_seg']['home_fonte_olho_dagua_azul_complet']) && $_SESSION['scriptcase']['sc_apl_seg']['home_fonte_olho_dagua_azul_complet'] == "on") 
{ 
    $SCR  = "";
    $link_default = " onclick=\"openMenuItem('iframe_menu_fonte_olho_dagua_azul');\" item-href=\"menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=menu_fonte_olho_dagua_azul&sc_apl_menu=home_fonte_olho_dagua_azul_complet&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . "\"  item-target=\"menu_fonte_olho_dagua_azul_iframe\"";
} 
else
{ 
    $SCR  = ($NM_scr_iframe != "" ? $NM_scr_iframe : "menu_fonte_olho_dagua_azul_pag_ini.php");
} 
?>
      <iframe id="iframe_menu_fonte_olho_dagua_azul" name="menu_fonte_olho_dagua_azul_iframe" frameborder="0" class="scMenuIframe" style="width: 100%; height: 100%;"  src="<?php echo $SCR; ?>" <?php echo $link_default ?>></iframe>
<?php
 foreach ($menu_fonte_olho_dagua_azul_menuData['data'] as $ind => $dados_menu)
 {
     if ($dados_menu['link'] != "#")
     {
         echo "      <iframe id=\"iframe_" . $dados_menu['id'] . "\" name= \"menu_fonte_olho_dagua_azul_" . $dados_menu['id'] . "_iframe\" frameborder=\"0\" class=\"scMenuIframe\" style=\"display: none;width: 100%; height: 100%;\" src=\"\"></iframe>
";
     }
 }
}
?></div></td>
  </tr>
  <tr>
    <td style="padding: 0px">
   <TABLE width="100%" class="scMenuHFooter">
    <TR align="center">
     <TD>
      <TABLE border="0" cellpadding="0" cellspacing="0" width="100%">
       <TR valign="middle">
        <TD align="left" class="scMenuHFooterFont">
           <?php echo "WebCase IoT??? 2020" ?>
        </TD>
        <TD style="font-size: 5px">
           &nbsp; &nbsp;
        </TD>
        <TD align="center" class="scMenuHFooterFont">
           
        </TD>
        <TD style="font-size: 5px">
           &nbsp; &nbsp;
        </TD>
        <TD align="right" class="scMenuHFooterFont">
           <?php echo "Vers??o 1.0.1" ?>
        </TD>
       </TR>
       <TR valign="middle">
        <TD align="left" class="scMenuHFooterFont">
           
        </TD>
        <TD style="font-size: 5px">
            &nbsp; &nbsp;
        </TD>
        <TD align="center" class="scMenuHFooterFont">
           
        </TD>
        <TD style="font-size: 5px">
           &nbsp; &nbsp;
        </TD>
        <TD align="right" class="scMenuHFooterFont">
           
        </TD>
       </TR>
       <TR valign="middle">
        <TD align="left" class="scMenuHFooterFont">
           
        </TD>
        <TD style="font-size: 5px">
           &nbsp; &nbsp;
        </TD>
        <TD align="center" class="scMenuHFooterFont">
           
        </TD>
        <TD style="font-size: 5px">
           &nbsp; &nbsp;
        </TD>
        <TD align="right" class="scMenuHFooterFont">
           
        </TD>
       </TR>
      </TABLE>
     </TD>
    </TR>
   </TABLE>    </td>
  </tr>
</table>
</body>
</html>
<?php

if (isset($link_default) && !empty($link_default))
{
    echo "<script>";
    echo "   document.getElementById('iframe_menu_fonte_olho_dagua_azul').click()";
    echo "</script>";
}

}

/* Controle de Target */
function menu_fonte_olho_dagua_azul_escreveMenu($arr_menu, $path_imag_cab = '', $strAlign = '')
{
    global $nm_data_fixa;
    $last      = '';
    $itemClass = ' topfirst';
    $subSize   = 2;
    $subCount  = array();
    $tabSpace  = 1;
    $intMult   = 2;
    $aMenuItemList = array();
    foreach ($arr_menu as $ind => $resto)
    {
        $aMenuItemList[] = $resto;
    }
?>
        <td class='sc-layer-16' style='width:1.67%;text-align:left;'>
            
        </td>        <td class='sc-layer-6' style='width:17.28%;text-align:left;'>
                        <span class='sc-layer-6-0' style='font-size: 3px;background-color: ;font-family: ;color: #000000;'>   <img src="<?php echo $path_imag_cab ?>/usr__NM__ico__NM__SC_webcaseiot 200x.png" border="0"/></span><br/>

        </td>        <td class='sc-layer-22' style='width:14.60%;text-align:left;'>
            
        </td>        <td class='sc-layer-18' style='width:33.58%;text-align:center;'>
                        <span class='sc-layer-18-0' style='font-size: 16px;background-color: ;font-family: ;color: #000000;'>   <img src="<?php echo $path_imag_cab ?>/usr__NM__ico__NM__SC_casePanel 300x.png" border="0"/></span><br/>

        </td>        <td class='sc-layer-21' style='width:14.76%;text-align:left;'>
            
        </td><td <?php echo $strAlign; ?>>
  <div class='mainmenu menu--horizontal'>
      <div class='menu__toggle'>
          <span></span>
          <span></span>
          <span></span>
      </div>
      <div class='menu__container'>
        <ul id="css3menu1" class="topmenu menu__list" style="">
        <?php
            for ($i = 0; $i < sizeof($aMenuItemList); $i++) {
                if (0 == $aMenuItemList[$i]['level']) {
                    $last = $aMenuItemList[$i]['id'];
                }
            }
            for ($i = 0; $i < sizeof($aMenuItemList); $i++) {
                if ($last == $aMenuItemList[$i]['id']) {
                    $itemClass = ' toplast';
                }
                $htmlClass = '';
                $hasChildrens = false;
                if ($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] < $aMenuItemList[$i + 1]['level']) {
                    $hasChildrens = true;
                }
                if (0 == $aMenuItemList[$i]['level']) {
                    $htmlClass = 'topmenu' . $itemClass;
                    if ($hasChildrens) {
                        $htmlClass .= ' toproot';
                    }
                }
                else
                {
                    $htmlClass .= ' menu__item--withsubmenu';
                }
                ?>
                <li class='menu__item <?php echo $htmlClass; ?>'>
                <?php
                if ('' != $aMenuItemList[$i]['icon'] && file_exists($this->path_imag_apl . "/" . $aMenuItemList[$i]['icon'])) {
                    $iconHtml = '../_lib/img/' . $aMenuItemList[$i]['icon'];
                }
                else {
                    $iconHtml = '';
                }
                $sDisabledClass = '';
                if ('Y' == $aMenuItemList[$i]['disabled']) {
                    $aMenuItemList[$i]['link']   = '#';
                    $aMenuItemList[$i]['target'] = '';
                    $sDisabledClass               = 0 == $aMenuItemList[$i]['level'] ? ' scdisabledmain' : ' scdisabledsub';
                }
                if (empty($aMenuItemList[$i]['link'])) {
                    $aMenuItemList[$i]['link']   = '#';
                }
                $str_item = "<i class='menu__icon fas'></i>";
                if ($hasChildrens) {
                    $str_item .= "<span>";
                }
                if($aMenuItemList[$i]['display'] == 'only_img' && $iconHtml != '')
                {
                    $str_item .= '<img src=' . $iconHtml . ' border="0" />';
                }
                elseif($aMenuItemList[$i]['display'] == 'text_img' || empty($aMenuItemList[$i]['display']))
                {
                    $str_image = '';
                    $str_image_right = '';
                    if($iconHtml != '')
                    {
                        $str_image = '<img src="' . $iconHtml . '" border="0" />';
                        $str_image_right = '<img src="' . $iconHtml . '" border="0" style="margin-left: 10px; margin-right: 0px;" />';
                    }
                    if($aMenuItemList[$i]['display_position'] != 'img_right')
                    {
                        $str_item .= $str_image . $aMenuItemList[$i]['label'];
                    }
                    else
                    {
                        $str_item .= $aMenuItemList[$i]['label'] . $str_image_right;
                    }
                }
                elseif($aMenuItemList[$i]['display'] == 'only_fontawesomeicon')
                {
                    $str_item .= "<i class='icon_fa menu__icon ". $aMenuItemList[$i]['icon_fa'] ."'></i>";
                }
                elseif($aMenuItemList[$i]['display'] == 'text_fontawesomeicon')
                {
                    if($aMenuItemList[$i]['display_position'] != 'img_right')
                    {
                        $str_item .= "<i class='icon_fa ". $aMenuItemList[$i]['icon_fa'] ."'></i> ". $aMenuItemList[$i]['label'] ."";
                    }
                    else
                    {
                        $str_item .= $aMenuItemList[$i]['label'] ." <i class='icon_fa ". $aMenuItemList[$i]['icon_fa'] ."'></i>";
                    }
                }
                else
                {
                    $str_item .= $aMenuItemList[$i]['label'];
                }
                if ($hasChildrens) {
                    $str_item .= "</span>";
                }
                ?>
                    <a href="javascript:" onclick="openMenuItem('menu_fonte_olho_dagua_azul_<?php echo $aMenuItemList[$i]['id']; ?>');" item-href="<?php echo $aMenuItemList[$i]['link']; ?>" id="<?php echo $aMenuItemList[$i]['id']; ?>" title="<?php echo $aMenuItemList[$i]['hint']; ?>" <?php echo $aMenuItemList[$i]['target']; ?> class='menu__link <?php echo $sDisabledClass; ?>'><?php echo $str_item; ?></a>
                <?php
                if ($hasChildrens) {
                ?>
                    <ul class='menu__submenu' style=''>
                    <?php
                }
                else {
                ?>
                <?php
                }
                if (($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] == $aMenuItemList[$i + 1]['level']) || 
                    ($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > $aMenuItemList[$i + 1]['level']) ||
                    (!$aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > 0) ||
                    (!$aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] == 0)) {
                    ?>
                    <?php echo str_repeat(' ', $tabSpace * $intMult); ?></li>
                    <?php
                    if (0 != $subSize && 0 < $aMenuItemList[$i]['level']) {
                        if (!isset($subCount[ $aMenuItemList[$i]['level'] ])) {
                            $subCount[ $aMenuItemList[$i]['level'] ] = 0;
                        }
                        $subCount[ $aMenuItemList[$i]['level'] ]++;
                    }
                    if ($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > $aMenuItemList[$i + 1]['level']) {
                        for ($j = 0; $j < $aMenuItemList[$i]['level'] - $aMenuItemList[$i + 1]['level']; $j++) {
                            unset($subCount[ $aMenuItemList[$i]['level'] - $j]);
                            ?>
                            </ul>
                            </li>
                            <?php
                        }
                    }
                    elseif (!$aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > 0) {
                        for ($j = 0; $j < $aMenuItemList[$i]['level']; $j++) {
                            unset($subCount[ $aMenuItemList[$i]['level'] - $j]);
                            ?>
                            </ul>
                            </li>
                            <?php
                        }
                    }
                    if ($subSize == $subCount[ $aMenuItemList[$i]['level'] ]) {
                        $subCount[ $aMenuItemList[$i]['level'] ] = 0;
                    }
                }
                $itemClass = '';
            }
        ?>
        </ul>
      </div>
  </div>
</td>
<?php
}
function menu_fonte_olho_dagua_azul_target($str_target)
{
    global $menu_fonte_olho_dagua_azul_menuData;
    if ('_blank' == $str_target)
    {
        return '_blank';
    }
    elseif ('_parent' == $str_target)
    {
        return '_parent';
    }
    elseif ($menu_fonte_olho_dagua_azul_menuData['iframe'])
    {
        return 'menu_fonte_olho_dagua_azul_iframe';
    }
    else
    {
        return $str_target;
    }
}

function nm_show_toolbarmenu($col_span, $saida_apl, $menu_fonte_olho_dagua_azul_menuData, $path_imag_cab)
{
}

   function nm_prot_aspas($str_item)
   {
       return str_replace('"', '\"', $str_item);
   }

   function nm_gera_menus(&$str_line_ret, $arr_menu_usu, $int_level, $nome_aplicacao)
   {
       global $menu_fonte_olho_dagua_azul_menuData; 
       foreach ($arr_menu_usu as $arr_item)
       {
           $str_line   = array();
           $str_line['label']    = $this->nm_prot_aspas($arr_item['label']);
           $str_line['level']    = $int_level - 1;
           $str_line['link']     = "";
           $nome_apl = $arr_item['link'];
           $pos = strrpos($nome_apl, "/");
           if ($pos !== false)
           {
               $nome_apl = substr($nome_apl, $pos + 1);
           }
           if ('' != $arr_item['link'])
           {
               if ($arr_item['target'] == '_parent')
               {
                    $str_line['link'] = "menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=" . $arr_item['id'] . "&sc_apl_menu=" . $nome_apl . "&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . ""; 
               }
               else
               {
                    $str_line['link'] = "menu_fonte_olho_dagua_azul_form_php.php?sc_item_menu=" . $arr_item['id'] . "&sc_apl_menu=" . $nome_apl . "&sc_apl_link=" . urlencode($menu_fonte_olho_dagua_azul_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_usa_grupo'] . ""; 
               }
           }
           elseif ($arr_item['target'] == '_parent')
           {
           }
           $str_line['hint']     = ('' != $arr_item['hint']) ? $this->nm_prot_aspas($arr_item['hint']) : '';
           $str_line['id']       = $arr_item['id'];
           $str_line['icon']     = ('' != $arr_item['icon_on']) ? $arr_item['icon_on'] : '';
           $str_line['icon_aba'] = (isset($arr_item['icon_aba']) && '' != $arr_item['icon_aba']) ? $arr_item['icon_aba'] : '';
           $str_line['icon_aba_inactive'] = (isset($arr_item['icon_aba_inactive']) && '' != $arr_item['icon_aba_inactive']) ? $arr_item['icon_aba_inactive'] : '';
           $str_line['display'] = (isset($arr_item['display'])) ? $arr_item['display'] : 'text_img';
           $str_line['display_position'] = (isset($arr_item['display_position'])) ? $arr_item['display_position'] : 'text_right';
           $str_line['icon_fa'] = (isset($arr_item['icon_fa'])) ? $arr_item['icon_fa'] : '';
           $str_line['icon_color'] = (isset($arr_item['icon_color'])) ? $arr_item['icon_color'] : '';
           $str_line['icon_color_hover'] = (isset($arr_item['icon_color_hover'])) ? $arr_item['icon_color_hover'] : '';
           $str_line['icon_color_disabled'] = (isset($arr_item['icon_color_disabled'])) ? $arr_item['icon_color_disabled'] : '';
           if ('' == $arr_item['link'] && $arr_item['target'] == '_parent')
           {
               $str_line['target'] = '_parent';
           }
           else
           {
                $str_line['target'] = ('' != $arr_item['target'] && '' != $arr_item['link']) ?  $this->menu_fonte_olho_dagua_azul_target( $arr_item['target']) : "_self"; 
           }
           $str_line['target']   = ' item-target="' . $str_line['target']  . '" ';
           $str_line['sc_id']    = $arr_item['id'];
           $str_line['disabled'] = "N";
           $str_line_ret[] = $str_line;
           if (!empty($arr_item['menu_itens']))
           {
               $this->nm_gera_menus($str_line_ret, $arr_item['menu_itens'], $int_level + 1, $nome_aplicacao);
           }
       }
   }

   function nm_arr_menu_recursiv($arr, $id_pai = '')
   {
         $arr_return = array();
         foreach ($arr as $id_menu => $arr_menu)
         {
             if ($id_pai == $arr_menu['pai']) 
             {
                 $arr_return[] = array('label'      => $arr_menu['label'],
                                        'link'       => $arr_menu['link'],
                                        'target'     => $arr_menu['target'],
                                        'icon_on'    => $arr_menu['icon'],
                                        'icon_aba'   => $arr_menu['icon_aba'],
                                        'icon_aba_inactive'   => $arr_menu['icon_aba_inactive'],
                                        'hint'       => $arr_menu['hint'],
                                        'id'         => $id_menu,
                                        'menu_itens' => $this->nm_arr_menu_recursiv($arr, $id_menu),
                                        'display'      => $arr_menu['display'],
                                        'display_position' => $arr_menu['display_position'],
                                        'icon_fa'      => $arr_menu['icon_fa'],
                                        'icon_color'      => $arr_menu['icon_color'],
                                        'icon_color_hover'      => $arr_menu['icon_color_hover'],
                                        'icon_color_disabled'      => $arr_menu['icon_color_disabled'],
                                        );
             }
         }
         return $arr_return;
   }
   //1 horizontal
   //2 vertical
   function nm_gera_degrade($menu_opc, $bg_line_degrade, $path_imag_cab)
   {
       $str_retorno = "";
       //have bg color degrade
       if(!empty($bg_line_degrade) && count($bg_line_degrade)>0)
       {
           if($menu_opc == 1)
           {
               foreach($bg_line_degrade as $bg_color)
               {
                   if(!empty($bg_color))
                   {
                       $str_retorno .= "<tr style=\"height:1px; padding: 0px;\">\r\n";
                       $str_retorno .= "  <td style=\"height:1px; padding: 0px;\" bgcolor=\"". $bg_color ."\"><img src='". $path_imag_cab ."/transparent.png' border=\"0\" style=\"height:1px;\"></td>\r\n";
                       $str_retorno .= "</tr>\r\n";
                   }
               }
           }
           elseif($menu_opc == 2)
           {
               foreach($bg_line_degrade as $bg_color)
               {
                   if(!empty($bg_color))
                   {
                       $str_retorno .= "<td style=\"width:1px; padding: 0px;\" bgcolor=\"". $bg_color ."\">\r\n";
                       $str_retorno .= "<img src='" . $path_imag_cab . "/transparent.png' border=\"0\" style=\"width:1px;\">\r\n";
                       $str_retorno .= "</td>\r\n";
                   }
               }
           }
       }
       return $str_retorno;
   }
   function Gera_sc_init($apl_menu)
   {
        $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['sc_init'][$apl_menu] = rand(2, 10000);
        $_SESSION['sc_session'][$_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['sc_init'][$apl_menu]] = array();
        return  $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['sc_init'][$apl_menu];
   }
function sc_logged($user, $ip = '')
	{
$_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['contr_erro'] = 'on';
  
		$str_sql = "SELECT date_login, ip FROM sec_usuarioslogged WHERE login = ". $this->Db->qstr($user) ." AND sc_session <> ".$this->Db->qstr('_SC_FAIL_SC_');

		 
      $nm_select = $str_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->data = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->data = false;
          $this->data_erro = $this->Db->ErrorMsg();
      } 
;

		if($this->data  === FALSE || !isset($this->data->fields[0]))
		{
            $ip = ($ip == '') ? $_SERVER['REMOTE_ADDR'] : $ip;
			$this->sc_logged_in($user, $ip);
			return true;
		}
		else
		{
            if (isset($_SESSION['scriptcase']['sc_apl_conf']['app_logged']))
{
unset($_SESSION['scriptcase']['sc_apl_conf']['app_logged']);
}
;
            $_SESSION['scriptcase']['sc_apl_seg']['app_logged'] = "on";;
			 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . "" . SC_dir_app_name('app_logged') . "/", "menu_fonte_olho_dagua_azul_form_php.php", "user?#?" . NM_encode_input($user) . "?@?","_self", 440, 630);
 };
			return false;
		}
$_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['contr_erro'] = 'off';
}
function sc_verify_logged()
	{
$_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['contr_erro'] = 'on';
if (!isset($_SESSION['logged_date_login'])) {$_SESSION['logged_date_login'] = "";}
if (!isset($this->sc_temp_logged_date_login)) {$this->sc_temp_logged_date_login = (isset($_SESSION['logged_date_login'])) ? $_SESSION['logged_date_login'] : "";}
if (!isset($_SESSION['logged_user'])) {$_SESSION['logged_user'] = "";}
if (!isset($this->sc_temp_logged_user)) {$this->sc_temp_logged_user = (isset($_SESSION['logged_user'])) ? $_SESSION['logged_user'] : "";}
  
		$str_sql = "SELECT count(*) FROM sec_usuarioslogged WHERE login = ". $this->Db->qstr($this->sc_temp_logged_user) . " AND date_login = ". $this->Db->qstr($this->sc_temp_logged_date_login) ." AND sc_session <> ".$this->Db->qstr('_SC_FAIL_SC_');
		 
      $nm_select = $str_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs_logged = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->rs_logged[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs_logged = false;
          $this->rs_logged_erro = $this->Db->ErrorMsg();
      } 
;
		if($this->rs_logged[0][0] != 1)
		{
			 if (isset($this->sc_temp_logged_user)) {$_SESSION['logged_user'] = $this->sc_temp_logged_user;}
 if (isset($this->sc_temp_logged_date_login)) {$_SESSION['logged_date_login'] = $this->sc_temp_logged_date_login;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($_SESSION['scriptcase']['sc_apl_menu_link'] . $this->tab_grupo[0] . "" . SC_dir_app_name('app_Login') . "/", "menu_fonte_olho_dagua_azul_form_php.php", "","_parent", 440, 630);
 };
		}
if (isset($this->sc_temp_logged_user)) {$_SESSION['logged_user'] = $this->sc_temp_logged_user;}
if (isset($this->sc_temp_logged_date_login)) {$_SESSION['logged_date_login'] = $this->sc_temp_logged_date_login;}
$_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['contr_erro'] = 'off';
}
function sc_logged_in($user, $ip = '')
	{
$_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['contr_erro'] = 'on';
if (!isset($_SESSION['logged_date_login'])) {$_SESSION['logged_date_login'] = "";}
if (!isset($this->sc_temp_logged_date_login)) {$this->sc_temp_logged_date_login = (isset($_SESSION['logged_date_login'])) ? $_SESSION['logged_date_login'] : "";}
if (!isset($_SESSION['logged_user'])) {$_SESSION['logged_user'] = "";}
if (!isset($this->sc_temp_logged_user)) {$this->sc_temp_logged_user = (isset($_SESSION['logged_user'])) ? $_SESSION['logged_user'] : "";}
  
        $ip = ($ip == '') ? $_SERVER['REMOTE_ADDR'] : $ip;
		$this->sc_temp_logged_user = $user;
		$this->sc_temp_logged_date_login = microtime(true);

        $str_sql = "DELETE FROM sec_usuarioslogged WHERE login = ". $this->Db->qstr($user) . " AND sc_session = ".$this->Db->qstr('_SC_FAIL_SC_')." AND ip = ".$this->Db->qstr($ip);
        
     $nm_select = $str_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             echo $this->Nm_lang['lang_errm_dber'] . ": " . $this->Db->ErrorMsg();
             echo "<br>APL: menu_fonte_olho_dagua_azul";
             echo "<br>Line: " . __LINE__;
             if ($sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

    	$str_sql = "INSERT INTO sec_usuarioslogged(login, date_login, sc_session, ip) VALUES (". $this->Db->qstr($user) .", ". $this->Db->qstr($this->sc_temp_logged_date_login) .", ". $this->Db->qstr(session_id()) .", ". $this->Db->qstr($ip) .")";
	    
     $nm_select = $str_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             echo $this->Nm_lang['lang_errm_dber'] . ": " . $this->Db->ErrorMsg();
             echo "<br>APL: menu_fonte_olho_dagua_azul";
             echo "<br>Line: " . __LINE__;
             if ($sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
if (isset($this->sc_temp_logged_user)) {$_SESSION['logged_user'] = $this->sc_temp_logged_user;}
if (isset($this->sc_temp_logged_date_login)) {$_SESSION['logged_date_login'] = $this->sc_temp_logged_date_login;}
$_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['contr_erro'] = 'off';
}
function sc_logged_in_fail($user, $ip = '')
    {
$_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['contr_erro'] = 'on';
  
        $ip = ($ip == '') ? $_SERVER['REMOTE_ADDR'] : $ip;
        $user = $this->Db->qstr($user);
        $str_sql = "INSERT INTO sec_usuarioslogged(login, date_login, sc_session, ip) VALUES (" . $this->Db->qstr($user) . ", " . $this->Db->qstr(microtime(true)) . ", ". $this->Db->qstr('_SC_FAIL_SC_').", " . $this->Db->qstr($ip) . ")";
        
     $nm_select = $str_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             echo $this->Nm_lang['lang_errm_dber'] . ": " . $this->Db->ErrorMsg();
             echo "<br>APL: menu_fonte_olho_dagua_azul";
             echo "<br>Line: " . __LINE__;
             if ($sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
        return true;
$_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['contr_erro'] = 'off';
}
function sc_logged_is_blocked($ip = '')
    {
$_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['contr_erro'] = 'on';
  
        $ip = ($ip == '') ? $_SERVER['REMOTE_ADDR'] : $ip;
        $minutes_ago = strtotime("-10 minutes");
        $str_select = "SELECT count(*) FROM sec_usuarioslogged WHERE sc_session = ".$this->Db->qstr('_SC_BLOCKED_SC_')." AND ip = ".$this->Db->qstr($ip)." AND date_login > ". $this->Db->qstr($minutes_ago);
         
      $nm_select = $str_select; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs_logged = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->rs_logged[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs_logged = false;
          $this->rs_logged_erro = $this->Db->ErrorMsg();
      } 
;
        if($this->rs_logged  !== FALSE && $this->rs_logged[0][0] == 1)
        {
            $message = $this->Nm_lang['lang_user_blocked'];
                $message = sprintf($message, 10);
                
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $message;
;
                return true;
        }

        $str_select = "SELECT count(*) FROM sec_usuarioslogged WHERE sc_session = ".$this->Db->qstr('_SC_FAIL_SC_')." AND ip = ".$this->Db->qstr($ip)." AND date_login > ". $this->Db->qstr($minutes_ago);
         
      $nm_select = $str_select; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs_logged = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->rs_logged[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs_logged = false;
          $this->rs_logged_erro = $this->Db->ErrorMsg();
      } 
;

        if($this->rs_logged  !== FALSE && $this->rs_logged[0][0] == 10)
        {
            $str_sql = "INSERT INTO sec_usuarioslogged(login, date_login, sc_session, ip) VALUES (".$this->Db->qstr('blocked').", ". $this->Db->qstr(microtime(true)) .", ".$this->Db->qstr('_SC_BLOCKED_SC_'). ", ". $this->Db->qstr($ip) .")";
            
     $nm_select = $str_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             echo $this->Nm_lang['lang_errm_dber'] . ": " . $this->Db->ErrorMsg();
             echo "<br>APL: menu_fonte_olho_dagua_azul";
             echo "<br>Line: " . __LINE__;
             if ($sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
            $message = $this->Nm_lang['lang_user_blocked'];
                $message = sprintf($message, 10);
                
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $message;
;
                return true;
        }
        return false;
$_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['contr_erro'] = 'off';
}
function sc_logged_out($user, $date_login = '')
	{
$_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['contr_erro'] = 'on';
if (!isset($_SESSION['logged_user'])) {$_SESSION['logged_user'] = "";}
if (!isset($this->sc_temp_logged_user)) {$this->sc_temp_logged_user = (isset($_SESSION['logged_user'])) ? $_SESSION['logged_user'] : "";}
if (!isset($_SESSION['logged_date_login'])) {$_SESSION['logged_date_login'] = "";}
if (!isset($this->sc_temp_logged_date_login)) {$this->sc_temp_logged_date_login = (isset($_SESSION['logged_date_login'])) ? $_SESSION['logged_date_login'] : "";}
  
		$date_login = ($date_login == '' ? "" : " AND date_login = ". $this->Db->qstr($date_login) ."");

		$str_sql = "SELECT sc_session FROM sec_usuarioslogged WHERE login = ". $this->Db->qstr($user) ." ". $date_login . " AND sc_session <> ".$this->Db->qstr('_SC_FAIL_SC_');
		 
      $nm_select = $str_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->data = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->data[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->data = false;
          $this->data_erro = $this->Db->ErrorMsg();
      } 
;
		if(isset($this->data[0][0]) && !empty($this->data[0][0]))
        {
			$session_bkp = $_SESSION;
			$sessionid = session_id();
			session_write_close();

			session_id($this->data[0][0]);
			session_start();
			$_SESSION['logged_user'] = 'logout';
			session_write_close();

			session_id($sessionid);
			session_start();
			$_SESSION = $session_bkp;
		}


		$str_sql = "DELETE FROM sec_usuarioslogged WHERE login = ". $this->Db->qstr($user) . " " . $date_login;
		
     $nm_select = $str_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             echo $this->Nm_lang['lang_errm_dber'] . ": " . $this->Db->ErrorMsg();
             echo "<br>APL: menu_fonte_olho_dagua_azul";
             echo "<br>Line: " . __LINE__;
             if ($sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
		 unset($_SESSION['logged_date_login']);
 unset($this->sc_temp_logged_date_login);
 unset($_SESSION['logged_user']);
 unset($this->sc_temp_logged_user);
;
if (isset($this->sc_temp_logged_date_login)) {$_SESSION['logged_date_login'] = $this->sc_temp_logged_date_login;}
if (isset($this->sc_temp_logged_user)) {$_SESSION['logged_user'] = $this->sc_temp_logged_user;}
$_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['contr_erro'] = 'off';
}
function sc_looged_check_logout()
    {
$_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['contr_erro'] = 'on';
if (!isset($_SESSION['usr_email'])) {$_SESSION['usr_email'] = "";}
if (!isset($this->sc_temp_usr_email)) {$this->sc_temp_usr_email = (isset($_SESSION['usr_email'])) ? $_SESSION['usr_email'] : "";}
if (!isset($_SESSION['logged_date_login'])) {$_SESSION['logged_date_login'] = "";}
if (!isset($this->sc_temp_logged_date_login)) {$this->sc_temp_logged_date_login = (isset($_SESSION['logged_date_login'])) ? $_SESSION['logged_date_login'] : "";}
if (!isset($_SESSION['logged_user'])) {$_SESSION['logged_user'] = "";}
if (!isset($this->sc_temp_logged_user)) {$this->sc_temp_logged_user = (isset($_SESSION['logged_user'])) ? $_SESSION['logged_user'] : "";}
if (!isset($_SESSION['usr_login'])) {$_SESSION['usr_login'] = "";}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
  
        if(isset($this->sc_temp_logged_user) && ($this->sc_temp_logged_user == 'logout' || empty($this->sc_temp_logged_user)))
        {
             unset($_SESSION['usr_login']);
 unset($this->sc_temp_usr_login);
 unset($_SESSION['logged_user']);
 unset($this->sc_temp_logged_user);
 unset($_SESSION['logged_date_login']);
 unset($this->sc_temp_logged_date_login);
 unset($_SESSION['usr_email']);
 unset($this->sc_temp_usr_email);
;
        }
if (isset($this->sc_temp_usr_login)) {$_SESSION['usr_login'] = $this->sc_temp_usr_login;}
if (isset($this->sc_temp_logged_user)) {$_SESSION['logged_user'] = $this->sc_temp_logged_user;}
if (isset($this->sc_temp_logged_date_login)) {$_SESSION['logged_date_login'] = $this->sc_temp_logged_date_login;}
if (isset($this->sc_temp_usr_email)) {$_SESSION['usr_email'] = $this->sc_temp_usr_email;}
$_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['contr_erro'] = 'off';
}
   function nmgp_redireciona_form($nm_apl_dest, $nm_apl_retorno, $nm_apl_parms, $nm_target="", $alt_modal=0, $larg_modal=0)
   {
      global  $menu_fonte_olho_dagua_azul_menuData;
      if (is_array($nm_apl_parms))
      {
          $tmp_parms = "";
          foreach ($nm_apl_parms as $par => $val)
          {
              $par = trim($par);
              $val = trim($val);
              $tmp_parms .= str_replace(".", "_", $par) . "?#?";
              if (substr($val, 0, 1) == "$")
              {
                  $tmp_parms .= $$val;
              }
              elseif (substr($val, 0, 1) == "{")
              {
                  $val        = substr($val, 1, -1);
                  $tmp_parms .= $this->$val;
              }
              elseif (substr($val, 0, 1) == "[")
              {
                  $tmp_parms .= $_SESSION['sc_session'][1]['menu_fonte_olho_dagua_azul'][substr($val, 1, -1)];
              }
              else
              {
                  $tmp_parms .= $val;
              }
              $tmp_parms .= "?@?";
          }
          $nm_apl_parms = $tmp_parms;
      }
      $nm_apl_retorno = $_SERVER['PHP_SELF'];
      $nm_apl_retorno = str_replace("\\", '/', $nm_apl_retorno);
      $nm_apl_retorno = str_replace('//', '/', $nm_apl_retorno);
      $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
      if (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../" || strtolower(substr($nm_apl_dest, 0, 1)) == "/")
      {
          echo "<SCRIPT type=\"text/javascript\">";
          if (strtolower($nm_target) == "_blank")
          {
              echo "window.open ('" . $nm_apl_dest . "');";
          }
          else
          {
              echo "window.location='" . $nm_apl_dest . "';";
          }
          echo "</SCRIPT>";
          exit;
      }
      $dir = explode("/", $nm_apl_dest);
      if (count($dir) == 1)
      {
          $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
          $nm_apl_dest = $menu_fonte_olho_dagua_azul_menuData['url']['link'] . $this->tab_grupo[0] .$nm_apl_dest . "/" . $nm_apl_dest . ".php";
      }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

      <HTML>
      <HEAD>
       <META http-equiv="Content-Type" content="text/html; charset=UTF-8" />
       <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
       <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
       <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
       <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
       <META http-equiv="Pragma" content="no-cache"/>
      </HEAD>
      <BODY>
      <form name="Fredir" method="post" 
                            target="_self"> 
        <input type="hidden" name="nmgp_parms" value="<?php echo NM_encode_input($nm_apl_parms) ?>"/>
<?php
   if ($nm_target == "_blank")
   {
?>
         <input type="hidden" name="nmgp_outra_jan" value="true"/> 
<?php
   }
   else
   {
?>
        <input type="hidden" name="nmgp_url_saida" value="<?php echo NM_encode_input($nm_apl_retorno) ?>">
        <input type="hidden" name="script_case_init" value="1"/> 
<?php
   }
?>
      </form> 
      <SCRIPT type="text/javascript">
          window.onload = function(){
             submit_Fredir();
          };
          function submit_Fredir()
          {
              document.Fredir.target = "<?php echo $nm_target_form ?>"; 
              document.Fredir.action = "<?php echo $nm_apl_dest ?>";
              document.Fredir.submit();
          }
      </SCRIPT>
      </BODY>
      </HTML>
<?php
     if ($nm_target != "_blank")
     {
         exit;
     }
   }
   function regionalDefault()
   {
       $_SESSION['scriptcase']['reg_conf']['date_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_format'] : "ddmmyyyy";
       $_SESSION['scriptcase']['reg_conf']['date_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_sep'] : "/";
       $_SESSION['scriptcase']['reg_conf']['date_week_ini'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema'] : "SU";
       $_SESSION['scriptcase']['reg_conf']['time_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_format'] : "hhiiss";
       $_SESSION['scriptcase']['reg_conf']['time_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_sep'] : ":";
       $_SESSION['scriptcase']['reg_conf']['time_pos_ampm'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm'] : "right_without_space";
       $_SESSION['scriptcase']['reg_conf']['time_simb_am']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am'] : "am";
       $_SESSION['scriptcase']['reg_conf']['time_simb_pm']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm'] : "pm";
       $_SESSION['scriptcase']['reg_conf']['simb_neg']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg'] : "-";
       $_SESSION['scriptcase']['reg_conf']['grup_num']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr'] : ".";
       $_SESSION['scriptcase']['reg_conf']['dec_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec'] : ",";
       $_SESSION['scriptcase']['reg_conf']['neg_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg'] : 2;
       $_SESSION['scriptcase']['reg_conf']['monet_simb']    = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo'] : "R$";
       $_SESSION['scriptcase']['reg_conf']['monet_f_pos']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'] : 3;
       $_SESSION['scriptcase']['reg_conf']['monet_f_neg']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'] : 13;
       $_SESSION['scriptcase']['reg_conf']['grup_val']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr'] : ".";
       $_SESSION['scriptcase']['reg_conf']['dec_val']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec'] : ",";
       $_SESSION['scriptcase']['reg_conf']['html_dir']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  " DIR='" . $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] . "'" : "";
       $_SESSION['scriptcase']['reg_conf']['css_dir']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] : "LTR";
       $_SESSION['scriptcase']['reg_conf']['html_dir_only'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] : "";
       $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit'] : "1";
       $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'] : "1";
   }

}
if (isset($_POST['nmgp_start'])) {$nmgp_start = $_POST['nmgp_start'];} 
if (isset($_GET['nmgp_start']))  {$nmgp_start = $_GET['nmgp_start'];} 
$Sem_Session = (!isset($_SESSION['sc_session'])) ? true : false;
$_SESSION['scriptcase']['sem_session'] = false;
if (!isset($_SERVER['HTTP_REFERER']) || (!isset($nmgp_parms) && !isset($script_case_init) && !isset($nmgp_start) ))
{
    $Sem_Session = false;
}
$NM_dir_atual = getcwd();
if (empty($NM_dir_atual)) {
    $str_path_sys  = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
    $str_path_sys  = str_replace("\\", '/', $str_path_sys);
}
else {
    $sc_nm_arquivo = explode("/", $_SERVER['PHP_SELF']);
    $str_path_sys  = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
}
$str_path_web    = $_SERVER['PHP_SELF'];
$str_path_web    = str_replace("\\", '/', $str_path_web);
$str_path_web    = str_replace('//', '/', $str_path_web);
$path_aplicacao  = substr($str_path_web, 0, strrpos($str_path_web, '/'));
$path_aplicacao  = substr($path_aplicacao, 0, strrpos($path_aplicacao, '/'));
$root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
if ($Sem_Session && (!isset($nmgp_start) || $nmgp_start != "SC")) {
    if (isset($_COOKIE['sc_apl_default_Web_Case_IoT_V_1_12'])) {
        $apl_def = explode(",", $_COOKIE['sc_apl_default_Web_Case_IoT_V_1_12']);
    }
    elseif (is_file($root . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_path_imag_temp'] . "/sc_apl_default_Web_Case_IoT_V_1_12.txt")) {
        $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['glo_nm_path_imag_temp'] . "/sc_apl_default_Web_Case_IoT_V_1_12.txt"));
    }
    if (isset($apl_def)) {
        if ($apl_def[0] != "menu_fonte_olho_dagua_azul") {
            $_SESSION['scriptcase']['sem_session'] = true;
            if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['session_timeout']['redir'] = $apl_def[0];
            }
            else {
                $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
            }
            $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
            $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['session_timeout']['redir_tp'] = $Redir_tp;
        }
        if (isset($_COOKIE['sc_actual_lang_Web_Case_IoT_V_1_12'])) {
            $_SESSION['scriptcase']['menu_fonte_olho_dagua_azul']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_Web_Case_IoT_V_1_12'];
        }
    }
}
if ((isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "force_lang") || (isset($_GET['nmgp_opcao']) && $_GET['nmgp_opcao'] == "force_lang"))
{
    if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "force_lang")
    {
        $nmgp_opcao  = $_POST['nmgp_opcao'];
        $nmgp_idioma = $_POST['nmgp_idioma'];
    }
    else
    {
        $nmgp_opcao  = $_GET['nmgp_opcao'];
        $nmgp_idioma = $_GET['nmgp_idioma'];
    }
    $Temp_lang = explode(";" , $nmgp_idioma);
    if (isset($Temp_lang[0]) && !empty($Temp_lang[0]))
    {
        $_SESSION['scriptcase']['str_lang'] = $Temp_lang[0];
    }
    if (isset($Temp_lang[1]) && !empty($Temp_lang[1]))
    {
        $_SESSION['scriptcase']['str_conf_reg'] = $Temp_lang[1];
    }
}
$contr_menu_fonte_olho_dagua_azul = new menu_fonte_olho_dagua_azul_class;
$contr_menu_fonte_olho_dagua_azul->menu_fonte_olho_dagua_azul_menu();

?>
