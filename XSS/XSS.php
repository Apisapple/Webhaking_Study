<?php

header ("X-XSS-Protection: 0");

// Is there any input?
if( array_key_exists( "name", $_GET ) && $_GET[ 'name' ] != NULL ) {
	// Get input
    $name = preg_replace( '/<(.*)s(.*)c(.*)r(.*)i(.*)p(.*)t/i', '', $_GET[ 'name' ] );
    // $solve = "solve()";
    // // echo $name;
    // if(strpos($name, $solve) !== false){
	// 	echo '<script>
	// 		alert("flag:{ITISEASY~~!!~!}");
	// 	</script>';
	// }else{
	echo '<script>
		var _0x68d6=["\x66\x6C\x61\x67\x3A\x7B\x49\x54\x49\x53\x45\x41\x53\x59\x7E\x7E\x21\x21\x7E\x21\x7D"];function solve(){alert(_0x68d6[0])};
	</script>';
		echo "<pre>Hello ${name}</pre>";
	// }
}

?>

