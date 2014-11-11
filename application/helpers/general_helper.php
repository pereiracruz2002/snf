<?php

function box($type, $titulo, $mensagem = null) {
    if ($mensagem)
        $mensagem = "<h2>{$titulo}</h2>{$mensagem}";
    else
        $mensagem = $titulo;

    return '<div class="alert alert-' . $type . '">' . $mensagem . '</div>';
}

function get_from($from, $id) {
    $ci = & get_instance();
    $model = $from['model'];
    $ci->load->model($model . '_model', $model);
    if ($id) {
        $result = $ci->$model->get($id)->row();
        return $result->{$from['value']};
    } else {
        return "Nenhum";
    }
}

function box_alert($titulo, $mensagem = null) {
    return box('danger', $titulo, $mensagem);
}

function box_success($titulo, $mensagem = null) {
    return box('success', $titulo, $mensagem);
}

function formata_data($data) {
    if ($data) {
        if (strstr($data, "/")) {
            $A = explode("/", $data);
            $V_data = $A[2] . "-" . $A[1] . "-" . $A[0];
        } else {
            $A = explode("-", $data);
            $V_data = $A[2] . "/" . $A[1] . "/" . $A[0];
        }
        return $V_data;
    }
    return FALSE;
}

function formata_time($time, $separar = " ") {
    if (!is_null($time)) {
        $data = explode(" ", $time);
        if (strstr($data[0], "-")) {
            $A = explode("-", $data[0]);
            $V_data = $A[2] . "/" . $A[1] . "/" . $A[0];
        } else {
            $A = explode("/", $data[0]);
            $V_data = $A[2] . "-" . $A[1] . "-" . $A[0];
        }
        if (count($data) < 2) {
            $data[1] = "00:00:00";
        }
        return $V_data . $separar . $data[1];
    }
    return FALSE;
}

function data_extenso($data) {
    if (!is_null($data) and $data != '0000-00-00' and $data != '00/00/0000') {
        $aDia = explode(' ', $data);
        if (strstr($aDia[0], '-'))
            $dia = explode('-', $aDia[0]);
        else {
            $dia = explode('/', $aDia[0]);
            krsort($dia);
        }
        $aMes = array("01" => 'Janeiro',
            "02" => 'Fevereiro',
            "03" => 'Março',
            "04" => 'Abril',
            "05" => 'Maio',
            "06" => 'Junho',
            "07" => 'Julho',
            "08" => 'Agosto',
            "09" => 'Setembro',
            "10" => 'Outubro',
            "11" => 'Novembro',
            "12" => 'Dezembro'
        );
        $arSemana = array('Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado');
        $diasemana = date('w', strtotime($dia[0] . '-' . $dia[1] . '-' . $dia[2]));
        return $arSemana[$diasemana] . ', ' . $dia[2] . ' de ' . $aMes[$dia[1]] . ' de ' . $dia[0];
    }
    return "Essa data parece que não existe. ({$data})";
}

function mes($mes) {
    $aMes = array("01" => 'Janeiro',
        "02" => 'Fevereiro',
        "03" => 'Março',
        "04" => 'Abril',
        "05" => 'Maio',
        "06" => 'Junho',
        "07" => 'Julho',
        "08" => 'Agosto',
        "09" => 'Setembro',
        "10" => 'Outubro',
        "11" => 'Novembro',
        "12" => 'Dezembro'
    );
    return $aMes[$mes];
}

function formata_valor($valor) {
    if (!$valor)
        return false;
    $formato = strstr($valor, ',');
    if ($formato) {
        return str_replace(",", ".", str_replace(".", "", $valor));
    } else {
        return number_format($valor, 2, ',', '.');
    }
}

function formata_porcentagem($valor) {
    $v = explode(".", $valor);
    if ($v[1] != "00")
        return formata_valor($valor);
    else
        return $v[0];
}

if (!function_exists('force_ssl')) {

    function force_ssl() {
        if ($_SERVER['SERVER_NAME'] != 'localhost') {
            $CI = & get_instance();
            $CI->config->config['base_url'] = str_replace('http://', 'https://', $CI->config->config['base_url']);
            if ($_SERVER['SERVER_PORT'] != 443) {
                redirect($CI->uri->uri_string());
            }
        }
    }

}

function base_ssl() {
    return str_replace('http://', 'https://', base_url());
}

function site_ssl($url) {
    return str_replace('http://', 'https://', site_url($url));
}

function order_array_num($array, $key, $order = "ASC") {
    $tmp = array();
    foreach ($array as $akey => $array2)
        $tmp[$akey] = str_replace(",", ".", str_replace(".", "", $array2[$key]));

    if ($order == "DESC")
        arsort($tmp, SORT_NUMERIC);
    else
        asort($tmp, SORT_NUMERIC);

    $tmp2 = array();
    foreach ($tmp as $key => $value)
        $tmp2[$key] = $array[$key];

    return $tmp2;
}

