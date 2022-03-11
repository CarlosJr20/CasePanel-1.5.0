<?php
   include_once('grafico_corrente_maior_session.php');
   @ini_set('session.cookie_httponly', 1);
   @ini_set('session.use_only_cookies', 1);
   @ini_set('session.cookie_secure', 0);
   @session_start() ;
   $_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_perfil']          = "conn_fusioncharts";
   $_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_path_prod']       = "";
   $_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_path_conf']       = "";
   $_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_path_imagens']    = "";
   $_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_path_imag_temp']  = "";
   $_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_path_cache']      = "";
   $_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_path_doc']        = "";
    //check publication with the prod
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
    $str_path_apl_url = $_SERVER['PHP_SELF'];
    $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
    $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
    $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
    $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
    $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
    //check prod
    if(empty($_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_path_prod']))
    {
            /*check prod*/$_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
    }
    //check img
    if(empty($_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_path_imagens']))
    {
            /*check img*/$_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
    }
    //check tmp
    if(empty($_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_path_imag_temp']))
    {
            /*check tmp*/$_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
    }
    //check cache
    if(empty($_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_path_cache']))
    {
            /*check tmp*/$_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_path_cache'] = $str_path_apl_dir . "_lib/file/cache";
    }
    //check doc
    if(empty($_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_path_doc']))
    {
            /*check doc*/$_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
    }
    //end check publication with the prod
//
class grafico_corrente_maior_ini
{
   var $nm_cod_apl;
   var $nm_nome_apl;
   var $nm_seguranca;
   var $nm_grupo;
   var $nm_autor;
   var $nm_versao_sc;
   var $nm_tp_lic_sc;
   var $nm_dt_criacao;
   var $nm_hr_criacao;
   var $nm_autor_alt;
   var $nm_dt_ult_alt;
   var $nm_hr_ult_alt;
   var $nm_timestamp;
   var $nm_app_version;
   var $cor_link_dados;
   var $root;
   var $server;
   var $java_protocol;
   var $server_pdf;
   var $Arr_result;
   var $sc_protocolo;
   var $path_prod;
   var $path_link;
   var $path_aplicacao;
   var $path_embutida;
   var $path_botoes;
   var $path_img_global;
   var $path_img_modelo;
   var $path_icones;
   var $path_imagens;
   var $path_imag_cab;
   var $path_imag_temp;
   var $path_libs;
   var $path_doc;
   var $str_lang;
   var $str_conf_reg;
   var $str_schema_all;
   var $Str_btn_grid;
   var $str_google_fonts;
   var $path_cep;
   var $path_secure;
   var $path_js;
   var $path_help;
   var $path_adodb;
   var $path_grafico;
   var $path_atual;
   var $Gd_missing;
   var $sc_site_ssl;
   var $nm_falta_var;
   var $nm_falta_var_db;
   var $nm_tpbanco;
   var $nm_servidor;
   var $nm_usuario;
   var $nm_senha;
   var $nm_database_encoding;
   var $nm_arr_db_extra_args = array();
   var $nm_con_db2 = array();
   var $nm_con_persistente;
   var $nm_con_use_schema;
   var $nm_tabela;
   var $nm_ger_css_emb;
   var $sc_page;
   var $sc_lig_md5 = array();
   var $sc_lig_target = array();
   var $sc_export_ajax = false;
   var $sc_export_ajax_img = false;
   var $force_db_utf8 = false;
//
   function init($Tp_init = "")
   {
       global
             $nm_url_saida, $nm_apl_dependente, $script_case_init, $nmgp_opcao;

      if (!function_exists("sc_check_mobile"))
      {
          include_once("../_lib/lib/php/nm_check_mobile.php");
      }
          include_once("../_lib/lib/php/fix.php");
      $_SESSION['scriptcase']['proc_mobile'] = sc_check_mobile();
      @ini_set('magic_quotes_runtime', 0);
      $this->sc_page = $script_case_init;
      $_SESSION['scriptcase']['sc_num_page'] = $script_case_init;
      $_SESSION['scriptcase']['sc_cnt_sql']  = 0;
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
      $_SESSION['scriptcase']['trial_version'] = 'N';
      $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['decimal_db'] = "."; 
      $this->nm_cod_apl      = "grafico_corrente_maior"; 
      $this->nm_nome_apl     = "Gráfico de Linha simples em tempo real"; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "Web_Case_IoT_V_1_12"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "admin"; 
      $this->nm_script_by    = "netmake";
      $this->nm_script_type  = "PHP";
      $this->nm_versao_sc    = "v9"; 
      $this->nm_tp_lic_sc    = "pe_bronze"; 
      $this->nm_dt_criacao   = "20180213"; 
      $this->nm_hr_criacao   = "225837"; 
      $this->nm_autor_alt    = "admin"; 
      $this->nm_dt_ult_alt   = "20201219"; 
      $this->nm_hr_ult_alt   = "102351"; 
      $this->Apl_paginacao   = "PARCIAL"; 
      $temp_bug_list         = explode(" ", microtime()); 
      list($NM_usec, $NM_sec) = $temp_bug_list; 
      $this->nm_timestamp    = (float) $NM_sec; 
      $this->nm_app_version  = "1.0.0";
// 
// 
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
      $this->sc_site_ssl     = $this->appIsSsl();
      $this->sc_protocolo    = $this->sc_site_ssl ? 'https://' : 'http://';
      $this->sc_protocolo    = "";
      $this->path_prod       = $_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_path_prod'];
      $this->path_conf       = $_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_path_conf'];
      $this->path_imagens    = $_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_path_imag_temp'];
      $this->path_cache  = $_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_path_cache'];
      $this->path_doc        = $_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_path_doc'];
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
      if (!isset($_SESSION['scriptcase']['grafico_corrente_maior']['save_session']['save_grid_state_session']))
      { 
          $_SESSION['scriptcase']['grafico_corrente_maior']['save_session']['save_grid_state_session'] = false;
          $_SESSION['scriptcase']['grafico_corrente_maior']['save_session']['data'] = '';
      } 
      $this->str_schema_all    = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_Meadow/Sc9_Meadow";
      $_SESSION['scriptcase']['erro']['str_schema'] = $this->str_schema_all . "_error.css";
      $_SESSION['scriptcase']['erro']['str_lang']   = $this->str_lang;
      $this->server          = (!isset($_SERVER['HTTP_HOST'])) ? $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
      if (!isset($_SERVER['HTTP_HOST']) && isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != 80 && !$this->sc_site_ssl )
      {
          $this->server         .= ":" . $_SERVER['SERVER_PORT'];
      }
      $this->java_protocol   = ($this->sc_site_ssl) ? 'https://' : 'http://';
      $this->server_pdf      = $this->java_protocol . $this->server;
      $this->server          = "";
      $str_path_web          = $_SERVER['PHP_SELF'];
      $str_path_web          = str_replace("\\", '/', $str_path_web);
      $str_path_web          = str_replace('//', '/', $str_path_web);
      $this->root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
      $this->path_aplicacao  = substr($str_path_sys, 0, strrpos($str_path_sys, '/'));
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/grafico_corrente_maior';
      $this->path_embutida   = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/') + 1);
      $this->path_aplicacao .= '/';
      $this->path_link       = substr($str_path_web, 0, strrpos($str_path_web, '/'));
      $this->path_link       = substr($this->path_link, 0, strrpos($this->path_link, '/')) . '/';
      $this->path_botoes     = $this->path_link . "_lib/img";
      $this->path_img_global = $this->path_link . "_lib/img";
      $this->path_img_modelo = $this->path_link . "_lib/img";
      $this->path_icones     = $this->path_link . "_lib/img";
      $this->path_imag_cab   = $this->path_link . "_lib/img";
      $this->path_help       = $this->path_link . "_lib/webhelp/";
      $this->path_font       = $this->root . $this->path_link . "_lib/font/";
      $this->path_btn        = $this->root . $this->path_link . "_lib/buttons/";
      $this->path_css        = $this->root . $this->path_link . "_lib/css/";
      $this->path_lib_php    = $this->root . $this->path_link . "_lib/lib/php";
      $this->path_lib_js     = $this->root . $this->path_link . "_lib/lib/js";
      $pos_path = strrpos($this->path_prod, "/");
      $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['path_grid_sv'] = $this->root . substr($this->path_prod, 0, $pos_path) . "/conf/grid_sv/";
      $this->path_lang       = "../_lib/lang/";
      $this->path_lang_js    = "../_lib/js/";
      $this->path_chart_theme = $this->root . $this->path_link . "_lib/chart/";
      $this->path_cep        = $this->path_prod . "/cep";
      $this->path_cor        = $this->path_prod . "/cor";
      $this->path_js         = $this->path_prod . "/lib/js";
      $this->path_libs       = $this->root . $this->path_prod . "/lib/php";
      $this->path_third      = $this->root . $this->path_prod . "/third";
      $this->path_secure     = $this->root . $this->path_prod . "/secure";
      $this->path_adodb      = $this->root . $this->path_prod . "/third/adodb";
      $_SESSION['scriptcase']['dir_temp'] = $this->root . $this->path_imag_temp;
      $this->Cmp_Sql_Time     = array();
      if (isset($_SESSION['scriptcase']['grafico_corrente_maior']['session_timeout']['lang'])) {
          $this->str_lang = $_SESSION['scriptcase']['grafico_corrente_maior']['session_timeout']['lang'];
      }
      elseif (!isset($_SESSION['scriptcase']['grafico_corrente_maior']['actual_lang']) || $_SESSION['scriptcase']['grafico_corrente_maior']['actual_lang'] != $this->str_lang) {
          $_SESSION['scriptcase']['grafico_corrente_maior']['actual_lang'] = $this->str_lang;
          setcookie('sc_actual_lang_Web_Case_IoT_V_1_12',$this->str_lang,'0','/');
      }
      if (!isset($_SESSION['scriptcase']['fusioncharts_new']))
      {
          $_SESSION['scriptcase']['fusioncharts_new'] = @is_dir($this->path_third . '/oem_fs');
      }
      if (!isset($_SESSION['scriptcase']['phantomjs_charts']))
      {
          $_SESSION['scriptcase']['phantomjs_charts'] = @is_dir($this->path_third . '/phantomjs');
      }
      if (isset($_SESSION['scriptcase']['phantomjs_charts']))
      {
          $aTmpOS = $this->getRunningOS();
          $_SESSION['scriptcase']['phantomjs_charts'] = @is_dir($this->path_third . '/phantomjs/' . $aTmpOS['os']);
      }
      if (!class_exists('Services_JSON'))
      {
          include_once("grafico_corrente_maior_json.php");
      }
      $this->SC_Link_View = (isset($_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['SC_Link_View'])) ? $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['SC_Link_View'] : false;
      if (isset($_GET['SC_Link_View']) && !empty($_GET['SC_Link_View']) && is_numeric($_GET['SC_Link_View']))
      {
          if ($_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['embutida'])
          {
              $this->SC_Link_View = true;
              $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['SC_Link_View'] = true;
          }
      }
            if (isset($_POST['nmgp_opcao']) && 'ajax_check_file' == $_POST['nmgp_opcao'] ){
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_REQUEST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

    $out1_img_cache = $_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_path_imag_temp'] . $file_name;
    $orig_img = $_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_path_imag_temp']. '/'.basename($_POST['AjaxCheckImg']);
    copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$orig_img);
    echo $orig_img . '_@@NM@@_';
    if(file_exists($out1_img_cache)){
        echo $out1_img_cache;
        exit;
    }

         include_once("../_lib/lib/php/nm_trata_img.php");
            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            $sc_obj_img = new nm_trata_img($_SERVER['DOCUMENT_ROOT'].$out1_img_cache, true);

            if(!empty($img_width) && !empty($img_height)){
                $sc_obj_img->setWidth($img_width);
                $sc_obj_img->setHeight($img_height);
            }            $sc_obj_img->createImg($_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            echo $out1_img_cache;
               exit;
            }
      if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "ajax_save_ancor")
      {
          $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['ancor_save'] = $_POST['ancor_save'];
          $oJson = new Services_JSON();
          if ($_SESSION['scriptcase']['sem_session']) {
              unset($_SESSION['sc_session']);
          }
          exit;
      }
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
                      $nm_apl_dest = $this->path_link . SC_dir_app_name($nm_apl_dest) . "/";
                  }
                  if (isset($_POST['nmgp_opcao']) && ($_POST['nmgp_opcao'] == "ajax_event" || $_POST['nmgp_opcao'] == "ajax_navigate"))
                  {
                      $this->Arr_result = array();
                      $this->Arr_result['redirInfo']['action']              = $nm_apl_dest;
                      $this->Arr_result['redirInfo']['target']              = $parms['T'];
                      $this->Arr_result['redirInfo']['metodo']              = "post";
                      $this->Arr_result['redirInfo']['script_case_init']    = $this->sc_page;
                      $oJson = new Services_JSON();
                      echo $oJson->encode($this->Arr_result);
                      exit;
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
      global $under_dashboard, $dashboard_app, $own_widget, $parent_widget, $compact_mode, $remove_margin, $remove_border;
      if (!isset($_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['dashboard_info']['under_dashboard']))
      {
          $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['dashboard_info']['under_dashboard'] = false;
          $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['dashboard_info']['dashboard_app']   = '';
          $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['dashboard_info']['own_widget']      = '';
          $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['dashboard_info']['parent_widget']   = '';
          $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['dashboard_info']['compact_mode']    = false;
          $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['dashboard_info']['remove_margin']   = false;
          $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['dashboard_info']['remove_border']   = false;
      }
      if (isset($_GET['under_dashboard']) && 1 == $_GET['under_dashboard'])
      {
          if (isset($_GET['own_widget']) && 'dbifrm_widget' == substr($_GET['own_widget'], 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['dashboard_info']['own_widget'] = $_GET['own_widget'];
              $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['dashboard_info']['under_dashboard'] = true;
              if (isset($_GET['dashboard_app'])) {
                  $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['dashboard_info']['dashboard_app'] = $_GET['dashboard_app'];
              }
              if (isset($_GET['parent_widget'])) {
                  $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['dashboard_info']['parent_widget'] = $_GET['parent_widget'];
              }
              if (isset($_GET['compact_mode'])) {
                  $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['dashboard_info']['compact_mode'] = 1 == $_GET['compact_mode'];
              }
              if (isset($_GET['remove_margin'])) {
                  $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['dashboard_info']['remove_margin'] = 1 == $_GET['remove_margin'];
              }
              if (isset($_GET['remove_border'])) {
                  $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['dashboard_info']['remove_border'] = 1 == $_GET['remove_border'];
              }
          }
      }
      elseif (isset($under_dashboard) && 1 == $under_dashboard)
      {
          if (isset($own_widget) && 'dbifrm_widget' == substr($own_widget, 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['dashboard_info']['own_widget'] = $own_widget;
              $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['dashboard_info']['under_dashboard'] = true;
              if (isset($dashboard_app)) {
                  $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['dashboard_info']['dashboard_app'] = $dashboard_app;
              }
              if (isset($parent_widget)) {
                  $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['dashboard_info']['parent_widget'] = $parent_widget;
              }
              if (isset($compact_mode)) {
                  $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['dashboard_info']['compact_mode'] = 1 == $compact_mode;
              }
              if (isset($remove_margin)) {
                  $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['dashboard_info']['remove_margin'] = 1 == $remove_margin;
              }
              if (isset($remove_border)) {
                  $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['dashboard_info']['remove_border'] = 1 == $remove_border;
              }
          }
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['dashboard_info']['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['dashboard_info']['maximized'] = false;
      }
      if (isset($_GET['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['dashboard_info']['maximized'] = 1 == $_GET['maximized'];
      }
      if ($_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['dashboard_info']['under_dashboard'])
      {
          $sTmpDashboardApp = $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['dashboard_info']['dashboard_app'];
          if ('' != $sTmpDashboardApp && isset($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["grafico_corrente_maior"]))
          {
              foreach ($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["grafico_corrente_maior"] as $sTmpTargetLink => $sTmpTargetWidget)
              {
                  if (isset($this->sc_lig_target[$sTmpTargetLink]))
                  {
                      $this->sc_lig_target[$sTmpTargetLink] = $sTmpTargetWidget;
                  }
              }
          }
      }
      if ($Tp_init == "Path_sub")
      {
          return;
      }
      $str_path = substr($this->path_prod, 0, strrpos($this->path_prod, '/') + 1);
      if (!is_file($this->root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
      {
          unset($_SESSION['scriptcase']['nm_sc_retorno']);
          unset($_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_conexao']);
      }
      include($this->path_lang . $this->str_lang . ".lang.php");
      include($this->path_lang . "config_region.php");
      include($this->path_lang . "lang_config_region.php");
      asort($this->Nm_lang_conf_region);
      $_SESSION['scriptcase']['charset']  = (isset($this->Nm_lang['Nm_charset']) && !empty($this->Nm_lang['Nm_charset'])) ? $this->Nm_lang['Nm_charset'] : "UTF-8";
      ini_set('default_charset', $_SESSION['scriptcase']['charset']);
      $_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
      if (!function_exists("mb_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtmb'] . "</font></div>";exit;
      } 
      elseif (!function_exists("sc_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtsc'] . "</font></div>";exit;
      } 
      foreach ($this->Nm_lang_conf_region as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_lang_conf_region[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
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
      $_SESSION['sc_session']['SC_download_violation'] = $this->Nm_lang['lang_errm_fnfd'];
      if (isset($_SESSION['sc_session']['SC_parm_violation']) && !isset($_SESSION['scriptcase']['grafico_corrente_maior']['session_timeout']['redir']))
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
      if (isset($this->Nm_lang['lang_errm_dbcn_conn']))
      {
          $_SESSION['scriptcase']['db_conn_error'] = $this->Nm_lang['lang_errm_dbcn_conn'];
      }
      $PHP_ver = str_replace(".", "", phpversion()); 
      if (substr($PHP_ver, 0, 3) < 434)
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_phpv'] . "</font></div>";exit;
      } 
      if (file_exists($this->path_libs . "/ver.dat"))
      {
          $SC_ver = file($this->path_libs . "/ver.dat"); 
          $SC_ver = str_replace(".", "", $SC_ver[0]); 
          if (substr($SC_ver, 0, 5) < 40015)
          {
              echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_incp'] . "</font></div>";exit;
          } 
      } 
      $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['path_doc'] = $this->path_doc; 
      $_SESSION['scriptcase']['nm_path_prod'] = $this->root . $this->path_prod . "/"; 
      if (empty($this->path_imag_cab))
      {
          $this->path_imag_cab = $this->path_img_global;
      }
      if (!is_dir($this->root . $this->path_prod))
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_default { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:2px; background-color:#009061; filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_default:hover { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1px; border-color:#017b54; border-style:solid; border-radius:2px; background-color:#017b54; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_default:active { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:2px; background-color:#017b54; box-shadow:inset 0 1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_default_disabled { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#6FA895; border-style:solid; border-radius:2px; background-color:#6FA895; filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:default; box-sizing:border-box;  }";
          echo ".scButton_default_selected { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:2px; background-color:#009061; filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_default_list { background-color:#ffffff; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list:hover { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list_disabled { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; filter: alpha(opacity=45); opacity:0.45; cursor:default;  }";
          echo ".scButton_default_list_selected { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; cursor:pointer; filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_default_list:active { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_group { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:0px; background-color:#009061; filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box; img_filter:grayscale(100%);  }";
          echo ".scButton_group:hover { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#017b54; border-style:solid; border-radius:2px; background-color:#017b54; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_group:active { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:2px; background-color:#017b54; box-shadow:inset 0 1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_group_disabled { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#6FA895; border-style:solid; border-radius:0px; background-color:#6FA895; filter: alpha(opacity=40); opacity:0.4; padding:7.8px 15px;margin:0px -5px; cursor:default; box-sizing:border-box;  }";
          echo ".scButton_group_selected { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:0px; background-color:#009061; filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box; img_filter:none;  }";
          echo ".scButton_small { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:2px; background-color:#009061; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_small:hover { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#017b54; border-style:solid; border-radius:2px; background-color:#017b54; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_small:active { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:2px; background-color:#017b54; box-shadow:inset 0 1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_small_disabled { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#6FA895; border-style:solid; border-radius:2px; background-color:#6FA895; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:default; box-sizing:border-box;  }";
          echo ".scButton_small_selected { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:2px; background-color:#009061; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_small_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_small_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#2b77c0; border-style:solid; border-radius:4.25px; background-color:#2b77c0; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:4.25px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:4.25px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:4.25px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#999; border-style:solid; border-radius:4.25px; background-color:#999; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:4.25px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#7a7a7a; border-style:solid; border-radius:4.25px; background-color:#7a7a7a; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertcancel_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sc_image { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sc_image:hover { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sc_image:active { color:#8592a6; font-size:15px; text-decoration:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sc_image_disabled { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=44); opacity:0.44; padding:5px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_sc_image_selected { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scLink_default { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo ".scLink_default:visited { text-decoration: underline; font-size: 13px; color: #660099;  }";
          echo ".scLink_default:active { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo ".scLink_default:hover { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo "</style>";
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          echo "<tr>";
          echo "   <td bgcolor=\"\">";
          echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_cmlb_nfnd'] . "</font>";
          echo "  " . $this->root . $this->path_prod;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['grafico_corrente_maior']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['grafico_corrente_maior']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['grafico_corrente_maior']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_back'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_back_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
              else 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_exit'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_exit_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
          } 
          exit ;
      }

      $this->nm_ger_css_emb = true;
      $this->path_atual     = getcwd();
      $opsys = strtolower(php_uname());

// 
      include_once($this->path_aplicacao . "grafico_corrente_maior_erro.class.php"); 
      $this->Erro = new grafico_corrente_maior_erro();
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
// 
 if(function_exists('set_php_timezone')) set_php_timezone('grafico_corrente_maior'); 
// 
      $this->sc_Include($this->path_lib_php . "/nm_functions.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/nm_api.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/nm_fix.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $this->sc_Include($this->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->sc_Include($this->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->nm_data = new nm_data("pt_br");
      include("../_lib/css/" . $this->str_schema_all . "_grid.php");
      $this->Tree_img_col    = trim($str_tree_col);
      $this->Tree_img_exp    = trim($str_tree_exp);
      $_SESSION['scriptcase']['nmamd'] = array();
      perfil_lib($this->path_libs);
      if (!isset($_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil']))
      {
          if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($this->path_libs, $this->path_prod);
          $_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil'] = true;
      }
      if (function_exists("nm_check_pdf_server")) $this->server_pdf = nm_check_pdf_server($this->path_libs, $this->server_pdf);
      if (!isset($_SESSION['scriptcase']['sc_num_img']))
      { 
          $_SESSION['scriptcase']['sc_num_img'] = 1;
      } 
      $this->str_google_fonts= isset($str_google_fonts)?$str_google_fonts:'';
      $this->regionalDefault();
      $this->Str_btn_grid    = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
      $this->Str_btn_css     = trim($str_button) . "/" . trim($str_button) . ".css";
      include($this->path_btn . $this->Str_btn_grid);
      $_SESSION['scriptcase']['erro']['str_schema_dir'] = $this->str_schema_all . "_error" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
      $this->sc_tem_trans_banco = false;
      if (isset($_SESSION['scriptcase']['grafico_corrente_maior']['session_timeout']['redir'])) {
          $SS_cod_html  = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">';
          $SS_cod_html .= "<HTML>\r\n";
          $SS_cod_html .= " <HEAD>\r\n";
          $SS_cod_html .= "  <TITLE></TITLE>\r\n";
          $SS_cod_html .= "   <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\"/>\r\n";
          if ($_SESSION['scriptcase']['proc_mobile']) {
              $SS_cod_html .= "   <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\"/>\r\n";
          }
          $SS_cod_html .= "   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n";
          $SS_cod_html .= "    <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n";
          if ($_SESSION['scriptcase']['grafico_corrente_maior']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body>\r\n";
          }
          else {
              $SS_cod_html .= "    <link rel=\"shortcut icon\" href=\"../_lib/img/usr__NM__ico__NM__1132icone - Logo_Prancheta 1.ico\">\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_grid.css\"/>\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\"/>\r\n";
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body class=\"scGridPage\">\r\n";
              $SS_cod_html .= "    <table align=\"center\"><tr><td style=\"padding: 0\"><div class=\"scGridBorder\">\r\n";
              $SS_cod_html .= "    <table class=\"scGridTabela\" width='100%' cellspacing=0 cellpadding=0><tr class=\"scGridFieldOdd\"><td class=\"scGridFieldOddFont\" style=\"padding: 15px 30px; text-align: center\">\r\n";
              $SS_cod_html .= $this->Nm_lang['lang_errm_expired_session'] . "\r\n";
              $SS_cod_html .= "     <form name=\"Fsession_redir\" method=\"post\"\r\n";
              $SS_cod_html .= "           target=\"_self\">\r\n";
              $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['grafico_corrente_maior']['session_timeout']['redir'] . "');\">\r\n";
              $SS_cod_html .= "     </form>\r\n";
              $SS_cod_html .= "    </td></tr></table>\r\n";
              $SS_cod_html .= "    </div></td></tr></table>\r\n";
          }
          $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
          if ($_SESSION['scriptcase']['grafico_corrente_maior']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['grafico_corrente_maior']['session_timeout']['redir'] . "');\r\n";
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
          unset($_SESSION['scriptcase']['grafico_corrente_maior']['session_timeout']);
          unset($_SESSION['sc_session']);
      }
      if (isset($SS_cod_html) && isset($_GET['nmgp_opcao']) && (substr($_GET['nmgp_opcao'], 0, 14) == "ajax_aut_comp_" || substr($_GET['nmgp_opcao'], 0, 13) == "ajax_autocomp"))
      {
          unset($_SESSION['sc_session']);
          $oJson = new Services_JSON();
          echo $oJson->encode("ss_time_out");
          exit;
      }
      elseif (isset($SS_cod_html) && ((isset($_POST['nmgp_opcao']) && substr($_POST['nmgp_opcao'], 0, 5) == "ajax_") || (isset($_GET['nmgp_opcao']) && substr($_GET['nmgp_opcao'], 0, 5) == "ajax_")))
      {
          unset($_SESSION['sc_session']);
          $this->Arr_result = array();
          $this->Arr_result['ss_time_out'] = true;
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          exit;
      }
      elseif (isset($SS_cod_html))
      {
          echo $SS_cod_html;
          exit;
      }
      $this->nm_font_ttf = array("ar", "ja", "pl", "ru", "sk", "thai", "zh_cn", "zh_hk", "cz", "el", "ko", "mk");
      $this->nm_ttf_arab = array("ar");
      $this->nm_ttf_jap  = array("ja");
      $this->nm_ttf_rus  = array("pl", "ru", "sk", "cz", "el", "mk");
      $this->nm_ttf_thai = array("thai");
      $this->nm_ttf_chi  = array("zh_cn", "zh_hk", "ko");
      $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['seq_dir'] = 0; 
      $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['sub_dir'] = array(); 
      $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1D9FYDQJsHArYHQrqHgvsVIBsDWFaVoX7D9JmZ1rqHArKD5FaDEBeVkJ3DuJeHMJsDcBwH9FGHAN7HQrqDMvmVcFKV5BmVoBqD9BsZkFGHAvsD5BOHgvsHArsHEXCHMBiHQXOZSBiD1NKVWJeHgrwVcFiV5FYHIX7DcNmZ1X7HABYD5JwHgBeDkBsV5FqHMB/HQXOH9BiHIrKHuX7HgvOZSrCV5FYHMX7DcNmZSBqHABYHuJwHgNOHEFKH5FYVoX7D9JKDQX7D1BOV5FGDMzGVcBUHEF/HIJsHQJmH9BOHABYHQFaHgvsHAFKV5B7ZuBqHQBiH9FUHAN7HQJsDMrYVcFiV5FYHMJwHQXGZSBOD1zGZMB/HgrKHEFKV5FqHIJwHQNwDQBqDSzGVWJwDMzGVcFiH5FqDoJeD9JmZ1B/D1NaD5rqHgrKHArsHEXCHINUHQNmDQFUHArYHuFUDMzGVcFiV5FYHIrqHQBiZSBODSvmZMBOHgNOHEFKV5FqHIBiHQFYH9FUHIrKHuXGDMBYZSrCV5FYHIrqHQJmZSBqDSBeHuJwHgNOHAFKH5FYVoX7D9JKDQX7D1BOV5FGHuzGDkBOH5FqVoJwD9XOZ1F7HABYZMB/DEBeHENiV5FaHIFGHQJeZ9JeZ1rwHQFaHuzGVIBOV5X7DoF7D9XOZSB/HABYV5X7DMrYHErCDWXCVoXGD9XsDQJsHABYV5BqDMrwDkBsV5F/DoraD9BiZ1FGZ1rYD5NUDEBeZSXeH5FGDoB/D9NmZ9XGDSzGD5F7HuzGVcFKDur/VorqHQNwVIJsD1NaD5FaDEvsZSJGDuFaZuBqD9NwH9X7Z1rwV5JwHuBYVcFiV5X7VoFGDcBqH9FaHAN7V5JeDErKHEBUH5F/DoF7DcJeDQFGD1BeD5JwDMrwZSJ3H5FqDoJeD9JmZ1B/D1NaD5rqDErKZSXeH5FYDoFUD9JKDQJsZ1rwV5BqHuBYVcXKV5X7HMJsHQBsZ1BOD1rwHuFaDMvCHErCV5FaHMJsHQXGDuFaDSN7HuNUDMBOZSJqDWXCHINUHQNmVINUHIBeHQJwDEBODkFeH5FYVoFGHQJKDQJwD1BeV5JwDMvmDkFCH5XCHIJsHQBiZ1FGDSBOD5JeHgNKZSJ3DuFaZuBODcJeZSBiHAveD5NUHgNKDkBOV5FYHMBiHQFYH9B/HIBeD5XGDMBYHEXeDWXCVoXGDcJeZSX7Z1rwV5raHgvsDkBOV5X7VoX7D9XOZSB/HArYV5FUDEvsHEFiDWFqDoFUD9XsDQX7HArYD5BqHuNODkFCDWrmDoJsD9XOZ1F7HIveD5BqHgBeHEFiV5B3DoF7D9XsDuFaHAveHuFaHuNOZSrCH5FqDoXGHQJmZ1F7HIrwHQBOHgBeZSJqDuFaZuB/DcXOZSBiZ1zGVWJeHgvOVIB/HEFYHMBiD9BsVIraD1rwV5X7HgBeHEBUDWF/VoB/DcXOZSX7HANOV5BOHuNODkBOV5F/VEBiDcJUZkFGHArKV5FUDMrYZSXeV5FqHIJsHQBiZ9XGHANKV5BODMvOV9BUDWB3VEX7HQNmZkBiHABYHQJwDEBODkFeH5FYVoFGHQJKDQFaHIrwVWJsDMrYVcrsDWFaHIX7HQNmZkBiHArKV5JwDMvCZSJ3DWB3ZuB/HQXsDQFaHAveD5NUHgNKDkBOV5FYHMBiHQJmH9B/HABYD5XGDEBOHEFiV5FaDoXGDcJUDQFaHArYD5rqHgvsVIBODWFYVoX7D9BiZ1F7Z1BOD5raDMzGHEFiDWFGDoNUHQFYZSX7DSBYD5rqHuBYVIBODWXKVoFaHQBiZ1B/HArYV5FGDEBODkBsDWF/HMFaDkNGH9X7Z1N7D5BqHuNODkFCDWJeHMBiD9BsVIraD1rwV5X7HgBeHErsHEB7VoBiHQBiDQNUZ1rKVWFU";
      $this->prep_conect();
   }

   function getRunningOS()
   {
       $aOSInfo = array();

       if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
       {
           $aOSInfo['os'] = 'win';
       }
       elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
       {
           $aOSInfo['os'] = 'linux-i386';
           if(strpos(strtolower(php_uname()), 'x86_64') !== FALSE) 
            {
               $aOSInfo['os'] = 'linux-amd64';
            }
       }
       elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
       {
           $aOSInfo['os'] = 'macos';
       }

       return $aOSInfo;
   }

   function prep_conect()
   {
      $con_devel             = (isset($_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (!isset($_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['embutida_init']) || !$_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['embutida_init']) 
      {
      }
// 
      if (!empty($this->nm_falta_var) || !empty($this->nm_falta_var_db) || $nm_crit_perfil)
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_default { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:2px; background-color:#009061; filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_default:hover { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1px; border-color:#017b54; border-style:solid; border-radius:2px; background-color:#017b54; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_default:active { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:2px; background-color:#017b54; box-shadow:inset 0 1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_default_disabled { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#6FA895; border-style:solid; border-radius:2px; background-color:#6FA895; filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:default; box-sizing:border-box;  }";
          echo ".scButton_default_selected { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:2px; background-color:#009061; filter: alpha(opacity=100); opacity:1; line-height:31px; height:34px; padding:0 12px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_default_list { background-color:#ffffff; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list:hover { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list_disabled { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; filter: alpha(opacity=45); opacity:0.45; cursor:default;  }";
          echo ".scButton_default_list_selected { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; cursor:pointer; filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_default_list:active { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_group { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:0px; background-color:#009061; filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box; img_filter:grayscale(100%);  }";
          echo ".scButton_group:hover { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#017b54; border-style:solid; border-radius:2px; background-color:#017b54; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_group:active { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:2px; background-color:#017b54; box-shadow:inset 0 1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_group_disabled { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#6FA895; border-style:solid; border-radius:0px; background-color:#6FA895; filter: alpha(opacity=40); opacity:0.4; padding:7.8px 15px;margin:0px -5px; cursor:default; box-sizing:border-box;  }";
          echo ".scButton_group_selected { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:0px; background-color:#009061; filter: alpha(opacity=100); opacity:1; padding:7.8px 15px;margin:0px -5px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box; img_filter:none;  }";
          echo ".scButton_small { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-shadow:;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:2px; background-color:#009061; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_small:hover { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#017b54; border-style:solid; border-radius:2px; background-color:#017b54; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_small:active { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:2px; background-color:#017b54; box-shadow:inset 0 1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_small_disabled { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#6FA895; border-style:solid; border-radius:2px; background-color:#6FA895; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:default; box-sizing:border-box;  }";
          echo ".scButton_small_selected { font-family:Tahoma, Arial, sans-serif; color:#FFFFFF; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#009061; border-style:solid; border-radius:2px; background-color:#009061; filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden; box-sizing:border-box;  }";
          echo ".scButton_small_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_small_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#2b77c0; border-style:solid; border-radius:4.25px; background-color:#2b77c0; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:4.25px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:4.25px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:4.25px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#999; border-style:solid; border-radius:4.25px; background-color:#999; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:4.25px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#7a7a7a; border-style:solid; border-radius:4.25px; background-color:#7a7a7a; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertcancel_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sc_image { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sc_image:hover { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sc_image:active { color:#8592a6; font-size:15px; text-decoration:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sc_image_disabled { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=44); opacity:0.44; padding:5px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_sc_image_selected { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scLink_default { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo ".scLink_default:visited { text-decoration: underline; font-size: 13px; color: #660099;  }";
          echo ".scLink_default:active { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo ".scLink_default:hover { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo "</style>";
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          if (empty($this->nm_falta_var_db))
          {
              if (!empty($this->nm_falta_var))
              {
                  echo "<tr>";
                  echo "   <td bgcolor=\"\">";
                  echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_glob'] . "</font>";
                  echo "  " . $this->nm_falta_var;
                  echo "   </b></td>";
                  echo " </tr>";
              }
              if ($nm_crit_perfil)
              {
                  echo "<tr>";
                  echo "   <td bgcolor=\"\">";
                  echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_nfnd'] . "</font>";
                  echo "  " . $perfil_trab;
                  echo "   </b></td>";
                  echo " </tr>";
              }
          }
          else
          {
              echo "<tr>";
              echo "   <td bgcolor=\"\">";
              echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_data'] . "</font></b>";
              echo "   </td>";
              echo " </tr>";
          }
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['grafico_corrente_maior']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['grafico_corrente_maior']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['grafico_corrente_maior']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_back'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_back_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
              else 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_exit'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_exit_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
          } 
          exit ;
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
       $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit'] : "1";
       $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'] : "1";
   }
// 
   function sc_Include($path, $tp, $name)
   {
       if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
       {
           include_once($path);
       }
   } // sc_Include
   function sc_Sql_Protect($var, $tp, $conex="")
   {
       if (empty($conex) || $conex == "conn_fusioncharts")
       {
           $TP_banco = $_SESSION['scriptcase']['glo_tpbanco'];
       }
       else
       {
           eval ("\$TP_banco = \$this->nm_con_" . $conex . "['tpbanco'];");
       }
       if ($tp == "date")
       {
           $delim  = "'";
           $delim1 = "'";
           if (in_array(strtolower($TP_banco), $this->nm_bases_access))
           {
               $delim  = "#";
               $delim1 = "#";
           }
           if (isset($_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['SC_sep_date']))
           {
               $delim  = $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['SC_sep_date'];
               $delim1 = $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['SC_sep_date1'];
           }
           return $delim . $var . $delim1;
       }
       else
       {
           return $var;
       }
   } // sc_Sql_Protect
   function sc_Date_Protect($val_dt)
   {
       $dd = substr($val_dt, 8, 2);
       $mm = substr($val_dt, 5, 2);
       $yy = substr($val_dt, 0, 4);
       $hh = (strlen($val_dt) > 10) ? substr($val_dt, 10) : "";
       if ($mm > 12) {
           $mm = 12;
       }
       $dd_max = 31;
       if ($mm == '04' || $mm == '06' || $mm == '09' || $mm == 11) {
           $dd_max = 30;
       }
       if ($mm == '02') {
           $dd_max = ($yy % 4 == 0) ? 29 : 28;
       }
       if ($dd > $dd_max) {
           $dd = $dd_max;
       }
       return $yy . "-" . $mm . "-" . $dd . $hh;
   }
	function appIsSsl() {
		if (isset($_SERVER['HTTPS'])) {
			if ('on' == strtolower($_SERVER['HTTPS'])) {
				return true;
			}
			if ('1' == $_SERVER['HTTPS']) {
				return true;
			}
		}

		if (isset($_SERVER['REQUEST_SCHEME'])) {
			if ('https' == $_SERVER['REQUEST_SCHEME']) {
				return true;
			}
		}

		if (isset($_SERVER['SERVER_PORT'])) {
			if ('443' == $_SERVER['SERVER_PORT']) {
				return true;
			}
		}

		return false;
	}
   function Get_Gb_date_format($GB, $cmp)
   {
       return (isset($_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['SC_Gb_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['SC_Gb_date_format'][$GB][$cmp] : "";
   }

   function Get_Gb_prefix_date_format($GB, $cmp)
   {
       return (isset($_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['SC_Gb_prefix_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['grafico_corrente_maior']['SC_Gb_prefix_date_format'][$GB][$cmp] : "";
   }

   function GB_date_format($val, $format, $prefix, $conf_region="S", $mask="")
   {
           return $val;
   }
   function Get_arg_groupby($val, $format)
   {
       return $val; 
   }
   function Get_format_dimension($ind_ini, $ind_qb, $campo, $rs, $conf_region="S", $mask="")
   {
       $retorno    = array();
       $format     = $this->Get_Gb_date_format($ind_qb, $campo);
       $Prefix_dat = $this->Get_Gb_prefix_date_format($ind_qb, $campo);
       if (empty($format) || $rs->fields[$ind_ini] == "")
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $rs->fields[$ind_ini];
           return $retorno;
       }
       if ($format == 'YYYYMMDDHHIISS')
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($rs->fields[$ind_ini], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMMDDHHII')
       {
           $this->Ajust_fields($ind_ini, $rs, "1,2,3,4");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1] . "-" . $rs->fields[$ind_ini + 2] . " " . $rs->fields[$ind_ini + 3] . ":" . $rs->fields[$ind_ini + 4];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMMDDHH')
       {
           $this->Ajust_fields($ind_ini, $rs, "1,2,3");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1] . "-" . $rs->fields[$ind_ini + 2] . " " . $rs->fields[$ind_ini + 3];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMMDD2')
       {
           $this->Ajust_fields($ind_ini, $rs, "1,2");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1] . "-" . $rs->fields[$ind_ini + 2];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMM')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYY')
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($rs->fields[$ind_ini], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'BIMONTHLY' || $format == 'QUARTER' || $format == 'FOURMONTHS' || $format == 'SEMIANNUAL' || $format == 'WEEK')
       {
           $temp            = (substr($rs->fields[$ind_ini], 0, 1) == 0) ? substr($rs->fields[$ind_ini], 1) : $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $Prefix_dat . $temp;
           return $retorno;
       }
       if ($format == 'DAYNAME'|| $format == 'YYYYDAYNAME')
       {
           if ($format == 'DAYNAME')
           {
               $retorno['orig'] = $rs->fields[$ind_ini];
               $ano             = "";
               $daynum          = $rs->fields[$ind_ini];
           }
           else
           {
               $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
               $ano             = " " . $rs->fields[$ind_ini];
               $daynum          = $rs->fields[$ind_ini + 1];
           }
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_db2) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress))
           {
               $daynum--;
           }
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql))
           {
               $daynum = ($daynum == 6) ? 0 : $daynum + 1;
           }
           if ($daynum == 0) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_sund'] . $ano;
           }
           if ($daynum == 1) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_mond'] . $ano;
           }
           if ($daynum == 2) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_tued'] . $ano;
           }
           if ($daynum == 3) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_wend'] . $ano;
           }
           if ($daynum == 4) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_thud'] . $ano;
           }
           if ($daynum == 5) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_frid'] . $ano;
           }
           if ($daynum == 6) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_satd'] . $ano;
           }
           return $retorno;
       }
       if ($format == 'HH')
       {
           $this->Ajust_fields($ind_ini, $rs, "0");
           $temp            = "0000-00-00 " . $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'DD')
       {
           $this->Ajust_fields($ind_ini, $rs, "0");
           $temp            = "0000-00-" . $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'MM')
       {
           $this->Ajust_fields($ind_ini, $rs, "0");
           $temp            = "0000-" . $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYY')
       {
           $temp            = $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYHH')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $temp            = $rs->fields[$ind_ini] . "-00-00 " . $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYDD')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $temp            = $rs->fields[$ind_ini] . "-00-" . $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       elseif ($format == 'YYYYWEEK' || $format == 'YYYYBIMONTHLY' || $format == 'YYYYQUARTER' || $format == 'YYYYFOURMONTHS' || $format == 'YYYYSEMIANNUAL')
       {
           $temp            = (substr($rs->fields[$ind_ini + 1], 0, 1) == 0) ? substr($rs->fields[$ind_ini + 1], 1) : $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $Prefix_dat . $temp . " " . $rs->fields[$ind_ini];
           return $retorno;
       }
       if ($format == 'YYYYHH' || $format == 'YYYYDD')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $rs->fields[$ind_ini] . $_SESSION['scriptcase']['reg_conf']['date_sep'] . $rs->fields[$ind_ini + 1];
           return $retorno;
       }
       elseif ($format == 'HHIISS')
       {
           $this->Ajust_fields($ind_ini, $rs, "0,1,2");
           $retorno['orig'] = $rs->fields[$ind_ini] . ":" . $rs->fields[$ind_ini + 1] . ":" . $rs->fields[$ind_ini + 2];
           $retorno['fmt']  = $this->GB_date_format("0000-00-00 " . $retorno['orig'], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       elseif ($format == 'HHII')
       {
           $this->Ajust_fields($ind_ini, $rs, "0,1");
           $retorno['orig'] = $rs->fields[$ind_ini] . ":" . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $this->GB_date_format("0000-00-00 " . $retorno['orig'], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       else
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $rs->fields[$ind_ini];
           return $retorno;
       }
   }
   function Ajust_fields($ind_ini, &$rs, $parts)
   {
       $prep = explode(",", $parts);
       foreach ($prep as $ind)
       {
           $ind_ok = $ind_ini + $ind;
           $rs->fields[$ind_ok] = (int) $rs->fields[$ind_ok];
           if (strlen($rs->fields[$ind_ok]) == 1)
           {
               $rs->fields[$ind_ok] = "0" . $rs->fields[$ind_ok];
           }
       }
   }
   function Get_date_order_groupby($sql_def, $order, $format="", $order_old="")
   {
       $order      = " " . trim($order);
       $order_old .= (!empty($order_old)) ? ", " : "";
       return $order_old . $sql_def . $order;
   }
}
//===============================================================================
//
class grafico_corrente_maior_apl
{
   var $Ini;
   var $Erro;
   var $Db;
   var $Lookup;
   var $nm_location;
//
//----- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini = $this->Ini;
      $this->$modulo->Erro = $this->Erro;
   }
//
//----- 
   function controle()
   {
      global $nm_saida, $nm_url_saida, $script_case_init, $glo_senha_protect;

      $this->Ini = new grafico_corrente_maior_ini(); 
      $this->Ini->init();
      $this->Change_Menu = false;
      if (isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grafico_corrente_maior']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['grafico_corrente_maior']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['grafico_corrente_maior']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['grafico_corrente_maior'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['grafico_corrente_maior']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['grafico_corrente_maior']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('grafico_corrente_maior') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['grafico_corrente_maior']['label'] = "" . $this->Ini->Nm_lang['lang_othr_blank_title'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "grafico_corrente_maior")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grafico_corrente_maior']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['grafico_corrente_maior']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['grafico_corrente_maior']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";

      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      nm_gc($this->Ini->path_libs);
      $this->nm_data = new nm_data("pt_br");
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                  $this->Ini->Nm_lang['lang_mnth_janu'],
                                  $this->Ini->Nm_lang['lang_mnth_febr'],
                                  $this->Ini->Nm_lang['lang_mnth_marc'],
                                  $this->Ini->Nm_lang['lang_mnth_apri'],
                                  $this->Ini->Nm_lang['lang_mnth_mayy'],
                                  $this->Ini->Nm_lang['lang_mnth_june'],
                                  $this->Ini->Nm_lang['lang_mnth_july'],
                                  $this->Ini->Nm_lang['lang_mnth_augu'],
                                  $this->Ini->Nm_lang['lang_mnth_sept'],
                                  $this->Ini->Nm_lang['lang_mnth_octo'],
                                  $this->Ini->Nm_lang['lang_mnth_nove'],
                                  $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                  $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                  $this->Ini->Nm_lang['lang_days_sund'],
                                  $this->Ini->Nm_lang['lang_days_mond'],
                                  $this->Ini->Nm_lang['lang_days_tued'],
                                  $this->Ini->Nm_lang['lang_days_wend'],
                                  $this->Ini->Nm_lang['lang_days_thud'],
                                  $this->Ini->Nm_lang['lang_days_frid'],
                                  $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                  $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                  $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                  $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                  $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                  $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                  $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                  $this->Ini->Nm_lang['lang_shrt_days_satd']);
      include_once($this->Ini->path_aplicacao . "grafico_corrente_maior_erro.class.php"); 
      $this->Erro      = new grafico_corrente_maior_erro();
      $this->Erro->Ini = $this->Ini;
//
      header("X-XSS-Protection: 1; mode=block");
      header("X-Frame-Options: SAMEORIGIN");
      $_SESSION['scriptcase']['grafico_corrente_maior']['contr_erro'] = 'on';
  $prod  = $this->Ini->path_prod."/third/fusioncharts_xt_ol/FusionCharts/js/fusioncharts.js";
?>
<style>
	#renderChart{
		text-align: center;
		margin: 100 auto;
		display: block;
	}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?php echo $prod; ?>"></script>
<?php
$this->renderChart("realtimeline","renderChart",1);
?>
<div id="renderChart"></div>

<?php



$_SESSION['scriptcase']['grafico_corrente_maior']['contr_erro'] = 'off'; 
       if ($this->Change_Menu)
       {
           $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
           $Arr_rastro = array();
           if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
           {
               foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
               {
                  $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
               }
               $ult_apl = count($Arr_rastro) - 1;
               unset($Arr_rastro[$ult_apl]);
               $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
           }
           else
           {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
           }
       }
       if (isset($this->redir_modal) && !empty($this->redir_modal))
       {
?>
              <HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
               <HEAD>
                <TITLE></TITLE>
               <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
           if ($_SESSION['scriptcase']['proc_mobile'])
           {
?>
                <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
           }
?>
                <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>                <META http-equiv="Pragma" content="no-cache"/>
                <link rel="shortcut icon" href="../_lib/img/usr__NM__ico__NM__1132icone - Logo_Prancheta 1.ico">
                <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery/js/jquery.js"></script>
        <script type="text/javascript">
          var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
          var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_tb_close'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>";
          var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_tb_esc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>";
        </script>
                <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
                <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
                <script type="text/javascript"><?php echo $this->redir_modal ?></script>
               </HEAD>
              </HTML>
<?php
       } 
       exit;
   } 
function renderChart($chartType, $renderID, $interval)
{
$_SESSION['scriptcase']['grafico_corrente_maior']['contr_erro'] = 'on';
  
$idChart = "id_".$chartType."_".$renderID;
?>
<script type="text/javascript">
  FusionCharts.ready(function(){
    var fusioncharts = new FusionCharts({
    id: "<?php echo $idChart; ?>",
    type: '<?php echo $chartType; ?>',
    renderAt: '<?php echo $renderID; ?>',
   width: '960',
    height: '498',
    dataFormat: 'json',
    dataSource: {
       "chart": {
        "theme": "fusion",
      	 "caption": "Corrente x Tempo",
        "subCaption": "   ",
      
        "captionFontSize": "20",
        "subcaptionFontSize": "20",
		"RealTimeValueFontSize": "20",
		 "yAxisNameFontSize": "15",  
	
  
        "baseFontColor": "#333333",
		 "yAxisName": "Corrente (A)",
		 "yAxisNameSize":" 20 ",
 		 "refreshinterval": "<?php echo $interval; ?>",
         "numberSuffix": " A ",
         "subcaptionFontBold": "0",
         "paletteColors": "#008ee4,#008ee4,#008ee4",
          "bgColor": "#ffffff",
         "canvasBgColor": "#ffffff",
         "showBorder": "0",
         "showShadow": "1",
         "showCanvasBorder": "0",
         "showRealTimeValue": "1",
         "legendBorderAlpha": "0",
         "legendShadow": "1",
		  
         "baseFont": "Helvetica sans-serif,Arial",
	
        "setadaptiveymin": "1",
        "setadaptivesymin": "1",
      
        "labeldisplay": "Rotate",
        "slantlabels": "1",
        "yaxisminvalue": "0",
        "yaxismaxvalue": "100",
    
        "divlineAlpha": "100",
        "divlineColor": "#363738",
        "showAlternateHGridColor": "0",
       "divlineThickness": "1",
        "divLineIsDashed": "1",
        "divLineDashLen": "1",
        "divLineGapLen": "1",
        "numDisplaySets": "10"
      },
     
      "dataset": [{
          "seriesname": "Corrente",
           "showvalues": "0",
          "data": [{
            "value": ""
          }]
        },
        
      ],

    },

    "events": {
        "initialized": function(e) {
            function addLeadingZero(num) {
                return (num <= 9) ? ("0" + num) : num;
            }
            var codigoInc = 10248;
            function updateData() {
                $.ajax({
                    url: "../conect_corrente/conect_corrente.php",
                    type: "POST",
                    dataType: "json",
                    data : { "codigo" : codigoInc,
                             "chart" : "<?php echo $chartType; ?>"
                            },
                    success: function(e){
                        var chartRef = FusionCharts("<?php echo $idChart; ?>"),
                            currDate = new Date(),
                            label = addLeadingZero(currDate.getHours()) + ":" +
                            addLeadingZero(currDate.getMinutes()) + ":" +
                            addLeadingZero(currDate.getSeconds()),
                            strData = "&label=" + label + "&value=" + e;
                            codigoInc = codigoInc+1;
                        chartRef.feedData(strData);
                    }
                })
                
            }

            e.sender.chartInterval = setInterval(function() {
                updateData();
            }, <?php echo $interval; ?>500);
        },
        "disposed": function(evt, arg) {
            clearInterval(evt.sender.chartInterval);
        }
    
    }
}
);
    fusioncharts.render();
});
</script>
<?php

$_SESSION['scriptcase']['grafico_corrente_maior']['contr_erro'] = 'off';
}
   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT") {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT") {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "SC_FORMAT_REGION") {
           $this->nm_data->SetaData($dt_in, strtoupper($form_in));
           $prep_out  = (strpos(strtolower($form_in), "dd") !== false) ? "dd" : "";
           $prep_out .= (strpos(strtolower($form_in), "mm") !== false) ? "mm" : "";
           $prep_out .= (strpos(strtolower($form_in), "aa") !== false) ? "aaaa" : "";
           $prep_out .= (strpos(strtolower($form_in), "yy") !== false) ? "aaaa" : "";
           return $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", $prep_out));
       }
       else {
           nm_conv_form_data($dt_out, $form_in, $form_out);
           return $dt_out;
       }
   }
} 
// 
//======= =========================
   if (!function_exists("NM_is_utf8"))
   {
       include_once("../_lib/lib/php/nm_utf8.php");
   }
   if (!function_exists("SC_dir_app_ini"))
   {
       include_once("../_lib/lib/php/nm_ctrl_app_name.php");
   }
   SC_dir_app_ini('Web_Case_IoT_V_1_12');
   $_SESSION['scriptcase']['grafico_corrente_maior']['contr_erro'] = 'off';
   $Sc_lig_md5 = false;
   $Sem_Session = (!isset($_SESSION['sc_session'])) ? true : false;
   $_SESSION['scriptcase']['sem_session'] = false;
   if (!empty($_POST))
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
                 if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                 {
                     $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                     $Sc_lig_md5 = true;
                 }
                 else
                 {
                     $_SESSION['sc_session']['SC_parm_violation'] = true;
                 }
            }
            nm_limpa_str_grafico_corrente_maior($nmgp_val);
            $nmgp_val = NM_decode_input($nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }
   if (!empty($_GET))
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
                 if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                 {
                     $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                     $Sc_lig_md5 = true;
                 }
                 else
                 {
                     $_SESSION['sc_session']['SC_parm_violation'] = true;
                 }
            }
            nm_limpa_str_grafico_corrente_maior($nmgp_val);
            $nmgp_val = NM_decode_input($nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }
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
       elseif (is_file($root . $_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_path_imag_temp'] . "/sc_apl_default_Web_Case_IoT_V_1_12.txt")) {
           $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['grafico_corrente_maior']['glo_nm_path_imag_temp'] . "/sc_apl_default_Web_Case_IoT_V_1_12.txt"));
       }
       if (isset($apl_def)) {
           if ($apl_def[0] != "grafico_corrente_maior") {
               $_SESSION['scriptcase']['sem_session'] = true;
               if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                   $_SESSION['scriptcase']['grafico_corrente_maior']['session_timeout']['redir'] = $apl_def[0];
               }
               else {
                   $_SESSION['scriptcase']['grafico_corrente_maior']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
               }
               $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
               $_SESSION['scriptcase']['grafico_corrente_maior']['session_timeout']['redir_tp'] = $Redir_tp;
           }
           if (isset($_COOKIE['sc_actual_lang_Web_Case_IoT_V_1_12'])) {
               $_SESSION['scriptcase']['grafico_corrente_maior']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_Web_Case_IoT_V_1_12'];
           }
       }
   }
   if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
   {
       $_SESSION['sc_session']['SC_parm_violation'] = true;
   }
   if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
   {
       $script_case_init = "";
   }
   if (!isset($script_case_init) || empty($script_case_init))
   {
       $script_case_init = rand(2, 10000);
   }
   $salva_iframe = false;
   if (isset($_SESSION['sc_session'][$script_case_init]['grafico_corrente_maior']['iframe_menu']))
   {
       $salva_iframe = $_SESSION['sc_session'][$script_case_init]['grafico_corrente_maior']['iframe_menu'];
       unset($_SESSION['sc_session'][$script_case_init]['grafico_corrente_maior']['iframe_menu']);
   }
   if (isset($nm_run_menu) && $nm_run_menu == 1)
   {
        if (isset($_SESSION['scriptcase']['sc_aba_iframe']) && isset($_SESSION['scriptcase']['sc_apl_menu_atual']))
        {
            foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
            {
                if ($aba == $_SESSION['scriptcase']['sc_apl_menu_atual'])
                {
                    unset($_SESSION['scriptcase']['sc_aba_iframe'][$aba]);
                    break;
                }
            }
        }
        $_SESSION['scriptcase']['sc_apl_menu_atual'] = "grafico_corrente_maior";
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'grafico_corrente_maior' || $achou)
                {
                    unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                    if (!empty($_SESSION['sc_session'][$script_case_init][$nome_apl]))
                    {
                        $achou = true;
                    }
                }
            }
            if (!$achou && isset($nm_apl_menu))
            {
                foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
                {
                    if ($nome_apl == $nm_apl_menu || $achou)
                    {
                        $achou = true;
                        if ($nome_apl != $nm_apl_menu)
                        {
                            unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                        }
                    }
                }
            }
        }
        $_SESSION['sc_session'][$script_case_init]['grafico_corrente_maior']['iframe_menu'] = true;
   }
   else
   {
       $_SESSION['sc_session'][$script_case_init]['grafico_corrente_maior']['iframe_menu'] = $salva_iframe;
   }

   if (!isset($_SESSION['sc_session'][$script_case_init]['grafico_corrente_maior']['initialize']))
   {
       $_SESSION['sc_session'][$script_case_init]['grafico_corrente_maior']['initialize'] = true;
   }
   elseif (!isset($_SERVER['HTTP_REFERER']))
   {
       $_SESSION['sc_session'][$script_case_init]['grafico_corrente_maior']['initialize'] = false;
   }
   elseif (false === strpos($_SERVER['HTTP_REFERER'], '.php'))
   {
       $_SESSION['sc_session'][$script_case_init]['grafico_corrente_maior']['initialize'] = true;
   }
   else
   {
       $sReferer = substr($_SERVER['HTTP_REFERER'], 0, strpos($_SERVER['HTTP_REFERER'], '.php'));
       $sReferer = substr($sReferer, strrpos($sReferer, '/') + 1);
       if ('grafico_corrente_maior' == $sReferer || 'grafico_corrente_maior_' == substr($sReferer, 0, 23))
       {
           $_SESSION['sc_session'][$script_case_init]['grafico_corrente_maior']['initialize'] = false;
       }
       else
       {
           $_SESSION['sc_session'][$script_case_init]['grafico_corrente_maior']['initialize'] = true;
       }
   }

   $_POST['script_case_init'] = $script_case_init;
   $STR_lang    = (isset($_SESSION['scriptcase']['str_lang']) && !empty($_SESSION['scriptcase']['str_lang'])) ? $_SESSION['scriptcase']['str_lang'] : "pt_br";
   if (isset($_SESSION['scriptcase']['grafico_corrente_maior']['session_timeout']['lang'])) {
       $STR_lang = $_SESSION['scriptcase']['grafico_corrente_maior']['session_timeout']['lang'];
   }
     $STR_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_Meadow/Sc9_Meadow";
   $NM_arq_lang = "../_lib/lang/" . $STR_lang . ".lang.php";
   $Nm_lang = array();
   if (is_file($NM_arq_lang))
   {
       $Lixo = file($NM_arq_lang);
       foreach ($Lixo as $Cada_lin) 
       {
           if (strpos($Cada_lin, "array()") === false && (trim($Cada_lin) != "<?php")  && (trim($Cada_lin) != "?" . ">"))
           {
               eval (str_replace("\$this->", "\$", $Cada_lin));
           }
       }
   }
   $_SESSION['scriptcase']['charset'] = (isset($Nm_lang['Nm_charset']) && !empty($Nm_lang['Nm_charset'])) ? $Nm_lang['Nm_charset'] : "UTF-8";
   ini_set('default_charset', $_SESSION['scriptcase']['charset']);
   foreach ($Nm_lang as $ind => $dados)
   {
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
      {
          $Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
   }
   if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'grafico_corrente_maior')
   {
       $_SESSION['sc_session'][$script_case_init]['grafico_corrente_maior']['sc_outra_jan'] = true;
        unset($_SESSION['scriptcase']['sc_outra_jan']);
   }
   $_SESSION['sc_session'][$script_case_init]['grafico_corrente_maior']['menu_desenv'] = false;   
   if (!defined("SC_ERROR_HANDLER"))
   {
       define("SC_ERROR_HANDLER", 1);
       include_once(dirname(__FILE__) . "/grafico_corrente_maior_erro.php");
   }
   if (!empty($nmgp_parms)) 
   { 
       $nmgp_parms = str_replace("@aspass@", "'", $nmgp_parms);
       $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
       $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
       $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
       $todo  = explode("?@?", $todox);
       $ix = 0;
       while (!empty($todo[$ix]))
       {
            $cadapar = explode("?#?", $todo[$ix]);
            if (1 < sizeof($cadapar))
            {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                nm_limpa_str_grafico_corrente_maior($cadapar[1]);
                if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                $Tmp_par   = $cadapar[0];;
                $$Tmp_par = $cadapar[1];
            }
            $ix++;
       }
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0;  
       if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
       { 
           $_SESSION['scriptcase']['sc_apl_seg']['grafico_corrente_maior'] = "on";
       } 
       if (!$_SESSION['sc_session'][$script_case_init]['grafico_corrente_maior']['opc_psq'] && !isset($_SESSION['scriptcase']['grafico_corrente_maior']['session_timeout']['redir'])) 
       { 
          if (!isset($_SESSION['scriptcase']['sc_apl_seg']['grafico_corrente_maior']) || $_SESSION['scriptcase']['sc_apl_seg']['grafico_corrente_maior'] != "on")
          { 
              $NM_Mens_Erro = $Nm_lang['lang_errm_unth_user'];
              $nm_botao_ok = ($_SESSION['sc_session'][$script_case_init]['grafico_corrente_maior']['iframe_menu']) ? false : true;
              if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
              {
                  foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
                  {
                      if (in_array("grafico_corrente_maior", $apls_aba))
                      {
                          $nm_botao_ok = false;
                           break;
                      }
                  }
              }
              $str_schema_app = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_Meadow/Sc9_Meadow";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
              <HTML>
               <HEAD>
                <TITLE></TITLE>
               <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
              if ($_SESSION['scriptcase']['proc_mobile'])
              {
?>
                <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
              }
?>
                <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>                <META http-equiv="Pragma" content="no-cache"/>
                <link rel="shortcut icon" href="../_lib/img/usr__NM__ico__NM__1132icone - Logo_Prancheta 1.ico">
                <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $str_schema_app ?>_grid.css" /> 
                <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $str_schema_app ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
               </HEAD>
               <body>
                <table align="center" class="scGridBorder"><tr><td style="padding: 0">
                <table style="width: 100%" class="scGridTabela"><tr class="scGridFieldOdd"><td class="scGridFieldOddFont" style="padding: 15px 30px; text-align: center">
                 <?php echo $NM_Mens_Erro; ?>
<?php
              if ($nm_botao_ok)
              {
?>
                <br />
                <form name="Fseg" method="post" 
                                    action="<?php echo $nm_url_saida; ?>" 
                                    target="_self"> 
                 <input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($script_case_init) ?>"/> 
                 <input type="submit" name="sc_sai_seg" value="OK"> 
                </form> 
<?php
              }
?>
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
    <?php echo $Nm_lang['lang_errm_unth_hwto']; ?>
   </td>
  </tr>
 </table>
</td></tr></table>
<?php
              }
?>
               </body>
              </HTML>
<?php
              exit;
          } 
       } 
   $contr_grafico_corrente_maior = new grafico_corrente_maior_apl();
   $contr_grafico_corrente_maior->controle();
//
   function nm_limpa_str_grafico_corrente_maior(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               foreach ($str as $x => $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
?>
