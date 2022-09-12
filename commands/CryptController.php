<?php

namespace app\commands;

use tiagocomti\cryptbox\Cryptbox;
use yii\console\Controller;

class CryptController extends Controller
{
    public function actionSymmetrical($text, $secret="12345678a"){
        echo "Item para criptografar: ". $text;
        echo "\n";
        echo "Senha que será utilizada para criptografar: ".$secret;
        echo "\n";
        echo "Item ja com criptografia: ";
        print_r($cipher = Cryptbox::easyEncrypt($text, $secret));
        echo "\n";

        echo "Utilizando a mesma chave para descriptografar:". $secret;
        echo "\n";
        echo "resultado final: ";
        echo Cryptbox::easyDecrypt($cipher, $secret);
        echo "\n";
    }

    /**
     * @throws \SodiumException
     */
    public function actionAsymmetric($text, $privateKey = false){
        if(!$privateKey)
            $crypt = Cryptbox::generateKeyPair("saltSuperSupinpa");
        else
            $crypt = new Cryptbox($privateKey);

        echo "Item para criptografar: ". $text;
        echo "\n";
        echo "Gerando chave publica: ".$crypt->public_key_hex;
        echo "\n";
        echo "Gerando uma chave privada: ".$crypt->private_key_hex;
        echo "\n";
        echo "Cipher gerado por uma criptografia assimetrica utilizando a pubkey:";
        print_r($cipher = Cryptbox::encryptByPublicK($text, $crypt->public_key));
        echo "\n";
        echo "Voltando o cipher para texto baseado na private key:";
        print_r(Cryptbox::decryptByPrivateK($cipher, $crypt->private_key));
        echo "\n";
    }
}