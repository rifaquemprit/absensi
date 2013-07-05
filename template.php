<?php session_start();
if(!isset($_SESSION['login'])): header("location:index.php"); endif;
include_once 'setting/function.php';
include_once 'setting/config.php';

$user = new User();
?>
<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Emprit Application</title>
        <link  rel="icon" type="icon" href="assets/themes/icons/icon.ico"/>
		<link rel="stylesheet" type="text/css" href="assets/themes/default/easyui.css" />
		<link rel="stylesheet" type="text/css" href="assets/themes/icon.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/atas.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/style-newsticker.css" media="screen" />
		<script type="text/javascript" src="assets/js/jquery-1.8.0.min.js"></script>
		<script type="text/javascript" src="assets/js/jquery.easyui.min.js"></script>
	    <script type="text/javascript" src="assets/js/jcarousellite_1.0.1c4.js"></script>
		<style type="text/css">
			#fm{
				margin:0;
				padding:10px 30px;
			}
			.ftitle{
				font-size:14px;
				font-weight:bold;
				color:#666;
				padding:5px 0;
				margin-bottom:10px;
				border-bottom:1px solid #ccc;
			}
			.fitem{
				margin-bottom:5px;
			}
			.fitem label{
				display:inline-block;
				width:120px;
			}
		</style>
		<script>
        //progress 
			function progress(){  
                var win = $.messager.progress({  
                    title:'Please waiting',  
                    msg:'Loading data...'  
                });  
                setTimeout(function(){  
                    $.messager.progress('close');  
                },5000)  
            }  

        //news
        $(function() {
            $("#news").jCarouselLite({
                vertical: true,
                hoverPause:true,
                btnPrev: ".previous",
                btnNext: ".next",
                visible: 3,
                auto:3000,
                speed:500
            });
			
			//resize 
			function updateSize() {
					var winWidth  = $(window).width(),
						winHeight = $(window).height()
					
					$('.easyui-layout').css({
						width:winWidth,
						height:winHeight
					});
				} updateSize(); 
					 
				$(window).resize(function() {
					updateSize();
				});
        });

        //menu
            function open1(plugin){
                if ($('#tt').tabs('exists',plugin)){
                    $('#tt').tabs('select', plugin);
                } else {
                    $('#tt').tabs('add',{
                        title:plugin,
                        href:'module/'+plugin+'.php',
                        closable:true,
                        extractor:function(data){
                            var tmp = $('<div></div>').html(data);
                            data = tmp.find('#content').html();
                            tmp.remove();
                            return data;
						}
                    });
                }
            }
					
		</script>
		
		<style>
			body{font-family: arial; font-size: 11px}
		</style>
	</head>
	
    <body class="easyui-layout">
   
        <!-- header -->
    	<div class="atas" data-options="region:'north',border:false" style="height:95px;padding:5px">
        	<div id="logo">
                <img src="assets/img/logo.png"  height="70" width="70"/>
            </div>
            <div id="judul">
                <p><h2>SISTEM APLIKASI ABSENSI PIKET SORE</h2></p>
                <p><h1>SELULOSA KOMPUTER</h1></p>
                <p><h3>Jalan Raya Bangsri Rt.03 Rw.09 Kec.Bangsri - Jepara</h3></p>
            </div>
            <div id="jam">
                <?php 
                    date_default_timezone_set('Asia/Jakarta');

                    $jam=date("H:i:s");
                    echo "<b>". $jam."<br>"."</b>"; 
                ?>
            </div>
        </div>
         
        <!-- Footer -->
    	<div class="bawah" data-options="region:'south',border:false" style="height:45px;padding:2px;color:#000;">
            <div align="center">
                <p>Copyright &copy; Aplikasi Absensi (http://www.facebook.com/rifaqu)</p>
    			<p><b>Syarifatun Ni'mah @2013</b></p>
            </div>
        </div>
		
    	<!-- Menu -->
    	<div data-options="region:'west',split:true,iconCls:'icon-menu'" title="Menu" style="width:280px;padding1:1px;overflow:hidden;">
    		
        	<div style="padding:10px;border:1px solid #ddd;">  
                <a href="#" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-home'" onclick="open1('Dashboard')">Dashboard</a>
        		<a href="#" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-tip'">About</a>
                <a href="#" class="easyui-splitbutton" data-options="menu:'#mm1',iconCls:'icon-edit'">Profile</a>  
        	</div> 

            <div id="mm1" style="width:150px;">  
                <div data-options="iconCls:'icon-edit-profile'">Edit Profile</div>  
                <div data-options="iconCls:'icon-logout'"><a href='logout.php'>Logout</a></div>  
                <div class="menu-sep"></div> 
            </div>      

            <!-- accordion menu -->	
            <div style="margin:10px 0;"></div>  
            <div class="easyui-accordion">  
                <div title="Administrator" data-options="iconCls:'icon-admin'" style="overflow:auto;padding:10px;">  
                    <ul class="easyui-tree">  
						<?php
							$user->check_login($_SESSION['level']);
						?>
                        <li><a href="#" onclick="open1('menu')">Menu</a></li>  
                        <li><a href="#" onclick="open1('User')">User</a></li>  
                        <li>Berita</li>  
                    </ul>  
                </div>  
                <div title="Help" data-options="iconCls:'icon-help'" style="padding:10px;">  
                    <h3 style="color:#0099FF;">Accordion for jQuery</h3>  
                    <p>Accordion is a part of easyui framework for jQuery. It lets you define your accordion component on web page more easily.</p>       
                </div>  
            </div>
    	</div>

        <!-- Content -->
    	<div data-options="region:'center',iconCls:'icon-orang'" title="Selamat Datang <?php echo "admin";?> !" >
    		<div class="easyui-tabs" fit="true" id="tt" border="false" plain="true">  
            <div title="Home" href="module/home.php" style="padding:15px;"></div>
            </div>
    	</div>

        <!-- informasi -->
        <div data-options="region:'east',iconCls:'icon-news',split:true" title="News Informations" style="width:230px;padding:5px;">
            <center><div class="easyui-calendar" style="width:188px;height:150px;"></div></center>
            <div style="margin:10px;"></div>
            <img src="assets/img/news-arrow-previous.png" class="previous" />
                 <div id="news">
                     <ul>
                       <?php include "module/news.php";?>
                     </ul>
                 </div>
            <img src="assets/img/news-arrow.png" class="next" />
        </div>

</body>
</html>