function preenche_form(&$campos, $dados) {
    $ci = & get_instance();

    foreach ($campos as $key => $val) {
        if (is_array($dados)) {
            if (isset($val['class']) and strstr($val['class'], 'data'))
                $campos[$key]['value'] = formata_data($dados[$key]);
            elseif (isset($val['class']) and strstr($val['class'], 'valor'))
                $campos[$key]['value'] = formata_valor($dados[$key]);
            elseif (isset($val['class']) and strstr($val['class'], 'date_time'))
                $campos[$key]['value'] = formata_time($dados[$key]);
            elseif (isset($val['class']) and strstr($val['type'], 'password'))
                $campos[$key]['value'] = $ci->encrypt->decode($dados[$key]);
            else
                $campos[$key]['value'] = (isset($dados[$key]) ? $dados[$key] : '');
        }else {
            if (isset($val['class']) and strstr($val['class'], 'data'))
                $campos[$key]['value'] = formata_data($dados->{$key});
            elseif (isset($val['class']) and strstr($val['class'], 'valor'))
                $campos[$key]['value'] = formata_valor($dados->{$key});
            elseif (isset($val['class']) and strstr($val['class'], 'date_time'))
                $campos[$key]['value'] = formata_time($dados->{$key});
            elseif (isset($val['class']) and strstr($val['type'], 'password'))
                $campos[$key]['value'] = (isset($dados->{$key}) ? $ci->encrypt->decode($dados->{$key}) : '');
            else
                $campos[$key]['value'] = (isset($dados->{$key}) ? $dados->{$key} : '');
        }
    }
}

function _pre_valor($fields, &$data) {
    foreach ($data as $key => $val) {
        if (array_key_exists($key, $fields))
            if (strstr($fields[$key]['class'], "valor"))
                $data[$key] = formata_valor($val);
    }
}

function _pre_data($fields, &$data) {
    foreach ($data as $key => $val) {
        if (array_key_exists($key, $fields))
            if (strstr($fields[$key]['class'], "data"))
                $data[$key] = formata_data($val);
    }
}

function _pre_time($fields, &$data) {
    foreach ($data as $key => $val) {
        if (array_key_exists($key, $fields))
            if (strstr($fields[$key]['class'], "time"))
                $data[$key] = formata_time($val);
    }
}

function dohash($string) {
    if ((isset($string)) && (is_string($string))) {
        $enc_string = base64_encode($string);
        $enc_string = str_replace("=", "", $enc_string);
        $enc_string = strrev($enc_string);
        $md5 = md5($string);
        $enc_string = substr($md5, 0, 3) . $enc_string . substr($md5, -3);
    } else {
        $enc_string = "Parâmetro incorreto ou inexistente!";
    }
    return $enc_string;
}

function unhash($string) {
    if ((isset($string)) && (is_string($string))) {
        $ini = substr($string, 0, 3);
        $end = substr($string, -3);
        $des_string = substr($string, 0, -3);
        $des_string = substr($des_string, 3);
        $des_string = strrev($des_string);
        $des_string = base64_decode($des_string);
        $md5 = md5($des_string);
        $ver = substr($md5, 0, 3) . substr($md5, -3);
        if ($ver != $ini . $end) {
            $des_string = "Erro na desencriptação!";
        }
    } else {
        $des_string = "Parâmetro incorreto ou inexistente!";
    }
    return $des_string;
}

function diffDate($d1, $d2, $type = '', $sep = '-') {
    $d1 = explode($sep, $d1);
    $d2 = explode($sep, $d2);
    switch ($type) {
        case 'A':
            $X = 31536000;
            break;
        case 'M':
            $X = 2592000;
            break;
        case 'D':
            $X = 86400;
            break;
        case 'H':
            $X = 3600;
            break;
        case 'MI':
            $X = 60;
            break;
        default:
            $X = 1;
    }
    $f1 = mktime(0, 0, 0, $d2[1], $d2[2], $d2[0]);
    $f2 = mktime(0, 0, 0, $d1[1], $d1[2], $d1[0]);

    $ret = floor(($f1 - $f2) / $X);
    return $ret;
}

function abreviaString($texto, $limite = 100, $tres_p = '...') {
    $totalCaracteres = 0;
    $vetorPalavras = explode(" ", $texto);
    if (strlen($texto) <= $limite) {
        $tres_p = "";
        $novoTexto = $texto;
    } else {
        $novoTexto = "";
        for ($i = 0; $i < count($vetorPalavras); $i++) {
            $totalCaracteres += strlen(" " . $vetorPalavras[$i]);
            if ($totalCaracteres <= $limite)
                $novoTexto .= ' ' . $vetorPalavras[$i];
        }
    }
    return $novoTexto . $tres_p;
}

function retirar_acentos($string) {
    if (isset($string)) {
        $string = trim($string);
        $string = strtolower($string);
        $string = str_replace(array("à", "á", "â", "ã", "ä", "è", "é", "ê", "ë", "ì", "í", "î", "ï", "ò", "ó", "ô", "õ", "ö", "ù", "ú", "û", "ü", "À", "Á", "Â", "Ã", "Ä", "È", "É", "Ê", "Ë", "Ì", "Í", "Î", "Ò", "Ó", "Ô", "Õ", "Ö", "Ù", "Ú", "Û", "Ü", "ç", "Ç", "ñ", "Ñ"), array("a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u", "A", "A", "A", "A", "A", "E", "E", "E", "E", "I", "I", "I", "O", "O", "O", "O", "O", "U", "U", "U", "U", "c", "C", "n", "N"), $string);
        $string = preg_replace("/[^0-9a-z\s]/i", "", $string);
        $string = str_replace(" ", "-", $string);
        return $string;
    }
    return false;
}

