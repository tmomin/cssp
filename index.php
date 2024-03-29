<!DOCTYPE html>

<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->

<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->

<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->

<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->

<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->

<!--    

    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

    <script type="text/javascript" charset="utf-8">

    /**

    * jQuery.browser.mobile (http://detectmobilebrowser.com/)

    * jQuery.browser.mobile will be true if the browser is a mobile device

    **/

    (function(a){jQuery.browser.mobile=/android.+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))})(navigator.userAgent||navigator.vendor||window.opera);

    

    if(jQuery.browser.mobile)

    {

        alert('You are using a mobile device!');

    }

    else

    {

        alert('You are not using a mobile device!');

    }

    </script>



-->

<?php



include 'includes/mobile_detect.php';

$detect = new Mobile_Detect();



if ($detect->isMobile()) {

    echo "Mobile";

}

else {

    echo "Desktop";

}



?>



    <head>

		<meta charset="UTF-8" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 

        <title>CSS buttons with pseudo-elements</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <meta name="description" content="CSS buttons with pseudo-elements" />

        <meta name="keywords" content="css, css3, pseudo, buttons, anchor, before, after, web design" />

        <meta name="author" content="Sergio Camalich for Codrops" />

        <link rel="shortcut icon" href="../favicon.ico"> 

        <link rel="stylesheet" type="text/css" href="css/demo2.css" />

        <link rel="stylesheet" type="text/css" href="css/style1.css" />

		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    </head>

    <body>

        <div class="container">

			<!-- Codrops top bar -->

            <div class="codrops-top">

                <a href="http://tympanus.net/Tutorials/AnimatedWebBanners/">

                    <strong>&laquo; Previous Demo: </strong>Animated Web Banners With CSS3

                </a>

                <span class="right">

                    <a href="http://tympanus.net/codrops/2012/01/11/css-buttons-using-pseudo-elements/">

                        <strong>Back to the Codrops Article</strong>

                    </a>

                </span>

                <div class="clr"></div>

            </div><!--/ Codrops top bar -->

			<header>

                <h1>CSS <span>buttons</span></h1>

                <h2>using pseudo-elements</h2>

                <nav class="codrops-demos">

					<a class="current" href="index2.html">Demo 1</a>

					<a href="index2.html">Demo 2</a>

					<a href="index3.html">Demo 3</a>

					<a href="index4.html">Demo 4</a>

					<a href="index5.html">Demo 5</a>

                <nav>

			</header>

			<section>

                <div id="container_buttons">

                    <p>

                        <a href="#" class="a_demo_one">

                            Click me!

                        </a>

                    </p>

                    <p>

                        <a href="#" class="a_demo_one">

                            Come on, don't be afraid

                        </a>

                    </p>

                    <p>

                        <a href="#" class="a_demo_one">

                            You can make this as wide as you want ;)

                        </a>

                    </p>

                </div>

			</section>

        </div>

    </body>

</html>