
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="//cdn.webix.com/site/webix.css?v=8.4.5" type="text/css"   charset="utf-8">
		<script src="//cdn.webix.com/site/webix.js?v=8.4.5" type="text/javascript" charset="utf-8"></script>
		<style>
			#areaA{
				margin: 2em 15%;
			}
			#areaB{
				margin: 5px;
				width:700px; height:70px;
			}
		</style>
		<title>Usuarios</title>
	</head>
	<body>
		<form >
			<div  id="areaB"></div>
      <h3 align="center" class='header_comment'>Catalogo de Usuarios</h3>
		<div id="areaA" style='height:400px'></div>
		<hr>
		</form>
		<script type="text/javascript" charset="utf-8">
    webix.ready(function(){
			grida = webix.ui({
        id: "mytable",
				container:"areaA",
				view:"datatable",
				columns:[
					{ id:"id",	header:"ID", 		width:50 },
					{ id:"nombre",	header:"Nombre",editor:"text",		width:160 },
					{ id:"a_paterno",	header:"Ap. Paterno" ,editor:"text", 		width:140  },
					{ id:"a_materno",	header:"Ap. Materno",editor:"text", 	width:140  },
          { id:"telefono",	header:"Telefono",editor:"text", 	width:120  },
          { id:"correo",	header:"Correo", 	width:140  },
          { id:"estado",	header:"Estado", 	width:100  },
          { id:"contrasena",	header:"Contrasena", 	width:120  }
				],
				autowidth:true,
				url:"welcome/p",
				select:true,
				editable:true,
				editaction: "dblclick",

			});
      //$$("mytable").load("welcome/p");

      //$$('mytable').parse(obj);
		});
		webix.ui({
				container:"areaB",
				view:"menu",
                data:[
					{ id:"1",value:"Catalogo de Usuarios" },
					{ id:"2",value:"Cambiar Estado"},
					{ id:"3",value:"Otro" }
				],
				on:{
					onMenuItemClick:function(id){
						webix.message("Accediendo: "+this.getMenuItem(id).value);
            if(this.getMenuItem(id).value=1)
            window.location.href= "vertodos";
            if(this.getMenuItem(id).value=2)
            window.location.href= "ver";
            if(this.getMenuItem(id).value=3)
            window.location.href= "login";
					}
				},
                type:{
                    subsign:true
                }
			});


		</script>
	<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');  ga('create', 'UA-41866635-1', 'auto'); ga('send', 'pageview');</script>
<script src="https://cdn.ravenjs.com/3.19.1/raven.min.js" crossorigin="anonymous"></script>
<script>Raven.config('https://417d33c31f07425cad14617d060cc3e8@sentry.webix.io/10',{ release:'8.4.5'}).install();</script>
</body>
</html>
