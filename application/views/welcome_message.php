<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="//cdn.webix.com/site/webix.css?v=8.4.5" type="text/css"   charset="utf-8">
		<script src="//cdn.webix.com/site/webix.js?v=8.4.5" type="text/javascript" charset="utf-8"></script>
		<style>
			#areaA{
				margin: 3em 35%;
			}
			#areaB{
				margin: 5px;
				width:700px; height:100px;
			}
		</style>
		<title>Login</title>
	</head>
	<body>
		<form >
			<h2 align="center">Ingrese sus Credenciales</h2>
			<div  id="areaA"></div>
		</form>
		<script type="text/javascript" charset="utf-8">
		var form1 = [
			{ view:"text", id:"correo",label:'Correo', name:"correo" },
			{ view:"text", id:"contrasena",label:'Contraseña', name:"contrasena" },
			{ view:"button", value: "Acceder", click:function(){
				var form = this.getParentView();
				var data=$$("myform").getValues();
					//console.log($$("myform").getValues());
				webix.ajax().post("welcome/validar",data).then(function(data){
					var r= data.json();
					//console.log(data.text());
					if (data.text().includes('null')){
						webix.message({
	    		text:"Usuario y/o contraseña invalidos",
	    	type:"error",
	    	expire: 100000,
	    	id:"message1"
				});
					}
					else if (r['correo']==$$("correo").getValue() && r['contrasena']==$$("contrasena").getValue()){
					window.location.href= "catalogo2";
					}
					else {
						webix.message({
	    		text:"Usuario y/o contraseña invalidos",
	    	type:"error",
	    	expire: 100000,
	    	id:"message1"
				});
					}
				$$("contrasena").setValue("");
				});
				}}
		];
		webix.ui({
			container:"areaA",
			id:"myform",
			view:"form", scroll:false, width:400, complexData:true,
			elements: form1,
			elementsConfig:{
				labelPosition:"top"
			}
		});

		</script>
	<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');  ga('create', 'UA-41866635-1', 'auto'); ga('send', 'pageview');</script>
<script src="https://cdn.ravenjs.com/3.19.1/raven.min.js" crossorigin="anonymous"></script>
<script>Raven.config('https://417d33c31f07425cad14617d060cc3e8@sentry.webix.io/10',{ release:'8.4.5'}).install();</script>
</body>
</html>
