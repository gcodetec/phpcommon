<?php

if( !function_exists('format_cnpf') ){
    /**
     * funcção para retornar um cnpj formatado
     **/
    function format_cnpj($cnpj){
        return mask($cnpj,'##.###.###/####-##');
    }
}

if( !function_exists('format_cpf') ){
    /**
     * funcção para retornar um cpf formatado
     **/
    function format_cpf($cpf){
        return mask($cpf, '###.###.###-##');
    }
}

if( !function_exists('format_cep') ){
    /**
     * funcção para retornar um cep formatado
     **/
    function format_cep($cep){
        return mask($cep, '#####-###');
    }
}

if( !function_exists('format_rg') ){
    /**
     * funcção para retornar um rg formatado
     **/
    function format_rg($rg){
        return mask($rg, '########-##');
    }
}

if( !function_exists('remove_formatting') ){
    /**
     * function to remove the formats
     **/
    function remove_formatacao($numero) {
        $numero = str_replace(['.', '-', '/', ','], '', $numero);
        return $numero;
    }
}

if(!function_exists('is_brazilian_format')) {
    function is_brazilian_format($data) {
        return strpos($data, '/');
    }
}

function mask($val, $mask)
{
    $maskared = '';
    $k = 0;
    for($i = 0; $i<=strlen($mask)-1; $i++){
        if($mask[$i] == '#'){
            if(isset($val[$k]))
                $maskared .= $val[$k++];
        }else{
            if(isset($mask[$i]))
                $maskared .= $mask[$i];
        }
    }
    return $maskared;
}
