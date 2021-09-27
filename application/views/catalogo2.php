<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="//cdn.webix.com/site/webix.css?v=8.4.5" type="text/css"   charset="utf-8">
		<script src="//cdn.webix.com/site/webix.js?v=8.4.5" type="text/javascript" charset="utf-8"></script>
		<style>
		</style>
		<title>Usuarios</title>
	</head>
	<body>
		<form >
			<div  id="areaB"></div>
      <h3 align="center" class='header_comment'>Catalogo de Usuarios </h3>
			<?php session_start(); ?>
		<hr>
		</form>
		<script type="text/javascript" charset="utf-8">
		var data;
		var nombredeusuario='<?php echo $_SESSION['correo'];?>';
		var estado='<?php echo $_SESSION['estado'];?>';
			var grid = {
        id: "grid",
				container:"areaA",
				view:"datatable",
				columns:[
					{ id:"id",	header:"ID", 		width:50 },
					{ id:"nombre",	header:"Nombre",		width:160 },
					{ id:"a_paterno",	header:"Ap. Paterno" , 		width:140  },
					{ id:"a_materno",	header:"Ap. Materno", 	width:140  },
          { id:"telefono",	header:"Telefono", 	width:120  },
          { id:"correo",	header:"Correo", 	width:140  },
          { id:"estado",	header:"Estado", 	width:100  },
          { id:"contrasena",	header:"Contrasena", 	width:120  }
				],
        select:true,
        maxHeight:300,
        on:{
    "onAfterSelect":function(id){
			var values=$$("grid").getItem(id);
      $$("nombre").setValue(this.getItem(id.row)[id.column]);
			$$("myform").setValues(values)
    }
  }
			};
      var buttons = {
				view:"form",
    id:"myform",
  cols:[
    { view:"text", value:"Nombre",name:"nombre", id:"nombre", width: 120},
    { view:"text", value:"A. Paterno",name:"a_paterno", id:"a_paterno", width: 120},
    { view:"text", value:"A. Materno",name:"a_materno", id:"a_materno", width: 120},
    { view:"text", value:"Telefono",name:"telefono", id:"telefono", width: 120},
    { view:"text", value:"Correo",name:"correo", id:"correo", width: 120},
    { view:"select",disabled:true, value:"Inactivo",name:"estado", id:"estado",options:["Activo","Inactivo"], width: 120},
    { view:"text", value:"Contrasena",name:"contrasena", id:"contrasena", width: 120},
    { view:"button", width: 130, value:"Actualizar",click:update  },
    { view:"button", width: 130, value:"Agregar", click:add},
    { view:"button", width: 130, value:"Eliminar", click:remove_row }
  ],
};
webix.ready(function(){
  if(!webix.env.touch && webix.env.scrollSize)
    webix.CustomScroll.init();
  webix.ui({
    margin:10,
    rows:[
      grid,
      buttons
    ]
  });
  $$("grid").load("welcome/p");
  var dp = new webix.DataProcessor({
    url: "rest->welcome/p",
    master: $$("grid")
  });
});
function add() {
if (!$$("grid")) return;
data=$$("myform").getValues();
webix.ajax().post("welcome/agregar",data);
$$("grid").load("welcome/p");
$$("grid").load("welcome/p");
};
function update() {
  if (!$$("grid")) return;
  var sel = $$("grid").getSelectedId();
  if (!sel) return;
  var value = $$("nombre").getValue();
  var row = $$("grid").getItem(sel.row);
  row[sel.column] = value;
	data=$$("myform").getValues();
	webix.ajax().post("welcome/actualizar",data);
	$$("grid").load("welcome/p");
	$$("grid").load("welcome/p");
};
function remove_row() {
  if (!$$("grid")) return;
  var sel = $$("grid").getSelectedId(true);
  if (!sel) return;
	data=$$("myform").getValues();
	for (var i = 0; i < sel.length; i++)
    $$("grid").remove(sel[i].row);
	webix.ajax().post("welcome/eliminar",data);
	$$("grid").load("welcome/p");
};
webix.ui({
		container:"areaB",
		view:"menu",
						data:[
			{ id:"1",value:"Catalogo de Usuarios" },
			{ id:"2",value:"Usuario:"+nombredeusuario+" Estado:"+ estado},
			{ id:"3",value:"Cambiar Estado"},
			{ id:"4",value:"Salir"}
		],
		on:{
			onMenuItemClick:function(id){
				webix.message("Accediendo: "+this.getMenuItem(id).value);
				if(this.getMenuItem(id).value	=="Catalogo de Usuarios"){
				window.location.href= "catalogo2";}
				if(this.getMenuItem(id).value=="Salir"){
				window.location.href= "login";}
				if(this.getMenuItem(id).value=="Cambiar Estado"){
					webix.ajax().get("welcome/actualizarestado");
				window.location.href= "catalogo2";
			}
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
