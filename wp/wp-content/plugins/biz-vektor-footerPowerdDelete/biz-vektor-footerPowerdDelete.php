<?php
/*
Plugin Name: BizVektor FooterPowerdDelete
Plugin URI: 
Description: BizVektorのPowerd（コピーライト）表記を削除するアクティベーションキーです。BizVektor本体のライセンスはGPLですので、本体ファイルから該当箇所を直接削除していただく事はライセンス上問題ありませんが、バージョンアップの度に手動で変更した箇所を毎回修正する必要が出てきますので、その手間を解消する為のプラグインだと認識いただけると幸いです。
Author: Vektor,Inc.
Author URI: http://bizVektor.com
Version: 0.1
*/

add_filter('footerPowerdCustom','footerPowerdDelete');
function footerPowerdDelete($footerPowerd){
	$footerPowerd = null;
	return $footerPowerd;
}
?>