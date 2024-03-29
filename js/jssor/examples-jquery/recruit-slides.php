﻿    <script type="text/javascript" src="js/jssor/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jssor/js/jssor.slider.min.js"></script>

    <script>

        jQuery(document).ready(function ($) {
            function InitSlider1() {

                var options = {
                    $AutoPlay: true,                                    //[Optional] Auto play or not, to enable slideshow, this option must be set to greater than 0. Default value is 0. 0: no auto play, 1: continuously, 2: stop at last slide, 4: stop on click, 8: stop on user navigation (by arrow/bullet/thumbnail/drag/arrow key navigation)
                    $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                    $Idle: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                    $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                    $ArrowKeyNavigation: 1,   			            //[Optional] Steps to go for each navigation request by pressing arrow key, default value is 1.
                    $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                    $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide, default value is 20
                    $SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                    $SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                    $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
                    $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                    $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                    $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)

                    $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                        $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                        $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                        $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                        $Rows: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                        $SpacingX: 10,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                        $SpacingY: 10,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                        $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                    },

                    $ArrowNavigatorOptions: {
                        $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                        $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                        $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                    }
                };

                var jssor_slider1 = new $JssorSlider$('slider1_container', options);

                /*#region responsive code begin*/
                //remove responsive code if you don't want the slider scales while window resizing
                function ScaleSlider() {
                    var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                    if (parentWidth)
                        jssor_slider1.$ScaleWidth(Math.min(parentWidth, 600));
                    else
                        $Jssor$.$Delay(ScaleSlider, 30);
                }

                ScaleSlider();
                $Jssor$.$AddEvent(window, "load", ScaleSlider);

                $Jssor$.$AddEvent(window, "resize", ScaleSlider);
                $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
                /*#endregion responsive code end*/

                return jssor_slider1;
            }

            function InitSlider2() {
                var options = {
                    $AutoPlay: 0,                                    //[Optional] Auto play or not, to enable slideshow, this option must be set to greater than 0. Default value is 0. 0: no auto play, 1: continuously, 2: stop at last slide, 4: stop on click, 8: stop on user navigation (by arrow/bullet/thumbnail/drag/arrow key navigation)
                    $AutoPlaySteps: 4,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                    $Idle: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                    $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                    $ArrowKeyNavigation: false,   			            //[Optional] Steps to go for each navigation request by pressing arrow key, default value is 1.
                    $SlideDuration: 300,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                    $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide, default value is 20
                    $SlideWidth: 200,                                   //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                    //$SlideHeight: 150,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                    $SlideSpacing: 3, 					                //[Optional] Space between each slide in pixels, default value is 0
                    $Align: 0,                              //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                    $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                    $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                    $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)

                    $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                        $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                        $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                        $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                        $Rows: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                        $SpacingX: 0,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                        $SpacingY: 0,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                        $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                    },

                    $ArrowNavigatorOptions: {
                        $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                        $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                        $Steps: 4                                       //[Optional] Steps to go for each navigation request, default value is 1
                    }
                };

                var jssor_slider2 = new $JssorSlider$('slider2_container', options);

                /*#region responsive code begin*/
                //remove responsive code if you don't want the slider scales while window resizing
                function ScaleSlider() {
                    var bodyWidth = document.body.clientWidth;
                    if (bodyWidth)
                        jssor_slider2.$ScaleWidth(Math.min(bodyWidth, 809));
                    else
                        window.setTimeout(ScaleSlider, 30);
                }

                ScaleSlider();
                $Jssor$.$AddEvent(window, "load", ScaleSlider);

                $Jssor$.$AddEvent(window, "resize", ScaleSlider);
                $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
                ///*#endregion responsive code end*/

                return jssor_slider2;
            }

            //display auto play of slider2
            var slider1 = InitSlider1();
            var slider2 = InitSlider2();

            //sync position of slider2 to opposite position of slider1
            slider1.$On($JssorSlider$.$EVT_POSITION_CHANGE, function (position, fromPosition, virtualPosition, virtualFromPosition) {
                slider2.$GoTo(-virtualPosition);
            });
        });
    </script>

    <!-- Jssor Slider Begin -->
    
    <div id="slider1_container" style="position: absolute; top: 0px; left: 0px; width: 570px; height: 300px;  margin:auto; ">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="../svg/loading/static-svg/spin.svg" />
        </div>

        <!-- Slides Container -->
        <div data-u="slides" style="cursor: pointer; position: absolute; left: 0px; top: 0px; width: 510px; height: 380px; ">
            <div>
                <img data-u="image" src="img/gallery/980x380/059.jpg" />
            </div>
            <div>
                <img data-u="image" src="img/gallery/980x380/060.jpg" onclick="alert('555')"/>
            </div>
            <div>
                <img data-u="image" src="img/gallery/980x380/061.jpg" />
            </div>
            <div>
                <img data-u="image" src="img/gallery/980x380/062.jpg" />
            </div>
        </div>
        
        <!--#region Bullet Navigator Skin Begin -->
        <!-- Help: https://www.jssor.com/development/slider-with-bullet-navigator.html -->
        <style>
            .jssorb051 .i {position:absolute;cursor:pointer;}
            .jssorb051 .i .b {fill:#fff;fill-opacity:0.5;stroke:#000;stroke-width:400;stroke-miterlimit:10;stroke-opacity:0.5;}
            .jssorb051 .i:hover .b {fill-opacity:.7;}
            .jssorb051 .iav .b {fill-opacity: 1;}
            .jssorb051 .i.idn {opacity:.3;}
        </style>
        <div data-u="navigator" class="jssorb051" style="position:absolute;bottom:12px;right:16px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                </svg>
            </div>
        </div>
        <!--#endregion Bullet Navigator Skin End -->
        
        <!--#region Arrow Navigator Skin Begin -->
        <!-- Help: https://www.jssor.com/development/slider-with-arrow-navigator.html -->
        <style>
            .jssora051 {display:block;position:absolute;cursor:pointer;}
            .jssora051 .a {fill:none;stroke:#fff;stroke-width:500;stroke-miterlimit:10;}
            .jssora051:hover {opacity:.8;}
            .jssora051.jssora051dn {opacity:.5;}
            .jssora051.jssora051ds {opacity:.3;pointer-events:none;}
        </style>
        <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:0px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:-30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>
        <!--#endregion Arrow Navigator Skin End -->

    </div>
