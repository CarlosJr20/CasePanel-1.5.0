<?php
   session_cache_limiter("");
   session_start();
   ini_set('default_charset', $_SESSION['scriptcase']['charset']);
   if (!function_exists("NM_is_utf8"))
   {
       include_once("../_lib/lib/php/nm_utf8.php");
   }
          include_once("../_lib/lib/php/fix.php");
   if (!empty($_GET))
   {
       foreach ($_GET as $nmgp_var => $nmgp_val)
       {
            $$nmgp_var = $nmgp_val;
       }
   }
   $Sc_lig_md5 = false;
   if (isset($nmgp_parms) && substr($nmgp_parms, 0, 8) == "@SC_par@")
   {
        $SC_Ind_Val = explode("@SC_par@", $nmgp_parms);
        if (count($SC_Ind_Val) == 4 )
        {
         if(isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]])){
            $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
            $script_case_init = $SC_Ind_Val[1];
            $Sc_lig_md5 = true;
             if(strpos($nmgp_val,'?@?') !== FALSE) {
                 $todo  = explode("?@?", $nmgp_val);
                 foreach ($todo as $param)
                 {
                     $cadapar = explode("?#?", $param);
                     $Tmp_par   = $cadapar[0];
                     $$Tmp_par = $cadapar[1];
                 }
             } else{
                 $nm_cod_doc  = $SC_Ind_Val[3];
                 $nm_nome_doc = base64_encode( basename($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]) );
                 $nm_cod_apl  = $SC_Ind_Val[2];
             }
         }
       }
   }
   if (!$Sc_lig_md5 || !isset($nm_cod_doc) || !isset($nm_nome_doc) || !isset($nm_cod_apl))
   {
       exit;
   }
   $nm_nome_doc = str_replace("**Ecom**", "&", $nm_nome_doc);
   $nm_nome_doc = str_replace("**Jvel**", "#", $nm_nome_doc);
   $nm_nome_doc = str_replace("**Plus**", "+", $nm_nome_doc);
   $nm_nome_doc = base64_decode($nm_nome_doc);
       $NM_dir_atual = getcwd();
       if (empty($NM_dir_atual))
       {
          $str_path_sys    = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
          $str_path_sys    = str_replace("\\", '/', $str_path_sys);
       }
       else
       {
           $sc_nm_arquivo = explode("/", $_SERVER['PHP_SELF']);
           $str_path_sys  = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
       }
       $str_path_web  = $_SERVER['PHP_SELF'];
       $str_path_web  = str_replace("\\", '/', $str_path_web);
       $root          = substr($str_path_sys, 0, -1 * strlen($str_path_web));
   if ($nm_cod_doc == "documento_db")
   {
       $trab_doc      = substr($nm_nome_doc, 0, strpos($nm_nome_doc, "__NM__"));
       $trab_doc      = $root . $_SESSION['scriptcase']['app_logged_users']['glo_nm_path_imag_temp'] . "/sc_" . $trab_doc;
       $nm_nome_doc   = substr($nm_nome_doc, strpos($nm_nome_doc, "__NM__") + 6);
   }
   else
   {
       $path_raiz = $_SESSION['sc_session'][$script_case_init][$nm_cod_apl]['path_doc'];
       $sub_path  = isset($_SESSION['sc_session'][$script_case_init][$nm_cod_apl]['sub_dir'][$nm_cod_doc]) ?$_SESSION['sc_session'][$script_case_init][$nm_cod_apl]['sub_dir'][$nm_cod_doc] : '';
       $trab_doc = $path_raiz . '/'.$sub_path . "/" . $nm_nome_doc;
       $trab_doc = str_replace("\\", "/", $trab_doc);
       $trab_doc = str_replace("//", "/", $trab_doc);
       $trab_cache = $root.$nm_cod_doc;
       if(!file_exists($trab_doc) && file_exists($trab_cache )){
         $trab_doc = $trab_cache;
       }
   }
   if (is_file($trab_doc))  
   { 
       $aDownloadInfo = getDownloadInfo($nm_nome_doc);
       header("Content-Type: text/html; charset=utf-8");
       header("Pragma: public", true);
       header("Content-type: application/force-download");
       header($aDownloadInfo['header'][ $aDownloadInfo['browser'] ]);
       readfile($trab_doc);
   } 
   else 
   { 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
       <html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
       <HEAD>
          <TITLE></TITLE>
        <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
        <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
        <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s") ?> GMT"/>
        <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
        <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
        <META http-equiv="Pragma" content="no-cache"/>
       </HEAD>
         <body><table><tr><td>
<?php
       $STR_lang    = (isset($_SESSION['scriptcase']['str_lang']) && !empty($_SESSION['scriptcase']['str_lang'])) ? $_SESSION['scriptcase']['str_lang'] : "pt_br";
       $NM_arq_lang = "../_lib/lang/" . $STR_lang . ".lang.php";
       if (!function_exists("NM_is_utf8"))
       {
           include_once("../_lib/lib/php/nm_utf8.php");
       }
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
       $_SESSION['scriptcase']['charset']  = (isset($Nm_lang['Nm_charset']) && !empty($Nm_lang['Nm_charset'])) ? $Nm_lang['Nm_charset'] : "UTF-8";
       foreach ($Nm_lang as $ind => $dados)
       {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
          {
               $Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
       }
       echo $Nm_lang['lang_errm_fnfd'] . ": " . $nm_nome_doc;
?>
         </td></tr></table></body>
         </html>
<?php
   } 
    function getDownloadInfo($sOriginal)
    {
        $aInfo = array(
            'browser' => 'rest',
            'version' => '',
            'browser_flags' => array(
                'is_chrome'  => false,
                'is_firefox' => false,
                'is_ie'      => false,
                'is_safari'  => false,
            ),
            'filename' => array(
                'original' => $sOriginal,
                'convert'  => $sOriginal,
                'chrome'   => '',
                'firefox1' => '',
                'firefox2' => '',
                'ie'       => '',
                'safari'   => '',
            ),
            'header' => array(
                'chrome'  => '',
                'firefox' => '',
                'ie'      => '',
                'safari'  => '',
                'rest'    => '',
            ),
        );

        if (isset($_SERVER['HTTP_USER_AGENT']))
        {
            $aInfo['browser_flags']['is_chrome']  = false !== strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'chrome');
            $aInfo['browser_flags']['is_firefox'] = false !== strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'firefox');
            $aInfo['browser_flags']['is_safari']  = false !== strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'safari');
            preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $matches);
            if (count($matches) < 2)
            {
                preg_match('/Trident\/\d{1,2}.\d{1,2}; rv:([0-9]*)/', $_SERVER['HTTP_USER_AGENT'], $matches);
            }
            if (count($matches) > 1)
            {
                $aInfo['browser_flags']['is_ie'] = true;
                $aInfo['version']                = $matches[1];
            }

            if ($aInfo['browser_flags']['is_chrome'])
            {
                $aInfo['browser'] = 'chrome';
            }
            elseif ($aInfo['browser_flags']['is_firefox'])
            {
                $aInfo['browser'] = 'firefox';
            }
            elseif ($aInfo['browser_flags']['is_ie'])
            {
                $aInfo['browser'] = 'ie';
            }
            elseif ($aInfo['browser_flags']['is_safari'])
            {
                $aInfo['browser'] = 'safari';
            }
        }

        if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
        {
            $aInfo['filename']['convert'] = sc_convert_encoding($aInfo['filename']['convert'], 'UTF-8', $_SESSION['scriptcase']['charset']);
        }
        $aInfo['filename']['chrome']   = $aInfo['filename']['convert'];
        $aInfo['filename']['firefox1'] = $aInfo['filename']['convert'];
        $aInfo['filename']['firefox2'] = $aInfo['filename']['original'];
        $aInfo['filename']['safari']   = $aInfo['filename']['convert'];
        $aInfo['filename']['ie']       = sc_filename_protect_chars($aInfo['filename']['original']);
        $aInfo['filename']['ie']       = urlencode($aInfo['filename']['ie']);
        $aInfo['filename']['ie']       = sc_filename_unprotect_chars($aInfo['filename']['ie']);

        $aInfo['header']['chrome']  = "Content-Disposition: attachment; filename=\"" . $aInfo['filename']['chrome']   . "\"";
        $aInfo['header']['firefox'] = "Content-Disposition: attachment; filename=\"" . $aInfo['filename']['firefox1'] . "\" filename*=UTF-8''" . $aInfo['filename']['firefox2'];
        $aInfo['header']['ie']      = "Content-Disposition: attachment; filename=\"" . $aInfo['filename']['ie']       . "\"";
        $aInfo['header']['safari']  = "Content-Disposition: attachment; filename=\"" . $aInfo['filename']['safari']   . "\"";
        $aInfo['header']['rest']    = "Content-Disposition: attachment; filename=\"" . $aInfo['filename']['original'] . "\"";

        return $aInfo;
    }
    function sc_filename_protect_chars($sFilename) {
        $aProtectBasic = array(
            "'" => '__SC_QUOTES__',
            ' ' => '__SC_SPACE__',
            '!' => '__SC_EXCLAMATION__',
            ',' => '__SC_COMMA__',
            '-' => '__SC_MINUS__',
            '+' => '__SC_PLUS__',
            '=' => '__SC_EQUAL__',
            '(' => '__SC_PARENTHESIS_LEFT__',
            ')' => '__SC_PARENTHESIS_RIGHT__',
            '[' => '__SC_BRACKET_LEFT__',
            ']' => '__SC_BRACKET_RIGHT__',
            '{' => '__SC_CURLYBRACE_LEFT__',
            '}' => '__SC_CURLYBRACE_RIGHT__',
            '&' => '__SC_AMPERSAND__',
            '%' => '__SC_PERCENT__',
            '$' => '__SC_DOLLAR__',
            '#' => '__SC_NUMBER__',
            '@' => '__SC_AT__',
            ';' => '__SC_SEMMICOLON__',
            '~' => '__SC_TILDE__',
            '^' => '__SC_CARET__',
            '*' => '__SC_ASTERISK__',
        );
        $aProtectUtf8 = array(
            '??' => '__SC_ACUTE__',
            '`' => '__SC_GRAVE__',
            '??' => '__SC_UMLAUT__',
            '??' => '__SC_aACUTE__',
            '??' => '__SC_aGRAVE__',
            '??' => '__SC_aTILDE__',
            '??' => '__SC_aCARET__',
            '??' => '__SC_aUMLAUT__',
            '??' => '__SC_AACUTE__',
            '??' => '__SC_AGRAVE__',
            '??' => '__SC_ATILDE__',
            '??' => '__SC_ACARET__',
            '??' => '__SC_AUMLAUT__',
            '??' => '__SC_eACUTE__',
            '??' => '__SC_eGRAVE__',
            '??' => '__SC_eCARET__',
            '??' => '__SC_eUMLAUT__',
            '??' => '__SC_EACUTE__',
            '??' => '__SC_EGRAVE__',
            '??' => '__SC_ECARET__',
            '??' => '__SC_EUMLAUT__',
            '??' => '__SC_iACUTE__',
            '??' => '__SC_iGRAVE__',
            '??' => '__SC_iCARET__',
            '??' => '__SC_iUMLAUT__',
            '??' => '__SC_IACUTE__',
            '??' => '__SC_IGRAVE__',
            '??' => '__SC_ICARET__',
            '??' => '__SC_IUMLAUT__',
            '??' => '__SC_oACUTE__',
            '??' => '__SC_oGRAVE__',
            '??' => '__SC_oTILDE__',
            '??' => '__SC_oCARET__',
            '??' => '__SC_oUMLAUT__',
            '??' => '__SC_OACUTE__',
            '??' => '__SC_OGRAVE__',
            '??' => '__SC_OTILDE__',
            '??' => '__SC_OCARET__',
            '??' => '__SC_OUMLAUT__',
            '??' => '__SC_uACUTE__',
            '??' => '__SC_uGRAVE__',
            '??' => '__SC_uCARET__',
            '??' => '__SC_uUMLAUT__',
            '??' => '__SC_UACUTE__',
            '??' => '__SC_UGRAVE__',
            '??' => '__SC_UCARET__',
            '??' => '__SC_UUMLAUT__',
            '??' => '__SC_yACUTE__',
            '??' => '__SC_yUMLAUT__',
            '??' => '__SC_YACUTE__',
            '??' => '__SC_cCEDILLA__',
            '??' => '__SC_CCEDILLA__',
            '??' => '__SC_nTILDE__',
            '??' => '__SC_NTILDE__',
        );
        if (isset($_SESSION['scriptcase']['charset']) && $_SESSION['scriptcase']['charset'] != 'UTF-8')
        {
            $aTmpList = array();
            foreach ($aProtectUtf8 as $sChar => $sCode)
            {
                $aTmpList[ NM_conv_charset($sChar, $_SESSION['scriptcase']['charset'], 'UTF-8') ] = $sCode;
            }
            $aProtectUtf8 = $aTmpList;
        }
        $sFilename = str_replace(array_keys($aProtectBasic), array_values($aProtectBasic), $sFilename);
        $sFilename = str_replace(array_keys($aProtectUtf8),  array_values($aProtectUtf8),  $sFilename);
        return $sFilename;
    }

    function sc_filename_unprotect_chars($sFilename) {
        $aProtectBasic = array(
            "'" => '__SC_QUOTES__',
            ' ' => '__SC_SPACE__',
            '!' => '__SC_EXCLAMATION__',
            ',' => '__SC_COMMA__',
            '-' => '__SC_MINUS__',
            '+' => '__SC_PLUS__',
            '=' => '__SC_EQUAL__',
            '(' => '__SC_PARENTHESIS_LEFT__',
            ')' => '__SC_PARENTHESIS_RIGHT__',
            '[' => '__SC_BRACKET_LEFT__',
            ']' => '__SC_BRACKET_RIGHT__',
            '{' => '__SC_CURLYBRACE_LEFT__',
            '}' => '__SC_CURLYBRACE_RIGHT__',
            '&' => '__SC_AMPERSAND__',
            '%' => '__SC_PERCENT__',
            '$' => '__SC_DOLLAR__',
            '#' => '__SC_NUMBER__',
            '@' => '__SC_AT__',
            ';' => '__SC_SEMMICOLON__',
            '~' => '__SC_TILDE__',
            '^' => '__SC_CARET__',
            '*' => '__SC_ASTERISK__',
        );
        $aProtectUtf8 = array(
            '??' => '__SC_ACUTE__',
            '`' => '__SC_GRAVE__',
            '??' => '__SC_UMLAUT__',
            '??' => '__SC_aACUTE__',
            '??' => '__SC_aGRAVE__',
            '??' => '__SC_aTILDE__',
            '??' => '__SC_aCARET__',
            '??' => '__SC_aUMLAUT__',
            '??' => '__SC_AACUTE__',
            '??' => '__SC_AGRAVE__',
            '??' => '__SC_ATILDE__',
            '??' => '__SC_ACARET__',
            '??' => '__SC_AUMLAUT__',
            '??' => '__SC_eACUTE__',
            '??' => '__SC_eGRAVE__',
            '??' => '__SC_eCARET__',
            '??' => '__SC_eUMLAUT__',
            '??' => '__SC_EACUTE__',
            '??' => '__SC_EGRAVE__',
            '??' => '__SC_ECARET__',
            '??' => '__SC_EUMLAUT__',
            '??' => '__SC_iACUTE__',
            '??' => '__SC_iGRAVE__',
            '??' => '__SC_iCARET__',
            '??' => '__SC_iUMLAUT__',
            '??' => '__SC_IACUTE__',
            '??' => '__SC_IGRAVE__',
            '??' => '__SC_ICARET__',
            '??' => '__SC_IUMLAUT__',
            '??' => '__SC_oACUTE__',
            '??' => '__SC_oGRAVE__',
            '??' => '__SC_oTILDE__',
            '??' => '__SC_oCARET__',
            '??' => '__SC_oUMLAUT__',
            '??' => '__SC_OACUTE__',
            '??' => '__SC_OGRAVE__',
            '??' => '__SC_OTILDE__',
            '??' => '__SC_OCARET__',
            '??' => '__SC_OUMLAUT__',
            '??' => '__SC_uACUTE__',
            '??' => '__SC_uGRAVE__',
            '??' => '__SC_uCARET__',
            '??' => '__SC_uUMLAUT__',
            '??' => '__SC_UACUTE__',
            '??' => '__SC_UGRAVE__',
            '??' => '__SC_UCARET__',
            '??' => '__SC_UUMLAUT__',
            '??' => '__SC_yACUTE__',
            '??' => '__SC_yUMLAUT__',
            '??' => '__SC_YACUTE__',
            '??' => '__SC_cCEDILLA__',
            '??' => '__SC_CCEDILLA__',
            '??' => '__SC_nTILDE__',
            '??' => '__SC_NTILDE__',
        );
        if (isset($_SESSION['scriptcase']['charset']) && $_SESSION['scriptcase']['charset'] != 'UTF-8')
        {
            $aTmpList = array();
            foreach ($aProtectUtf8 as $sChar => $sCode)
            {
                $aTmpList[ NM_conv_charset($sChar, $_SESSION['scriptcase']['charset'], 'UTF-8') ] = $sCode;
            }
            $aProtectUtf8 = $aTmpList;
        }
        $sFilename = str_replace(array_values($aProtectBasic), array_keys($aProtectBasic), $sFilename);
        $sFilename = str_replace(array_values($aProtectUtf8),  array_keys($aProtectUtf8),  $sFilename);
        return $sFilename;
    }
   exit;
?>
