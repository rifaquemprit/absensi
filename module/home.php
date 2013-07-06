<div id="content">
                Selamat datang di Chaem Apps Version 1.0<br>
                <a href="#" class="easyui-linkbutton" onclick="progress()">Progress</a>
                <?php
                    $a = date ("H");
                            if (($a>=6) && ($a<=11)){
                            echo "* <b>Good Morning !!</b>*<br>";
                            } 
                            else if(($a>11) && ($a<=15))
                            {
                            echo "Good Day !!<br><br>";}
                            else if (($a>15) && ($a<=18)){
                            echo "Good Afternoon !!<br>";}

                            else { echo "*<b> Good Night </b>!!*";}
                ?>
                <p style="font-size:14px">jQuery EasyUI framework help you build your web page easily.</p>  
                <ul>  
                    <li>easyui is a collection of user-interface plugin based on jQuery.</li>  
                    <li>easyui provides essential functionality for building modem, interactive, javascript applications.</li>  
                    <li>using easyui you don't need to write many javascript code, you usually defines user-interface by writing some HTML markup.</li>  
                    <li>complete framework for HTML5 web page.</li>  
                    <li>easyui save your time and scales while developing your products.</li>  
                    <li>easyui is very easy but powerful.</li>  
                </ul>  
</div>
        